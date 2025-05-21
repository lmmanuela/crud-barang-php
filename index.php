<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap');
    body {
        background-color: #fdf6e3;
        font-family: 'Poppins', sans-serif;
    }

    .header-box {
        background: linear-gradient(135deg, #bfa76f, #8b6f27);
        border-radius: 15px;
        padding: 30px 25px;
        color: #fff8dc;
        margin-bottom: 30px;
        box-shadow: 0 8px 25px rgba(139, 111, 39, 0.35);
        position: relative;
        overflow: hidden;
    }

    .header-box h2 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .header-box h2::after {
        content: '';
        display: block;
        width: 60px;
        height: 5px;
        background-color: #fff;
        border-radius: 5px;
        margin-top: 10px;
        transition: width 0.4s;
    }

    .header-box:hover h2::after {
        width: 100px;
    }

    .search-add-bar {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .search-bar {
        flex-grow: 1;
        display: flex;
        gap: 10px;
    }

    .search-bar input {
        border-radius: 8px;
        border: 1px solid #d4af37;
    }

    .btn-custom-gold {
        background-color: #fff8dc;
        color: #8b6f27;
        font-weight: 600;
        border: 1px solid #d4af37;
        padding: 8px 16px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-custom-gold:hover {
        background-color: #faecd6;
        color: #6b4e1d;
        box-shadow: 0 4px 10px rgba(212, 175, 55, 0.3);
        text-decoration: none;
    }

    .card-title {
        font-weight: 600;
        color: #8b6f27;
        margin-bottom: 0.3rem;
    }

    .card-price {
        font-weight: bold;
        color: #bfa76f;
        font-size: 1.1rem;
    }

    .card-text {
        color: #5c5c5c;
        font-size: 0.9rem;
        min-height: 60px;
    }

    .card-img-top {
        object-fit: cover;
        height: 180px;
        transition: transform 0.3s ease;
    }

    .card-img-top:hover {
        transform: scale(1.05);
    }

    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        cursor: pointer;
        border: 1px solid #f1e1b0;
    }

    .card:hover {
        box-shadow: 0 10px 25px rgba(191, 167, 111, 0.35);
        transform: scale(1.03);
    }

    .modal-header, .modal-footer {
        background-color: #fff8dc;
    }

    .modal-title {
        color: #8b6f27;
    }

    .btn-danger {
        background-color: #a94442;
        border-color: #a94442;
    }

    .btn-danger:hover {
        background-color: #843534;
        border-color: #843534;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <!-- Header -->
    <div class="header-box">
      <h2>DATA BARANG</h2>
      <div class="search-add-bar mt-3">
        <form class="search-bar" method="GET">
          <input class="form-control" type="text" name="cari" placeholder="Cari barang..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
          <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <a href="tambah.php" class="btn btn-custom-gold"><i class="bi bi-plus-circle"></i> Tambah Barang</a>
      </div>
    </div>

    <!-- Kartu Barang -->
    <div class="row g-4">
      <?php
      $filter = "";
      if (isset($_GET['cari']) && !empty(trim($_GET['cari']))) {
          $cari = mysqli_real_escape_string($conn, $_GET['cari']);
          $filter = "WHERE nama_barang LIKE '%$cari%'";
      }

      $query = mysqli_query($conn, "SELECT * FROM barang $filter");
      if (mysqli_num_rows($query) == 0) {
          echo "<div class='col-12 text-center'><p class='text-muted'>Barang tidak ditemukan.</p></div>";
      }

      while ($row = mysqli_fetch_assoc($query)) {
          $kode = htmlspecialchars($row['kode']);
          $nama = htmlspecialchars($row['nama_barang']);
          $deskripsi = htmlspecialchars($row['deskripsi']);
          $harga = number_format($row['harga_satuan'], 0, ',', '.');
          $jumlah = htmlspecialchars($row['jumlah']);
          $foto = htmlspecialchars($row['foto']);

          echo "
          <div class='col-md-4 col-sm-6'>
              <div class='card h-100 shadow-sm'>
                  <img src='upload/{$foto}' class='card-img-top' alt='Foto {$nama}'>
                  <div class='card-body d-flex flex-column'>
                      <small class='text-muted'>{$kode}</small>
                      <h5 class='card-title'>{$nama}</h5>
                      <p class='card-text'>{$deskripsi}</p>
                      <p class='card-price'>Rp {$harga}</p>
                      <p class='text-muted mb-3'>Stok: {$jumlah}</p>
                      <div class='mt-auto'>
                          <a href='edit.php?kode={$kode}' class='btn btn-custom-gold btn-sm me-2' title='Edit'>
                              <i class='bi bi-pencil'></i> Edit
                          </a>
                          <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#modalHapus{$kode}' title='Hapus'>
                              <i class='bi bi-trash'></i> Hapus
                          </button>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Modal Hapus -->
          <div class='modal fade' id='modalHapus{$kode}' tabindex='-1' aria-labelledby='modalHapusLabel{$kode}' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered'>
                  <div class='modal-content'>
                      <div class='modal-header'>
                          <h5 class='modal-title' id='modalHapusLabel{$kode}'>Konfirmasi Hapus</h5>
                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                      </div>
                      <div class='modal-body'>
                          Apakah kamu yakin ingin menghapus barang <strong>{$nama}</strong>?
                      </div>
                      <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>
                          <a href='hapus.php?kode={$kode}' class='btn btn-danger'>Hapus</a>
                      </div>
                  </div>
              </div>
          </div>
          ";
      }
      ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
