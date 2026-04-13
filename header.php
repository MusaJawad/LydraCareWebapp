<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/auth.php';

// Require login for all pages except login/register
$publicPages = ['login.php', 'register.php'];
$currentFile = basename($_SERVER['PHP_SELF']);
if (!in_array($currentFile, $publicPages)) {
    requireLogin();
}

if (!isset($currentPage)) {
    $currentPage = 'dashboard';
}
if (!isset($pageTitle)) {
    $pageTitle = 'Dashboard';
}
if (!isset($topbarTitle)) {
    $userFirstName = explode(' ', getCurrentUserName() ?? 'User')[0];
    $topbarTitle = $currentPage === 'dashboard'
        ? 'Good morning, <span>' . htmlspecialchars($userFirstName) . '</span> 👋'
        : ucwords(str_replace('-', ' ', $pageTitle));
}

// Get senior info for display
$seniorId = getCurrentSeniorId();
$senior = null;
if ($seniorId) {
    $stmt = $pdo->prepare('SELECT id, full_name, age FROM lydra_seniors WHERE id = ?');
    $stmt->execute([$seniorId]);
    $senior = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LYDRA Care — <?php echo $pageTitle; ?></title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="app">
  <aside class="sidebar">
    <div class="sidebar-logo">
      <svg width="148" height="42" viewBox="0 0 148 42" fill="none">
        <rect x="4" y="4" width="5" height="28" fill="#5C7A5F"/>
        <rect x="4" y="28" width="22" height="5" fill="#5C7A5F"/>
        <path d="M 6.5 19 Q 6.5 8 15 8 Q 23.5 8 23.5 19" stroke="#C9A84C" stroke-width="2" fill="none" stroke-linecap="round"/>
        <circle cx="15" cy="6.5" r="3.5" fill="#C9A84C"/>
        <text x="36" y="21" font-family="'DM Sans',sans-serif" font-size="17" font-weight="600" fill="#F7F2EB" letter-spacing="2">LYDRA</text>
        <line x1="36" y1="25" x2="144" y2="25" stroke="#5C7A5F" stroke-width="0.6" opacity="0.5"/>
        <text x="37" y="36" font-family="Georgia,serif" font-size="10" fill="#5C7A5F" letter-spacing="8" font-style="italic">care</text>
      </svg>
    </div>
    <div class="sidebar-senior">
      <div class="senior-label">Monitoring</div>
      <div class="senior-card" onclick="showToast('👴 Senior profile…')">
        <div class="senior-avatar"><?php echo $senior ? strtoupper(substr($senior['full_name'], 0, 1) . substr(explode(' ', $senior['full_name'])[1] ?? '', 0, 1)) : 'SN'; ?></div>
        <div class="senior-info">
          <h4><?php echo $senior ? htmlspecialchars($senior['full_name']) : 'No senior'; ?></h4>
          <p><?php echo $senior ? htmlspecialchars($senior['age'] ?? '?') . ' yrs' : 'Not assigned'; ?></p>
        </div>
        <div class="senior-status"></div>
      </div>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-section-label">Main</div>
      <a href="index.php" class="nav-item <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
        <span class="nav-icon">🏠</span>
        <span class="nav-label">Dashboard</span>
      </a>
      <a href="activity.php" class="nav-item <?php echo $currentPage === 'activity' ? 'active' : ''; ?>">
        <span class="nav-icon">📋</span>
        <span class="nav-label">Activity Log</span>
      </a>
      <a href="medications.php" class="nav-item <?php echo $currentPage === 'medications' ? 'active' : ''; ?>">
        <span class="nav-icon">💊</span>
        <span class="nav-label">Medications</span>
        <span class="nav-badge">1</span>
      </a>
      <a href="alerts.php" class="nav-item <?php echo $currentPage === 'alerts' ? 'active' : ''; ?>">
        <span class="nav-icon">🔔</span>
        <span class="nav-label">Alerts</span>
        <span class="nav-badge">2</span>
      </a>
      <div class="nav-section-label">Connection</div>
      <a href="family.php" class="nav-item <?php echo $currentPage === 'family' ? 'active' : ''; ?>">
        <span class="nav-icon">👨‍👩‍👧</span>
        <span class="nav-label">Family Circle</span>
      </a>
      <a href="messages.php" class="nav-item <?php echo $currentPage === 'messages' ? 'active' : ''; ?>">
        <span class="nav-icon">💬</span>
        <span class="nav-label">Voice Messages</span>
      </a>
      <div class="nav-section-label">Insights</div>
      <a href="health.php" class="nav-item <?php echo $currentPage === 'health' ? 'active' : ''; ?>">
        <span class="nav-icon">❤️</span>
        <span class="nav-label">Health Insights</span>
      </a>
      <a href="settings.php" class="nav-item <?php echo $currentPage === 'settings' ? 'active' : ''; ?>">
        <span class="nav-icon">⚙️</span>
        <span class="nav-label">Settings</span>
      </a>
    </nav>
    <div class="sidebar-bottom">
      <div class="user-chip">
        <div class="user-chip-avatar">👤</div>
        <div class="user-chip-info">
          <h5><?php echo htmlspecialchars(explode(' ', getCurrentUserName() ?? 'User')[0]); ?></h5>
          <p><a href="logout.php" style="color:rgba(255,255,255,0.35);text-decoration:none;">Logout</a></p>
        </div>
      </div>
    </div>
  </aside>
  <main class="main">
    <div class="topbar">
      <div class="topbar-title" id="topbarTitle"><?php echo $topbarTitle; ?></div>
      <div class="topbar-actions">
        <button class="sos-trigger" onclick="openSOS()">🚨 SOS</button>
        <button class="icon-btn" onclick="showToast('📞 Starting video call with Muhammad…')">📞</button>
        <a class="icon-btn" href="alerts.php">🔔<div class="dot"></div></a>
      </div>
    </div>
