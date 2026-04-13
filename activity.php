<?php
$currentPage = 'activity';
$pageTitle = 'Activity Log';
$topbarTitle = 'Activity <span>Log</span>';
include 'header.php';
?>
<div class="page">
  <div class="section-hd">
    <div><h2>Activity <em>Log</em></h2><p>Complete history of Muhammad's daily interactions</p></div>
    <button class="btn-ghost" onclick="showToast('↓ Exporting activity PDF…')">↓ Export PDF</button>
  </div>
  <div class="card">
    <div class="card-head">
      <div><h3>All Sessions — March 2026</h3></div>
      <span class="chip green">29 check-ins this month</span>
    </div>
    <div class="card-body">
      <div class="timeline">
        <div class="tl-item"><div class="tl-dot green">🌅</div><div class="tl-content"><h4>Morning check-in — 4m 12s</h4><p>Mood: good. Mentioned knee pain. Confirmed Metformin. Talked about hockey.</p></div><div class="tl-time">Today 8:14 AM</div></div>
        <div class="tl-item"><div class="tl-dot gold">☕</div><div class="tl-content"><h4>Companion mode — 6m 03s</h4><p>Requested news summary. Asked about Ramadan schedule.</p></div><div class="tl-time">Today 9:32 AM</div></div>
        <div class="tl-item"><div class="tl-dot navy">📞</div><div class="tl-content"><h4>Video call — Sarah (11m 40s)</h4><p>Family-initiated. Muhammad appeared happy, laughing.</p></div><div class="tl-time">Today 4:05 PM</div></div>
        <div class="tl-item"><div class="tl-dot green">🌙</div><div class="tl-content"><h4>Evening check-in — 2m 08s</h4><p>Mood: relaxed. Confirmed night meds. Plans to watch TV.</p></div><div class="tl-time">Today 8:45 PM</div></div>
        <div class="tl-item"><div class="tl-dot green">🌅</div><div class="tl-content"><h4>Morning check-in — 3m 45s</h4><p>Mood: low. Mentioned missing Lahore. Reminded about doctor appt Friday.</p></div><div class="tl-time">Yesterday 8:08 AM</div></div>
        <div class="tl-item"><div class="tl-dot rust">⚠️</div><div class="tl-content"><h4>Reminder escalated to family</h4><p>Lunch reminder unanswered for 25 minutes. Alert sent to Tariq.</p></div><div class="tl-time">Yesterday 1:28 PM</div></div>
        <div class="tl-item"><div class="tl-dot green">🧠</div><div class="tl-content"><h4>Brain exercise — 8m 22s</h4><p>Word recall game. Score: 8/10. Improvement over last week.</p></div><div class="tl-time">Yesterday 3:15 PM</div></div>
        <div class="tl-item"><div class="tl-dot gold">📖</div><div class="tl-content"><h4>Story session — 12m 01s</h4><p>Requested Islamic stories. 2 stories shared. Mood improved.</p></div><div class="tl-time">Sat 7:22 PM</div></div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';
