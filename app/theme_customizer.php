<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>Theme Customizer - Rischa Chatbot</title>
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
      transition: all 0.3s ease;
    }
    .nav-link:hover {
      background: #fbc2eb22;
    }
    .nav-link.active {
      background: #fbc2eb44;
      border-left: 3px solid #a21caf;
      padding-left: calc(0.6rem - 3px);
    }
    .customizer-container {
      max-width: 800px;
      width: 100%;
      background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%);
      border: 2px solid #fbc2eb;
      border-radius: 1.5rem;
      padding: 3rem;
      box-shadow: 0 4px 24px #fbc2eb44;
    }
    .page-title {
      font-family: 'Pacifico', cursive;
      font-size: 2.5rem;
      color: #a21caf;
      margin-bottom: 2rem;
      text-shadow: 0 2px 8px #fbc2eb88;
    }
    .theme-section {
      margin-bottom: 2.5rem;
    }
    .section-title {
      font-size: 1.3rem;
      color: #a21caf;
      font-weight: 600;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .color-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    .color-option {
      cursor: pointer;
      padding: 1rem;
      border-radius: 1rem;
      border: 3px solid transparent;
      transition: all 0.3s ease;
      text-align: center;
      font-weight: 600;
      color: #a21caf;
    }
    .color-option:hover {
      transform: scale(1.05);
    }
    .color-option.selected {
      border-color: #a21caf;
      box-shadow: 0 4px 12px #fbc2eb44;
    }
    .font-option {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .font-btn {
      flex: 1;
      padding: 1rem;
      border: 2px solid #fbc2eb;
      border-radius: 1rem;
      background: #fff;
      color: #a21caf;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .font-btn:hover {
      background: #fbc2eb22;
    }
    .font-btn.selected {
      background: #fbc2eb;
      color: #fff;
      border-color: #a21caf;
    }
    .slider-group {
      margin-bottom: 1.5rem;
    }
    .slider-label {
      display: flex;
      justify-content: space-between;
      margin-bottom: 0.5rem;
      color: #a21caf;
      font-weight: 600;
    }
    .slider {
      width: 100%;
      height: 6px;
      border-radius: 3px;
      background: #fbc2eb44;
      outline: none;
      -webkit-appearance: none;
      appearance: none;
    }
    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      cursor: pointer;
      box-shadow: 0 2px 8px #fbc2eb44;
    }
    .slider::-moz-range-thumb {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      cursor: pointer;
      box-shadow: 0 2px 8px #fbc2eb44;
      border: none;
    }
    .preview-box {
      background: #fff;
      border: 2px solid #fbc2eb;
      border-radius: 1rem;
      padding: 2rem;
      margin-top: 2rem;
      text-align: center;
    }
    .preview-text {
      color: #a21caf;
      font-size: 1.2rem;
    }
    .save-btn {
      width: 100%;
      padding: 1rem;
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
      border: none;
      border-radius: 1rem;
      font-weight: 600;
      font-size: 1.1rem;
      cursor: pointer;
      margin-top: 2rem;
      transition: all 0.3s ease;
    }
    .save-btn:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 12px #fbc2eb44;
    }
    @media (max-width: 900px) {
      .dashboard-layout { flex-direction: column; }
      .sidebar { width: 100vw; height: auto; border-radius: 0; border-right: none; border-bottom: 3px solid #fbc2eb; }
      .main-content { padding: 1.5rem; }
      .customizer-container { padding: 1.5rem; }
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
            <a href="chatbot.php" class="nav-link">
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
            <a href="theme_customizer.php" class="nav-link active">
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
        <label style="display: flex; align-items: center; justify-content: center; gap: 1rem; margin-top: 1rem; cursor: pointer;">
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
    <div class="customizer-container">
      <h1 class="page-title">Theme Customizer</h1>

      <!-- Color Theme Section -->
      <div class="theme-section">
        <div class="section-title">Color Theme</div>
        <div class="color-grid">
          <div class="color-option selected" style="background: linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 100%);" onclick="selectColor(this, 'pink')">
            Pink
          </div>
          <div class="color-option" style="background: linear-gradient(135deg, #e0f7ff 0%, #b2ebf2 100%); color: #0277bd;" onclick="selectColor(this, 'cyan')">
            Cyan
          </div>
          <div class="color-option" style="background: linear-gradient(135deg, #f3e5f5 0%, #ce93d8 100%);" onclick="selectColor(this, 'purple')">
            Purple
          </div>
          <div class="color-option" style="background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%); color: #e65100;" onclick="selectColor(this, 'orange')">
            Orange
          </div>
          <div class="color-option" style="background: linear-gradient(135deg, #f1f8e9 0%, #c5e1a5 100%); color: #558b2f;" onclick="selectColor(this, 'green')">
            Green
          </div>
          <div class="color-option" style="background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 100%);" onclick="selectColor(this, 'rose')">
            Rose
          </div>
        </div>
      </div>

      <!-- Font Style Section -->
      <div class="theme-section">
        <div class="section-title">Font Style</div>
        <div class="font-option">
          <button class="font-btn selected" style="font-family: 'Quicksand', sans-serif;" onclick="selectFont(this, 'quicksand')">Quicksand</button>
          <button class="font-btn" style="font-family: 'Arial', sans-serif;" onclick="selectFont(this, 'arial')">Arial</button>
          <button class="font-btn" style="font-family: 'Georgia', serif;" onclick="selectFont(this, 'georgia')">Georgia</button>
          <button class="font-btn" style="font-family: 'Courier New', monospace;" onclick="selectFont(this, 'courier')">Courier</button>
        </div>
      </div>

      <!-- Opacity/Transparency Section -->
      <div class="theme-section">
        <div class="slider-group">
          <div class="slider-label">
            <span>Chat Opacity</span>
            <span id="opacity-value">90%</span>
          </div>
          <input type="range" min="50" max="100" value="90" class="slider" id="opacity-slider" oninput="updateOpacity(this.value)">
        </div>
      </div>

      <!-- Preview Section -->
      <div class="preview-box">
        <div class="preview-text" id="preview-text">Your theme preview appears here</div>
      </div>

      <button class="save-btn" onclick="saveTheme()">Save Theme</button>
    </div>
  </main>
</div>

<script>
function selectColor(element, color) {
  document.querySelectorAll('.color-option').forEach(el => el.classList.remove('selected'));
  element.classList.add('selected');
  console.log('Color selected:', color);
}

function selectFont(element, font) {
  document.querySelectorAll('.font-btn').forEach(el => el.classList.remove('selected'));
  element.classList.add('selected');
  console.log('Font selected:', font);
}

function updateOpacity(value) {
  document.getElementById('opacity-value').textContent = value + '%';
  const container = document.querySelector('.customizer-container');
  container.style.opacity = value / 100;
}

function saveTheme() {
  alert('Theme saved successfully! Your preferences will be remembered.');
}

// Dark Mode Toggle
const toggleInput = document.getElementById('toggle-mode');
const toggleSlider = document.getElementById('toggle-slider');
const toggleKnob = document.getElementById('toggle-knob');
const toggleLabel = document.getElementById('toggle-label');
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const body = document.body;
const iconMoon = document.getElementById('toggle-icon-moon');
const iconSun = document.getElementById('toggle-icon-sun');

function applyDarkMode(isDark) {
  if (isDark) {
    toggleInput.checked = true;
    body.style.background = "#222";
    sidebar.style.background = "#181028";
    sidebar.style.color = "#fff";
    mainContent.style.background = "transparent";
    document.querySelectorAll('.nav-link').forEach(a => {
      a.style.color = "#fff";
    });
    document.querySelector('[style*="background: #a21caf"]').style.background = "#181028";
    toggleSlider.style.background = "#2563eb";
    toggleKnob.style.left = "28px";
    toggleKnob.style.background = "#2563eb";
    toggleKnob.style.color = "#2563eb";
    iconMoon.style.display = "none";
    iconSun.style.display = "block";
    toggleLabel.textContent = "Dark Mode";
    document.querySelector('.customizer-container').style.background = "linear-gradient(135deg, #2a1a3f 0%, #3d2555 100%)";
    document.querySelector('.customizer-container').style.borderColor = "#5a3a6f";
    document.querySelectorAll('.section-title').forEach(title => {
      title.style.color = "#d4a5d4";
    });
    document.querySelectorAll('.color-option').forEach(option => {
      option.style.color = "#d4a5d4";
    });
    document.querySelectorAll('.font-btn').forEach(btn => {
      btn.style.background = "#2a1a3f";
      btn.style.color = "#d4a5d4";
      btn.style.borderColor = "#5a3a6f";
    });
    document.querySelector('.preview-box').style.background = "#3d2555";
    document.querySelector('.preview-text').style.color = "#d4a5d4";
    document.querySelector('.page-title').style.color = "#d4a5d4";
    document.querySelector('.save-btn').style.background = "linear-gradient(90deg, #5a3a6f 0%, #6d4d7f 100%)";
    document.querySelector('.save-btn').style.color = "#d4a5d4";
  } else {
    toggleInput.checked = false;
    body.style.background = "linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 100%)";
    sidebar.style.background = "#fff";
    sidebar.style.color = "#a21caf";
    mainContent.style.background = "transparent";
    document.querySelectorAll('.nav-link').forEach(a => {
      a.style.color = "#a21caf";
    });
    document.querySelector('[style*="background: #a21caf"]').style.background = "#a21caf";
    toggleSlider.style.background = "#fff";
    toggleKnob.style.left = "4px";
    toggleKnob.style.background = "#a21caf";
    toggleKnob.style.color = "#a21caf";
    iconMoon.style.display = "block";
    iconSun.style.display = "none";
    toggleLabel.textContent = "Light Mode";
    document.querySelector('.customizer-container').style.background = "linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%)";
    document.querySelector('.customizer-container').style.borderColor = "#fbc2eb";
    document.querySelectorAll('.section-title').forEach(title => {
      title.style.color = "#a21caf";
    });
    document.querySelectorAll('.color-option').forEach(option => {
      option.style.color = "#a21caf";
    });
    document.querySelectorAll('.font-btn').forEach(btn => {
      btn.style.background = "#fff";
      btn.style.color = "#a21caf";
      btn.style.borderColor = "#fbc2eb";
    });
    document.querySelector('.preview-box').style.background = "#fff";
    document.querySelector('.preview-text').style.color = "#a21caf";
    document.querySelector('.page-title').style.color = "#a21caf";
    document.querySelector('.save-btn').style.background = "linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%)";
    document.querySelector('.save-btn').style.color = "#a21caf";
  }
}

toggleInput.addEventListener('change', function() {
  const isDark = toggleInput.checked;
  localStorage.setItem('darkMode', isDark ? 'true' : 'false');
  applyDarkMode(isDark);
});

window.addEventListener('DOMContentLoaded', () => {
  const savedDarkMode = localStorage.getItem('darkMode') === 'true';
  applyDarkMode(savedDarkMode);
});
</script>
</body>
</html>
