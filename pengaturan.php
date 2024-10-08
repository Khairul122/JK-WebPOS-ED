<!DOCTYPE html>
<html lang="en">
<?php

include 'config.php';
session_start();
if ($_SESSION["pengguna_id"] == NULL) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
}

$data = mysqli_query($config, "SELECT * FROM tbl_pengaturan");
$row = mysqli_fetch_array($data); {
    $pengaturan_id = $row["pengaturan_id"];
    $pengaturan_nama_sidebar = $row["pengaturan_nama_sidebar"];
    $pengaturan_nama_navbar = $row["pengaturan_nama_navbar"];
    $pengaturan_alamat = $row["pengaturan_alamat"];
    $pengaturan_no_hp = $row["pengaturan_no_hp"];
}
$data2 = mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='$_SESSION[pengguna_id]' ");
$row1 = mysqli_fetch_array($data2); {

    $pengguna_id = $row1["pengguna_id"];
    $pengguna_nama    = $row1["pengguna_nama"];
    $username = $row1["username"];
    $password    = $row1["password"];
    $pengguna_pilihan    = $row1["pengguna_pilihan"];
}


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Minimarkert Sehati</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3"><?= $pengaturan_nama_sidebar ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Data Kategori</a>
                         <!-- <a class="collapse-item" href="supplier.php">Data Supplier</a> -->
                        <a class="collapse-item" href="produk.php">Data Produk</a>
                        <a class="collapse-item" href="pelanggan.php">Data Pelanggan</a>
                        <a class="collapse-item" href="karyawan.php">Data Pengguna</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        $data = mysqli_query($config, "SELECT * FROM tbl_kategori");
                        while ($row = mysqli_fetch_array($data)) {
                            $kategori_id  = $row["kategori_id"];
                            $kategori_nama = $row["kategori_nama"];
                            echo
                            "
                        <a class='collapse-item' href='kategori_produk.php?kategori_nama=$kategori_nama'>Kategori $kategori_nama</a>
                        ";
                        }
                        ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="penjualan.php">
                    <i class="fas fa-fw fa-cart-arrow-down"></i>
                    <span>Penjualan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                                       <!-- <a class="collapse-item" href="laporan_supplier.php">Laporan Supplier</a> -->
                        <a class="collapse-item" href="laporan_produk.php">Laporan Produk</a>
                        <a class="collapse-item" href="laporan_pelanggan.php">Laporan Pelanggan</a>
                        <a class="collapse-item" href="laporan_penjualan.php">Laporan Penjualan</a>
                        <a class="collapse-item" href="laporan_transaksi.php">Laporan Transaksi</a>
                        <a class="collapse-item" href="laporan_karyawan.php">Laporan Pengguna</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>


            <!-- Nav Item - Setting -->
            <li class="nav-item active">
                <a class="nav-link" href="pengaturan.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h5><?= $pengaturan_nama_navbar ?></h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $pengguna_nama ?>
                                <i class="ml-3 fas fa-angle-down"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="karyawan_update.php?pengguna_id=<?= $pengguna_id ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-black">Pengaturan</h1>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-1">
                            <a href="pengaturan_hapus.php" class="btn btn-primary btn-user btn-block">Hapus</a>
                        </div>
                    </div>

                    <?php
                    $data3 = mysqli_query($config, "SELECT * FROM tbl_pengaturan");
                    $data_check = mysqli_num_rows($data3);
                    if ($data_check == 0) {
                        echo
                        "
                        <form action='' method='post'>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Nama Side Bar</label>
                                    <input type='text' name='pengaturan_nama_sidebar' class='form-control'>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Nama Nav Bar  / Toko</label>
                                    <input type='text' name='pengaturan_nama_navbar' class='form-control'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Alamat Toko</label>
                                    <textarea name='pengaturan_alamat' class='form-control' ></textarea>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>No Telp / HP Toko</label>
                                    <input type='number' name='pengaturan_no_hp' class='form-control'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <input type='submit' value='Submit' name='submit_i' class='form-control btn btn-primary btn-user btn-block'>
                                </div>
                            </div>
                        </div>
                    </form>
                        ";
                    } else {
                        echo
                        "
                        <form action='' method='post'>
                        <input type='hidden' name='pengaturan_id' value='$pengaturan_id'>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Nama Side Bar</label>
                                    <input type='text' name='pengaturan_nama_sidebar' value='$pengaturan_nama_sidebar' class='form-control'>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Nama Nav Bar / Toko</label>
                                    <input type='text' name='pengaturan_nama_navbar' value='$pengaturan_nama_navbar' class='form-control'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Alamat Toko</label>
                                    <textarea name='pengaturan_alamat' class='form-control' >$pengaturan_alamat</textarea>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>No Telp / HP Toko</label>
                                    <input type='number' name='pengaturan_no_hp' value='$pengaturan_no_hp' class='form-control'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <input type='submit' value='Submit' name='submit_u' class='form-control btn btn-primary btn-user btn-block'>
                                </div>
                            </div>
                        </div>
                    </form>
                        ";
                    }


                    ?>




                    <!-- Content Row -->



                    <!-- Content Row -->

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
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

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php

if (isset($_POST["submit_i"])) {
    $pengaturan_nama_sidebar = $_POST["pengaturan_nama_sidebar"];
    $pengaturan_nama_navbar = $_POST["pengaturan_nama_navbar"];
    $pengaturan_alamat = $_POST["pengaturan_alamat"];
    $pengaturan_no_hp = $_POST["pengaturan_no_hp"];
    $submit_i = mysqli_query($config, "INSERT INTO tbl_pengaturan VALUES('','$pengaturan_nama_sidebar','$pengaturan_nama_navbar','$pengaturan_alamat','$pengaturan_no_hp')");
    echo '<script>alert("Pengaturan Insert");window.location="pengaturan.php"</script>';
}
if (isset($_POST["submit_u"])) {
    $pengaturan_id = $_POST["pengaturan_id"];
    $pengaturan_nama_sidebar = $_POST["pengaturan_nama_sidebar"];
    $pengaturan_nama_navbar = $_POST["pengaturan_nama_navbar"];
    $pengaturan_alamat = $_POST["pengaturan_alamat"];
    $pengaturan_no_hp = $_POST["pengaturan_no_hp"];
    $submit_u = mysqli_query($config, "UPDATE tbl_pengaturan SET pengaturan_nama_sidebar='$pengaturan_nama_sidebar',pengaturan_nama_navbar='$pengaturan_nama_navbar',pengaturan_alamat='$pengaturan_alamat',pengaturan_no_hp='$pengaturan_no_hp' WHERE pengaturan_id='$pengaturan_id' ");
    echo '<script>alert("Pengaturan Update");window.location="pengaturan.php"</script>';
}
?>