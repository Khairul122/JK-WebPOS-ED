<!DOCTYPE html>
<html lang="en">
<?php

include 'config.php';
if (isset($_POST["login"])) {
    $data = mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE username='$_POST[username]' AND password='$_POST[password]' AND pengguna_pilihan='$_POST[pengguna_pilihan]' ");
    if ($_POST["pengguna_pilihan"] == "Admin") {
        $data_check = mysqli_num_rows($data);
        if ($data_check > 0) {
            session_start();
            $row = mysqli_fetch_array($data); {
                $_SESSION["pengguna_id"] = $row["pengguna_id"];
                echo '<script>alert("Login");window.location="index.php"</script>';
            }
        } else {
            echo '<script>alert("Salah");window.location="login.php"</script>';
        }
    }
    if ($_POST["pengguna_pilihan"] == "Karyawan") {
        $data_check = mysqli_num_rows($data);
        if ($data_check > 0) {
            session_start();
            $row = mysqli_fetch_array($data); {
                $_SESSION["pengguna_id"] = $row["pengguna_id"];
                echo '<script>alert("Login");window.location="karyawan/index.php"</script>';
            }
        } else {
            echo '<script>alert("Salah");window.location="login.php"</script>';
        }
    }
}

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MINIMARKET SEHATI</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3 class="text-gray-900 mb-2 font-weight-bold">Login </h3>
                                    </div>
                                    <div class="text-center">
                                        <h4 class="text-gray-900 mb-4">MINIMARKET SEHATI</h4>
                                    </div>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <select name="pengguna_pilihan" class="form-control">
                                                <option value="">Pilih Jenis Pengguna</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Karyawan">Karyawan</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <input type="submit" value="Login" name="login" class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <?php
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>