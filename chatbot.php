<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chatbot Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 100%);
      font-family: 'Quicksand', Arial, sans-serif;
    }
    .dashboard-layout {
      display: flex;
      min-height: 100vh;
      width: 100vw;
    }
    .sidebar {
      width: 260px;
      background: #fff;
      height: 100vh;
      box-shadow: 0 2px 16px #fbc2eb44;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-radius: 1.2rem 0 0 1.2rem;
      border-right: 3px solid #fbc2eb;
      position: relative;
      z-index: 2;
    }
    .main-content {
      flex: 1;
      padding: 2.5rem 0 2.5rem 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      background: transparent;
      min-height: 100vh;
    }
    /* Responsive for mobile */
    @media (max-width: 900px) {
      .dashboard-layout { flex-direction: column; }
      .sidebar { width: 100vw; height: auto; border-radius: 0 0 1.2rem 1.2rem; border-right: none; border-bottom: 3px solid #fbc2eb; }
      .main-content { padding: 1rem 0; }
    }
  </style>
  <!-- Fran Chatbot Styles -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .fran-title {
      font-family: 'Pacifico', cursive;
      letter-spacing: 2px;
      text-shadow: 0 2px 8px #fbc2eb88;
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      padding: 0.5rem 2rem;
      border-radius: 2rem;
      box-shadow: 0 4px 24px #fbc2eb44;
      color: #a21caf;
      display: inline-block;
      position: relative;
      z-index: 10;
      border: 2px solid #fbc2eb;
      animation: popIn 0.5s;
    }
    .fran-title::after {
      content: '';
      display: block;
      width: 60%;
      height: 4px;
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      border-radius: 2px;
      margin: 0.5rem auto 0 auto;
      opacity: 0.5;
    }
    .chat-bubble {
      max-width: 80%;
      padding: 1rem 1.5rem;
      border-radius: 2rem;
      margin-bottom: 0.5rem;
      font-size: 1.1rem;
      box-shadow: 0 2px 12px #fbc2eb33;
      word-break: break-word;
      position: relative;
      animation: popIn 0.3s;
    }
    .chat-bubble.user {
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
      align-self: flex-end;
      border-bottom-right-radius: 0.5rem;
    }
    .chat-bubble.bot {
      background: linear-gradient(90deg, #fff1fa 0%, #e9d5ff 100%);
      color: #7c3aed;
      align-self: flex-start;
      border-bottom-left-radius: 0.5rem;
      border: 2px solid #fbc2eb;
      position: relative;
    }
    .chat-bubble.bot::before {
      content: "Fran";
      position: absolute;
      top: -1.5rem;
      left: 1.5rem;
      background: #fbc2eb;
      color: #a21caf;
      font-family: 'Pacifico', cursive;
      font-size: 1rem;
      padding: 0.1rem 0.8rem;
      border-radius: 1rem;
      box-shadow: 0 2px 8px #fbc2eb33;
      letter-spacing: 1px;
      z-index: 2;
      border: 1px solid #f8b6e0;
      opacity: 0.9;
      animation: popIn 0.4s;
    }
    @keyframes popIn {
      0% { transform: scale(0.95); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
    .scrollbar-girly::-webkit-scrollbar {
      width: 8px;
      background: #fbc2eb;
      border-radius: 8px;
    }
    .scrollbar-girly::-webkit-scrollbar-thumb {
      background: #f8b6e0;
      border-radius: 8px;
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
            <a href="#" style="display: flex; align-items: center; padding: 0.6rem; color: #a21caf; border-radius: 0.7rem; text-decoration: none; font-weight: 600; background: #fbc2eb22;">
                <span style="margin-right: 0.7rem;">
                    <!-- Home Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.5L12 3l9 6.5v9.5a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H3a2 2 0 01-2-2V9.5z" />
                    </svg>
                </span>
                <span>My Chatbots</span>
            </a>
            <a href="#" style="display: flex; align-items: center; padding: 0.6rem; color: #a21caf; border-radius: 0.7rem; text-decoration: none; font-weight: 600;">
                <span style="margin-right: 0.7rem;">
                    <!-- View Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12l-3-3m0 0l-3 3m3-3v12M5 12a7 7 0 0114 0v4a2 2 0 01-2 2H7a2 2 0 01-2-2v-4z" />
                    </svg>
                </span>
                <span>Recent Messages</span>
            </a>
            
           
            <hr style="margin: 0.8rem 0; border-color: #fbc2eb;">
           
            <a href="#" style="display: flex; align-items: center; padding: 0.6rem; color: #a21caf; border-radius: 0.7rem; text-decoration: none; font-weight: 600;">
                <span style="margin-right: 0.7rem;">
                    <!-- Visual Look Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h4m-4-2h6m-6 4h6m-6 4h4M6 12H2m0-2h6m-6 4h6M8 6h8M8 18h8m-5 0v4m-2-4v4M8 3v4m0 12v4" />
                    </svg>
                </span>
                <span>Daily Quotes</span>
            </a>
            <a href="#" style="display: flex; align-items: center; padding: 0.6rem; color: #a21caf; border-radius: 0.7rem; text-decoration: none; font-weight: 600;">
                <span style="margin-right: 0.7rem;">
                    <!-- Embed Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M4 7h.01M12 3v4M3 12h18M16 7h.01M12 20v-4m-8 5h16" />
                    </svg>
                </span>
                <span>Mini-Games</span>
            </a>
            <a href="#" style="display: flex; align-items: center; padding: 0.6rem; color: #a21caf; border-radius: 0.7rem; text-decoration: none; font-weight: 600;">
                <span style="margin-right: 0.7rem;">
                    <!-- Add-ons Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h-6v7h6V5zm0 7h6V5h-6v7zm-1 6h8M8 17h-3m8-6h1v1m-3 0h1v1m-2-2h1v1m-3 0h1v1m-2-2h1v1m-1 5h5" />
                    </svg>
                </span>
                <span>Theme Customizer</span>
            </a>
            <hr style="margin: 0.8rem 0; border-color: #fbc2eb;">
            <a href="#" style="display: flex; align-items: center; padding: 0.6rem; color: #a21caf; border-radius: 0.7rem; text-decoration: none; font-weight: 600;">
                <span style="margin-right: 0.7rem;">
                    <!-- Settings Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 1v3M8.5 2.5l2 2M1 12h3m16 0h3m-9 7l2 2M6.5 21.5l2-2M21 12l2-2M6 9h12v6H6V9z" />
                    </svg>
                </span>
                <span>Settings</span>
            </a>
            <a href="google_login.php" style="display: flex; align-items: center; padding: 0.6rem; color: #a21caf; border-radius: 0.7rem; text-decoration: none; font-weight: 600;">
                <span style="margin-right: 0.7rem;">
                    <!-- Integrations Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 1v22M5 12h14M9 5l6 6-6 6" />
                    </svg>
                </span>
                <span>Logout</span>
            </a>
        </nav>
    </div>
    <div id="sidebar-footer" style="padding: 1rem; text-align: center; background: #a21caf; color: #fff; font-size: 0.98rem; border-radius: 0 0 1rem 1rem;">
   <a href="https://galichat.com" id="footer-link" style="color: #ffe0f7; text-decoration: underline;"></a></p>
    <label style="display: flex; align-items: center; justify-content: center; gap: 1rem; margin-top: 1rem; cursor: pointer;">
        <input type="checkbox" id="toggle-mode" style="width: 0; height: 0; opacity: 0;">
        <span id="toggle-slider"
            style="
                display: inline-block;
                width: 56px;
                height: 32px;
                background: #fff;
                border-radius: 999px;
                position: relative;
                transition: background 0.3s;
                vertical-align: middle;
            ">
            <span id="toggle-knob"
                style="
                    position: absolute;
                    top: 4px;
                    left: 4px;
                    width: 24px;
                    height: 24px;
                    background: #a21caf;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #fff;
                    font-size: 1.2rem;
                    transition: left 0.3s, background 0.3s, color 0.3s;
                ">
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
        <span id="toggle-label" style="font-weight: 600;">Light Mode</span>
    </label>
</div>
  </aside>
  <!-- Main Content (Chatbot) -->
  <main class="main-content">
    <div class="bg-white/90 shadow-2xl rounded-3xl p-8 max-w-2xl w-full border-4 border-pink-300 relative" style="margin: 2rem auto;">
      <div class="flex flex-col items-center gap-2 mb-6">
        <h2 class="text-4xl font-extrabold fran-title drop-shadow-lg">Fran Intelligence Bot</h2>
        <span class="text-lg text-pink-500 font-semibold italic tracking-wide">Your Girlie AI Bestie ✨</span>
      </div>
      <div class="mb-4 flex flex-col gap-2 max-h-72 overflow-y-auto scrollbar-girly" id="chat-history">
        <!-- Chat bubbles will be appended here -->
      </div>
      <div id="typing-indicator" class="text-center text-pink-600 italic mt-3 hidden">
        <span class="inline-flex items-center gap-1">
          Fran is typing
          <span class="dot1 animate-bounce">.</span>
          <span class="dot2 animate-bounce delay-100">.</span>
          <span class="dot3 animate-bounce delay-200">.</span>
        </span>
      </div>
      <form method="POST" action="chatbot.php" id="chat-form" class="space-y-4 mt-4">
        <textarea 
          name="message" 
          placeholder="Ask me anything, sweetie..." 
          class="w-full p-4 border-2 border-fuchsia-200 rounded-2xl bg-pink-50 focus:outline-none focus:ring-2 focus:ring-fuchsia-400 resize-none min-h-[100px] placeholder-pink-400 text-gray-700 transition-shadow shadow-inner"
          style="font-family: 'Quicksand', cursive, sans-serif;"
        ></textarea>
        <div class="flex gap-2">
          <button 
            type="submit" 
            class="flex-1 bg-gradient-to-r from-pink-400 to-fuchsia-500 text-white py-3 rounded-full hover:opacity-90 transition duration-300 font-semibold tracking-wide shadow-lg"
          >
            💌 Send
          </button>
          <button 
            type="button" 
            id="stop-generating" 
            class="flex-1 bg-yellow-400 text-white py-3 rounded-full font-semibold tracking-wide hover:opacity-90 transition duration-300 shadow-lg hidden"
          >
            ✋ Stop
          </button>
        </div>
        <div class="flex items-center space-x-2">
          <input type="checkbox" id="tts-toggle" checked class="h-5 w-5 text-pink-500 focus:ring-pink-400 rounded border-pink-300 accent-pink-400">
          <label for="tts-toggle" class="text-pink-700 font-medium">Enable AI Voice</label>
        </div>
      </form>
      <button id="delete-chat" class="mt-4 w-full bg-red-400 text-white py-2 rounded-full hover:opacity-90 transition duration-300 font-semibold tracking-wide shadow-lg">
        🗑️ Clear Conversation
      </button>
    </div>
  </main>
</div>
<script>
const toggleInput = document.getElementById('toggle-mode');
const toggleSlider = document.getElementById('toggle-slider');
const toggleKnob = document.getElementById('toggle-knob');
const toggleLabel = document.getElementById('toggle-label');
const sidebarFooter = document.getElementById('sidebar-footer');
const footerLink = document.getElementById('footer-link');
const body = document.body;
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const iconMoon = document.getElementById('toggle-icon-moon');
const iconSun = document.getElementById('toggle-icon-sun');

toggleInput.addEventListener('change', function() {
  if (toggleInput.checked) {
    // Dark Mode
    body.style.background = "#222";
    sidebar.style.background = "#181028";
    sidebar.style.color = "#fff";
    mainContent.style.background = "transparent";
    sidebarFooter.style.background = "#181028";
    sidebarFooter.style.color = "#fff";
    footerLink.style.color = "#fbc2eb";
    document.querySelectorAll('.sidebar a').forEach(a => {
      a.style.color = "#fff";
      a.style.background = "transparent";
    });
    toggleSlider.style.background = "#2563eb";
    toggleKnob.style.left = "28px";
    toggleKnob.style.background = "#2563eb";
    toggleKnob.style.color = "#2563eb";
    iconMoon.style.display = "none";
    iconSun.style.display = "block";
    toggleLabel.textContent = "Dark Mode";
  } else {
    // Light Mode
    body.style.background = "linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 100%)";
    sidebar.style.background = "#fff";
    sidebar.style.color = "#a21caf";
    mainContent.style.background = "transparent";
    sidebarFooter.style.background = "#a21caf";
    sidebarFooter.style.color = "#fff";
    footerLink.style.color = "#ffe0f7";
    document.querySelectorAll('.sidebar a').forEach(a => {
      a.style.color = "#a21caf";
      a.style.background = "transparent";
    });
    toggleSlider.style.background = "#fff";
    toggleKnob.style.left = "4px";
    toggleKnob.style.background = "#a21caf";
    toggleKnob.style.color = "#a21caf";
    iconMoon.style.display = "block";
    iconSun.style.display = "none";
    toggleLabel.textContent = "Light Mode";
  }
});
  // ...keep your chatbot.js code here (unchanged)...
  const form = document.getElementById('chat-form');
  const chatHistory = document.getElementById('chat-history');
  const typingIndicator = document.getElementById('typing-indicator');
  const ttsToggle = document.getElementById('tts-toggle');
  const deleteButton = document.getElementById('delete-chat');
  const stopBtn = document.getElementById('stop-generating');
  const synth = window.speechSynthesis;

  let typingInterval = null;
  let stopTyping = false;

  function addBubble(text, sender = 'bot') {
    const bubble = document.createElement('div');
    bubble.className = `chat-bubble ${sender}`;
    bubble.innerText = text;
    chatHistory.appendChild(bubble);
    chatHistory.scrollTop = chatHistory.scrollHeight;
  }

  function speakText(text) {
    let voices = synth.getVoices();
    if (synth.speaking) synth.cancel();
    if (!ttsToggle || !ttsToggle.checked) return;

    const sanitizedText = text
      .split(/\s+/)
      .filter(word => {
        return !/^https?:\/\//i.test(word) &&
          !/^(google|search|results|definition|meaning|links)$/i.test(word);
      })
      .join(' ');

    if (!sanitizedText.trim()) return;

    function isClearlyFemale(voice) {
      const name = voice.name.toLowerCase();
      const femaleKeywords = ['zira', 'susan', 'samantha', 'eva', 'linda', 'female', 'karen', 'natasha', 'moira', 'zoe', 'hoda'];
      return femaleKeywords.some(keyword => name.includes(keyword));
    }

    function getEmotionTone(text) {
      if (text.includes("!")) return { pitch: 1.6, rate: 1.2 };
      if (text.includes("?")) return { pitch: 1.4, rate: 1.1 };
      if (/haha|lol|funny|joke/i.test(text)) return { pitch: 1.7, rate: 1.3 };
      if (/sad|unfortunately|sorry/i.test(text)) return { pitch: 0.9, rate: 0.9 };
      return { pitch: 1.2, rate: 1.0 };
    }

    function getAndSpeakWithFemaleVoice() {
      voices = synth.getVoices();
      const femaleVoice = voices.find(v => isClearlyFemale(v));

      if (!femaleVoice) {
        alert("🚫 No female voice found! Please install one (e.g., Microsoft Zira or Google US English Female).");
        return;
      }

      const { pitch, rate } = getEmotionTone(sanitizedText);
      const utterance = new SpeechSynthesisUtterance(sanitizedText.trim());
      utterance.voice = femaleVoice;
      utterance.pitch = pitch;
      utterance.rate = rate;
      utterance.volume = 1;

      if (sanitizedText.length < 10) {
        utterance.text += " ...that’s it? You sure you don’t want to say more?";
      }

      synth.speak(utterance);
    }

    if (!voices.length) {
      const waitForVoices = setInterval(() => {
        voices = synth.getVoices();
        if (voices.length) {
          clearInterval(waitForVoices);
          getAndSpeakWithFemaleVoice();
        }
      }, 100);
    } else {
      getAndSpeakWithFemaleVoice();
    }
  }

  ttsToggle?.addEventListener('change', () => {
    if (!ttsToggle.checked) synth.cancel();
  });

  form.addEventListener('submit', async function (e) {
    e.preventDefault();
    stopTyping = false;

    const formData = new FormData(form);
    const message = formData.get('message');
    if (!message.trim()) return;

    addBubble(message, 'user');
    typingIndicator.classList.remove('hidden');
    stopBtn.classList.remove('hidden');

    setTimeout(async () => {
      const response = await fetch('fetch_response.php', {
        method: 'POST',
        body: formData
      });
      const text = await response.text();
      displayTypingEffect(text, () => {
        speakText(text);
      });
    }, 800);
    form.reset();
  });

  stopBtn.addEventListener('click', () => {
    stopTyping = true;
    clearInterval(typingInterval);
    typingIndicator.classList.add('hidden');
    stopBtn.classList.add('hidden');
  });

  function displayTypingEffect(text, callback) {
    let index = 0;
    let botText = '';
    typingInterval = setInterval(() => {
      if (stopTyping || index >= text.length) {
        clearInterval(typingInterval);
        typingIndicator.classList.add('hidden');
        stopBtn.classList.add('hidden');
        addBubble(botText, 'bot');
        if (callback) callback();
        return;
      }
      botText += text.charAt(index++);
    }, 30);
  }

  deleteButton.addEventListener('click', () => {
    chatHistory.innerHTML = '';
    addBubble('Chat cleared! 💅', 'bot');
  });

  window.onload = () => {
    chatHistory.innerHTML = '';
    addBubble('Hi sweetie! I\'m Fran. How can I help you today? 🌸', 'bot');
  };
</script>
</body>
</html>