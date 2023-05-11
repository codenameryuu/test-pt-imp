# Test Backend PT IMP

## Tentang

Ini merupakan hasil test backend PT IMP mengggunakan framework laravel 10 dengan service patern

## Tools

Aplikasi ini dibangun menggunakan

1. Bahasa Pemrograman PHP versi 8.1
2. Framework Laravel 10
3. Database MYSQL

## Cara Instalasi

1. Install package yang ada di `composer.json` dengan eksekusi perintah

```bash
composer install
```

2. Untuk `base_url` defaultnya adalah `http://test-pt-imp.test`
3. Untuk `database` defaultnya adalah `test_pt_imp`
4. Ubah untuk settingan lainnya dapat dirubah melalui file `.env` lalu eksekusi perintah

```bash
php artisan config:cache
```

5. Generate JWT secret dengan eksekusi perintah

```bash
php artisan jwt:secret
```

6. Dokumentasi API

```bash
https://documenter.getpostman.com/view/14479523/2s93ebSqWx
```

7. Selamat mencoba... :)
