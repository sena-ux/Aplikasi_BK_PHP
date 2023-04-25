<?php
require('../koneksi.php');
if (!isset($_SESSION['username']) || !isset($_COOKIE['CookieUsername'])) {
    header("location:index.php");
    exit();
}

$sql = "select * from konsultasi";
$s1 = mysqli_query($koneksi, $sql);
$hasil = mysqli_fetch_all($s1, MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Konsultasi</title>
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
                        <h1 class="mt-4">Konsultasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    <div class="card mb-4 mt-2">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Total Konsultasi
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($hasil as $isi) {?>
                                        <tr>
                                            <td><?php echo ucwords($isi['nama']) ?></td>
                                            <td><?php echo $isi['kelas'] ?></td>
                                            <td><?php echo ucfirst(strtolower($isi['alamat'])) ?></td>
                                            <td><?php echo $isi['noHP'] ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($isi['tanggal'])) ?></td>
                                            <td><?php echo date("H:i:s", strtotime($isi['waktu'])) ?></td>
                                            <td>
                                             <!-- Button trigger modal -->
                                             <button type="button" class="btn btn-primary p-2 m-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $isi['id'] ?>">
                                                <i class="fa fa-search"></i>Detail
                                                </button>

                                                    <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $isi['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header t-0">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo ucwords($isi['nama']) ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body ml-5">
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo ucwords($isi['nama']) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Kelas</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $isi['kelas'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo ucfirst(strtolower($isi['alamat'])) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">No. HP</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $isi['noHP'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo date("d:m:Y", strtotime($isi['tanggal'])) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Waktu</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo date("H:i:s", strtotime($isi['waktu'])) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" readonly class="form-control-plaintext text-info" id="staticEmail" value="Diproses">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div>
                                                            <input type="text" name="" style="width:90px; height: 20px;" class="form-control btn btn-info" value="<?php echo date("h:i:s", strtotime($isi['waktu'])) ?>" readonly disabled>
                                                        </div>
                                                        <div>
                                                            <input type="text" name="" style="width:130px; margin-right:10px; height: 20px;" class="form-control btn btn-info" value="<?php echo date("d:m:Y", strtotime($isi['tanggal'])) ?>" readonly disabled>
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