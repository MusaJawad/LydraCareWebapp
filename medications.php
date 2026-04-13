<?php
$currentPage = 'medications';
$pageTitle = 'Medications';
$topbarTitle = 'Medication <span>Manager</span>';
include 'header.php';

$seniorId = getCurrentSeniorId();
$medications = [];
$totalMeds = 0;
$totalAdherence = 0;

if ($seniorId) {
    $stmt = $pdo->prepare('SELECT * FROM lydra_medications WHERE senior_id = ? ORDER BY timing ASC');
    $stmt->execute([$seniorId]);
    $medications = $stmt->fetchAll();
    
    foreach ($medications as $med) {
        $totalAdherence += $med['adherence_rate'];
    }
    $totalMeds = count($medications);
    if ($totalMeds > 0) {
        $totalAdherence = number_format($totalAdherence / $totalMeds, 0);
    }
}
?>
<div class="page">
  <div class="section-hd">
    <div><h2>Medication <em>Manager</em></h2><p>Track, schedule, and monitor adherence</p></div>
    <button class="btn-primary" onclick="showToast('➕ Opening add medication form…')">+ Add medication</button>
  </div>
  <div class="stat-grid" style="grid-template-columns:repeat(3,1fr)">
    <div class="stat-card green"><div class="stat-icon">✅</div><div class="stat-val"><?php echo $totalAdherence; ?>%</div><div class="stat-label">Average adherence</div></div>
    <div class="stat-card rust"><div class="stat-icon">💊</div><div class="stat-val"><?php echo $totalMeds; ?></div><div class="stat-label">Active medications</div></div>
    <div class="stat-card gold"><div class="stat-icon">🔔</div><div class="stat-val">3</div><div class="stat-label">Reminders today</div></div>
  </div>
  <div class="card">
    <div class="card-head"><h3>Active Medications</h3></div>
    <div class="card-body">
      <?php if (empty($medications)): ?>
        <div class="empty"><p>No medications added yet.</p></div>
      <?php else: ?>
        <?php foreach ($medications as $med): ?>
          <div class="med-row" style="padding:16px 0;">
            <div class="med-name">
              <h4><?php echo htmlspecialchars($med['medication_name']); ?></h4>
              <p><?php echo htmlspecialchars($med['timing']); ?> · <?php echo htmlspecialchars($med['reason']); ?></p>
            </div>
            <div style="display:flex;gap:8px;align-items:center">
              <span class="chip <?php echo $med['adherence_rate'] >= 90 ? 'green' : ($med['adherence_rate'] >= 70 ? 'navy' : 'rust'); ?>"><?php echo $med['adherence_rate']; ?>% adherence</span>
              <button class="btn-ghost" onclick="showToast('📝 Editing medication…')">Edit</button>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php include 'footer.php';
