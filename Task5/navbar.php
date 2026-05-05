<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar">
  <div class="nav-brand">Ali ElHadad Shop</div>
  <ul class="nav-links">
    <li><a href="index.php" class="<?= $current === 'index.php' ? 'active' : '' ?>">Home</a></li>
    <li><a href="all-products.php" class="<?= $current === 'all-products.php' ? 'active' : '' ?>">All Products</a></li>
    <li><a href="account.php" class="<?= $current === 'account.php' ? 'active' : '' ?>">Account</a></li>
    <?php if (isset($_SESSION['user'])): ?>
      <li><a href="logout.php" class="logout-btn">Logout</a></li>
    <?php endif; ?>
  </ul>
</nav>
