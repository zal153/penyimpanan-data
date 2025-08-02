# [Penyimpanan Data Pribadi]

Aplikasi manajemen penyimpanan data pribadi yang memungkinkan pengguna untuk menyimpan, mengelola, dan mengamankan berkas-berkas digital dengan fitur backup otomatis dan pengaturan hak akses.

## 🛠️ Teknologi yang Digunakan

-   **Backend:** Laravel 11, PHP 8.2+
-   **Frontend:** Blade Template Engine / Livewire
-   **Database:** MySQL / MariaDB
-   **UI Framework:** Bootstrap 5
-   **Icons:** Feather Icons

## 🚀 Panduan Instalasi & Menjalankan Aplikasi

1.  **Clone & Setup Awal**

    ```bash
    git clone https://github.com/zal153/penyimpanan-data.git
    cd penyimpanan-data
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    ```

2.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan koneksi database Anda:

    ```env
    DB_DATABASE=penyimpanan_data
    DB_USERNAME=root
    DB_PASSWORD=
    ```

3.  **Migrasi & Seeder Database**

    ```bash
    # Menjalankan struktur tabel
    php artisan migrate

    # Mengisi data awal (termasuk data user)
    php artisan db:seed --class=UserSeeder
    ```

4.  **Jalankan Aplikasi**
    ```bash
    composer run dev
    ```
    Aplikasi kini siap diakses di `http://localhost:8000`

> **Catatan Penting**:
>
> -   Email dan Password bisa di lihat di database -> seeders -> UserSeeder

---
