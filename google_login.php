<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franbot Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <meta name="google-signin-client_id" content="1078709518511-2e29t7tu8oj2chnkmer2jjtca328qina.apps.googleusercontent.com">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <style>
        body {
            background: linear-gradient(120deg, #ffe0f7 0%, #fbc2eb 100%);
            font-family: 'Quicksand', Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: #fff;
            border-radius: 2.5rem;
            box-shadow: 0 8px 40px #fbc2eb55;
            padding: 3rem 2.5rem 2.5rem 2.5rem;
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .login-container::before {
            content: "";
            position: absolute;
            top: -60px;
            right: -60px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, #fbc2eb 60%, transparent 100%);
            z-index: 0;
        }
        .login-container::after {
            content: "";
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, #ffe0f7 60%, transparent 100%);
            z-index: 0;
        }
        .cute-emoji {
            font-size: 3rem;
            margin-bottom: 0.7rem;
            z-index: 1;
            position: relative;
        }
        .login-title {
            font-family: 'Pacifico', cursive;
            color: #a21caf;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            z-index: 1;
            position: relative;
            letter-spacing: 1px;
        }
        .login-desc {
            color: #c026d3;
            font-size: 1.15rem;
            margin-bottom: 2.2rem;
            z-index: 1;
            position: relative;
        }
        .g_id_signin {
            margin: 2rem auto 0 auto;
            display: flex;
            justify-content: center;
            z-index: 1;
            position: relative;
        }
        .footer-note {
            margin-top: 2.5rem;
            color: #a21caf;
            font-size: 1rem;
            z-index: 1;
            position: relative;
            opacity: 0.85;
        }
        .login-tip {
            background: #fbc2eb22;
            color: #a21caf;
            border-radius: 1rem;
            padding: 0.7rem 1rem;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            z-index: 1;
            position: relative;
            display: inline-block;
        }
        @media (max-width: 500px) {
            .login-container {
                padding: 2rem 0.7rem 1.5rem 0.7rem;
                max-width: 98vw;
            }
            .login-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="cute-emoji">💖</div>
        <div class="login-title">Welcome to Franbot!</div>
        <div class="login-desc">Sign in with Google to chat with your AI bestie ✨</div>
        <div class="login-tip">Your data is safe and never shared. <span style="font-size:1.2em;">🔒</span></div>
        <div id="g_id_onload"
            data-client_id="1078709518511-2e29t7tu8oj2chnkmer2jjtca328qina.apps.googleusercontent.com"
            data-context="signin"
            data-ux_mode="popup"
            data-callback="handleCredentialResponse"
            data-auto_prompt="false">
        </div>
        <div class="g_id_signin"
            data-type="standard"
            data-shape="pill"
            data-theme="filled_pink"
            data-text="signin_with"
            data-size="large"
            data-logo_alignment="left">
        </div>
        <div class="footer-note">Made with 💜 by Franbot</div>
    </div>
    <script>
    function handleCredentialResponse(response) {
        fetch('google_auth.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'credential=' + encodeURIComponent(response.credential)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'chatbot.php';
            } else {
                alert('Google login failed!');
            }
        });
    }
    </script>
</body>
</html>