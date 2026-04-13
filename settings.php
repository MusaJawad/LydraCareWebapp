<?php
$currentPage = 'settings';
$pageTitle = 'Settings';
$topbarTitle = 'App <span>Settings</span>';
include 'header.php';
?>
<div class="page">
  <div class="section-hd">
    <div><h2>App <em>Settings</em></h2><p>Configure LYDRA Care for Muhammad</p></div>
  </div>
  <div class="content-grid">
    <div>
      <div class="card" style="margin-bottom:20px;">
        <div class="card-head"><h3>Senior Profile</h3></div>
        <div class="card-body">
          <div class="med-row"><div class="med-name"><h4>Full name</h4><p>Shown to AI for personalisation</p></div><span style="font-size:13px;color:var(--navy)">Muhammad Khan</span></div>
          <div class="med-row"><div class="med-name"><h4>Age</h4></div><span style="font-size:13px;color:var(--navy)">78 years</span></div>
          <div class="med-row"><div class="med-name"><h4>Language</h4></div><span class="chip green">English</span></div>
          <div class="med-row"><div class="med-name"><h4>Check-in time (AM)</h4></div><span style="font-size:13px;color:var(--navy)">8:00 AM</span></div>
          <div class="med-row"><div class="med-name"><h4>Voice speed</h4></div><span class="chip navy">Slower (0.85×)</span></div>
          <div style="margin-top:16px;"><button class="btn-primary" onclick="showToast('💾 Profile saved successfully')">Save changes</button></div>
        </div>
      </div>
      <div class="card">
        <div class="card-head"><h3>Notification Preferences</h3></div>
        <div class="card-body">
          <div class="med-row"><div class="med-name"><h4>Missed medication alerts</h4></div><span class="chip green">✓ On</span></div>
          <div class="med-row"><div class="med-name"><h4>Mood change alerts</h4></div><span class="chip green">✓ On</span></div>
          <div class="med-row"><div class="med-name"><h4>Daily digest email</h4></div><span class="chip green">✓ On</span></div>
          <div class="med-row"><div class="med-name"><h4>SOS push notification</h4></div><span class="chip green">✓ On (immediate)</span></div>
          <div class="med-row"><div class="med-name"><h4>Weekly health report</h4></div><span class="chip navy">Every Sunday</span></div>
        </div>
      </div>
    </div>
    <div>
      <div class="card" style="margin-bottom:16px;">
        <div class="card-head"><h3>Remote App Controls</h3></div>
        <div class="card-body">
          <div class="alert-item info" style="margin-bottom:8px;cursor:pointer" onclick="showToast('🔄 Restart command sent to Muhammad\'s phone…')">
            <div class="alert-icon">🔄</div>
            <div class="alert-content"><h4>Restart app remotely</h4><p>If app is frozen or unresponsive</p></div>
          </div>
          <div class="alert-item info" style="margin-bottom:8px;cursor:pointer" onclick="showToast('🔔 Permission repair prompt sent to Muhammad\'s phone…')">
            <div class="alert-icon">🔧</div>
            <div class="alert-content"><h4>Fix permissions</h4><p>Microphone or notifications issue</p></div>
          </div>
          <div class="alert-item warning" style="cursor:pointer" onclick="showToast('📲 App update sent to Muhammad\'s phone…')">
            <div class="alert-icon">📲</div>
            <div class="alert-content"><h4>Push app update</h4><p>Latest version available</p></div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-head"><h3>Subscription</h3></div>
        <div class="card-body">
          <div class="med-row"><div class="med-name"><h4>Plan</h4></div><span class="chip green">Companion — $29/mo</span></div>
          <div class="med-row"><div class="med-name"><h4>Next billing</h4></div><span style="font-size:13px;color:var(--muted)">April 1, 2026</span></div>
          <div class="med-row"><div class="med-name"><h4>Trial ends</h4></div><span class="chip navy">Active subscriber</span></div>
          <div style="margin-top:16px;display:flex;gap:8px;"><button class="btn-ghost" onclick="showToast('💳 Opening billing portal…')">Manage billing</button><button class="btn-ghost" onclick="showToast('📋 Opening plan comparison…')">Upgrade to Clinical</button></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';
