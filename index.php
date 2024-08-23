<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();

if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit();
}

// Mengambil data pengaturan
$pengaturan = mysqli_query($config, "SELECT * FROM tbl_pengaturan");
$pengaturanData = mysqli_fetch_assoc($pengaturan);

// Mengambil data pengguna
$pengguna = mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='" . mysqli_real_escape_string($config, $_SESSION['pengguna_id']) . "'");
$penggunaData = mysqli_fetch_assoc($pengguna);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Minimarket Sehati</title>

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
                <div class="sidebar-brand-text mx-3"><?= htmlspecialchars($pengaturanData['pengaturan_nama_sidebar']) ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Data Kategori</a>
                        <a class="collapse-item" href="produk.php">Data Produk</a>
                        <a class="collapse-item" href="pelanggan.php">Data Pelanggan</a>
                        <a class="collapse-item" href="karyawan.php">Data Pengguna</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Kategori Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        $kategoriData = mysqli_query($config, "SELECT * FROM tbl_kategori");
                        while ($row3 = mysqli_fetch_assoc($kategoriData)) {
                            $kategoriNama = htmlspecialchars($row3['kategori_nama']);
                            echo "<a class='collapse-item' href='kategori_produk.php?kategori_nama=$kategoriNama'>Kategori $kategoriNama</a>";
                        }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Penjualan -->
            <li class="nav-item">
                <a class="nav-link" href="penjualan.php">
                    <i class="fas fa-fw fa-cart-arrow-down"></i>
                    <span>Penjualan</span></a>
            </li>

            <!-- Nav Item - Laporan Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="laporan_produk.php" target="_blank">Laporan Produk</a>
                        <a class="collapse-item" href="laporan_pelanggan.php" target="_blank">Laporan Pelanggan</a>
                        <a class="collapse-item" href="laporan_penjualan.php" target="_blank">Laporan Penjualan</a>
                        <a class="collapse-item" href="laporan_transaksi.php" target="_blank">Laporan Transaksi</a>
                        <a class="collapse-item" href="laporan_karyawan.php" target="_blank">Laporan Pengguna</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Pengaturan</div>

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
                    <h5><?= htmlspecialchars($pengaturanData['pengaturan_nama_navbar']) ?></h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= htmlspecialchars($penggunaData['pengguna_nama']) ?>
                                <i class="ml-3 fas fa-angle-down"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="karyawan_update.php?pengguna_id=<?= htmlspecialchars($penggunaData['pengguna_id']) ?>">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        function displayCard($title, $dateFormat, $query, $iconClass)
                        {
                            global $config;
                            $date = date($dateFormat);
                            $result = mysqli_query($config, $query);
                            if (!$result) {
                                die('Query Error: ' . mysqli_error($config)); // Tambahan pengecekan error
                            }
                            $data = mysqli_fetch_assoc($result);
                            $total = $data['total'] ?? "Belum Ada Barang Terjual";
                            $formattedTotal = is_numeric($total) ? number_format($total, 0) : $total;
                            echo "
                                <div class='col-xl-3 col-md-6 mb-4'>
                                    <div class='card border-left-primary shadow h-100 py-2'>
                                        <div class='card-body'>
                                            <div class='row no-gutters align-items-center'>
                                                <div class='col mr-2'>
                                                    <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>
                                                        $title</div>
                                                    <div class='h5 mb-0 font-weight-bold text-gray-800'>Rp. $formattedTotal</div>
                                                </div>
                                                <div class='col-auto'>
                                                    <i class='fas $iconClass fa-2x text-gray-300'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }

                        displayCard('Total Pendapatan Penjualan Hari Ini', 'Y-m-d', "SELECT SUM(total_harga) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%" . date("Y-m-d") . "%'", 'fa-dollar-sign');
                        displayCard('Total Pendapatan Penjualan Bulan Ini', 'Y-m', "SELECT SUM(total_harga) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '" . date("Y-m") . "%'", 'fa-dollar-sign');
                        displayCard('Total Pendapatan Penjualan Tahun Ini', 'Y', "SELECT SUM(total_harga) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%" . date("Y") . "%'", 'fa-dollar-sign');
                        displayCard('Total Keuntungan Penjualan Hari Ini', 'Y-m-d', "SELECT SUM(total_harga - total_harga_m) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '" . date("Y-m-d") . "%'", 'fa-dollar-sign');
                        displayCard('Total Keuntungan Penjualan Bulan Ini', 'm/Y', "SELECT SUM(total_harga - total_harga_m) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%" . date("Y-m") . "%'", 'fa-dollar-sign');
                        displayCard('Total Keuntungan Penjualan Tahun Ini', 'Y', "SELECT SUM(total_harga - total_harga_m) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%" . date("Y") . "%'", 'fa-dollar-sign');
                        displayCard('Total Produk Terjual Hari Ini', 'd/m/Y', "SELECT SUM(jumlah_item) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%" . date("Y-m-d") . "%'", 'fa-box');
                        displayCard('Total Produk Terjual Bulan Ini', 'm/Y', "SELECT SUM(jumlah_item) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%" . date("Y-m") . "%'", 'fa-box');
                        displayCard('Total Produk Terjual Tahun Ini', 'Y', "SELECT SUM(jumlah_item) AS total FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%" . date("Y") . "%'", 'fa-box');
                        ?>
                    </div>
                    <!-- End of Content Row -->
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
                        <a class="btn btn-primary" href="logout.php">Logout</a>
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
