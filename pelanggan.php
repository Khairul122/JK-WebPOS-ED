<!DOCTYPE html>
<html lang="en">

<?php
include 'config.php';
session_start();

if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit();
}

$queryPengaturan = "SELECT * FROM tbl_pengaturan";
$data = mysqli_query($config, $queryPengaturan);
$pengaturan = mysqli_fetch_assoc($data);

$queryPengguna = "SELECT * FROM tbl_pengguna WHERE pengguna_id='{$_SESSION['pengguna_id']}'";
$dataPengguna = mysqli_query($config, $queryPengguna);
$pengguna = mysqli_fetch_assoc($dataPengguna);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS - Toko Mitra</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3"><?= $pengaturan['pengaturan_nama_sidebar'] ?></div>
            </a>
            <hr class="sidebar-divider my-0">

            <!-- Nav Items -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">

            <!-- Data Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Data Kategori</a>
                        <a class="collapse-item" href="produk.php">Data Produk</a>
                        <a class="collapse-item" href="pelanggan.php">Data Pelanggan</a>
                        <a class="collapse-item" href="karyawan.php">Data Karyawan</a>
                    </div>
                </div>
            </li>

            <!-- Dynamic Category Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori" aria-expanded="true" aria-controls="collapseKategori">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseKategori" class="collapse" aria-labelledby="headingKategori" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        $queryKategori = "SELECT * FROM tbl_kategori";
                        $dataKategori = mysqli_query($config, $queryKategori);
                        while ($kategori = mysqli_fetch_assoc($dataKategori)) {
                            echo "<a class='collapse-item' href='kategori_produk.php?kategori_nama={$kategori['kategori_nama']}'>Kategori {$kategori['kategori_nama']}</a>";
                        }
                        ?>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="penjualan.php">
                    <i class="fas fa-fw fa-cart-arrow-down"></i>
                    <span>Penjualan</span>
                </a>
            </li>

            <!-- Reports Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="laporan_produk.php">Laporan Produk</a>
                        <a class="collapse-item" href="laporan_pelanggan.php">Laporan Pelanggan</a>
                        <a class="collapse-item" href="laporan_penjualan.php">Laporan Penjualan</a>
                        <a class="collapse-item" href="laporan_transaksi.php">Laporan Transaksi</a>
                        <a class="collapse-item" href="laporan_karyawan.php">Laporan Karyawan</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Pengaturan</div>

            <!-- Settings -->
            <li class="nav-item">
                <a class="nav-link" href="pengaturan.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h5><?= $pengaturan['pengaturan_nama_navbar'] ?></h5>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $pengguna['pengguna_nama'] ?>
                                <i class="ml-3 fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="karyawan_update.php?pengguna_id=<?= $pengguna['pengguna_id'] ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row my-4">
                        <div class="col-lg-1 pr-1">
                            <a href="pelanggan_insert.php" class="btn btn-success btn-block">+ Insert</a>
                        </div>
                        <div class="col-lg-1 px-1">
                            <a href="pelanggan_hapus.php" class="btn btn-primary btn-user btn-block">Hapus</a>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Data Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Pelanggan</th>
                                            <th>Nama Pelanggan</th>
                                           
                                            <th>No HP / Telp Pelanggan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $queryPelanggan = "SELECT * FROM tbl_pelanggan";
                                        $dataPelanggan = mysqli_query($config, $queryPelanggan);
                                        while ($pelanggan = mysqli_fetch_assoc($dataPelanggan)) {
                                            echo "
                                            <tr>
                                                <td>{$no}</td>
                                                <td>{$pelanggan['pelanggan_id']}</td>
                                                <td>{$pelanggan['pelanggan_nama']}</td>
                                            
                                                <td>{$pelanggan['pelanggan_no_hp']}</td>
                                                <td>
                                                    <a href='pelanggan_update.php?pelanggan_id={$pelanggan['pelanggan_id']}' class='btn btn-danger btn-user btn-block'>Update</a>
                                                    <a href='pelanggan_hapus_satuan.php?pelanggan_id={$pelanggan['pelanggan_id']}' class='btn btn-primary btn-user btn-block'>Hapus</a>
                                                </td>
                                            </tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
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

    <!-- JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
