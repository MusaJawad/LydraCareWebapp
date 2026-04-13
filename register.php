<?php
require_once 'config/db.php';
require_once 'config/auth.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $full_name = trim($_POST['full_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $relationship = trim($_POST['relationship'] ?? '');
    $senior_name = trim($_POST['senior_name'] ?? '');
    $senior_age = (int)($_POST['senior_age'] ?? 0);

    if (empty($email) || empty($password) || empty($full_name)) {
        $error = 'Email, password, and full name are required.';
    } else if (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        try {
            // Check if email exists
            $stmt = $pdo->prepare('SELECT id FROM lydra_caregivers WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $error = 'Email already registered.';
            } else {
                // Create caregiver
                $password_hash = hashPassword($password);
                $stmt = $pdo->prepare('
                    INSERT INTO lydra_caregivers (email, password_hash, full_name, phone, relationship)
                    VALUES (?, ?, ?, ?, ?)
                ');
                $stmt->execute([$email, $password_hash, $full_name, $phone, $relationship]);
                $caregiver_id = $pdo->lastInsertId();

                // Create senior (if provided)
                if (!empty($senior_name)) {
                    $stmt = $pdo->prepare('
                        INSERT INTO lydra_seniors (full_name, age, primary_caregiver_id)
                        VALUES (?, ?, ?)
                    ');
                    $stmt->execute([$senior_name, $senior_age, $caregiver_id]);
                    $senior_id = $pdo->lastInsertId();

                    // Link caregiver to senior
                    $stmt = $pdo->prepare('
                        INSERT INTO lydra_caregiver_seniors (caregiver_id, senior_id, relationship, access_level)
                        VALUES (?, ?, ?, ?)
                    ');
                    $stmt->execute([$caregiver_id, $senior_id, $relationship, 'owner']);
                }

                $_SESSION['user_id'] = $caregiver_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $full_name;
                $_SESSION['senior_id'] = $senior_id ?? null;

                header('Location: index.php');
                exit;
            }
        } catch (Exception $e) {
            $error = 'Registration failed: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LYDRA Care — Register</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet">
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
:root {
  --navy: #1C2B3A;
  --sage: #5C7A5F;
  --cream: #F7F2EB;
  --warm: #EDE8E0;
  --text: #2C2420;
  --rust: #C4622D;
}
body {
  font-family: 'DM Sans', sans-serif;
  background: linear-gradient(135deg, var(--navy) 0%, #2d4459 100%);
  min-height: 100vh;
  padding: 40px 20px;
}
.register-container {
  background: white;
  border-radius: 20px;
  padding: 40px;
  max-width: 520px;
  margin: 0 auto;
  box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}
.register-logo {
  text-align: center;
  margin-bottom: 32px;
}
.register-logo svg { display: block; margin: 0 auto; }
h1 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 28px;
  color: var(--navy);
  margin-bottom: 8px;
  text-align: center;
}
.subtitle {
  font-size: 12px;
  color: #8A7F75;
  text-align: center;
  margin-bottom: 24px;
}
.form-section {
  margin-bottom: 24px;
}
.form-section h3 {
  font-size: 12px;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--navy);
  margin-bottom: 16px;
  font-weight: 600;
}
.form-group {
  margin-bottom: 16px;
}
.form-group label {
  display: block;
  font-size: 13px;
  font-weight: 600;
  color: var(--navy);
  margin-bottom: 6px;
}
.form-group input, .form-group select {
  width: 100%;
  padding: 12px;
  border: 1px solid var(--warm);
  border-radius: 10px;
  font-family: 'DM Sans', sans-serif;
  font-size: 14px;
  transition: border-color 0.2s;
}
.form-group input:focus, .form-group select:focus {
  outline: none;
  border-color: var(--sage);
  box-shadow: 0 0 0 3px rgba(92, 122, 95, 0.1);
}
.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}
.error {
  background: #f5eae3;
  border-left: 4px solid var(--rust);
  color: var(--rust);
  padding: 12px;
  border-radius: 8px;
  font-size: 13px;
  margin-bottom: 16px;
}
.btn-register {
  width: 100%;
  background: var(--sage);
  color: white;
  border: none;
  padding: 12px;
  border-radius: 10px;
  font-family: 'DM Sans', sans-serif;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
  margin-bottom: 12px;
}
.btn-register:hover { background: #4d6950; }
.login-link {
  text-align: center;
  font-size: 13px;
  color: #8A7F75;
}
.login-link a {
  color: var(--sage);
  text-decoration: none;
  font-weight: 600;
}
.login-link a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="register-container">
  <div class="register-logo">
    <svg width="120" height="34" viewBox="0 0 148 42" fill="none">
      <rect x="4" y="4" width="5" height="28" fill="#5C7A5F"/>
      <rect x="4" y="28" width="22" height="5" fill="#5C7A5F"/>
      <path d="M 6.5 19 Q 6.5 8 15 8 Q 23.5 8 23.5 19" stroke="#C9A84C" stroke-width="2" fill="none" stroke-linecap="round"/>
      <circle cx="15" cy="6.5" r="3.5" fill="#C9A84C"/>
      <text x="36" y="21" font-family="'DM Sans',sans-serif" font-size="17" font-weight="600" fill="#1C2B3A" letter-spacing="2">LYDRA</text>
      <text x="37" y="36" font-family="Georgia,serif" font-size="10" fill="#5C7A5F" letter-spacing="8" font-style="italic">care</text>
    </svg>
  </div>

  <h1>Create your account</h1>
  <p class="subtitle">Set up a caregiver profile for your family member</p>

  <?php if ($error): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="form-section">
      <h3>Your Information</h3>
      <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" placeholder="Tariq Khan" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="tariq@example.com" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="phone">Phone (optional)</label>
          <input type="tel" id="phone" name="phone" placeholder="+1-403-555-0100">
        </div>
        <div class="form-group">
          <label for="relationship">Your Relationship</label>
          <select id="relationship" name="relationship">
            <option value="Son">Son</option>
            <option value="Daughter">Daughter</option>
            <option value="Spouse">Spouse</option>
            <option value="Caregiver">Caregiver</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-section">
      <h3>Senior Profile</h3>
      <div class="form-group">
        <label for="senior_name">Senior's Name (optional)</label>
        <input type="text" id="senior_name" name="senior_name" placeholder="Muhammad Khan">
      </div>
      <div class="form-group">
        <label for="senior_age">Age (optional)</label>
        <input type="number" id="senior_age" name="senior_age" placeholder="78" min="1" max="120">
      </div>
    </div>

    <button type="submit" class="btn-register">Create Account</button>
  </form>

  <p class="login-link">Already have an account? <a href="login.php">Sign in here</a></p>
</div>
</body>
</html>
