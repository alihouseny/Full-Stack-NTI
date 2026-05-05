<?php
session_start();

// ── Product Data ──────────────────────────────────────────────
$products = [
  'Leather Minimalist Watch' => [
    'price' => '1250',
    'img'   => 'images/watch.jpg',
    'desc'  => 'Swiss-movement timepiece with genuine leather strap. Timeless elegance on your wrist.',
  ],
  'Wireless Noise-Cancel Headphones' => [
    'price' => '3800',
    'img'   => 'images/headphone.jpg',
    'desc'  => '40-hour battery, adaptive noise cancellation, studio-grade audio clarity.',
  ],
  'Premium Sunglasses' => [
    'price' => '870',
    'img'   => 'images/glasses.jpg',
    'desc'  => 'UV400 polarized lenses with lightweight titanium frames. Style meets protection.',
  ],
  'Canvas Backpack' => [
    'price' => '620',
    'img'   => 'images/back_bag.jpg',
    'desc'  => 'Waxed canvas, leather accents, 28L capacity. Built for the everyday adventurer.',
  ],
  'Running Sneakers' => [
    'price' => '2100',
    'img'   => 'images/shoes.jpg',
    'desc'  => 'Responsive foam sole, breathable mesh upper. From track to street in seconds.',
  ],
  'Specialty Coffee Set' => [
    'price' => '480',
    'img'   => 'images/latee.jpg',
    'desc'  => 'Premium specialty coffee experience. Ritual-worthy, brewed to perfection.',
  ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopVibe — All Products</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .page-header {
      padding: 3rem 2rem 2rem;
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      border-bottom: 1px solid var(--border);
      margin-bottom: 3rem;
    }

    .page-header-left .eyebrow {
      font-size: 0.75rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 0.5rem;
    }

    .product-count {
      font-size: 0.85rem;
      color: var(--text-muted);
      margin-top: 0.5rem;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem 4rem;
    }

    @media (max-width: 900px) {
      .products-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 580px) {
      .products-grid { grid-template-columns: 1fr; }
    }

    .product-card {
      animation: fadeUp 0.5s ease both;
    }

    .product-card:nth-child(1) { animation-delay: 0.05s; }
    .product-card:nth-child(2) { animation-delay: 0.10s; }
    .product-card:nth-child(3) { animation-delay: 0.15s; }
    .product-card:nth-child(4) { animation-delay: 0.20s; }
    .product-card:nth-child(5) { animation-delay: 0.25s; }
    .product-card:nth-child(6) { animation-delay: 0.30s; }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .add-to-cart {
      display: block;
      width: 100%;
      margin-top: 1rem;
      padding: 10px;
      background: transparent;
      border: 1px solid var(--border);
      color: var(--text-muted);
      font-family: var(--font-body);
      font-size: 0.78rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      border-radius: var(--radius);
      transition: all var(--transition);
    }

    .add-to-cart:hover {
      border-color: var(--gold);
      color: var(--gold);
      background: rgba(201,168,76,0.05);
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="page-header">
    <div class="page-header-left">
      <div class="eyebrow">Our Collection</div>
      <h1 class="page-title">All Products</h1>
      <p class="product-count"><?= count($products) ?> items available</p>
    </div>
  </div>

  <div class="products-grid">
    <?php foreach ($products as $name => $values): ?>
      <div class="product-card">
        <img
          src="<?= htmlspecialchars($values['img']) ?>"
          alt="<?= htmlspecialchars($name) ?>"
          onerror="this.src='https://images.unsplash.com/photo-1560393464-5c69a73c5770?w=600&auto=format&fit=crop'"
        >
        <div class="product-card-body">
          <h3 class="product-card-title"><?= htmlspecialchars($name) ?></h3>
          <p class="product-card-desc"><?= htmlspecialchars($values['desc']) ?></p>
          <div class="product-card-price">EGP <?= number_format((int)$values['price']) ?></div>
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <footer>
    &copy; <?= date('Y') ?> ShopVibe. All rights reserved.
  </footer>
</body>
</html>