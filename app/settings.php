<?php
session_start();

// Handle profile update
$update_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_profile') {
        $new_display_name = trim($_POST['display_name'] ?? '');
        if (!empty($new_display_name)) {
            $_SESSION['user_display_name'] = $new_display_name;
            $update_message = 'Profile updated successfully!';
        } else {
            $update_message = 'Display name cannot be empty!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>Settings - Rischa Chatbot</title>
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
    .settings-container {
      max-width: 900px;
      width: 100%;
    }
    .page-title {
      font-family: 'Pacifico', cursive;
      font-size: 2.5rem;
      color: #a21caf;
      margin-bottom: 2rem;
      text-shadow: 0 2px 8px #fbc2eb88;
    }
    .settings-section {
      background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%);
      border: 2px solid #fbc2eb;
      border-radius: 1.5rem;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 24px #fbc2eb44;
    }
    .section-title {
      font-size: 1.3rem;
      color: #a21caf;
      font-weight: 600;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding-bottom: 1rem;
      border-bottom: 2px solid #fbc2eb;
    }
    .setting-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
      border-bottom: 1px solid #fbc2eb22;
    }
    .setting-item:last-child {
      border-bottom: none;
    }
    .setting-label {
      display: flex;
      flex-direction: column;
    }
    .setting-name {
      color: #a21caf;
      font-weight: 600;
      margin-bottom: 0.3rem;
    }
    .setting-desc {
      color: #7c3aed;
      font-size: 0.9rem;
    }
    .toggle-switch {
      width: 50px;
      height: 28px;
      background: #fbc2eb;
      border-radius: 14px;
      position: relative;
      cursor: pointer;
      transition: all 0.3s ease;
      border: none;
    }
    .toggle-switch.active {
      background: #a21caf;
    }
    .toggle-knob {
      width: 24px;
      height: 24px;
      background: #fff;
      border-radius: 50%;
      position: absolute;
      top: 2px;
      left: 2px;
      transition: left 0.3s ease;
    }
    .toggle-switch.active .toggle-knob {
      left: 24px;
    }
    .input-field {
      width: 200px;
      padding: 0.7rem 1rem;
      border: 2px solid #fbc2eb;
      border-radius: 0.7rem;
      color: #a21caf;
      font-size: 1rem;
      font-family: 'Quicksand', sans-serif;
    }
    .input-field:focus {
      outline: none;
      border-color: #a21caf;
      box-shadow: 0 0 8px #fbc2eb44;
    }
    .button-group {
      display: flex;
      gap: 1rem;
      margin-top: 2rem;
    }
    .btn {
      padding: 0.8rem 1.5rem;
      border: none;
      border-radius: 0.7rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 1rem;
    }
    .btn-primary {
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
    }
    .btn-primary:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 12px #fbc2eb44;
    }
    .btn-secondary {
      background: #fbc2eb44;
      color: #a21caf;
    }
    .btn-secondary:hover {
      background: #fbc2eb66;
    }
    .btn-danger {
      background: #ef4444;
      color: #fff;
    }
    .btn-danger:hover {
      background: #dc2626;
    }
    .info-box {
      background: #fbc2eb22;
      border-left: 4px solid #a21caf;
      padding: 1rem;
      border-radius: 0.5rem;
      color: #a21caf;
      margin-top: 1rem;
    }
    @media (max-width: 900px) {
      .dashboard-layout { flex-direction: column; }
      .sidebar { width: 100vw; height: auto; border-radius: 0; border-right: none; border-bottom: 3px solid #fbc2eb; }
      .main-content { padding: 1.5rem; }
      .setting-item {
        flex-direction: column;
        align-items: flex-start;
      }
      .input-field {
        width: 100%;
        margin-top: 0.5rem;
      }
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
            <a href="theme_customizer.php" class="nav-link">
                <span style="margin-right: 0.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h-6v7h6V5zm0 7h6V5h-6v7zm-1 6h8M8 17h-3m8-6h1v1m-3 0h1v1m-2-2h1v1m-3 0h1v1m-2-2h1v1m-1 5h5" />
                    </svg>
                </span>
                <span>Theme Customizer</span>
            </a>
            <hr style="margin: 0.8rem 0; border-color: #fbc2eb;">
            <a href="settings.php" class="nav-link active">
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
    <div class="settings-container">
      <h1 class="page-title">Settings</h1>

      <!-- Account Settings Section -->
      <!-- Chat Settings Section -->
      <div class="settings-section">
        <div class="section-title">Chat Preferences</div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">AI Voice</div>
            <div class="setting-desc">Enable voice responses from Rischa</div>
          </div>
          <button class="toggle-switch active">
            <div class="toggle-knob"></div>
          </button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Typing Indicator</div>
            <div class="setting-desc">Show when Rischa is typing</div>
          </div>
          <button class="toggle-switch active">
            <div class="toggle-knob"></div>
          </button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Message History</div>
            <div class="setting-desc">Save your conversations</div>
          </div>
          <button class="toggle-switch active">
            <div class="toggle-knob"></div>
          </button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Response Speed</div>
            <div class="setting-desc">How fast Rischa responds</div>
          </div>
          <select class="input-field" style="width: auto;">
            <option>Normal</option>
            <option>Fast</option>
            <option>Slow</option>
          </select>
        </div>
      </div>

      <!-- Notification Settings Section -->
      <div class="settings-section">
        <div class="section-title">Notifications</div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Email Notifications</div>
            <div class="setting-desc">Receive important updates</div>
          </div>
          <button class="toggle-switch">
            <div class="toggle-knob"></div>
          </button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">New Features Alert</div>
            <div class="setting-desc">Get notified about new features</div>
          </div>
          <button class="toggle-switch">
            <div class="toggle-knob"></div>
          </button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Daily Digest</div>
            <div class="setting-desc">Receive daily summary emails</div>
          </div>
          <button class="toggle-switch">
            <div class="toggle-knob"></div>
          </button>
        </div>
      </div>

      <!-- Privacy Settings Section -->
      <div class="settings-section">
        <div class="section-title">Privacy & Security</div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Data Privacy</div>
            <div class="setting-desc">Manage your data collection preferences</div>
          </div>
          <button class="btn btn-secondary">Manage</button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Export Your Data</div>
            <div class="setting-desc">Download all your chat history</div>
          </div>
          <button class="btn btn-secondary">Export</button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Clear History</div>
            <div class="setting-desc">Permanently delete all chat messages</div>
          </div>
          <button class="btn btn-danger">Clear All</button>
        </div>
        <div class="info-box">
          Your data is encrypted and secure. Learn more about our privacy policy.
        </div>
      </div>

      <!-- System Settings Section -->
      <div class="settings-section">
        <div class="section-title">System</div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">App Version</div>
            <div class="setting-desc">Current version installed</div>
          </div>
          <div style="color: #a21caf; font-weight: 600;">v1.0.0</div>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">Check for Updates</div>
            <div class="setting-desc">Keep Rischa up to date</div>
          </div>
          <button class="btn btn-secondary">Check Now</button>
        </div>
        <div class="setting-item">
          <div class="setting-label">
            <div class="setting-name">About Rischa</div>
            <div class="setting-desc">Learn more about this app</div>
          </div>
          <button class="btn btn-secondary">About</button>
        </div>
      </div>
    </div>
  </main>
</div>

<script>
const toggleInput = document.getElementById('toggle-mode');
const toggleSlider = document.getElementById('toggle-slider');
const toggleKnob = document.getElementById('toggle-knob');
const toggleLabel = document.getElementById('toggle-label');
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const body = document.body;
const iconMoon = document.getElementById('toggle-icon-moon');
const iconSun = document.getElementById('toggle-icon-sun');

// Toggle switch functionality
document.querySelectorAll('.toggle-switch').forEach(toggle => {
  toggle.addEventListener('click', function() {
    this.classList.toggle('active');
  });
});

toggleInput.addEventListener('change', function() {
  const isDark = toggleInput.checked;
  localStorage.setItem('darkMode', isDark ? 'true' : 'false');
  applyDarkMode(isDark);
});

function applyDarkMode(isDark) {
  if (isDark) {
    toggleInput.checked = true;
    // Dark Mode
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
    
    document.querySelectorAll('.settings-section').forEach(section => {
      section.style.background = "linear-gradient(135deg, #2a1a3f 0%, #3d2555 100%)";
      section.style.borderColor = "#5a3a6f";
    });
    document.querySelectorAll('.section-title').forEach(title => {
      title.style.color = "#d4a5d4";
      title.style.borderColor = "#5a3a6f";
    });
    document.querySelectorAll('.setting-name').forEach(name => {
      name.style.color = "#d4a5d4";
    });
    document.querySelectorAll('.setting-desc').forEach(desc => {
      desc.style.color = "#e0d5ff";
    });
    document.querySelectorAll('.input-field').forEach(input => {
      input.style.background = "#3d2555";
      input.style.color = "#d4a5d4";
      input.style.borderColor = "#5a3a6f";
    });
    document.querySelectorAll('.btn-secondary').forEach(btn => {
      btn.style.background = "#5a3a6f";
      btn.style.color = "#d4a5d4";
    });
    document.querySelector('.page-title').style.color = "#d4a5d4";
  } else {
    toggleInput.checked = false;
    // Light Mode
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
    
    document.querySelectorAll('.settings-section').forEach(section => {
      section.style.background = "linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%)";
      section.style.borderColor = "#fbc2eb";
    });
    document.querySelectorAll('.section-title').forEach(title => {
      title.style.color = "#a21caf";
      title.style.borderColor = "#fbc2eb";
    });
    document.querySelectorAll('.setting-name').forEach(name => {
      name.style.color = "#a21caf";
    });
    document.querySelectorAll('.setting-desc').forEach(desc => {
      desc.style.color = "#7c3aed";
    });
    document.querySelectorAll('.input-field').forEach(input => {
      input.style.background = "#fff";
      input.style.color = "#a21caf";
      input.style.borderColor = "#fbc2eb";
    });
    document.querySelectorAll('.btn-secondary').forEach(btn => {
      btn.style.background = "#fbc2eb44";
      btn.style.color = "#a21caf";
    });
    document.querySelector('.page-title').style.color = "#a21caf";
  }
}

// Load saved preference on page load
window.addEventListener('DOMContentLoaded', () => {
  const savedDarkMode = localStorage.getItem('darkMode') === 'true';
  applyDarkMode(savedDarkMode);
});
</script>
</body>
</html>
