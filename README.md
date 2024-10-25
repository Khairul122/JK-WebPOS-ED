# Minimarket Sehati

Proyek ini adalah sistem manajemen minimarket sederhana yang dikembangkan menggunakan teknologi berbasis web. Sistem ini mencakup fitur-fitur untuk pengelolaan stok barang, transaksi penjualan, dan laporan penjualan.

## Struktur Folder dan File

- **database/**
  - `sehati.sql`: File SQL yang berisi struktur dan data awal untuk database sistem minimarket ini.

- **dokumentasi/**
  - `ERD Minimarket Sehati.png`: Diagram Relasi Entitas (ERD) yang menggambarkan hubungan antar tabel dalam database.

- **folder_gambar/**
  - Menyimpan gambar yang digunakan dalam aplikasi, seperti logo, ikon, atau gambar barang.

- **vendor/**  
  - Menyimpan file library eksternal yang dibutuhkan oleh aplikasi (misalnya `font-awesome`, `jquery`).

- **index.php**: Halaman utama dari aplikasi minimarket ini.
- **koneksi.php**: File konfigurasi koneksi ke database.
- **README.md**: Dokumentasi proyek (file ini).

## Instalasi

1. Clone atau unduh proyek ini.
2. Impor database `sehati.sql` ke MySQL.
3. Konfigurasi file `koneksi.php` sesuai dengan pengaturan server database Anda.
4. Jalankan aplikasi dengan membuka `index.php` di server lokal atau web server yang mendukung PHP.

## Fitur

- **Pengelolaan Stok Barang**: Tambah, edit, hapus, dan pantau ketersediaan barang di minimarket.
- **Transaksi Penjualan**: Pencatatan transaksi penjualan dan penghitungan total belanja.
- **Laporan Penjualan**: Menyediakan laporan penjualan berdasarkan periode waktu tertentu.

## Persyaratan Sistem

- PHP 7.x atau lebih baru
- MySQL 5.x atau lebih baru
- Web server seperti Apache atau Nginx

## Penggunaan

1. Import database dengan menjalankan `sehati.sql` di MySQL.
2. Buka aplikasi dengan mengakses `index.php` melalui browser web.

## Struktur Database

Lihat `ERD Minimarket Sehati.png` dalam folder `dokumentasi` untuk memahami struktur database yang digunakan dalam proyek ini.

## Kontribusi

Jika ingin berkontribusi dalam proyek ini, harap lakukan fork terlebih dahulu dan buat pull request setelah perubahan dilakukan.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

