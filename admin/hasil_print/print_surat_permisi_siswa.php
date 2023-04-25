<?php  
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$alasan = $_POST['alasan'];
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
<body>
<div class="d-flex justify-content-center align-items-center" style="margin: 50px 0 500px 0; margin-buttom:500px;">
    <div class="border-5" style="width:600px; border: 2px solid black;">
        <img src="../assets/img/header.jpg" alt="" style="width:100%; padding:5px;">
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
                                    <td style="width:180px;">Nama</td>
                                    <td>:</td>
                                    <td style="padding-left:20px;"><?php echo $nama  ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas/Program</td>
                                    <td>:</td>
                                    <td style="padding-left:20px;"><?php echo $kelas  ?></td>
                                </tr>
                                <tr>
                                    <td>Hari/Tanggal</td>
                                    <td>:</td>
                                    <td style="padding-left:20px;"><?php echo $hari  ?></td>
                                </tr>
                                <tr>
                                    <td>Jam ke</td>
                                    <td>:</td>
                                    <td style="padding-left:20px;"><?php echo $jam  ?></td>
                                </tr>
                                <tr>
                                    <td>Alasan</td>
                                    <td>:</td>
                                    <td style="padding-left:20px;"><?php echo $alasan  ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5 d-flex justify-content-end col-9">
                        <div style="width: 200px;">
                            <p>Abang, <?php echo date('d-m-Y') ?></p>
                            <p style=" margin-top:0;">Guru Piket,</p><br><br><br>
                            <hr style="border-top: 2px solid black; margin-left: auto;">
                            <p>NIP: ...............................................</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>