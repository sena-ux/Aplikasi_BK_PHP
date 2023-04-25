<?php
include 'koneksi.php';

if(isset($_COOKIE['CookieUsername']) && isset($_COOKIE['CookiePassword'])){
	$username2 = $_COOKIE['CookieUsername'];
	$password2 = $_COOKIE['CookiePassword'];

	$sql = mysqli_query($koneksi, "select * from user where nama='$username2' OR password='$password2'");
	$cek = mysqli_num_rows($sql);
	if ($cek > 0) {
		$hasil = mysqli_fetch_assoc($sql);

		if ($password2 == $hasil['password']) {
			$_SESSION['username'] = $username2;
			$_SESSION['password'] = $password2;
			header("location:admin/dashboard_admin.php");
		}
	}
}
?>


