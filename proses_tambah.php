<?php
include "koneksi.php";

$kode      = $_POST['kode'];
$nama      = $_POST['nama_barang'];
$desk      = $_POST['deskripsi'];
$harga     = $_POST['harga_satuan'];
$jumlah    = $_POST['jumlah'];
$foto      = $_FILES['foto']['name'];
$tmp_foto  = $_FILES['foto']['tmp_name'];

if ($foto != "") {
    move_uploaded_file($tmp_foto, "upload/" . $foto);
}

$query = "INSERT INTO barang VALUES ('$kode', '$nama', '$desk', $harga, $jumlah, '$foto')";
mysqli_query($conn, $query);

header("Location: index.php");
?>
