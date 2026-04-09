# Aplikasi Pengaduan Sarana Sekolah

Aplikasi web untuk mengelola aspirasi dan pengaduan terkait sarana dan prasarana sekolah.

## Fitur Utama

- **Dashboard Admin**: Melihat statistik dan ringkasan aspirasi
- **Manajemen Aspirasi**: CRUD aspirasi/pengaduan dari siswa
- **Manajemen Data Siswa**: Input dan kelola data siswa
- **Manajemen Kategori**: Kategorisasi jenis aspirasi
- **Tracking Status**: Pantau progres aspirasi (Menunggu → Proses → Selesai)

## Struktur Database

### Tabel: siswas
- id (Primary Key)
- nis (Integer, Unique) - Nomor Induk Siswa
- nama_siswa (String)
- kelas (String)
- email (Email, Nullable)
- timestamps

### Tabel: kategoris
- id_kategori (Primary Key)
- ket_kategori (String, Max 30, Unique)
- timestamps

### Tabel: aspirasis
- id_aspirasi (Primary Key)
- id_pelaporan (Integer, Unique)
- nis (Integer, Foreign Key)
- id_kategori (Integer, Foreign Key)
- lokasi (String, Max 50)
- ket (String, Max 50)
- status (Enum: 'Menunggu', 'Proses', 'Selesai')
- feedback (Integer, Nullable)
- timestamps

## Relasi Database

- **Siswa** has many **Aspirasi** (melalui nis)
- **Kategori** has many **Aspirasi** (melalui id_kategori)
- **Aspirasi** belongs to **Siswa** dan **Kategori**

## Instalasi & Setup

1. **Clone/Setup Project**
```bash
cd pengaduan_saranasekolah
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database Migration**
```bash
php artisan migrate
```

5. **Seed Data (Optional)**
```bash
php artisan db:seed
```

6. **Run Development Server**
```bash
php artisan serve
npm run dev
```

Aplikasi akan berjalan di: `http://localhost:8000`

## Admin Login

- **Email**: admin@sekolah.com
- **Password**: password

## Struktur Folder Aplikasi

```
app/
├── Http/Controllers/
│   ├── AuthController.php
│   ├── DashboardController.php
│   ├── AspirasiController.php
│   ├── SiswaController.php
│   └── KategoriController.php
└── Models/
    ├── User.php
    ├── Siswa.php
    ├── Kategori.php
    └── Aspirasi.php

database/
├── migrations/
│   ├── *_create_users_table.php
│   ├── *_create_siswas_table.php
│   ├── *_create_kategoris_table.php
│   └── *_create_aspirasis_table.php
└── seeders/

resources/views/
├── layouts/app.blade.php
├── auth/login.blade.php
├── dashboard.blade.php
├── aspirasi/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── siswa/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
└── kategori/
    ├── index.blade.php
    ├── create.blade.php
    └── edit.blade.php

routes/web.php
```

## Route Mapping

### Public Routes
- `GET /` - Halaman welcome
- `GET /login` - Form login
- `POST /login` - Submit login

### Protected Routes (Authenticated)
- `GET /dashboard` - Dashboard admin
- `POST /logout` - Logout

### Aspirasi Routes
- `GET /aspirasi` - List aspirasi
- `GET /aspirasi/create` - Form buat aspirasi
- `POST /aspirasi` - Submit aspirasi baru
- `GET /aspirasi/{id}` - Detail aspirasi
- `GET /aspirasi/{id}/edit` - Form edit aspirasi
- `PUT /aspirasi/{id}` - Update aspirasi
- `DELETE /aspirasi/{id}` - Hapus aspirasi
- `PATCH /aspirasi/{id}/status` - Update status aspirasi

### Siswa Routes
- `GET /siswa` - List siswa
- `GET /siswa/create` - Form tambah siswa
- `POST /siswa` - Submit siswa baru
- `GET /siswa/{id}` - Detail siswa
- `GET /siswa/{id}/edit` - Form edit siswa
- `PUT /siswa/{id}` - Update siswa
- `DELETE /siswa/{id}` - Hapus siswa

### Kategori Routes
- `GET /kategori` - List kategori
- `GET /kategori/create` - Form tambah kategori
- `POST /kategori` - Submit kategori baru
- `GET /kategori/{id}/edit` - Form edit kategori
- `PUT /kategori/{id}` - Update kategori
- `DELETE /kategori/{id}` - Hapus kategori

## Validasi Data

### Aspirasi
- `id_pelaporan`: Required, Integer, Unique
- `nis`: Required, Integer
- `id_kategori`: Required, Integer
- `lokasi`: Required, String, Max 50
- `ket`: Required, String, Max 50
- `status`: Required, In: Menunggu/Proses/Selesai
- `feedback`: Nullable, Integer

### Siswa
- `nis`: Required, Integer, Unique
- `nama_siswa`: Required, String
- `kelas`: Required, String, Max 10
- `email`: Email, Nullable, Unique

### Kategori
- `ket_kategori`: Required, String, Max 30, Unique

## Status Aspirasi

1. **Menunggu** - Aspirasi baru menunggu ditindaklanjuti
2. **Proses** - Aspirasi sedang dalam penanganan
3. **Selesai** - Aspirasi telah selesai ditindaklanjuti

## Teknologi yang Digunakan

- **Framework**: Laravel 11
- **Database**: MySQL/MariaDB
- **Frontend**: Bootstrap 5.3
- **Icons**: Font Awesome 6.4
- **JavaScript**: Vanilla JS
- **CSS**: Bootstrap CSS + Custom CSS

## Fitur Keamanan

- CSRF Protection (Token di form)
- Password Hashing (bcrypt)
- SQL Injection Prevention (Eloquent ORM)
- Data Validation
- Authentication Middleware

## Development Tools

- Composer - PHP Package Manager
- npm - JavaScript Package Manager
- Laravel Artisan CLI - Command Line Interface
- SQLite/MySQL - Database

## Tips Development

1. Gunakan CSRF token di setiap form
2. Validasi data di controller
3. Gunakan model relationships untuk query
4. Implementasikan soft delete jika diperlukan
5. Log error dengan Log facade
6. Gunakan observers untuk event handling

## Troubleshooting

### Migration Error
```bash
php artisan migrate:refresh --seed
```

### Cache Clear
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Permission Error
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

## Support & Contact

Untuk pertanyaan atau dukungan, hubungi administrator sekolah.

---

**Aplikasi Pengaduan Sarana Sekolah** © 2026
