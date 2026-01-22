<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title>Computer Networking Master - Rischa Chatbot</title>
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
        <h1 class="page-title">Networking Master</h1>
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
            <div class="stat-label" style="margin-top: 0.5rem;">Network Mastery</div>
          </div>
        </div>
      </div>

      <div id="quiz-content" class="question-container"></div>
    </div>
  </main>
</div>

<script>
// Comprehensive Computer Networking Master - 90 Lessons
const lessons = [
  { id: 1, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is a computer network?", options: ["Connected computers sharing data and resources", "Multiple computers", "Internet connection", "Data storage"], correct: 0, explanation: "A network connects computers to share data, applications, and resources. From small LANs to global internet. Enables communication and collaboration." },
  { id: 2, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is LAN?", options: ["Local Area Network covering small geographic area", "Local Access Network", "Limited Area Network", "Long-distance Area Network"], correct: 0, explanation: "LAN: computers in same building/office. High-speed (Ethernet). Easy to manage. Home/office networks are LANs." },
  { id: 3, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is WAN?", options: ["Wide Area Network spanning large geographic areas", "Wide Access Network", "Wireless Area Network", "Web Area Network"], correct: 0, explanation: "WAN: connects LANs across cities/countries. Internet is largest WAN. Slower than LAN. Used by organizations with multiple locations." },
  { id: 4, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is IP address?", options: ["Unique identifier for device on network like postal address", "Internet Protocol", "Identification number", "Server address"], correct: 0, explanation: "IP address identifies device. IPv4: 192.168.1.1 (32-bit). IPv6: longer format for more devices. Two types: public (internet) and private (internal)." },
  { id: 5, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is IPv4?", options: ["32-bit IP address with 4 octets like 192.168.1.1", "Internet Protocol version 4", "IP version 4", "Protocol standard"], correct: 0, explanation: "IPv4: 4 numbers (0-255) separated by dots. Example: 192.168.1.1. 4.3 billion addresses. Mostly exhausted now." },
  { id: 6, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is IPv6?", options: ["128-bit IP address with more addresses for future", "Internet Protocol version 6", "IP next generation", "Extended protocol"], correct: 0, explanation: "IPv6: 128-bit addresses. Vastly more addresses. Hex format like 2001:db8::1. Gradually replacing IPv4. Addresses exhaustion solved." },
  { id: 7, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is subnet mask?", options: ["Determines which part of IP is network vs host", "Network mask", "Address mask", "IP mask"], correct: 0, explanation: "Subnet mask like 255.255.255.0 divides address. Network part (shared), host part (unique). /24 means 24 network bits." },
  { id: 8, level: 1, category: "Networking Fundamentals", type: "concept", question: "What is gateway?", options: ["Device routing traffic between different networks", "Network exit", "Router", "Network interface"], correct: 0, explanation: "Gateway connects network to other networks/internet. Default gateway is route for unknown destinations. Usually router." },
  { id: 9, level: 1, category: "OSI Model", type: "concept", question: "What is OSI model?", options: ["7-layer framework for network communication standards", "Open Systems Interconnection", "Networking standard", "Communication framework"], correct: 0, explanation: "OSI: 7 layers defining how data moves. Layer 1 (Physical) to Layer 7 (Application). Each layer has specific functions." },
  { id: 10, level: 1, category: "OSI Model", type: "concept", question: "What is Layer 1 (Physical)?", options: ["Physical transmission: cables, signals, hardware", "Physical layer", "Cables and wires", "Hardware level"], correct: 0, explanation: "Layer 1: Hubs, cables, signals. Raw bits. Electrical/optical transmission. No understanding of data." },
  { id: 11, level: 1, category: "OSI Model", type: "concept", question: "What is Layer 2 (Data Link)?", options: ["MAC addresses, switches, frames for local network", "Data Link layer", "Frames, MAC", "Local delivery"], correct: 0, explanation: "Layer 2: Switches, MAC addresses (physical). Frames delivered locally. No routing. ARP resolves IP to MAC." },
  { id: 12, level: 1, category: "OSI Model", type: "concept", question: "What is Layer 3 (Network)?", options: ["IP addresses, routing between networks", "Network layer", "Routing, IP", "Network delivery"], correct: 0, explanation: "Layer 3: Routers, IP addresses. Routing packets. Internet possible. Logical addressing across networks." },
  { id: 13, level: 1, category: "OSI Model", type: "concept", question: "What is Layer 4 (Transport)?", options: ["TCP/UDP protocols, ports, end-to-end delivery", "Transport layer", "TCP, UDP, ports", "Service delivery"], correct: 0, explanation: "Layer 4: TCP (reliable), UDP (fast). Port numbers (80 HTTP, 443 HTTPS). End-to-end communication." },
  { id: 14, level: 1, category: "OSI Model", type: "concept", question: "What is Layer 5-7?", options: ["Session/Presentation/Application - user interaction", "Upper layers", "Software layers", "Application level"], correct: 0, explanation: "Layer 5 (Session): connection management. Layer 6 (Presentation): encryption, compression. Layer 7 (Application): HTTP, FTP, email." },
  { id: 15, level: 1, category: "TCP/IP Model", type: "concept", question: "What is TCP/IP model?", options: ["4-layer simplified model: Link, Internet, Transport, Application", "TCP IP model", "Practical model", "Modern model"], correct: 0, explanation: "TCP/IP: simpler than OSI. 4 layers. Practical model used today. Combines OSI layers 5-7 into Application layer." },
  { id: 16, level: 2, category: "TCP/UDP Protocols", type: "concept", question: "What is TCP?", options: ["Transmission Control Protocol - reliable, ordered, connection-based", "Transport Control Protocol", "Transfer Protocol", "Connection protocol"], correct: 0, explanation: "TCP: connection-oriented, reliable, ordered delivery. Slower than UDP. Used for: HTTP, FTP, Email. Handshake establishes connection." },
  { id: 17, level: 2, category: "TCP/UDP Protocols", type: "concept", question: "What is UDP?", options: ["User Datagram Protocol - fast, connectionless, no reliability", "User Data Protocol", "Datagram Protocol", "Fast protocol"], correct: 0, explanation: "UDP: connectionless, unreliable. Very fast. Used for: video streaming, gaming, DNS. Fire-and-forget approach." },
  { id: 18, level: 2, category: "TCP/UDP Protocols", type: "concept", question: "Difference between TCP and UDP?", options: ["TCP reliable/ordered, UDP fast/unreliable", "TCP is better", "UDP is new", "Same protocol"], correct: 0, explanation: "TCP: connection setup, error checking, ordered. UDP: no connection, no error checking, unordered. TCP for accuracy, UDP for speed." },
  { id: 19, level: 2, category: "TCP/UDP Protocols", type: "concept", question: "What is TCP three-way handshake?", options: ["SYN, SYN-ACK, ACK to establish connection", "Connection start", "Handshake process", "Connection method"], correct: 0, explanation: "Client sends SYN. Server replies SYN-ACK. Client sends ACK. Connection established. Ensures both ready to communicate." },
  { id: 20, level: 2, category: "Ports and Services", type: "concept", question: "What is port?", options: ["Endpoint for network communication identified by number", "Network endpoint", "Communication point", "Service identifier"], correct: 0, explanation: "Port: 0-65535. Well-known (0-1023), registered (1024-49151), dynamic (49152-65535). Example: 80 (HTTP), 443 (HTTPS), 22 (SSH)." },
  { id: 21, level: 2, category: "Ports and Services", type: "concept", question: "What is port 80?", options: ["HTTP web traffic default port", "Web port", "Internet port", "Server port"], correct: 0, explanation: "Port 80: HTTP (unencrypted web). Default for http://websites. Replaced by 443 HTTPS for security." },
  { id: 22, level: 2, category: "Ports and Services", type: "concept", question: "What is port 443?", options: ["HTTPS encrypted web traffic default port", "Secure port", "HTTPS port", "Encrypted port"], correct: 0, explanation: "Port 443: HTTPS (encrypted web). Secure for sensitive data. Uses TLS/SSL certificates. Modern standard." },
  { id: 23, level: 2, category: "Ports and Services", type: "concept", question: "What is port 22?", options: ["SSH secure shell remote access", "SSH port", "Remote access", "Secure shell"], correct: 0, explanation: "Port 22: SSH (Secure Shell). Remote server access. Encrypted. Replaces Telnet. Also SFTP (file transfer)." },
  { id: 24, level: 2, category: "Ports and Services", type: "concept", question: "What is port 53?", options: ["DNS domain name resolution", "DNS port", "Domain port", "Lookup port"], correct: 0, explanation: "Port 53: DNS (Domain Name System). Resolves hostnames to IPs. TCP/UDP both. Essential internet service." },
  { id: 25, level: 2, category: "DNS", type: "concept", question: "What is DNS?", options: ["Domain Name System translating hostnames to IP addresses", "Domain Name Service", "Name resolution", "Host lookup"], correct: 0, explanation: "DNS: converts google.com to IP (142.251.41.14). Distributed system. Hierarchical (root, TLD, authoritative). Port 53." },
  { id: 26, level: 2, category: "DNS", type: "concept", question: "What is DNS record?", options: ["A (IPv4), AAAA (IPv6), CNAME (alias), MX (mail)", "Domain record", "Name record", "Record type"], correct: 0, explanation: "DNS records: A (maps domain to IPv4), AAAA (IPv6), CNAME (alias), MX (mail server), NS (nameserver), TXT (text)." },
  { id: 27, level: 2, category: "DNS", type: "concept", question: "What is DNS cache?", options: ["Local DNS storage to speed up repeated lookups", "DNS storage", "Query cache", "Speed optimization"], correct: 0, explanation: "DNS cache: stores recent lookups locally. Reduces queries. TTL (time-to-live) determines cache duration. Browsers, ISPs cache." },
  { id: 28, level: 2, category: "HTTP/HTTPS", type: "concept", question: "What is HTTP?", options: ["Hypertext Transfer Protocol - web communication protocol", "Web protocol", "Internet protocol", "Transfer protocol"], correct: 0, explanation: "HTTP: request-response protocol. Stateless (no memory of previous). Port 80. Unencrypted - visible in transit." },
  { id: 29, level: 2, category: "HTTP/HTTPS", type: "concept", question: "What is HTTPS?", options: ["HTTP Secure - encrypted HTTP with TLS/SSL", "Secure HTTP", "Encrypted HTTP", "Protected protocol"], correct: 0, explanation: "HTTPS: HTTP + TLS/SSL encryption. Port 443. Protects data in transit. Green padlock in browsers. Mandatory for sensitive data." },
  { id: 30, level: 2, category: "HTTP/HTTPS", type: "concept", question: "What is HTTP status code?", options: ["Codes indicating request result (200 OK, 404 Not Found, 500 Error)", "Response code", "Status indicator", "Result code"], correct: 0, explanation: "HTTP codes: 2xx (success), 3xx (redirect), 4xx (client error), 5xx (server error). Examples: 200 OK, 404 Not Found, 500 Server Error." },
  { id: 31, level: 2, category: "Routing", type: "concept", question: "What is routing?", options: ["Process of forwarding packets toward destination IP", "Packet forwarding", "Path selection", "Data forwarding"], correct: 0, explanation: "Routing: routers decide path for packets. Uses routing tables. Routes packets hop-by-hop to destination." },
  { id: 32, level: 2, category: "Routing", type: "concept", question: "What is routing table?", options: ["List of routes to destinations with next hop information", "Route list", "Destination table", "Path table"], correct: 0, explanation: "Routing table: maps destination networks to next hops. Each router has table. Helps forward packets correctly." },
  { id: 33, level: 2, category: "Routing", type: "concept", question: "What is static routing?", options: ["Manually configured fixed routes, not dynamic", "Manual routing", "Fixed routes", "Predefined routes"], correct: 0, explanation: "Static routing: admin manually enters routes. Doesn't adapt to network changes. Used in small simple networks." },
  { id: 34, level: 2, category: "Routing", type: "concept", question: "What is dynamic routing?", options: ["Routers learn and adjust routes automatically using protocols", "Automatic routing", "Adaptive routing", "Protocol-based routing"], correct: 0, explanation: "Dynamic routing: routers exchange info to discover routes. Adapts to changes. Protocols: OSPF, BGP, RIP. Complex networks use this." },
  { id: 35, level: 2, category: "Network Devices", type: "concept", question: "What is router?", options: ["Device forwarding packets between networks using IP", "Network device", "Forwarding device", "Gateway"], correct: 0, explanation: "Router: connects networks. Makes routing decisions. Has multiple interfaces. Forwards packets based on IP destination." },
  { id: 36, level: 2, category: "Network Devices", type: "concept", question: "What is switch?", options: ["Device connecting devices on same network using MAC addresses", "Network switch", "Connection device", "Local connector"], correct: 0, explanation: "Switch: connects devices on LAN. Uses MAC addresses (Layer 2). Intelligent hub. Reduces collisions. Creates local network." },
  { id: 37, level: 2, category: "Network Devices", type: "concept", question: "What is hub?", options: ["Simple device broadcasting all traffic to all ports", "Network hub", "Broadcasting device", "Simple connector"], correct: 0, explanation: "Hub: broadcasts all data to all ports. No intelligence. Creates collisions. Obsolete (replaced by switches). Still in older networks." },
  { id: 38, level: 2, category: "Network Devices", type: "concept", question: "What is firewall?", options: ["Security device filtering traffic based on rules", "Security device", "Traffic filter", "Access control"], correct: 0, explanation: "Firewall: controls incoming/outgoing traffic. Stateful (remembers connections). Rules allow/deny. Hardware or software." },
  { id: 39, level: 2, category: "Network Devices", type: "concept", question: "What is proxy?", options: ["Intermediary receiving and forwarding client requests", "Intermediary server", "Request forwarder", "Middleman"], correct: 0, explanation: "Proxy: sits between client and server. Hides client IP. Caches responses. Can block sites. Forward proxy (client-side), reverse proxy (server-side)." },
  { id: 40, level: 2, category: "Network Devices", type: "concept", question: "What is load balancer?", options: ["Distributes traffic across multiple servers", "Traffic distributor", "Server distributor", "Request distributor"], correct: 0, explanation: "Load balancer: distributes traffic. Round-robin, least connections, etc. Prevents overload. Improves performance and availability." },
  { id: 41, level: 3, category: "MAC Address", type: "concept", question: "What is MAC address?", options: ["Media Access Control - physical address like 00:1A:2B:3C:4D:5E", "Physical address", "Network card address", "Hardware address"], correct: 0, explanation: "MAC: 48-bit physical address. Hex format. Identifies device on LAN. First half (OUI) = manufacturer, second half = device." },
  { id: 42, level: 3, category: "MAC Address", type: "concept", question: "What is ARP?", options: ["Address Resolution Protocol mapping IP to MAC address", "Address Resolution", "Mapping protocol", "Translation protocol"], correct: 0, explanation: "ARP: broadcasts IP address, gets MAC back. Maps IP to MAC. Cache stored locally. Enables Layer 2-3 communication." },
  { id: 43, level: 3, category: "DHCP", type: "concept", question: "What is DHCP?", options: ["Dynamic Host Configuration Protocol assigning IP dynamically", "IP assignment protocol", "Dynamic IP", "Configuration protocol"], correct: 0, explanation: "DHCP: automatically assigns IP, subnet mask, gateway, DNS. Leases IP temporarily. Convenient for clients. Server maintains pool." },
  { id: 44, level: 3, category: "DHCP", type: "concept", question: "What is DHCP lease?", options: ["Temporary IP address assignment with expiration time", "Temporary IP", "IP duration", "Assignment period"], correct: 0, explanation: "DHCP lease: IP assigned for period (hours/days). Expires unless renewed. DHCP Discover, Offer, Request, Acknowledge (DORA)." },
  { id: 45, level: 3, category: "VPN", type: "concept", question: "What is VPN?", options: ["Virtual Private Network creating secure tunnel over internet", "Secure network", "Encrypted connection", "Private tunnel"], correct: 0, explanation: "VPN: encrypts all traffic. Appears from different location. Masks real IP. Secure for public WiFi. Enables remote access." },
  { id: 46, level: 3, category: "VPN", type: "concept", question: "What is VPN protocol?", options: ["OpenVPN, WireGuard, IPSec for encryption", "VPN standard", "Encryption protocol", "Tunnel protocol"], correct: 0, explanation: "VPN protocols: OpenVPN (flexible), WireGuard (fast), IPSec (robust), PPTP (old). Different security/speed tradeoffs." },
  { id: 47, level: 3, category: "Encryption", type: "concept", question: "What is TLS?", options: ["Transport Layer Security encrypting communication like HTTPS", "Encryption protocol", "Security layer", "Secure protocol"], correct: 0, explanation: "TLS: replaces SSL. Encrypts data in transit. Handshake establishes secure connection. Uses certificates. Version 1.3 latest." },
  { id: 48, level: 3, category: "Encryption", type: "concept", question: "What is SSL certificate?", options: ["Digital certificate proving server authenticity for HTTPS", "Server certificate", "Security certificate", "Identity proof"], correct: 0, explanation: "SSL cert: proves server identity. Issued by Certificate Authority. Contains public key. Browser verifies. Enables HTTPS trust." },
  { id: 49, level: 3, category: "NAT", type: "concept", question: "What is NAT?", options: ["Network Address Translation mapping private IP to public", "Address translation", "IP mapping", "Conversion"], correct: 0, explanation: "NAT: converts private IPs to public for internet. Enables multiple devices with one public IP. Security benefit - hides internal IPs." },
  { id: 50, level: 3, category: "NAT", type: "concept", question: "What is port forwarding?", options: ["Directing traffic from external port to internal IP:port", "Port mapping", "Traffic redirection", "Port routing"], correct: 0, explanation: "Port forwarding: external traffic (example 8080) redirected to internal service (192.168.1.10:80). Enables external access to internal services." },
  { id: 51, level: 3, category: "Network Segmentation", type: "concept", question: "What is network segmentation?", options: ["Dividing network into smaller segments for security", "Network division", "Isolation", "Subnetting"], correct: 0, explanation: "Segmentation: splits network into zones. Limits attack surface. Improves performance. Uses VLANs, subnets, firewalls." },
  { id: 52, level: 3, category: "Network Segmentation", type: "concept", question: "What is VLAN?", options: ["Virtual LAN creating logical network on physical network", "Virtual network", "Logical network", "Network partition"], correct: 0, explanation: "VLAN: logical LAN on physical infrastructure. Same as wired LAN logically. Different VLANs can't communicate without router." },
  { id: 53, level: 3, category: "Network Segmentation", type: "concept", question: "What is subnet?", options: ["Subdivision of IP network reducing IP size", "Network subdivision", "IP division", "Network partition"], correct: 0, explanation: "Subnet: divides network into smaller networks. Uses subnet mask. Reduces broadcast domain. Improves efficiency and security." },
  { id: 54, level: 3, category: "Wireless", type: "concept", question: "What is WiFi?", options: ["Wireless networking technology using radio frequencies", "Wireless network", "Radio networking", "Wireless standard"], correct: 0, explanation: "WiFi: wireless LAN. 802.11 standard. Frequencies 2.4GHz (more range), 5GHz (faster), 6GHz (newer). Security: WEP, WPA, WPA2, WPA3." },
  { id: 55, level: 3, category: "Wireless", type: "concept", question: "What is WPA2?", options: ["WiFi Protected Access 2 - strong WiFi encryption", "WiFi encryption", "Wireless security", "Protection standard"], correct: 0, explanation: "WPA2: strong WiFi security. AES encryption. Prevents eavesdropping. WPA3 newer. WEP old and broken." },
  { id: 56, level: 3, category: "Network Performance", type: "concept", question: "What is bandwidth?", options: ["Maximum data rate a connection can handle", "Data rate", "Connection speed", "Transfer capacity"], correct: 0, explanation: "Bandwidth: maximum throughput. Measured Mbps (megabits/sec). 1 Mbps connection can transfer 1 million bits/second." },
  { id: 57, level: 3, category: "Network Performance", type: "concept", question: "What is latency?", options: ["Delay in data transmission from source to destination", "Transfer delay", "Response time", "Communication delay"], correct: 0, explanation: "Latency: time for data to travel. Measured milliseconds (ms). Lower better. Affected by distance, routing, congestion." },
  { id: 58, level: 3, category: "Network Performance", type: "concept", question: "What is jitter?", options: ["Variation in latency causing packet delay inconsistency", "Latency variation", "Delay variation", "Inconsistency"], correct: 0, explanation: "Jitter: inconsistent latency. Some packets fast, some slow. Bad for video/voice. Caused by congestion, routing changes." },
  { id: 59, level: 3, category: "Network Performance", type: "concept", question: "What is throughput?", options: ["Actual data rate achieved, different from bandwidth", "Actual speed", "Real rate", "Achieved speed"], correct: 0, explanation: "Throughput: actual data transferred. Less than bandwidth due to overhead, congestion, errors. Measured after-the-fact." },
  { id: 60, level: 3, category: "Network Performance", type: "concept", question: "What is packet loss?", options: ["Packets failing to reach destination due to network issues", "Dropped packets", "Lost data", "Missing packets"], correct: 0, explanation: "Packet loss: packets not delivered. Causes retransmission, slowness. Acceptable <1%. Caused by congestion, hardware failure." },
  { id: 61, level: 3, category: "ICMP", type: "concept", question: "What is ICMP?", options: ["Internet Control Message Protocol for diagnostics like ping", "Control protocol", "Diagnostic protocol", "Message protocol"], correct: 0, explanation: "ICMP: Layer 3 protocol for echo (ping), unreachable, time exceeded. Tools: ping (connectivity), traceroute (path), MTU discovery." },
  { id: 62, level: 3, category: "ICMP", type: "concept", question: "What is ping?", options: ["Sends ICMP echo request to test connectivity", "Connectivity test", "Response test", "Connection check"], correct: 0, explanation: "Ping: ICMP echo request. Tests if host reachable. Shows latency. Command: ping google.com. Indicates response time." },
  { id: 63, level: 3, category: "Troubleshooting", type: "concept", question: "What is traceroute?", options: ["Shows path packets take from source to destination", "Path discovery", "Route tracing", "Hop display"], correct: 0, explanation: "Traceroute: ICMP TTL-based tool. Shows each hop to destination. Identifies where connectivity breaks. Linux/Mac: traceroute, Windows: tracert." },
  { id: 64, level: 3, category: "Troubleshooting", type: "concept", question: "What is netstat?", options: ["Shows active network connections and statistics", "Connection stats", "Network statistics", "Connection display"], correct: 0, explanation: "Netstat: displays active connections, listening ports, statistics. Command: netstat -an (all connections), netstat -tuln (listening ports)." },
  { id: 65, level: 3, category: "Troubleshooting", type: "concept", question: "What is ipconfig/ifconfig?", options: ["Shows local network configuration and IP settings", "Network config", "IP display", "Configuration tool"], correct: 0, explanation: "Windows: ipconfig (IP config). Linux/Mac: ifconfig (interface config). Shows IP, MAC, subnet mask, gateway, DNS servers." },
  { id: 66, level: 3, category: "QoS", type: "concept", question: "What is QoS?", options: ["Quality of Service prioritizing traffic based on needs", "Traffic prioritization", "Service quality", "Priority system"], correct: 0, explanation: "QoS: prioritizes critical traffic (video, VoIP). Limits bandwidth to non-critical. Ensures performance for important applications." },
  { id: 67, level: 3, category: "DDoS", type: "concept", question: "What is DDoS attack?", options: ["Distributed Denial of Service overwhelming with traffic", "Distributed attack", "Denial attack", "Overload attack"], correct: 0, explanation: "DDoS: multiple sources flood target with traffic. Overwhelms server. Makes service unavailable. Botnets often used. Mitigation: CDN, firewalls, scrubbing." },
  { id: 68, level: 3, category: "DDoS", type: "concept", question: "What is mitigation for DDoS?", options: ["Rate limiting, geographic blocking, CDN, WAF", "Defense", "Protection", "Prevention"], correct: 0, explanation: "DDoS mitigation: rate limiting (cap requests), geographic filtering (block countries), CDN (distribute), WAF (web firewall), ISP filtering." },
  { id: 69, level: 3, category: "SSL/TLS", type: "concept", question: "What is certificate pinning?", options: ["Hardcoding certificate to prevent MITM attacks", "Certificate security", "Pin validation", "Attack prevention"], correct: 0, explanation: "Certificate pinning: app hardcodes expected certificate. Prevents attacker using different cert. Good for security, adds complexity." },
  { id: 70, level: 3, category: "SSL/TLS", type: "concept", question: "What is MITM attack?", options: ["Man-in-the-Middle intercepting communication between parties", "Interception attack", "Eavesdropping", "Interception"], correct: 0, explanation: "MITM: attacker intercepts between client-server. Reads/modifies data. HTTPS/encryption prevents this. Certificate validation important." },
  { id: 71, level: 3, category: "BGP", type: "concept", question: "What is BGP?", options: ["Border Gateway Protocol for internet routing between ASes", "Routing protocol", "Internet routing", "Autonomous system protocol"], correct: 0, explanation: "BGP: exterior gateway protocol. Routes between Autonomous Systems (ISPs). Determines internet paths. Complex, policy-based." },
  { id: 72, level: 3, category: "OSPF", type: "concept", question: "What is OSPF?", options: ["Open Shortest Path First routing protocol within AS", "Interior routing", "Dynamic routing", "Path protocol"], correct: 0, explanation: "OSPF: interior gateway protocol. Link-state routing. Finds shortest path. Faster convergence than RIP. Used within organizations." },
  { id: 73, level: 3, category: "IP Multicast", type: "concept", question: "What is multicast?", options: ["One-to-many communication to multiple recipients simultaneously", "One-to-many", "Group communication", "Broadcast variant"], correct: 0, explanation: "Multicast: one sender to multiple receivers. Efficient for video streaming, audio. Group addresses 224.0.0.0-239.255.255.255. Less common than unicast." },
  { id: 74, level: 3, category: "Network Optimization", type: "concept", question: "What is compression?", options: ["Reducing data size before transmission to save bandwidth", "Data reduction", "Size reduction", "Data optimization"], correct: 0, explanation: "Compression: reduces file size. Lossless (data intact) or lossy (quality reduced). Saves bandwidth. Tools: gzip, brotli for web." },
  { id: 75, level: 3, category: "Network Optimization", type: "concept", question: "What is caching?", options: ["Storing copies locally to serve faster on repeated requests", "Data storage", "Speed optimization", "Storage technique"], correct: 0, explanation: "Caching: stores frequently accessed data locally. Reduces latency, bandwidth. Examples: browser cache, CDN, DNS cache." },
  { id: 76, level: 3, category: "Network Optimization", type: "concept", question: "What is CDN?", options: ["Content Delivery Network using edge servers worldwide", "Content network", "Distribution network", "Delivery system"], correct: 0, explanation: "CDN: geographically distributed servers. Serves content from nearest edge. Reduces latency, bandwidth. Providers: Cloudflare, Akamai, AWS CloudFront." },
  { id: 77, level: 3, category: "Network Architecture", type: "concept", question: "What is mesh network?", options: ["Each node connects to multiple others enabling redundancy", "Redundant network", "Full connection", "Resilient topology"], correct: 0, explanation: "Mesh: nodes interconnected. Full mesh (all connected), partial mesh (strategic connections). Resilient but complex." },
  { id: 78, level: 3, category: "Network Architecture", type: "concept", question: "What is star topology?", options: ["Central device connecting all others like a star", "Centralized network", "Hub-based", "Central topology"], correct: 0, explanation: "Star: central hub/switch. All devices connect to center. Single point of failure but easy management. Modern LANs use this." },
  { id: 79, level: 3, category: "Network Architecture", type: "concept", question: "What is ring topology?", options: ["Devices connected in circle, data flows in one direction", "Circular network", "Sequential topology", "Loop topology"], correct: 0, explanation: "Ring: devices in circle. Data flows one direction. Failure breaks network. Rarely used today. Historical interest." },
  { id: 80, level: 3, category: "Cloud Networking", type: "concept", question: "What is cloud networking?", options: ["Network infrastructure in cloud for virtual resources", "Cloud network", "Virtual networking", "Infrastructure as Code"], correct: 0, explanation: "Cloud networking: VPCs, subnets, security groups in cloud. Software-defined. Elasticity, flexibility, scalability." },
  { id: 81, level: 3, category: "Cloud Networking", type: "concept", question: "What is software-defined networking?", options: ["Separating network control from forwarding for programmability", "Programmable network", "Control abstraction", "Network programming"], correct: 0, explanation: "SDN: control plane separated from data plane. Centralized management. OpenFlow protocol. Greater flexibility than hardware switches." },
  { id: 82, level: 3, category: "5G", type: "concept", question: "What is 5G?", options: ["Fifth generation cellular technology with high speed and low latency", "Mobile technology", "Wireless standard", "Next-gen cellular"], correct: 0, explanation: "5G: next cellular standard. Gigabit speeds, low latency <1ms. Enables IoT, autonomous vehicles. Millimeter wave frequencies." },
  { id: 83, level: 3, category: "IoT Networking", type: "concept", question: "What is IoT networking?", options: ["Connecting devices like sensors for data collection", "Device connection", "Sensor network", "Connected devices"], correct: 0, explanation: "IoT: Internet of Things. Billions of devices connected. Sensors, cameras, smart devices. Protocols: Bluetooth, Zigbee, LoRaWAN." },
  { id: 84, level: 3, category: "Network Security", type: "concept", question: "What is intrusion detection?", options: ["Monitoring network for suspicious activity and attacks", "Attack detection", "Security monitoring", "Threat detection"], correct: 0, explanation: "IDS: analyzes traffic for attacks. Alerts on suspicious. Network-based (NIDS) or host-based (HIDS). Snort, Suricata popular." },
  { id: 85, level: 3, category: "Network Security", type: "concept", question: "What is intrusion prevention?", options: ["Active blocking of detected attacks", "Attack blocking", "Defense system", "Active protection"], correct: 0, explanation: "IPS: IDS + active blocking. Stops attacks automatically. Prevents exploitation. Balances security vs false positives." },
  { id: 86, level: 3, category: "Network Security", type: "concept", question: "What is VPN security?", options: ["Encryption, authentication preventing unauthorized access", "Privacy", "Secure tunneling", "Protected connection"], correct: 0, explanation: "VPN security: encrypts all data, hides IP, authenticates users. Prevents snooping. Public WiFi protection. Remote access security." },
  { id: 87, level: 3, category: "Network Monitoring", type: "concept", question: "What is packet sniffing?", options: ["Capturing packets to analyze network traffic", "Traffic analysis", "Packet capture", "Network analysis"], correct: 0, explanation: "Packet sniffing: tools (tcpdump, Wireshark) capture packets. Useful for troubleshooting, security analysis. Unencrypted data visible." },
  { id: 88, level: 3, category: "Network Monitoring", type: "concept", question: "What is flow analysis?", options: ["Analyzing traffic patterns and flows for insights", "Traffic pattern", "Flow metrics", "Pattern analysis"], correct: 0, explanation: "Flow analysis: examines data flows. Source, destination, ports, bytes. Identifies bandwidth consumers, anomalies, threats." },
  { id: 89, level: 3, category: "Network Standards", type: "concept", question: "What is Ethernet?", options: ["Wired networking standard for LANs (802.3)", "Wired standard", "LAN technology", "Connection standard"], correct: 0, explanation: "Ethernet: wired LAN standard. Speeds: 10 Mbps (older), 1 Gbps (common), 10 Gbps (new). Cat5/Cat6 cables. Dominant wired standard." },
  { id: 90, level: 3, category: "Network Standards", type: "concept", question: "What is network future?", options: ["6G, advanced SDN, AI-driven networks, quantum security", "Next technology", "Evolution", "Advancement"], correct: 0, explanation: "Network future: 6G research, AI for optimization, quantum cryptography, edge computing expansion. Continually evolving to meet demands." }
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
  if (accuracy >= 90) mastery = 'Network Master Engineer';
  else if (accuracy >= 80) mastery = 'Senior Network Expert';
  else if (accuracy >= 70) mastery = 'Network Professional';
  else if (accuracy >= 60) mastery = 'Network Learner';
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
        You've completed all 90 comprehensive networking lessons covering fundamentals, OSI model, TCP/IP, DNS, HTTP/HTTPS, routing, security, wireless, performance, troubleshooting, and more. You're now a networking master!
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
