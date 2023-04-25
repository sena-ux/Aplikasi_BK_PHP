


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Input Data</title>
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
  <h2 class="text-center mb-4">Inputkan Data Diri Kalian</h2>
  <form action='hasil_print/print_surat_permisi_siswa.php' method="post">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="kelas">Kelas/Program:</label>
        <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas/Program" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="tanggal">Hari/Tanggal:</label>
        <input type="date" name="hari" class="form-control" id="tanggal" placeholder="Masukkan Hari/Tanggal" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="jam">Jam ke:</label>
        <input type="number" name="jam" class="form-control" id="jam" placeholder="Masukkan Jam ke" required>
      </div>
    </div>
    <div class="mb-3">
      <label for="alasan">Alasan:</label>
      <textarea class="form-control" name="alasan" id="alasan" rows="3" placeholder="Masukkan Alasan" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<footer>
  <p>Copyright &copy; Sena Pernata 2023</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
