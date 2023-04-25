<?php 
include ('../../koneksi.php');

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$Confirm = $_POST['confirmNewPassword'];

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$sql = mysqli_query($koneksi, "select * from user where nama='$username' OR password='$password'");
$sq = mysqli_fetch_assoc($sql);
$id = $sq['id'];

if ($sq) {
    if ($oldPassword == $sq['password']) {
        if ($newPassword == $Confirm) {
            if($oldPassword !== $newPassword){
                $s1 = mysqli_query($koneksi, "update user set password='$newPassword' where id='$id'");
                echo "<script>alert('Forgot Password Successfuly')</script>";
                header("refresh:1; url=../dashboard_admin.php");
            }else{
                header("location:../forgot_password_admin.php?pesan=New password tidak boleh sama dengan old password!");
            }
        }else {
            header("location:../forgot_password_admin.php?pesan=Confirm password tidak sesuai!");
        }
    }else{
        header("location:../forgot_password_admin.php?pesan=Old Password anda salah");
    }
}else{
    header("location:../forgot_password_admin.php?pesan=Akun tidak ditemukan!");
}


?>