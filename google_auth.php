
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['credential'])) {
        echo json_encode(['success' => false, 'error' => 'No credential']);
        exit;
    }
    $token = $_POST['credential'];
    $client_id = '1078709518511-2e29t7tu8oj2chnkmer2jjtca328qina.apps.googleusercontent.com';
    $payload = json_decode(file_get_contents("https://oauth2.googleapis.com/tokeninfo?id_token=" . $token), true);
    if ($payload && isset($payload['aud']) && $payload['aud'] === $client_id) {
        session_start();
        $_SESSION['user_email'] = $payload['email'];
        $_SESSION['user_name'] = $payload['name'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid token']);
    }
    exit;
}
?>