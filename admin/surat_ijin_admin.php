<?php
require('../koneksi.php');
if (!isset($_SESSION['username']) || !isset($_COOKIE['CookieUsername'])) {
    header("location:index.php");
    exit();
}
$sql = mysqli_query($koneksi, "select * from surat_ijin");
$hasil = mysqli_fetch_all($sql, MYSQLI_ASSOC);

$jp = "jam ke-";
$title = "surat permisi siswa";
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Permisi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include ('layouts/navbar.php'); ?>
        
        <?php include ('layouts/sidebar.php'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Surat Ijin Permisi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    <div class="card mb-4 mt-2">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Total Siswa yang Permisi
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Kelas</th>
                                            <th>No. Absen</th>
                                            <th>Hari, Tanggal</th>
                                            <th>Jam Pelajaran</th>
                                            <th>Alasan</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Kelas</th>
                                            <th>No. Absen</th>
                                            <th>Hari, Tanggal</th>
                                            <th>Jam Pelajaran</th>
                                            <th>Alasan</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($hasil as $row) { ?>
                                        <tr>
                                            <td><?php echo ucwords($row['nama']) ?></td>
                                            <td><?php echo $row['kelas'] ?></td>
                                            <td><?php echo $row['noAbs'] ?></td>
                                            <td><?php echo strftime('%A, %d-%m-%Y', strtotime($row['tanggal'])) ?></td>
                                            <td><?php echo date('H:i:s', strtotime($row['jam_ke'])) ?></td>
                                            <td><?php echo ucfirst(strtolower($row['alasan'])) ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary p-2 m-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>">
                                                <i class="fa fa-search"></i>Detail
                                                </button>
                                                    <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header t-0">
                                                            <h5 class="modal-title" id=""><?php echo strtoupper($title) ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- <img src="assets/img/header.jpg" alt="header"> -->
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo ucwords($row['nama']) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Kelas</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['kelas'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">No. Absen</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo ($row['noAbs']) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Hari, Tanggal</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo date("d:m:Y", strtotime($row['tanggal'])) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Jam Pelajaran</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['jam_ke'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Alasan</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['alasan'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div>
                                                            <input type="text" name="" style="width:100px; height: 25px;" class="form-control text-secondary" value="<?php echo ucwords($jp),$row['jam_ke'] ?>" readonly disabled>
                                                        </div>
                                                        <div>
                                                            <input type="text" name="" style="width:190px; margin-right:10px; height: 25px;" class="form-control text-secondary" value="<?php echo strftime('%A, %d-%m-%Y', strtotime($row['tanggal'])) ?>" readonly disabled>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-space-between text-decoration-underline"></h5>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            <div class="text-muted">Copyright &copy; Sena Pernata 2023</div>
                        </div>
                    </div>
                </footer>
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