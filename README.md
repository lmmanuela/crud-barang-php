# CRUD Barang dengan PHP Native & Bootstrap
Proyek ini adalah aplikasi web CRUD (Create, Read, Update, Delete) sederhana untuk mengelola data barang. Dibuat menggunakan PHP Native, MySQL, dan Bootstrap 5 untuk tampilan antarmuka yang modern dan responsif.
## 🚀 Tutorial Instalasi & Setup Awal
**1. Siapkan Lingkungan**
Pastikan kamu sudah memiliki salah satu aplikasi web server berikut:
- XAMPP (disarankan)
- Laragon
- WAMP, dll
  
Jika menggunakan XAMPP, buat folder proyek di dalam direktori: `htdocs/crud_barang`.  
Lalu letakkan file yang sudah terlampir pada repository (koneksi.php, index.php, tambah.php, edit.php, hapus.php, proses_tambah.php, proses_edit.php, upload/) ke dalam folder `crud_barang`.  
    
**2. Buat Database dan Tabel**
- Buka `localhost/phpmyadmin`  
- Buat database baru, namanya: `db_barang`  
- Jalankan SQL ini:  
```sql
CREATE TABLE barang (
    kode VARCHAR(10) PRIMARY KEY,
    nama_barang VARCHAR(100),
    deskripsi TEXT,
    harga_satuan INT,
    jumlah INT,
    foto VARCHAR(100)
);
```
# Tampilan Data Barang
![image alt](https://github.com/lmmanuela/crud-barang-php/blob/6154d14886eab120d32e975ca1f97e728783a718/tampilan_data_barang.png)
# Tampilan Tambah Barang
![image alt](https://github.com/lmmanuela/crud-barang-php/blob/00c1a89e4ee2a52dffd8c9822c28ce2a5ffad6e4/tampilan_tambah_barang.png)
# Tampilan Edit Barang
![image alt](https://github.com/lmmanuela/crud-barang-php/blob/b98119090bfcf8b9d2a4c68db775062c97405d82/tampilan_edit_barang.png)
# Tampilan Hapus Barang
![image alt](https://github.com/lmmanuela/crud-barang-php/blob/b98119090bfcf8b9d2a4c68db775062c97405d82/tampilan_hapus_barang.png)
