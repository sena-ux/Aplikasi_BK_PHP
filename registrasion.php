<?php
include ('daftar_ingataku.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $noHP = $_POST['noHP'];
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $nip = $_POST['nip'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $level = $_POST['role'];

    $length = strlen($noHP);
    $lengthnis = strlen($nis);
    $lengthnisn = strlen($nisn);

    $data = mysqli_query($koneksi, "select * from user where nama='$name' OR email='$email'");

    if(mysqli_num_rows($data) == 0){
        if ($name !== "-" && $email !== "-") {
            if ($length >= 12 && $length <= 13) {
                if ($lengthnis >= 4 && $lengthnis <= 6) {
                    if ($lengthnisn >= 9 && $lengthnisn <= 14) {
                        if($password == $confirmPassword){
                            if (isset($_POST['submit'])) {
                                if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
                                    $name = $_POST['name'];
                                    $gambar = $_FILES['gambar']['name'];
                                    $temp = $_FILES['gambar']['tmp_name'];
                                    $folder = "admin/assets/gambar";
                                    $imgdata = "$name$gambar";
                                
                                    // $type = mime_content_type($temp);
                                    $type = $_FILES['gambar']['type'];
                                    $size = $_FILES['gambar']['size'];
                                    $validTypes = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/JPG','image/PNG', 'image/JPEG');
                                    if ($_FILES['foto']['error'] != 4) {
                                        if (in_array($type, $validTypes)) {
                                            if ($size < 5000000) {
                                                if ($level == "guru" || $level == "siswa") {
                                                    move_uploaded_file($temp, $folder.'/'.$name.$gambar);
                                                    $query = "insert into user (nama, email, password, level, noHP, nis, nisn, kelas, alamat, nip, foto) values('$name', '$email', '$password', '$level', '$noHP', '$nis', '$nisn', '$kelas', '$alamat', '$nip', '$imgdata')";
                                                    mysqli_query($koneksi, $query);
                                                    echo "<script>alert('Registrasi Berhasil')</script>";
                                                    header("refresh:1; url=index.php");
                                                } else {
                                                    header("location:registrasion.php?pesan=Role tidak valid!");
                                                }
                                            } else{
                                                header("location:registrasion.php?pesan=Ukuran file gambar melebihi 5 MB atau ekstensi file tidak diperbolehkan!");
                                            }
                                        } else{
                                            header("location:registrasion.php?pesan=Gambar harus dengan extensi jpg, png, jpeg.");
                                        }
                                    } else{
                                        header("location:registrasion.php?pesan=Gambar belum diunggah!");
                                    }
                                } else{
                                    header("location:registrasion.php?pesan=Silakan pilih file gambar terlebih dahulu.");
                                }
                            }else{
                                header("location:registrasion.php?pesan=Silakan masukkan gambar terlebih dahulu.");
                            }
                        }else{
                            header("location:registrasion.php?pesan=Password tidak valid!");
                        }
                    }else{
                        header("location:registrasion.php?pesan=NISN tidak valid!");
                    }
                }else{
                    header("location:registrasion.php?pesan=NIS tidak valid!");
                }
            }else{
                header("location:registrasion.php?pesan=No Hp tidak valid!");
            }
        }else{
            header("location:registrasion.php?pesan=Nama atau Email tidak boleh (-).");
        }
    } else{
        header("location:registrasion.php?pesan=Akun telah terdaftar silahkan login!");
    }
};







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="width:100%;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5" style="width:100%;">
                            <div class="card shadow-lg border border-primary rounded-lg mt-4" style="width:100%;">
                                <div class="card-header">
                                    <style>
                                        h3{
                                            margin-top:10px;
                                        }
                                    </style>
                                    <h3 class="text-center font-weight-light">Register</h3>
                                    <p class="text-decoration-underline">Wajib diisi (<b class="text-danger">*</b>).</p><hr>
                                    
                                </div>
                                <div class="card-body" style="width:100%;">
                                <?php if (isset($_GET['pesan'])) { ?>
                                    <p class="alert text-danger text-center"><?php echo $_GET['pesan']; ?></p>
                                <?php } ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <style>
                                            input{
                                                height:50px;
                                            }
                                            .row ::placeholder {
                                                color: red;
                                            }
                                            .row .sd ::placeholder {
                                                color: black;
                                                text-decoration: underline red;
                                            }
                                            .row .nip ::placeholder {
                                                color: black;
                                                text-decoration: underline red;
                                            }
                                            .row .sb ::placeholder {
                                                color: black;
                                                text-decoration: underline red;
                                            }
                                        </style>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputUsername">Nama</label>
                                                <input class="form-control  border border-secondary" id="inputUsername" type="text" name="name"
                                                placeholder="*" required/>
                                            </div>
                                            
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">Email</label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="email"
                                                name="email" placeholder="*" required/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">No HP</label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="number"
                                            name="noHP" placeholder="*" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">Masukkan NIS anda Jika sebagai siswa <b class="text-danger">!</b></label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="number"
                                            name="nis" placeholder="*"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">Masukkan NISN anda Jika sebagai siswa <b class="text-danger">!</b></label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="number"
                                                name="nisn" placeholder="*"/>
                                        </div>
                                        <div class="col-md-6 mb-3 sd">
                                            <label for="inputPassword">Kelas</label>
                                            <input class="form-control  border border-secondary kelas" id="inputPassword" type="text"
                                            name="kelas" placeholder="Jika sebagai Guru bisa diisi (-)." required/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">Alamat</label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="text"
                                            name="alamat" placeholder="*" required/>
                                        </div>
                                        <div class="col-md-6 mb-3 nip">
                                            <label for="inputPassword">Masukkan NIP jika Anda Guru <b class="text-danger">!</b></label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="text"
                                                name="nip" placeholder="Jika anda siswa bisa diisi dengan (-)."/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">Password</label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="password"
                                                name="password" placeholder="*" required/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">Confirm Password</label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="password"
                                                name="confirmPassword" placeholder="*" required/>
                                        </div>
                                        <div class="col-md-6 mb-3 sb">
                                            <label for="inputPassword ">Role</label>
                                            <input class="form-control  border border-secondary" id="inputPassword" type="text"
                                            name="role" placeholder="Jika sebagai guru isi (guru), Jika sebagai siswa isi (siswa)." required/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPassword">Foto Profile</label>
                                            <input class="form-control  border border-secondary file" id="inputPassword" type="file"
                                             name="gambar" placeholder="*" required/>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <style>
                                                button{
                                                    width: 20%;
                                                    height: 50px;
                                                    margin-bottom:20px;
                                                }
                                            </style>
                                            <button type="submit" class="btn btn-primary  border border-secondary" name="submit">Register</button>
                                        </div>
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">already have an account? <a href="index.php"
                                            style="text-decoration: none; color: blue;">Sign In!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer ">
            <footer class="bg-light mt-5" >
                <div class="container-fluid mb-2">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="text-muted">Copyright &copy; Sena Pernata 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>
<script>
    if(window.reload()){
    }
</script>
</html>