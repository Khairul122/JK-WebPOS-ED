<!DOCTYPE html>
<html lang="en">
<?php

include '../config.php';
session_start();
if ($_SESSION["pengguna_id"] == NULL) {
    echo '<script>alert("Login Dulu");window.location="../login.php"</script>';
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

    <title>POS - Toko Mitra</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="produk.php">Data Produk</a>
                        <a class="collapse-item" href="pelanggan.php">Data Pelanggan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
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
                        <a class="collapse-item" href="laporan_produk.php">Laporan Produk</a>
                        <a class="collapse-item" href="laporan_pelanggan.php">Laporan Pelanggan</a>
                        <a class="collapse-item" href="laporan_penjualan.php">Laporan Penjualan</a>
                        <a class="collapse-item" href="laporan_transaksi.php">Laporan Transaksi</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


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
                <?php
                $data3 = mysqli_query($config, "SELECT * FROM tbl_produk WHERE produk_kategori='$_GET[kategori_nama]'  ");
                while ($row3 = mysqli_fetch_array($data3)) {
                    $produk_id = $row3["produk_id"];
                    $produk_kategori = $row3["produk_kategori"];
                } ?>
                <div class="container-fluid">
                    <div class="row my-4">
                        <div class="col-lg-1 px-1">
                            <a href="kategori_produk_cetak.php?kategori_nama=<?= $_GET["kategori_nama"] ?>" class="btn btn-warning btn-block">Cetak</a>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Kategori <?= $produk_kategori ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Produk</th>
                                            <th>Kategori Produk</th>
                                            <th>Merek Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Stok Produk</th>
                                            <th>Harga Modal</th>
                                            <th>Harga Jual</th>
                                            <th>Satuan</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        $data3 = mysqli_query($config, "SELECT * FROM tbl_produk WHERE produk_kategori='$_GET[kategori_nama]'  ");
                                        while ($row3 = mysqli_fetch_array($data3)) {
                                            $produk_id = $row3["produk_id"];
                                            $produk_kategori = $row3["produk_kategori"];
                                            $produk_nama = $row3["produk_nama"];
                                            $produk_merek = $row3["produk_merek"];
                                            $produk_stok = $row3["produk_stok"];
                                            $produk_harga_modal = $row3["produk_harga_modal"];
                                            $produk_harga_jual = $row3["produk_harga_jual"];
                                            $produk_satuan = $row3["produk_satuan"];
                                            echo
                                            "
                                            <tr>
                                                <td>$no</td>
                                                <td>$produk_id</td>
                                                <td>$produk_kategori</td>
                                                <td>$produk_merek</td>
                                                <td>$produk_nama</td>
                                                <td>$produk_stok</td>
                                                <td>$produk_harga_modal</td>
                                                <td>$produk_harga_jual</td>
                                                <td>$produk_satuan</td>
                                            </tr>
                                            ";
                                            $no++;
                                        }
                                        ?>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>