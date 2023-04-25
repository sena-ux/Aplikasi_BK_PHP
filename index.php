<?php include ('daftar_ingataku.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
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
                                    <h3 class="text-center font-weight-light my-4">Login</h3><hr>
                                    <?php if (isset($_GET['pesan'])) { ?>
                                        <p class='alert alert-danger'><?php echo $_GET['pesan']; ?></p>
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <form action="cek_koneksi.php" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control  border border-secondary" id="inputUsername" type="text" name="username"
                                                placeholder="sena" required/>
                                            <label for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control  border border-secondary" id="inputPassword" type="password"
                                                name="password" placeholder="Password" required/>
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input  border border-secondary" id="inputRememberPassword" type="checkbox"
                                                value="" name="ingataku"/>
                                            <label class="form-check-label" for="inputRememberPassword">Ingat Aku</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary  border border-secondary" name="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">Need an account? <a href="registrasion.php"
                                            style="text-decoration: none; color: blue;">Sign up!</a>
                                    </div>
                                </div>
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