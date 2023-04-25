<?php

session_start();
$koneksi = mysqli_connect("localhost", "root", "", "multi_user");

//cek koneksi
if (mysqli_connect_error()) {
    echo "Koneksi data base gagal: " .myqsli_connect_error();
}
?>