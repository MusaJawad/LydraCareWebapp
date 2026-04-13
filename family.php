<?php
$currentPage = 'family';
$pageTitle = 'Family Circle';
$topbarTitle = 'Family <span>Circle</span>';
include 'header.php';
?>
<div class="page">
  <div class="section-hd">
    <div><h2>Family <em>Circle</em></h2><p>Everyone connected to Muhammad's care</p></div>
    <button class="btn-primary" onclick="openQR()">📲 Share QR Code</button>
  </div>
  <div class="qr-card">
    <div class="qr-placeholder">
      <svg width="66" height="66" viewBox="0 0 66 66">
        <rect x="4" y="4" width="26" height="26" rx="3" fill="none" stroke="#1C2B3A" stroke-width="2"/>
        <rect x="10" y="10" width="14" height="14" rx="1" fill="#1C2B3A"/>
        <rect x="36" y="4" width="26" height="26" rx="3" fill="none" stroke="#1C2B3A" stroke-width="2"/>
        <rect x="42" y="10" width="14" height="14" rx="1" fill="#1C2B3A"/>
        <rect x="4" y="36" width="26" height="26" rx="3" fill="none" stroke="#1C2B3A" stroke-width="2"/>
        <rect x="10" y="42" width="14" height="14" rx="1" fill="#1C2B3A"/>
        <rect x="36" y="36" width="6" height="6" fill="#1C2B3A"/>
        <rect x="44" y="36" width="6" height="6" fill="#1C2B3A"/>
        <rect x="52" y="36" width="10" height="6" fill="#1C2B3A"/>
        <rect x="36" y="44" width="10" height="6" fill="#1C2B3A"/>
        <rect x="50" y="44" width="12" height="6" fill="#1C2B3A"/>
        <rect x="36" y="52" width="6" height="10" fill="#1C2B3A"/>
        <rect x="46" y="52" width="16" height="6" fill="#1C2B3A"/>
      </svg>
    </div>
    <div class="qr-info">
      <h3>Muhammad's Care Circle QR</h3>
      <p>Share this QR code with family members. They scan it once to instantly join the care circle — no signup needed until after scanning.</p>
      <div class="qr-actions">
        <button class="qr-btn primary" onclick="showToast('📥 QR Card PDF downloading…')">↓ Download PDF card</button>
        <button class="qr-btn ghost" onclick="showToast('🔗 Link copied to clipboard!')">📋 Copy link</button>
        <button class="qr-btn ghost" onclick="showToast('🔄 New QR code generated. Old code is now invalid.')">🔄 Regenerate</button>
      </div>
    </div>
  </div>
  <div class="section-hd" style="margin-top:8px;">
    <div><h2>Connected <em>Members</em></h2><p>4 people in Muhammad's care circle</p></div>
  </div>
  <div class="family-grid">
    <div class="family-member" onclick="showToast('👤 Opening Tariq\'s profile…')">
      <div class="fm-avatar" style="background:linear-gradient(135deg,#5C7A5F,#3d5e40)">TK</div>
      <div class="fm-name">Tariq Khan</div>
      <div class="fm-rel">Son · Primary caregiver</div>
      <div class="fm-joined">👑 Account owner</div>
    </div>
    <div class="family-member" onclick="showToast('👤 Opening Sarah\'s profile…')">
      <div class="fm-avatar" style="background:linear-gradient(135deg,#C9A84C,#a07e2a)">SK</div>
      <div class="fm-name">Sarah Khan</div>
      <div class="fm-rel">Daughter · Toronto</div>
      <div class="fm-joined">✓ Joined 3 weeks ago</div>
    </div>
    <div class="family-member" onclick="showToast('👤 Opening Amir\'s profile…')">
      <div class="fm-avatar" style="background:linear-gradient(135deg,#1C2B3A,#2d4459)">AK</div>
      <div class="fm-name">Amir Khan</div>
      <div class="fm-rel">Grandson · Calgary</div>
      <div class="fm-joined">✓ Joined 3 days ago</div>
    </div>
    <div class="family-member" onclick="showToast('👤 Opening Dr. Malik\'s profile…')">
      <div class="fm-avatar" style="background:linear-gradient(135deg,#C4622D,#9e4a20)">DM</div>
      <div class="fm-name">Dr. R. Malik</div>
      <div class="fm-rel">Physician · Read-only</div>
      <div class="fm-joined">✓ Joined 1 month ago</div>
    </div>
    <div class="family-member" style="border:2px dashed var(--warm);background:transparent;" onclick="openQR()">
      <div class="fm-avatar" style="background:var(--warm);color:var(--muted)">+</div>
      <div class="fm-name" style="color:var(--muted)">Add member</div>
      <div class="fm-rel">Share QR code</div>
      <div class="fm-joined" style="color:var(--sage)">+ Invite →</div>
    </div>
  </div>
</div>
<?php include 'footer.php';
