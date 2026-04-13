  </main>
</div>
<div class="modal-overlay" id="sosModal">
  <div class="modal">
    <h3>🚨 SOS — Emergency Protocol</h3>
    <p>This will immediately call Muhammad's phone, send your location to all family members, and if no response within 60 seconds, notify emergency contacts.</p>
    <div class="modal-actions">
      <button class="btn-ghost" onclick="closeModal('sosModal')">Cancel</button>
      <button class="btn-primary" style="background:var(--rust)" onclick="triggerSOS()">🚨 Confirm SOS</button>
    </div>
  </div>
</div>
<div class="modal-overlay" id="qrModal">
  <div class="modal" style="text-align:center">
    <h3>📲 Share Care Circle QR</h3>
    <p>Family members scan this with their phone camera. They'll be guided to create an account and instantly join Muhammad's care circle.</p>
    <div style="background:var(--cream);border-radius:16px;padding:24px;display:inline-block;margin:8px 0 20px;">
      <svg width="120" height="120" viewBox="0 0 66 66">
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
    <div style="display:flex;gap:8px;justify-content:center;flex-wrap:wrap;margin-bottom:20px;">
      <button class="btn-primary" onclick="showToast('📥 PDF downloading…');closeModal('qrModal')">↓ Download PDF card</button>
      <button class="btn-ghost" onclick="showToast('🔗 Link copied!');closeModal('qrModal')">📋 Copy link</button>
    </div>
    <div class="modal-actions" style="justify-content:center">
      <button class="btn-ghost" onclick="closeModal('qrModal')">Close</button>
    </div>
  </div>
</div>
<div class="toast" id="toast">
  <span class="toast-icon" id="toastIcon">✓</span>
  <span id="toastMsg">Action completed</span>
</div>
<script src="assets/script.js"></script>
</body>
</html>
