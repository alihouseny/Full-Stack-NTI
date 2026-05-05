<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ali ElHadad Shop — Home</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* HERO */
    .hero {
      position: relative;
      height: calc(100vh - 64px);
      min-height: 500px;
      display: flex;
      align-items: center;
      overflow: hidden;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      background:
        linear-gradient(135deg, rgba(10,10,10,0.85) 40%, rgba(201,168,76,0.08) 100%),
        url('images/home.jpg') center/cover no-repeat;
    }

    .hero-bg::after {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse at 70% 50%, rgba(201,168,76,0.06) 0%, transparent 70%);
    }

    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 700px;
      padding: 0 4rem;
      animation: heroIn 1s ease both;
    }

    @keyframes heroIn {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .hero-eyebrow {
      display: inline-block;
      font-size: 0.75rem;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 1.2rem;
      border-left: 2px solid var(--gold);
      padding-left: 12px;
    }

    .hero h1 {
      font-family: var(--font-display);
      font-size: clamp(2.8rem, 6vw, 5.5rem);
      font-weight: 900;
      line-height: 1.05;
      margin-bottom: 1.5rem;
      color: var(--white);
    }

    .hero h1 em {
      font-style: normal;
      color: var(--gold);
    }

    .hero p {
      font-size: 1.05rem;
      color: #aaa;
      max-width: 480px;
      margin-bottom: 2.5rem;
      line-height: 1.7;
    }

    .hero-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    /* FEATURES */
    .features {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1px;
      background: var(--border);
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
    }

    .feature {
      background: var(--black);
      padding: 2.5rem 2rem;
      text-align: center;
      transition: background var(--transition);
    }

    .feature:hover {
      background: var(--dark-gray);
    }

    .feature-icon {
      font-size: 2rem;
      margin-bottom: 0.8rem;
    }

    .feature h3 {
      font-family: var(--font-display);
      font-size: 1.1rem;
      margin-bottom: 0.5rem;
      color: var(--white);
    }

    .feature p {
      font-size: 0.85rem;
      color: var(--text-muted);
    }

    /* BANNER */
    .banner {
      margin: 4rem auto;
      max-width: 900px;
      padding: 0 2rem;
      text-align: center;
    }

    .banner h2 {
      font-family: var(--font-display);
      font-size: clamp(1.8rem, 4vw, 3rem);
      font-weight: 900;
      margin-bottom: 1rem;
    }

    .banner p {
      color: var(--text-muted);
      margin-bottom: 2rem;
      font-size: 1rem;
    }

    <?php if (isset($_SESSION['user'])): ?>
    .welcome-bar {
      background: linear-gradient(90deg, rgba(201,168,76,0.1), transparent);
      border-left: 3px solid var(--gold);
      padding: 12px 24px;
      margin: 0;
      font-size: 0.88rem;
      color: var(--gold-light);
      letter-spacing: 0.5px;
    }
    <?php endif; ?>
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <?php if (isset($_SESSION['user'])): ?>
    <div class="welcome-bar">
      Welcome back, <strong><?= htmlspecialchars($_SESSION['user']['email']) ?></strong> — enjoy shopping!
    </div>
  <?php endif; ?>

  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-content">
      <span class="hero-eyebrow">New Collection 2026</span>
      <h1>Welcome to<br>Our <em>Store</em></h1>
      <p>Discover curated products crafted for those who appreciate quality, style, and originality.</p>
      <div class="hero-actions">
        <a href="all-products.php" class="btn btn-gold">Shop Now</a>
        <a href="account.php" class="btn btn-outline">My Account</a>
      </div>
    </div>
  </section>

  <div class="features">
    <div class="feature">
      <h3>Free Shipping</h3>
      <p>On all orders over $50. Fast & reliable worldwide delivery.</p>
    </div>
    <div class="feature">
      <h3>Premium Quality</h3>
      <p>Every product is hand-picked and quality-verified before listing.</p>
    </div>
    <div class="feature">
      <h3>Easy Returns</h3>
      <p>30-day hassle-free returns. No questions asked, ever.</p>
    </div>
  </div>

  <div class="banner">
    <h2>Ready to explore?</h2>
    <p>Browse our curated selection of 6 premium products.</p>
    <a href="all-products.php" class="btn btn-gold">View All Products</a>
  </div>

  <footer>
    &copy; <?= date('Y') ?> Ali ElHadad Shop. All rights reserved.
  </footer>
</body>
</html>
