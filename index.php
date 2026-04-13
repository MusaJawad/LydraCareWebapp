<?php
$currentPage = 'dashboard';
$pageTitle = 'Dashboard';
$topbarTitle = 'Good morning, <span>Tariq</span> 👋';
include 'header.php';
?>
<div class="page">
  <div class="voice-session" style="margin-bottom:20px;">
    <div class="vs-label">Today's Morning Check-in · 8:14 AM</div>
    <div class="vs-quote">"Good morning! I had a good sleep. My knee is a little sore but I feel fine. Did you see the hockey game last night?"</div>
    <div class="vs-meta">
      <div class="vs-tag">😊 Mood: <span>Good</span></div>
      <div class="vs-tag">🗣️ Duration: <span>4m 12s</span></div>
      <div class="vs-tag">💊 Meds: <span>Confirmed ✓</span></div>
      <div class="vs-tag">🧠 Cognition: <span>Normal</span></div>
    </div>
  </div>
  <div class="stat-grid">
    <div class="stat-card green">
      <div class="stat-icon">💊</div>
      <div class="stat-val">94%</div>
      <div class="stat-label">Medication adherence this month</div>
      <div class="stat-trend up">↑ Up from 88% last month</div>
    </div>
    <div class="stat-card gold">
      <div class="stat-icon">🗣️</div>
      <div class="stat-val">14</div>
      <div class="stat-label">Check-in streak (days)</div>
      <div class="stat-trend up">↑ Longest streak yet</div>
    </div>
    <div class="stat-card rust">
      <div class="stat-icon">⚠️</div>
      <div class="stat-val">2</div>
      <div class="stat-label">Unread alerts today</div>
      <div class="stat-trend warn">Needs your attention</div>
    </div>
    <div class="stat-card navy">
      <div class="stat-icon">👨‍👩‍👧</div>
      <div class="stat-val">4</div>
      <div class="stat-label">Family members connected</div>
      <div class="stat-trend up">✓ All active this week</div>
    </div>
  </div>
  <div class="content-grid">
    <div>
      <div class="card" style="margin-bottom:20px;">
        <div class="card-head">
          <div><h3>Today's Activity</h3><p>Sunday, March 29 · All events</p></div>
          <a class="btn-ghost" href="activity.php">See all</a>
        </div>
        <div class="card-body">
          <div class="timeline">
            <div class="tl-item">
              <div class="tl-dot green">🌅</div>
              <div class="tl-content">
                <h4>Morning check-in completed</h4>
                <p>4 min 12 sec session. Mood: good. Mentioned knee soreness. Meds confirmed.</p>
              </div>
              <div class="tl-time">8:14 AM</div>
            </div>
            <div class="tl-item">
              <div class="tl-dot green">💊</div>
              <div class="tl-content">
                <h4>Medication confirmed — Metformin 500mg</h4>
                <p>Verbally confirmed during check-in. Logged automatically.</p>
              </div>
              <div class="tl-time">8:16 AM</div>
            </div>
            <div class="tl-item">
              <div class="tl-dot gold">☕</div>
              <div class="tl-content">
                <h4>App activity — conversation mode</h4>
                <p>"Tell me about today's news" — 6 min session.</p>
              </div>
              <div class="tl-time">9:32 AM</div>
            </div>
            <div class="tl-item">
              <div class="tl-dot rust">⚠️</div>
              <div class="tl-content">
                <h4>Afternoon reminder missed</h4>
                <p>2:00 PM Lisinopril reminder — no response after 3 attempts.</p>
              </div>
              <div class="tl-time">2:24 PM</div>
            </div>
            <div class="tl-item">
              <div class="tl-dot navy">📞</div>
              <div class="tl-content">
                <h4>Video call — Sarah Khan (daughter)</h4>
                <p>11 min 40 sec call. Initiated by family.</p>
              </div>
              <div class="tl-time">4:05 PM</div>
            </div>
            <div class="tl-item">
              <div class="tl-dot green">🌙</div>
              <div class="tl-content">
                <h4>Evening check-in completed</h4>
                <p>2 min 8 sec session. Mood: relaxed. Night meds confirmed.</p>
              </div>
              <div class="tl-time">8:45 PM</div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-head">
          <div><h3>Mood — Last 7 Days</h3><p>Based on voice tone analysis</p></div>
          <span class="chip green">😊 Trending good</span>
        </div>
        <div class="card-body">
          <div class="mood-track">
            <div class="mood-bar-wrap"><div class="mood-bar great" style="height:70%"></div><div class="mood-day">Mon</div></div>
            <div class="mood-bar-wrap"><div class="mood-bar great" style="height:80%"></div><div class="mood-day">Tue</div></div>
            <div class="mood-bar-wrap"><div class="mood-bar good"  style="height:55%"></div><div class="mood-day">Wed</div></div>
            <div class="mood-bar-wrap"><div class="mood-bar low"   style="height:35%"></div><div class="mood-day">Thu</div></div>
            <div class="mood-bar-wrap"><div class="mood-bar great" style="height:75%"></div><div class="mood-day">Fri</div></div>
            <div class="mood-bar-wrap"><div class="mood-bar great" style="height:85%"></div><div class="mood-day">Sat</div></div>
            <div class="mood-bar-wrap"><div class="mood-bar great" style="height:72%"></div><div class="mood-day">Sun</div></div>
          </div>
          <div style="display:flex;gap:12px;margin-top:12px;flex-wrap:wrap;">
            <div style="display:flex;align-items:center;gap:5px;font-size:11px;color:var(--muted)"><div style="width:10px;height:10px;border-radius:2px;background:var(--sage)"></div>Great</div>
            <div style="display:flex;align-items:center;gap:5px;font-size:11px;color:var(--muted)"><div style="width:10px;height:10px;border-radius:2px;background:var(--sage-m)"></div>Good</div>
            <div style="display:flex;align-items:center;gap:5px;font-size:11px;color:var(--muted)"><div style="width:10px;height:10px;border-radius:2px;background:var(--gold)"></div>Low</div>
            <div style="display:flex;align-items:center;gap:5px;font-size:11px;color:var(--muted)"><div style="width:10px;height:10px;border-radius:2px;background:var(--rust)"></div>Sad</div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="card" style="margin-bottom:16px;">
        <div class="card-head">
          <div><h3>Active Alerts</h3><p>Needs your attention</p></div>
          <span class="chip rust">2 new</span>
        </div>
        <div class="card-body">
          <div class="alert-list">
            <div class="alert-item critical" onclick="showToast('📞 Calling Muhammad to check on medication…')">
              <div class="alert-icon">💊</div>
              <div class="alert-content">
                <h4>Missed medication</h4>
                <p>Lisinopril 2:00 PM — no response to 3 reminders</p>
              </div>
              <div class="alert-time">2:24 PM</div>
            </div>
            <div class="alert-item warning" onclick="showToast('🔍 Opening activity log…')">
              <div class="alert-icon">😐</div>
              <div class="alert-content">
                <h4>Lower mood detected</h4>
                <p>Thursday session showed signs of mild sadness</p>
              </div>
              <div class="alert-time">Yesterday</div>
            </div>
            <div class="alert-item info">
              <div class="alert-icon">✅</div>
              <div class="alert-content">
                <h4>Check-in streak: 14 days</h4>
                <p>Muhammad has checked in every day this month</p>
              </div>
              <div class="alert-time">Today</div>
            </div>
          </div>
        </div>
      </div>
      <div class="card" style="margin-bottom:16px;">
        <div class="card-head">
          <div><h3>Medications Today</h3></div>
          <a class="btn-ghost" href="medications.php">Manage</a>
        </div>
        <div class="card-body">
          <div class="med-row">
            <div class="med-name"><h4>Metformin 500mg</h4><p>Breakfast</p></div>
            <span class="med-status taken">✓ Taken</span>
            <span class="med-time">8:16 AM</span>
          </div>
          <div class="med-row">
            <div class="med-name"><h4>Lisinopril 10mg</h4><p>Lunch</p></div>
            <span class="med-status missed">✗ Missed</span>
            <span class="med-time">2:00 PM</span>
          </div>
          <div class="med-row">
            <div class="med-name"><h4>Aspirin 81mg</h4><p>Dinner</p></div>
            <span class="med-status pending">⏳ Due</span>
            <span class="med-time">7:00 PM</span>
          </div>
          <div class="med-row">
            <div class="med-name"><h4>Atorvastatin 20mg</h4><p>Bedtime</p></div>
            <span class="med-status pending">⏳ Due</span>
            <span class="med-time">9:00 PM</span>
          </div>
        </div>
      </div>
      <div class="call-strip" onclick="showToast('📹 Starting video call with Muhammad…')">
        <div class="call-icon">📹</div>
        <div class="call-info">
          <h4>Start video call</h4>
          <p>Muhammad's app is active now</p>
        </div>
        <div class="call-cta">Call now →</div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';
