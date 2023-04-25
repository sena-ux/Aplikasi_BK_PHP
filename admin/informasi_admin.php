<?php
require('../koneksi.php');

if (!isset($_SESSION['username']) || !isset($_COOKIE['CookieUsername'])) {
    header("location:index.php");
    exit();
}

$sql = "select * from informasi_guru";
$s1 = mysqli_query($koneksi, $sql);
$result = mysqli_fetch_all($s1, MYSQLI_ASSOC);

$koneksi = null;
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
                        <h1 class="mt-4">Informasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    <div class="card mb-4 mt-2">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Total Informasi
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Judul</th>
                                            <th>Isi informasi</th>
                                            <th>Lihat</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Judul</th>
                                            <th>Isi informasi</th>
                                            <th>Lihat</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($result as $row) { ?>
                                        <tr>
                                            <td><?php echo ucwords($row['nama_guru']) ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($row['tanggal'])) ?></td>
                                            <td><?php echo date("h:i:s A", strtotime($row['waktu'])) ?></td>
                                            <td><?php echo ucwords($row['judul_informasi']) ?></td>
                                            <td><?php echo ucwords($row['isi_informasi']) ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary p-2 m-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id_guru'] ?>">
                                                <i class="fa fa-search"></i>Detail
                                                </button>

                                                    <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $row['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header t-0">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo ucwords($row['judul_informasi']) ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo ucfirst(strtolower($row['isi_informasi'])) ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div>
                                                            <input type="text" name="" style="width:90px; height: 20px;" class="form-control btn btn-info" value="<?php echo $row['waktu'] ?>" readonly disabled>
                                                        </div>
                                                        <div>
                                                            <input type="text" name="" style="width:130px; margin-right:10px; height: 20px;" class="form-control btn btn-info" value="<?php echo $row['tanggal'] ?>" readonly disabled>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-space-between text-decoration-underline"><?php echo strtoupper(substr($row['nama_guru'], 0, 15)) ?></h5>
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