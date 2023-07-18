![Ungu.In Logo](https://ungu.in/assets/img/logo/unguin.svg)

# UNGU.IN CLONE

[Ungu.in](https://ungu.in/) merupakan website sortlink karya team OSORA yang dipelopori oleh 3 orang beranggotakan Muh Zaki Choiruddin Rizky Oktafian Nur Muhammad, Meisha Afifah Putri.

## Klarifikasi

Project ini hanya dibuat untuk portofolio, apabila terdapat seseorang yang merasa keberatan dengan project ini bisa hubungi saya.

## Tech Stack

**Client:** Blade

**Server:** Laravel 10

## Authors

-   [Ungu.in](https://ungu.in/) (Original Website)
-   [OSORA TEAM](https://www.linkedin.com/company/osorateam)
-   [ZumaAkbarID](https://github.com/ZumaAkbarID)

## Installation

Untuk menjalankan project ini.
Clone repository ini atau download, masuk ke directory hasil clone kemudian jalankan

```bash
  composer install
```

```bash
  cp .env.example .env
```

Lakukan konfigurasi pada file .env, sesuaikan database dan url project

```bash
APP_URL=https://ungu-in-clone.test

DB_DATABASE=clone_unguin
DB_USERNAME=xxxx
DB_PASSWORD=xxxx

ABSTRACTAPI_API_KEY="XXXXXX"

QUEUE_CONNECTION=database
```

kemudian jalankan

```bash
php artisan queue:table
php artisan migrate --seed
```

Selanjutnya

```bash
  (Non Virtual Domain)
  php artisan serve
```

```bash
  reload server, kemudian akses virtual domain yang telah dibuat
```

Jangan lupa jalankan queue karena data Visitor dianalisa di background

```bash
php artisan queue
```

atau

```bash
php artisan queue:listen
```
