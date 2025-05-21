<?php
include "koneksi.php";
$kode = $_GET['kode'];

$foto = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM barang WHERE kode='$kode'"));
if ($foto['foto'] != "") {
    unlink("upload/" . $foto['foto']);
}

mysqli_query($conn, "DELETE FROM barang WHERE kode='$kode'");
header("Location: index.php");
?>
