# 📋 Project Brief — AI-Enhanced Link-in-Bio Platform

> **Status:** Planning Phase  
> **Author:** Ival Permana  
> **Dibuat:** Juni 2026  
> **Estimasi Durasi:** 6–8 minggu

---

## 1. Overview

Platform link-in-bio berbasis web yang memungkinkan pengguna membuat halaman profil personal dengan satu link. Berbeda dari Linktree biasa, platform ini dilengkapi fitur **AI generative** untuk membantu pengguna mengoptimalkan profil mereka secara otomatis — mulai dari pembuatan bio, saran layout, analisis SEO, hingga ringkasan perilaku pengunjung.

Project ini ditujukan sebagai:
- **Portofolio freelance** yang menunjukkan kemampuan fullstack + AI integration
- **Produk SaaS mini** yang berpotensi dikembangkan lebih lanjut
- **Learning project** untuk teknologi baru: Laravel, Vue.js 3, dan Groq API

---

## 2. Tech Stack

### Frontend
| Teknologi | Versi | Kegunaan |
|---|---|---|
| Vue.js | 3.x | Framework utama frontend |
| Tailwind CSS | v4 | Styling & utility classes |
| Pinia | Latest | State management |
| Vue Router | 4.x | Client-side routing |
| Axios | Latest | HTTP client ke backend |

### Backend
| Teknologi | Versi | Kegunaan |
|---|---|---|
| Laravel | 11.x | Framework backend utama |
| PHP | 8.3+ | Bahasa backend |
| Laravel Sanctum | Latest | Autentikasi SPA (token-based) |
| Laravel Telescope | Latest | Debugging & monitoring (dev) |

### Database & Cache
| Teknologi | Kegunaan |
|---|---|
| PostgreSQL | Database utama |
| Redis | Cache & session |

### AI Layer
| Teknologi | Kegunaan |
|---|---|
| Groq API | Generative AI (bio, insight, SEO) |
| Model: LLaMA 3.1 8B | Model default — gratis, cepat |
| Model: Gemma 2 9B | Alternatif untuk teks lebih panjang |

### Infrastructure
| Teknologi | Kegunaan |
|---|---|
| Docker | Containerisasi semua service |
| Docker Compose | Orchestrate multi-container |
| Nginx | Reverse proxy & serve frontend |
| Homelab Server | Deployment target utama |

---

## 3. Fitur

### 3.1 Core Features (Wajib)

- [ ] **Autentikasi** — Register, Login, Logout (Laravel Sanctum)
- [ ] **Profile Management** — Edit nama, foto, profesi, bio, sosial media
- [ ] **Link Management** — Tambah, edit, hapus, reorder link (drag & drop)
- [ ] **Public Page** — Halaman publik dengan slug unik (`/username`)
- [ ] **Analytics Basic** — Total klik per link, total visitor, device breakdown
- [ ] **Custom Theme** — Pilih warna & font dasar untuk halaman publik

### 3.2 AI Features (Utama)

- [ ] **AI Bio Generator**
  - Input: nama, profesi, skill, tone (profesional / casual / kreatif)
  - Output: 2–3 variasi bio siap pakai
  - Powered by: Groq API (LLaMA 3.1 8B)

- [ ] **Smart Layout Suggester**
  - Berdasarkan profesi yang diinput, AI rekomendasikan kombinasi layout + warna yang sesuai
  - Powered by: Groq API + rule-based logic

- [ ] **SEO Analyzer**
  - Analisis bio, username, dan link title
  - Output: skor SEO (0–100) + daftar saran perbaikan
  - Powered by: Groq API

- [ ] **Visitor Insight Summary**
  - Dari data analytics yang terkumpul, AI generate ringkasan dalam bahasa natural
  - Contoh output: *"Pengunjungmu paling aktif hari Senin pagi, mayoritas dari mobile, dan link GitHub paling banyak diklik."*
  - Powered by: Groq API

### 3.3 Nice to Have (Opsional)

- [ ] Custom domain support
- [ ] Link scheduling (link aktif pada waktu tertentu)
- [ ] QR code generator untuk halaman publik
- [ ] Dark/light mode toggle

---

## 4. Arsitektur Sistem

```
┌─────────────────────────────────────────────────┐
│                   USER BROWSER                   │
│              Vue.js 3 + Tailwind v4              │
└──────────────────────┬──────────────────────────┘
                       │ HTTP / REST API
┌──────────────────────▼──────────────────────────┐
│                 NGINX (Reverse Proxy)            │
│         /api  →  Laravel    /  →  Vue SPA        │
└──────────┬───────────────────────────────────────┘
           │
┌──────────▼──────────┐        ┌──────────────────┐
│   Laravel 11 API    │──────▶ │   PostgreSQL DB   │
│   (Port 8000)       │        │   (Port 5432)     │
└──────────┬──────────┘        └──────────────────┘
           │                   ┌──────────────────┐
           │──────────────────▶│   Redis Cache    │
           │                   │   (Port 6379)    │
           │                   └──────────────────┘
           │
┌──────────▼──────────┐
│     Groq API        │
│  (External Service) │
│  api.groq.com       │
└─────────────────────┘
```

---

## 5. Struktur Database (ERD Sederhana)

### Tabel `users`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | UUID | Primary key |
| name | string | Nama lengkap |
| email | string | Email unik |
| password | string | Hashed |
| username | string | Slug unik untuk public page |
| avatar | string | Path foto profil |
| profession | string | Profesi (untuk AI suggester) |
| bio | text | Bio profil |
| created_at | timestamp | — |

### Tabel `links`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | UUID | Primary key |
| user_id | UUID | Foreign key → users |
| title | string | Label link |
| url | string | URL tujuan |
| icon | string | Ikon (opsional) |
| order | integer | Urutan tampil |
| is_active | boolean | Tampil/sembunyi |
| click_count | integer | Total klik |
| created_at | timestamp | — |

### Tabel `page_visits`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | UUID | Primary key |
| user_id | UUID | Foreign key → users |
| ip_address | string | IP pengunjung (anonymized) |
| device_type | string | mobile / desktop / tablet |
| referrer | string | Dari mana datangnya |
| visited_at | timestamp | Waktu kunjungan |

### Tabel `themes`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | UUID | Primary key |
| user_id | UUID | Foreign key → users |
| primary_color | string | Hex color |
| background_color | string | Hex color |
| font_family | string | Nama font |
| layout_style | string | minimal / card / gradient |

---

## 6. API Endpoints

### Auth
```
POST   /api/auth/register
POST   /api/auth/login
POST   /api/auth/logout
GET    /api/auth/me
```

### Profile
```
GET    /api/profile
PUT    /api/profile
POST   /api/profile/avatar
```

### Links
```
GET    /api/links
POST   /api/links
PUT    /api/links/{id}
DELETE /api/links/{id}
PUT    /api/links/reorder
```

### Analytics
```
GET    /api/analytics/summary
GET    /api/analytics/links
GET    /api/analytics/visitors
```

### AI
```
POST   /api/ai/generate-bio
POST   /api/ai/suggest-layout
POST   /api/ai/analyze-seo
POST   /api/ai/visitor-insight
```

### Public
```
GET    /{username}              → halaman publik
POST   /{username}/track/{link_id} → catat klik link
```

---

## 7. Struktur Folder

### Backend (Laravel)
```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── ProfileController.php
│   │   ├── LinkController.php
│   │   ├── AnalyticsController.php
│   │   └── AI/
│   │       ├── BioGeneratorController.php
│   │       ├── LayoutSuggesterController.php
│   │       ├── SeoAnalyzerController.php
│   │       └── VisitorInsightController.php
│   └── Middleware/
├── Models/
│   ├── User.php
│   ├── Link.php
│   ├── PageVisit.php
│   └── Theme.php
├── Services/
│   └── GroqService.php       ← wrapper untuk Groq API
└── ...

database/migrations/
routes/api.php
```

### Frontend (Vue.js 3)
```
src/
├── components/
│   ├── ui/                   ← komponen reusable
│   ├── links/
│   ├── analytics/
│   └── ai/
├── views/
│   ├── auth/
│   │   ├── Login.vue
│   │   └── Register.vue
│   ├── dashboard/
│   │   ├── Profile.vue
│   │   ├── Links.vue
│   │   ├── Analytics.vue
│   │   └── AITools.vue
│   └── public/
│       └── PublicPage.vue
├── stores/                   ← Pinia stores
│   ├── auth.js
│   ├── links.js
│   └── analytics.js
├── services/
│   └── api.js                ← Axios instance
└── router/
    └── index.js
```

---

## 8. Docker Compose Setup

```yaml
# docker-compose.yml
services:
  nginx:
    image: nginx:alpine
    ports:
      - "80:80"
    volumes:
      - ./nginx.conf:/etc/nginx/conf.d/default.conf

  backend:
    build: ./backend
    environment:
      DB_HOST: postgres
      REDIS_HOST: redis
      GROQ_API_KEY: ${GROQ_API_KEY}

  frontend:
    build: ./frontend

  postgres:
    image: postgres:16
    environment:
      POSTGRES_DB: linkinbio
      POSTGRES_USER: ${DB_USER}
      POSTGRES_PASSWORD: ${DB_PASSWORD}
    volumes:
      - pgdata:/var/lib/postgresql/data

  redis:
    image: redis:alpine

volumes:
  pgdata:
```

---

## 9. Milestone & Timeline

| Minggu | Target |
|---|---|
| **1** | Setup project: Laravel + Vue 3 + Docker Compose berjalan |
| **2** | Autentikasi selesai (register, login, sanctum token) |
| **3** | CRUD links + public page bisa diakses via `/username` |
| **4** | Analytics (track klik + visitor) selesai |
| **5** | Groq API integration: AI Bio Generator + SEO Analyzer |
| **6** | AI Layout Suggester + Visitor Insight Summary |
| **7** | Polish UI, testing, bug fixing |
| **8** | Deploy ke homelab, dokumentasi README |

---

## 10. Catatan Tambahan

- **Desain UI/UX:** Ditangani terpisah oleh developer (Figma/konsep sendiri)
- **Groq API Key:** Daftar gratis di [console.groq.com](https://console.groq.com) — tidak perlu kartu kredit
- **Model AI default:** `llama-3.1-8b-instant` — paling cepat dan gratis
- **Deployment:** Homelab server dengan Docker, Nginx sebagai reverse proxy
- **Keamanan:** Semua AI request diproses di backend, Groq API key tidak pernah terekspos ke frontend

---

*Brief ini bersifat living document — dapat diperbarui seiring perkembangan project.*
