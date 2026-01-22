<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>AI PDF Reviewer - Rischa Chatbot</title>
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
      margin-bottom: 1rem;
      text-shadow: 0 2px 8px #fbc2eb88;
    }
    .page-subtitle {
      color: #7c3aed;
      font-size: 1rem;
      margin-bottom: 2rem;
      line-height: 1.6;
    }

    /* PDF Upload Container */
    .pdf-upload-section {
      background: linear-gradient(135deg, #fff1fa 0%, #e9d5ff 100%);
      border: 2px solid #fbc2eb;
      border-radius: 1.5rem;
      padding: 2rem;
      max-width: 900px;
      width: 100%;
    }

    #dropZone {
      border: 2px dashed #fbc2eb;
      border-radius: 1rem;
      padding: 2rem;
      text-align: center;
      background: #fff;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    #dropZone:hover {
      border-color: #a21caf;
      background: #f3e8ff;
    }

    .drop-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .drop-text {
      color: #a21caf;
      font-weight: 600;
      margin: 0 0 0.5rem 0;
    }

    .drop-subtext {
      color: #7c3aed;
      font-size: 0.9rem;
      margin: 0;
    }

    #pdfInput {
      display: none;
    }

    /* Loading State */
    #reviewerLoading {
      display: none;
      margin-top: 1.5rem;
      text-align: center;
    }

    .loading-icon {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .loading-text {
      color: #a21caf;
      font-weight: 600;
    }

    .loading-subtext {
      color: #7c3aed;
      font-size: 0.9rem;
    }

    /* Error State */
    #reviewerError {
      display: none;
      margin-top: 1.5rem;
      background: #ffebee;
      border: 2px solid #f44336;
      border-radius: 1rem;
      padding: 1.5rem;
      color: #c62828;
    }

    .error-title {
      margin: 0 0 0.5rem 0;
      font-weight: 600;
    }

    #errorMessage {
      margin: 0;
      font-size: 0.9rem;
    }

    .error-btn {
      background: #f44336;
      color: #fff;
      border: none;
      padding: 0.6rem 1rem;
      border-radius: 0.5rem;
      font-weight: 600;
      cursor: pointer;
      margin-top: 1rem;
      transition: all 0.3s;
    }

    .error-btn:hover {
      background: #d32f2f;
    }

    /* Content Display */
    #reviewerContent {
      display: none;
      margin-top: 2rem;
      background: #fff;
      padding: 1.5rem;
      border-radius: 1rem;
      border-left: 4px solid #fbc2eb;
    }

    #reviewContent {
      color: #333;
      line-height: 1.8;
    }

    #reviewContent h1,
    #reviewContent h2,
    #reviewContent h3 {
      color: #a21caf;
      margin-top: 1.5rem;
      margin-bottom: 0.8rem;
    }

    #reviewContent p {
      margin: 1rem 0;
      color: #555;
    }

    #reviewContent ul,
    #reviewContent ol {
      color: #555;
      margin: 1rem 0;
    }

    #reviewContent li {
      margin: 0.5rem 0;
    }

    #reviewContent strong {
      color: #a21caf;
      font-weight: 600;
    }

    .action-btn {
      background: linear-gradient(90deg, #fbc2eb 0%, #f8b6e0 100%);
      color: #a21caf;
      border: none;
      padding: 0.8rem 1.5rem;
      border-radius: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      margin-top: 1.5rem;
      transition: all 0.3s;
    }

    .action-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px #fbc2eb44;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 200px;
      }
      .main-content {
        margin-left: 200px;
        padding: 1.5rem;
      }
      .page-title {
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>
<div class="dashboard-layout">
  <!-- Sidebar Navigation -->
  <aside class="sidebar">
    <div style="padding: 1.5rem;">
      <a href="index.php" style="text-decoration: none; display: flex; align-items: center; gap: 0.7rem; margin-bottom: 2rem;">
        <span style="font-size: 2rem;">🤖</span>
        <span style="color: #a21caf; font-weight: 700; font-size: 1.1rem;">Rischa</span>
      </a>

      <nav style="display: flex; flex-direction: column; gap: 0.5rem;">
        <a href="chatbot.php" class="nav-link">
          <span style="font-size: 1.3rem; margin-right: 0.8rem;">💬</span>
          <span>My Chatbot</span>
        </a>
        <a href="daily_quotes.php" class="nav-link">
          <span style="font-size: 1.3rem; margin-right: 0.8rem;">✨</span>
          <span>Daily Quotes</span>
        </a>
        <a href="mini_games.php" class="nav-link">
          <span style="font-size: 1.3rem; margin-right: 0.8rem;">🎮</span>
          <span>Mini-Games</span>
        </a>
        <a href="pdf_reviewer.php" class="nav-link active">
          <span style="font-size: 1.3rem; margin-right: 0.8rem;">📚</span>
          <span>PDF Reviewer</span>
        </a>
        <a href="theme_customizer.php" class="nav-link">
          <span style="font-size: 1.3rem; margin-right: 0.8rem;">🎨</span>
          <span>Theme Customizer</span>
        </a>
        <a href="settings.php" class="nav-link">
          <span style="font-size: 1.3rem; margin-right: 0.8rem;">⚙️</span>
          <span>Settings</span>
        </a>
      </nav>
    </div>

    <!-- Dark Mode Toggle -->
    <div style="padding: 1rem; border-top: 2px solid #fbc2eb;">
      <label style="display: flex; align-items: center; gap: 0.8rem; cursor: pointer;">
        <input type="checkbox" id="dark-toggle" style="width: 40px; height: 24px; cursor: pointer;">
        <span id="toggle-label" style="font-weight: 600; font-size: 0.85rem;">Light Mode</span>
      </label>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <div style="width: 100%; max-width: 900px;">
      <h1 class="page-title">📚 AI PDF Reviewer</h1>
      <p class="page-subtitle">
        Upload any PDF document and our AI will create a comprehensive review with key concepts, 
        real-world examples, and industry applications!
      </p>

      <!-- PDF Upload Container -->
      <div class="pdf-upload-section">
        <div id="dropZone">
          <div class="drop-icon">📄</div>
          <p class="drop-text">Drag PDF here or click to upload</p>
          <p class="drop-subtext">Maximum file size: 10MB</p>
        </div>
        <input type="file" id="pdfInput" accept=".pdf">

        <!-- Loading State -->
        <div id="reviewerLoading">
          <div class="loading-icon">⏳</div>
          <p class="loading-text">Analyzing PDF and generating review...</p>
          <p class="loading-subtext">This may take a moment</p>
        </div>

        <!-- Error State -->
        <div id="reviewerError">
          <p class="error-title">Error Processing PDF</p>
          <p id="errorMessage"></p>
          <button class="error-btn" onclick="resetReviewer()">Try Again</button>
        </div>

        <!-- Content Display -->
        <div id="reviewerContent">
          <div id="reviewContent"></div>
          <button class="action-btn" onclick="resetReviewer()">Upload Another PDF</button>
        </div>
      </div>
    </div>
  </main>
</div>

<script>
// Dark Mode Toggle
const darkToggle = document.getElementById('dark-toggle');
const toggleLabel = document.getElementById('toggle-label');
const htmlElement = document.documentElement;

// Load dark mode preference from localStorage
if (localStorage.getItem('darkMode') === 'true') {
  htmlElement.style.filter = 'invert(1)';
  darkToggle.checked = true;
  toggleLabel.textContent = 'Dark Mode';
}

// Toggle dark mode
darkToggle.addEventListener('change', () => {
  if (darkToggle.checked) {
    htmlElement.style.filter = 'invert(1)';
    localStorage.setItem('darkMode', 'true');
    toggleLabel.textContent = 'Dark Mode';
  } else {
    htmlElement.style.filter = 'none';
    localStorage.setItem('darkMode', 'false');
    toggleLabel.textContent = 'Light Mode';
  }
});

// PDF Reviewer Functionality
const dropZone = document.getElementById('dropZone');
const pdfInput = document.getElementById('pdfInput');

dropZone.addEventListener('click', () => pdfInput.click());

dropZone.addEventListener('dragover', (e) => {
  e.preventDefault();
  dropZone.style.borderColor = '#a21caf';
  dropZone.style.background = '#f3e8ff';
});

dropZone.addEventListener('dragleave', () => {
  dropZone.style.borderColor = '#fbc2eb';
  dropZone.style.background = '#fff';
});

dropZone.addEventListener('drop', (e) => {
  e.preventDefault();
  dropZone.style.borderColor = '#fbc2eb';
  dropZone.style.background = '#fff';
  
  const files = e.dataTransfer.files;
  if (files.length > 0) {
    handlePDFUpload(files[0]);
  }
});

pdfInput.addEventListener('change', (e) => {
  if (e.target.files.length > 0) {
    handlePDFUpload(e.target.files[0]);
  }
});

async function handlePDFUpload(file) {
  // Validate file
  if (file.type !== 'application/pdf') {
    showError('Please upload a valid PDF file');
    return;
  }

  if (file.size > 10 * 1024 * 1024) {
    showError('File size must be less than 10MB');
    return;
  }

  // Show loading
  document.getElementById('dropZone').style.display = 'none';
  document.getElementById('reviewerLoading').style.display = 'block';
  document.getElementById('reviewerError').style.display = 'none';
  document.getElementById('reviewerContent').style.display = 'none';

  try {
    // Read file as base64
    const reader = new FileReader();
    reader.onload = async (e) => {
      const base64Data = e.target.result.split(',')[1];
      
      // Send to backend
      const response = await fetch('process_pdf.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          fileName: file.name,
          fileData: base64Data
        })
      });

      const result = await response.json();
      
      if (result.success) {
        displayReview(result.review);
      } else {
        showError(result.error || 'Failed to process PDF');
      }
    };
    reader.readAsDataURL(file);
  } catch (error) {
    showError('Error uploading file: ' + error.message);
  }
}

function displayReview(review) {
  document.getElementById('reviewerLoading').style.display = 'none';
  document.getElementById('reviewContent').innerHTML = review;
  document.getElementById('reviewerContent').style.display = 'block';
}

function showError(message) {
  document.getElementById('reviewerLoading').style.display = 'none';
  document.getElementById('errorMessage').textContent = message;
  document.getElementById('reviewerError').style.display = 'block';
}

function resetReviewer() {
  pdfInput.value = '';
  document.getElementById('dropZone').style.display = 'block';
  document.getElementById('reviewerLoading').style.display = 'none';
  document.getElementById('reviewerError').style.display = 'none';
  document.getElementById('reviewerContent').style.display = 'none';
}
</script>
</body>
</html>
