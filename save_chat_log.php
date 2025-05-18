<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender = $_POST['sender'] ?? 'unknown';
    $message = $_POST['message'] ?? '';
    $timestamp = date("Y-m-d H:i:s");

    $log = [
        'timestamp' => $timestamp,
        'sender' => $sender,
        'message' => $message
    ];

    $logLine = json_encode($log) . PHP_EOL;
    file_put_contents('chat_logs.txt', $logLine, FILE_APPEND);

    echo 'Saved';
} else {
    echo 'Invalid request';
}
?>