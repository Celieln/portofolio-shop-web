<?php
$activePage = 'produk.php';
$pageTitle  = 'Katalog Produk';
require_once __DIR__ . '/includes/config.php';
$pageDesc = 'Katalog lengkap produk ' . $namaToko . ' - fesyen, sepatu, dan aksesoris.';
include __DIR__ . '/includes/header.php';
?>

    <section class="page-head">
      <div class="container">
        <h1>Katalog Produk</h1>
        <p>Semua koleksi <?= e($namaToko) ?> dalam satu tempat.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="toolbar" data-aos="fade-up">
          <div class="filter-kategori" id="filter-kategori" data-aktif="Semua">
            <?php foreach ($kategori as $kat): ?>
            <button class="btn-filter<?= $kat === 'Semua' ? ' aktif' : '' ?>" data-kategori="<?= e($kat) ?>"><?= e($kat) ?></button>
            <?php endforeach; ?>
          </div>
          <input type="search" id="cari-produk" class="cari" placeholder="Cari produk...">
        </div>
        <p class="jumlah-produk" id="jumlah-produk" data-aos="fade-up"></p>
        <div class="produk-grid" id="produk-grid"></div>
      </div>
    </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
