<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #fff8e1;
            font-family: 'Segoe UI', sans-serif;
            color: #6b4c00;
        }
        .form-container {
            max-width: 600px;
            margin: 70px auto;
            background: #fff3cd;
            padding: 40px 50px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.3);
        }
        h2 {
            font-weight: 700;
            color: #d4af37;
            text-align: center;
            margin-bottom: 35px;
        }
        label {
            font-weight: 600;
            color: #6b4c00;
        }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #d4af37;
            color: #6b4c00;
            background-color: #fffbe6;
        }
        .form-control:focus {
            border-color: #b7950b;
            box-shadow: 0 0 5px #b7950b;
            background-color: #fffbe6;
            color: #6b4c00;
        }
        .btn-primary {
            background-color: #d4af37;
            border: none;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #3b2f00;
        }
        .btn-primary:hover {
            background-color: #b7950b;
            box-shadow: 0 8px 18px rgba(183, 149, 11, 0.4);
            color: #fff;
        }
        .btn-secondary {
            background-color: #8c7b00;
            border: none;
            font-weight: 600;
            color: #fffbe6;
        }
        .btn-secondary:hover {
            background-color: #6f5c00;
            color: #fffbe6;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><i class="bi bi-plus-circle"></i> Tambah Barang</h2>
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" class="form-control" id="kode" name="kode" required />
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required />
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required />
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required />
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" id="foto" name="foto" />
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>
</body>
</html>
