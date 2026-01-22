<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>My Chatbot - Rischa Chatbot</title>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background: linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 50%, #f8a5d0 100%);
      font-family: 'Quicksand', Arial, sans-serif;
      animation: bgShift 20s ease-in-out infinite;
    }

    @keyframes bgShift {
      0%, 100% { background: linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 50%, #f8a5d0 100%); }
      50% { background: linear-gradient(135deg, #fbc2eb 0%, #f8a5d0 50%, #ffe0f7 100%); }
    }

    .dashboard-layout {
      display: flex;
      min-height: 100vh;
      width: 100vw;
      animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .sidebar {
      width: 260px;
      background: #fff;
      height: 100vh;
      box-shadow: 0 8px 32px #fbc2eb33;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-radius: 1.2rem 0 0 1.2rem;
      border-right: 3px solid #fbc2eb;
      position: fixed;
      left: 0;
      top: 0;
      z-index: 100;
      overflow-y: auto;
    }

    .main-content {
      flex: 1;
      padding: 2.5rem;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      background: transparent;
      min-height: 100vh;
      margin-left: 260px;
      overflow-y: auto;
    }

    .nav-link {
      display: flex;
      align-items: center;
      padding: 0.6rem;
      color: #a21caf;
      border-radius: 0.7rem;
      text-decoration: none;
      font-weight: 600;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .nav-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: #fbc2eb22;
      transition: left 0.3s ease;
      z-index: -1;
    }

    .nav-link:hover::before {
      left: 0;
    }

    .nav-link:hover {
      transform: translateX(5px);
    }

    .nav-link.active {
      background: #fbc2eb44;
      border-left: 3px solid #a21caf;
      padding-left: calc(0.6rem - 3px);
    }

    .page-title {
      font-family: 'Pacifico', cursive;
      font-size: 2.5rem;
      color: #a21caf;
      margin-bottom: 2rem;
      text-shadow: 0 2px 8px #fbc2eb88;
    }

    .chatbot-container {
      background: rgba(255, 241, 250, 0.95);
      backdrop-filter: blur(20px);
      border: 2px solid #fbc2eb;
      border-radius: 1.8rem;
      padding: 2rem;
      max-width: 800px;
      width: 100%;
      display: flex;
      flex-direction: column;
      height: 85vh;
      box-shadow: 0 8px 40px #fbc2eb44;
      transition: all 0.3s ease;
    }

    .chatbot-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 32px #fbc2eb66;
      border-color: #f8b6e0;
    }

    .chat-header {
      text-align: center;
      margin-bottom: 1.5rem;
      animation: fadeInUp 0.6s ease-out 0.2s backwards;
    }

    @keyframes fadeInUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .chat-header h2 {
      font-family: 'Pacifico', cursive;
      font-size: 1.8rem;
      color: #a21caf;
      margin: 0;
      background: linear-gradient(135deg, #a21caf 0%, #c026d3 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .chat-header p {
      color: #f8616b;
      font-style: italic;
      margin: 0.5rem 0 0 0;
      animation: fadeInUp 0.6s ease-out 0.3s backwards;
    }

    .chat-history {
      flex: 1;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
      padding-right: 0.5rem;
    }
    .chat-history::-webkit-scrollbar {
      width: 6px;
    }
    .chat-history::-webkit-scrollbar-track {
      background: #fbc2eb22;
      border-radius: 10px;
    }
    .chat-history::-webkit-scrollbar-thumb {
      background: #fbc2eb;
      border-radius: 10px;
    }
    .chat-bubble {
      max-width: 85%;
      padding: 1rem 1.5rem;
      border-radius: 1.5rem;
      word-break: break-word;
      animation: slideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
      display: inline-block;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .chat-bubble:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    @keyframes slideIn {
      from { opacity: 0; transform: translateY(10px) scale(0.95); }
      to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .chat-bubble.user {
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
      align-self: flex-end;
      border-bottom-right-radius: 0.5rem;
    }

    .chat-bubble.bot {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      color: #7c3aed;
      border: 2px solid #fbc2eb;
      align-self: flex-start;
      border-bottom-left-radius: 0.5rem;
    }

    .typing-indicator {
      color: #f8616b;
      font-style: italic;
      margin-top: 0.5rem;
      display: none;
      animation: pulse 1.5s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 1; }
    }

    .typing-indicator.show {
      display: block;
    }
    .chat-form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .chat-input {
      width: 100%;
      padding: 1rem;
      border: 2px solid #fbc2eb;
      border-radius: 1rem;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      color: #a21caf;
      font-family: 'Quicksand', sans-serif;
      font-size: 1rem;
      resize: none;
      min-height: 80px;
      transition: all 0.3s ease;
    }

    .chat-input::placeholder {
      color: #f8b6e0;
    }

    .chat-input:focus {
      outline: none;
      border-color: #a21caf;
      box-shadow: 0 0 16px #fbc2eb44;
      background: rgba(255, 255, 255, 1);
      transform: scale(1.02);
    }

    .chat-buttons {
      display: flex;
      gap: 1rem;
      animation: fadeInUp 0.6s ease-out 0.3s backwards;
    }

    .btn {
      flex: 1;
      padding: 0.9rem 1.5rem;
      border: none;
      border-radius: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      font-size: 1rem;
      position: relative;
      overflow: hidden;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }

    .btn:active::before {
      width: 300px;
      height: 300px;
    }

    .btn-send {
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
      box-shadow: 0 4px 15px #fbc2eb33;
    }

    .btn-send:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px #fbc2eb44;
    }

    .btn-send:active {
      transform: translateY(-1px);
    }

    .btn-clear {
      background: linear-gradient(90deg, #f87171 0%, #fb7185 100%);
      color: #fff;
      box-shadow: 0 4px 15px rgba(248, 97, 107, 0.3);
    }

    .btn-clear:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(248, 97, 107, 0.4);
    }

    .btn-clear:active {
      transform: translateY(-1px);
    }
    .chat-options {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-top: 0.5rem;
    }
    .chat-checkbox {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: #a21caf;
      font-weight: 600;
    }
    .chat-checkbox input {
      width: 18px;
      height: 18px;
      cursor: pointer;
    }
    @media (max-width: 900px) {
      .dashboard-layout { flex-direction: column; }
      .sidebar { width: 100vw; height: auto; border-radius: 0; border-right: none; border-bottom: 3px solid #fbc2eb; }
      .main-content { padding: 1.5rem; margin-left: 0; }
      .chatbot-container { height: auto; min-height: 500px; }
      .chat-bubble { max-width: 95%; }
    }
  </style>
</head>
<body>
<div class="dashboard-layout">
  <!-- Sidebar -->
  <aside class="sidebar">
    <div style="padding: 1.5rem;">
        <h1 style="font-size: 1.3rem; font-family: 'Pacifico', cursive; color: #a21caf; font-weight: bold; margin-bottom: 1.2rem;">Chatbot Dashboard</h1>
        <nav style="display: flex; flex-direction: column; gap: 0.5rem;">
            <a href="chatbot.php" class="nav-link" style="background: #fbc2eb22;">
                <span style="margin-right: 0.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.5L12 3l9 6.5v9.5a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H3a2 2 0 01-2-2V9.5z" />
                    </svg>
                </span>
                <span>My Chatbots</span>
            </a>
            <hr style="margin: 0.8rem 0; border-color: #fbc2eb;">
            <a href="daily_quotes.php" class="nav-link">
                <span style="margin-right: 0.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h4m-4-2h6m-6 4h6m-6 4h4M6 12H2m0-2h6m-6 4h6M8 6h8M8 18h8m-5 0v4m-2-4v4M8 3v4m0 12v4" />
                    </svg>
                </span>
                <span>Daily Quotes</span>
            </a>
            <a href="mini_games.php" class="nav-link">
                <span style="margin-right: 0.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M4 7h.01M12 3v4M3 12h18M16 7h.01M12 20v-4m-8 5h16" />
                    </svg>
                </span>
                <span>Mini-Games</span>
            </a>
            <a href="theme_customizer.php" class="nav-link">
                <span style="margin-right: 0.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h-6v7h6V5zm0 7h6V5h-6v7zm-1 6h8M8 17h-3m8-6h1v1m-3 0h1v1m-2-2h1v1m-3 0h1v1m-2-2h1v1m-1 5h5" />
                    </svg>
                </span>
                <span>Theme Customizer</span>
            </a>
            <hr style="margin: 0.8rem 0; border-color: #fbc2eb;">
            <a href="settings.php" class="nav-link">
                <span style="margin-right: 0.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 1v3M8.5 2.5l2 2M1 12h3m16 0h3m-9 7l2 2M6.5 21.5l2-2M21 12l2-2M6 9h12v6H6V9z" />
                    </svg>
                </span>
                <span>Settings</span>
            </a>
        </nav>
    </div>
    <div style="padding: 1rem; text-align: center; background: #a21caf; color: #fff; font-size: 0.98rem; border-radius: 0 0 1rem 1rem; margin-top: auto;">
        <p style="margin: 0 0 0.8rem 0; font-size: 0.85rem;">© 2026 Rischa Francine C. Lastimosa</p>
        <label style="display: flex; align-items: center; justify-content: center; gap: 1rem; cursor: pointer;">
            <input type="checkbox" id="toggle-mode" style="width: 0; height: 0; opacity: 0;">
            <span id="toggle-slider" style="display: inline-block; width: 56px; height: 32px; background: #fff; border-radius: 999px; position: relative; transition: background 0.3s; vertical-align: middle;">
                <span id="toggle-knob" style="position: absolute; top: 4px; left: 4px; width: 24px; height: 24px; background: #a21caf; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.2rem; transition: left 0.3s, background 0.3s, color 0.3s;">
                    <svg id="toggle-icon-moon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24">
                        <path fill="#fff" d="M21 13.05A9 9 0 0 1 10.95 3a7 7 0 1 0 10.05 10.05Z"/>
                    </svg>
                    <svg id="toggle-icon-sun" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" style="display:none;">
                        <circle cx="12" cy="12" r="5" fill="#fff"/>
                        <g stroke="#fff" stroke-width="2">
                            <line x1="12" y1="1" x2="12" y2="3"/>
                            <line x1="12" y1="21" x2="12" y2="23"/>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                            <line x1="1" y1="12" x2="3" y2="12"/>
                            <line x1="21" y1="12" x2="23" y2="12"/>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                        </g>
                    </svg>
                </span>
            </span>
            <span id="toggle-label" style="font-weight: 600; font-size: 0.85rem;">Light Mode</span>
        </label>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <div style="width: 100%; max-width: 900px;">
      <h1 class="page-title">Rischa Intelligence Bot</h1>
      
      <div class="chatbot-container">
        <div class="chat-header">
          <h2>Your AI Tutor</h2>
          <p>Ask me anything, sweetie!</p>
        </div>

        <div class="chat-history" id="chat-history">
          <!-- Chat bubbles will be appended here -->
        </div>

        <div class="typing-indicator" id="typing-indicator">
          Rischa is typing...
        </div>

        <form id="chat-form" class="chat-form">
          <textarea 
            id="chat-input"
            name="message" 
            class="chat-input" 
            placeholder="Ask me anything, sweetie..."
            required
          ></textarea>

          <div class="chat-buttons">
            <button type="submit" class="btn btn-send">Send</button>
            <button type="button" class="btn btn-clear" id="clear-btn">Clear</button>
          </div>

          <div class="chat-options">
            <label class="chat-checkbox">
              <input type="checkbox" id="voice-toggle" checked>
              <span>Enable AI Voice</span>
            </label>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<script>
const chatHistory = document.getElementById('chat-history');
const chatForm = document.getElementById('chat-form');
const chatInput = document.getElementById('chat-input');
const typingIndicator = document.getElementById('typing-indicator');
const clearBtn = document.getElementById('clear-btn');
const voiceToggle = document.getElementById('voice-toggle');
const toggleInput = document.getElementById('toggle-mode');
const toggleSlider = document.getElementById('toggle-slider');
const toggleKnob = document.getElementById('toggle-knob');
const toggleLabel = document.getElementById('toggle-label');
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const body = document.body;
const iconMoon = document.getElementById('toggle-icon-moon');
const iconSun = document.getElementById('toggle-icon-sun');

let stopTyping = false;
let typingInterval;

function addBubble(text, sender = 'bot') {
  const bubble = document.createElement('div');
  bubble.className = `chat-bubble ${sender}`;
  bubble.innerText = text;
  chatHistory.appendChild(bubble);
  chatHistory.scrollTop = chatHistory.scrollHeight;
}

chatForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  
  const message = chatInput.value.trim();
  if (!message) return;

  addBubble(message, 'user');
  typingIndicator.classList.add('show');
  stopTyping = false;

  setTimeout(async () => {
    try {
      const formData = new FormData();
      formData.append('message', message);

      const response = await fetch('fetch_response.php', {
        method: 'POST',
        body: formData
      });

      if (!response.ok) {
        displayTypingEffect('Sorry, there was an error. Please try again.', () => {
          if (voiceToggle.checked) speakText('Sorry, there was an error. Please try again.');
        });
        return;
      }

      const text = await response.text();

      if (!text || text.trim() === '') {
        displayTypingEffect('I got an empty response. Please try again.', () => {
          if (voiceToggle.checked) speakText('I got an empty response. Please try again.');
        });
        return;
      }

      displayTypingEffect(text, () => {
        if (voiceToggle.checked) speakText(text);
      });
    } catch (error) {
      console.error('Fetch error:', error);
      displayTypingEffect('Network error. Please check your connection and try again.', () => {
        if (voiceToggle.checked) speakText('Network error. Please check your connection and try again.');
      });
    }
  }, 800);

  chatForm.reset();
});

clearBtn.addEventListener('click', () => {
  chatHistory.innerHTML = '';
  addBubble('Chat cleared!', 'bot');
});

function displayTypingEffect(text, callback) {
  let index = 0;
  let botText = '';
  typingInterval = setInterval(() => {
    if (stopTyping || index >= text.length) {
      clearInterval(typingInterval);
      typingIndicator.classList.remove('show');
      addBubble(botText, 'bot');
      if (callback) callback();
      chatForm.reset();
      chatInput.focus();
      return;
    }
    botText += text.charAt(index++);
  }, 30);
}

function speakText(text) {
  if ('speechSynthesis' in window) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.rate = 1;
    utterance.pitch = 1.5;
    // Set female voice
    const voices = speechSynthesis.getVoices();
    const femaleVoice = voices.find(voice => voice.name.includes('female') || voice.name.includes('Female') || voice.name.includes('woman') || voice.name.includes('Woman')) || voices.find(voice => voice.name.includes('Google UK English Female')) || voices[1];
    if (femaleVoice) {
      utterance.voice = femaleVoice;
    }
    speechSynthesis.speak(utterance);
  }
}

// Apply saved dark mode preference on page load
function applyDarkMode(isDark) {
  if (isDark) {
    toggleInput.checked = true;
    body.style.background = "#222";
    sidebar.style.background = "#181028";
    sidebar.style.color = "#fff";
    mainContent.style.background = "transparent";
    document.querySelectorAll('.nav-link').forEach(a => a.style.color = "#fff");
    toggleSlider.style.background = "#2563eb";
    toggleKnob.style.left = "28px";
    toggleKnob.style.background = "#2563eb";
    iconMoon.style.display = "none";
    iconSun.style.display = "block";
    toggleLabel.textContent = "Dark Mode";
    document.querySelector('.chatbot-container').style.background = "linear-gradient(135deg, #2a1a3f 0%, #3d2555 100%)";
    document.querySelector('.chatbot-container').style.borderColor = "#5a3a6f";
    document.querySelectorAll('.chat-bubble.bot').forEach(el => {
      el.style.background = "#1a0f2e";
      el.style.borderColor = "#5a3a6f";
      el.style.color = "#d4a5d4";
    });
    document.querySelector('.chat-input').style.background = "#1a0f2e";
    document.querySelector('.chat-input').style.color = "#d4a5d4";
    document.querySelector('.chat-input').style.borderColor = "#5a3a6f";
  } else {
    toggleInput.checked = false;
    body.style.background = "linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 100%)";
    sidebar.style.background = "#fff";
    sidebar.style.color = "#a21caf";
    mainContent.style.background = "transparent";
    document.querySelectorAll('.nav-link').forEach(a => a.style.color = "#a21caf");
    toggleSlider.style.background = "#fff";
    toggleKnob.style.left = "4px";
    toggleKnob.style.background = "#a21caf";
    iconMoon.style.display = "block";
    iconSun.style.display = "none";
    toggleLabel.textContent = "Light Mode";
    document.querySelector('.chatbot-container').style.background = "linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%)";
    document.querySelector('.chatbot-container').style.borderColor = "#fbc2eb";
    document.querySelectorAll('.chat-bubble.bot').forEach(el => {
      el.style.background = "#fff";
      el.style.borderColor = "#fbc2eb";
      el.style.color = "#7c3aed";
    });
    document.querySelector('.chat-input').style.background = "#fff";
    document.querySelector('.chat-input').style.color = "#a21caf";
    document.querySelector('.chat-input').style.borderColor = "#fbc2eb";
  }
}

// Dark Mode Toggle - Save to localStorage
toggleInput.addEventListener('change', function() {
  const isDark = toggleInput.checked;
  localStorage.setItem('darkMode', isDark ? 'true' : 'false');
  applyDarkMode(isDark);
});

// Load saved preference on page load
window.addEventListener('DOMContentLoaded', () => {
  const savedDarkMode = localStorage.getItem('darkMode') === 'true';
  applyDarkMode(savedDarkMode);
});

// Initialize chat
window.addEventListener('load', () => {
  if (chatHistory.children.length === 0) {
    addBubble('Hi sweetie! I\'m Rischa. How can I help you today?', 'bot');
  }
  chatInput.focus();
});
</script>
</body>
</html>
