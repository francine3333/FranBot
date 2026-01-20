<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message input from the form submission
    $message = $_POST['message'] ?? '';

    if (empty(trim($message))) {
        echo json_encode(['error' => 'Message cannot be empty']);
        exit;
    }

    // Try to get response from Gemini API first
    $apiKey = 'AIzaSyAuMI-P6H5ZttaEg1NociEIHMIs8yIZpOA';
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

    $postData = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $message]
                ]
            ]
        ]
    ];

    $botReply = getGeminiReply($url, $postData);
    
    // If API fails, use local response system
    if (strpos($botReply, 'API') !== false || strpos($botReply, 'error') !== false || strpos($botReply, 'unable') !== false) {
        $botReply = getLocalResponse($message);
    }

    // Decode the bot's response
    $botReply = html_entity_decode($botReply, ENT_QUOTES | ENT_HTML5);

    // Display the results
    echo $botReply;
    exit;
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
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    $curlErrno = curl_errno($ch);
    curl_close($ch);

    if ($curlErrno !== 0 || $response === false) {
        return 'Unable to connect to API service.';
    }

    if ($httpCode !== 200) {
        return 'API endpoint error.';
    }

    $responseData = json_decode($response, true);
    
    if ($responseData === null) {
        return 'Invalid response from API.';
    }

    // Check for API errors in response
    if (isset($responseData['error'])) {
        return 'API error occurred.';
    }

    // Extract text from candidates
    if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
        return $responseData['candidates'][0]['content']['parts'][0]['text'];
    }

    return 'Unable to generate response.';
}

// Local response system - provides intelligent responses without API
function getLocalResponse($message) {
    $message = strtolower(trim($message));
    
    // Greeting responses
    if (preg_match('/(hi|hello|hey|greetings)/', $message)) {
        $greetings = [
            "Hi sweetie! How are you doing today? 💕",
            "Hello! Great to see you! What can I help you with? ✨",
            "Hey there! I'm here to help with anything you need! 🌟"
        ];
        return $greetings[array_rand($greetings)];
    }
    
    // How are you
    if (preg_match('/(how are you|how do you feel|how\'s it going)/', $message)) {
        $responses = [
            "I'm doing great, thanks for asking! I'm ready to help you learn and grow. 💪",
            "I'm fantastic! Feeling energized and ready to assist you! ⚡",
            "Doing wonderful! My purpose is to help you succeed, so I'm thrilled you're here! 🎉"
        ];
        return $responses[array_rand($responses)];
    }
    
    // Help/Support
    if (preg_match('/(help|support|assist|guide|teach)/', $message)) {
        return "I'm here to help you with learning and support! I can assist with:\n• Linux commands and system administration\n• Cloud computing (AWS, infrastructure)\n• DevOps and CI/CD pipelines\n• Computer networking concepts\n• Programming and development\n• General knowledge and questions\n\nWhat would you like to learn about today? 📚";
    }
    
    // Games
    if (preg_match('/(game|quiz|challenge|learn|mini)/', $message)) {
        return "Great question! I have several interactive games you can play:\n🐧 Linux Command - Learn Linux commands\n☁️ Cloud Computing - AWS and cloud services\n🔧 DevOps Challenge - CI/CD and deployment\n🌐 Computer Networking - Networks and protocols\n\nYou can access these from the Mini-Games section on the dashboard! Which interests you most? 🎮";
    }
    
    // Linux questions
    if (preg_match('/(linux|bash|shell|command|terminal)/', $message)) {
        $linuxTips = [
            "Linux is a powerful open-source operating system! Some basic commands to know:\n• `ls` - list files\n• `cd` - change directory\n• `pwd` - print working directory\n• `mkdir` - create directory\n• `sudo` - run as superuser\n\nWant to learn more? Try the Linux Command game! 🐧",
            "There's an awesome Linux Command game in the Mini-Games section that can teach you everything about Linux! It covers file management, permissions, processes, and system administration. 📚"
        ];
        return $linuxTips[array_rand($linuxTips)];
    }
    
    // Cloud/AWS questions
    if (preg_match('/(cloud|aws|amazon|infrastructure|vpc|ec2)/', $message)) {
        return "Cloud computing is amazing! AWS offers numerous services:\n• EC2 - Virtual machines\n• S3 - Storage\n• RDS - Databases\n• VPC - Virtual networking\n• Lambda - Serverless computing\n\nThe Cloud Computing game in Mini-Games teaches you all about these services! ☁️";
    }
    
    // DevOps questions
    if (preg_match('/(devops|ci\\/cd|docker|kubernetes|automation|deploy)/', $message)) {
        return "DevOps is all about continuous integration and deployment! Key concepts:\n• CI/CD pipelines for automation\n• Docker for containerization\n• Kubernetes for orchestration\n• Infrastructure as Code (IaC)\n• Monitoring and logging\n\nCheck out the DevOps Challenge game to master these skills! 🔧";
    }
    
    // Networking questions
    if (preg_match('/(network|internet|tcp|udp|dns|http|protocol|ip address|router)/', $message)) {
        return "Networking is fundamental to modern computing! Key concepts:\n• IP addresses and subnets\n• TCP/UDP protocols\n• DNS for domain resolution\n• HTTP/HTTPS for web\n• Routing and firewalls\n• OSI model layers\n\nPlay the Computer Networking game to become a networking expert! 🌐";
    }
    
    // Time/Date
    if (preg_match('/(time|date|what.*time|what.*day)/', $message)) {
        $now = new DateTime();
        return "It's currently " . $now->format('l, F j, Y \\a\\t g:i A') . "! Hope you're having a great day! 🕐";
    }
    
    // Thank you
    if (preg_match('/(thank|thanks|appreciate|thx)/', $message)) {
        return "You're welcome! I'm always happy to help! Feel free to ask me anything else! 😊";
    }
    
    // Dashboard features
    if (preg_match('/(dashboard|features|what can|menu|nav)/', $message)) {
        return "The dashboard has several features:\n🤖 My Chatbots - Create and manage chatbots\n💬 Daily Quotes - Inspirational quotes\n🎮 Mini-Games - Educational games (Linux, Cloud, DevOps, Networking)\n🎨 Theme Customizer - Customize your experience\n⚙️ Settings - Configure preferences\n\nWhat would you like to explore? 🚀";
    }
    
    // Default helpful response
    $defaultResponses = [
        "That's an interesting question! I'm here to help with learning about technology, games, and more. Feel free to ask me anything! 😊",
        "I'm listening! Tell me more about what you'd like to know. I can help with Linux, Cloud Computing, DevOps, Networking, and much more! 🌟",
        "Great question! Want to learn about our mini-games or explore the dashboard features? I'm here to guide you! 🎯",
        "You've got my attention! Is there something specific you'd like to learn about today? 📖"
    ];
    
    return $defaultResponses[array_rand($defaultResponses)];
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
