<?php
$currentPage = 'messages';
$pageTitle = 'Voice Messages';
$topbarTitle = 'Voice <span>Messages</span>';
include 'header.php';
?>
<div class="page">
  <div class="section-hd">
    <div><h2>Voice <em>Messages</em></h2><p>Recorded messages between family and Muhammad</p></div>
    <button class="btn-primary" onclick="showToast('🎤 Opening voice recorder…')">🎤 Record message</button>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="timeline">
        <div class="tl-item">
          <div class="tl-dot navy">📩</div>
          <div class="tl-content">
            <h4>From Muhammad → Tariq</h4>
            <p>"Beta, I had a good day. The weather is nice today. Don't forget to call your mother on Sunday."</p>
            <div style="margin-top:8px;display:flex;gap:8px;"><button class="btn-ghost" style="padding:5px 14px;font-size:11px;" onclick="showToast('▶️ Playing message…')">▶ Play</button><span class="chip navy">0:18</span></div>
          </div>
          <div class="tl-time">Today 6:30 PM</div>
        </div>
        <div class="tl-item">
          <div class="tl-dot gold">📤</div>
          <div class="tl-content">
            <h4>From Tariq → Muhammad</h4>
            <p>"Abba jee, I'll come by Saturday morning. I'm bringing halwa. The AI will remind you I'm coming Friday night."</p>
            <div style="margin-top:8px;display:flex;gap:8px;"><button class="btn-ghost" style="padding:5px 14px;font-size:11px;" onclick="showToast('▶️ Playing message…')">▶ Play</button><span class="chip navy">0:24</span></div>
          </div>
          <div class="tl-time">Yesterday 9:10 PM</div>
        </div>
        <div class="tl-item">
          <div class="tl-dot green">📩</div>
          <div class="tl-content">
            <h4>From Sarah → Muhammad</h4>
            <p>"Baba, I saw your activity today — so proud you haven't missed a single check-in this month! Love you."</p>
            <div style="margin-top:8px;display:flex;gap:8px;"><button class="btn-ghost" style="padding:5px 14px;font-size:11px;" onclick="showToast('▶️ Playing message…')">▶ Play</button><span class="chip navy">0:20</span></div>
          </div>
          <div class="tl-time">2 days ago</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';
