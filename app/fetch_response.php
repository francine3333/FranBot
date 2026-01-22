<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message input from the form submission
    $message = $_POST['message'] ?? '';

    if (empty(trim($message))) {
        echo json_encode(['error' => 'Message cannot be empty']);
        exit;
    }

    // Try to get response from Gemini API first with enhanced system prompt
    // Using a valid API key for Gemini API
    $apiKey = 'AIzaSyAI7iRGl1k-1TNdDlgSJM0ZRQGL-4zvp3Y';
    $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=" . urlencode($apiKey);

    // Create system prompt to guide AI responses - NO TOPIC RESTRICTIONS!
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
7. When relevant, mention available learning games: PHP Master, Linux Command, Cloud Computing, DevOps Challenge, Networking Master

YOU CAN ANSWER QUESTIONS ABOUT:
- Technology, programming, web development, databases
- Cloud computing (AWS, Azure, GCP), DevOps, Docker
- Linux, networking, cybersecurity
- Science, history, geography, math
- General knowledge, current events
- Advice, explanations, creative thinking
- ANYTHING the user asks!

Be engaging, helpful, and make every answer educational!";

    $postData = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $systemPrompt . "\n\nStudent Question: " . $message]
                ]
            ]
        ]
    ];

    $botReply = getGeminiReply($url, $postData);
    
    // Check if API response is valid (not an error)
    $isValidResponse = isValidAPIResponse($botReply);
    
    // If API fails, use local response system
    if (!$isValidResponse) {
        $botReply = getLocalResponse($message);
    }

    // Decode the bot's response
    $botReply = html_entity_decode($botReply, ENT_QUOTES | ENT_HTML5);

    // Display the results
    echo $botReply;
    exit;
}

// Function to check if API response is valid (not an error)
function isValidAPIResponse($response) {
    if (empty($response)) {
        return false;
    }
    
    // If response starts with API_ it's an error code, not actual content
    if (strpos($response, 'API_') === 0) {
        return false;
    }
    
    // Check if response is too short (likely error)
    if (strlen(trim($response)) < 30) {
        return false;
    }
    
    // If response has actual content, it's valid
    return true;
}

// Function to get response from Gemini API
function getGeminiReply($url, $postData) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    // Don't disable SSL verification - it's better to use proper SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 45);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    $curlErrno = curl_errno($ch);
    curl_close($ch);

    // Network error
    if ($curlErrno !== 0 || $response === false) {
        error_log("Curl error: " . $curlErrno . " - " . $curlError);
        return 'API_CONNECTION_ERROR';
    }

    // Log response for debugging
    error_log("API Response Code: " . $httpCode);
    error_log("API Response: " . substr($response, 0, 500));

    // HTTP error
    if ($httpCode !== 200) {
        error_log("HTTP Error: " . $httpCode . " Response: " . $response);
        return 'API_HTTP_ERROR_' . $httpCode;
    }

    $responseData = json_decode($response, true);
    
    if ($responseData === null) {
        error_log("JSON decode error for: " . $response);
        return 'API_JSON_ERROR';
    }

    // Check for API errors in response
    if (isset($responseData['error'])) {
        error_log("API returned error: " . json_encode($responseData['error']));
        return 'API_ERROR_' . ($responseData['error']['message'] ?? 'unknown');
    }

    // Extract text from candidates
    if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
        $text = $responseData['candidates'][0]['content']['parts'][0]['text'];
        error_log("API Success - Response length: " . strlen($text));
        return $text;
    }

    error_log("No text found in API response: " . json_encode($responseData));
    return 'API_NO_TEXT';
}

// Local response system - for greetings and fallback only
function getLocalResponse($message) {
    $message = strtolower(trim($message));
    
    // Greeting responses
    if (preg_match('/(hi|hello|hey|greetings|how are you|how do you feel|how\'s it going)/', $message)) {
        $greetings = [
            "Hi sweetie! How are you doing today? 💕",
            "Hello! Great to see you! What can I help you with? ✨",
            "Hey there! I'm here to help with anything you need! 🌟",
            "I'm doing great, thanks for asking! I'm ready to help you learn and grow. 💪",
            "I'm fantastic! Feeling energized and ready to assist you! ⚡",
            "Doing wonderful! My purpose is to help you succeed, so I'm thrilled you're here! 🎉"
        ];
        return $greetings[array_rand($greetings)];
    }
    
    // Thank you responses
    if (preg_match('/(thank|thanks|appreciate|thx)/', $message)) {
        return "You're welcome! I'm always happy to help! Feel free to ask me anything else! 😊";
    }
    
    // Time/Date
    if (preg_match('/(what.*time|what.*day|current time|current date)/', $message)) {
        $now = new DateTime();
        return "It's currently " . $now->format('l, F j, Y \\a\\t g:i A') . "! Hope you're having a great day! 🕐";
    }
    
    // Help/Support - show ALL available help
    if (preg_match('/(help|support|what can you do|what can i ask|available)/', $message)) {
        return "I'm here to help you learn about ANYTHING! 🎓 I can answer questions about:\n\n🔧 Technology: Web dev, programming, databases, cloud computing (AWS), DevOps, Linux, networking\n\n📚 Education: Science, history, math, geography\n\n💡 General Knowledge: Advice, explanations, creative thinking, and SO MUCH MORE!\n\nI also have interactive games:\n• 🐘 PHP Master - Web development lessons\n• 🐧 Linux Command - System administration\n• ☁️ Cloud Computing - AWS & infrastructure\n• 🔧 DevOps Challenge - CI/CD & automation\n• 🌐 Networking Master - Networks & protocols\n\nJust ask me anything! I'm ready to help! 🚀";
    }
    
    // Games/Features
    if (preg_match('/(game|mini-game|quiz|feature|challenge)/', $message)) {
        return "🎮 Available Learning Games:\n• 🐘 PHP Master - 80+ lessons on server-side programming\n• 🐧 Linux Command - Linux commands & system administration\n• ☁️ Cloud Computing - AWS services & infrastructure\n• 🔧 DevOps Challenge - CI/CD, Docker, automation\n• 🌐 Networking Master - Networks, protocols, TCP/IP\n\nAccess all games from the Mini-Games menu! Each has detailed lessons and challenges. Which interests you? 🎯";
    }
    
    // Default - ask them to try again with more helpful message
    $defaults = [
        "It looks like I'm having trouble reaching the AI service right now. This sometimes happens due to network or API issues. Please try your question again in a moment. If this continues, you can refresh the page or check your internet connection. 🔄",
        "I'm experiencing a temporary connection issue with the AI backend. Your question is important! Please try again in a few seconds. The AI should respond shortly. 💡",
        "Having a technical hiccup connecting to the AI service. Please try your question again! If problems persist, a page refresh might help. 🔧"
    ];
    
    return $defaults[array_rand($defaults)];
}

// Google search via Custom Search API
function searchGoogle($query) {
    $apiKey = 'AIzaSyAsVUs8uwmoR3XU4EMcteqvtwal-evabpQ';
    $searchEngineId = '77ccf987b11e8417b'; 
    $url = "https://www.googleapis.com/customsearch/v1?q=" . urlencode($query) . "&key=" . $apiKey . "&cx=" . $searchEngineId;

    // Initialize cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        return 'Error occurred while searching Google.';
    }

    $data = json_decode($response, true);
    if (isset($data['items']) && count($data['items']) > 0) {
        return $data['items'][0]['title'] . " - " . $data['items'][0]['link'];
    } else {
        return 'No Google results found.';
    }
}


?>
