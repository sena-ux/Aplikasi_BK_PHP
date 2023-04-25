<?php
if (isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $data = mysqli_query($koneksi, "select * from user where nama='$name' OR email='$email'");
    if(mysqli_num_rows($data) > 0){
        echo "<script>alert('Username or nama has already taken')</script>";

    } else{ if($password == $confirmPassword){
            $query = "insert into user (nama, email, password, level) values('$name', '$email', '$password', 'admin')";
            mysqli_query($koneksi, $query);
            echo "<script>alert('Registrasi Berhasil')</script>";
        }else{
            echo "<script>alert('Password does not match')</script>";
        }
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
    <title>Forgot Password</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border border-primary rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Forgot Password</h3><hr>
                                    <?php if (isset($_GET['pesan'])) { ?>
                                        <p class='alert alert-danger'><?php echo $_GET['pesan']; ?></p>
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <form action="controllers_page/forgot_pass.php" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control  border border-info" id="inputUsername" type="password" name="oldPassword"
                                                placeholder="sena" required/>
                                            <label for="inputUsername">Old Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control  border border-info" id="inputPassword" type="password"
                                                name="newPassword" placeholder="Password" required/>
                                            <label for="inputPassword">New Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control  border border-info" id="inputPassword" type="password"
                                                name="confirmNewPassword" placeholder="Password" required/>
                                            <label for="inputPassword">Confirm New Password</label>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="d-flex align-items-center justify-content-between mt-1 mb-0">
                                            <button type="submit" class="btn btn-primary  border border-secondary" name="submit">Forgot</button>
                                            <a href="dashboard_admin.php" class="btn btn-danger float-right">Batal</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="bg-light">
                <div class="container-fluid mb-2">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="text-muted">Copyright &copy; Sena Pernata 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>