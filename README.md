# QuickBite

![QuickBite Logo](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/a28874a2-f756-4717-92d5-8de968effb4e)

## Kelompok 3

Proyek Akhir Framework
### Anggota Kelompok:
1. [Muh. Hafiz](https://github.com/Hafizz7) (2109106045)
2. [Andi Rachmad Triandika Rusli](https://github.com/andirchmd) (2109106132)

## Pembukaan

QuickBite adalah platform pesanan makanan online yang memudahkan pembeli untuk memilih dan memesan makanan dari berbagai toko yang tersedia. Selain itu, penjual dapat dengan mudah menambahkan toko dan menu makanan mereka untuk dijual kepada pembeli.

## Fitur

- Pemesanan makanan online.
- Penambahan toko dan menu makanan oleh penjual.
- Otentikasi pengguna untuk pembeli dan penjual.
- Daftar pesanan dan status pesanan.

## Alur Tampilan Pembeli

1. **Beranda**
   - Daftar toko dan Tampilan depan halaman.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/7270d653-57dd-439b-b5fc-76c2b213d682)

2. **Login, Registrasi dan Edit Profile**
   - Halaman Login
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/33cd8baf-71a8-4560-be71-6f8972f2c000)

   - Halaman Register
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/de0186f5-be96-4623-986a-8ea7143d5439)
     
   - Halaman Edit Profile
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/b01e8af5-e155-4d15-9cc0-75ce9cb462f0)

3. **Pilih Menu**
   - Lihat detail menu makanan.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/ee344ef8-12d4-4f55-a339-9c4e564a0273)
     
4. **Keranjang Belanja**
   - Tambahkan menu ke keranjang belanja dan Konfirmasi Pesanan.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/82449d70-c49b-4ba4-beef-514cfd935c2a)

5. **Status Pesanan**
   - Lacak status pesanan dan terima notifikasi status pesanan.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/75e1764a-6143-4f71-880c-e5c6e6d93b75)

## Alur Tampilan Penjual

1. **Dashboard Penjual**
   - Atur daftar menu makanan.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/8e4ab6f0-0a90-4316-b957-34d9b7a1f2f2)


2. **Kelola Toko**
   - Tambahkan atau edit informasi toko.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/ef3814b7-f1f9-407d-b58b-c2cb2f5e997e)


3. **Tambah Menu**
   - Tambahkan menu baru.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/fb3bd554-1dd9-4750-a319-17a4caa59b7e)

   - Tambahkan makanan.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/02f7d659-c232-4230-b330-81bcfb1c1ece)

4. **Daftar Pesanan**
   - Lihat dan konfirmasi pesanan.
     ![image](https://github.com/andirchmd/PA_Framework_QuickBite/assets/114181058/36ad72b2-bbad-4e6e-9310-8058672656a2)

## Instalasi

1. Clone repositori [ini](https://github.com/Hafizz7/PA_Framework_QuickBite.git).
2. Copy (`.env.example`) menjadi (`.env`) lalu lakukan konfigurasi file (`.env`) dengan mengatur database dan base_envnya.
3. Buat key baru pada env dengan perintah `php artisan key:generate`
4. Instal dependensi dengan menjalankan `composer install` dan `npm install`.
5. Migrate database dengan perintah `php artisan migrate`.
6. Jalankan server lokal dengan perintah `npm run dev`, `php artisan serve` dan juga `php artisan serve --port=8001` untuk API-nya.

Terima kasih telah menggunakan QuickBite!
