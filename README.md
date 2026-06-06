# 🌟 LinkBio AI - AI-Enhanced Link-in-Bio Platform

[![Vue.js](https://img.shields.io/badge/Vue.js-3.x-4fc08d?style=for-the-badge&logo=vue.js&logoColor=white)](https://vuejs.org/)
[![Laravel](https://img.shields.io/badge/Laravel-11.x-ff2d20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-v4.0-06b6d4?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![Groq API](https://img.shields.io/badge/Groq%20AI-LLaMA%203.1-orange?style=for-the-badge&logo=openai&logoColor=white)](https://groq.com/)

**LinkBio AI** adalah platform *link-in-bio* modern berbasis web yang memungkinkan pengguna membuat halaman profil personal (landing page) dengan satu link kustom (contoh: `/username`). Berbeda dengan platform link-in-bio konvensional, **LinkBio AI** dilengkapi dengan integrasi **Generative AI** yang membantu mengoptimalkan halaman profil Anda secara instan dan cerdas.

---

## ✨ Fitur Utama

### 1. ⚙️ Fitur Inti (Core Features)
* **Autentikasi Aman:** Sistem pendaftaran, login, dan logout menggunakan token API melalui **Laravel Sanctum**.
* **Manajemen Profil:** Kustomisasi nama, foto profil/avatar, profesi, bio, serta tautan sosial media (GitHub, LinkedIn, Instagram, dll.).
* **Manajemen Tautan (Links):** Tambah, edit, hapus, dan sembunyikan link. Dilengkapi pengurutan posisi link.
* **Halaman Publik Dinamis:** Halaman publik dengan slug unik (`/{username}`) yang dioptimalkan untuk performa tinggi dan ramah tampilan mobile.
* **Editor Tema Interaktif:** Kustomisasi desain halaman publik Anda dengan pilihan gaya tata letak (minimal, card, gradient), warna dasar (primary/background), dan font.
* **Dashboard Analytics:** Visualisasi total kunjungan profil, performa klik setiap tautan, breakdown tipe perangkat pengunjung (mobile/desktop/tablet), dan sumber rujukan (referrer).

### 2. 🤖 Fitur Cerdas AI (Powered by Groq API & LLaMA 3.1)
* **AI Bio Generator:** Membuat variasi deskripsi bio profesional atau kreatif berdasarkan keahlian dan profesi Anda dalam hitungan detik.
* **Smart Layout Suggester:** Rekomendasi palet warna dan tema tata letak yang paling sesuai dengan kepribadian atau bidang profesi Anda.
* **SEO Analyzer:** Menganalisis elemen halaman Anda dan memberikan saran optimasi SEO serta skor (0-100) agar halaman Anda mudah ditemukan mesin pencari.
* **Visitor Insight Summary:** Meringkas data kunjungan dan interaksi link Anda dalam bahasa natural (contoh: *"Pengunjung Anda paling aktif pada hari Senin, mayoritas dari mobile, dan link portfolio Anda paling diminati."*).

---

## 🛠️ Tech Stack

**Frontend:**
* **Vue.js 3** (Composition API)
* **Vite** (Build Tool)
* **Tailwind CSS v4** (Modern CSS Framework)
* **Pinia** (State Management)
* **Vue Router 4** (Client-side Routing)
* **Axios** (HTTP Client)

**Backend & Database:**
* **Laravel 11.x** (PHP Framework)
* **Laravel Sanctum** (SPA Authentication)
* **SQLite / PostgreSQL** (Database Utama)
* **Groq SDK / Http client** (Integrasi model LLaMA 3.1 8B)

---

## 🚀 Panduan Setup Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan project ini di komputer lokal Anda.

### 📋 Prasyarat (Prerequisites)
Pastikan komputer Anda sudah terinstal:
* **PHP >= 8.3**
* **Composer**
* **Node.js >= 18.x** & **npm**
* **Git**
* *(Opsional)* Akun [Groq Console](https://console.groq.com/) untuk mendapatkan API Key gratis.

---

### 📥 Langkah 1: Clone Repository
```bash
git clone https://github.com/Vals-devs/LinkBio.git
cd LinkBio
```

---

### 🖥️ Langkah 2: Setup Backend (Laravel)

1. Masuk ke direktori `backend`:
   ```bash
   cd backend
   ```
2. Instal dependensi PHP menggunakan Composer:
   ```bash
   composer install
   ```
3. Salin file konfigurasi `.env`:
   ```bash
   cp .env.example .env
   ```
4. Generate kunci aplikasi:
   ```bash
   php artisan key:generate
   ```
5. Konfigurasi Database (secara default menggunakan **SQLite**):
   * Di dalam file `.env`, pastikan konfigurasinya:
     ```env
     DB_CONNECTION=sqlite
     ```
   * Buat file database SQLite kosong jika belum ada (Laravel biasanya otomatis membuatnya jika tidak ditemukan saat migrasi).
6. Masukkan **Groq API Key** Anda di file `.env` jika ingin menguji fitur AI secara real (jika dikosongkan, aplikasi akan menggunakan mode simulasi/mock response otomatis):
   ```env
   GROQ_API_KEY=gsk_your_actual_groq_api_key_here
   ```
7. Jalankan migrasi database dan pengisian data contoh (seeding):
   ```bash
   php artisan migrate --seed
   ```
8. Jalankan server backend lokal:
   ```bash
   php artisan serve --port=8000
   ```
   *Backend Anda sekarang berjalan di `http://localhost:8000`.*

---

### 🎨 Langkah 3: Setup Frontend (Vue.js 3)

1. Buka terminal baru dan masuk ke direktori `frontend`:
   ```bash
   cd frontend
   ```
2. Instal dependensi Node.js menggunakan npm:
   ```bash
   npm install
   ```
3. Jalankan server frontend development:
   ```bash
   npm run dev
   ```
   *Frontend Anda sekarang berjalan di `http://localhost:5173`.*

---

### 🚪 Langkah 4: Pengujian & Akses Aplikasi
* Buka browser dan arahkan ke alamat **`http://localhost:5173`**.
* Anda dapat mendaftarkan akun baru atau menggunakan akun contoh hasil *database seeder*:
  * **Email:** `admin@example.com`
  * **Password:** `password`

---

## 🐳 Setup Menggunakan Docker (Alternatif)

Jika Anda ingin menjalankan seluruh service (Frontend, Backend, Database PostgreSQL, Redis, Nginx) secara bersamaan menggunakan Docker, pastikan Docker dan Docker Compose sudah terinstal, lalu jalankan:

```bash
docker-compose up --build
```
Akses aplikasi melalui reverse proxy Nginx di alamat `http://localhost`.

---

## 📂 Struktur Direktori Utama

```
LinkBio/
├── backend/               # Kode Laravel (REST API)
│   ├── app/               # Kontroler, Model, & Service AI (Groq)
│   ├── config/            # File konfigurasi aplikasi
│   ├── database/          # File migrasi & seeder database
│   ├── routes/            # Rute REST API (/routes/api.php)
│   └── .env.example       # Contoh konfigurasi lingkungan
│
├── frontend/              # Kode Vue.js 3 (SPA)
│   ├── src/
│   │   ├── components/    # Komponen visual (UI, AI Tools, Links)
│   │   ├── views/         # Tampilan Dashboard, Login, & Halaman Publik
│   │   ├── stores/        # Pinia state management (auth, theme, links)
│   │   └── main.js        # Entrypoint frontend
│   └── package.json       # Manajemen paket npm
│
├── docker-compose.yml     # Konfigurasi containerisasi Docker
├── nginx.conf             # Konfigurasi reverse proxy web server
└── README.md              # Dokumentasi ini
```

---

## 📄 Lisensi
Project ini dilisensikan di bawah lisensi **MIT**. Anda bebas menggunakannya untuk tujuan pembelajaran maupun komersial.
