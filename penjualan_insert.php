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
$pengaturan = mysqli_fetch_array($pengaturan_query);
$pengaturan_nama_sidebar = $pengaturan["pengaturan_nama_sidebar"];
$pengaturan_nama_navbar = $pengaturan["pengaturan_nama_navbar"];

$pengguna_query = mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='" . mysqli_real_escape_string($config, $_SESSION['pengguna_id']) . "'");
$pengguna = mysqli_fetch_array($pengguna_query);
$pengguna_id = $pengguna["pengguna_id"];
$pengguna_nama = $pengguna["pengguna_nama"];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Minimarket Sehati</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3"><?= htmlspecialchars($pengaturan_nama_sidebar) ?></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
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
                        <a class="collapse-item" href="karyawan.php">Data Karyawan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="penjualan.php">
                    <i class="fas fa-fw fa-cart-arrow-down"></i>
                    <span>Penjualan</span>
                </a>
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

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Pengaturan
            </div>
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

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h5><?= htmlspecialchars($pengaturan_nama_navbar) ?></h5>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= htmlspecialchars($pengguna_nama) ?>
                                <i class="ml-3 fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="karyawan_update.php?pengguna_id=<?= urlencode($pengguna_id) ?>">
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
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-4 text-black">+ Penjualan Insert</h1>
                    </div>
                    <?php
                    $id_query = mysqli_query($config, "SELECT max(transaksi_id) as transaksi_id FROM tbl_transaksi");
                    $data = mysqli_fetch_array($id_query);
                    $transaksi_id1 = sprintf("%09s", substr($data['transaksi_id'], 6, 9) + 1);
                    $transaksi_id2 = "TRNSKS" . $transaksi_id1;
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Id Transaksi</label>
                                    <input type="text" name="transaksi_id" value="<?= htmlspecialchars($transaksi_id2) ?>" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>No HP Pelanggan</label>
                                    <input type="text" id="pelanggan_no_hp" name="pelanggan_no_hp" class="form-control" placeholder="Masukkan No HP">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" id="pelanggan_nama" name="pelanggan_nama" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Total Bayar</label>
                                    <input type="number" name="total_bayar" class="form-control" placeholder="Masukkan jumlah yang dibayarkan">
                                </div>
                            </div>
                            <div class="col-lg-1 pl-0">
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" value="Submit" name="submit_it" class="form-control btn btn-primary btn-user btn-block mt-2">
                                </div>
                            </div>
                        </div>

                        <!-- Submit IP -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <div class="row-fluid">
                                    <select style="background-color: black!important;" class="selectpicker form-control" name="produk_id" data-show-subtext="true" data-live-search="true">
                                            <option value="-">Pilih Id Produk</option>
                                            <?php
                                            $produk_query = mysqli_query($config, "SELECT * FROM tbl_produk");
                                            while ($produk = mysqli_fetch_array($produk_query)) {
                                                echo "<option value='" . htmlspecialchars($produk['produk_id']) . "'>Id Produk : " . htmlspecialchars($produk['produk_id']) . " | Nama Produk: " . htmlspecialchars($produk['produk_merek']) . " " . htmlspecialchars($produk['produk_nama']) . " | Stok : " . htmlspecialchars($produk['produk_stok']) . " | Harga : " . htmlspecialchars($produk['produk_harga_jual']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-inline"><code></code></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Jumlah Item</label>
                                    <input type="number" name="jumlah_item" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-1 pl-0">
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" value="Submit" name="submit_ip" class="form-control btn btn-primary btn-user btn-block mt-2">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah Item</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $keranjang_query = mysqli_query($config, "SELECT * FROM tbl_keranjang");
                                    while ($keranjang = mysqli_fetch_array($keranjang_query)) {
                                        $produk_query = mysqli_query($config, "SELECT * FROM tbl_produk WHERE produk_id='" . mysqli_real_escape_string($config, $keranjang['produk_id']) . "'");
                                        $produk_data = mysqli_fetch_array($produk_query);
                                        echo "
                                            <tr>
                                                <td>{$no}</td>
                                                <td>" . htmlspecialchars($produk_data['produk_nama']) . "</td>
                                                <td>" . htmlspecialchars($produk_data['produk_harga_jual']) . "</td>
                                                <td>" . htmlspecialchars($keranjang['jumlah_item']) . "</td>
                                                <td>" . htmlspecialchars($keranjang['total_harga']) . "</td>
                                                <td>
                                                    <a href='keranjang_hapus.php?keranjang_id=" . urlencode($keranjang['keranjang_id']) . "&jumlah_item=" . urlencode($keranjang['jumlah_item']) . "&produk_id=" . urlencode($keranjang['produk_id']) . "' class='btn btn-primary btn-user btn-block'>Hapus</a>
                                                </td>
                                            </tr>";
                                        $no++;
                                    }
                                    $total_harga_query = mysqli_query($config, "SELECT sum(total_harga) as total_harga FROM tbl_keranjang");
                                    $total_row = mysqli_fetch_array($total_harga_query);
                                    echo "
                                        <tr>
                                            <td colspan='5' align='right'>Total Harga Keseluruhan</td>
                                            <td>" . htmlspecialchars($total_row['total_harga']) . "</td>
                                        </tr>";
                                    ?>
                                </tbody>
                            </table>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#pelanggan_no_hp').on('input', function() {
                var pelanggan_no_hp = $(this).val();
                if (pelanggan_no_hp !== '') {
                    $.ajax({
                        url: "get_pelanggan.php",
                        method: "POST",
                        data: { pelanggan_no_hp: pelanggan_no_hp },
                        success: function(data) {
                            if (data !== '') {
                                $('#pelanggan_nama').val(data);
                            } else {
                                $('#pelanggan_nama').val('Pelanggan tidak ditemukan');
                            }
                        }
                    });
                } else {
                    $('#pelanggan_nama').val('');
                }
            });
        });
    </script>
</body>

</html>

<?php
if (isset($_POST["submit_ip"])) {
    $produk_id = mysqli_real_escape_string($config, $_POST["produk_id"]);
    $jumlah_item = intval($_POST["jumlah_item"]);

    $produk_query = mysqli_query($config, "SELECT * FROM tbl_produk WHERE produk_id='$produk_id'");
    $produk = mysqli_fetch_array($produk_query);

    if ($produk['produk_stok'] >= $jumlah_item) {
        $produk_stok = $produk["produk_stok"] - $jumlah_item;
        $produk_harga_modal = $produk["produk_harga_modal"] * $jumlah_item;
        $produk_harga_jual = $produk["produk_harga_jual"] * $jumlah_item;

        mysqli_query($config, "INSERT INTO tbl_keranjang (produk_id, jumlah_item, total_harga_m, total_harga) VALUES('$produk_id', '$jumlah_item', '$produk_harga_modal', '$produk_harga_jual')");
        mysqli_query($config, "UPDATE tbl_produk SET produk_stok='$produk_stok' WHERE produk_id='$produk_id'");
        echo '<script>alert("Keranjang Insert");window.location="penjualan_insert.php"</script>';
    } else {
        echo '<script>alert("Stok tidak mencukupi!");</script>';
    }
}

if (isset($_POST["submit_it"])) {
    $transaksi_id = mysqli_real_escape_string($config, $_POST["transaksi_id"]);
    $tgl_wktu_transaksi = date("Y-m-d H:i:s");
    $pelanggan_no_hp = mysqli_real_escape_string($config, $_POST["pelanggan_no_hp"]);
    
    // Query untuk mendapatkan ID pelanggan berdasarkan nomor HP
    $query_pelanggan = "SELECT pelanggan_id FROM tbl_pelanggan WHERE pelanggan_no_hp='$pelanggan_no_hp' LIMIT 1";
    $result_pelanggan = mysqli_query($config, $query_pelanggan);
    $pelanggan_data = mysqli_fetch_assoc($result_pelanggan);
    $pelanggan_id = $pelanggan_data['pelanggan_id'];
    
    $total_bayar = mysqli_real_escape_string($config, $_POST["total_bayar"]);
    $pengguna = $pengguna_nama;  // Menambahkan nilai untuk kolom pengguna

    // Menghitung total harga dari keranjang
    $total_harga_query = mysqli_query($config, "SELECT SUM(total_harga) as total_harga_sum FROM tbl_keranjang");
    $total_harga_result = mysqli_fetch_assoc($total_harga_query);
    $total_harga = $total_harga_result['total_harga_sum'];

    // Inisialisasi diskon
    $diskon = 0;

    // Cek apakah grand total lebih dari 100,000 untuk diskon
    if ($total_harga > 100000) {
        $diskon = 0.1 * $total_harga; // 10% diskon
        $total_harga -= $diskon; // Kurangi total harga dengan diskon
    }

    // Hitung kembalian
    $kembalian = $total_bayar - $total_harga;

    mysqli_begin_transaction($config);

    try {
        $keranjang_query = mysqli_query($config, "SELECT * FROM tbl_keranjang");
        while ($keranjang = mysqli_fetch_array($keranjang_query)) {
            $insert_query = "INSERT INTO tbl_transaksi (keranjang_id, transaksi_id, tgl_wktu_transaksi, pelanggan_id, produk_id, jumlah_item, total_harga_m, total_harga, total_bayar, kembalian, diskon, pengguna) 
                             VALUES('{$keranjang['keranjang_id']}', '$transaksi_id', '$tgl_wktu_transaksi', '$pelanggan_id', '{$keranjang['produk_id']}', '{$keranjang['jumlah_item']}', '{$keranjang['total_harga_m']}', '{$keranjang['total_harga']}', '$total_bayar', '$kembalian', '$diskon', '$pengguna')";

            if (!mysqli_query($config, $insert_query)) {
                throw new Exception("Error inserting transaction: " . mysqli_error($config));
            }
        }

        $delete_query = "DELETE FROM tbl_keranjang";
        if (!mysqli_query($config, $delete_query)) {
            throw new Exception("Error clearing cart: " . mysqli_error($config));
        }

        mysqli_commit($config);
        echo '<script>alert("Penjualan berhasil disimpan."); window.location="penjualan_cetak.php?transaksi_id=' . urlencode($transaksi_id) . '";</script>';
    } catch (Exception $e) {
        mysqli_rollback($config);
        echo '<script>alert("' . $e->getMessage() . '"); window.location="penjualan_insert.php";</script>';
    }
}
?>
