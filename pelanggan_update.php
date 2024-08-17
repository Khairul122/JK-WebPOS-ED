<!DOCTYPE html>
<html lang="en">
<?php

include 'config.php';
session_start();
if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit;
}

$data = mysqli_query($config, "SELECT * FROM tbl_pengaturan");
$row = mysqli_fetch_array($data);
$pengaturan_nama_sidebar = $row["pengaturan_nama_sidebar"];
$pengaturan_nama_navbar = $row["pengaturan_nama_navbar"];
$pengaturan_no_hp = $row["pengaturan_no_hp"];

$data2 = mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='{$_SESSION['pengguna_id']}'");
$row1 = mysqli_fetch_array($data2);
$pengguna_id = $row1["pengguna_id"];
$pengguna_nama = $row1["pengguna_nama"];

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS - Toko Mitra</title>

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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Data Kategori</a>
                        <a class="collapse-item" href="produk.php">Data Produk</a>
                        <a class="collapse-item" href="pelanggan.php">Data Pelanggan</a>
                        <a class="collapse-item" href="karyawan.php">Data Karyawan</a>
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
                            $kategori_nama = $row["kategori_nama"];
                            echo "<a class='collapse-item' href='kategori_produk.php?kategori_nama=$kategori_nama'>Kategori $kategori_nama</a>";
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
                        <a class="collapse-item" href="laporan_produk.php">Laporan Produk</a>
                        <a class="collapse-item" href="laporan_pelanggan.php">Laporan Pelanggan</a>
                        <a class="collapse-item" href="laporan_penjualan.php">Laporan Penjualan</a>
                        <a class="collapse-item" href="laporan_transaksi.php">Laporan Transaksi</a>
                        <a class="collapse-item" href="laporan_karyawan.php">Laporan Karyawan</a>
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
            <li class="nav-item">
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
                        <h1 class="h3 mb-4 text-black">Pelanggan Update</h1>
                    </div>
                    <?php
                    $data3 = mysqli_query($config, "SELECT * FROM tbl_pelanggan WHERE pelanggan_id='$_GET[pelanggan_id]'");
                    while ($row3 = mysqli_fetch_array($data3)) {
                        $pelanggan_id = $row3["pelanggan_id"];
                        $pelanggan_nama = $row3["pelanggan_nama"];
                        $pelanggan_no_hp = $row3["pelanggan_no_hp"];
                    }
                    ?>
                    <form action='' method='post'>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Id Pelanggan</label>
                                    <input type='text' name='pelanggan_id' readonly value="<?= $pelanggan_id ?>" class='form-control'>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Nama Pelanggan</label>
                                    <input type='text' name='pelanggan_nama' value="<?= $pelanggan_nama ?>" class='form-control'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>No HP / Telp Pelanggan</label>
                                    <input type='number' name='pelanggan_no_hp' value="<?= $pelanggan_no_hp ?>" class='form-control'>
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

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php

if (isset($_POST["submit_u"])) {
    $pelanggan_id = $_POST["pelanggan_id"];
    $pelanggan_nama = $_POST["pelanggan_nama"];
    $pelanggan_no_hp = $_POST["pelanggan_no_hp"];
    $submit_u = mysqli_query($config, "UPDATE tbl_pelanggan SET pelanggan_nama='$pelanggan_nama', pelanggan_no_hp='$pelanggan_no_hp' WHERE pelanggan_id='$pelanggan_id'");
    echo '<script>alert("Pelanggan Update");window.location="pelanggan.php"</script>';
}
?>
