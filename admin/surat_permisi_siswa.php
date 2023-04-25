<?php
require('../koneksi.php');
if (!isset($_SESSION['username']) || !isset($_COOKIE['CookieUsername'])) {
    header("location:index.php");
    exit();
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
        <title>Permisi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">SMKN 1 ABANG</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile_admin.php">Profile</a></li>
                        <li><a class="dropdown-item" href="forgot_password_admin.php">Forgot Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <?php include ('layouts/navbar.php'); ?>
        
        <?php include ('layouts/sidebar.php'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Surat Permisi Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="border-5" style="width:700px; border: 2px solid black;">
                                <img src="assets/img/header.jpg" alt="" style="width:100%;">
                                <div class="mt-3">
                                    <h3 class="text-center text-uppercase fw-bold text-decoration-underline">SURAT PERMISI SISWA</h3> 
                                </div>
                                <div>
                                    <p style="padding: 10px 35px 20px 40px;" class="text-justify text-Lowercase">Yang bertanda tangan dibawah ini Guru Piket SMK N 1 Abang, dengan ini memberikan ijin kepada:</p>
                                </div>
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="width:200px;">Nama</td>
                                                    <td>:</td>
                                                    <td>................................................................................</td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas/Program</td>
                                                    <td>:</td>
                                                    <td>................................................................................</td>
                                                </tr>
                                                <tr>
                                                    <td>Hari/Tanggal</td>
                                                    <td>:</td>
                                                    <td>................................................................................</td>
                                                </tr>
                                                <tr>
                                                    <td>Jam ke</td>
                                                    <td>:</td>
                                                    <td>................................................................................</td>
                                                </tr>
                                                <tr>
                                                    <td>Alasan</td>
                                                    <td>:</td>
                                                    <td>................................................................................</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-5 d-flex justify-content-end col-9">
                                        <div style="width: 200px;">
                                            <p>Abang,</p>
                                            <p style=" margin-top:0;">Guru Piket,</p><br><br><br>
                                            <hr style="border-top: 2px solid black; margin-left: auto;">
                                            <p>NIP: ...............................................</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 p-5 bg-light text-black rounded rounded-lg" style="margin: 20px 80px 30px 80px;">
                    <h2 class="text-danger">Perhatian!!</h2>
                        <p>Itu diatas adalah contoh surat yang dapat kalian buat di aplikasi ini. Caranya yaitu tinggal klik Tombol cetak yang ada di pojok kanan di bawah ini lalu isi data-data yang diminta setelah selesai mengisi semuanya itu klik Kirim saja nanti akan langsung di bawakan ke menu cetak.</p>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary"><a href="form_surat_permisi_siswa.php" style="text-decoration: none; color:white;">Cetak</a></button>
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