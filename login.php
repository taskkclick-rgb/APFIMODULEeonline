<?php
// login.php - AI Software Engineering Module - Authentication
$page_title = "Sign In | AI Software Engineering Module";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body { background: var(--gradient-hero); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; position: relative; overflow: hidden; }
    .auth-card { background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 20px; width: 100%; max-width: 440px; padding: 40px; box-shadow: var(--shadow-card); position: relative; z-index: 2; transition: transform 0.4s ease; }
    .auth-bg-glow { position: absolute; width: 400px; height: 400px; border-radius: 50%; background: var(--primary); filter: blur(120px); opacity: 0.15; top: 10%; right: -10%; z-index: 1; pointer-events: none; }
    .auth-header { text-align: center; margin-bottom: 32px; }
    .auth-logo { font-family: 'Space Grotesk', sans-serif; font-size: 1.5rem; font-weight: 700; margin-bottom: 8px; display: inline-flex; align-items: center; gap: 8px; background: var(--gradient-1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .auth-title { font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 8px; }
    .auth-subtitle { color: var(--text-muted); font-size: 0.9rem; }
    .form-group { margin-bottom: 20px; position: relative; }
    .form-label { display: block; font-size: 0.82rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 8px; }
    .form-input { width: 100%; padding: 14px 16px; background: rgba(255,255,255,0.05); border: 1px solid var(--border-light); border-radius: 12px; color: var(--text-primary); outline: none; transition: var(--transition); font-size: 0.95rem; }
    .form-input:focus { border-color: var(--primary); background: rgba(99,102,241,0.08); box-shadow: 0 0 0 4px rgba(99,102,241,0.1); }
    .btn-auth { width: 100%; padding: 14px; border-radius: 12px; background: var(--gradient-1); color: #fff; font-weight: 700; border: none; cursor: pointer; transition: var(--transition); font-size: 1rem; margin-top: 12px; }
    .btn-auth:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(99,102,241,0.4); }
    .auth-footer { margin-top: 24px; text-align: center; font-size: 0.875rem; color: var(--text-muted); }
    .auth-link { color: var(--primary-light); font-weight: 600; cursor: pointer; text-decoration: none; margin-left: 4px; }
    .back-home { position: absolute; top: 40px; left: 40px; color: var(--text-muted); font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 8px; transition: var(--transition); }
    .back-home:hover { color: var(--text-primary); transform: translateX(-4px); }
  </style>
</head>
<body>
  <div class="auth-bg-glow"></div>
  <a href="index.php" class="back-home"><i class="fas fa-arrow-left"></i> Home</a>
  
  <div class="auth-card" id="auth-card">
    <div class="auth-header" id="login-header">
      <div class="auth-logo">⚡ AISEM</div>
      <h2 class="auth-title">Welcome Back</h2>
      <p class="auth-subtitle">Master AI, Software Engineering & Modern Dev Tools</p>
    </div>

    <div class="auth-header" id="register-header" style="display:none;">
      <div class="auth-logo">⚡ AISEM</div>
      <h2 class="auth-title">Create Account</h2>
      <p class="auth-subtitle">Join thousands of engineers in our learning journey</p>
    </div>

    <form id="auth-form" onsubmit="event.preventDefault(); handleAuth();">
      <div class="form-group" id="name-group" style="display:none;">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-input" id="auth-name" placeholder="John Doe">
      </div>
      <div class="form-group">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-input" id="auth-email" placeholder="name@company.com" required>
      </div>
      <div class="form-group">
        <div style="display:flex;justify-content:space-between;">
            <label class="form-label">Password</label>
            <a href="#" class="auth-link" style="font-size:0.75rem;" id="forgot-pass">Forgot?</a>
        </div>
        <input type="password" class="form-input" id="auth-pass" placeholder="••••••••" required>
      </div>
      <button class="btn-auth" id="auth-btn">Sign In</button>
    </form>

    <div class="auth-footer">
      <span id="footer-text">Don't have an account?</span>
      <a class="auth-link" id="toggle-auth">Create Account</a>
    </div>
  </div>

  <script>
    const loginHeader = document.getElementById('login-header');
    const registerHeader = document.getElementById('register-header');
    const nameGroup = document.getElementById('name-group');
    const authBtn = document.getElementById('auth-btn');
    const toggleAuth = document.getElementById('toggle-auth');
    const footerText = document.getElementById('footer-text');
    let isLogin = true;

    toggleAuth.onclick = () => {
      isLogin = !isLogin;
      loginHeader.style.display = isLogin ? '' : 'none';
      registerHeader.style.display = isLogin ? 'none' : '';
      nameGroup.style.display = isLogin ? 'none' : '';
      authBtn.innerText = isLogin ? 'Sign In' : 'Create Account';
      footerText.innerText = isLogin ? "Don't have an account?" : "Already have an account?";
      toggleAuth.innerText = isLogin ? 'Create Account' : 'Sign In';
      document.getElementById('auth-card').style.transform = "scale(0.98)";
      setTimeout(() => document.getElementById('auth-card').style.transform = "scale(1)", 100);
    };

    async function handleAuth() {
        const path = isLogin ? 'login' : 'register';
        const payload = {
            email: document.getElementById('auth-email').value,
            password: document.getElementById('auth-pass').value
        };
        if (!isLogin) payload.name = document.getElementById('auth-name').value;

        try {
            const res = await fetch(`api/index.php?path=${path}`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.status === 'success') {
                window.location.href = 'dashboard.php';
            } else {
                alert(data.message);
            }
        } catch (e) {
            console.error(e);
            alert("Connection error occurred.");
        }
    }
  </script>
</body>
</html>
