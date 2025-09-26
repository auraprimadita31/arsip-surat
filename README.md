# Aplikasi Arsip Surat - Kelurahan Karangduren

Aplikasi ini dibuat untuk memenuhi tugas Ujian Sertifikasi .

## 🎯 Tujuan Aplikasi
Tujuan utama aplikasi ini adalah untuk menyediakan sistem pengarsipan surat digital yang mudah digunakan bagi perangkat desa Karangduren, memungkinkan penyimpanan, pencarian, dan pengunduhan surat dalam format PDF.

## ✨ Fitur Utama
- CRUD (Create, Read, Update, Delete) untuk data arsip surat.
- CRUD untuk data kategori surat.
- Unggah file surat dalam format PDF.
- Fitur pencarian surat berdasarkan judul.
- Fitur unduh file surat.
- Pratinjau dokumen PDF langsung di halaman web.

## 🚀 Cara Menjalankan Proyek
1. Clone repository ini: `git clone https://github.com/NamaAnda/arsip-surat.git`
2. Masuk ke direktori proyek: `cd arsip-surat`
3. Install semua dependency: `composer install`
4. Salin file `.env.example` menjadi `.env`: `copy .env.example .env`
5. Generate application key: `php artisan key:generate`
6. Buat database baru dengan nama `arsip_surat`.
7. Atur koneksi database di file `.env`.
8. Jalankan migrasi untuk membuat tabel: `php artisan migrate`
9. Buat symbolic link untuk storage: `php artisan storage:link`
10. Jalankan server: `php artisan serve`
11. Buka aplikasi di `http://127.0.0.1:8000`


## 📸 Screenshot Aplikasi
![Halaman Utama](https://github.com/auraprimadita31/arsip-surat/issues/1#issue-3458213104)
![Halaman Unggah](https://github.com/auraprimadita31/arsip-surat/issues/2#issue-3458218148)


Credit By : Aura Primadita Pratama
