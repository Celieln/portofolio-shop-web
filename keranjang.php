<?php
$activePage = 'keranjang.php';
$pageTitle  = 'Keranjang Belanja';
require_once __DIR__ . '/includes/config.php';
$pageDesc = 'Keranjang belanja ' . $namaToko . '.';
include __DIR__ . '/includes/header.php';
?>

    <section class="page-head">
      <div class="container">
        <h1>Keranjang Belanja</h1>
        <p>Tinjau dan kelola pesanan Anda sebelum checkout.</p>
      </div>
    </section>

    <section class="section">
      <div class="container keranjang-layout">
        <div class="keranjang-list" id="item-keranjang"></div>
        <aside class="ringkasan" id="ringkasan">
          <h3>Ringkasan Belanja</h3>
          <div class="ro-item"><span>Subtotal</span><b id="subtotal">Rp 0</b></div>
          <div class="ro-item"><span>Ongkos Kirim</span><b id="ongkir">-</b></div>
          <p class="info-ongkir" id="info-ongkir"></p>
          <div class="ro-item total"><span>Total</span><b id="total">Rp 0</b></div>
          <a href="checkout.php" id="checkout-link" class="btn lebar hvr-sweep-to-right">Lanjut ke Checkout</a>
          <a href="produk.php" class="btn btn-ghost lebar hvr-sweep-to-right">Lanjut Belanja</a>
        </aside>
      </div>
    </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
