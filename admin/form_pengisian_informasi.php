<?php 
include ('../koneksi.php');

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    mysqli_query($koneksi, "insert into informasi_guru (nama_guru, tanggal, waktu, judul_informasi, isi_informasi) values('$nama', NOW(), NOW(), '$judul', '$isi')");
    echo "<script>alert('Data berhasil di input silahkan tekan OK')</script>";
    header("refresh:1; url=informasi_admin.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Informasi</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border border-primary rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Form Pengisian Informasi</h3><hr>
                                    <?php if (isset($_GET['pesan'])) { ?>
                                        <p class='alert alert-success'><?php echo $_GET['pesan']; ?></p>
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control  border border-secondary" id="inputUsername" type="text" name="nama"
                                                placeholder="sena" required/>
                                            <label for="inputUsername">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control  border border-secondary" id="JudulInformasi" type="text"
                                                name="judul" placeholder="Judul" required/>
                                            <label for="JudulInformasi">Judul Informasi</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control  border border-secondary" id="isiInformasi"
                                                name="isi" placeholder="Password" style="height:130px;" required></textarea>
                                            <label for="isiInformasi">Isi Informasi</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary  border border-secondary" name="submit">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="bg-light">
                <div class="container-fluid mb-2">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="text-muted">Copyright &copy; Sena Pernata 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>