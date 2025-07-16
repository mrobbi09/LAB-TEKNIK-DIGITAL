# Lab Teknik Digital

Selamat datang di proyek **Lab Teknik Digital**, sebuah sistem informasi berbasis web yang dibangun menggunakan [Laravel](https://laravel.com/) dan [Filament Admin Panel](https://filamentphp.com/) untuk mengelola kegiatan praktikum di Laboratorium Teknik Digital.

## 📘 Pengenalan

**Lab Teknik Digital** merupakan sistem yang dirancang untuk mendukung pengelolaan kegiatan praktikum di jurusan Teknik Elektro. Sistem ini mencakup dua jenis praktikum utama:

- **Praktikum Teknik Digital**  
  Fokus pada pembelajaran dasar-dasar sistem digital seperti gerbang logika, flip-flop, counter, dan perancangan sistem digital menggunakan software simulasi.

- **Praktikum Embedded System**  
  Berorientasi pada pemrograman dan integrasi perangkat keras seperti mikrokontroler (misalnya Arduino atau STM32), sensor, aktuator, serta komunikasi serial.

Sistem ini membantu dosen, asisten, dan mahasiswa dalam mengelola data secara efisien dan terpusat.

---

## 🚀 Fitur Utama

- **Manajemen Pengguna**  
  Admin dapat menambahkan dan mengelola akun pengguna berdasarkan peran (admin, asisten, peserta, dsb).

- **Pengguna**  
  Modul untuk melihat dan mengatur data-data pengguna seperti nama, email, dan peran.

- **Praktikum**  
  Mengelola daftar praktikum yang tersedia, seperti Teknik Digital dan Embedded System.

- **Judul Praktikum**  
  Menambahkan dan mengelola judul/topik untuk setiap sesi praktikum.

- **Tugas Pendahuluan**  
  Mahasiswa mengerjakan dan mengumpulkan tugas awal sebelum mengikuti sesi praktikum.

- **Tugas Akhir**  
  Mahasiswa mengumpulkan laporan akhir sebagai bagian dari penilaian praktikum.

- **Open Recruitment**  
  Modul rekrutmen terbuka untuk mencari asisten praktikum baru secara online.

- **Galeri Foto**  
  Menyimpan dokumentasi kegiatan praktikum dalam bentuk foto-foto yang dapat ditampilkan ke publik.

- **Prestasi**  
  Menampilkan daftar prestasi mahasiswa dan laboratorium dalam berbagai bidang, baik akademik maupun non-akademik.

---

## 🛠️ Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

### 1. Clone Repository
```bash
git clone https://github.com/zachriek/lab-td.git
cd lab-td
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run build
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

#### Edit file .env dan sesuaikan konfigurasi database:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab_td
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi dan Seeder Database
```bash
php artisan migrate --seed
```

### 5. Jalankan Server Lokal
```bash
php artisan serve
```

## 🔐 Akses Awal

Setelah seeding, Anda dapat login sebagai admin dengan kredensial default:
Email: admin@gmail.com
Password: admin#123


> ⚠️ Harap ubah password setelah login pertama kali demi keamanan.

---

## 📦 Teknologi yang Digunakan

- PHP 8.x
- Laravel 10.x
- Filament Admin Panel
- MySQL
- TailwindCSS
- Laravel Breeze

---

## 📂 Struktur Direktori Penting

- `app/Models` – Model Laravel (Praktikum, Tugas, Pengguna, dsb)
- `app/Filament` – Konfigurasi panel admin
- `database/migrations` – Struktur database
- `resources/views` – Tampilan kustom (jika ada)

---

## ✨ Kontribusi

Pull request, issue, dan feedback sangat diterima!  
Silakan fork repo ini dan kirim kontribusi Anda.

---

## 👨‍💻 Pengembang

Proyek ini dikembangkan oleh tim pengelola **Lab Teknik Digital**,  
Jurusan Teknik Elektro, Program Studi Teknik Informatika, Universitas Lampung.
