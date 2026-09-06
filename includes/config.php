<?php
/* ============================================================
 * KONFIGURASI SITUS E-COMMERCE ShopKita
 * ============================================================ */

$namaToko    = 'ShopKita';
$tagline     = 'Belanja Online Terpercaya';
$promoStrip  = 'Gratis ongkir untuk semua pesanan di atas Rp 500.000';

$TARIF_ONGKIR        = 25000;
$BATAS_GRATIS_ONGKIR = 500000;

$produkDefault = [
    ['id' => 1,  'nama' => 'Kemeja Linen Premium',        'kategori' => 'Pria',      'harga' => 249000, 'hargaAsli' => 320000, 'rating' => 4.8, 'label' => 'Diskon',   'singkat' => 'KL', 'warna' => ['#ff8a5c', '#ff5e3a']],
    ['id' => 2,  'nama' => 'Kaos Polos Cotton Combed',    'kategori' => 'Pria',      'harga' => 89000,  'hargaAsli' => 0,       'rating' => 4.6, 'label' => 'Terlaris', 'singkat' => 'KPC', 'warna' => ['#2dd4bf', '#0d9488']],
    ['id' => 3,  'nama' => 'Jaket Denim Vintage',         'kategori' => 'Pria',      'harga' => 459000, 'hargaAsli' => 0,       'rating' => 4.7, 'label' => 'Baru',     'singkat' => 'JD', 'warna' => ['#60a5fa', '#2563eb']],
    ['id' => 4,  'nama' => 'Celana Chino Slim Fit',       'kategori' => 'Pria',      'harga' => 199000, 'hargaAsli' => 0,       'rating' => 4.5, 'label' => '',        'singkat' => 'CC', 'warna' => ['#a3b18a', '#588157']],
    ['id' => 5,  'nama' => 'Sneakers Urban White',        'kategori' => 'Sepatu',    'harga' => 529000, 'hargaAsli' => 0,       'rating' => 4.9, 'label' => 'Terlaris', 'singkat' => 'SU', 'warna' => ['#fbbf24', '#f59e0b']],
    ['id' => 6,  'nama' => 'Sepatu Kulit Oxford',         'kategori' => 'Sepatu',    'harga' => 699000, 'hargaAsli' => 850000, 'rating' => 4.7, 'label' => 'Diskon',   'singkat' => 'SKO', 'warna' => ['#b45309', '#92400e']],
    ['id' => 7,  'nama' => 'Tas Ransel Laptop',           'kategori' => 'Aksesoris', 'harga' => 389000, 'hargaAsli' => 0,       'rating' => 4.6, 'label' => 'Baru',     'singkat' => 'TR', 'warna' => ['#818cf8', '#4f46e5']],
    ['id' => 8,  'nama' => 'Tas Tote Kanvas',             'kategori' => 'Wanita',    'harga' => 249000, 'hargaAsli' => 0,       'rating' => 4.5, 'label' => '',        'singkat' => 'TT', 'warna' => ['#c084fc', '#9333ea']],
    ['id' => 9,  'nama' => 'Jam Tangan Minimalis',        'kategori' => 'Aksesoris', 'harga' => 599000, 'hargaAsli' => 0,       'rating' => 4.8, 'label' => 'Terlaris', 'singkat' => 'JT', 'warna' => ['#334155', '#0f172a']],
    ['id' => 10, 'nama' => 'Kacamata Hitam Polarized',    'kategori' => 'Aksesoris', 'harga' => 179000, 'hargaAsli' => 240000, 'rating' => 4.4, 'label' => 'Diskon',   'singkat' => 'KH', 'warna' => ['#94a3b8', '#475569']],
    ['id' => 11, 'nama' => 'Gaun Midi Floral',            'kategori' => 'Wanita',    'harga' => 329000, 'hargaAsli' => 0,       'rating' => 4.7, 'label' => 'Baru',     'singkat' => 'GM', 'warna' => ['#f472b6', '#db2777']],
    ['id' => 12, 'nama' => 'Hijab Voal Premium',          'kategori' => 'Wanita',    'harga' => 99000,  'hargaAsli' => 130000, 'rating' => 4.6, 'label' => 'Terlaris', 'singkat' => 'HV', 'warna' => ['#34d399', '#059669']],
];

$kategori = ['Semua', 'Pria', 'Wanita', 'Aksesoris', 'Sepatu'];

$statusPesanan = ['Baru', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'];

$kontakToko = [
    'alamat'  => 'Jl. Melati No. 88, Jakarta',
    'email'   => 'cs@shopkita.id',
    'telepon' => '0812-3456-7890',
];

$menu = [
    ['label' => 'Beranda', 'url' => 'index.php'],
    ['label' => 'Produk', 'url' => 'produk.php'],
    ['label' => 'Keranjang', 'url' => 'keranjang.php'],
];

$dataDir     = __DIR__ . '/../data';
$produkFile  = $dataDir . '/produk.json';
$pesananFile = $dataDir . '/pesanan.json';

function e($v) {
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

function rupiah($n) {
    return 'Rp ' . number_format((int) $n, 0, ',', '.');
}

function baca_json($file, $default = []) {
    if (!is_file($file)) {
        $default = is_array($default) ? $default : [];
        return $default;
    }
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : $default;
}

function tulis_json($file, $data) {
    $dir = dirname($file);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

$produk = baca_json($produkFile, $produkDefault);

function bintang_html($rating) {
    $b = (int) round($rating);
    $s = '';
    for ($i = 0; $i < 5; $i++) {
        if ($i < $b) {
            $s .= '<svg viewBox="0 0 24 24" width="14" height="14" fill="#fbbf24" stroke="#fbbf24"><path d="M12 2l2.9 6.2 6.6 .9 -4.8 4.7 1.2 6.6L12 17.8l-5.9 3.1 1.2-6.6L2.5 9.1l6.6-.9z"/></svg>';
        } else {
            $s .= '<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#d1d5db"><path d="M12 2l2.9 6.2 6.6 .9 -4.8 4.7 1.2 6.6L12 17.8l-5.9 3.1 1.2-6.6L2.5 9.1l6.6-.9z"/></svg>';
        }
    }
    return '<span class="bintang">' . $s . '<b>' . number_format($rating, 1) . '</b></span>';
}

function kartu_produk($p) {
    $badge = '';
    if (!empty($p['label'])) {
        $cls = $p['label'] === 'Terlaris' ? 'badge-terlaris' : ($p['label'] === 'Baru' ? 'badge-baru' : 'badge-diskon');
        $badge = '<span class="badge ' . $cls . '">' . e($p['label']) . '</span>';
    }
    $diskon = '';
    if ((int) $p['hargaAsli'] > 0) {
        $diskon = '<span class="harga-asli">' . rupiah($p['hargaAsli']) . '</span>';
        if ($p['label'] !== 'Diskon') {
            $d = (int) round((1 - $p['harga'] / $p['hargaAsli']) * 100);
            $badge .= '<span class="badge badge-diskon">-' . $d . '%</span>';
        }
    }
    $warna = $p['warna'];
    $w0 = e(is_array($warna) && isset($warna[0]) ? $warna[0] : '#ff8a5c');
    $w1 = e(is_array($warna) && isset($warna[1]) ? $warna[1] : '#ff5e3a');
    return '<article class="card" data-id="' . (int) $p['id'] . '">' .
        '<div class="card-gambar" style="background:linear-gradient(135deg,' . $w0 . ',' . $w1 . ')">' .
            '<div class="img-lapis"><span class="img-teks">' . e($p['singkat']) . '</span></div>' .
            $badge .
        '</div>' .
        '<div class="card-body">' .
            '<h3 class="card-nama">' . e($p['nama']) . '</h3>' .
            bintang_html($p['rating']) .
            '<div class="harga">' . rupiah($p['harga']) . $diskon . '</div>' .
            '<button class="btn-tambah" data-id="' . (int) $p['id'] . '">Tambah ke Keranjang</button>' .
        '</div>' .
    '</article>';
}
