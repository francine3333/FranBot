<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>DevOps Challenge Master - Rischa Chatbot</title>
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
        <h1 class="page-title">DevOps Challenge Master</h1>
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
            <div class="stat-label" style="margin-top: 0.5rem;">DevOps Mastery</div>
          </div>
        </div>
      </div>

      <div id="quiz-content" class="question-container"></div>
    </div>
  </main>
</div>

<script>
// Comprehensive DevOps Challenge Master - 90 Lessons
const lessons = [
  { id: 1, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is DevOps?", options: ["Culture combining development and operations for faster delivery", "Development Operations team", "Only automation tools", "Just deployment process"], correct: 0, explanation: "DevOps is mindset and culture breaking silos between dev and ops. Focuses on collaboration, automation, continuous integration/deployment. About people, process, tools." },
  { id: 2, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is CI/CD?", options: ["Continuous Integration/Continuous Deployment for automated pipelines", "Code Implementation/Code Development", "Computer Integration/Cloud Deployment", "Continuous Improvement/Container Deployment"], correct: 0, explanation: "CI: automatically integrate code changes. CD: automatically deploy to production. Reduces manual errors, faster releases, immediate feedback on issues." },
  { id: 3, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is continuous integration?", options: ["Developers merge code frequently with automated testing", "One big integration", "Testing at end of project", "Annual deployment"], correct: 0, explanation: "CI means code merged to main branch multiple times daily. Each merge triggers automated tests. Catches bugs early. Reduces integration problems." },
  { id: 4, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is continuous deployment?", options: ["Automatically releasing code to production after tests pass", "Manual deployment", "Scheduled deployments", "Deploy once a year"], correct: 0, explanation: "CD automatically deploys passing code to production. No manual step. Enables rapid feature releases. Different from continuous delivery (ready to deploy)." },
  { id: 5, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is infrastructure as code?", options: ["Define infrastructure via code/config instead of manual setup", "Code for servers", "Programming infrastructure", "Infrastructure documentation"], correct: 0, explanation: "IaC uses code (Terraform, CloudFormation, Ansible) to define infrastructure. Reproducible, versionable, testable. Treat infrastructure like application code." },
  { id: 6, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is version control?", options: ["Track code changes with history and collaboration", "Software versions", "Release management", "Code backup"], correct: 0, explanation: "Version control (Git, SVN) tracks code changes. Every change has history, author, message. Enable collaboration, branching, rollbacks. Git is standard." },
  { id: 7, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is Git?", options: ["Distributed version control system for code tracking", "Repository storage", "Deployment tool", "Testing framework"], correct: 0, explanation: "Git is distributed VCS. Every developer has full history locally. Branches for features. Merges integrate changes. GitHub/GitLab are hosting platforms." },
  { id: 8, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is Git branching?", options: ["Parallel development on separate code lines", "Code copying", "Version naming", "Release process"], correct: 0, explanation: "Branching creates isolated code lines. Main/master for production. Feature branches for new work. Allows parallel development, code review before merge." },
  { id: 9, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is Docker?", options: ["Containerization packaging app and dependencies for consistency", "Virtual machine", "Container registry", "Container orchestration"], correct: 0, explanation: "Docker packages app, libraries, OS into containers. Lightweight than VMs. Same on dev, test, production. Image = template, Container = running instance." },
  { id: 10, level: 1, category: "DevOps Fundamentals", type: "concept", question: "What is container?", options: ["Isolated executable with app and all dependencies", "Virtual machine", "Docker image", "Application"], correct: 0, explanation: "Container is standardized unit with code, runtime, dependencies. Isolates app from system. Lightweight, fast startup. Containers share OS kernel (unlike VMs)." },
  { id: 11, level: 2, category: "Containerization", type: "concept", question: "What is Dockerfile?", options: ["Instructions to build Docker image", "Docker configuration", "Container settings", "Docker registry"], correct: 0, explanation: "Dockerfile has commands: FROM (base image), RUN (execute), COPY (add files), EXPOSE (ports), CMD (default command). Build with: docker build -t name:tag ." },
  { id: 12, level: 2, category: "Containerization", type: "concept", question: "What is Docker image?", options: ["Read-only template with app and dependencies for creating containers", "Container snapshot", "Running container", "Docker registry entry"], correct: 0, explanation: "Image is immutable blueprint. Multiple containers run from same image. Built from Dockerfile. Stored in registries (Docker Hub, ECR, ACR)." },
  { id: 13, level: 2, category: "Containerization", type: "concept", question: "What is Docker registry?", options: ["Central repository storing and distributing Docker images", "Docker storage", "Image cache", "Repository manager"], correct: 0, explanation: "Registry stores images. Docker Hub is public. ECR (AWS), ACR (Azure), GCR (Google) are private cloud registries. Organizations often use private registries." },
  { id: 14, level: 2, category: "Containerization", type: "concept", question: "What is Docker Compose?", options: ["Define multi-container applications with YAML file", "Docker tool", "Container configuration", "Orchestration system"], correct: 0, explanation: "Compose defines services, networks, volumes in docker-compose.yml. Run: docker-compose up. Simplifies multi-container local development." },
  { id: 15, level: 2, category: "Containerization", type: "concept", question: "What is container orchestration?", options: ["Automated management of container deployment, scaling, networking", "Container management", "Manual scaling", "Container deployment"], correct: 0, explanation: "Orchestration: launch containers, manage resources, handle failures, scale on demand. Kubernetes is industry standard. Simpler: Docker Swarm, ECS." },
  { id: 16, level: 2, category: "Kubernetes", type: "concept", question: "What is Kubernetes?", options: ["Open-source container orchestration platform for deployment and scaling", "Container runtime", "Container tool", "Container registry"], correct: 0, explanation: "Kubernetes (K8s) automates container deployment. Handles scaling, networking, storage, updates. Industry standard. Works with any cloud or on-premises." },
  { id: 17, level: 2, category: "Kubernetes", type: "concept", question: "What is Pod in Kubernetes?", options: ["Smallest deployable unit - container(s) running together", "Container", "Deployment unit", "Service unit"], correct: 0, explanation: "Pod wraps container(s). Usually one container per pod. Pods share network namespace (same IP). Pods ephemeral - created/destroyed dynamically." },
  { id: 18, level: 2, category: "Kubernetes", type: "concept", question: "What is Deployment in Kubernetes?", options: ["Declarative way to manage Pods with desired replicas", "Pod manager", "Service definition", "Configuration"], correct: 0, explanation: "Deployment defines desired Pod replicas. Kubernetes ensures actual matches desired. Handles updates, rollbacks. Manages ReplicaSets behind scenes." },
  { id: 19, level: 2, category: "Kubernetes", type: "concept", question: "What is Service in Kubernetes?", options: ["Stable network endpoint for accessing Pods", "Pod network", "Load balancer", "Networking layer"], correct: 0, explanation: "Service provides stable IP/DNS for Pods. Abstracts Pod changes. Types: ClusterIP (internal), NodePort (external node port), LoadBalancer (cloud LB)." },
  { id: 20, level: 2, category: "Kubernetes", type: "concept", question: "What is Ingress in Kubernetes?", options: ["HTTP/HTTPS routing rules for external access to Services", "Service type", "Network layer", "Load balancing"], correct: 0, explanation: "Ingress manages external access. Routes based on hostname/path. TLS termination. Better than NodePort for production. Requires Ingress Controller." },
  { id: 21, level: 2, category: "CI/CD Pipelines", type: "concept", question: "What is CI/CD pipeline?", options: ["Automated sequence: code push, build, test, deploy stages", "Deployment process", "Build process", "Test suite"], correct: 0, explanation: "Pipeline: code → VCS webhook → build → test → staging → production. Automated end-to-end. Tools: Jenkins, GitLab CI, GitHub Actions, CircleCI." },
  { id: 22, level: 2, category: "CI/CD Pipelines", type: "concept", question: "What is Jenkins?", options: ["Open-source automation server for CI/CD pipelines", "Build tool", "Testing framework", "Deployment tool"], correct: 0, explanation: "Jenkins runs jobs on code changes. Distributed builds. Extensive plugins. Declarative (Jenkinsfile) or GUI configuration. Older but widely used." },
  { id: 23, level: 2, category: "CI/CD Pipelines", type: "concept", question: "What is GitLab CI?", options: ["Built-in CI/CD in GitLab using .gitlab-ci.yml", "CI service", "Pipeline tool", "Build system"], correct: 0, explanation: ".gitlab-ci.yml defines jobs/stages. Integrated with GitLab. Runners execute jobs. Simpler than Jenkins. Containers default for jobs." },
  { id: 24, level: 2, category: "CI/CD Pipelines", type: "concept", question: "What is GitHub Actions?", options: ["Native CI/CD workflow automation in GitHub", "GitHub feature", "Action tool", "Workflow engine"], correct: 0, explanation: "GitHub Actions defined in YAML in .github/workflows/. Triggered by events (push, PR, schedule). Extensive marketplace of actions. Free for public repos." },
  { id: 25, level: 2, category: "CI/CD Pipelines", type: "concept", question: "What is artifact in CI/CD?", options: ["Output of build process (binaries, packages, reports)", "Build output", "Compiled code", "Deployment package"], correct: 0, explanation: "Artifacts: compiled binaries, Docker images, test reports, documentation. Stored for later use. Downloaded by deployment stage." },
  { id: 26, level: 2, category: "CI/CD Pipelines", type: "concept", question: "What is webhook?", options: ["Automatic HTTP callback triggered by events", "HTTP hook", "Event trigger", "Automation trigger"], correct: 0, explanation: "Webhook: when event happens (git push), HTTP request to pipeline URL. Triggers build automatically. Enables real-time automation." },
  { id: 27, level: 2, category: "Configuration Management", type: "concept", question: "What is Ansible?", options: ["Agentless configuration management and automation tool", "Configuration tool", "Automation framework", "Infrastructure tool"], correct: 0, explanation: "Ansible: no agents needed. YAML playbooks define tasks. SSH for communication. Idempotent (safe to run multiple times). Declarative approach." },
  { id: 28, level: 2, category: "Configuration Management", type: "concept", question: "What is Terraform?", options: ["Infrastructure as Code tool for provisioning cloud resources", "IaC tool", "Infrastructure provisioning", "Resource management"], correct: 0, explanation: "Terraform: HCL language defines infrastructure. Works multi-cloud. Plans show changes before apply. State file tracks resources. Immutable infrastructure." },
  { id: 29, level: 2, category: "Configuration Management", type: "concept", question: "What is Terraform state?", options: ["File tracking actual infrastructure state for management", "Infrastructure state", "Configuration file", "Deployment record"], correct: 0, explanation: "State file (.tfstate) maps configuration to real resources. Never edit manually. Store remotely (S3, Terraform Cloud). Sensitive - restrict access." },
  { id: 30, level: 2, category: "Configuration Management", type: "concept", question: "What is Ansible playbook?", options: ["YAML file defining configuration management tasks", "Automation script", "Task definition", "Configuration file"], correct: 0, explanation: "Playbook lists plays. Play = hosts + tasks. Tasks executed sequentially. Idempotent - same result running once or multiple times." },
  { id: 31, level: 2, category: "Monitoring and Logging", type: "concept", question: "What is monitoring in DevOps?", options: ["Continuous observation of system health and metrics", "System observation", "Metrics tracking", "Performance checking"], correct: 0, explanation: "Monitoring tracks: CPU, memory, disk, requests, errors, latency. Alerts on thresholds. Tools: Prometheus, Grafana, CloudWatch. Enables proactive issues." },
  { id: 32, level: 2, category: "Monitoring and Logging", type: "concept", question: "What is logging?", options: ["Collecting and aggregating application and system logs", "Event recording", "Data collection", "Information tracking"], correct: 0, explanation: "Logs: what happened in application/system. Timestamps, levels (INFO, ERROR). Centralized: ELK, Splunk, CloudWatch. Search and analyze issues." },
  { id: 33, level: 2, category: "Monitoring and Logging", type: "concept", question: "What is Prometheus?", options: ["Open-source time-series database for metrics collection", "Monitoring tool", "Time-series DB", "Metrics system"], correct: 0, explanation: "Prometheus scrapes metrics from targets. Time-series storage. PromQL query language. Alertmanager for alerts. Grafana for visualization." },
  { id: 34, level: 2, category: "Monitoring and Logging", type: "concept", question: "What is Grafana?", options: ["Visualization platform for metrics and logs from multiple sources", "Visualization tool", "Dashboard builder", "Metrics viewer"], correct: 0, explanation: "Grafana creates dashboards from Prometheus, Elasticsearch, etc. Annotations, alerting. User-friendly UI. Industry standard for visualization." },
  { id: 35, level: 2, category: "Monitoring and Logging", type: "concept", question: "What is ELK stack?", options: ["Elasticsearch-Logstash-Kibana for log management", "Logging tools", "Log aggregation", "Monitoring stack"], correct: 0, explanation: "Elasticsearch: search engine. Logstash: log processing. Kibana: visualization. Together: centralized logging solution. Competitors: Splunk, Datadog." },
  { id: 36, level: 2, category: "Testing Automation", type: "concept", question: "What is automated testing in CI/CD?", options: ["Automated execution of tests on every code change", "Automated tests", "Test automation", "Testing framework"], correct: 0, explanation: "Automated tests: unit, integration, acceptance run automatically. Catch regressions early. Speed up feedback. Essential for CI/CD quality." },
  { id: 37, level: 2, category: "Testing Automation", type: "concept", question: "What is unit test?", options: ["Tests individual functions/methods in isolation", "Function testing", "Code testing", "Method validation"], correct: 0, explanation: "Unit test: test one function. Mock dependencies. Fast, frequent. Tools: Jest, JUnit, pytest. Should have high coverage." },
  { id: 38, level: 2, category: "Testing Automation", type: "concept", question: "What is integration test?", options: ["Tests interaction between components or services", "Component testing", "System testing", "Multiple component test"], correct: 0, explanation: "Integration test: multiple components interact. Database, APIs included. Slower than unit tests. Find integration issues." },
  { id: 39, level: 2, category: "Testing Automation", type: "concept", question: "What is smoke test?", options: ["Quick sanity tests ensuring basic functionality works", "Quick test", "Sanity check", "Basic test"], correct: 0, explanation: "Smoke tests: fast basic checks. Do critical features work? Quick feedback on deploy. Run before full test suite." },
  { id: 40, level: 2, category: "Testing Automation", type: "concept", question: "What is code coverage?", options: ["Percentage of code executed by tests", "Test measurement", "Testing metric", "Code quality"], correct: 0, explanation: "Coverage: % lines/branches tested. High coverage doesn't guarantee quality. Aim 70-90%. Tools: coverage.py, JaCoCo, nyc." },
  { id: 41, level: 3, category: "Deployment Strategies", type: "concept", question: "What is blue-green deployment?", options: ["Run two identical production environments, switch traffic instantly", "Deployment method", "Traffic management", "Deployment technique"], correct: 0, explanation: "Blue: current production. Green: new release. Test Green. Switch instantly. Instant rollback if issues. Zero downtime." },
  { id: 42, level: 3, category: "Deployment Strategies", type: "concept", question: "What is canary deployment?", options: ["Gradually release to small percentage of users, monitor, expand", "Gradual release", "Phased deployment", "Risk mitigation"], correct: 0, explanation: "Canary: release to 5-10% users. Monitor metrics. If good, expand. If bad, rollback. Minimize blast radius of issues." },
  { id: 43, level: 3, category: "Deployment Strategies", type: "concept", question: "What is rolling deployment?", options: ["Update instances one by one maintaining availability", "Sequential update", "Instance update", "Gradual update"], correct: 0, explanation: "Rolling: update one instance, test, move to next. Old and new versions coexist. Slower than blue-green. Lower resource needs." },
  { id: 44, level: 3, category: "Deployment Strategies", type: "concept", question: "What is shadow deployment?", options: ["Run new version alongside production, replicate traffic, don't affect users", "Parallel deployment", "Testing deployment", "Risk-free test"], correct: 0, explanation: "Shadow: new version gets real production traffic copy. Processes but doesn't affect users. Great for testing impact. Resource intensive." },
  { id: 45, level: 3, category: "Deployment Strategies", type: "concept", question: "What is feature flag?", options: ["Toggle to enable/disable features without deployment", "Feature control", "Runtime configuration", "Feature toggle"], correct: 0, explanation: "Feature flag: code path controlled by config. Enable/disable without deploy. A/B testing. Gradual rollout. Kill switch for issues." },
  { id: 46, level: 3, category: "Security DevOps", type: "concept", question: "What is GitSecOps?", options: ["Security integrated into CI/CD pipeline from start", "Pipeline security", "Security automation", "Secure DevOps"], correct: 0, explanation: "SecOps: scan code, images, dependencies for vulnerabilities automatically. SAST, DAST, dependency checks in pipeline. Shift security left." },
  { id: 47, level: 3, category: "Security DevOps", type: "concept", question: "What is SAST?", options: ["Static Analysis Security Testing - analyze source code for vulnerabilities", "Code scanning", "Security analysis", "Vulnerability detection"], correct: 0, explanation: "SAST: analyze source without running. Find SQL injection, XSS, hardcoded secrets. Tools: SonarQube, Checkmarx. Catches issues early." },
  { id: 48, level: 3, category: "Security DevOps", type: "concept", question: "What is DAST?", options: ["Dynamic Analysis Security Testing - test running application for vulnerabilities", "Runtime security testing", "Application testing", "Vulnerability scanning"], correct: 0, explanation: "DAST: test running application. Find runtime issues. Simulate attacks. Tools: OWASP ZAP, Burp Suite. Catches issues dynamic analysis finds." },
  { id: 49, level: 3, category: "Security DevOps", type: "concept", question: "What is secrets management?", options: ["Securely store and rotate API keys, passwords, tokens", "Secret storage", "Credential management", "Access control"], correct: 0, explanation: "Secrets: never in code/Git. Use vaults (Vault, Sealed Secrets, AWS Secrets Manager). Rotate regularly. Audit access. Prevent leaks." },
  { id: 50, level: 3, category: "Security DevOps", type: "concept", question: "What is image scanning?", options: ["Scan Docker images for vulnerable packages and misconfigurations", "Container scanning", "Vulnerability detection", "Security scanning"], correct: 0, explanation: "Image scanning: check base image, packages for CVEs. Tools: Trivy, Clair. Block vulnerable images. Keep base images updated." },
  { id: 51, level: 3, category: "Cloud Deployment", type: "concept", question: "What is serverless?", options: ["Run code without managing servers - pay per execution", "Function-based computing", "No infrastructure", "Auto-scaling compute"], correct: 0, explanation: "Serverless: cloud runs functions. No server management. Pay only when executing. Examples: AWS Lambda, Azure Functions, Google Cloud Functions." },
  { id: 52, level: 3, category: "Cloud Deployment", type: "concept", question: "What is cloud-native application?", options: ["Built for cloud with microservices, containers, scalability", "Cloud application", "Modern application", "Cloud-based app"], correct: 0, explanation: "Cloud-native: microservices, containerized, serverless, auto-scaling, resilient. Leverage cloud benefits. Different from lift-and-shift." },
  { id: 53, level: 3, category: "Cloud Deployment", type: "concept", question: "What is microservices?", options: ["Small independent services loosely coupled, independently deployable", "Service architecture", "Service-based design", "Service decomposition"], correct: 0, explanation: "Microservices: break monolith into small services. Each deployable separately. Technology diversity. Improves scalability and speed." },
  { id: 54, level: 3, category: "Cloud Deployment", type: "concept", question: "What is API gateway?", options: ["Entry point managing and routing client requests to services", "Request router", "Service gateway", "Entry point"], correct: 0, explanation: "API Gateway: client-facing single entry. Routes to services. Authentication, rate limiting, logging. Enables loose coupling." },
  { id: 55, level: 3, category: "Cloud Deployment", type: "concept", question: "What is service mesh?", options: ["Infrastructure layer managing service communication with observability", "Communication layer", "Service networking", "Network layer"], correct: 0, explanation: "Service mesh (Istio, Linkerd): sidecar proxies manage traffic. Observability, security, resilience policies. Complex but powerful." },
  { id: 56, level: 3, category: "Database DevOps", type: "concept", question: "What is database migration?", options: ["Moving data and schema to new database with zero downtime", "Data transfer", "Schema update", "Database upgrade"], correct: 0, explanation: "Migration: data transfer without downtime. Tools: Liquibase, Flyway (SQL-based). Version control migrations. Backward compatibility." },
  { id: 57, level: 3, category: "Database DevOps", type: "concept", question: "What is database versioning?", options: ["Version control for database schema changes like code", "Schema tracking", "Change management", "Version control"], correct: 0, explanation: "Version database schema. Tools: Liquibase, Flyway. Track migrations. Rollback capability. Treat DB like code." },
  { id: 58, level: 3, category: "Database DevOps", type: "concept", question: "What is backup and recovery?", options: ["Automatic backup strategy with tested recovery procedures", "Data backup", "Recovery plan", "Disaster recovery"], correct: 0, explanation: "Backup: regular automated snapshots. Test recovery regularly. RPO: max acceptable data loss. RTO: max acceptable downtime. Critical for reliability." },
  { id: 59, level: 3, category: "Database DevOps", type: "concept", question: "What is replication?", options: ["Duplicate data across instances/regions for availability", "Data duplication", "Redundancy", "High availability"], correct: 0, explanation: "Replication: master-slave or multi-master. Synchronous (consistent) or asynchronous (faster). Failover capability. Distributes read load." },
  { id: 60, level: 3, category: "Database DevOps", type: "concept", question: "What is sharding?", options: ["Horizontal partitioning distributing data across multiple databases", "Data partitioning", "Horizontal scaling", "Data distribution"], correct: 0, explanation: "Sharding: partition data (hash, range). Different shards on different servers. Scales horizontally. Complex: resharding, distributed joins." },
  { id: 61, level: 3, category: "Observability", type: "concept", question: "What is observability?", options: ["Ability to understand system internals through metrics, logs, traces", "System visibility", "Internal visibility", "System understanding"], correct: 0, explanation: "Observability: three pillars: metrics, logs, traces. Understand complex systems. Answer: what happened? why? Enables quick debugging." },
  { id: 62, level: 3, category: "Observability", type: "concept", question: "What is distributed tracing?", options: ["Track requests across microservices to find bottlenecks", "Request tracking", "Performance tracking", "Service tracing"], correct: 0, explanation: "Distributed trace: request through all services. Tools: Jaeger, Datadog, New Relic. Shows latency per service. Find slowness." },
  { id: 63, level: 3, category: "Observability", type: "concept", question: "What is application performance monitoring?", options: ["APM tracks application performance and user experience metrics", "Performance tracking", "App monitoring", "Performance measurement"], correct: 0, explanation: "APM: measure response times, error rates, throughput. User experience metrics. Identify performance issues. Tools: Datadog, New Relic, Dynatrace." },
  { id: 64, level: 3, category: "Observability", type: "concept", question: "What is SLI?", options: ["Service Level Indicator - measured system performance metric", "Performance metric", "System indicator", "Quality metric"], correct: 0, explanation: "SLI: measurable metric (uptime 99.9%, latency <100ms). Different per service. Foundation for SLO/SLA." },
  { id: 65, level: 3, category: "Observability", type: "concept", question: "What is SLO?", options: ["Service Level Objective - target for SLI (e.g., 99.9% uptime)", "Target SLI", "Service level", "Objective metric"], correct: 0, explanation: "SLO: target value for SLI. 99.9% uptime means 43 minutes downtime/month. Drives engineering priorities. Missing SLO = incident." },
  { id: 66, level: 3, category: "Incident Management", type: "concept", question: "What is incident?", options: ["Unplanned interruption of service or degradation", "Service issue", "Problem event", "Service disruption"], correct: 0, explanation: "Incident: unplanned event impacting users. Severity levels: critical (total outage), high (partial), medium/low. Response: alert, page on-call." },
  { id: 67, level: 3, category: "Incident Management", type: "concept", question: "What is incident response?", options: ["Process to detect, respond, and resolve incidents quickly", "Emergency response", "Issue handling", "Problem solving"], correct: 0, explanation: "Response: detect (alerting), page on-call, investigate, fix, restore. Document: post-mortem, blameless analysis, preventive measures." },
  { id: 68, level: 3, category: "Incident Management", type: "concept", question: "What is post-mortem?", options: ["Blameless analysis after incident: what happened, why, lessons", "Incident review", "Issue analysis", "Event review"], correct: 0, explanation: "Post-mortem: review incident. Root cause analysis. Action items to prevent recurrence. Blameless - focus on process not people." },
  { id: 69, level: 3, category: "Incident Management", type: "concept", question: "What is on-call rotation?", options: ["Engineers take turns being available for emergency incidents", "Duty rotation", "Alert handling", "Emergency team"], correct: 0, explanation: "On-call: engineer available 24/7. Paged on alerts. Paid compensation. Usually 1 week rotation. Burn-out prevention: limited escalations." },
  { id: 70, level: 3, category: "Incident Management", type: "concept", question: "What is runbook?", options: ["Documented procedures for common operational tasks and issues", "Procedure guide", "Operation manual", "Task documentation"], correct: 0, explanation: "Runbook: step-by-step guide. Common issues, deployment procedure, disaster recovery. On-call uses runbooks. Keep updated." },
  { id: 71, level: 3, category: "Infrastructure Automation", type: "concept", question: "What is immutable infrastructure?", options: ["Infrastructure never changes in place - replaced entirely", "Fixed infrastructure", "No changes", "Replacement model"], correct: 0, explanation: "Immutable: never update running servers. Create new version. Replace entirely. Enables reproducibility, reduces drift, simpler recovery." },
  { id: 72, level: 3, category: "Infrastructure Automation", type: "concept", question: "What is infrastructure drift?", options: ["Untracked changes causing servers to differ from desired state", "Untracked changes", "Configuration deviation", "Infrastructure change"], correct: 0, explanation: "Drift: manual changes to running servers. Causes inconsistency. Prevents reproducibility. Use IaC and desired state management to prevent." },
  { id: 73, level: 3, category: "Infrastructure Automation", type: "concept", question: "What is load balancing?", options: ["Distribute traffic across multiple servers for scalability", "Traffic distribution", "Server distribution", "Traffic management"], correct: 0, explanation: "Load balancer: distribute requests. Round-robin, least connections, etc. Health checks. Horizontal scaling. HAProxy, Nginx, cloud LBs." },
  { id: 74, level: 3, category: "Infrastructure Automation", type: "concept", question: "What is auto-scaling?", options: ["Automatically add/remove instances based on demand", "Automatic scaling", "Dynamic scaling", "Resource scaling"], correct: 0, explanation: "Auto-scaling: monitors metrics (CPU). Scale up when high. Scale down when low. Saves costs. Based on CPU, memory, custom metrics." },
  { id: 75, level: 3, category: "Infrastructure Automation", type: "concept", question: "What is container registry?", options: ["Central repository for storing and distributing container images", "Image storage", "Container repository", "Image repository"], correct: 0, explanation: "Registry: stores images. Docker Hub public. ECR, ACR, GCR private cloud. Organizations use private registries for security." },
  { id: 76, level: 3, category: "Best Practices", type: "concept", question: "What is infrastructure as code best practice?", options: ["Version control, code review, testing, documentation infrastructure", "IaC practice", "Code management", "Best practice"], correct: 0, explanation: "IaC: Git version control. Peer review. Test changes. Document. Enables reproducibility, disaster recovery, knowledge sharing." },
  { id: 77, level: 3, category: "Best Practices", type: "concept", question: "What is DRY principle?", options: ["Don't Repeat Yourself - eliminate duplication in code and config", "No duplication", "Code reuse", "Principle"], correct: 0, explanation: "DRY: one source of truth. Shared templates, functions. Reduces maintenance burden. Easier updates. Apply to code, config, documentation." },
  { id: 78, level: 3, category: "Best Practices", type: "concept", question: "What is KISS principle?", options: ["Keep It Simple Stupid - prefer simple solutions to complex", "Simple solution", "Simplicity", "Design principle"], correct: 0, explanation: "KISS: simple solutions preferred. Easier to understand, maintain, debug. Avoid over-engineering. Premature optimization is evil." },
  { id: 79, level: 3, category: "Best Practices", type: "concept", question: "What is documentation?", options: ["Keep accurate runbooks, architecture, procedures updated", "System documentation", "Procedure docs", "Information recording"], correct: 0, explanation: "Documentation: runbooks, architecture diagrams, procedures. Enables knowledge transfer. Update during incidents and deployments. Version it." },
  { id: 80, level: 3, category: "Best Practices", type: "concept", question: "What is communication in DevOps?", options: ["Clear communication across teams reduces misunderstandings", "Team communication", "Cross-team talk", "Information sharing"], correct: 0, explanation: "Communication: clear requirements, status updates, incident comms. Documentation. Chat channels. Regular syncs. Prevents issues." },
  { id: 81, level: 3, category: "DevOps Tools", type: "concept", question: "What is Kubernetes deployment", options: ["Define desired Pod replicas with auto-scaling and updates", "Pod management", "Scaling", "Pod deployment"], correct: 0, explanation: "Deployment: desired state of Pods. Kubernetes ensures match. Handles rolling updates, rollbacks, scaling. Most common workload." },
  { id: 82, level: 3, category: "DevOps Tools", type: "concept", question: "What is ConfigMap?", options: ["Kubernetes object storing non-confidential configuration data", "Config storage", "Configuration object", "Data store"], correct: 0, explanation: "ConfigMap: stores key-value config. Mounted as files/env vars. Different from Secrets. Non-sensitive data only." },
  { id: 83, level: 3, category: "DevOps Tools", type: "concept", question: "What is Secret in Kubernetes?", options: ["Kubernetes object securely storing sensitive data like passwords", "Sensitive data store", "Data security", "Secret storage"], correct: 0, explanation: "Secret: stores passwords, tokens, API keys. Base64 encoded (not encrypted by default). Use external secret management in production." },
  { id: 84, level: 3, category: "DevOps Tools", type: "concept", question: "What is Helm?", options: ["Package manager for Kubernetes applications with templating", "K8s package manager", "Application management", "Kubernetes tool"], correct: 0, explanation: "Helm: charts package Kubernetes apps. Templates for values. Easy deployment, updates, rollbacks. Helm Hub public charts." },
  { id: 85, level: 3, category: "DevOps Tools", type: "concept", question: "What is ArgoCD?", options: ["GitOps tool for Kubernetes continuous deployment from Git", "GitOps tool", "Kubernetes deployment", "Continuous deployment"], correct: 0, explanation: "ArgoCD: declarative GitOps. Git as source of truth. Auto-sync or manual. Real-time dashboard. Declarative app management." },
  { id: 86, level: 3, category: "DevOps Tools", type: "concept", question: "What is Flux?", options: ["GitOps operator for automated Kubernetes deployments", "GitOps operator", "Automation tool", "Kubernetes operator"], correct: 0, explanation: "Flux: GitOps for Kubernetes. Git as source of truth. Auto-reconcile. Simpler than ArgoCD for some. Growing adoption." },
  { id: 87, level: 3, category: "DevOps Culture", type: "concept", question: "What is blameless culture?", options: ["Focus on process not people when issues occur", "Culture principle", "Incident response", "Team approach"], correct: 0, explanation: "Blameless: post-mortem focuses on systemic issues not individual blame. Encourages honesty, learning. Improves safety." },
  { id: 88, level: 3, category: "DevOps Culture", type: "concept", question: "What is continuous improvement?", options: ["Kaizen - constant incremental improvements in processes", "Improvement practice", "Process improvement", "Continuous enhancement"], correct: 0, explanation: "Continuous improvement: small changes accumulate. Retrospectives identify improvements. Measure, learn, adjust. Culture of learning." },
  { id: 89, level: 3, category: "DevOps Culture", type: "concept", question: "What is cross-functional team?", options: ["Team with diverse skills breaking organizational silos", "Mixed team", "Diverse team", "Team structure"], correct: 0, explanation: "Cross-functional: devs, ops, QA, security together. Breaks silos. Better collaboration. Shared responsibility for success." },
  { id: 90, level: 3, category: "DevOps Culture", type: "concept", question: "What is DevOps culture?", options: ["Collaboration, automation, measurement, sharing enabling fast delivery", "Team culture", "Work approach", "Organization mindset"], correct: 0, explanation: "DevOps culture: collaboration (break silos), automation (reduce manual), measurement (data-driven), sharing (learn together). Enables speed, stability, learning." }
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
  const feedbackTitle = isCorrect ? 'Correct!' : 'Incorrect';
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
  if (accuracy >= 90) mastery = 'DevOps Master Engineer';
  else if (accuracy >= 80) mastery = 'Senior DevOps Expert';
  else if (accuracy >= 70) mastery = 'DevOps Professional';
  else if (accuracy >= 60) mastery = 'DevOps Learner';
  else mastery = 'Keep Learning';

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
        You've completed all 90 comprehensive DevOps lessons covering CI/CD, containerization, Kubernetes, infrastructure automation, monitoring, deployment strategies, security, incident management, and DevOps culture. You're now a DevOps master!
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
