<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();

if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit();
}

$pengaturan_query = mysqli_query($config, "SELECT * FROM tbl_pengaturan");
$pengaturan = mysqli_fetch_assoc($pengaturan_query);

$pengguna_query = mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='" . mysqli_real_escape_string($config, $_SESSION['pengguna_id']) . "'");
$pengguna = mysqli_fetch_assoc($pengguna_query);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Minimarkert Sehati</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3"><?= htmlspecialchars($pengaturan['pengaturan_nama_sidebar']) ?></div>
            </a>
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Data Kategori</a>
                        <a class="collapse-item" href="supplier.php">Data Supplier</a>
                        <a class="collapse-item" href="produk.php">Data Produk</a>
                        <a class="collapse-item" href="pelanggan.php">Data Pelanggan</a>
                        <a class="collapse-item" href="karyawan.php">Data Karyawan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        $kategori_query = mysqli_query($config, "SELECT * FROM tbl_kategori");
                        while ($kategori = mysqli_fetch_assoc($kategori_query)) {
                            echo "<a class='collapse-item' href='kategori_produk.php?kategori_nama=" . urlencode($kategori['kategori_nama']) . "'>Kategori " . htmlspecialchars($kategori['kategori_nama']) . "</a>";
                        }
                        ?>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="penjualan.php">
                    <i class="fas fa-fw fa-cart-arrow-down"></i>
                    <span>Penjualan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                                       <!-- <a class="collapse-item" href="laporan_supplier.php">Laporan Supplier</a> -->
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

            <li class="nav-item">
                <a class="nav-link" href="pengaturan.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h5><?= htmlspecialchars($pengaturan['pengaturan_nama_navbar']) ?></h5>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= htmlspecialchars($pengguna['pengguna_nama']) ?>
                                <i class="ml-3 fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="karyawan_update.php?pengguna_id=<?= urlencode($pengguna['pengguna_id']) ?>">
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

                <div class="container-fluid">
                    <div class="row my-4">
                        <div class="col-lg-1 pr-1">
                            <a href="penjualan_insert.php" class="btn btn-success btn-block">+ Insert</a>
                        </div>
                        <div class="col-lg-1 px-1">
                            <a href="laporan_penjualan.php" class="btn btn-warning btn-block">Cetak</a>
                        </div>
                        <div class="col-lg-1 px-1">
                            <a href="penjualan_hapus.php" class="btn btn-primary btn-user btn-block">Hapus</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Data Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Penjualan</th>
                                            <th>Waktu Transaksi Penjualan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jumlah Item</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       $no = 1;
                                       $transaksi_query = mysqli_query($config, "SELECT transaksi_id, tgl_wktu_transaksi, pelanggan_id, SUM(jumlah_item) AS jumlah_item, SUM(total_harga) AS total_harga FROM tbl_transaksi GROUP BY transaksi_id, tgl_wktu_transaksi, pelanggan_id");

                                       
                                       if ($transaksi_query) {
                                           while ($transaksi = mysqli_fetch_assoc($transaksi_query)) {
                                               $pelanggan_query = mysqli_query($config, "SELECT pelanggan_nama FROM tbl_pelanggan WHERE pelanggan_id='" . mysqli_real_escape_string($config, $transaksi['pelanggan_id']) . "'");
                                       
                                               if ($pelanggan_query) {
                                                   $pelanggan = mysqli_fetch_assoc($pelanggan_query);
                                       
                                                   echo "<tr>
                                                       <td>{$no}</td>
                                                       <td>" . htmlspecialchars($transaksi['transaksi_id']) . "</td>
                                                       <td>" . htmlspecialchars($transaksi['tgl_wktu_transaksi']) . "</td>
                                                       <td>" . htmlspecialchars($pelanggan['pelanggan_nama']) . "</td>
                                                       <td>" . htmlspecialchars($transaksi['jumlah_item']) . "</td>
                                                       <td>Rp. " . number_format($transaksi['total_harga'], 0, ',', '.') . "</td>
                                                       <td>
                                                           <a href='penjualan_view.php?transaksi_id=" . urlencode($transaksi['transaksi_id']) . "' class='btn btn-light btn-user btn-block'>Lihat</a>
                                                           <a href='penjualan_hapus_satuan.php?transaksi_id=" . urlencode($transaksi['transaksi_id']) . "' class='btn btn-primary btn-user btn-block'>Hapus</a>
                                                       </td>
                                                   </tr>";
                                       
                                                   $no++;
                                               } else {
                                                   echo "<tr><td colspan='7' align='center'>Error: " . mysqli_error($config) . "</td></tr>";
                                               }
                                           }
                                       } else {
                                           echo "<tr><td colspan='7' align='center'>Error: " . mysqli_error($config) . "</td></tr>";
                                       }
                                       

                                        $total_query = mysqli_query($config, "SELECT SUM(total_harga_m) as total_harga_m, SUM(total_harga) as total_harga FROM tbl_transaksi");

                                        if ($total_query) {
                                            $total = mysqli_fetch_assoc($total_query);
                                        
                                            $total_harga_m = number_format($total['total_harga'] - $total['total_harga_m'], 0, ',', '.');
                                            $total_harga = number_format($total['total_harga'], 0, ',', '.');
                                        
                                            echo "<tr>
                                                    <td colspan='4' align='right'>Total Harga Keseluruhan</td>
                                                    <td colspan='3' align='center'>Rp. $total_harga</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan='4' align='right'>Total Pendapatan Harga Keseluruhan</td>
                                                    <td colspan='3' align='center'>Rp. $total_harga_m</td>
                                                  </tr>";
                                        } else {
                                            // Jika query gagal, tampilkan pesan error MySQL
                                            echo "<tr><td colspan='7' align='center'>Error: " . mysqli_error($config) . "</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
