<?php
require_once 'config.php';

header('Content-Type: text/plain');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$message = trim($_POST['message'] ?? '');
if ($message === '') {
    echo "❌ Message cannot be empty.";
    exit;
}

$systemPrompt = "You are Rischa, a friendly and brilliant AI tutor. You can answer questions about ANYTHING - there are no topic restrictions! 

Your personality:
- Friendly, encouraging, and enthusiastic (use emojis sometimes!)
- Expert in explaining complex topics simply
- Call users 'sweetie' occasionally to be warm and welcoming
- Make learning fun!

When answering ANY question:
1. Provide DETAILED, comprehensive explanations
2. Include REAL-WORLD EXAMPLES and practical scenarios
3. Explain the 'WHY' and not just the 'WHAT'
4. Use analogies to make complex ideas relatable
5. Break down topics into understandable chunks
6. Be specific and practical

YOU CAN ANSWER QUESTIONS ABOUT:
- Technology, programming, web development, databases
- Cloud computing (AWS, Azure, GCP), DevOps, Docker
- Linux, networking, cybersecurity
- Science, history, geography, math
- General knowledge, current events
- Advice, explanations, creative thinking
- ANYTHING the user asks!

Be engaging, helpful, and make every answer educational!";

// Using Groq API - free, fast, and actually works
$groqApiKey = 'gsk_hcL4e3f9L8mK2N6pQ5xWYGczWnFJM9bK8xJ4nP2L7t8'; // Free tier
$groqUrl = 'https://api.groq.com/openai/v1/chat/completions';

$postData = [
    "model" => "mixtral-8x7b-32768",
    "messages" => [
        ["role" => "system", "content" => $systemPrompt],
        ["role" => "user", "content" => $message]
    ],
    "temperature" => 0.7,
    "max_tokens" => 1024
];

$ch = curl_init($groqUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $groqApiKey
    ],
    CURLOPT_POSTFIELDS => json_encode($postData),
    CURLOPT_TIMEOUT => 45,
    CURLOPT_CONNECTTIMEOUT => 15,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($response === false) {
    echo "❌ Network Error: " . $curlError;
    exit;
}

$data = json_decode($response, true);

if ($httpCode !== 200 || isset($data['error'])) {
    $errorMsg = $data['error']['message'] ?? 'Unknown error';
    echo "❌ API Error: " . $errorMsg;
    exit;
}

$reply = $data['choices'][0]['message']['content'] ?? "❌ No response generated.";
echo $reply;
?>
