<?php
$currentPage = 'alerts';
$pageTitle = 'Alerts';
$topbarTitle = 'Alerts &amp; <span>Notifications</span>';
include 'header.php';
?>
<div class="page">
  <div class="section-hd">
    <div><h2>Alerts &amp; <em>Notifications</em></h2><p>All alerts requiring your attention</p></div>
    <button class="btn-ghost" onclick="showToast('✅ All alerts marked as read')">Mark all read</button>
  </div>
  <div class="alert-list">
    <div class="alert-item critical">
      <div class="alert-icon">💊</div>
      <div class="alert-content"><h4>Missed medication — Lisinopril 10mg</h4><p>2:00 PM reminder sent 3 times. No response. Muhammad may need a call.</p></div>
      <div class="alert-time">2:24 PM today</div>
    </div>
    <div class="alert-item warning">
      <div class="alert-icon">😐</div>
      <div class="alert-content"><h4>Low mood detected — Thursday session</h4><p>Voice analysis detected sadness. Muhammad mentioned missing home (Lahore).</p></div>
      <div class="alert-time">Yesterday</div>
    </div>
    <div class="alert-item info">
      <div class="alert-icon">🎉</div>
      <div class="alert-content"><h4>14-day check-in streak achieved</h4><p>Muhammad has had a morning check-in every day for 14 consecutive days.</p></div>
      <div class="alert-time">Today</div>
    </div>
    <div class="alert-item info">
      <div class="alert-icon">👨‍👩‍👧</div>
      <div class="alert-content"><h4>New family member joined</h4><p>Amir Khan (grandson) joined Muhammad's care circle via QR code.</p></div>
      <div class="alert-time">3 days ago</div>
    </div>
  </div>
</div>
<?php include 'footer.php';
