<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>Mini-Games - Rischa Chatbot</title>
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
    .games-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      width: 100%;
    }
    .game-card {
      background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%);
      border: 2px solid #fbc2eb;
      border-radius: 1.5rem;
      padding: 2rem;
      box-shadow: 0 4px 24px #fbc2eb44;
      transition: all 0.3s ease;
      cursor: pointer;
      text-align: center;
    }
    .game-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 32px #fbc2eb66;
      border-color: #f8b6e0;
    }
    .game-icon {
      font-size: 4rem;
      margin-bottom: 1rem;
    }
    .game-name {
      font-size: 1.5rem;
      color: #a21caf;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }
    .game-desc {
      color: #7c3aed;
      font-size: 0.95rem;
      line-height: 1.5;
      margin-bottom: 1.5rem;
    }
    .play-btn {
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 2rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 1rem;
    }
    .play-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px #fbc2eb44;
    }
    .page-title {
      font-family: 'Pacifico', cursive;
      font-size: 2.5rem;
      color: #a21caf;
      margin-bottom: 2rem;
      text-shadow: 0 2px 8px #fbc2eb88;
    }
    @media (max-width: 900px) {
      .dashboard-layout { flex-direction: column; }
      .sidebar { width: 100vw; height: auto; border-radius: 0; border-right: none; border-bottom: 3px solid #fbc2eb; }
      .main-content { padding: 1.5rem; }
      .games-container { grid-template-columns: 1fr; }
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
            <a href="mini_games.php" class="nav-link active">
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
            <a href="google_login.php" class="nav-link">
                <span style="margin-right: 0.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#a21caf">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 1v22M5 12h14M9 5l6 6-6 6" />
                    </svg>
                </span>
                <span>Logout</span>
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
    <div style="width: 100%;">
      <h1 class="page-title">Mini-Games</h1>
      <div class="games-container" id="games-container">
        <!-- Games will be loaded here -->
      </div>
    </div>
  </main>
</div>

<script>
const games = [
  {
    icon: "☁️",
    name: "Cloud Computing",
    desc: "Learn about AWS, cloud services, infrastructure, and deployment!",
    action: "playCloud"
  },
  {
    icon: "🌐",
    name: "Computer Networking",
    desc: "Learn about networks, protocols, routing, security, and connectivity!",
    action: "playNetworking"
  },
  {
    icon: "🔧",
    name: "DevOps Challenge",
    desc: "Learn about CI/CD, containerization, automation, and deployment!",
    action: "playDevOps"
  },
  {
    icon: "🐧",
    name: "Linux Command",
    desc: "Learn about Linux commands, system administration, and shell scripting!",
    action: "playLinux"
  },
  {
    icon: "🔐",
    name: "Cybersecurity Training",
    desc: "Learn about security vulnerabilities and best practices!",
    action: "playSecurity"
  },
  {
    icon: "📊",
    name: "Data Structures Game",
    desc: "Master arrays, trees, graphs, and sorting algorithms!",
    action: "playDataStructures"
  }
];

function loadGames() {
  const container = document.getElementById('games-container');
  container.innerHTML = '';
  
  games.forEach(game => {
    const card = document.createElement('div');
    card.className = 'game-card';
    card.innerHTML = `
      <div class="game-icon">${game.icon}</div>
      <div class="game-name">${game.name}</div>
      <div class="game-desc">${game.desc}</div>
      <button class="play-btn" onclick="startGame('${game.action}')">Play Now</button>
    `;
    container.appendChild(card);
  });
}

// Linux Command Master Game
const linuxCommands = [
  { cmd: "ls", desc: "List directory contents", category: "Files", level: 1, example: "ls -la" },
  { cmd: "cd", desc: "Change directory", category: "Navigation", level: 1, example: "cd /home/user" },
  { cmd: "pwd", desc: "Print working directory", category: "Navigation", level: 1, example: "pwd" },
  { cmd: "mkdir", desc: "Create a new directory", category: "Files", level: 1, example: "mkdir new_folder" },
  { cmd: "rm", desc: "Remove files or directories", category: "Files", level: 2, example: "rm -rf folder/" },
  { cmd: "cp", desc: "Copy files or directories", category: "Files", level: 2, example: "cp file.txt backup.txt" },
  { cmd: "mv", desc: "Move or rename files", category: "Files", level: 2, example: "mv old.txt new.txt" },
  { cmd: "cat", desc: "Display file contents", category: "Files", level: 1, example: "cat file.txt" },
  { cmd: "grep", desc: "Search text patterns in files", category: "Search", level: 2, example: "grep 'pattern' file.txt" },
  { cmd: "chmod", desc: "Change file permissions", category: "Permissions", level: 3, example: "chmod 755 script.sh" },
  { cmd: "chown", desc: "Change file owner", category: "Permissions", level: 3, example: "chown user:group file.txt" },
  { cmd: "ps", desc: "Show running processes", category: "Processes", level: 2, example: "ps aux" },
  { cmd: "kill", desc: "Terminate a process", category: "Processes", level: 2, example: "kill -9 1234" },
  { cmd: "top", desc: "Display system resource usage", category: "System", level: 2, example: "top" },
  { cmd: "sudo", desc: "Execute with superuser privileges", category: "Admin", level: 2, example: "sudo apt update" },
  { cmd: "apt", desc: "Debian package manager", category: "Package", level: 2, example: "apt install package" },
  { cmd: "tar", desc: "Archive files", category: "Compression", level: 2, example: "tar -czf archive.tar.gz folder/" },
  { cmd: "unzip", desc: "Extract zip archives", category: "Compression", level: 1, example: "unzip file.zip" },
  { cmd: "ssh", desc: "Secure shell remote access", category: "Network", level: 3, example: "ssh user@host.com" },
  { cmd: "scp", desc: "Secure copy between hosts", category: "Network", level: 3, example: "scp file.txt user@host:/path" },
  { cmd: "curl", desc: "Transfer data with URLs", category: "Network", level: 2, example: "curl https://api.example.com" },
  { cmd: "find", desc: "Search for files", category: "Search", level: 2, example: "find / -name '*.log'" },
  { cmd: "sed", desc: "Stream editor for text", category: "Text", level: 3, example: "sed 's/old/new/g' file.txt" },
  { cmd: "awk", desc: "Text processing language", category: "Text", level: 3, example: "awk '{print $1}' file.txt" },
  { cmd: "cut", desc: "Remove sections from lines", category: "Text", level: 2, example: "cut -d: -f1 /etc/passwd" },
  { cmd: "sort", desc: "Sort lines of text", category: "Text", level: 1, example: "sort file.txt" },
  { cmd: "wc", desc: "Count words, lines, bytes", category: "Text", level: 1, example: "wc -l file.txt" },
  { cmd: "df", desc: "Disk space usage", category: "System", level: 1, example: "df -h" },
  { cmd: "du", desc: "Directory size", category: "System", level: 1, example: "du -sh *" },
  { cmd: "whoami", desc: "Current user name", category: "User", level: 1, example: "whoami" }
];

let currentLinuxLevel = 1;
let linuxScore = 0;
let linuxCorrect = 0;

function startGame(action) {
  if (action === 'playLinux') {
    // Navigate to the comprehensive Linux Master Academy
    window.location.href = 'linux_master.php';
  } else if (action === 'playCloud') {
    // Navigate to the comprehensive Cloud Computing Master
    window.location.href = 'cloud_computing.php';
  } else if (action === 'playDevOps') {
    // Navigate to the comprehensive DevOps Challenge Master
    window.location.href = 'devops_challenge.php';
  } else if (action === 'playNetworking') {
    // Navigate to the comprehensive Computer Networking Master
    window.location.href = 'networking_master.php';
  } else {
    alert(action + ' coming soon! Stay tuned!');
  }
}

function showLinuxGame() {
  const gamesContainer = document.getElementById('games-container').parentElement;
  gamesContainer.innerHTML = `
    <div style="width: 100%; max-width: 900px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h2 style="color: #a21caf; margin: 0; font-family: 'Pacifico', cursive; font-size: 2rem;">Linux Command Master</h2>
        <button onclick="backToGames()" style="background: #fbc2eb; color: #a21caf; border: none; padding: 0.7rem 1.5rem; border-radius: 2rem; font-weight: 600; cursor: pointer;">Back to Games</button>
      </div>
      
      <div style="background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%); border: 2px solid #fbc2eb; border-radius: 1.5rem; padding: 2rem; margin-bottom: 2rem;">
        <div style="display: flex; gap: 2rem; margin-bottom: 1.5rem;">
          <div style="text-align: center;">
            <div style="font-size: 2rem; color: #a21caf; font-weight: 600;">Level ${currentLinuxLevel}</div>
            <div style="color: #7c3aed; font-size: 0.9rem;">Difficulty</div>
          </div>
          <div style="text-align: center;">
            <div style="font-size: 2rem; color: #a21caf; font-weight: 600;">${linuxScore}</div>
            <div style="color: #7c3aed; font-size: 0.9rem;">Points</div>
          </div>
          <div style="text-align: center;">
            <div style="font-size: 2rem; color: #a21caf; font-weight: 600;">${linuxCorrect}/${linuxCommands.length}</div>
            <div style="color: #7c3aed; font-size: 0.9rem;">Learned</div>
          </div>
        </div>
      </div>

      <div id="linux-quiz" style="background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%); border: 2px solid #fbc2eb; border-radius: 1.5rem; padding: 2rem;"></div>
    </div>
  `;
  
  loadLinuxQuestion();
}

function loadLinuxQuestion() {
  const levelCommands = linuxCommands.filter(c => c.level === currentLinuxLevel);
  if (levelCommands.length === 0) {
    document.getElementById('linux-quiz').innerHTML = `
      <div style="text-align: center; padding: 2rem;">
        <h3 style="color: #a21caf; font-size: 1.8rem;">Congratulations!</h3>
        <p style="color: #7c3aed; font-size: 1.1rem;">You've completed all levels!</p>
        <p style="color: #a21caf; font-weight: 600; font-size: 1.3rem;">Final Score: ${linuxScore}</p>
        <button onclick="backToGames()" style="background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%); color: #a21caf; border: none; padding: 1rem 2rem; border-radius: 1rem; font-weight: 600; cursor: pointer; font-size: 1rem; margin-top: 1rem;">Back to Games</button>
      </div>
    `;
    return;
  }

  const cmd = levelCommands[Math.floor(Math.random() * levelCommands.length)];
  const allOptions = [cmd.cmd, ...getRandomCommands(3, cmd.cmd)];
  const shuffled = allOptions.sort(() => Math.random() - 0.5);

  const quizHTML = `
    <div>
      <div style="margin-bottom: 1.5rem;">
        <p style="color: #7c3aed; font-size: 1rem; margin: 0.5rem 0;">What command is used for:</p>
        <p style="color: #a21caf; font-size: 1.3rem; font-weight: 600; margin: 1rem 0;">"${cmd.desc}"</p>
        <div style="background: #fbc2eb22; padding: 1rem; border-radius: 0.8rem; margin-top: 1rem;">
          <p style="color: #7c3aed; font-size: 0.9rem; margin: 0;">Example: <code style="background: #fff; padding: 0.3rem 0.6rem; border-radius: 0.3rem; color: #a21caf;">${cmd.example}</code></p>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
        ${shuffled.map(opt => `
          <button onclick="checkLinuxAnswer('${opt}', '${cmd.cmd}')" style="background: #fff; border: 2px solid #fbc2eb; padding: 1rem; border-radius: 0.8rem; color: #a21caf; font-weight: 600; cursor: pointer; font-size: 1rem; transition: all 0.3s; font-family: monospace;">
            ${opt}
          </button>
        `).join('')}
      </div>

      <div style="padding: 1rem; background: #fbc2eb22; border-radius: 0.8rem; margin-top: 1rem;">
        <p style="color: #a21caf; font-weight: 600; margin-bottom: 0.5rem;">Category: ${cmd.category}</p>
        <p style="color: #7c3aed; margin: 0; font-size: 0.9rem;">${cmd.desc}</p>
      </div>
    </div>
  `;

  document.getElementById('linux-quiz').innerHTML = quizHTML;
}

function checkLinuxAnswer(selected, correct) {
  if (selected === correct) {
    linuxScore += (currentLinuxLevel * 10);
    linuxCorrect++;
    showLinuxFeedback(true);
  } else {
    showLinuxFeedback(false, correct);
  }
}

function showLinuxFeedback(isCorrect, correct) {
  const feedbackHTML = `
    <div style="text-align: center; padding: 2rem; background: ${isCorrect ? '#e8f5e9' : '#ffebee'}; border-radius: 1rem; border: 2px solid ${isCorrect ? '#4caf50' : '#f44336'};">
      <h3 style="color: ${isCorrect ? '#2e7d32' : '#c62828'}; font-size: 1.5rem; margin: 0 0 1rem 0;">
        ${isCorrect ? '✓ Correct!' : '✗ Incorrect'}
      </h3>
      ${!isCorrect ? `<p style="color: #a21caf; font-size: 1.1rem; font-weight: 600;">The correct answer is: <code style="background: #fff; padding: 0.3rem 0.6rem; border-radius: 0.3rem;">${correct}</code></p>` : ''}
      <button onclick="nextLinuxQuestion()" style="background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%); color: #a21caf; border: none; padding: 0.8rem 1.5rem; border-radius: 0.8rem; font-weight: 600; cursor: pointer; font-size: 1rem; margin-top: 1rem;">Next</button>
    </div>
  `;
  document.getElementById('linux-quiz').innerHTML = feedbackHTML;
}

function nextLinuxQuestion() {
  if (linuxCorrect % 5 === 0 && linuxCorrect > 0) {
    currentLinuxLevel++;
  }
  loadLinuxQuestion();
}

function getRandomCommands(count, exclude) {
  const filtered = linuxCommands.filter(c => c.cmd !== exclude);
  const shuffled = filtered.sort(() => Math.random() - 0.5);
  return shuffled.slice(0, count).map(c => c.cmd);
}

function backToGames() {
  currentLinuxLevel = 1;
  linuxScore = 0;
  linuxCorrect = 0;
  loadGames();
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
    
    document.querySelectorAll('.game-card').forEach(card => {
      card.style.background = "linear-gradient(135deg, #2a1a3f 0%, #3d2555 100%)";
      card.style.borderColor = "#5a3a6f";
    });
    document.querySelectorAll('.game-name').forEach(name => {
      name.style.color = "#d4a5d4";
    });
    document.querySelectorAll('.game-desc').forEach(desc => {
      desc.style.color = "#e0d5ff";
    });
    document.querySelectorAll('.play-btn').forEach(btn => {
      btn.style.background = "linear-gradient(90deg, #5a3a6f 0%, #6d4d7f 100%)";
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
    
    document.querySelectorAll('.game-card').forEach(card => {
      card.style.background = "linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%)";
      card.style.borderColor = "#fbc2eb";
    });
    document.querySelectorAll('.game-name').forEach(name => {
      name.style.color = "#a21caf";
    });
    document.querySelectorAll('.game-desc').forEach(desc => {
      desc.style.color = "#7c3aed";
    });
    document.querySelectorAll('.play-btn').forEach(btn => {
      btn.style.background = "linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%)";
      btn.style.color = "#a21caf";
    });
    document.querySelector('.page-title').style.color = "#a21caf";
  }
}

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

// Load games on page load
window.addEventListener('load', loadGames);
</script>
</body>
</html>
