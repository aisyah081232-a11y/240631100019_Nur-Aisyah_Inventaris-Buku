BukuKu – Sistem Inventaris Buku

1. Petunjuk Instalasi

1. Instal XAMPP dan Composer.
2. Salin folder project "BukuKu" ke dalam direktori "C:\xampp2\htdocs".
3. Pastikan Apache dan MySQL sudah dijalankan melalui XAMPP.
4. Pastikan CodeIgniter 4 sudah terpasang pada project.

2. Konfigurasi Database

1. Buka phpMyAdmin melalui "http://localhost/phpmyadmin".
2. Buat database dengan nama "inventaris_buku".
3. Import file "inventaris_buku.sql" ke database tersebut.
4. Buka file ".env" pada folder utama project.
5. Sesuaikan konfigurasi database berikut:

database.default.hostname = localhost
database.default.database = inventaris_buku
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306

3. Cara Menjalankan Aplikasi

1. Buka Command Prompt (CMD).
2. Masuk ke direktori project:

cd /d C:\xampp2\htdocs\BukuKu

3. Jalankan perintah berikut:

php spark serve

4. Buka browser.
5. Akses alamat berikut:

"http://localhost:8080/buku"

Aplikasi BukuKu siap digunakan untuk mengelola data inventaris buku.