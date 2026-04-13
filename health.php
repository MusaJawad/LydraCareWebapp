<?php
$currentPage = 'health';
$pageTitle = 'Health Insights';
$topbarTitle = 'Health <span>Insights</span>';
include 'header.php';
?>
<div class="page">
  <div class="section-hd">
    <div><h2>Health <em>Insights</em></h2><p>Weekly summary · March 22–29, 2026</p></div>
    <button class="btn-ghost" onclick="showToast('📊 Generating PDF report for Dr. Malik…')">📊 Send to doctor</button>
  </div>
  <div class="content-grid">
    <div>
      <div class="card" style="margin-bottom:20px;">
        <div class="card-head"><h3>Wellness Indicators</h3><p>Based on voice sessions and activity patterns</p></div>
        <div class="card-body">
          <div class="health-metric"><div class="hm-row"><span class="hm-label">Medication adherence</span><span class="hm-val">94%</span></div><div class="hm-bar"><div class="hm-fill green" style="width:94%"></div></div></div>
          <div class="health-metric"><div class="hm-row"><span class="hm-label">Check-in consistency</span><span class="hm-val">100%</span></div><div class="hm-bar"><div class="hm-fill green" style="width:100%"></div></div></div>
          <div class="health-metric"><div class="hm-row"><span class="hm-label">Average mood score</span><span class="hm-val">74%</span></div><div class="hm-bar"><div class="hm-fill green" style="width:74%"></div></div></div>
          <div class="health-metric"><div class="hm-row"><span class="hm-label">Social engagement</span><span class="hm-val">68%</span></div><div class="hm-bar"><div class="hm-fill gold" style="width:68%"></div></div></div>
          <div class="health-metric"><div class="hm-row"><span class="hm-label">Cognitive exercise completion</span><span class="hm-val">55%</span></div><div class="hm-bar"><div class="hm-fill gold" style="width:55%"></div></div></div>
        </div>
      </div>
      <div class="card">
        <div class="card-head"><h3>AI Weekly Summary</h3><p>Generated from this week's sessions</p></div>
        <div class="card-body">
          <div class="voice-session" style="margin:0;">
            <div class="vs-label">LYDRA Care AI · Weekly Digest</div>
            <div class="vs-quote">"Muhammad had a positive week overall. His medication adherence improved to 94% — up from 88% last month. One missed Lisinopril dose on Sunday afternoon. He expressed some homesickness on Thursday (mention of Lahore) which resolved by Friday. Family contact was strong — 3 video calls and 4 voice messages exchanged. Recommend following up on the knee pain he mentioned on Monday and Sunday."</div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="card" style="margin-bottom:16px;">
        <div class="card-head"><h3>This Week at a Glance</h3></div>
        <div class="card-body">
          <div class="med-row"><div class="med-name"><h4>Total sessions</h4></div><strong>14</strong></div>
          <div class="med-row"><div class="med-name"><h4>Avg session length</h4></div><strong>3m 42s</strong></div>
          <div class="med-row"><div class="med-name"><h4>Meds taken on time</h4></div><strong>26 / 28</strong></div>
          <div class="med-row"><div class="med-name"><h4>Video calls</h4></div><strong>3 calls</strong></div>
          <div class="med-row"><div class="med-name"><h4>Brain exercises</h4></div><strong>4 sessions</strong></div>
          <div class="med-row"><div class="med-name"><h4>Stories / companion</h4></div><strong>6 sessions</strong></div>
        </div>
      </div>
      <div class="card">
        <div class="card-head"><h3>Upcoming</h3></div>
        <div class="card-body">
          <div class="tl-item" style="border:none;padding:8px 0"><div class="tl-dot gold">🏥</div><div class="tl-content"><h4>Dr. Malik appointment</h4><p>Friday, April 3 · 10:30 AM</p></div></div>
          <div class="tl-item" style="border:none;padding:8px 0"><div class="tl-dot green">💊</div><div class="tl-content"><h4>Metformin refill due</h4><p>In 8 days</p></div></div>
          <div class="tl-item" style="border:none;padding:8px 0;border-top:1px solid var(--warm)"><div class="tl-dot navy">👨</div><div class="tl-content"><h4>Tariq visiting</h4><p>Saturday, April 5 · Morning</p></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';
