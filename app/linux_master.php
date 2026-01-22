<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>Linux Master Academy - Rischa Chatbot</title>
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
    .page-title {
      font-family: 'Pacifico', cursive;
      font-size: 2.5rem;
      color: #a21caf;
      margin-bottom: 2rem;
      text-shadow: 0 2px 8px #fbc2eb88;
    }
    .progress-bar {
      width: 100%;
      height: 20px;
      background: #fbc2eb44;
      border-radius: 10px;
      overflow: hidden;
    }
    .progress-fill {
      height: 100%;
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
    }
    .stats-grid {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      margin-bottom: 2rem;
    }
    .stat-box {
      text-align: center;
    }
    .stat-number {
      font-size: 2rem;
      color: #a21caf;
      font-weight: 600;
    }
    .stat-label {
      color: #7c3aed;
      font-size: 0.9rem;
    }
    .question-container {
      background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%);
      border: 2px solid #fbc2eb;
      border-radius: 1.5rem;
      padding: 2rem;
    }
    .badge {
      display: inline-block;
      padding: 0.4rem 0.8rem;
      border-radius: 1rem;
      font-size: 0.85rem;
      font-weight: 600;
      margin-right: 0.5rem;
      margin-bottom: 1rem;
    }
    .badge-category {
      background: #fbc2eb;
      color: #a21caf;
    }
    .badge-level {
      background: #a21caf;
      color: #fff;
    }
    .badge-type {
      background: #7c3aed;
      color: #fff;
    }
    .question-text {
      color: #a21caf;
      font-size: 1.2rem;
      font-weight: 600;
      margin: 1rem 0;
    }
    .options-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    .option-btn {
      background: #fff;
      border: 2px solid #fbc2eb;
      padding: 1rem;
      border-radius: 0.8rem;
      color: #a21caf;
      font-weight: 600;
      cursor: pointer;
      font-size: 1rem;
      transition: all 0.3s;
      text-align: left;
    }
    .option-btn:hover {
      background: #fbc2eb22;
      border-color: #a21caf;
    }
    .feedback-correct {
      background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
      border: 2px solid #4caf50;
      border-radius: 1rem;
      padding: 2rem;
    }
    .feedback-incorrect {
      background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
      border: 2px solid #f44336;
      border-radius: 1rem;
      padding: 2rem;
    }
    .explanation-box {
      background: #fff;
      padding: 1.5rem;
      border-radius: 0.8rem;
      margin-bottom: 1.5rem;
      border-left: 4px solid;
    }
    .explanation-title {
      color: #a21caf;
      font-weight: 600;
      margin: 0 0 0.8rem 0;
    }
    .explanation-text {
      color: #7c3aed;
      margin: 0;
      line-height: 1.6;
    }
    .next-btn, .back-btn {
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
      border: none;
      padding: 0.8rem 1.5rem;
      border-radius: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      font-size: 1rem;
    }
    .next-btn:hover, .back-btn:hover {
      transform: scale(1.05);
    }
    .completion-box {
      text-align: center;
      padding: 3rem;
      background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%);
      border: 2px solid #fbc2eb;
      border-radius: 1.5rem;
    }
    .completion-title {
      color: #a21caf;
      font-size: 2rem;
      margin: 0 0 1rem 0;
    }
    .mastery-level {
      color: #7c3aed;
      font-size: 1.2rem;
      margin: 0 0 2rem 0;
    }
    @media (max-width: 900px) {
      .dashboard-layout { flex-direction: column; }
      .sidebar { width: 100vw; height: auto; border-radius: 0; border-right: none; border-bottom: 3px solid #fbc2eb; }
      .main-content { padding: 1.5rem; margin-left: 0; }
      .options-grid { grid-template-columns: 1fr; }
      .stats-grid { gap: 1rem; }
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
    <div style="width: 100%; max-width: 900px;" id="game-container">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 class="page-title">Linux Master Academy</h1>
        <a href="mini_games.php" class="back-btn">Back to Games</a>
      </div>

      <div class="question-container" style="margin-bottom: 2rem;">
        <div class="stats-grid">
          <div class="stat-box">
            <div class="stat-number" id="score">0</div>
            <div class="stat-label">Points</div>
          </div>
          <div class="stat-box">
            <div class="stat-number" id="progress">0</div>
            <div class="stat-label">Questions</div>
          </div>
          <div style="flex: 1; min-width: 200px;">
            <div class="progress-bar">
              <div class="progress-fill" id="progress-fill" style="width: 0%;"></div>
            </div>
            <div class="stat-label" style="margin-top: 0.5rem;">Master Progress</div>
          </div>
        </div>
      </div>

      <div id="quiz-content" class="question-container"></div>
    </div>
  </main>
</div>

<script>
// Comprehensive Linux Academy Content - 90 Lessons
const lessons = [
  { id: 1, level: 1, category: "File System", type: "concept", question: "What is the root directory in Linux?", options: ["/", "C:\\", "root", "~"], correct: 0, explanation: "The root directory (/) is the top-level directory in Linux file system. All files and directories are under it. It's different from the root user account." },
  { id: 2, level: 1, category: "Navigation", type: "command", question: "Which command shows your current working directory?", options: ["pwd", "cd", "ls", "dir"], correct: 0, explanation: "pwd (print working directory) displays the full path of the current directory you're in. Essential for navigation." },
  { id: 3, level: 1, category: "File System", type: "concept", question: "What does ~ represent in Linux?", options: ["Home directory", "Root directory", "Current directory", "Parent directory"], correct: 0, explanation: "~ is a shortcut for your home directory (/home/username). Each user has their own home directory." },
  { id: 4, level: 1, category: "Navigation", type: "command", question: "How do you change to the parent directory?", options: ["cd ..", "cd -", "cd /", "cd ~"], correct: 0, explanation: "cd .. moves up one level to the parent directory. Single . represents current directory, double .. represents parent." },
  { id: 5, level: 1, category: "Files", type: "command", question: "Which command lists files in a directory with details?", options: ["ls -la", "ls", "dir", "list"], correct: 0, explanation: "ls -la shows all files (including hidden) with long format details: permissions, owner, size, date, and name." },
  { id: 6, level: 1, category: "Files", type: "concept", question: "What do hidden files start with in Linux?", options: [".", "-", "_", "*"], correct: 0, explanation: "Files and directories starting with . are hidden. Use ls -a to see them. Examples: .bashrc, .ssh, .config" },
  { id: 7, level: 1, category: "Files", type: "command", question: "Which command creates a new directory?", options: ["mkdir", "md", "create", "newdir"], correct: 0, explanation: "mkdir (make directory) creates new directories. You can create nested directories with mkdir -p path/to/dir" },
  { id: 8, level: 1, category: "Files", type: "command", question: "How do you view file contents in the terminal?", options: ["cat", "view", "read", "show"], correct: 0, explanation: "cat displays file contents. Also try: less (scrollable), head (first lines), tail (last lines), more (paginated)." },
  { id: 9, level: 1, category: "System", type: "concept", question: "What is the Linux kernel?", options: ["Core of the OS managing resources", "User interface", "Shell interpreter", "Package manager"], correct: 0, explanation: "The kernel is the core of Linux that manages hardware, memory, processes, and file systems. It bridges applications and hardware." },
  { id: 10, level: 1, category: "User", type: "concept", question: "What is the superuser in Linux?", options: ["root", "admin", "sudo", "system"], correct: 0, explanation: "root is the superuser with UID 0 and unlimited privileges. Use 'sudo' to temporarily run commands as root without switching accounts." },
  { id: 11, level: 2, category: "Permissions", type: "concept", question: "What do the three digits in chmod 755 represent?", options: ["Owner, Group, Others", "Read, Write, Execute", "User, System, All", "File, Directory, Link"], correct: 0, explanation: "First digit is owner (7=rwx), second is group (5=r-x), third is others (5=r-x). Each digit is sum of: read=4, write=2, execute=1" },
  { id: 12, level: 2, category: "Permissions", type: "command", question: "How do you make a script executable?", options: ["chmod +x script.sh", "chmod 777 script.sh", "chmod a+x script.sh", "All of above"], correct: 3, explanation: "All three are correct! chmod +x adds execute for all, 777 gives all permissions, a+x adds execute for all. Use +x for security." },
  { id: 13, level: 2, category: "Permissions", type: "concept", question: "What does 'r' (read) permission mean for a directory?", options: ["Can list contents", "Can enter directory", "Can modify contents", "Can delete directory"], correct: 0, explanation: "Read (r) on a directory allows listing its contents. Execute (x) is needed to enter/access the directory. Both are needed for full access." },
  { id: 14, level: 2, category: "Ownership", type: "command", question: "Which command changes file ownership?", options: ["chown user:group file", "chown user file", "chgrp group file", "All of above"], correct: 3, explanation: "chown user:group changes both owner and group. chown user changes owner only. chgrp changes group only. All valid in different contexts." },
  { id: 15, level: 2, category: "Permissions", type: "concept", question: "What does the 's' bit (setuid) do?", options: ["Run as owner, not executor", "Run with shared access", "Set sticky bit", "Symbolic link"], correct: 0, explanation: "setuid bit allows executable to run with owner's privileges regardless of who runs it. Example: passwd command needs this to modify /etc/shadow" },
  { id: 16, level: 2, category: "Permissions", type: "concept", question: "What is the sticky bit used for?", options: ["Only owner can delete files", "Prevents deletion by others", "Makes file permanent", "Executable permission"], correct: 1, explanation: "Sticky bit (chmod +t) on directories prevents users from deleting others' files even if they have write access. Example: /tmp directory" },
  { id: 17, level: 2, category: "Files", type: "command", question: "How do you copy a directory recursively?", options: ["cp -r source dest", "cp source dest", "copy -r source dest", "mv -r source dest"], correct: 0, explanation: "cp -r copies directories and their contents recursively. Without -r, cp only copies files. Similar: rsync for advanced copying." },
  { id: 18, level: 2, category: "Files", type: "command", question: "Which command searches for text patterns in files?", options: ["grep", "find", "search", "locate"], correct: 0, explanation: "grep searches file contents for patterns. find searches for filenames. grep examples: grep 'pattern' file | grep -r 'pattern' /path" },
  { id: 19, level: 2, category: "Files", type: "concept", question: "What is a symbolic link?", options: ["Shortcut pointing to another file", "Copy of a file", "File reference", "Directory alias"], correct: 0, explanation: "Symlink is a special file containing path to another file. Create with: ln -s /path/to/original /path/to/link. Can point across filesystems." },
  { id: 20, level: 2, category: "Files", type: "concept", question: "What's the difference between hard link and symbolic link?", options: ["Hard links are direct references; symlinks point via path", "Hard links are shortcuts", "Symlinks are faster", "Same thing, different names"], correct: 0, explanation: "Hard link: directory entry pointing to same inode (same file). Symlink: special file containing path to another file. Symlinks work across filesystems." },
  { id: 21, level: 2, category: "Processes", type: "command", question: "How do you view running processes?", options: ["ps aux", "ps", "top", "All of above"], correct: 3, explanation: "All are correct! ps lists processes, ps aux shows all details, top shows real-time with resource usage. ps aux most common for getting PID." },
  { id: 22, level: 2, category: "Processes", type: "command", question: "How do you kill a process by PID?", options: ["kill 1234", "kill -9 1234", "killall process", "All valid"], correct: 3, explanation: "kill 1234 sends SIGTERM (graceful). kill -9 1234 sends SIGKILL (force). killall kills by name. Use -9 only when -15 doesn't work." },
  { id: 23, level: 2, category: "Processes", type: "concept", question: "What does SIGTERM signal do?", options: ["Graceful termination request", "Force kill", "Pause process", "Restart process"], correct: 0, explanation: "SIGTERM is the default termination signal. Allows process to cleanup gracefully. SIGKILL (-9) forces immediate termination without cleanup." },
  { id: 24, level: 2, category: "System", type: "command", question: "Which command shows disk space usage?", options: ["df -h", "du -sh", "disk", "fdisk"], correct: 0, explanation: "df -h shows filesystem disk usage in human-readable format. du -sh shows directory size. fdisk is for disk partitioning." },
  { id: 25, level: 2, category: "System", type: "concept", question: "What is inode in Linux?", options: ["Data structure storing file metadata", "File content", "Directory name", "File extension"], correct: 0, explanation: "Inode (index node) stores file metadata: size, permissions, owner, timestamps, block pointers. Everything except filename. Each file has unique inode number." },
  { id: 26, level: 2, category: "System", type: "command", question: "How do you check available memory?", options: ["free -h", "top", "vmstat", "All of above"], correct: 3, explanation: "free -h shows memory in human-readable format. top shows real-time. vmstat shows virtual memory stats. Use 'free -h' for quick check." },
  { id: 27, level: 2, category: "System", type: "concept", question: "What is swap memory?", options: ["Disk space used as virtual RAM", "CPU cache", "RAM backup", "Storage partition"], correct: 0, explanation: "Swap is disk space used when RAM is full. Slower than RAM but prevents crash. Check with: swapon -s or free -h" },
  { id: 28, level: 2, category: "Text", type: "command", question: "How do you sort lines and remove duplicates?", options: ["sort file | uniq", "sort -u file", "uniq -d file", "All valid"], correct: 3, explanation: "sort | uniq pipes sorted output to uniq. sort -u sorts and removes duplicates. uniq must receive sorted input. Combine: sort file | uniq" },
  { id: 29, level: 2, category: "Text", type: "command", question: "What does cut command do?", options: ["Extract columns from text", "Remove text", "Split lines", "Modify files"], correct: 0, explanation: "cut extracts columns from lines. Examples: cut -d: -f1 (delimiter :, field 1) | cut -c1-5 (characters 1-5). Used with pipe from cat/grep." },
  { id: 30, level: 2, category: "Text", type: "concept", question: "What is a pipe in Linux?", options: ["Passes output of one command to input of another", "Network connection", "File descriptor", "Directory path"], correct: 0, explanation: "Pipe (|) chains commands. Output becomes input. Example: cat file | grep pattern | sort | uniq. Essential for data processing pipelines." },
  { id: 31, level: 3, category: "Shell", type: "concept", question: "What is a shell in Linux?", options: ["Command interpreter between user and kernel", "File manager", "Text editor", "System utility"], correct: 0, explanation: "Shell is the command interpreter (bash, zsh, sh, fish). It reads commands and executes them. Different from kernel - shell is application-level." },
  { id: 32, level: 3, category: "Shell", type: "concept", question: "What's the difference between / and . in shell scripting?", options: ["./script runs in current dir, /script in root", "No difference", "/ is root, . is home", ". is comment"], correct: 0, explanation: "./script runs script from current directory. Current dir isn't in PATH for security. Must use ./ for local scripts. /script runs from root." },
  { id: 33, level: 3, category: "Shell", type: "command", question: "What does shebang (#!) do in scripts?", options: ["Specifies interpreter for script", "Comment line", "Marks executable", "Nothing, just ignored"], correct: 0, explanation: "#!/bin/bash at start tells system to use bash interpreter. Different shebangs: #!/usr/bin/python, #!/bin/sh, etc. Must be first line." },
  { id: 34, level: 3, category: "Shell", type: "concept", question: "What are environment variables?", options: ["Global variables accessible to all processes", "Local variables", "File names", "Directory paths"], correct: 0, explanation: "Environment variables are inherited by child processes. Set: export VAR=value. View: env. Common: PATH, HOME, USER, SHELL, PWD." },
  { id: 35, level: 3, category: "Shell", type: "command", question: "How do you view all environment variables?", options: ["env", "echo $*", "printenv", "All show them"], correct: 3, explanation: "env and printenv both display all. echo $VAR shows specific variable. env VAR=value command runs command with temp variable." },
  { id: 36, level: 3, category: "Shell", type: "concept", question: "What is PATH variable used for?", options: ["Directories where system searches for executables", "File path variable", "Current directory", "Home directory path"], correct: 0, explanation: "PATH contains directories (colon-separated) where shell searches for commands. echo $PATH shows them. Add directory: export PATH=$PATH:/new/path" },
  { id: 37, level: 3, category: "Shell", type: "command", question: "How do you redirect stderr to a file?", options: ["command 2> error.log", "command > error.log", "command &> error.log", "2>&1"], correct: 0, explanation: "2> redirects stderr. > redirects stdout. 2>&1 redirects both to same output. &> also redirects both. Example: ls /nonexist 2> error.log" },
  { id: 38, level: 3, category: "Shell", type: "concept", question: "What is stdin, stdout, stderr?", options: ["Input, output, and error streams", "Three file descriptors (0,1,2)", "Both above", "System signals"], correct: 2, explanation: "stdin (0) - input. stdout (1) - normal output. stderr (2) - error output. Can redirect independently: command 2>err 1>out < input.txt" },
  { id: 39, level: 3, category: "Shell", type: "concept", question: "What does 2>&1 do?", options: ["Redirects stderr to stdout", "Redirects stdout to stderr", "Redirects both to file", "Pipes stderr"], correct: 0, explanation: "2>&1 redirects file descriptor 2 (stderr) to file descriptor 1 (stdout). Useful: command > output.log 2>&1 captures everything." },
  { id: 40, level: 3, category: "Text", type: "command", question: "How do you find and replace text in a file using sed?", options: ["sed 's/old/new/g' file", "sed -i 's/old/new/g' file", "sed 's/old/new/' file", "All valid"], correct: 3, explanation: "sed 's/old/new/' replaces first on each line. /g flag replaces all. -i edits file in-place. Example: sed -i 's/foo/bar/g' file.txt" },
  { id: 41, level: 3, category: "User", type: "concept", question: "Where are user accounts stored in Linux?", options: ["/etc/passwd and /etc/shadow", "/etc/users", "/home directory", "/root"], correct: 0, explanation: "/etc/passwd contains user info (world-readable). /etc/shadow contains encrypted passwords (root-only). /etc/group contains group info." },
  { id: 42, level: 3, category: "User", type: "command", question: "How do you create a new user?", options: ["useradd username", "adduser username", "usermod", "All valid"], correct: 1, explanation: "adduser is interactive, useradd is direct. useradd options: -m (create home), -s /bin/bash (shell), -G group (groups). Example: useradd -m user1" },
  { id: 43, level: 3, category: "User", type: "command", question: "How do you change a user's password?", options: ["passwd username", "passwd", "sudo passwd user", "All valid"], correct: 2, explanation: "passwd without args changes your password. sudo passwd user changes another user. User can only change their own unless root. Never store passwords in scripts!" },
  { id: 44, level: 3, category: "User", type: "concept", question: "What is UID and GID?", options: ["User ID and Group ID - numeric identifiers", "User names and group names", "Login and password", "Permissions for files"], correct: 0, explanation: "UID uniquely identifies user (0=root). GID identifies groups. Permissions stored as numeric UID/GID internally. View: id command" },
  { id: 45, level: 3, category: "User", type: "command", question: "How do you add user to a group?", options: ["usermod -aG group user", "usermod -G group user", "addgroup user group", "groupadd user"], correct: 0, explanation: "usermod -aG appends to groups (keeps existing). usermod -G replaces groups. -a flag is important! User needs to logout/login to see changes." },
  { id: 46, level: 3, category: "User", type: "concept", question: "What is sudoers file?", options: ["Defines who can use sudo and what commands", "List of sudo users", "Sudo configuration", "All above"], correct: 3, explanation: "/etc/sudoers controls sudo access. Edit with: visudo (safe editor). Examples: user ALL=(ALL) ALL | %group ALL=NOPASSWD: /usr/bin/command" },
  { id: 47, level: 3, category: "User", type: "concept", question: "What is the difference between sudo and su?", options: ["sudo runs command as root; su switches to root shell", "They do the same thing", "su is faster", "sudo is deprecated"], correct: 0, explanation: "sudo runs single command as root. su switches to another user (default root), starts new shell. sudo safer - logs commands, no root password needed." },
  { id: 48, level: 3, category: "User", type: "concept", question: "What is umask?", options: ["Default permissions for new files/dirs", "Maximum permissions", "Permission mask", "User mask"], correct: 0, explanation: "umask defines permissions NOT given to new files. Default 0022 means files get 644 (666-022), dirs get 755 (777-022). View: umask" },
  { id: 49, level: 3, category: "User", type: "concept", question: "What does 'wheel' group do on some systems?", options: ["Allows unrestricted sudo access", "System group", "Manages disks", "Device group"], correct: 0, explanation: "Wheel group grants sudo privileges on many systems. Add user: usermod -aG wheel username. Controlled by /etc/sudoers configuration." },
  { id: 50, level: 3, category: "User", type: "command", question: "How do you view user's groups?", options: ["id username", "groups username", "usermod -l", "All show groups"], correct: 2, explanation: "id shows UID, GID, and groups. groups shows group membership. id more detailed. Example: id user1 shows all group info." },
  { id: 51, level: 3, category: "Network", type: "command", question: "How do you view network interfaces?", options: ["ip addr / ifconfig", "netstat", "netstat -i", "All show network info"], correct: 3, explanation: "ip addr (modern), ifconfig (older). netstat shows connections. ip nestat shows also routing. Modern systems prefer: ip, ss, nmcli commands." },
  { id: 52, level: 3, category: "Network", type: "command", question: "How do you test network connectivity?", options: ["ping host", "ping -c 5 host", "traceroute host", "All valid tests"], correct: 3, explanation: "ping tests reachability. traceroute shows path to host. nslookup/dig queries DNS. All useful for network diagnostics." },
  { id: 53, level: 3, category: "Network", type: "command", question: "Which command shows listening ports?", options: ["netstat -tuln", "ss -tuln", "lsof -i", "All show listening ports"], correct: 3, explanation: "netstat -tuln (old way). ss -tuln (modern, faster). lsof -i shows open network connections. ss preferred on newer systems." },
  { id: 54, level: 3, category: "Network", type: "command", question: "How do you securely copy files to remote host?", options: ["scp file user@host:/path", "scp user@host:/path file", "cp over ssh", "Both scp directions valid"], correct: 3, explanation: "scp is secure copy over SSH. scp local user@host:remote sends file. scp user@host:remote local receives. Uses SSH authentication." },
  { id: 55, level: 3, category: "Network", type: "concept", question: "What does SSH do?", options: ["Secure encrypted remote shell access", "Simple file transfer", "Unsecured login", "Network broadcast"], correct: 0, explanation: "SSH encrypts all traffic. Prevents eavesdropping. Uses public-key cryptography (RSA, ECDSA). Generate keys: ssh-keygen. Add to ~/.ssh/authorized_keys" },
  { id: 56, level: 3, category: "Network", type: "command", question: "How do you generate SSH keys?", options: ["ssh-keygen", "ssh-keygen -t rsa", "ssh-keygen -t ed25519", "All valid"], correct: 3, explanation: "ssh-keygen generates key pairs. -t rsa/ed25519 specifies type. Creates ~/.ssh/id_rsa (private), id_rsa.pub (public). Never share private key!" },
  { id: 57, level: 3, category: "Network", type: "concept", question: "What is difference between public and private SSH keys?", options: ["Public on server, private on client; private key authenticates", "Public used for encryption, private for decryption", "Public is password, private is key", "Both same, different names"], correct: 0, explanation: "Private key (secret, on your machine) proves identity. Public key (shareable, on server) verifies identity. Never expose private key!" },
  { id: 58, level: 3, category: "Network", type: "command", question: "How do you check if port is open?", options: ["nc -zv host port", "telnet host port", "nmap host", "All can check"], correct: 3, explanation: "nc (netcat) connects and reports. telnet shows connection attempt. nmap scans ports. Example: nc -zv google.com 443 checks HTTPS port." },
  { id: 59, level: 3, category: "Network", type: "concept", question: "What is firewall?", options: ["Controls incoming/outgoing network traffic", "Network security device", "Software on host", "All above"], correct: 3, explanation: "Firewall filters packets based on rules. Host-based (iptables, firewalld, ufw). Network-based (routers, dedicated devices). Essential for security." },
  { id: 60, level: 3, category: "Network", type: "command", question: "How do you manage firewall on Ubuntu?", options: ["ufw enable/disable", "iptables", "firewalld", "All valid firewall tools"], correct: 3, explanation: "ufw simplest for Ubuntu. iptables powerful, complex. firewalld on RHEL/CentOS. Example: ufw allow 22, ufw deny 80, ufw status" },
  { id: 61, level: 3, category: "Package", type: "concept", question: "What is package manager in Linux?", options: ["Tool for installing/removing software packages", "IDE", "Text editor", "System kernel"], correct: 0, explanation: "Package manager handles installation, removal, updates. Ubuntu/Debian: apt. RHEL/CentOS: yum/dnf. Arch: pacman. Handles dependencies automatically." },
  { id: 62, level: 3, category: "Package", type: "command", question: "How do you install a package on Ubuntu?", options: ["apt install package", "apt-get install package", "aptitude install package", "All valid"], correct: 3, explanation: "apt is modern wrapper. apt-get is traditional. aptitude is advanced. All work. apt install vim | apt install git. Always: sudo apt update first!" },
  { id: 63, level: 3, category: "Package", type: "command", question: "What does apt update do?", options: ["Refreshes package lists from repos, doesn't upgrade", "Upgrades packages", "Removes packages", "Cleans cache"], correct: 0, explanation: "apt update fetches latest package list (doesn't upgrade). apt upgrade upgrades installed packages. apt full-upgrade upgrades with dependency changes." },
  { id: 64, level: 3, category: "Package", type: "command", question: "How do you find a package?", options: ["apt search package", "apt-cache search package", "apt info package", "All search/show info"], correct: 3, explanation: "apt search finds packages. apt-cache search older method. apt show displays package details. Example: apt search python | grep dev" },
  { id: 65, level: 3, category: "Package", type: "concept", question: "What are repositories (repos)?", options: ["Online sources of packages", "Local storage", "Package files", "File paths"], correct: 0, explanation: "Repositories host packages. Ubuntu has main, restricted, universe, multiverse repos. Add repos: add-apt-repository ppa:user/ppa-name" },
  { id: 66, level: 3, category: "Package", type: "command", question: "How do you remove a package?", options: ["apt remove package", "apt purge package", "apt autoremove", "All remove packages"], correct: 3, explanation: "apt remove keeps config. apt purge removes everything. apt autoremove removes unused dependencies. Use purge for clean removal." },
  { id: 67, level: 3, category: "Package", type: "concept", question: "What is dependency in package management?", options: ["Package that another package requires", "Required file", "System requirement", "Version requirement"], correct: 0, explanation: "Dependencies are required packages. apt automatically installs. Check: apt-cache depends package. Circular dependencies avoided by package design." },
  { id: 68, level: 3, category: "Package", type: "command", question: "How do you check installed version of package?", options: ["apt show package", "dpkg -l | grep package", "apt-cache show package", "All show version"], correct: 3, explanation: "apt show displays installed version. dpkg -l lists all. apt-cache show shows available. Example: apt show apache2 shows version info." },
  { id: 69, level: 3, category: "Package", type: "concept", question: "What is PPA?", options: ["Personal Package Archive - community repos", "Private Package Archive", "Package Archive Protocol", "Programmable Archive"], correct: 0, explanation: "PPAs allow developers to publish packages outside official repos. Add: sudo add-apt-repository ppa:user/ppa-name. Useful for latest versions." },
  { id: 70, level: 3, category: "Package", type: "concept", question: "What's the difference between apt and apt-get?", options: ["apt is modern, apt-get is traditional but still valid", "Same thing", "apt-get is faster", "apt is slower"], correct: 0, explanation: "apt combines apt-get/apt-cache functionality with better UX. apt-get still works. apt preferred for new scripts. Both do same job." },
  { id: 71, level: 3, category: "System", type: "command", question: "How do you view system logs?", options: ["journalctl", "tail -f /var/log/syslog", "less /var/log/auth.log", "All view logs"], correct: 3, explanation: "journalctl views systemd journal (modern). /var/log contains logs (traditional). journalctl -u service shows specific service. tail -f tails live logs." },
  { id: 72, level: 3, category: "System", type: "command", question: "How do you check running services?", options: ["systemctl status", "systemctl list-units --type=service", "service --status-all", "All show services"], correct: 3, explanation: "systemctl status [service] checks one. systemctl list-units shows all. service older command. systemctl enable/disable autostart on boot." },
  { id: 73, level: 3, category: "System", type: "command", question: "How do you restart a service?", options: ["systemctl restart nginx", "service nginx restart", "Both valid restart methods", "systemctl reload"], correct: 2, explanation: "Both restart service. systemctl is modern, service is traditional. reload reloads config without stopping. restart = stop + start." },
  { id: 74, level: 3, category: "System", type: "concept", question: "What is init system?", options: ["First process (PID 1) that starts all others", "System initialization file", "Boot configuration", "Service starter"], correct: 0, explanation: "init (PID 1) is first process. systemd is modern init system. Manages services, mounts, user sessions. Old: SysVinit. Modern: systemd." },
  { id: 75, level: 3, category: "System", type: "concept", question: "What is systemd?", options: ["Modern init system for service management", "System daemon", "Service protocol", "Boot loader"], correct: 0, explanation: "systemd manages services, logging (journald), timers, mounts. Uses .service files in /etc/systemd/system/. Unified system manager. Some controversy about complexity." },
  { id: 76, level: 3, category: "System", type: "command", question: "How do you see system information?", options: ["uname -a", "hostnamectl", "lsb_release -a", "All show system info"], correct: 3, explanation: "uname -a shows kernel/hardware. hostnamectl shows hostname/OS. lsb_release shows Ubuntu version. lshw shows hardware details." },
  { id: 77, level: 3, category: "System", type: "concept", question: "What is kernel panic?", options: ["Unrecoverable error forcing system halt", "Error message", "Crash dump", "All above"], correct: 3, explanation: "Kernel panic stops OS. Causes: bad driver, memory corruption, OOM (out of memory). Check: dmesg. Avoid: don't modprobe untrusted modules." },
  { id: 78, level: 3, category: "System", type: "command", question: "How do you update system?", options: ["apt upgrade", "apt full-upgrade", "apt dist-upgrade", "All update packages"], correct: 3, explanation: "apt upgrade updates packages. full-upgrade handles dependency changes. dist-upgrade prepares for distribution upgrade. Use update first!" },
  { id: 79, level: 3, category: "System", type: "concept", question: "What is runlevel?", options: ["System state determining what services run", "Performance level", "CPU priority", "Memory allocation"], correct: 0, explanation: "Runlevels: 0=halt, 1=single user, 2=multi-user, 3=multi-user network, 5=GUI. Modern systemd uses targets instead. Old: /etc/inittab" },
  { id: 80, level: 3, category: "System", type: "command", question: "How do you schedule recurring tasks?", options: ["crontab -e", "crontab -l", "at command for one-time", "All schedule tasks"], correct: 3, explanation: "crontab schedules recurring. at schedules one-time. crontab -e edits. crontab -l lists. Format: min hour day month weekday command" },
  { id: 81, level: 3, category: "Security", type: "concept", question: "What is principle of least privilege?", options: ["User only gets necessary permissions", "Minimal password length", "Firewall rule", "Security level"], correct: 0, explanation: "Never give root when user sufficient. Run services as non-root user. Remove unnecessary permissions. Reduces damage if compromised." },
  { id: 82, level: 3, category: "Security", type: "concept", question: "What are common attack vectors?", options: ["Weak passwords, unpatched systems, open ports, misconfigs", "Only viruses", "Only from internet", "Only from users"], correct: 0, explanation: "Security requires layered defense: strong passwords, updates, firewall, user permissions, monitoring, backups, secure config, least privilege." },
  { id: 83, level: 3, category: "Security", type: "command", question: "How do you check failed login attempts?", options: ["tail /var/log/auth.log", "grep Failed /var/log/auth.log", "lastb", "All show failures"], correct: 3, explanation: "auth.log shows logins. lastb shows failed attempts. journalctl -u ssh shows SSH logs. Monitor: fail2ban prevents brute force." },
  { id: 84, level: 3, category: "Security", type: "concept", question: "What is fail2ban?", options: ["Tool that bans IPs after failed login attempts", "Firewall", "Intrusion detection", "VPN"], correct: 0, explanation: "fail2ban monitors logs, bans IPs after N failed attempts. Install: apt install fail2ban. Configurable timeouts and rules. Prevents brute force attacks." },
  { id: 85, level: 3, category: "Security", type: "command", question: "How do you find files with SUID bit set?", options: ["find / -perm -4000", "find / -perm -2000", "find / -perm -1000", "All find setbits"], correct: 0, explanation: "find / -perm -4000 finds SUID files. -2000 SGID. -1000 sticky bit. SUID allows program to run as owner (security risk if writable!)." },
  { id: 86, level: 3, category: "Security", type: "concept", question: "What is SELinux?", options: ["Mandatory access control security module", "Simple encryption", "Software protection", "User authentication"], correct: 0, explanation: "SELinux adds security labels to files/processes. Enforces policies. Enabled on RHEL/CentOS. Can be complex. AppArmor is alternative (Ubuntu)." },
  { id: 87, level: 3, category: "Security", type: "command", question: "How do you check listening ports and which process?", options: ["lsof -i -P -n", "netstat -tup", "ss -tup", "All show process/port"], correct: 3, explanation: "lsof -i shows process by port. netstat -tup old way. ss -tup modern way. Essential for finding unexpected listeners. Check for rootkit/malware." },
  { id: 88, level: 3, category: "Security", type: "concept", question: "What are file encryption options in Linux?", options: ["GPG, OpenSSL, LUKS (disk encryption)", "Only passwords", "Only folder locks", "Built-in only"], correct: 0, explanation: "GPG encrypts files. OpenSSL encrypts with ciphers. LUKS encrypts entire disk/partition. Full-disk encryption protects data if drive stolen." },
  { id: 89, level: 3, category: "Security", type: "command", question: "How do you enable LUKS encryption?", options: ["cryptsetup luksFormat /dev/device", "In installation process", "Linux Unified Key Setup", "All above"], correct: 3, explanation: "cryptsetup creates LUKS encrypted volumes. Usually during OS install. Can encrypt partition post-install (backup first!). Requires password at boot." },
  { id: 90, level: 3, category: "Security", type: "concept", question: "What's the difference between authentication and authorization?", options: ["Auth verifies identity; authz checks permissions", "Both check permissions", "Both verify user", "No difference"], correct: 0, explanation: "Authentication (who are you?) uses password/keys. Authorization (what can you do?) uses file permissions/roles. Both needed for security." }
];

let currentLessonIndex = 0;
let totalScore = 0;

function loadLesson() {
  if (currentLessonIndex >= lessons.length) {
    showCompletion();
    return;
  }

  const lesson = lessons[currentLessonIndex];
  updateProgress();

  // Shuffle options while tracking correct answer
  const shuffled = lesson.options.map((opt, idx) => ({opt, originalIdx: idx})).sort(() => Math.random() - 0.5);
  const newCorrectIdx = shuffled.findIndex(item => item.originalIdx === lesson.correct);

  const quizHTML = `
    <div>
      <div style="margin-bottom: 1.5rem;">
        <div style="margin-bottom: 1rem;">
          <span class="badge badge-category">${lesson.category}</span>
          <span class="badge badge-level">Level ${lesson.level}</span>
          <span class="badge badge-type">${lesson.type.toUpperCase()}</span>
        </div>
        <p class="question-text">${lesson.question}</p>
      </div>

      <div class="options-grid">
        ${shuffled.map(({opt}, idx) => `
          <button class="option-btn" onclick="checkAnswer(${idx}, ${newCorrectIdx}, ${currentLessonIndex})" style="cursor: pointer;">
            ${opt}
          </button>
        `).join('')}
      </div>
    </div>
  `;

  document.getElementById('quiz-content').innerHTML = quizHTML;
}

function checkAnswer(selectedIdx, correctIdx, lessonIdx) {
  const lesson = lessons[lessonIdx];
  const isCorrect = selectedIdx === correctIdx;
  
  if (isCorrect) {
    totalScore += 100;
  }

  const feedbackClass = isCorrect ? 'feedback-correct' : 'feedback-incorrect';
  const feedbackTitle = isCorrect ? '✓ Correct!' : '✗ Incorrect';
  const feedbackColor = isCorrect ? '#4caf50' : '#f44336';

  const feedbackHTML = `
    <div class="${feedbackClass}">
      <h3 style="color: ${feedbackColor}; font-size: 1.5rem; margin: 0 0 1rem 0;">${feedbackTitle}</h3>
      <div class="explanation-box" style="border-left-color: ${feedbackColor};">
        <p class="explanation-title">Explanation:</p>
        <p class="explanation-text">${lesson.explanation}</p>
      </div>
      <button class="next-btn" onclick="nextLesson()" style="cursor: pointer;">Next Question</button>
    </div>
  `;

  document.getElementById('quiz-content').innerHTML = feedbackHTML;
}

function nextLesson() {
  currentLessonIndex++;
  loadLesson();
}

function updateProgress() {
  const percent = (currentLessonIndex / lessons.length) * 100;
  document.getElementById('score').textContent = totalScore;
  document.getElementById('progress').textContent = `${currentLessonIndex}/${lessons.length}`;
  document.getElementById('progress-fill').style.width = percent + '%';
}

function showCompletion() {
  const accuracy = Math.round((totalScore / (lessons.length * 100)) * 100);
  let mastery = '';
  if (accuracy >= 90) mastery = 'Linux Master! 🎓';
  else if (accuracy >= 80) mastery = 'Advanced Admin 🔧';
  else if (accuracy >= 70) mastery = 'Competent Sysadmin 💻';
  else if (accuracy >= 60) mastery = 'Linux Learner 📚';
  else mastery = 'Keep Learning 🌱';

  const html = `
    <div class="completion-box">
      <h2 class="completion-title">Course Complete!</h2>
      <p class="mastery-level">${mastery}</p>
      
      <div style="background: #fff; padding: 2rem; border-radius: 1rem; margin: 2rem 0;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
          <div class="stat-box">
            <div class="stat-number">${totalScore}</div>
            <div class="stat-label">Total Points</div>
          </div>
          <div class="stat-box">
            <div class="stat-number">${accuracy}%</div>
            <div class="stat-label">Accuracy</div>
          </div>
        </div>
      </div>

      <p style="color: #7c3aed; max-width: 600px; margin: 0 auto 2rem; line-height: 1.6;">
        You've completed all 90 comprehensive Linux lessons covering commands, concepts, file systems, permissions, processes, networking, security, and advanced administration. You're now a Linux master!
      </p>

      <a href="mini_games.php" class="back-btn" style="text-decoration: none; display: inline-block;">Back to Games</a>
    </div>
  `;

  document.getElementById('game-container').innerHTML = html;
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

toggleInput.addEventListener('change', function() {
  if (toggleInput.checked) {
    body.style.background = "#222";
    sidebar.style.background = "#181028";
    sidebar.style.color = "#fff";
    mainContent.style.background = "transparent";
    document.querySelectorAll('.nav-link').forEach(a => a.style.color = "#fff");
    document.querySelectorAll('[style*="background: #a21caf"]')[0].style.background = "#181028";
    toggleSlider.style.background = "#2563eb";
    toggleKnob.style.left = "28px";
    toggleKnob.style.background = "#2563eb";
    iconMoon.style.display = "none";
    iconSun.style.display = "block";
    toggleLabel.textContent = "Dark Mode";
    document.querySelectorAll('.question-container').forEach(el => {
      el.style.background = "linear-gradient(135deg, #2a1a3f 0%, #3d2555 100%)";
      el.style.borderColor = "#5a3a6f";
    });
    document.querySelectorAll('.question-text').forEach(el => el.style.color = "#d4a5d4");
    document.querySelectorAll('.option-btn').forEach(el => {
      el.style.background = "#1a0f2e";
      el.style.borderColor = "#5a3a6f";
      el.style.color = "#d4a5d4";
    });
    document.querySelector('.page-title').style.color = "#d4a5d4";
  } else {
    body.style.background = "linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 100%)";
    sidebar.style.background = "#fff";
    sidebar.style.color = "#a21caf";
    mainContent.style.background = "transparent";
    document.querySelectorAll('.nav-link').forEach(a => a.style.color = "#a21caf");
    document.querySelectorAll('[style*="background: #a21caf"]')[0].style.background = "#a21caf";
    toggleSlider.style.background = "#fff";
    toggleKnob.style.left = "4px";
    toggleKnob.style.background = "#a21caf";
    iconMoon.style.display = "block";
    iconSun.style.display = "none";
    toggleLabel.textContent = "Light Mode";
    document.querySelectorAll('.question-container').forEach(el => {
      el.style.background = "linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%)";
      el.style.borderColor = "#fbc2eb";
    });
    document.querySelectorAll('.question-text').forEach(el => el.style.color = "#a21caf");
    document.querySelectorAll('.option-btn').forEach(el => {
      el.style.background = "#fff";
      el.style.borderColor = "#fbc2eb";
      el.style.color = "#a21caf";
    });
    document.querySelector('.page-title').style.color = "#a21caf";
  }
});

// Start the game
window.addEventListener('load', loadLesson);
</script>
</body>
</html>
