<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit;
}

// Mengambil pengaturan aplikasi
$query = "SELECT * FROM tbl_pengaturan";
$result = mysqli_query($config, $query);
if (!$result) {
    die("Query error: " . mysqli_error($config));
}
$pengaturan = mysqli_fetch_array($result);

$pengaturan_id = $pengaturan["pengaturan_id"];
$pengaturan_nama_sidebar = $pengaturan["pengaturan_nama_sidebar"];
$pengaturan_nama_navbar = $pengaturan["pengaturan_nama_navbar"];
$pengaturan_alamat = $pengaturan["pengaturan_alamat"];
$pengaturan_no_hp = $pengaturan["pengaturan_no_hp"];

// Mengambil data pengguna
$pengguna_id = $_SESSION["pengguna_id"];
$query = "SELECT * FROM tbl_pengguna WHERE pengguna_id='$pengguna_id'";
$result = mysqli_query($config, $query);
if (!$result) {
    die("Query error: " . mysqli_error($config));
}
$pengguna = mysqli_fetch_array($result);

$pengguna_nama = $pengguna["pengguna_nama"];
$username = $pengguna["username"];
$password = $pengguna["password"];
$pengguna_pilihan = $pengguna["pengguna_pilihan"];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Minimarkert Sehati</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            border: none !important;
        }

        th,
        td {
            border: none !important;
            border-bottom: none !important;
            border-top: none !important;
        }

        .table-responsive {
            border: none !important;
        }

        .table {
            border: none !important;
        }
    </style>
</head>

<body onload="window.print()">
    <!-- Page Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column mt-3">
        <div id="content">
            <div class="container-fluid">
                <center>
                    <div class="header">
                        <h1>Minimarket Sehati Mart</h1>
                        <p>Alamat: Pasar Baru, Kec Bayang, Kab Pasar Baru</p>
                        <p>No Hp: 082284853896</p>
                        <h3>Nota Transaksi</h3>
                    </div>
                </center>
                <br>
                <br>
                <?php
                $transaksi_id = $_GET['transaksi_id'];

                // Query untuk menghitung jumlah item dan kuantitas total
                $query = "SELECT transaksi_id, tgl_wktu_transaksi, pelanggan_id, COUNT(*) AS total_item, SUM(jumlah_item) AS total_qty, SUM(total_harga) AS total_harga, pengguna, MAX(diskon) as diskon, MAX(kembalian) as kembalian
                FROM tbl_transaksi 
                WHERE transaksi_id='$transaksi_id'
                GROUP BY transaksi_id, tgl_wktu_transaksi, pelanggan_id, pengguna";

                $result = mysqli_query($config, $query);
                if (!$result) {
                    die("Query error: " . mysqli_error($config));
                }
                $transaksi = mysqli_fetch_array($result);

                $tgl_wktu_transaksi = $transaksi["tgl_wktu_transaksi"];
                $pelanggan_id = $transaksi["pelanggan_id"];
                $total_item = $transaksi["total_item"]; // Menghitung jumlah item (total baris)
                $total_qty = $transaksi["total_qty"]; // Jumlah total item
                $total_harga = $transaksi["total_harga"];
                $pengguna = $transaksi["pengguna"];
                $diskon = $transaksi["diskon"]; // Mengambil nilai diskon
                $kembalian = $transaksi["kembalian"]; // Mengambil nilai kembalian

                // Ambil nilai total_bayar dari database
                $query = "SELECT total_bayar FROM tbl_transaksi WHERE transaksi_id='$transaksi_id' LIMIT 1";
                $result = mysqli_query($config, $query);
                if (!$result) {
                    die("Query error: " . mysqli_error($config));
                }
                $total_bayar = mysqli_fetch_array($result)["total_bayar"];

                // Ambil data pelanggan
                $query = "SELECT * FROM tbl_pelanggan WHERE pelanggan_id='$pelanggan_id'";
                $result = mysqli_query($config, $query);
                if (!$result) {
                    die("Query error: " . mysqli_error($config));
                }
                $pelanggan = mysqli_fetch_array($result);

                $pelanggan_nama = $pelanggan["pelanggan_nama"];
              
                $pelanggan_no_hp = $pelanggan["pelanggan_no_hp"];
                ?>
                <h6>Nota : <?= htmlspecialchars($transaksi_id) ?> </h6>
                <h6>Nama Pembeli : <?= htmlspecialchars($pelanggan_nama) ?> </h6>
                <h6>Tanggal : <?= htmlspecialchars(date("Y-m-d", strtotime($tgl_wktu_transaksi))) ?> </h6>
                <h6>Waktu Transaksi : <?= htmlspecialchars(date("H:i:s", strtotime($tgl_wktu_transaksi))) ?> </h6>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" width="100%" cellspacing="0">
                            <!-- <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th></th>
                                    <th>Jumlah Item</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead> -->
                            <tbody>
                                <?php
                                $no = 1;
                                $query = "SELECT * FROM tbl_transaksi WHERE transaksi_id='$transaksi_id'";
                                $result = mysqli_query($config, $query);
                                if (!$result) {
                                    die("Query error: " . mysqli_error($config));
                                }

                                while ($item = mysqli_fetch_array($result)) {
                                    $produk_id = $item["produk_id"];
                                    $jumlah_item = $item["jumlah_item"];
                                    $total_harga_item = number_format($item["total_harga"], 0);
                                    $query = "SELECT * FROM tbl_produk WHERE produk_id='$produk_id'";
                                    $result_produk = mysqli_query($config, $query);
                                    if (!$result_produk) {
                                        die("Query error: " . mysqli_error($config));
                                    }
                                    $produk = mysqli_fetch_array($result_produk);

                                    $produk_nama = htmlspecialchars($produk["produk_nama"]);
                                    $produk_merek = htmlspecialchars($produk["produk_merek"]);
                                    $produk_harga_jual = number_format($produk["produk_harga_jual"], 0);

                                    echo "
                                    <tr>
                                        <td style='text-align: center; vertical-align: middle;'>$no</td>
                                        <td style='text-align: center; vertical-align: middle;'>$produk_nama</td>
                                        <td style='text-align: center; vertical-align: middle;'>Rp. $produk_harga_jual</td>
                                        <td style='text-align: center; vertical-align: middle;'>X</td>
                                        <td style='text-align: center; vertical-align: middle;'>$jumlah_item</td>
                                        <td style='text-align: center; vertical-align: middle;'>Rp. $total_harga_item</td>
                                    </tr>";

                                    $no++;
                                }

                                $query = "SELECT sum(total_harga) as total_harga FROM tbl_transaksi WHERE transaksi_id='$transaksi_id'";
                                $result = mysqli_query($config, $query);
                                if (!$result) {
                                    die("Query error: " . mysqli_error($config));
                                }
                                $total = mysqli_fetch_array($result)["total_harga"];
                                $total_harga_semua = number_format($total, 0);
                                ?>
                                <tr>
                                    <td colspan='6' align='right'>Total Item :</td>
                                    <td><?= $total_item ?></td> <!-- Jumlah baris item -->
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Qty :</td>
                                    <td><?= $total_qty ?></td> <!-- Jumlah total item -->
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Total Bayar :</td>
                                    <td>Rp. <?= number_format($total_bayar, 0) ?></td>
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Diskon :</td>
                                    <td>Rp. <?= number_format($diskon, 0) ?></td> <!-- Menampilkan diskon -->
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Grand Total :</td>
                                    <td>Rp. <?= $total_harga_semua ?></td>
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Metode Pembayaran :</td>
                                    <td>Cash</td>
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Kembalian :</td>
                                    <td>Rp. <?= number_format($kembalian, 0) ?></td> <!-- Menampilkan kembalian langsung dari database -->
                                </tr>
                                <<tr>
                                    <td colspan='6' align='right'>Tanggal Transaksi :</td>
                                    <td><?= strftime("%d %B %Y", strtotime($tgl_wktu_transaksi)) ?></td> <!-- Tanggal dalam format 12 Januari 2024 -->
                                    </tr>

                                    <tr>
                                        <td colspan='6' align='right'>Nama Kasir :</td>
                                        <td><?= htmlspecialchars($pengguna) ?> </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 60px;">
            <p><strong>Terimakasih</strong></p>
            <p>telah berbelanja di Minimarket Sehati Mart</p>
            <p>Silakan cek kembali belanjaan anda</p>
        </div>
    </div>

    <!-- Bootstrap and plugins -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>