## Clone project dari GitHub
git clone https://github.com/gadingsukma/IndNews.git  
cd IndNews  
## Install dependencies
composer install  
## Setup environment
copy file .env.example jadi .env  
Lalu edit dan sesuaikan kebutuhan di bagian .env, contoh:  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=8889  
DB_DATABASE=indnews  
DB_USERNAME=root  
DB_PASSWORD=root  
## Generate app key
php artisan key:generate  
## Jalankan migration
php artisan migrate  
## Buat user admin pada filament
php artisan make:filament-user  
Ikuti dan isi prompt-nya untuk membuat akun  
## Jalankan server Laravel
php artisan serve  
## Sebelum membuka http://127.0.0.1:8000, wajib mengisi data konten di panel admin
### Buka admin panel isi email dan password yang sudah dibuat saat buat user admin pada filament lalu login
isi semua data yang dibutuhkan sebanyak mungkin setelah itu bisa buka http://127.0.0.1:8000







