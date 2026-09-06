<?php
$activePage = 'checkout.php';
$pageTitle  = 'Checkout';
require_once __DIR__ . '/includes/config.php';
$pageDesc = 'Checkout pesanan ' . $namaToko . '.';
include __DIR__ . '/includes/header.php';
?>

    <section class="page-head">
      <div class="container">
        <h1>Checkout</h1>
        <p>Lengkapi data diri dan selesaikan pesanan Anda.</p>
      </div>
    </section>

    <section class="section">
      <div class="container checkout-layout">
        <form class="form-checkout" id="form-checkout" novalidate>
          <h3>Data Penerima</h3>
          <label class="field">
            <span>Nama Lengkap</span>
            <input type="text" id="nama" placeholder="Nama lengkap Anda" required>
          </label>
          <label class="field">
            <span>Alamat Lengkap</span>
            <textarea id="alamat" rows="3" placeholder="Alamat rumah / kantor" required></textarea>
          </label>
          <label class="field">
            <span>Nomor Telepon</span>
            <input type="tel" id="telepon" placeholder="08xxxxxxxxxx" required>
          </label>

          <h3>Metode Pembayaran</h3>
          <label class="radio">
            <input type="radio" name="metode" value="Transfer Bank">
            <span><b>Transfer Bank</b><small>BCA, Mandiri, BNI</small></span>
          </label>
          <label class="radio">
            <input type="radio" name="metode" value="E-Wallet">
            <span><b>E-Wallet</b><small>OVO, GoPay, DANA, ShopeePay</small></span>
          </label>
          <label class="radio">
            <input type="radio" name="metode" value="COD">
            <span><b>Bayar di Tempat (COD)</b><small>Tersedia untuk area tertentu</small></span>
          </label>

          <button type="submit" class="btn lebar hvr-sweep-to-right" id="btn-selesai">Selesaikan Pesanan</button>
        </form>

        <aside class="ringkasan ringkasan-checkout">
          <h3>Ringkasan Pesanan</h3>
          <div id="ringkasan-checkout"></div>
        </aside>
      </div>
    </section>

  <div class="modal" id="modal-sukses">
    <div class="modal-kotak">
      <div class="modal-ikon">
        <svg viewBox="0 0 24 24" width="36" height="36" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><path d="M22 4 12 14.01l-3-3"></path></svg>
      </div>
      <h2>Pesanan Berhasil</h2>
      <p>Terima kasih <b id="nama-pelanggan">-</b>, pesanan Anda telah kami terima.</p>
      <div class="modal-kode">Kode Pesanan<b id="kode-pesanan">-</b></div>
      <p>Total pembayaran <b id="total-bayar">-</b></p>
      <button class="btn lebar hvr-sweep-to-right" id="tutup-modal">Kembali ke Beranda</button>
    </div>
  </div>

<?php include __DIR__ . '/includes/footer.php'; ?>
