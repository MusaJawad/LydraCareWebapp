let toastTimer;
function showToast(msg) {
  const toast = document.getElementById('toast');
  if (!toast) return;
  document.getElementById('toastMsg').textContent = msg;
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 3000);
}
function openSOS() { document.getElementById('sosModal')?.classList.add('open'); }
function openQR() { document.getElementById('qrModal')?.classList.add('open'); }
function closeModal(id) { document.getElementById(id)?.classList.remove('open'); }
function triggerSOS() {
  closeModal('sosModal');
  showToast('🚨 SOS activated — calling Muhammad and alerting family…');
}
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('open');
  });
});
setTimeout(() => {
  document.querySelectorAll('.hm-fill').forEach(bar => {
    const w = bar.style.width;
    bar.style.width = '0%';
    setTimeout(() => bar.style.width = w, 100);
  });
}, 400);
