<?php
include ('../koneksi.php');
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];
    $kelas = $_POST['kelas'];
    $judul = $_POST['judul_masalah'];
    $detail = $_POST['detail_masalah'];
    $orang = $_POST['pelaku'];

    mysqli_query($koneksi, "insert into konsultasi (nama, alamat, noHP, tanggal, waktu, kelas, judul_masalah, detail_masalah, orang) values ('$nama', '$alamat', '$noHP', NOW(), NOW(), '$kelas', '$judul', '$detail', '$orang')");
    echo "<script>alert('Data pengajuan anda berhasil di input silahkan tekan OK')</script>";
    header("refresh:2; url=konsultasi_admin.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pengajuan Konsultasi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
    }
    .container {
      margin-top: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      border-radius: 10px;
      padding: 30px;
      background-color: #fff;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 50px;
      line-height: 50px;
      background-color: #212529;
      color: #f8f9fa;
      text-align: center;
    }
    @media (max-width: 576px) {
      .container {
        margin-top: 20px;
        padding: 15px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center mb-4">Ajukan Konsultasi</h2>
    <?php if (isset($_GET['pesan'])) { ?>
        <p class='alert alert-success'><?php echo $_GET['pesan']; ?></p>
    <?php } ?>
  <form action='' method="post">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas/Program" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="tanggal">No. HP:</label>
        <input type="number" name="noHP" class="form-control" id="tanggal" placeholder="Masukkan No. HP anda" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="jam">Alamat:</label>
        <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat anda" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="jam">Judul Masalah:</label>
        <input type="text" name="judul_masalah" class="form-control" placeholder="Masukkan judul masalah anda atau tema" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="jam">Detail Masalah:</label>
        <textarea name="detail_masalah" class="form-control" placeholder="Jelaskan detail masalah anda" required></textarea>
      </div>
      <center>
        <div class="col-md-6 mb-3">
        <label for="jam">Pelaku:</label>
        <input type="text" name="pelaku" class="form-control" placeholder="Masukkan Orang yang terkait pada masalah anda">
      </div>
      </center>
      
    </div>
    <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
  </form>
</div>

<footer>
  <p>Copyright &copy; Sena Pernata 2023</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
