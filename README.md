# E-Commerce Shop

Website toko online - katalog produk, keranjang, dan checkout.

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green.svg)
![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)
![Repo](https://img.shields.io/badge/Status-Aktif-blue)

## Screenshot

![Home](assets/screenshots/home.png)

## Teknologi

**Backend**
- PHP 8.x - server-side scripting
- Cart & checkout module (produk, keranjang, order)
- API endpoint untuk data produk & order
- Session-based cart management
- JSON-file based data storage

**Frontend**
- HTML5, CSS3, JavaScript (ES6+)
- Bootstrap 5 responsive
- Fetch API untuk data dinamis
- UI modern & menarik

**Database**
- JSON file storage - portable

**Tooling & DevOps**
- Git & GitHub
- Laragon/WAMP

## Arsitektur

- **Front-end first** - hanya berisi tampilan depan (public UI)
- Layout modular (folder includes, assets, data)
- Keamanan: input sanitization, validation, dan prepared query
- Data berbasis file (JSON) - mudah di-deploy tanpa database server

## Quick Start

Prasyarat: [Laragon](https://laragon.org) / [XAMPP](https://www.apachefriends.org)

1. Clone repository:

   ```bash
   git clone https://github.com/Celieln/portofolio-shop-web.git
   ```

2. Letakkan folder di `laragon/www/` atau `htdocs/`.
3. Buka `http://localhost/portofolio-shop-web`.

## Struktur Proyek

```
portofolio-shop-web/
  assets/      # CSS, JS, gambar, screenshot
  includes/    # Komponen header, footer, dll
  data/        # File data (JSON)
  *.php        # Halaman tampilan depan
```

## Kontribusi

Kontribusi sangat diterima! Baca [CONTRIBUTING](CONTRIBUTING.md) dan buka [Issues](https://github.com/Celieln/portofolio-shop-web/issues).

## Lisensi

[MIT](LICENSE) (c) [Celieln](https://github.com/Celieln)
