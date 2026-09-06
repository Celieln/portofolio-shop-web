<?php
$activePage = 'index.php';
$pageTitle  = 'Beranda';
require_once __DIR__ . '/includes/config.php';
$pageDesc = $namaToko . ' - toko online fesyen, sepatu, dan aksesoris premium dengan harga terbaik.';
include __DIR__ . '/includes/header.php';
?>

    <section class="hero">
      <div class="blob blob-1"></div>
      <div class="blob blob-2"></div>
      <div class="container hero-dalam">
        <div class="hero-teks">
          <span class="hero-badge" data-aos="fade-up">Koleksi Terbaru</span>
          <h1 data-aos="fade-up" data-aos-delay="80">Gaya Premium, <span class="grad">Harga Bersahabat</span></h1>
          <p data-aos="fade-up" data-aos-delay="160">Temukan fesyen, sepatu, dan aksesoris pilihan dengan kualitas terbaik. Gratis ongkir untuk minimal belanja Rp 500.000.</p>
          <div class="hero-aksi" data-aos="fade-up" data-aos-delay="240">
            <a href="produk.php" class="btn hvr-sweep-to-right">Belanja Sekarang <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            <a href="produk.php" class="btn btn-ghost hvr-sweep-to-right">Lihat Koleksi</a>
          </div>
          <div class="hero-stat" data-aos="fade-up" data-aos-delay="320">
            <div><b>1.000+</b><span>Produk</span></div>
            <div><b>20rb+</b><span>Pelanggan</span></div>
            <div><b>4.8<i class="fa-solid fa-star" style="color:#fbbf24;font-size:14px;margin-left:4px"></i></b><span>Rating Toko</span></div>
          </div>
        </div>
        <div class="hero-visual" data-aos="fade-left" data-aos-delay="200">
          <div class="hero-card utama">
            <span class="promo-label">Promo Akhir Pekan</span>
            <h3>Diskon hingga <em>35%</em></h3>
            <p>untuk semua produk pilihan</p>
            <a href="produk.php" class="btn btn-kecil btn-putih hvr-sweep-to-right">Ambil Promo</a>
            <div class="hero-orbit orbit-1"></div>
            <div class="hero-orbit orbit-2"></div>
          </div>
          <div class="hero-badge-card">
            <svg viewBox="0 0 24 24" width="34" height="34" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            <div><b>100% Original</b><span>Garansi produk resmi</span></div>
          </div>
          <div class="hero-mini-card mini-cod">
            <svg viewBox="0 0 24 24" width="34" height="34" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
            <div><b>COD Tersedia</b><span>Bayar di tempat lebih mudah</span></div>
          </div>
        </div>
      </div>
    </section>

    <div class="brand-strip">
      <div class="container marquee">
        <span>Gratis Ongkir</span><i class="fa-solid fa-star"></i>
        <span>100% Original</span><i class="fa-solid fa-star"></i>
        <span>Cashback ShopKita</span><i class="fa-solid fa-star"></i>
        <span>Garansi Resmi</span><i class="fa-solid fa-star"></i>
        <span>Pengiriman Cepat</span><i class="fa-solid fa-star"></i>
        <span>Gratis Ongkir</span><i class="fa-solid fa-star"></i>
        <span>100% Original</span><i class="fa-solid fa-star"></i>
        <span>Cashback ShopKita</span><i class="fa-solid fa-star"></i>
        <span>Garansi Resmi</span><i class="fa-solid fa-star"></i>
        <span>Pengiriman Cepat</span><i class="fa-solid fa-star"></i>
      </div>
    </div>

    <section class="keunggulan">
      <div class="container keunggulan-grid">
        <div class="keunggulan-item" data-aos="fade-up">
          <div class="kg-icon"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"></rect><path d="M16 8h4l3 3v5h-7V8z"></path><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg></div>
          <div><b>Gratis Ongkir</b><span>Minimal belanja Rp 500.000</span></div>
        </div>
        <div class="keunggulan-item" data-aos="fade-up" data-aos-delay="80">
          <div class="kg-icon"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg></div>
          <div><b>100% Original</b><span>Garansi produk asli</span></div>
        </div>
        <div class="keunggulan-item" data-aos="fade-up" data-aos-delay="160">
          <div class="kg-icon"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></div>
          <div><b>Pembayaran Aman</b><span>Transfer, e-wallet, COD</span></div>
        </div>
        <div class="keunggulan-item" data-aos="fade-up" data-aos-delay="240">
          <div class="kg-icon"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"></path></svg></div>
          <div><b>Pelayanan Ramah</b><span>Siap bantu 24 jam</span></div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="judul-section" data-aos="fade-up">
          <div><span class="eyebrow">Koleksi</span><h2>Produk Terpopuler</h2></div>
          <a href="produk.php" class="link-semua">Lihat Semua <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        </div>
        <div class="produk-grid" id="produk-grid">
          <?php
          $populer = array_slice($produk, 0, 8);
          foreach ($populer as $i => $p): ?>
          <div data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 60 ?>"><?= kartu_produk($p) ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="promo-band">
      <div class="container promo-band-dalam" data-aos="fade-up">
        <div class="promo-band-teks">
          <span class="eyebrow light">Hemat Lebih</span>
          <h2>Pack <em>Weekend</em> — Diskon Ekstra 15%</h2>
          <p>Kode: <b>WEEKEND15</b> berlaku untuk semua produk hingga Minggu.</p>
        </div>
        <a href="produk.php" class="btn btn-putih hvr-sweep-to-right">Klaim Kupon</a>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="judul-section" data-aos="fade-up">
          <div><span class="eyebrow">Jelajahi</span><h2>Kategori Koleksi</h2></div>
        </div>
        <div class="kategori-grid">
          <?php $ikos = ['fa-shirt','fa-child-reaching','fa-shoe-prints','fa-glasses']; $gk = ['gk-1','gk-2','gk-3','gk-4']; $no = 0; foreach (['Pria','Wanita','Sepatu','Aksesoris'] as $k): ?>
          <a href="produk.php" class="kategori-card <?= $gk[$no] ?>" data-aos="fade-up" data-aos-delay="<?= $no * 60 ?>">
            <i class="fa-solid <?= $ikos[$no] ?>"></i>
            <h3><?= $k ?></h3>
            <span>Lihat koleksi →</span>
          </a>
          <?php $no++; endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section kotak-bg">
      <div class="container">
        <div class="cta-inline" data-aos="fade-up">
          <div>
            <span class="eyebrow light">#ShopKitaStyle</span>
            <h2>Siap tampil beda hari ini?</h2>
            <p>Jelajahi koleksi lengkap kami dan dapatkan penawaran spesial setiap minggunya.</p>
          </div>
          <a href="produk.php" class="btn btn-putih hvr-sweep-to-right">Jelajahi Semua Produk</a>
        </div>
      </div>
    </section>

<?php include __DIR__ . '/includes/footer.php'; ?>