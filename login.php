<?php
require_once 'config/db.php';
require_once 'config/auth.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Email and password are required.';
    } else {
        try {
            $stmt = $pdo->prepare('SELECT id, email, password_hash, full_name FROM lydra_caregivers WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && verifyPassword($password, $user['password_hash'])) {
                // Get the senior this caregiver manages
                $stmt = $pdo->prepare('
                    SELECT s.id FROM lydra_seniors s
                    JOIN lydra_caregiver_seniors cs ON s.id = cs.senior_id
                    WHERE cs.caregiver_id = ?
                    LIMIT 1
                ');
                $stmt->execute([$user['id']]);
                $senior = $stmt->fetch();

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['full_name'];
                $_SESSION['senior_id'] = $senior['id'] ?? null;

                header('Location: index.php');
                exit;
            } else {
                $error = 'Invalid email or password.';
            }
        } catch (Exception $e) {
            $error = 'Login failed: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LYDRA Care — Login</title>
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
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text);
}
.login-container {
  background: white;
  border-radius: 20px;
  padding: 40px;
  max-width: 420px;
  width: 90%;
  box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}
.login-logo {
  text-align: center;
  margin-bottom: 32px;
}
.login-logo svg { display: block; margin: 0 auto; }
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
.form-group input {
  width: 100%;
  padding: 12px;
  border: 1px solid var(--warm);
  border-radius: 10px;
  font-family: 'DM Sans', sans-serif;
  font-size: 14px;
  transition: border-color 0.2s;
}
.form-group input:focus {
  outline: none;
  border-color: var(--sage);
  box-shadow: 0 0 0 3px rgba(92, 122, 95, 0.1);
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
.success {
  background: #E8F0E8;
  border-left: 4px solid var(--sage);
  color: var(--sage);
  padding: 12px;
  border-radius: 8px;
  font-size: 13px;
  margin-bottom: 16px;
}
.btn-login {
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
.btn-login:hover { background: #4d6950; }
.signup-link {
  text-align: center;
  font-size: 13px;
  color: #8A7F75;
}
.signup-link a {
  color: var(--sage);
  text-decoration: none;
  font-weight: 600;
}
.signup-link a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="login-container">
  <div class="login-logo">
    <svg width="120" height="34" viewBox="0 0 148 42" fill="none">
      <rect x="4" y="4" width="5" height="28" fill="#5C7A5F"/>
      <rect x="4" y="28" width="22" height="5" fill="#5C7A5F"/>
      <path d="M 6.5 19 Q 6.5 8 15 8 Q 23.5 8 23.5 19" stroke="#C9A84C" stroke-width="2" fill="none" stroke-linecap="round"/>
      <circle cx="15" cy="6.5" r="3.5" fill="#C9A84C"/>
      <text x="36" y="21" font-family="'DM Sans',sans-serif" font-size="17" font-weight="600" fill="#1C2B3A" letter-spacing="2">LYDRA</text>
      <text x="37" y="36" font-family="Georgia,serif" font-size="10" fill="#5C7A5F" letter-spacing="8" font-style="italic">care</text>
    </svg>
  </div>

  <h1>Welcome back</h1>
  <p class="subtitle">Sign in to your caregiver dashboard</p>

  <?php if ($error): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="tariq@example.com" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="••••••••" required>
    </div>
    <button type="submit" class="btn-login">Sign in</button>
  </form>

  <p class="signup-link">Don't have an account? <a href="register.php">Sign up here</a></p>
</div>
</body>
</html>
