<?php
//menghubungkan php dengan koneksi database
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

//menangkap data dari form atau data yang dimasukkan oleh user
$username = $_POST['username'];
$password = $_POST['password'];
$ingataku = $_POST['ingataku'];


//validasi username dan password yang diinputkan oleh user
$login = mysqli_query($koneksi, "select * from user where nama='$username' OR password='$password'");

//jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

if (isset($_POST['ingataku'])) {
	header("location:index.php?pesan=ini ingat aku");
}else{
	header("location:index.php?pesan=Yakin akan selalu login setiap membuka website ini??");
}

// //username dan password ditemukan di database
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);

	if ($password == $data['password']) {
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			if (isset($_POST['ingataku'])) {
				$cookie_name = "CookieUsername";
				$cookie_value = $username;
				$cookie_time = time() + (60 * 60 * 24 * 30);
				setcookie($cookie_name, $cookie_value, $cookie_time, "/");
			}
			if (isset($_POST['ingataku'])) {
				$cookie_name = "CookiePassword";
				$cookie_value = $password;
				$cookie_time = time() + (60 * 60 * 24 * 30);
				setcookie($cookie_name, $cookie_value, $cookie_time, "/");
			}
			header("location: admin/dashboard_admin.php");
	}else{
		header("location:index.php?pesan=Password anda salah silahkan ulangi lagi");
	}
}else{
	header("location:index.php?pesan=Username Or Name tidak ditemukan silahkan coba lagi...!!!");
}




// if ($cek > 0) {
//     $data = mysqli_fetch_assoc($login);
// 	if ($password == $passwordSQL) {
// 		if ($data['level'] == "admin") {
// 			$_SESSION['username'];
// 			$_SESSION['level'] = "admin";
// 			// alihkan ke halaman dashboard admin
// 			header("location:halaman_admin.php");
	
// 		// cek jika user login sebagai pegawai
// 		}else if($data['level']=="pegawai"){
// 			// buat session login dan username
// 			$_SESSION['username'] = $username;
// 			$_SESSION['level'] = "pegawai";
// 			// alihkan ke halaman dashboard pegawai
// 			header("location:halaman_pegawai.php");
	
// 		// cek jika user login sebagai pengurus
// 		}else if($data['level']=="pengurus"){
// 			// buat session login dan username
// 			$_SESSION['username'] = $username;
// 			$_SESSION['level'] = "pengurus";
// 			// alihkan ke halaman dashboard pengurus
// 			header("location:halaman_pengurus.php");
	
// 		}else{
	
// 			// alihkan ke halaman login kembali
// 			header("location:index.php?pesan=gagal");
// 		}
// 	}else{
// 		header("location : index.php?pesan=Password anda salah silahkan ulangi lagi");
// 	}	
// }else{
// 	header("location: index.php?pesan=Username Or Name tidak ditemukan silahkan coba lagi...!!!");
// }
    ?>  