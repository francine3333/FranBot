<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>Cloud Computing Master - Rischa Chatbot</title>
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
        <h1 class="page-title">Cloud Computing Master</h1>
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
            <div class="stat-label" style="margin-top: 0.5rem;">Cloud Mastery</div>
          </div>
        </div>
      </div>

      <div id="quiz-content" class="question-container"></div>
    </div>
  </main>
</div>

<script>
// Comprehensive Cloud Computing Master - 90 Lessons
const lessons = [
  { id: 1, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is AWS?", options: ["Amazon Web Services - cloud computing platform", "Automated Web Services", "Application Web Server", "Advanced Web Storage"], correct: 0, explanation: "AWS is Amazon's cloud computing platform providing on-demand computing resources like servers, storage, databases, networking. Pay only for what you use." },
  { id: 2, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is cloud computing?", options: ["Delivering computing services over internet", "Weather data storage", "Local server setup", "Cloud storage only"], correct: 0, explanation: "Cloud computing means accessing computing resources (servers, storage, databases, software) over the internet instead of owning/managing physical hardware." },
  { id: 3, level: 1, category: "AWS Fundamentals", type: "concept", question: "What are the three main cloud service models?", options: ["IaaS, PaaS, SaaS", "IaaS, CaaS, DaaS", "SaaS only", "On-premises, Cloud, Hybrid"], correct: 0, explanation: "IaaS (Infrastructure as a Service) - virtual servers. PaaS (Platform as a Service) - development platforms. SaaS (Software as a Service) - applications like Gmail." },
  { id: 4, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is IaaS in AWS?", options: ["EC2, S3, RDS providing raw infrastructure", "Pre-built applications", "Only storage services", "Database only"], correct: 0, explanation: "IaaS provides virtual machines (EC2), storage (S3), databases. You manage applications and data; AWS manages infrastructure, virtualization, networking." },
  { id: 5, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is PaaS example in AWS?", options: ["AWS Elastic Beanstalk - deploy without managing servers", "EC2 instances", "S3 buckets", "IAM policies"], correct: 0, explanation: "Elastic Beanstalk handles deployment, scaling, and management. You provide code; Beanstalk handles environment setup, load balancing, scaling." },
  { id: 6, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is SaaS example?", options: ["Gmail, Slack, Salesforce - complete applications", "AWS EC2", "Custom software you develop", "Open source software"], correct: 0, explanation: "SaaS provides complete applications accessed via browser. No installation needed, AWS/vendor manages everything. Examples: Google Workspace, Salesforce." },
  { id: 7, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is AWS region?", options: ["Geographic area containing multiple availability zones", "Single data center", "Storage location", "Network zone"], correct: 0, explanation: "AWS region is separate geographic location (us-east-1, eu-west-1). Each region contains 2-4 availability zones. Choose region close to users for low latency." },
  { id: 8, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is AWS availability zone?", options: ["Isolated data center within a region", "Multiple regions", "Data backup location", "CDN endpoint"], correct: 0, explanation: "Availability Zone (AZ) is isolated data center. AZs are independent but connected via low-latency networks. Distribute across AZs for high availability." },
  { id: 9, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is edge location in AWS?", options: ["CloudFront cache location for fast content delivery", "Data center", "Regional server", "Backup location"], correct: 0, explanation: "Edge locations are cache servers worldwide for CloudFront CDN. Serve content from nearest location to user. Different from regions and AZs." },
  { id: 10, level: 1, category: "AWS Fundamentals", type: "concept", question: "What is AWS Free Tier?", options: ["Free usage for first 12 months for eligible services", "Permanent free services", "Limited free trial", "Educational pricing"], correct: 0, explanation: "Free Tier gives 12 months free + always-free services (like Lambda 1M requests/month). Great for learning. Monitor usage to avoid unexpected charges!" },
  { id: 11, level: 2, category: "VPC and Networking", type: "concept", question: "What is VPC?", options: ["Virtual Private Cloud - isolated network in AWS", "Virtual Public Cloud", "Virtual Personal Computer", "Verified Private Connection"], correct: 0, explanation: "VPC is isolated network where you launch AWS resources. Like having private network in cloud. Default VPC provided but can create custom VPCs for isolation." },
  { id: 12, level: 2, category: "VPC and Networking", type: "concept", question: "What is subnet in VPC?", options: ["Range of IP addresses within VPC CIDR", "Virtual network segment", "Security group", "Network interface"], correct: 0, explanation: "Subnet divides VPC into smaller networks. Public subnet (has internet access), private subnet (no direct internet). Usually one per availability zone." },
  { id: 13, level: 2, category: "VPC and Networking", type: "concept", question: "What is internet gateway?", options: ["Enables VPC resources to communicate with internet", "VPN connection", "NAT router", "Firewall"], correct: 0, explanation: "Internet Gateway (IGW) connects VPC to internet. Attached to VPC, enables public resources to reach internet and receive inbound internet traffic." },
  { id: 14, level: 2, category: "VPC and Networking", type: "concept", question: "What is NAT gateway?", options: ["Allows private resources to access internet securely", "Network address translation", "Public gateway", "VPN endpoint"], correct: 0, explanation: "NAT Gateway lets private subnet resources initiate outbound to internet without exposing them. Placed in public subnet, routes private traffic through it." },
  { id: 15, level: 2, category: "VPC and Networking", type: "concept", question: "What is CIDR notation?", options: ["Classless Inter-Domain Routing - IP address notation", "Cloud Instance Deployment Request", "Certified Instance Design Review", "Class IP Delivery Route"], correct: 0, explanation: "CIDR notation: 10.0.0.0/16 means IP range from 10.0.0.0 to 10.0.255.255. /16 indicates subnet mask. /24 = 256 IPs, /16 = 65536 IPs." },
  { id: 16, level: 2, category: "VPC and Networking", type: "concept", question: "What is security group?", options: ["Virtual firewall controlling inbound/outbound traffic", "IAM policy", "Network ACL", "VPC setting"], correct: 0, explanation: "Security group acts as firewall for EC2 instances. Controls which traffic can reach instance. Stateful - if outbound allowed, return traffic automatically allowed." },
  { id: 17, level: 2, category: "VPC and Networking", type: "concept", question: "What is network ACL?", options: ["Stateless firewall at subnet level controlling traffic", "Security group", "IAM role", "VPC endpoint"], correct: 0, explanation: "Network ACL controls traffic at subnet level. Stateless - must specify both inbound and outbound rules. Applied to entire subnet, not individual instances." },
  { id: 18, level: 2, category: "VPC and Networking", type: "concept", question: "Difference between Security Group and Network ACL?", options: ["SG is stateful instance-level; ACL is stateless subnet-level", "Both are same", "SG is for storage", "ACL is for EC2"], correct: 0, explanation: "Security Group: stateful, instance-level, default deny inbound. Network ACL: stateless, subnet-level, applied to all resources. Layer defense!" },
  { id: 19, level: 2, category: "VPC and Networking", type: "concept", question: "What is VPC peering?", options: ["Connect two VPCs privately without internet", "VPN connection", "Public network link", "CDN service"], correct: 0, explanation: "VPC peering connects two VPCs privately. Resources communicate as if in same network. One-to-one connection. Doesn't provide transitive peering." },
  { id: 20, level: 2, category: "VPC and Networking", type: "concept", question: "What is VPN in AWS?", options: ["Secure encrypted connection from on-premises to VPC", "Virtual Private Network", "Cloud VPN", "Internet connection"], correct: 0, explanation: "AWS VPN (AWS Site-to-Site VPN) securely connects on-premises network to VPC through encrypted tunnel. For hybrid cloud architecture." },
  { id: 21, level: 2, category: "EC2 and Compute", type: "concept", question: "What is EC2?", options: ["Elastic Compute Cloud - virtual servers in cloud", "Elastic Cloud Computing", "E-Commerce Cloud", "Easy Compute Connection"], correct: 0, explanation: "EC2 provides virtual machines (instances). Choose size (t2.micro, m5.large), OS, storage. Pay per second. Can scale up/down quickly." },
  { id: 22, level: 2, category: "EC2 and Compute", type: "concept", question: "What are EC2 instance types?", options: ["General, Compute Optimized, Memory Optimized, Storage Optimized, GPU", "Large, Medium, Small", "Public, Private", "Active, Inactive"], correct: 0, explanation: "t2/t3 general purpose, c5/c6 compute-optimized, r5/r6 memory-optimized, i3/i4 storage-optimized, g4/p3 GPU. Choose based on workload." },
  { id: 23, level: 2, category: "EC2 and Compute", type: "concept", question: "What is EC2 pricing model?", options: ["On-Demand, Reserved, Spot, Dedicated pricing options", "Fixed monthly cost", "Usage-based only", "Per hour only"], correct: 0, explanation: "On-Demand: pay per hour (most expensive). Reserved: 1-3 year commitment (40-70% savings). Spot: unused capacity (90% discount, can terminate). Dedicated: full physical server." },
  { id: 24, level: 2, category: "EC2 and Compute", type: "concept", question: "What is AMI?", options: ["Amazon Machine Image - pre-configured template for instances", "Amazon Multi-Instance", "Application Management Interface", "Automation Management Infrastructure"], correct: 0, explanation: "AMI contains OS, software, configurations. Create instances from AMI. AWS provides default AMIs, can create custom. Share AMIs across accounts." },
  { id: 25, level: 2, category: "EC2 and Compute", type: "concept", question: "What is Auto Scaling Group?", options: ["Automatically adjusts instance count based on demand", "Manual scaling", "Load balancer", "Storage scaling"], correct: 0, explanation: "Auto Scaling Group automatically launches/terminates instances based on metrics (CPU, memory). Define min/max/desired capacity. Saves costs, ensures availability." },
  { id: 26, level: 2, category: "EC2 and Compute", type: "concept", question: "What is load balancer purpose?", options: ["Distributes traffic across multiple instances", "Stores data", "Manages networks", "Provides security"], correct: 0, explanation: "Load Balancer (ALB, NLB, CLB) distributes incoming traffic. Application Load Balancer (Layer 7), Network Load Balancer (ultra-high performance), Classic (deprecated)." },
  { id: 27, level: 2, category: "EC2 and Compute", type: "concept", question: "What is Elastic IP?", options: ["Static public IP address that persists through stop/start", "Dynamic IP", "Private IP", "Internal IP"], correct: 0, explanation: "Elastic IP is static IP you can assign/reassign to instances. Persists when instance stopped. Use for critical services needing static IP." },
  { id: 28, level: 2, category: "EC2 and Compute", type: "concept", question: "What is placement group?", options: ["Determines how instances are placed relative to each other", "Security group", "Network group", "Storage group"], correct: 0, explanation: "Placement groups: cluster (same rack, low-latency), partition (distributed), spread (distinct infrastructure). For high-performance computing." },
  { id: 29, level: 2, category: "EC2 and Compute", type: "concept", question: "What is AWS Lambda?", options: ["Serverless compute - run code without managing servers", "Function library", "Microservice framework", "Container service"], correct: 0, explanation: "Lambda runs code without provisioning servers. Pay only for execution time. Scales automatically. Good for event-driven workloads, APIs, data processing." },
  { id: 30, level: 2, category: "EC2 and Compute", type: "concept", question: "What is Lambda invocation type?", options: ["Synchronous and Asynchronous triggers", "Scheduled only", "Manual only", "Automatic only"], correct: 0, explanation: "Sync: Lambda waits for response (API calls). Async: Lambda returns immediately (SNS, S3 events). Event sources determine invocation." },
  { id: 31, level: 2, category: "Storage and Databases", type: "concept", question: "What is S3?", options: ["Simple Storage Service - object storage in cloud", "Secure Server Service", "Simple Server Storage", "Scalable Service Setup"], correct: 0, explanation: "S3 stores objects (files) in buckets. Highly available, durable. Different storage classes for cost optimization. Used for backups, data lakes, static websites." },
  { id: 32, level: 2, category: "Storage and Databases", type: "concept", question: "What is S3 bucket?", options: ["Container for objects - like folder at root level", "Storage server", "Virtual machine", "Network resource"], correct: 0, explanation: "Bucket holds objects. Must have globally unique name. Can set permissions, versioning, lifecycle policies. No directory structure (key prefixes simulate it)." },
  { id: 33, level: 2, category: "Storage and Databases", type: "concept", question: "What is S3 object?", options: ["File and its metadata stored in bucket", "Storage account", "Virtual folder", "Server"], correct: 0, explanation: "Object is file + metadata. Has key (name), value (data), version, ACL. Maximum 5GB per object. Use multipart upload for large files." },
  { id: 34, level: 2, category: "Storage and Databases", type: "concept", question: "What are S3 storage classes?", options: ["Standard, Intelligent-Tiering, Glacier, Glacier Deep Archive", "Hot, Warm, Cold", "Public, Private", "Encrypted, Unencrypted"], correct: 0, explanation: "Standard: frequent access. IA/One Zone-IA: infrequent. Intelligent-Tiering: auto-moves based on access. Glacier/Deep Archive: archival (cheaper, slower)." },
  { id: 35, level: 2, category: "Storage and Databases", type: "concept", question: "What is RDS?", options: ["Relational Database Service - managed SQL databases", "Remote Database Service", "Rapid Data Store", "Real-time Database Sync"], correct: 0, explanation: "RDS manages databases without ops overhead. Supports MySQL, PostgreSQL, MariaDB, Oracle, SQL Server. Automated backups, replication, scaling available." },
  { id: 36, level: 2, category: "Storage and Databases", type: "concept", question: "What is RDS Multi-AZ?", options: ["Synchronous replication to another AZ for high availability", "Multiple regions", "Read replicas", "Backup strategy"], correct: 0, explanation: "Multi-AZ creates standby replica in different AZ. Automatic failover if primary fails. Synchronous replication ensures data consistency. Higher cost." },
  { id: 37, level: 2, category: "Storage and Databases", type: "concept", question: "What is RDS read replica?", options: ["Asynchronous copy for scaling read workload", "Backup copy", "Primary database", "Disaster recovery"], correct: 0, explanation: "Read replica asynchronously copies data from primary. Can be in different region. Scale reads without impacting primary. Can become new primary." },
  { id: 38, level: 2, category: "Storage and Databases", type: "concept", question: "What is DynamoDB?", options: ["Fully managed NoSQL database for key-value data", "SQL database", "Document store only", "Graph database"], correct: 0, explanation: "DynamoDB stores key-value pairs. Serverless, scales automatically. Single-digit millisecond latency. Good for real-time applications, IoT, user sessions." },
  { id: 39, level: 2, category: "Storage and Databases", type: "concept", question: "What is EBS?", options: ["Elastic Block Storage - persistent volumes for EC2", "Object storage", "File system storage", "Database storage"], correct: 0, explanation: "EBS provides block-level storage for EC2. Persists after instance stops. Different volume types: gp2/gp3 general, io1 IOPS, st1 throughput." },
  { id: 40, level: 2, category: "Storage and Databases", type: "concept", question: "What is EFS?", options: ["Elastic File System - shared NFS storage for multiple EC2", "Object storage", "Block storage", "Snapshot storage"], correct: 0, explanation: "EFS provides NFS-based file storage. Multiple EC2 instances mount same EFS. Automatically scales. Good for shared data, web serving, content repositories." },
  { id: 41, level: 3, category: "IAM and Security", type: "concept", question: "What is IAM?", options: ["Identity and Access Management - control AWS resource access", "Internal Application Manager", "Infrastructure Access Module", "Instance Authorization Method"], correct: 0, explanation: "IAM manages users, groups, roles, permissions. Define who can do what. Uses policies (JSON documents). Essential for security least-privilege principle." },
  { id: 42, level: 3, category: "IAM and Security", type: "concept", question: "What is IAM policy?", options: ["JSON document defining permissions for identity/resource", "Access rule", "Security group rule", "VPC rule"], correct: 0, explanation: "IAM policy specifies actions on resources. Identity-based (attached to users/roles), Resource-based (on resources). Actions: Allow/Deny. Services: s3:*, ec2:RunInstances, etc." },
  { id: 43, level: 3, category: "IAM and Security", type: "concept", question: "What is IAM role?", options: ["Identity with permissions, assumable by services/users", "User account", "Group of users", "Permission set"], correct: 0, explanation: "Role is identity without credentials. EC2 assumes role, gets temporary credentials. Better than embedding keys. Trust policy defines who can assume." },
  { id: 44, level: 3, category: "IAM and Security", type: "concept", question: "What is principle of least privilege in IAM?", options: ["Grant minimum permissions needed to do job", "No access restrictions", "Full admin access", "Default deny all"], correct: 0, explanation: "Least privilege means users/services get only needed permissions. Reduces damage if credentials compromised. Regularly audit and remove unused permissions." },
  { id: 45, level: 3, category: "IAM and Security", type: "concept", question: "What is MFA?", options: ["Multi-Factor Authentication - requires second factor", "Multiple Factor Authorization", "Managed File Access", "Multi-Failure Alert"], correct: 0, explanation: "MFA requires password + second factor (TOTP app, hardware key, SMS). Much more secure. Highly recommended for AWS account root user and IAM users." },
  { id: 46, level: 3, category: "IAM and Security", type: "concept", question: "What is KMS?", options: ["Key Management Service - manages encryption keys", "Key Master System", "Kubernetes Management System", "Knowledge Management Service"], correct: 0, explanation: "KMS creates/manages encryption keys. Encrypt S3, EBS, RDS, etc. Key rotation available. CloudTrail logs all key usage. Keys never leave KMS." },
  { id: 47, level: 3, category: "IAM and Security", type: "concept", question: "What is ACM?", options: ["AWS Certificate Manager - manages SSL/TLS certificates", "Access Control Manager", "Application Certificate Module", "Authorization Control Module"], correct: 0, explanation: "ACM provides free SSL/TLS certificates. Auto-renews. Deploy on ELB, CloudFront, API Gateway. Simplifies HTTPS setup for applications." },
  { id: 48, level: 3, category: "IAM and Security", type: "concept", question: "What is Secrets Manager?", options: ["Stores and rotates secrets like passwords, API keys", "Password policy", "Encryption key storage", "Credential manager"], correct: 0, explanation: "Secrets Manager securely stores database passwords, API keys, tokens. Automatic rotation. Encrypt with KMS. Audit with CloudTrail. Better than hardcoding." },
  { id: 49, level: 3, category: "IAM and Security", type: "concept", question: "What is WAF?", options: ["Web Application Firewall - protects web apps from attacks", "Wireless Application Framework", "Web Access Filter", "Web Application Format"], correct: 0, explanation: "WAF filters HTTP/HTTPS traffic. Protects from SQL injection, XSS, DDoS, bot attacks. Attach to ALB, API Gateway, CloudFront. Define rules based on IP, headers, patterns." },
  { id: 50, level: 3, category: "IAM and Security", type: "concept", question: "What is GuardDuty?", options: ["Threat detection service using ML to find security issues", "Network guard", "Access guard", "Data guard"], correct: 0, explanation: "GuardDuty analyzes CloudTrail, VPC Flow Logs, DNS logs for threats. Detects compromised instances, unauthorized API calls, malware. Automated response available." },
  { id: 51, level: 3, category: "Monitoring and Management", type: "concept", question: "What is CloudWatch?", options: ["Monitoring service collecting metrics and logs", "Network watching", "Account monitoring", "Security monitoring"], correct: 0, explanation: "CloudWatch collects metrics (CPU, memory, disk), logs, traces. Set alarms on metrics. Log insights for searching. Dashboards visualize data. Free tier includes basics." },
  { id: 52, level: 3, category: "Monitoring and Management", type: "concept", question: "What is CloudTrail?", options: ["Logs all API calls and user activity in AWS account", "Resource trail", "Cloud path", "Access trail"], correct: 0, explanation: "CloudTrail records who did what, when, on which resource. Essential for auditing, compliance, troubleshooting. Logs to S3. Enable on all accounts and regions." },
  { id: 53, level: 3, category: "Monitoring and Management", type: "concept", question: "What is CloudFormation?", options: ["Infrastructure as Code - define AWS resources in templates", "Resource formatting", "Cloud formatting", "Template formatter"], correct: 0, explanation: "CloudFormation uses JSON/YAML templates to define infrastructure. Repeatable deployments. Version control infrastructure. Manage stacks, updates, rollbacks." },
  { id: 54, level: 3, category: "Monitoring and Management", type: "concept", question: "What is Systems Manager?", options: ["Manage EC2 instances and on-prem servers at scale", "System maintenance", "Server management", "Configuration manager"], correct: 0, explanation: "Systems Manager (SSM) provides agent-based management. Patch Manager, Session Manager (SSH without keys), Parameter Store, Run Command. Works on-prem too." },
  { id: 55, level: 3, category: "Monitoring and Management", type: "concept", question: "What is Config?", options: ["AWS Config - tracks resource configuration changes", "Resource configuration", "Infrastructure configuration", "Configuration manager"], correct: 0, explanation: "Config continuously monitors and records AWS resource configurations. Tracks changes. Evaluate compliance with rules. Useful for compliance, governance." },
  { id: 56, level: 3, category: "Monitoring and Management", type: "concept", question: "What is Service Health Dashboard?", options: ["Shows AWS service health status across regions", "Personal health dashboard", "Application health", "Instance health"], correct: 0, explanation: "Service Health Dashboard (public) shows AWS service status. Personal Health Dashboard shows events affecting your account. Check before investigating issues." },
  { id: 57, level: 3, category: "Databases and Data Analytics", type: "concept", question: "What is Redshift?", options: ["Data warehouse for large-scale analytics and BI", "Database cache", "In-memory database", "Time-series database"], correct: 0, explanation: "Redshift is managed data warehouse. Petabyte-scale. Columnar storage for fast analytics. SQL queries via PostgreSQL. Great for BI, data lakes, historical analysis." },
  { id: 58, level: 3, category: "Databases and Data Analytics", type: "concept", question: "What is Athena?", options: ["Query S3 data using SQL without loading into database", "Analytics engine", "Search engine", "Query builder"], correct: 0, explanation: "Athena queries S3 objects directly with SQL. No data movement needed. Pay per query based on scanned data. Works on CSV, JSON, Parquet, ORC. Serverless." },
  { id: 59, level: 3, category: "Databases and Data Analytics", type: "concept", question: "What is EMR?", options: ["Elastic MapReduce - process big data on Hadoop clusters", "Elastic Management Resource", "Enterprise Management Resource", "Elastic Multi-Resource"], correct: 0, explanation: "EMR runs Apache Hadoop, Spark, Hive on EC2 cluster. Process petabyte-scale data. Transient clusters for cost savings. Integration with S3, DynamoDB." },
  { id: 60, level: 3, category: "Databases and Data Analytics", type: "concept", question: "What is Glue?", options: ["ETL service and data catalog for organizing data", "Data integration", "Metadata management", "Data pipeline"], correct: 0, explanation: "Glue is ETL (Extract, Transform, Load) service. Data Catalog discovers/organizes data. Crawlers auto-detect schema. Serverless. Works with S3, Redshift, RDS, etc." },
  { id: 61, level: 3, category: "Application Services", type: "concept", question: "What is SNS?", options: ["Simple Notification Service - pub/sub messaging", "System Notification System", "Subscription Notification Service", "Notification System Standard"], correct: 0, explanation: "SNS sends messages to multiple subscribers. Publish topics, subscribers receive. Email, SMS, HTTP, SQS, Lambda, mobile push. Great for notifications, alerts." },
  { id: 62, level: 3, category: "Application Services", type: "concept", question: "What is SQS?", options: ["Simple Queue Service - message queue for async processing", "Service Quality System", "Subscription Queue Service", "Sequence Queue System"], correct: 0, explanation: "SQS queues messages for processing. Decouples producers from consumers. Supports standard (best-effort) and FIFO (ordered). Reliable, scalable, cheap." },
  { id: 63, level: 3, category: "Application Services", type: "concept", question: "What is EventBridge?", options: ["Routes events between AWS services and custom apps", "Event processing", "Event scheduling", "Event streaming"], correct: 0, explanation: "EventBridge matches events to rules, sends to targets. Connect AWS services, SaaS apps, custom apps. Cron/rate schedules supported. Server-based event bus." },
  { id: 64, level: 3, category: "Application Services", type: "concept", question: "What is API Gateway?", options: ["Create REST/WebSocket APIs, manage traffic, security", "Gateway API standard", "API interface", "Gateway protocol"], correct: 0, explanation: "API Gateway creates, publishes, secures APIs. Integrates with Lambda, EC2, other services. Rate limiting, caching, authentication, logging. Pay per request." },
  { id: 65, level: 3, category: "Application Services", type: "concept", question: "What is Step Functions?", options: ["Coordinate multiple Lambda functions into workflow", "Function steps", "Processing steps", "Workflow engine"], correct: 0, explanation: "Step Functions defines serverless workflows as state machines. Coordinate Lambda, EC2, activities. Visual editor shows workflow. Error handling, retries built-in." },
  { id: 66, level: 3, category: "Containers and Orchestration", type: "concept", question: "What is Docker?", options: ["Containerization platform packaging app and dependencies", "Container service", "Container registry", "Container platform"], correct: 0, explanation: "Docker packages application, libraries, OS in containers. Lightweight than VMs. Same on laptop, staging, production. Image = template, Container = instance." },
  { id: 67, level: 3, category: "Containers and Orchestration", type: "concept", question: "What is ECS?", options: ["Elastic Container Service - run Docker containers", "Elastic Cloud Service", "Enterprise Container Service", "Easy Container Service"], correct: 0, explanation: "ECS runs Docker containers on EC2 or Fargate. Task definition specifies container image, resources. Service maintains desired count. Integrates with ALB, auto-scaling." },
  { id: 68, level: 3, category: "Containers and Orchestration", type: "concept", question: "What is EKS?", options: ["Elastic Kubernetes Service - managed Kubernetes", "Elastic Key Service", "Enterprise Kubernetes Service", "Easy Kubernetes Setup"], correct: 0, explanation: "EKS manages Kubernetes infrastructure. AWS manages control plane, you manage nodes/applications. Same Kubernetes on AWS, hybrid, multi-cloud. Powerful orchestration." },
  { id: 69, level: 3, category: "Containers and Orchestration", type: "concept", question: "What is Fargate?", options: ["Serverless compute for containers without managing EC2", "Container framework", "Container runtime", "Container network"], correct: 0, explanation: "Fargate runs containers serverless. No EC2 to manage. AWS manages infrastructure. Pay per vCPU and memory used. Works with ECS and EKS." },
  { id: 70, level: 3, category: "Containers and Orchestration", type: "concept", question: "What is ECR?", options: ["Elastic Container Registry - store and manage images", "Enterprise Container Registry", "Easy Container Repository", "Elastic Cloud Repository"], correct: 0, explanation: "ECR stores Docker/OCI images. Private registry (not Docker Hub). Scan for vulnerabilities. Integrate with ECS, EKS, CodeBuild, Lambda." },
  { id: 71, level: 3, category: "CI/CD and Deployment", type: "concept", question: "What is CodeCommit?", options: ["Managed Git repository service", "Code sharing service", "Version control alternative", "Repository hosting"], correct: 0, explanation: "CodeCommit is AWS's Git service. Like GitHub but on AWS. Integrates with CodePipeline, CodeBuild, CodeDeploy for automated deployments." },
  { id: 72, level: 3, category: "CI/CD and Deployment", type: "concept", question: "What is CodeBuild?", options: ["Managed build service compiling, testing, packaging code", "Build framework", "Build system", "Build tool"], correct: 0, explanation: "CodeBuild compiles source code, runs tests, produces deployable artifact. Scales automatically. Works with various languages. Integrates in pipelines." },
  { id: 73, level: 3, category: "CI/CD and Deployment", type: "concept", question: "What is CodeDeploy?", options: ["Automates application deployment to EC2, on-prem servers", "Deployment framework", "Deployment tool", "Deployment service"], correct: 0, explanation: "CodeDeploy handles deployment automation. EC2, on-premises, Lambda targets. Blue/green deployments for zero-downtime. Rollback on failure automatic." },
  { id: 74, level: 3, category: "CI/CD and Deployment", type: "concept", question: "What is CodePipeline?", options: ["CI/CD orchestration connecting build, test, deploy stages", "Pipeline framework", "Pipeline service", "Pipeline tool"], correct: 0, explanation: "CodePipeline automates release process. Source (CodeCommit), Build (CodeBuild), Test, Deploy (CodeDeploy). Integrates Jenkins, GitHub, third-party tools." },
  { id: 75, level: 3, category: "Networking and CDN", type: "concept", question: "What is CloudFront?", options: ["Content Delivery Network caching content globally", "Front-end service", "Content service", "Cache service"], correct: 0, explanation: "CloudFront caches content at edge locations. Reduces latency, bandwidth. Origin can be S3, EC2, ALB, HTTP server. DDoS protection built-in." },
  { id: 76, level: 3, category: "Networking and CDN", type: "concept", question: "What is Route 53?", options: ["DNS service with health checks and routing policies", "DNS server", "Domain registrar", "Routing service"], correct: 0, explanation: "Route 53 manages DNS. Register domains, route traffic. Health checks monitor endpoints. Routing policies: simple, weighted, latency, geolocation, failover." },
  { id: 77, level: 3, category: "Networking and CDN", type: "concept", question: "What is Direct Connect?", options: ["Dedicated network connection from on-premises to AWS", "Network connectivity", "Dedicated line", "Direct connection"], correct: 0, explanation: "Direct Connect provides 1-100 Gbps dedicated connection. More consistent than internet. Lower latency, higher bandwidth, higher cost. For enterprise." },
  { id: 78, level: 3, category: "Networking and CDN", type: "concept", question: "What is VPC endpoint?", options: ["Private connection to AWS services without internet", "VPC exit point", "Network endpoint", "Service endpoint"], correct: 0, explanation: "VPC endpoint allows private connection to S3, DynamoDB, other services. Gateway endpoints (S3, DynamoDB), Interface endpoints (other services). No internet needed." },
  { id: 79, level: 3, category: "Networking and CDN", type: "concept", question: "What is Transit Gateway?", options: ["Connects multiple VPCs and on-prem networks via hub", "Network gateway", "VPC connection", "Network connector"], correct: 0, explanation: "Transit Gateway is hub connecting VPCs and on-premises. Replaces mesh of peerings. Attach multiple networks. Route traffic between attachments." },
  { id: 80, level: 3, category: "Cost Management", type: "concept", question: "What is AWS Cost Explorer?", options: ["Analyze and visualize AWS spending patterns", "Cost tracker", "Billing tool", "Expense monitor"], correct: 0, explanation: "Cost Explorer visualizes historical spending. Forecast future costs. Analyze by service, region, tag. Find cost optimization opportunities. Identify anomalies." },
  { id: 81, level: 3, category: "Cost Management", type: "concept", question: "What is AWS Budget?", options: ["Set cost limits and receive alerts when approaching", "Budget tracker", "Spending limit", "Cost control"], correct: 0, explanation: "Budgets let you set spending limits. Alerts when approaching or exceeding budget. Attach actions to respond automatically. Free tier alert included." },
  { id: 82, level: 3, category: "Cost Management", type: "concept", question: "What is Compute Savings Plan?", options: ["Flexible pricing saving 10-17% on compute services", "Savings discount", "Reserved instance", "Discount plan"], correct: 0, explanation: "Compute Savings Plan (1-3 years) saves on EC2, Lambda, Fargate. More flexible than Reserved Instances. Regional or zone-based. Save commit to usage amount." },
  { id: 83, level: 3, category: "Cost Management", type: "concept", question: "What is Cost Optimization?", options: ["Finding ways to reduce AWS spending", "Price optimization", "Budget optimization", "Resource optimization"], correct: 0, explanation: "Cost optimization: right-size instances, use reserved/spot, stop unused resources, use storage lifecycle, shut down non-prod after hours, monitor with Cost Explorer." },
  { id: 84, level: 3, category: "Migration", type: "concept", question: "What is AWS DMS?", options: ["Database Migration Service - migrate databases with minimal downtime", "Data Management System", "Database Management Service", "Data Migration System"], correct: 0, explanation: "DMS migrates databases. Homogeneous (Oracle to Oracle) or heterogeneous (Oracle to MySQL) migrations. Continuous replication for minimal downtime." },
  { id: 85, level: 3, category: "Migration", type: "concept", question: "What is AWS DataSync?", options: ["Automate large-scale data transfer between on-prem and AWS", "Data synchronization", "Data transfer tool", "Sync service"], correct: 0, explanation: "DataSync automates data transfers. On-premises NAS/file servers to S3/EFS. Bandwidth throttling, encryption. Faster than manual copying. Validate data integrity." },
  { id: 86, level: 3, category: "Migration", type: "concept", question: "What is Snowball?", options: ["Physical device for offline large-scale data transfer", "Data transfer device", "Migration appliance", "Transfer tool"], correct: 0, explanation: "Snowball is truck-sized device importing/exporting data. For exabyte-scale transfer. You load data, ship to AWS, AWS uploads to S3. Faster than network transfer." },
  { id: 87, level: 3, category: "Backup and Disaster Recovery", type: "concept", question: "What is AWS Backup?", options: ["Centralized backup service for multiple services", "Backup solution", "Backup management", "Backup service"], correct: 0, explanation: "Backup centralizes protection. EBS, RDS, DynamoDB, EFS, EC2 AMI backup. Policies, retention, cross-region copy. Compliance-ready." },
  { id: 88, level: 3, category: "Backup and Disaster Recovery", type: "concept", question: "What is RPO and RTO?", options: ["RPO = data loss tolerance; RTO = downtime tolerance", "Recovery targets", "Recovery requirements", "Recovery objectives"], correct: 0, explanation: "RPO (Recovery Point Objective) = maximum acceptable data loss. RTO (Recovery Time Objective) = maximum acceptable downtime. Design DR based on these." },
  { id: 89, level: 3, category: "Compliance and Governance", type: "concept", question: "What is compliance in cloud?", options: ["Meeting regulatory requirements like HIPAA, PCI-DSS, GDPR", "Following rules", "Regulatory adherence", "Standards compliance"], correct: 0, explanation: "Compliance: follow regulations (HIPAA=healthcare, PCI-DSS=payments, GDPR=privacy, SOC 2=security). AWS provides controls, you responsible for configurations." },
  { id: 90, level: 3, category: "Compliance and Governance", type: "concept", question: "What is Shared Responsibility Model?", options: ["AWS responsible for infrastructure; you responsible for config/data", "Security responsibility", "Shared security", "Responsibility division"], correct: 0, explanation: "AWS secures infrastructure. You secure: OS patches, firewall rules, app security, data encryption, IAM, access control. Clear line of responsibility." }
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
  if (accuracy >= 90) mastery = 'Cloud Architect Master';
  else if (accuracy >= 80) mastery = 'AWS Solutions Expert';
  else if (accuracy >= 70) mastery = 'Cloud Competent Professional';
  else if (accuracy >= 60) mastery = 'Cloud Learner';
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
        You've completed all 90 comprehensive Cloud Computing lessons covering AWS fundamentals, VPC and networking, EC2, storage, databases, IAM, monitoring, containers, CI/CD, and more. You're now a cloud computing master!
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
