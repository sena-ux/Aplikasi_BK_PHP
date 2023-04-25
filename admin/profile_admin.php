<?php
include ('../koneksi.php');
if (!isset($_SESSION['username']) || !isset($_COOKIE['CookieUsername'])) {
    header("location:index.php");
    exit();
}
$nama = $_SESSION['username'];
$pass = $_SESSION['password'];

$sql = mysqli_query($koneksi, "select * from user where nama='$nama' AND password='$pass'");
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body{
                overflow-y: hidden;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?php include ('layouts/navbar.php'); ?>
        
        <?php include ('layouts/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <?php foreach($result as $isi) {?>
                    <div class="container-fluid px-3 ">
                    <section style="background-color: #eee;">
                        <div class="container py-4">
                            <div class="row">
                            <div class="col">
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src='assets/gambar/<?php echo $isi['foto'] ?>' alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"></h5>
                                    <p class="text-muted mb-4"><?php echo $isi['nama'] ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-outline-primary ms-1"  onclick='window.location.href="chatcuaks";'>Message</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo ucwords($isi['nama']) ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['email'] ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">No HP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['noHP'] ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Kelas</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['kelas'] ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Alamat</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['alamat'] ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIS</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['nis'] ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NISN</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['nisn'] ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIP Guru</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['nip'] ?></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Role</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $isi['level'] ?></p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </section>
                    </div>
                    <?php } ?>
                </main>
                <?php include('layouts/footer.php') ?>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>