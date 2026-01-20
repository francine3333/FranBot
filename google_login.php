<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rischabot Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <meta name="google-signin-client_id" content="1078709518511-2e29t7tu8oj2chnkmer2jjtca328qina.apps.googleusercontent.com">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 50%, #f8a5d0 100%);
            font-family: 'Quicksand', Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            animation: backgroundShift 20s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { background: linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 50%, #f8a5d0 100%); }
            50% { background: linear-gradient(135deg, #fbc2eb 0%, #f8a5d0 50%, #ffe0f7 100%); }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 2.8rem;
            box-shadow: 0 20px 60px rgba(162, 28, 175, 0.25), 0 0 100px rgba(251, 194, 235, 0.1);
            padding: 3.5rem 3rem 3rem 3rem;
            max-width: 450px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(251, 194, 235, 0.5);
            animation: slideUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            animation-fill-mode: both;
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(60px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container::before {
            content: "";
            position: absolute;
            top: -100px;
            right: -100px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, #fbc2eb 0%, transparent 70%);
            z-index: 0;
            animation: float 20s ease-in-out infinite;
        }

        .login-container::after {
            content: "";
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 160px;
            height: 160px;
            background: radial-gradient(circle, #ffe0f7 0%, transparent 70%);
            z-index: 0;
            animation: float 25s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        .cute-emoji {
            font-size: 4rem;
            margin-bottom: 1rem;
            z-index: 1;
            position: relative;
            display: inline-block;
            animation: bounce 3s ease-in-out infinite;
            animation-delay: 0.3s;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-15px) scale(1.1); }
        }

        .login-title {
            font-family: 'Pacifico', cursive;
            color: #a21caf;
            font-size: 2.7rem;
            margin-bottom: 0.7rem;
            z-index: 1;
            position: relative;
            letter-spacing: 2px;
            animation: fadeInDown 0.8s ease-out 0.2s backwards;
            background: linear-gradient(135deg, #a21caf 0%, #c026d3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-desc {
            color: #c026d3;
            font-size: 1.2rem;
            margin-bottom: 1.8rem;
            z-index: 1;
            position: relative;
            animation: fadeInUp 0.8s ease-out 0.4s backwards;
            font-weight: 500;
            line-height: 1.6;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-tip {
            background: linear-gradient(135deg, #fbc2eb22 0%, #ffe0f722 100%);
            color: #a21caf;
            border-radius: 1.2rem;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            font-size: 1rem;
            z-index: 1;
            position: relative;
            display: inline-block;
            border: 1.5px solid #fbc2eb44;
            animation: fadeInUp 0.8s ease-out 0.5s backwards;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .login-tip:hover {
            background: linear-gradient(135deg, #fbc2eb33 0%, #ffe0f733 100%);
            border-color: #fbc2eb66;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(251, 194, 235, 0.2);
        }

        .g_id_signin {
            margin: 2.5rem auto 0 auto;
            display: flex;
            justify-content: center;
            z-index: 1;
            position: relative;
            animation: fadeInUp 0.8s ease-out 0.6s backwards;
            transition: all 0.3s ease;
        }

        .g_id_signin:hover {
            transform: scale(1.05);
        }

        .g_id_signin:active {
            transform: scale(0.98);
        }

        .footer-note {
            margin-top: 3rem;
            color: #a21caf;
            font-size: 0.95rem;
            z-index: 1;
            position: relative;
            opacity: 0.8;
            animation: fadeInUp 0.8s ease-out 0.7s backwards;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        .footer-note:hover {
            opacity: 1;
        }

        /* Loading state */
        .login-container.loading .cute-emoji {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg) scale(1); }
            100% { transform: rotate(360deg) scale(1); }
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .login-container {
                padding: 2.5rem 1.5rem 2rem 1.5rem;
                max-width: 95vw;
                border-radius: 2rem;
            }

            .login-title {
                font-size: 2.2rem;
                letter-spacing: 1px;
                margin-bottom: 0.5rem;
            }

            .login-desc {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .cute-emoji {
                font-size: 3.5rem;
                margin-bottom: 0.8rem;
            }

            .login-tip {
                padding: 0.8rem 1.2rem;
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
            }

            .g_id_signin {
                margin-top: 2rem;
            }

            .footer-note {
                margin-top: 2.5rem;
                font-size: 0.9rem;
            }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="cute-emoji">🤖</div>
        <div class="login-title">Welcome to Rischabot!</div>
        <div class="login-desc">Your AI Tutor • Learn Games • Daily Inspiration • Chat Anytime</div>
        <div class="login-tip">✨ Your data is safe and never shared. Privacy first, always.</div>
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
        <div class="footer-note">Made with care by Rischa Francine C. Lastimosa</div>
    </div>
    <script>
    // Smooth page transitions
    window.addEventListener('load', () => {
        document.body.style.opacity = '1';
    });

    // Handle credential response with smooth transitions
    function handleCredentialResponse(response) {
        const container = document.querySelector('.login-container');
        const emoji = document.querySelector('.cute-emoji');
        const title = document.querySelector('.login-title');
        const desc = document.querySelector('.login-desc');

        // Add loading class for animation
        container.classList.add('loading');
        emoji.textContent = '⏳';

        // Fade out other elements
        title.style.opacity = '0.5';
        desc.style.opacity = '0.5';

        // Send auth request
        fetch('google_auth.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'credential=' + encodeURIComponent(response.credential)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Success animation
                emoji.textContent = '✨';
                emoji.style.animation = 'none';
                emoji.style.animation = 'bounce 0.6s ease-out';
                
                title.style.opacity = '1';
                title.textContent = 'Welcome aboard! 🎉';
                desc.textContent = 'Redirecting to your dashboard...';
                desc.style.opacity = '1';

                // Smooth redirect
                setTimeout(() => {
                    container.style.opacity = '0';
                    container.style.transform = 'scale(0.95)';
                    container.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                    
                    setTimeout(() => {
                        window.location.href = 'chatbot.php';
                    }, 300);
                }, 1500);
            } else {
                // Error handling with animation
                container.classList.remove('loading');
                emoji.textContent = '❌';
                title.textContent = 'Oops!';
                title.style.color = '#f87171';
                desc.textContent = 'Login failed. Please try again.';
                desc.style.color = '#f87171';
                
                setTimeout(() => {
                    location.reload();
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            container.classList.remove('loading');
            emoji.textContent = '⚠️';
            title.textContent = 'Connection Error';
            title.style.color = '#f87171';
            desc.textContent = 'Please check your connection and try again.';
            desc.style.color = '#f87171';
        });
    }

    // Parallax effect on mouse move
    document.addEventListener('mousemove', (e) => {
        const container = document.querySelector('.login-container');
        const rect = container.getBoundingClientRect();
        const x = (e.clientX - rect.left - rect.width / 2) * 0.02;
        const y = (e.clientY - rect.top - rect.height / 2) * 0.02;

        container.style.transform = `perspective(1000px) rotateX(${-y}deg) rotateY(${x}deg)`;
        container.style.transition = 'none';
    });

    document.addEventListener('mouseout', () => {
        const container = document.querySelector('.login-container');
        container.style.transform = '';
        container.style.transition = 'transform 0.3s ease-out';
    });

    // Initial page load animation
    window.addEventListener('DOMContentLoaded', () => {
        const container = document.querySelector('.login-container');
        container.style.opacity = '1';
    });
    </script>
</body>
</html>