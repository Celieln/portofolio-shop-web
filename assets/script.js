(function () {
  "use strict";

  var PRODUK = window.SHOPKITA_PRODUK || [];
  var TARIF_ONGKIR = window.SHOPKITA_TARIF || 25000;
  var BATAS_GRATIS_ONGKIR = window.SHOPKITA_BATAS || 500000;

  function formatRupiah(n) {
    return "Rp " + Number(n).toLocaleString("id-ID");
  }

  function ambilKeranjang() {
    try {
      var c = JSON.parse(localStorage.getItem("shopkita_cart"));
      return c && typeof c === "object" ? c : {};
    } catch (e) {
      return {};
    }
  }

  function simpanKeranjang(cart) {
    localStorage.setItem("shopkita_cart", JSON.stringify(cart));
  }

  function jumlahItem() {
    var c = ambilKeranjang();
    var total = 0;
    for (var k in c) {
      total += Number(c[k]) || 0;
    }
    return total;
  }

  function perbaruiBadge() {
    var badge = document.getElementById("cart-badge");
    if (!badge) return;
    var total = jumlahItem();
    badge.textContent = total;
    badge.style.display = total > 0 ? "inline-flex" : "none";
  }

  var toastTimer = null;

  function toast(teks) {
    var t = document.getElementById("toast");
    if (!t) {
      t = document.createElement("div");
      t.id = "toast";
      t.className = "toast";
      document.body.appendChild(t);
    }
    t.textContent = teks;
    t.classList.add("muncul");
    if (toastTimer) clearTimeout(toastTimer);
    toastTimer = setTimeout(function () {
      t.classList.remove("muncul");
    }, 2200);
  }

  function beli(id) {
    var c = ambilKeranjang();
    c[id] = (Number(c[id]) || 0) + 1;
    simpanKeranjang(c);
    perbaruiBadge();
    toast("Produk ditambahkan ke keranjang");
  }

  function cariProduk(id) {
    for (var i = 0; i < PRODUK.length; i++) {
      if (PRODUK[i].id === id) return PRODUK[i];
    }
    return null;
  }

  function bintang(rating) {
    var b = Math.round(rating);
    var s = "";
    for (var i = 0; i < 5; i++) {
      if (i < b) {
        s += '<svg viewBox="0 0 24 24" width="14" height="14" fill="#fbbf24" stroke="#fbbf24"><path d="M12 2l2.9 6.2 6.6 .9 -4.8 4.7 1.2 6.6L12 17.8l-5.9 3.1 1.2-6.6L2.5 9.1l6.6-.9z"/></svg>';
      } else {
        s += '<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#d1d5db"><path d="M12 2l2.9 6.2 6.6 .9 -4.8 4.7 1.2 6.6L12 17.8l-5.9 3.1 1.2-6.6L2.5 9.1l6.6-.9z"/></svg>';
      }
    }
    return '<span class="bintang">' + s + '<b>' + rating.toFixed(1) + '</b></span>';
  }

  function kartuProduk(p) {
    var badge = "";
    if (p.label) {
      var cls = p.label === "Terlaris" ? "badge-terlaris" : p.label === "Baru" ? "badge-baru" : "badge-diskon";
      badge = '<span class="badge ' + cls + '">' + p.label + '</span>';
    }
    var diskon = "";
    if (p.hargaAsli) {
      diskon = '<span class="harga-asli">' + formatRupiah(p.hargaAsli) + '</span>';
      if (p.label !== "Diskon") {
        var d = Math.round((1 - p.harga / p.hargaAsli) * 100);
        badge += '<span class="badge badge-diskon">-' + d + '%</span>';
      }
    }
    return (
      '<article class="card" data-id="' + p.id + '">' +
        '<div class="card-gambar" style="background:linear-gradient(135deg,' + p.warna[0] + ',' + p.warna[1] + ')">' +
          '<div class="img-lapis"><span class="img-teks">' + p.singkat + '</span></div>' +
          badge +
        '</div>' +
        '<div class="card-body">' +
          '<h3 class="card-nama">' + p.nama + '</h3>' +
          bintang(p.rating) +
          '<div class="harga">' + formatRupiah(p.harga) + diskon + '</div>' +
          '<button class="btn-tambah" data-id="' + p.id + '">Tambah ke Keranjang</button>' +
        '</div>' +
      '</article>'
    );
  }

  function renderGrid(wadah, daftar) {
    wadah.innerHTML = daftar.map(kartuProduk).join("");
  }

  function renderBeranda() {
    var wadah = document.getElementById("produk-grid");
    if (!wadah || document.getElementById("filter-kategori")) return;
    /* Produk beranda dirender dari PHP; hanya refresh AOS */
    if (window.AOS) window.AOS.refresh();
  }

  function renderProduk() {
    var wadah = document.getElementById("produk-grid");
    if (!wadah || !document.getElementById("filter-kategori")) return;
    var kategori = document.getElementById("filter-kategori");
    var cari = document.getElementById("cari-produk");
    var aktif = kategori.getAttribute("data-aktif") || "Semua";
    var kata = cari ? cari.value.trim().toLowerCase() : "";
    var daftar = PRODUK.filter(function (p) {
      var okKat = aktif === "Semua" || p.kategori === aktif;
      var okNama = !kata || p.nama.toLowerCase().indexOf(kata) !== -1;
      return okKat && okNama;
    });
    renderGrid(wadah, daftar);
    var info = document.getElementById("jumlah-produk");
    if (info) info.textContent = daftar.length + " produk ditemukan";
  }

  function pasangFilter() {
    var wadah = document.getElementById("filter-kategori");
    if (!wadah) return;
    wadah.addEventListener("click", function (e) {
      var btn = e.target.closest(".btn-filter");
      if (!btn) return;
      var prev = wadah.querySelector(".btn-filter.aktif");
      if (prev) prev.classList.remove("aktif");
      btn.classList.add("aktif");
      wadah.setAttribute("data-aktif", btn.getAttribute("data-kategori"));
      renderProduk();
    });
  }

  function pasangCari() {
    var cari = document.getElementById("cari-produk");
    if (!cari) return;
    cari.addEventListener("input", renderProduk);
  }

  function barisKeranjang(p, qty) {
    return (
      '<div class="item-keranjang" data-id="' + p.id + '">' +
        '<div class="item-gambar" style="background:linear-gradient(135deg,' + p.warna[0] + ',' + p.warna[1] + ')">' + p.singkat + '</div>' +
        '<div class="item-info">' +
          '<h4>' + p.nama + '</h4>' +
          '<span class="item-kategori">' + p.kategori + '</span>' +
          '<div class="harga">' + formatRupiah(p.harga) + '</div>' +
          '<div class="qty">' +
            '<button class="btn-qty" data-id="' + p.id + '" data-aksi="minus" aria-label="Kurangi">-</button>' +
            '<span class="qty-angka">' + qty + '</span>' +
            '<button class="btn-qty" data-id="' + p.id + '" data-aksi="plus" aria-label="Tambah">+</button>' +
            '<button class="btn-hapus" data-id="' + p.id + '" data-aksi="hapus">Hapus</button>' +
          '</div>' +
        '</div>' +
      '</div>'
    );
  }

  function renderKeranjang() {
    var wadah = document.getElementById("item-keranjang");
    var ringkas = document.getElementById("ringkasan");
    if (!wadah) return;

    var cart = ambilKeranjang();
    var ids = Object.keys(cart).filter(function (id) { return Number(cart[id]) > 0; });
    var subtotal = 0;

    if (!ids.length) {
      wadah.innerHTML =
        '<div class="kosong">' +
          '<svg viewBox="0 0 24 24" width="64" height="64" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>' +
          '<p>Keranjang Anda masih kosong</p>' +
          '<a class="btn" href="produk.php">Belanja Sekarang</a>' +
        '</div>';
      if (ringkas) ringkas.style.display = "none";
      return;
    }

    wadah.innerHTML = ids.map(function (id) {
      var p = cariProduk(Number(id));
      if (!p) return "";
      var qty = Number(cart[id]) || 0;
      subtotal += p.harga * qty;
      return barisKeranjang(p, qty);
    }).join("");

    var ongkir = subtotal >= BATAS_GRATIS_ONGKIR ? 0 : TARIF_ONGKIR;
    var total = subtotal + ongkir;

    if (ringkas) {
      ringkas.style.display = "block";
      document.getElementById("subtotal").textContent = formatRupiah(subtotal);
      document.getElementById("ongkir").textContent = ongkir === 0 ? "Gratis" : formatRupiah(ongkir);
      document.getElementById("total").textContent = formatRupiah(total);
      var infoOngkir = document.getElementById("info-ongkir");
      if (infoOngkir) {
        var kurang = BATAS_GRATIS_ONGKIR - subtotal;
        infoOngkir.textContent = ongkir === 0
          ? "Selamat, Anda mendapat gratis ongkir!"
          : "Belanja " + formatRupiah(kurang) + " lagi untuk gratis ongkir";
      }
    }
  }

  function renderRingkasanCheckout() {
    var wadah = document.getElementById("ringkasan-checkout");
    if (!wadah) return;

    var cart = ambilKeranjang();
    var ids = Object.keys(cart).filter(function (id) { return Number(cart[id]) > 0; });
    var subtotal = 0;

    if (!ids.length) {
      wadah.innerHTML = '<p>Keranjang kosong. <a class="link-semua" href="produk.php">Belanja dulu yuk.</a></p>';
      var btnSelesai = document.getElementById("btn-selesai");
      if (btnSelesai) btnSelesai.style.display = "none";
      return;
    }

    var daftar = ids.map(function (id) {
      var p = cariProduk(Number(id));
      if (!p) return "";
      var qty = Number(cart[id]) || 0;
      subtotal += p.harga * qty;
      return '<div class="ro-item"><span>' + p.nama + ' x ' + qty + '</span><b>' + formatRupiah(p.harga * qty) + '</b></div>';
    }).join("");

    var ongkir = subtotal >= BATAS_GRATIS_ONGKIR ? 0 : TARIF_ONGKIR;
    var total = subtotal + ongkir;

    wadah.innerHTML =
      daftar +
      '<div class="ro-item"><span>Subtotal</span><b>' + formatRupiah(subtotal) + '</b></div>' +
      '<div class="ro-item"><span>Ongkos Kirim</span><b>' + (ongkir === 0 ? "Gratis" : formatRupiah(ongkir)) + '</b></div>' +
      '<div class="ro-item total"><span>Total</span><b>' + formatRupiah(total) + '</b></div>';
  }

  function aksiKeranjang(el) {
    var id = el.getAttribute("data-id");
    var aksi = el.getAttribute("data-aksi");
    var cart = ambilKeranjang();
    if (aksi === "plus") {
      cart[id] = (Number(cart[id]) || 0) + 1;
    } else if (aksi === "minus") {
      cart[id] = (Number(cart[id]) || 0) - 1;
      if (cart[id] <= 0) delete cart[id];
    } else if (aksi === "hapus") {
      delete cart[id];
    }
    simpanKeranjang(cart);
    perbaruiBadge();
    renderKeranjang();
  }

  function tanggalKode() {
    var d = new Date();
    var bln = d.getMonth() + 1;
    var tgl = d.getDate();
    return "" + d.getFullYear() + (bln < 10 ? "0" + bln : bln) + (tgl < 10 ? "0" + tgl : tgl);
  }

  function acak(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function pasangCheckout() {
    var form = document.getElementById("form-checkout");
    if (!form) return;

    form.addEventListener("submit", function (e) {
      e.preventDefault();

      if (jumlahItem() < 1) {
        toast("Keranjang kosong, silakan belanja dulu");
        return;
      }

      var nama = document.getElementById("nama").value.trim();
      var alamat = document.getElementById("alamat").value.trim();
      var telepon = document.getElementById("telepon").value.trim();
      var metode = document.querySelector('input[name="metode"]:checked');

      if (!nama || !alamat || !telepon) {
        toast("Lengkapi semua data diri terlebih dahulu");
        return;
      }
      if (!metode) {
        toast("Pilih metode pembayaran terlebih dahulu");
        return;
      }
      if (!/^[0-9+\- ]{9,15}$/.test(telepon)) {
        toast("Nomor telepon tidak valid");
        return;
      }

      var cart = ambilKeranjang();
      var subtotal = 0;
      var ids = Object.keys(cart);
      var items = [];
      ids.forEach(function (id) {
        var p = cariProduk(Number(id));
        if (!p) return;
        var qty = Number(cart[id]) || 0;
        subtotal += p.harga * qty;
        items.push({ id: p.id, nama: p.nama, qty: qty, harga: p.harga });
      });
      var ongkir = subtotal >= BATAS_GRATIS_ONGKIR ? 0 : TARIF_ONGKIR;
      var total = subtotal + ongkir;
      var kode = "SK-" + tanggalKode() + "-" + acak(1000, 9999);

      var tampilSukses = function (kodeAkhir) {
        localStorage.removeItem("shopkita_cart");
        perbaruiBadge();
        document.getElementById("kode-pesanan").textContent = kodeAkhir;
        document.getElementById("total-bayar").textContent = formatRupiah(total);
        document.getElementById("nama-pelanggan").textContent = nama;
        document.getElementById("modal-sukses").classList.add("buka");
        form.reset();
      };

      try {
        fetch("api/simpan_pesanan.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            nama: nama, telepon: telepon, alamat: alamat,
            metode: metode.value, kode: kode, items: items
          })
        }).then(function (r) { return r.json(); })
          .then(function (res) {
            tampilSukses((res && res.ok && res.kode) ? res.kode : kode);
          })
          .catch(function () { tampilSukses(kode); });
      } catch (e) {
        tampilSukses(kode);
      }
    });

    var tutup = document.getElementById("tutup-modal");
    if (tutup) {
      tutup.addEventListener("click", function () {
        window.location.href = "index.php";
      });
    }
  }

  function pasangMenu() {
    var toggle = document.getElementById("menu-toggle");
    var nav = document.getElementById("nav-menu");
    if (!toggle || !nav) return;
    toggle.addEventListener("click", function () {
      nav.classList.toggle("buka");
    });
  }

  document.addEventListener("click", function (e) {
    var tambah = e.target.closest(".btn-tambah");
    if (tambah) {
      beli(tambah.getAttribute("data-id"));
      return;
    }
    var qty = e.target.closest("[data-aksi]");
    if (qty) {
      aksiKeranjang(qty);
    }
  });

  document.addEventListener("DOMContentLoaded", function () {
    renderBeranda();
    renderProduk();
    renderKeranjang();
    renderRingkasanCheckout();
    pasangFilter();
    pasangCari();
    pasangCheckout();
    pasangMenu();
    perbaruiBadge();
    if (window.AOS) {
      window.AOS.init({ duration: 700, easing: "ease-out-cubic", once: true, offset: 50 });
    }
  });
})();
