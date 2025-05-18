<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message input from the form submission
    $message = $_POST['message'] ?? '';

    // Prepare data for Gemini API request
    $postData = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $message]
                ]
            ]
        ]
    ];

    $apiKey = 'AIzaSyC3Kg8fFOesyXh9aOQYDHaciRhvbe_NPNU';
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

    // Get the bot's reply from Gemini API
    $botReply = getGeminiReply($url, $postData);

    // Decode the bot's response
    $botReply = html_entity_decode($botReply, ENT_QUOTES | ENT_HTML5);

    $googleSearchResult = searchGoogle($message);

    // Display the results
    echo " " . $botReply;
   

}

// Function to get response from Gemini API
function getGeminiReply($url, $postData) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        return 'Error occurred while communicating with Gemini API.';
    }

    $responseData = json_decode($response, true);
    if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
        return $responseData['candidates'][0]['content']['parts'][0]['text'];
    } else {
        return 'Something went wrong. Please try again later.';
    }
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
