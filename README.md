# Aplikasi CRUD Penjualan Pakaian - SPA JQuery Ajax

Aplikasi ini adalah sebuah aplikasi berbasis Single Page Application (SPA) yang dibangun menggunakan JQuery dan Ajax untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data penjualan pakaian. Aplikasi ini dirancang untuk memudahkan pelanggan dalam melakukan pemesanan dan pembayaran, serta memudahkan admin/kasir dalam mengelola transaksi dan melihat laporan penjualan.

## Diagram Alir Data (DFD)

### Gambar 1: Diagram Alir Data (DFD)

![DFD](path/to/dfd_image.png)

### Penjelasan DFD

- **Pelanggan** mengirimkan pesanan ke **Proses 2: Pemesanan Barang**.
- **Proses 2** mengecek **Database Barang** untuk stok, lalu mengirimkan data ke **Proses 3: Pembayaran**.
- **Proses 3** menghasilkan **Nota Penjualan** untuk Pelanggan.
- **Admin/Kasir** dapat memproses transaksi dan melihat **Laporan Penjualan** dari **Database Penjualan**.

Diagram ini mencakup entitas dan aliran data utama dalam proses penjualan barang pakaian.

## Screenshot Aplikasi

### Gambar 1: Home Data
![Tambah Data](path/to/tambah_data.png)

### Gambar 2: Tambah Data
![Ubah Data](path/to/ubah_data.png)

### Gambar 3: Ubah Data
![Lihat Data](path/to/lihat_data.png)

### Gambar 4: Lihat Data
![Hapus Data](path/to/hapus_data.png)

### Gambar 5: Hapus Data
![Hapus Data](path/to/hapus_data.png)

## Proses Instalasi

1. **Download Project atau Cloning**
   - Anda dapat mendownload project ini langsung atau melakukan cloning menggunakan perintah berikut:
     ```bash
     git clone https://github.com/username/repository-name.git
     ```

2. **Composer Install**
   - Jalankan perintah berikut untuk menginstall dependencies:
     ```bash
     composer install
     ```

3. **Migration dan Seeder**
   - Lakukan migration dan seeder untuk mengatur database:
     ```bash
     php artisan migrate
     php artisan migrate:fresh --seed
     ```

4. **Jalankan Project**
   - Jalankan project dengan perintah berikut:
     ```bash
     php artisan serve
     ```

## Kontribusi

Jika Anda ingin berkontribusi pada project ini, silakan fork repository ini dan buat pull request dengan perubahan yang Anda usulkan.

## Lisensi

Project ini dilisensikan di bawah [MIT License](LICENSE).
