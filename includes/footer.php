<?php require_once __DIR__ . '/config.php'; ?>
  </main>

  <footer class="footer">
    <div class="container footer-grid">
      <div class="footer-kol">
        <a href="index.php" class="logo">Shop<span>Kita</span></a>
        <p>Toko online fesyen, sepatu, dan aksesoris premium dengan harga terbaik dan pelayanan ramah.</p>
      </div>
      <div class="footer-kol">
        <h4>Navigasi</h4>
        <?php foreach ($menu as $m): ?>
        <a href="<?= e($m['url']) ?>"><?= e($m['label']) ?></a>
        <?php endforeach; ?>
      </div>
      <div class="footer-kol">
        <h4>Bantuan</h4>
        <a href="produk.php">Cara Belanja</a>
        <a href="produk.php">Pengiriman</a>
        <a href="produk.php">Pengembalian</a>
      </div>
      <div class="footer-kol">
        <h4>Kontak</h4>
        <p><?= e($kontakToko['alamat']) ?></p>
        <p><?= e($kontakToko['email']) ?></p>
        <p><?= e($kontakToko['telepon']) ?></p>
      </div>
    </div>
    <div class="footer-bawah">Copyright <?= date('Y') ?> <?= e($namaToko) ?>. Seluruh hak cipta dilindungi.</div>
  </footer>

  <script>
    window.SHOPKITA_PRODUK = <?= json_encode($produk, JSON_UNESCAPED_UNICODE) ?>;
    window.SHOPKITA_TARIF = <?= (int) $TARIF_ONGKIR ?>;
    window.SHOPKITA_BATAS = <?= (int) $BATAS_GRATIS_ONGKIR ?>;
  </script>
  <div class="cursor-koin" id="kursorKoin" aria-hidden="true"><span class="koin">Rp</span></div>
  <script>
  (function () {
    if (window.matchMedia('(max-width:768px)').matches) return;
    var k = document.getElementById('kursorKoin'), n = 0;
    document.addEventListener('mousemove', function (e) {
      k.style.left = e.clientX + 'px'; k.style.top = e.clientY + 'px';
      if (n++ % 4 === 0) { var s = document.createElement('span'); s.className = 'percik'; s.style.setProperty('--dx', (Math.random()*18-9)+'px'); s.style.setProperty('--dy', (Math.random()*-30-6)+'px'); k.appendChild(s); setTimeout(function(){ s.remove(); }, 1000); }
    });
  })();
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="assets/script.js"></script>
</body>
</html>
