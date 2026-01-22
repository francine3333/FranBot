<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>PHP Master - Rischa Chatbot</title>
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
    .code-block {
      background: #1e1e1e;
      color: #d4d4d4;
      padding: 1rem;
      border-radius: 0.5rem;
      margin: 0.8rem 0;
      overflow-x: auto;
      font-family: 'Courier New', monospace;
      font-size: 0.9rem;
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
        <h1 class="page-title">PHP Master</h1>
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
            <div class="stat-label" style="margin-top: 0.5rem;">PHP Mastery</div>
          </div>
        </div>
      </div>

      <div id="quiz-content" class="question-container"></div>
    </div>
  </main>
</div>

<script>
// Comprehensive PHP Master - 80 Detailed Lessons with Real-World Examples
const lessons = [
  { id: 1, level: 1, category: "PHP Basics", type: "concept", question: "What is PHP?", options: ["Server-side scripting language for web development", "Programming language", "Web technology", "Client-side script"], correct: 0, explanation: "PHP: Hypertext Preprocessor. Runs on server (backend). Generates HTML sent to browser. Powers 77% of websites! Real-world: When you submit a form on Facebook, PHP processes it on their servers.", realWorld: "Example: A user submits a login form → PHP verifies credentials from database → returns personalized dashboard." },
  { id: 2, level: 1, category: "PHP Basics", type: "concept", question: "What is server-side processing?", options: ["Code executing on server before sending to client browser", "Running on server", "Backend execution", "Server processing"], correct: 0, explanation: "Server-side: Code runs on web server, client only receives result (HTML). Secure - client can't see source code. Real-world: Banks use server-side to protect account info before sending to browser.", realWorld: "Bank login: Your password is sent to server → PHP checks it against database → only then sends account info to your browser." },
  { id: 3, level: 1, category: "PHP Basics", type: "concept", question: "What is .php file?", options: ["Text file containing PHP code executed by server", "PHP file", "Code file", "Script file"], correct: 0, explanation: ".php files contain PHP code. Server parses it, executes, outputs result. Client receives only HTML/CSS/JS output. Real-world: Twitter's servers have thousands of .php files handling posts, likes, followers.", realWorld: "When you tweet: POST request → PHP file processes it → stores in database → returns updated timeline HTML." },
  { id: 4, level: 1, category: "Syntax Basics", type: "concept", question: "What is PHP tag syntax?", options: ["<?php code here ?>", "<php>code</php>", "<script php>", "<?php! code ?>"], correct: 0, explanation: "PHP code wrapped in <?php ?> tags. Server recognizes and executes. Real-world: Large projects have many .php files with multiple <?php ?> blocks.", realWorld: "File: users.php with multiple <?php ?> sections: one gets user list, one validates input, one updates database." },
  { id: 5, level: 1, category: "Syntax Basics", type: "concept", question: "What is variable in PHP?", options: ["Container storing data with $ prefix like $name", "Data storage", "Name placeholder", "Memory location"], correct: 0, explanation: "Variable: starts with $. Stores value. $name = 'John'. Dynamic typing - can change type. Real-world: User input stored in variables, manipulated, then saved.", realWorld: "Form submission: $_POST['email'] stored in $email → validated → inserted into database as $user_email." },
  { id: 6, level: 1, category: "Syntax Basics", type: "concept", question: "What is data type in PHP?", options: ["String, Integer, Float, Boolean, Array, Object, NULL", "Variable type", "Value category", "Storage type"], correct: 0, explanation: "PHP data types: String ('text'), Integer (123), Float (3.14), Boolean (true/false), Array, Object, NULL. Real-world: Form data treated as strings, math as integers/floats.", realWorld: "E-commerce: product price as Float ($19.99), quantity as Integer (5), in_stock as Boolean, tags as Array." },
  { id: 7, level: 1, category: "Syntax Basics", type: "concept", question: "What is string in PHP?", options: ["Text data enclosed in quotes like 'hello' or \"hello\"", "Text data", "Character sequence", "Quote data"], correct: 0, explanation: "String: text in single or double quotes. Can concatenate with .. Real-world: User names, emails, messages all strings.", realWorld: "Gmail: recipient email (string) + subject (string) + message (string) → combined in email template." },
  { id: 8, level: 1, category: "Syntax Basics", type: "concept", question: "What is echo in PHP?", options: ["Outputs text/variables to browser display", "Print command", "Output statement", "Display function"], correct: 0, explanation: "echo: outputs data. echo 'Hello'; → displays Hello in browser. Most used output method. Real-world: Displaying user data, error messages, dynamic content.", realWorld: "After fetching user: echo 'Welcome ' . $username; → browser shows 'Welcome John'." },
  { id: 9, level: 1, category: "Syntax Basics", type: "concept", question: "What is comment in PHP?", options: ["Text ignored by server for documentation // or /* */", "Code note", "Documentation", "Ignored text"], correct: 0, explanation: "Comments: // single line, /* */ multi-line. Explain code. Not executed. Real-world: Teams use comments to explain complex logic.", realWorld: "// Validate email format before saving\nif (filter_var($email, FILTER_VALIDATE_EMAIL)) { save to database }" },
  { id: 10, level: 1, category: "Operators", type: "concept", question: "What is arithmetic operator?", options: ["+ - * / % for math operations", "Math symbols", "Calculation", "Operators"], correct: 0, explanation: "Operators: + (add), - (subtract), * (multiply), / (divide), % (modulo). Real-world: Price calculations, age from birth year.", realWorld: "E-commerce: $total = $price * $quantity; then add tax: $total = $total + ($total * 0.1);" },
  { id: 11, level: 2, category: "Control Structures", type: "concept", question: "What is if statement?", options: ["Conditional executing code if condition is true", "Condition check", "Decision making", "True/false"], correct: 0, explanation: "if (condition) { code }. Executes code only if true. Real-world: Checking user permissions, validating input.", realWorld: "if ($age >= 18) { show_adult_content(); } else { show_kid_content(); }" },
  { id: 12, level: 2, category: "Control Structures", type: "concept", question: "What is else if statement?", options: ["Additional condition if first if is false", "Else if condition", "Multiple conditions", "Else alternative"], correct: 0, explanation: "if () { } else if () { } else { }. Multiple branches. Real-world: User roles checking.", realWorld: "if ($role == 'admin') { full_access(); } else if ($role == 'user') { limited_access(); } else { no_access(); }" },
  { id: 13, level: 2, category: "Control Structures", type: "concept", question: "What is for loop?", options: ["Repeats code block specific number of times", "Repetition loop", "Counter loop", "Iteration"], correct: 0, explanation: "for (i=0; i<10; i++) { code }. Executes 10 times. Real-world: Processing lists, generating HTML.", realWorld: "Display 10 products: for ($i=0; $i<count($products); $i++) { echo $products[$i]['name']; }" },
  { id: 14, level: 2, category: "Control Structures", type: "concept", question: "What is while loop?", options: ["Repeats code while condition remains true", "Condition loop", "Repeat while true", "Continuous loop"], correct: 0, explanation: "while (condition) { code }. Continues until condition false. Real-world: Reading database results.", realWorld: "while ($row = $result->fetch_assoc()) { process each database row until none left }" },
  { id: 15, level: 2, category: "Control Structures", type: "concept", question: "What is foreach loop?", options: ["Iterates through array elements automatically", "Array loop", "Element loop", "Auto iteration"], correct: 0, explanation: "foreach ($array as $value). Easiest for arrays. Real-world: Displaying lists, processing multiple items.", realWorld: "Show all comments: foreach ($comments as $comment) { echo $comment['text']; }" },
  { id: 16, level: 2, category: "Arrays", type: "concept", question: "What is array in PHP?", options: ["Collection of values indexed or keyed", "Data collection", "Multiple values", "List"], correct: 0, explanation: "Array: multiple values in one variable. $arr = [1, 2, 3]. Real-world: Lists of products, user data.", realWorld: "Shopping cart: $cart = ['apple' => 5, 'banana' => 3]; stores product => quantity pairs." },
  { id: 17, level: 2, category: "Arrays", type: "concept", question: "What is indexed array?", options: ["Array using numeric index starting from 0", "Numeric array", "Number index", "Position-based"], correct: 0, explanation: "Indexed array: $arr[0], $arr[1]. Auto-numbered. Real-world: Lists of items in order.", realWorld: "$names = ['John', 'Jane', 'Bob']; $names[0] = 'John', $names[1] = 'Jane'." },
  { id: 18, level: 2, category: "Arrays", type: "concept", question: "What is associative array?", options: ["Array using string keys instead of numbers", "Key-value pairs", "Named index", "String index"], correct: 0, explanation: "Associative: $arr['key']. Key-value pairs. Real-world: User data, database rows.", realWorld: "$user = ['name' => 'John', 'email' => 'john@email.com', 'age' => 30];" },
  { id: 19, level: 2, category: "Functions", type: "concept", question: "What is function in PHP?", options: ["Reusable block of code with name and parameters", "Code block", "Named code", "Callable code"], correct: 0, explanation: "Function: groups code, reusable. function myFunc() { }. Real-world: Validate email, process payment, send email.", realWorld: "function calculateDiscount($price, $percent) { return $price * (1 - $percent/100); }" },
  { id: 20, level: 2, category: "Functions", type: "concept", question: "What is function parameter?", options: ["Variable passed to function when called", "Input variable", "Function argument", "Input parameter"], correct: 0, explanation: "Parameter: variable in function definition. Argument: value when calling. Real-world: Function reusable with different inputs.", realWorld: "function greet($name) { echo 'Hello ' . $name; } then greet('John') and greet('Jane')." },
  { id: 21, level: 2, category: "Functions", type: "concept", question: "What is return statement?", options: ["Returns value from function to caller", "Result value", "Function output", "Return value"], correct: 0, explanation: "return: sends value back. $result = myFunc(5). Real-world: Math, validation functions return values.", realWorld: "function isValidEmail($email) { return filter_var($email, FILTER_VALIDATE_EMAIL); }" },
  { id: 22, level: 2, category: "Forms and Input", type: "concept", question: "What is $_POST?", options: ["Superglobal containing form data submitted with POST method", "Form data", "Post data", "Input data"], correct: 0, explanation: "$_POST: captures form data from POST request. $_POST['fieldname']. Real-world: Login forms, registrations.", realWorld: "HTML form submits → PHP receives in $_POST['email'], $_POST['password'] → validates → saves user." },
  { id: 23, level: 2, category: "Forms and Input", type: "concept", question: "What is $_GET?", options: ["Superglobal containing URL query parameters", "URL data", "Query string", "URL variables"], correct: 0, explanation: "$_GET: URL parameters. example.com?id=5 → $_GET['id'] = 5. Real-world: Filters, pagination, search.", realWorld: "Search: google.com?q=php → $_GET['q'] = 'php' → returns search results." },
  { id: 24, level: 2, category: "Forms and Input", type: "concept", question: "What is form validation?", options: ["Checking user input before processing to prevent errors", "Input checking", "Verification", "Data validation"], correct: 0, explanation: "Validation: check email format, required fields, length limits. Security critical. Real-world: Prevent bad data in database.", realWorld: "if (empty($_POST['email'])) { error('Email required'); } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { error('Invalid email'); }" },
  { id: 25, level: 3, category: "Database Basics", type: "concept", question: "What is database?", options: ["Organized data storage system accessed via SQL queries", "Data storage", "Information repository", "Data collection"], correct: 0, explanation: "Database: stores structured data. MySQL/PostgreSQL common. Real-world: All apps use databases.", realWorld: "Facebook stores billions of user profiles, posts, messages in databases. Every action queries/updates database." },
  { id: 26, level: 3, category: "Database Basics", type: "concept", question: "What is MySQL?", options: ["Popular open-source relational database system", "Database system", "Database software", "Data storage"], correct: 0, explanation: "MySQL: free, reliable, widely-used. Stores data in tables. PHP + MySQL = powerful combination. Real-world: Powers WordPress, Drupal.", realWorld: "WordPress blog: stores posts, comments, users in MySQL database. When you view blog, PHP queries MySQL." },
  { id: 27, level: 3, category: "Database Basics", type: "concept", question: "What is SQL?", options: ["Structured Query Language for database operations", "Query language", "Database language", "Data language"], correct: 0, explanation: "SQL: commands to query/update database. SELECT, INSERT, UPDATE, DELETE. Real-world: Core database skill.", realWorld: "SELECT * FROM users WHERE age > 18; gets all adult users. INSERT INTO users VALUES(...) adds new user." },
  { id: 28, level: 3, category: "Database Connection", type: "concept", question: "What is database connection in PHP?", options: ["Link between PHP and database to execute queries", "Database link", "Data connection", "Query connection"], correct: 0, explanation: "Connection: establish link to database. mysqli_connect() or PDO. Real-world: Every database operation needs connection.", realWorld: "$conn = mysqli_connect('localhost', 'user', 'password', 'database'); then execute queries through $conn." },
  { id: 29, level: 3, category: "Database Connection", type: "concept", question: "What is mysqli in PHP?", options: ["MySQLi - improved extension for MySQL database interaction", "Database extension", "MySQL interface", "Database driver"], correct: 0, explanation: "MySQLi: improved MySQL interface. Object-oriented or procedural. Supports prepared statements. Real-world: Safer than old MySQL.", realWorld: "$result = mysqli_query($conn, 'SELECT * FROM users'); mysqli_fetch_assoc($result) returns each row as array." },
  { id: 30, level: 3, category: "Database Queries", type: "concept", question: "What is SELECT query?", options: ["Retrieves data from database table", "Data retrieval", "Fetch query", "Read data"], correct: 0, explanation: "SELECT: gets data. SELECT * FROM users WHERE age > 21. Real-world: Get products, posts, users.", realWorld: "E-commerce: SELECT * FROM products WHERE category='shoes' AND price < 100; returns affordable shoes." },
  { id: 31, level: 3, category: "Database Queries", type: "concept", question: "What is INSERT query?", options: ["Adds new row/record to database table", "Add data", "Create record", "Store data"], correct: 0, explanation: "INSERT: adds data. INSERT INTO users VALUES(...). Real-world: User registration, new comment.", realWorld: "User signs up → INSERT INTO users (name, email, password) VALUES ('John', 'john@email.com', hash);" },
  { id: 32, level: 3, category: "Database Queries", type: "concept", question: "What is UPDATE query?", options: ["Modifies existing data in database table", "Change data", "Modify record", "Edit data"], correct: 0, explanation: "UPDATE: modifies data. UPDATE users SET email='new@email.com' WHERE id=5. Real-world: Edit profile, update status.", realWorld: "User changes email → UPDATE users SET email='newemail@email.com' WHERE id=$user_id;" },
  { id: 33, level: 3, category: "Database Queries", type: "concept", question: "What is DELETE query?", options: ["Removes record from database table", "Remove data", "Delete record", "Erase data"], correct: 0, explanation: "DELETE: removes data. DELETE FROM users WHERE id=5. Real-world: Delete account, remove post.", realWorld: "User deletes post → DELETE FROM posts WHERE id=$post_id AND user_id=$current_user_id;" },
  { id: 34, level: 3, category: "Security", type: "concept", question: "What is SQL injection?", options: ["Attack inputting SQL code to manipulate database queries", "SQL hack", "Database attack", "Query attack"], correct: 0, explanation: "SQL injection: hacker inputs SQL to alter queries. Example: ' OR '1'='1. Prevented by prepared statements. Real-world: Critical security risk.", realWorld: "Unsafe: $query = \"SELECT * FROM users WHERE email='$_POST[email]'\" → hacker inputs: ' OR '1'='1' → retrieves all users!" },
  { id: 35, level: 3, category: "Security", type: "concept", question: "What is prepared statement?", options: ["Parameterized query preventing SQL injection attacks", "Safe query", "Secure statement", "Protected query"], correct: 0, explanation: "Prepared statement: separates code and data. Prevents SQL injection. Real-world: Best practice, always use.", realWorld: "$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?'); $stmt->bind_param('s', $_POST['email']); $stmt->execute();" },
  { id: 36, level: 3, category: "Security", type: "concept", question: "What is password hashing?", options: ["Converting password to irreversible hash for secure storage", "Encrypt password", "Password security", "Hash protection"], correct: 0, explanation: "Hash: password → irreversible hash. password_hash(), password_verify(). Never store plain passwords. Real-world: Legal requirement.", realWorld: "User sets password 'mypass123' → stored as hash like $2y$10$... → login: verify input hash against stored hash." },
  { id: 37, level: 3, category: "Security", type: "concept", question: "What is XSS attack?", options: ["Cross-Site Scripting injecting malicious JavaScript into page", "Script injection", "JavaScript attack", "Code injection"], correct: 0, explanation: "XSS: inject JS code. Prevented by htmlspecialchars(). Real-world: Common vulnerability.", realWorld: "User comment: <script>alert('hacked')</script> → displayed to others → script runs → steals cookies. Prevented by escaping HTML." },
  { id: 38, level: 3, category: "Sessions", type: "concept", question: "What is session in PHP?", options: ["Way to store user data across multiple page requests", "User data persistence", "Persistent storage", "User tracking"], correct: 0, explanation: "Session: stores user data server-side. $_SESSION. Survives page reloads. Real-world: Remember logged-in user across pages.", realWorld: "User logs in → $_SESSION['user_id'] = 5 → visit different page → still logged in because session preserved." },
  { id: 39, level: 3, category: "Sessions", type: "concept", question: "What is session_start()?", options: ["Initializes session variables at start of page", "Start session", "Session initialization", "Enable sessions"], correct: 0, explanation: "session_start(): enables sessions. Must call before using $_SESSION. Real-world: First line in protected pages.", realWorld: "Protected page starts with session_start(); if (empty($_SESSION['user_id'])) { redirect_to_login(); }" },
  { id: 40, level: 3, category: "Sessions", type: "concept", question: "What is cookie in PHP?", options: ["Small data stored on client browser for persistent storage", "Client data", "Browser storage", "Persistent data"], correct: 0, explanation: "Cookie: client-side storage. setcookie(). Sent with requests. Real-world: Remember login, preferences.", realWorld: "setcookie('remember_user', 'john123', time()+86400); next visit, $_COOKIE['remember_user'] = 'john123'." },
  { id: 41, level: 3, category: "Includes and Requires", type: "concept", question: "What is include in PHP?", options: ["Includes external file content, gives warning if not found", "File inclusion", "Import file", "Load file"], correct: 0, explanation: "include: loads file. Non-fatal if missing. include 'header.php'. Real-world: Reuse code across pages.", realWorld: "Every page includes header: <?php include 'header.php'; ?> → same header on all pages, update once." },
  { id: 42, level: 3, category: "Includes and Requires", type: "concept", question: "What is require in PHP?", options: ["Requires external file, fatal error if not found", "Required file", "Mandatory include", "Force load"], correct: 0, explanation: "require: loads file. Fatal if missing. Halts execution. Real-world: Essential files like config, database connection.", realWorld: "require 'config.php'; dies if missing, preventing app from running without critical configuration." },
  { id: 43, level: 3, category: "File Handling", type: "concept", question: "What is file handling in PHP?", options: ["Reading, writing, creating files on server", "File operations", "File management", "File I/O"], correct: 0, explanation: "File handling: create, read, write, delete files. fopen(), fwrite(), fclose(). Real-world: Logs, uploads, exports.", realWorld: "User uploads CSV → PHP reads file → parses data → imports into database. Save errors to log file." },
  { id: 44, level: 3, category: "File Handling", type: "concept", question: "What is file upload in PHP?", options: ["User uploads file via form, server validates and stores", "Upload file", "File submission", "File transfer"], correct: 0, explanation: "File upload: HTML form type='file' → $_FILES contains uploaded file. Real-world: Profile pictures, documents.", realWorld: "User uploads profile pic → PHP validates (jpg/png only, <2MB) → saves to /uploads/user_123.jpg → stores path in database." },
  { id: 45, level: 3, category: "String Functions", type: "concept", question: "What is strlen()?", options: ["Returns length of string", "String length", "Character count", "Size function"], correct: 0, explanation: "strlen('hello') = 5. Counts characters. Real-world: Validate input length, display char count.", realWorld: "if (strlen($_POST['password']) < 8) { error('Password must be 8+ characters'); }" },
  { id: 46, level: 3, category: "String Functions", type: "concept", question: "What is trim()?", options: ["Removes whitespace from beginning and end of string", "Remove spaces", "Whitespace removal", "String trim"], correct: 0, explanation: "trim() removes spaces. ltrim() left, rtrim() right. Real-world: Clean user input.", realWorld: "User types '  john  ' → trim gives 'john' → prevents blank user issues from extra spaces." },
  { id: 47, level: 3, category: "String Functions", type: "concept", question: "What is strtolower()?", options: ["Converts string to lowercase", "Lowercase conversion", "Lower case", "String case"], correct: 0, explanation: "strtolower('HELLO') = 'hello'. strtoupper() opposite. Real-world: Normalize input for comparison.", realWorld: "Email addresses: strtolower($_POST['email']) ensures 'JOHN@EMAIL.COM' and 'john@email.com' treated as same." },
  { id: 48, level: 3, category: "String Functions", type: "concept", question: "What is str_replace()?", options: ["Replaces all occurrences of substring with another", "Text replacement", "String substitution", "Find replace"], correct: 0, explanation: "str_replace('old', 'new', 'old text') = 'new text'. Real-world: Censoring, templating.", realWorld: "Email template: 'Hello {name}' → str_replace('{name}', $user_name, template) → 'Hello John'." },
  { id: 49, level: 3, category: "String Functions", type: "concept", question: "What is substr()?", options: ["Extracts portion of string", "Substring", "String portion", "Extract part"], correct: 0, explanation: "substr('hello', 0, 3) = 'hel'. Real-world: Get filename, truncate text.", realWorld: "User bio too long: echo substr($bio, 0, 100) . '...' displays first 100 chars with ellipsis." },
  { id: 50, level: 3, category: "String Functions", type: "concept", question: "What is explode()?", options: ["Splits string into array using delimiter", "String split", "Array conversion", "Separate string"], correct: 0, explanation: "explode(',', 'a,b,c') = ['a','b','c']. Real-world: Parse CSV, tags.", realWorld: "User tags input: 'php,javascript,mysql' → explode(',', tags) → [0]='php', [1]='javascript', [2]='mysql'." },
  { id: 51, level: 3, category: "String Functions", type: "concept", question: "What is implode()?", options: ["Joins array elements into single string with glue", "Array join", "String concatenation", "Array to string"], correct: 0, explanation: "implode(',', ['a','b','c']) = 'a,b,c'. Opposite of explode. Real-world: Store array as CSV.", realWorld: "Tags array: ['php', 'mysql', 'javascript'] → implode(',', tags) = 'php,mysql,javascript' → save to database." },
  { id: 52, level: 3, category: "Array Functions", type: "concept", question: "What is count()?", options: ["Returns number of elements in array", "Array size", "Element count", "Array length"], correct: 0, explanation: "count(['a','b','c']) = 3. Real-world: Loop iterations, check if empty.", realWorld: "if (count($_POST['images']) > 5) { error('Max 5 images allowed'); }" },
  { id: 53, level: 3, category: "Array Functions", type: "concept", question: "What is in_array()?", options: ["Checks if value exists in array", "Search array", "Value check", "Array search"], correct: 0, explanation: "in_array('apple', ['apple','orange']) = true. Real-world: Check permissions, valid values.", realWorld: "if (in_array($role, ['admin', 'moderator'])) { allow_editing(); }" },
  { id: 54, level: 3, category: "Array Functions", type: "concept", question: "What is array_push()?", options: ["Adds element to end of array", "Append array", "Add element", "Array add"], correct: 0, explanation: "array_push($arr, 'new') adds to end. Real-world: Build dynamic lists.", realWorld: "Shopping cart: foreach ($products as $p) { array_push($cart, $p); } builds cart array." },
  { id: 55, level: 3, category: "Array Functions", type: "concept", question: "What is array_keys()?", options: ["Returns all keys from associative array", "Get keys", "Array indices", "Key list"], correct: 0, explanation: "array_keys($arr) returns ['key1','key2']. Real-world: Get field names, column headers.", realWorld: "$user = ['name'=>'John', 'email'=>'john@email.com']; array_keys($user) = ['name', 'email']." },
  { id: 56, level: 3, category: "Array Functions", type: "concept", question: "What is array_values()?", options: ["Returns all values from array with numeric indices", "Get values", "Array values", "Value list"], correct: 0, explanation: "array_values($arr) returns [value1, value2] with numeric keys. Real-world: Reset keys, get values only.", realWorld: "Reassign numeric keys: $user has string keys, array_values($user) gives numeric 0,1,2..." },
  { id: 57, level: 3, category: "Array Functions", type: "concept", question: "What is array_merge()?", options: ["Combines two or more arrays into one", "Merge arrays", "Array combination", "Join arrays"], correct: 0, explanation: "array_merge([1,2], [3,4]) = [1,2,3,4]. Real-world: Combine data, batch results.", realWorld: "Get results from two queries: $all_users = array_merge($admins, $regular_users);" },
  { id: 58, level: 3, category: "Type Casting", type: "concept", question: "What is type casting in PHP?", options: ["Converting variable to different type like (int), (string)", "Type conversion", "Data conversion", "Casting"], correct: 0, explanation: "Type casting: (int), (string), (array), (bool). Real-world: Ensure correct type.", realWorld: "$count = (int)$_GET['page'] ensures numeric, prevents 'page=abc' string issues." },
  { id: 59, level: 3, category: "Type Casting", type: "concept", question: "What is intval()?", options: ["Converts value to integer", "Integer conversion", "To integer", "Cast integer"], correct: 0, explanation: "intval('123abc') = 123. Gets integer value. Real-world: Parse numeric input.", realWorld: "$id = intval($_GET['user_id']) prevents non-numeric IDs from breaking queries." },
  { id: 60, level: 3, category: "Error Handling", type: "concept", question: "What is error handling in PHP?", options: ["Managing errors with try-catch and error_reporting", "Error management", "Exception handling", "Error control"], correct: 0, explanation: "Error handling: try-catch, error_reporting(). Prevents crashes, logs issues. Real-world: Robust apps.", realWorld: "try { query_database(); } catch (Exception $e) { log_error($e); show_user_friendly_message(); }" },
  { id: 61, level: 3, category: "Error Handling", type: "concept", question: "What is try-catch in PHP?", options: ["Attempts code execution, catches errors gracefully", "Exception catching", "Error catching", "Exception handler"], correct: 0, explanation: "try { code } catch (Exception $e) { handle error }. Real-world: Database failures, file errors.", realWorld: "try { open_file(); } catch { show 'File not found'; } instead of crashing app." },
  { id: 62, level: 3, category: "JSON", type: "concept", question: "What is JSON in PHP?", options: ["JavaScript Object Notation for data exchange", "Data format", "Exchange format", "Text format"], correct: 0, explanation: "JSON: lightweight format. json_encode(), json_decode(). Real-world: APIs, AJAX.", realWorld: "API returns: {\"users\": [{\"id\": 1, \"name\": \"John\"}]} → PHP decodes to array → uses data." },
  { id: 63, level: 3, category: "JSON", type: "concept", question: "What is json_encode()?", options: ["Converts PHP array/object to JSON string", "To JSON", "Array to JSON", "Encode JSON"], correct: 0, explanation: "json_encode(['name'=>'John']) = '{\"name\":\"John\"}'. Real-world: Send data to JavaScript.", realWorld: "PHP array: ['users'=>[['id'=>1,'name'=>'John']]] → json_encode → JavaScript receives and parses." },
  { id: 64, level: 3, category: "JSON", type: "concept", question: "What is json_decode()?", options: ["Converts JSON string to PHP array/object", "From JSON", "JSON to array", "Decode JSON"], correct: 0, explanation: "json_decode('{\"name\":\"John\"}') = object/array. Real-world: Process API responses.", realWorld: "API response: {\"status\":\"success\",\"data\":{...}} → json_decode → PHP array → check status and process data." },
  { id: 65, level: 3, category: "Regular Expressions", type: "concept", question: "What is regex in PHP?", options: ["Pattern matching for text validation and replacement", "Pattern matching", "Text patterns", "Expression patterns"], correct: 0, explanation: "Regex: preg_match(), preg_replace(). Powerful for validation. Real-world: Email, phone validation.", realWorld: "preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,}$/i', email) validates email format." },
  { id: 66, level: 3, category: "Regular Expressions", type: "concept", question: "What is preg_match()?", options: ["Tests if pattern matches string", "Pattern test", "Match check", "Pattern search"], correct: 0, explanation: "preg_match('/pattern/', 'text') returns 1 if match, 0 if not. Real-world: Validation.", realWorld: "if (preg_match('/^\\d{10}$/', phone)) { valid_phone(); } checks if exactly 10 digits." },
  { id: 67, level: 3, category: "Regular Expressions", type: "concept", question: "What is preg_replace()?", options: ["Replaces matches of pattern with replacement", "Pattern replacement", "Replace pattern", "Substitute regex"], correct: 0, explanation: "preg_replace('/[^a-z0-9]/i', '', text) removes non-alphanumeric. Real-world: Data cleaning.", realWorld: "Username: 'john@user123!' → preg_replace('/[^a-z0-9]/i', '', username) → 'johnuser123'." },
  { id: 68, level: 3, category: "API Basics", type: "concept", question: "What is API?", options: ["Application Programming Interface for software communication", "Interface", "Software interface", "Communication protocol"], correct: 0, explanation: "API: allows apps to communicate. REST APIs common. Real-world: Twitter, Google, Facebook APIs.", realWorld: "App calls Facebook API → gets friend list → displays in app. Without API, each app would store separate data." },
  { id: 69, level: 3, category: "API Basics", type: "concept", question: "What is REST API?", options: ["Architectural style using HTTP methods for operations", "API style", "HTTP interface", "Web API"], correct: 0, explanation: "REST: GET (retrieve), POST (create), PUT (update), DELETE. Real-world: Standard for web APIs.", realWorld: "E-commerce API: GET /products (list), POST /orders (create), PUT /orders/5 (update order 5)." },
  { id: 70, level: 3, category: "API Basics", type: "concept", question: "What is HTTP method?", options: ["GET, POST, PUT, DELETE for different operations", "Request method", "HTTP verb", "Request type"], correct: 0, explanation: "GET: retrieve, POST: create, PUT: update, DELETE: remove. Real-world: REST operations.", realWorld: "User registration: POST /users with form data → server creates user. User edits profile: PUT /users/5." },
  { id: 71, level: 3, category: "Caching", type: "concept", question: "What is caching in PHP?", options: ["Storing computed/retrieved data for quick reuse", "Data caching", "Performance optimization", "Storage"], correct: 0, explanation: "Caching: store results to avoid recalculation. Improves speed. Real-world: Database queries, rendered HTML.", realWorld: "Popular blog posts cached: first request queries database, subsequent requests use cache, 100x faster." },
  { id: 72, level: 3, category: "Caching", type: "concept", question: "What is Memcached?", options: ["In-memory data store for caching frequently used data", "Cache system", "Memory storage", "Cache server"], correct: 0, explanation: "Memcached: fast in-memory cache. Distributed. Real-world: Large websites cache sessions, queries.", realWorld: "After user logs in, session cached in Memcached. Every page request retrieves from cache instantly, not database." },
  { id: 73, level: 3, category: "MVC Pattern", type: "concept", question: "What is MVC?", options: ["Model-View-Controller separating code into three components", "Architecture pattern", "Design pattern", "Code organization"], correct: 0, explanation: "MVC: Model (data), View (display), Controller (logic). Real-world: Laravel, Symfony use MVC.", realWorld: "User registration: Model handles database, Controller validates input, View displays form. Separation of concerns." },
  { id: 74, level: 3, category: "MVC Pattern", type: "concept", question: "What is Model in MVC?", options: ["Handles data and database operations", "Data layer", "Database layer", "Business logic"], correct: 0, explanation: "Model: database queries, data validation. Interacts with MySQL. Real-world: User model, Product model.", realWorld: "UserModel class: functions like getUserById($id), createUser($data), updateUser(), deleteUser()." },
  { id: 75, level: 3, category: "MVC Pattern", type: "concept", question: "What is View in MVC?", options: ["Displays data to user as HTML", "Display layer", "Presentation", "Template"], correct: 0, explanation: "View: HTML templates. No business logic. Real-world: User sees view.", realWorld: "View: <h1>Welcome {username}</h1> displays welcome message with data passed from Controller." },
  { id: 76, level: 3, category: "MVC Pattern", type: "concept", question: "What is Controller in MVC?", options: ["Handles requests and coordinates between Model and View", "Logic layer", "Request handler", "Coordinator"], correct: 0, explanation: "Controller: processes requests, calls Model, passes to View. Real-world: UserController.", realWorld: "User registers: Controller gets form → calls UserModel->save() → Model saves to DB → Controller passes to View for confirmation." },
  { id: 77, level: 3, category: "Frameworks", type: "concept", question: "What is PHP framework?", options: ["Pre-built libraries and tools for faster web development", "Development tools", "Code structure", "Template system"], correct: 0, explanation: "Framework: provides structure, components. Laravel, Symfony, CodeIgniter. Real-world: Professional development.", realWorld: "Instead of writing from scratch, Laravel provides routing, authentication, database migrations, saving months." },
  { id: 78, level: 3, category: "Frameworks", type: "concept", question: "What is Laravel?", options: ["Modern PHP framework with elegant syntax and features", "Web framework", "PHP framework", "Development framework"], correct: 0, explanation: "Laravel: most popular modern framework. Routing, ORM, authentication, testing built-in. Real-world: 1000s of Laravel apps.", realWorld: "Create app in days with Laravel instead of months from scratch. Built-in features: auth, DB, validation, file upload." },
  { id: 79, level: 3, category: "DevOps Concepts", type: "concept", question: "What is CI/CD pipeline?", options: ["Continuous Integration/Deployment automating code testing and deployment", "Automation pipeline", "Deployment process", "Testing automation"], correct: 0, explanation: "CI/CD: automatically test code → deploy to production. GitHub Actions, Jenkins common. Real-world: Deploy 10x per day safely.", realWorld: "Developer pushes code → CI automatically runs tests → if pass, automatically deploys to production website within minutes. No manual deployment errors." },
  { id: 80, level: 3, category: "DevOps Concepts", type: "concept", question: "What is Docker for PHP?", options: ["Containerization packaging PHP app with dependencies for consistency", "Container system", "Application packaging", "Deployment tool"], correct: 0, explanation: "Docker: containerizes app. Same environment everywhere. Real-world: Deploy consistently dev→prod.", realWorld: "PHP app with MySQL, Redis, Nginx packaged in Docker → runs identical on laptop, test server, production. No 'works on my machine' issues." }
];

let currentQuestion = 0;
let score = 0;
let correct = 0;

function showQuestion() {
  if (currentQuestion >= lessons.length) {
    showCompletion();
    return;
  }

  const lesson = lessons[currentQuestion];
  const progressPercent = ((currentQuestion) / lessons.length) * 100;
  
  let html = `
    <div style="margin-bottom: 1rem;">
      <span class="badge badge-category">${lesson.category}</span>
      <span class="badge badge-level">Level ${lesson.level}</span>
      <span class="badge badge-type">${lesson.type}</span>
    </div>
    <div class="question-text">${lesson.question}</div>
    <div class="options-grid">
  `;
  
  lesson.options.forEach((option, index) => {
    html += `<button class="option-btn" onclick="submitAnswer(${index})">${option}</button>`;
  });
  
  html += `</div>`;
  
  document.getElementById('quiz-content').innerHTML = html;
  document.getElementById('score').textContent = score;
  document.getElementById('progress').textContent = currentQuestion + 1;
  document.getElementById('progress-fill').style.width = progressPercent + '%';
}

function submitAnswer(selected) {
  const lesson = lessons[currentQuestion];
  const isCorrect = selected === lesson.correct;
  
  if (isCorrect) {
    score += 10;
    correct++;
  }
  
  let feedbackClass = isCorrect ? 'feedback-correct' : 'feedback-incorrect';
  let result = isCorrect ? '✓ Correct!' : '✗ Incorrect';
  
  let html = `
    <div class="${feedbackClass}" style="margin-bottom: 1.5rem;">
      <div style="font-size: 1.3rem; font-weight: 600; margin-bottom: 0.5rem;">${result}</div>
      <div style="color: ${isCorrect ? '#2e7d32' : '#c62828'};">Correct answer: ${lesson.options[lesson.correct]}</div>
    </div>
    
    <div class="explanation-box" style="border-left-color: #7c3aed;">
      <div class="explanation-title">Detailed Explanation:</div>
      <div class="explanation-text">${lesson.explanation}</div>
    </div>
    
    <div class="explanation-box" style="border-left-color: #f8b6e0;">
      <div class="explanation-title">Real-World Example:</div>
      <div class="explanation-text">${lesson.realWorld}</div>
    </div>
    
    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
      <button class="next-btn" onclick="nextQuestion()">Next Lesson →</button>
    </div>
  `;
  
  document.getElementById('quiz-content').innerHTML = html;
  document.getElementById('score').textContent = score;
}

function nextQuestion() {
  currentQuestion++;
  showQuestion();
}

function showCompletion() {
  const percentage = Math.round((correct / lessons.length) * 100);
  let mastery = 'Beginner';
  if (percentage >= 80) mastery = 'PHP Expert';
  else if (percentage >= 60) mastery = 'Intermediate';
  
  document.getElementById('quiz-content').innerHTML = `
    <div class="completion-box">
      <div class="completion-title">🎉 Course Complete!</div>
      <div class="mastery-level">Mastery: ${mastery}</div>
      <div style="color: #7c3aed; font-size: 1.2rem; margin-bottom: 2rem;">
        Score: ${score} points | Correct: ${correct}/${lessons.length} (${percentage}%)
      </div>
      <a href="mini_games.php" class="next-btn">Back to Games</a>
    </div>
  `;
}

// Initialize
showQuestion();

// Dark mode toggle
document.getElementById('toggle-mode').addEventListener('change', function() {
  const isChecked = this.checked;
  document.body.style.background = isChecked ? '#1a1a2e' : 'linear-gradient(135deg, #ffe0f7 0%, #fbc2eb 100%)';
  if (isChecked) {
    document.body.style.color = '#fff';
  } else {
    document.body.style.color = '#000';
  }
});
</script>
</body>
</html>
