<?php
include "koneksi.php";

$kode_lama  = $_POST['kode_lama'];  // Kode lama untuk WHERE
$kode_baru  = $_POST['kode'];       // Kode baru jika diubah
$nama       = $_POST['nama_barang'];
$desk       = $_POST['deskripsi'];
$harga      = $_POST['harga_satuan'];
$jumlah     = $_POST['jumlah'];
$foto_baru  = $_FILES['foto']['name'];
$tmp_foto   = $_FILES['foto']['tmp_name'];

// Ambil nama foto lama untuk dihapus jika diganti
$query_old  = mysqli_query($conn, "SELECT foto FROM barang WHERE kode='$kode_lama'");
$data_old   = mysqli_fetch_assoc($query_old);
$foto_lama  = $data_old['foto'];

if ($foto_baru != "") {
    // Hapus file lama (jika ada dan bukan default)
    if (file_exists("upload/" . $foto_lama) && $foto_lama != "") {
        unlink("upload/" . $foto_lama);
    }

    // Upload file baru
    move_uploaded_file($tmp_foto, "upload/" . $foto_baru);

    $query = "UPDATE barang SET 
        kode='$kode_baru',
        nama_barang='$nama',
        deskripsi='$desk',
        harga_satuan=$harga,
        jumlah=$jumlah,
        foto='$foto_baru'
        WHERE kode='$kode_lama'";
} else {
    $query = "UPDATE barang SET 
        kode='$kode_baru',
        nama_barang='$nama',
        deskripsi='$desk',
        harga_satuan=$harga,
        jumlah=$jumlah
        WHERE kode='$kode_lama'";
}

mysqli_query($conn, $query);
header("Location: index.php");
?>
