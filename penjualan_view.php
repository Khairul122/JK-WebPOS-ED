<!DOCTYPE html>
<html lang="en">
<?php

include 'config.php';
session_start();

if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit;
}

// Pengaturan
$query = "SELECT * FROM tbl_pengaturan";
$result = mysqli_query($config, $query);
if (!$result) {
    echo "Error: " . mysqli_error($config);
    exit;
}
$row = mysqli_fetch_assoc($result);

$pengaturan_id = $row["pengaturan_id"] ?? '';
$pengaturan_nama_sidebar = $row["pengaturan_nama_sidebar"] ?? '';
$pengaturan_nama_navbar = $row["pengaturan_nama_navbar"] ?? '';
$pengaturan_alamat = $row["pengaturan_alamat"] ?? '';
$pengaturan_no_hp = $row["pengaturan_no_hp"] ?? '';

// Pengguna
$query = "SELECT * FROM tbl_pengguna WHERE pengguna_id='{$_SESSION['pengguna_id']}'";
$result = mysqli_query($config, $query);
if (!$result) {
    echo "Error: " . mysqli_error($config);
    exit;
}
$row = mysqli_fetch_assoc($result);

$pengguna_id = $row["pengguna_id"] ?? '';
$pengguna_nama = $row["pengguna_nama"] ?? '';
$username = $row["username"] ?? '';
$password = $row["password"] ?? '';
$pengguna_pilihan = $row["pengguna_pilihan"] ?? '';

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
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3"><?= htmlspecialchars($pengaturan_nama_sidebar) ?></div>
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
                        <a class="collapse-item" href="produk.php">Data Produk</a>
                        <a class="collapse-item" href="pelanggan.php">Data Pelanggan</a>
                        <a class="collapse-item" href="karyawan.php">Data Pengguna</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h5><?= htmlspecialchars($pengaturan_nama_navbar) ?></h5>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= htmlspecialchars($pengguna_nama) ?>
                                <i class="ml-3 fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="karyawan_update.php?pengguna_id=<?= htmlspecialchars($pengguna_id) ?>">
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

                <div class="container-fluid">
                    <!-- Page Heading -->
                    <?php
                    $query = "SELECT transaksi_id, tgl_wktu_transaksi, pelanggan_id, SUM(jumlah_item) AS jumlah_item, SUM(total_harga) AS total_harga, pengguna 
FROM tbl_transaksi 
WHERE transaksi_id='{$_GET['transaksi_id']}'
GROUP BY transaksi_id, tgl_wktu_transaksi, pelanggan_id, pengguna
";
                    $result = mysqli_query($config, $query);
                    if (!$result) {
                        echo "Error: " . mysqli_error($config);
                        exit;
                    }
                    $transaksi = mysqli_fetch_assoc($result);

                    $transaksi_id = $transaksi["transaksi_id"] ?? '';
                    $tgl_wktu_transaksi = $transaksi["tgl_wktu_transaksi"] ?? '';
                    $pelanggan_id = $transaksi["pelanggan_id"] ?? '';
                    $jumlah_item = $transaksi["jumlah_item"] ?? '';
                    $total_harga = number_format($transaksi["total_harga"] ?? 0, 0);
                    $pengguna = $transaksi["pengguna"] ?? '';

                    // Data Pelanggan
                    $query = "SELECT * FROM tbl_pelanggan WHERE pelanggan_id='$pelanggan_id'";
                    $result = mysqli_query($config, $query);
                    if (!$result) {
                        echo "Error: " . mysqli_error($config);
                        exit;
                    }
                    $pelanggan = mysqli_fetch_assoc($result);

                    $pelanggan_nama = $pelanggan["pelanggan_nama"] ?? '';
                    $pelanggan_alamat = $pelanggan["pelanggan_alamat"] ?? '';
                    $pelanggan_no_hp = $pelanggan["pelanggan_no_hp"] ?? '';
                    ?>

                    <div class="row my-4">
                        <div class="col-lg-1 px-1">
                            <a href="penjualan_cetak.php?transaksi_id=<?= htmlspecialchars($transaksi_id) ?>" class="btn btn-warning btn-block">Cetak</a>
                        </div>
                        <div class="col-lg-1 px-1">
                            <a href="penjualan_hapus_satuan.php?transaksi_id=<?= htmlspecialchars($transaksi_id) ?>" class="btn btn-primary btn-user btn-block">Hapus</a>
                        </div>
                    </div>
                    <h6>Id Transaksi : <?= htmlspecialchars($transaksi_id) ?> </h6>
                    <h6>Tanggal : <?= htmlspecialchars($tgl_wktu_transaksi) ?> </h6>
                    <h6>Nama Pelanggan : <?= htmlspecialchars($pelanggan_nama) ?> </h6>
                    <h6>Alamat : <?= htmlspecialchars($pelanggan_alamat) ?> </h6>
                    <h6>No HP : <?= htmlspecialchars($pelanggan_no_hp) ?> </h6>
                    <h6>Operator : <?= htmlspecialchars($pengguna) ?> </h6>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Produk</th>
                                        <th>Merek Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah Item</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = "SELECT * FROM tbl_transaksi WHERE transaksi_id='{$_GET['transaksi_id']}'";
                                    $result = mysqli_query($config, $query);
                                    if (!$result) {
                                        echo "Error: " . mysqli_error($config);
                                        exit;
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $produk_id = htmlspecialchars($row["produk_id"]);
                                        $jumlah_item = htmlspecialchars($row["jumlah_item"]);
                                        $total_harga = number_format($row["total_harga"], 0);

                                        $query = "SELECT * FROM tbl_produk WHERE produk_id='$produk_id'";
                                        $result_produk = mysqli_query($config, $query);
                                        if (!$result_produk) {
                                            echo "Error: " . mysqli_error($config);
                                            exit;
                                        }
                                        $produk = mysqli_fetch_assoc($result_produk);

                                        $produk_nama = htmlspecialchars($produk["produk_nama"]);
                                        $produk_merek = htmlspecialchars($produk["produk_merek"]);
                                        $produk_harga_jual = number_format($produk["produk_harga_jual"], 0);

                                        echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$produk_id</td>
                                                <td>$produk_merek</td>
                                                <td>$produk_nama</td>
                                                <td>Rp. $produk_harga_jual</td>
                                                <td>$jumlah_item</td>
                                                <td>Rp. $total_harga</td>
                                            </tr>
                                        ";
                                        $no++;
                                    }

                                    $query = "SELECT SUM(total_harga) AS total_harga FROM tbl_transaksi WHERE transaksi_id='{$_GET['transaksi_id']}'";
                                    $result = mysqli_query($config, $query);
                                    if (!$result) {
                                        echo "Error: " . mysqli_error($config);
                                        exit;
                                    }
                                    $total = mysqli_fetch_assoc($result);

                                    $total_harga_keseluruhan = number_format($total["total_harga"], 0);
                                    echo "
                                        <tr>
                                            <td colspan='6' align='right'>Total Harga Keseluruhan</td>
                                            <td>Rp. $total_harga_keseluruhan</td>
                                        </tr>
                                    ";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_ip"])) {
        $produk_id = $_POST["produk_id"];
        $jumlah_item = $_POST["jumlah_item"];

        $query = "SELECT * FROM tbl_produk WHERE produk_id='$produk_id'";
        $result = mysqli_query($config, $query);
        if (!$result) {
            echo "Error: " . mysqli_error($config);
            exit;
        }
        $row = mysqli_fetch_assoc($result);

        $produk_stok = $row["produk_stok"] - $jumlah_item;
        $produk_harga_jual = $row["produk_harga_jual"] * $jumlah_item;

        $query = "INSERT INTO tbl_keranjang (produk_id, jumlah_item, total_harga) VALUES ('$produk_id', '$jumlah_item', '$produk_harga_jual')";
        mysqli_query($config, $query);

        $query = "UPDATE tbl_produk SET produk_stok='$produk_stok' WHERE produk_id='$produk_id'";
        mysqli_query($config, $query);

        echo '<script>alert("Keranjang Insert");window.location="transaksi_insert.php"</script>';
    }

    if (isset($_POST["submit_it"])) {
        $transaksi_id = $_POST["transaksi_id"];
        $tgl_wktu_transaksi = date("Y-m-d H:i:s");
        $pelanggan_id = $_POST["pelanggan_id"];

        $query = "SELECT * FROM tbl_keranjang";
        $result = mysqli_query($config, $query);
        if (!$result) {
            echo "Error: " . mysqli_error($config);
            exit;
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $keranjang_id = $row["keranjang_id"];
            $produk_id = $row["produk_id"];
            $jumlah_item = $row["jumlah_item"];
            $total_harga = $row["total_harga"];

            $query = "INSERT INTO tbl_transaksi (transaksi_id, tgl_wktu_transaksi, pelanggan_id, produk_id, jumlah_item, total_harga) 
                      VALUES ('$transaksi_id', '$tgl_wktu_transaksi', '$pelanggan_id', '$produk_id', '$jumlah_item', '$total_harga')";
            mysqli_query($config, $query);
        }

        $query = "DELETE FROM tbl_keranjang";
        mysqli_query($config, $query);

        echo '<script>alert("Transaksi Insert");window.location="transaksi.php"</script>';
    }
}
?>
