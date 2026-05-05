<?php
session_start();

$errors  = [];
$success = '';
$old     = [];

//Helpers 
function validate_email(string $v): bool {
  return filter_var($v, FILTER_VALIDATE_EMAIL) !== false;
}

function validate_url(string $v): bool {
  return filter_var($v, FILTER_VALIDATE_URL) !== false;
}

function validate_phone(string $v): bool {
  return preg_match('/^\+?[0-9\s\-]{7,15}$/', $v) === 1;
}

// (user NOT logged in) 
if (!isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'login') {

  $email    = trim($_POST['email']    ?? '');
  $password = trim($_POST['password'] ?? '');
  $old      = compact('email', 'password');

  // Validation
  if ($email === '') {
    $errors['email'] = 'Email is required.';
  } elseif (!validate_email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
  }

  if ($password === '') {
    $errors['password'] = 'Password is required.';
  } elseif (strlen($password) < 6) {
    $errors['password'] = 'Password must be at least 6 characters.';
  }

  if (empty($errors)) {
    $_SESSION['user'] = ['email' => $email];
    header('Location: all-products.php');
    exit;
  }
}

// CASE 2:(user IS logged in)
if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'profile') {

  $username  = trim($_POST['username']  ?? '');
  $password  = trim($_POST['password']  ?? '');
  $email     = trim($_POST['email']     ?? '');
  $phone     = trim($_POST['phone']     ?? '');
  $facebook  = trim($_POST['facebook']  ?? '');
  $twitter   = trim($_POST['twitter']   ?? '');
  $instagram = trim($_POST['instagram'] ?? '');
  $old       = compact('username', 'password', 'email', 'phone', 'facebook', 'twitter', 'instagram');

  // 1. Username
  if ($username === '') {
    $errors['username'] = 'Username is required.';
  } elseif (strlen($username) < 3) {
    $errors['username'] = 'Username must be at least 3 characters.';
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    $errors['username'] = 'Username may only contain letters, numbers, and underscores.';
  }

  // 2. Password
  if ($password === '') {
    $errors['password'] = 'Password is required.';
  } elseif (strlen($password) < 6) {
    $errors['password'] = 'Password must be at least 6 characters.';
  } elseif (!preg_match('/[A-Z]/', $password)) {
    $errors['password'] = 'Password must contain at least one uppercase letter.';
  } elseif (!preg_match('/[0-9]/', $password)) {
    $errors['password'] = 'Password must contain at least one number.';
  }

  // 3. Email
  if ($email === '') {
    $errors['email'] = 'Email is required.';
  } elseif (!validate_email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
  }

  // 4. Phone
  if ($phone === '') {
    $errors['phone'] = 'Phone number is required.';
  } elseif (!validate_phone($phone)) {
    $errors['phone'] = 'Please enter a valid phone number (7–15 digits).';
  }

  // 5. Facebook
  if ($facebook === '') {
    $errors['facebook'] = 'Facebook URL is required.';
  } elseif (!validate_url($facebook)) {
    $errors['facebook'] = 'Please enter a valid URL (e.g. https://facebook.com/yourname).';
  } elseif (strpos($facebook, 'facebook.com') === false) {
    $errors['facebook'] = 'URL must be a Facebook profile link.';
  }

  // 6. Twitter / X
  if ($twitter === '') {
    $errors['twitter'] = 'Twitter URL is required.';
  } elseif (!validate_url($twitter)) {
    $errors['twitter'] = 'Please enter a valid URL (e.g. https://twitter.com/yourname).';
  } elseif (strpos($twitter, 'twitter.com') === false && strpos($twitter, 'x.com') === false) {
    $errors['twitter'] = 'URL must be a Twitter / X profile link.';
  }

  // 7. Instagram
  if ($instagram === '') {
    $errors['instagram'] = 'Instagram URL is required.';
  } elseif (!validate_url($instagram)) {
    $errors['instagram'] = 'Please enter a valid URL (e.g. https://instagram.com/yourname).';
  } elseif (strpos($instagram, 'instagram.com') === false) {
    $errors['instagram'] = 'URL must be an Instagram profile link.';
  }

  if (empty($errors)) {
    // Merge profile data into session
    $_SESSION['user'] = array_merge($_SESSION['user'], $old);
    $success = 'Profile updated successfully!';
    $old = [];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ali ElHadad — Shop</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .account-wrapper {
      min-height: calc(100vh - 64px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 4rem 2rem;
    }

    .account-box {
      width: 100%;
      max-width: 520px;
    }

    .account-eyebrow {
      font-size: 0.75rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 0.6rem;
    }

    .account-title {
      font-family: var(--font-display);
      font-size: 2.4rem;
      font-weight: 900;
      margin-bottom: 0.4rem;
    }

    .account-subtitle {
      color: var(--text-muted);
      font-size: 0.9rem;
      margin-bottom: 2.5rem;
    }

    .divider {
      border: none;
      border-top: 1px solid var(--border);
      margin: 2rem 0;
    }

    .two-col {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0 1.2rem;
    }

    .social-label {
      font-size: 0.75rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--text-muted);
      margin: 1.5rem 0 1rem;
      display: flex;
      align-items: center;
      gap: 0.8rem;
    }

    .social-label::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    .submit-row {
      margin-top: 2rem;
    }

    .submit-row .btn {
      width: 100%;
      text-align: center;
      padding: 14px;
      font-size: 0.9rem;
    }

    /* Profile avatar area */
    .profile-header {
      display: flex;
      align-items: center;
      gap: 1.2rem;
      padding: 1.2rem 1.5rem;
      background: var(--dark-gray);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      margin-bottom: 2rem;
    }

    .avatar {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold), #8b5e1a);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-display);
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--black);
      flex-shrink: 0;
    }

    .profile-info strong {
      display: block;
      font-size: 0.95rem;
      margin-bottom: 2px;
    }

    .profile-info span {
      font-size: 0.8rem;
      color: var(--text-muted);
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="account-wrapper">
    <div class="account-box">

      <?php if (!isset($_SESSION['user'])): ?>
     
            <!-- CASE 1 — Login Form -->
      <p class="account-eyebrow">Welcome back</p>
      <h1 class="account-title">Sign In</h1>
      <p class="account-subtitle">Enter your credentials to access your account.</p>

      <?php if (!empty($errors)): ?>
        <div class="alert alert-error">Please fix the errors below and try again.</div>
      <?php endif; ?>

      <form method="POST" action="account.php" novalidate>
        <input type="hidden" name="form_type" value="login">

        <div class="form-group">
          <label for="email">Email Address</label>
          <input
            type="email"
            id="email"
            name="email"
            value="<?= htmlspecialchars($old['email'] ?? '') ?>"
            placeholder="you@example.com"
            class="<?= isset($errors['email']) ? 'is-error' : '' ?>"
            autocomplete="email"
          >
          <?php if (isset($errors['email'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['email']) ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            class="<?= isset($errors['password']) ? 'is-error' : '' ?>"
            autocomplete="current-password"
          >
          <?php if (isset($errors['password'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['password']) ?></span>
          <?php endif; ?>
        </div>

        <div class="submit-row">
          <button type="submit" class="btn btn-gold">Sign In</button>
        </div>
      </form>

      <?php else: ?>
      
       <!--    CASE 2 — Profile Update Form -->
   
      <p class="account-eyebrow">Your Account</p>
      <h1 class="account-title">Edit Profile</h1>
      <p class="account-subtitle">Keep your information up to date.</p>

      <?php
        $email_initial = strtoupper(substr($_SESSION['user']['email'] ?? 'U', 0, 1));
      ?>
      <div class="profile-header">
        <div class="avatar"><?= $email_initial ?></div>
        <div class="profile-info">
          <strong><?= htmlspecialchars($_SESSION['user']['username'] ?? 'User') ?></strong>
          <span><?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?></span>
        </div>
      </div>

      <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
      <?php endif; ?>

      <?php if (!empty($errors)): ?>
        <div class="alert alert-error">Please fix the errors below.</div>
      <?php endif; ?>

      <form method="POST" action="account.php" novalidate>
        <input type="hidden" name="form_type" value="profile">

        <div class="two-col">
          <div class="form-group">
            <label for="username">Username</label>
            <input
              type="text"
              id="username"
              name="username"
              value="<?= htmlspecialchars($old['username'] ?? $_SESSION['user']['username'] ?? '') ?>"
              placeholder="john_doe"
              class="<?= isset($errors['username']) ? 'is-error' : '' ?>"
            >
            <?php if (isset($errors['username'])): ?>
              <span class="field-error"><?= htmlspecialchars($errors['username']) ?></span>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="password">New Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Min 6 chars, 1 cap, 1 num"
              class="<?= isset($errors['password']) ? 'is-error' : '' ?>"
            >
            <?php if (isset($errors['password'])): ?>
              <span class="field-error"><?= htmlspecialchars($errors['password']) ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="two-col">
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              value="<?= htmlspecialchars($old['email'] ?? $_SESSION['user']['email'] ?? '') ?>"
              placeholder="you@example.com"
              class="<?= isset($errors['email']) ? 'is-error' : '' ?>"
            >
            <?php if (isset($errors['email'])): ?>
              <span class="field-error"><?= htmlspecialchars($errors['email']) ?></span>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input
              type="tel"
              id="phone"
              name="phone"
              value="<?= htmlspecialchars($old['phone'] ?? $_SESSION['user']['phone'] ?? '') ?>"
              placeholder="+20 100 000 0000"
              class="<?= isset($errors['phone']) ? 'is-error' : '' ?>"
            >
            <?php if (isset($errors['phone'])): ?>
              <span class="field-error"><?= htmlspecialchars($errors['phone']) ?></span>
            <?php endif; ?>
          </div>
        </div>

        <hr class="divider">
        <span class="social-label">Social Accounts</span>

        <div class="form-group">
          <label for="facebook">Facebook URL</label>
          <input
            type="url"
            id="facebook"
            name="facebook"
            value="<?= htmlspecialchars($old['facebook'] ?? $_SESSION['user']['facebook'] ?? '') ?>"
            placeholder="https://facebook.com/yourname"
            class="<?= isset($errors['facebook']) ? 'is-error' : '' ?>"
          >
          <?php if (isset($errors['facebook'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['facebook']) ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="twitter">Twitter / X URL</label>
          <input
            type="url"
            id="twitter"
            name="twitter"
            value="<?= htmlspecialchars($old['twitter'] ?? $_SESSION['user']['twitter'] ?? '') ?>"
            placeholder="https://twitter.com/yourhandle"
            class="<?= isset($errors['twitter']) ? 'is-error' : '' ?>"
          >
          <?php if (isset($errors['twitter'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['twitter']) ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="instagram">Instagram URL</label>
          <input
            type="url"
            id="instagram"
            name="instagram"
            value="<?= htmlspecialchars($old['instagram'] ?? $_SESSION['user']['instagram'] ?? '') ?>"
            placeholder="https://instagram.com/yourname"
            class="<?= isset($errors['instagram']) ? 'is-error' : '' ?>"
          >
          <?php if (isset($errors['instagram'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['instagram']) ?></span>
          <?php endif; ?>
        </div>

        <div class="submit-row">
          <button type="submit" class="btn btn-gold">Save Profile</button>
        </div>
      </form>

      <?php endif; ?>

    </div>
  </div>

  <footer>
    &copy; <?= date('Y') ?> Ali ElHadad Shop. All rights reserved.
  </footer>
</body>
</html>
