<?php
include "koneksi.php";
$kode = $_GET['kode'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE kode='$kode'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap');

        body {
            background-color: #fdf6e3;
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 60px auto;
            background: linear-gradient(135deg, #fff9e6, #ffeaa7);
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(204, 164, 64, 0.4);
            border: 1px solid #d4af37;
        }

        h2 {
            font-weight: 700;
            color: #b8860b;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        h2 i {
            margin-right: 8px;
            color: #ffd700;
        }

        h2::after {
            content: '';
            display: block;
            width: 80px;
            height: 5px;
            background-color: #ffd700;
            border-radius: 5px;
            margin: 10px auto 0;
            box-shadow: 0 0 15px #ffd700aa;
            transition: width 0.4s ease;
        }

        h2:hover::after {
            width: 120px;
        }

        label {
            font-weight: 600;
            color: #6f4e00;
        }

        input.form-control, textarea.form-control {
            border: 1.5px solid #d4af37;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        input.form-control:focus, textarea.form-control:focus {
            border-color: #b8860b;
            box-shadow: 0 0 8px #ffd700bb;
            outline: none;
        }

        img.img-thumbnail {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 2px solid #d4af37;
            box-shadow: 0 0 10px #ffd70088;
        }

        .btn-primary {
            background-color: #d4af37;
            border: none;
            font-weight: 600;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #b8860b;
            box-shadow: 0 6px 15px rgba(184, 134, 11, 0.6);
        }

        .btn-secondary {
            background-color: #a37a00;
            border: none;
            font-weight: 600;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #7b5e00;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="form-container shadow-sm">
        <h2><i class="bi bi-pencil-square"></i> Edit Barang</h2>
        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
            <!-- Simpan kode lama untuk referensi update -->
            <input type="hidden" name="kode_lama" value="<?= htmlspecialchars($row['kode']) ?>" />

            <div class="mb-3">
                <label for="kode" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode" name="kode" value="<?= htmlspecialchars($row['kode']) ?>" required />
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($row['nama_barang']) ?>" required />
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= htmlspecialchars($row['deskripsi']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="<?= htmlspecialchars($row['harga_satuan']) ?>" required />
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= htmlspecialchars($row['jumlah']) ?>" required />
            </div>
            <div class="mb-3 text-center">
                <label class="form-label d-block mb-2">Foto Sekarang</label>
                <img src="upload/<?= htmlspecialchars($row['foto']) ?>" class="img-thumbnail" alt="Foto Barang" />
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Ganti Foto</label>
                <input class="form-control" type="file" id="foto" name="foto" />
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
