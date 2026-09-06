<?php
require_once __DIR__ . '/config.php';
$judul = isset($pageTitle) ? $pageTitle . ' | ' . $namaToko : $namaToko . ' - ' . $tagline;
$aktif = isset($activePage) ? $activePage : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= e(isset($pageDesc) ? $pageDesc : $tagline . ' - ' . $promoStrip) ?>">
  <title><?= e($judul) ?></title>
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='22' fill='%23ff6a2b'/><text x='50' y='70' font-size='58' text-anchor='middle' fill='%23ffffff' font-family='Arial, sans-serif' font-weight='bold'>S</text></svg>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="promo-strip"><?= e($promoStrip) ?></div>

  <header class="header">
    <div class="container header-dalam">
      <a href="index.php" class="logo">Shop<span>Kita</span></a>
      <nav class="nav" id="nav-menu">
        <?php foreach ($menu as $m): ?>
        <a href="<?= e($m['url']) ?>" class="nav-link<?= $aktif === $m['url'] ? ' aktif' : '' ?>"><?= e($m['label']) ?></a>
        <?php endforeach; ?>
        <a href="keranjang.php" class="nav-link<?= $aktif === 'keranjang.php' ? ' aktif' : '' ?>">
          Keranjang
          <svg class="icon-kart" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
          <span class="badge-keranjang" id="cart-badge">0</span>
        </a>
      </nav>
      <button class="menu-toggle" id="menu-toggle" aria-label="Buka menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <main>
