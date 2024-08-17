<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();

if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit;
}

$tgl = date("d/m/Y");

$pengaturan = mysqli_fetch_assoc(mysqli_query($config, "SELECT * FROM tbl_pengaturan"));
$pengguna = mysqli_fetch_assoc(mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='{$_SESSION['pengguna_id']}'"));

if (isset($_POST['nama'])) {
    $nama_input = htmlspecialchars($_POST['nama']);
} else {
    $nama_input = '';
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body onload="window.print()">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h3 class="text-center font-weight-bold"><?= $pengaturan['pengaturan_nama_navbar'] ?></h3>
                <h6 class="text-center m-0">Alamat: <?= $pengaturan['pengaturan_alamat'] ?></h6>
                <h6 class="text-center m-0">HP : <?= $pengaturan['pengaturan_no_hp'] ?></h6>
                <hr>
                <h5 class="text-center mb-3">Laporan Penjualan Perbulan</h5>

                <?php
                // if (!empty($nama_input)) {
                //     echo "<h6 class='text-center'>Nama: $nama_input</h6>";
                // }

                if (isset($_POST["pilih_tanggal"])) {
                    $tanggal_pilih = date("Y-m-d", strtotime($_POST["tanggal_pilih"]));
                    echo "<h6 class='text-center'>Tanggal : $tanggal_pilih</h6>";
                }

                $queryConditions = "";
                if (isset($_POST["pilih_tanggal"])) {
                    $tanggal_pilih = date("Y-m-d", strtotime($_POST["tanggal_pilih"]));
                    $queryConditions = "WHERE DATE(tgl_wktu_transaksi) = '$tanggal_pilih'";
                }

                $data3 = mysqli_query($config, "SELECT DISTINCT transaksi_id, tgl_wktu_transaksi, pelanggan_id, pengguna, SUM(jumlah_item) AS jumlah_item, SUM(total_harga) AS total_harga FROM tbl_transaksi $queryConditions GROUP BY transaksi_id, tgl_wktu_transaksi, pelanggan_id, pengguna");

                if (!$data3) {
                    die("Query error (data3): " . mysqli_error($config));
                }

                echo '
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Faktur</th>
                                <th>Waktu Transaksi </th>
                                <th>Nama Pelanggan</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                
                $no = 1;
                while ($row3 = mysqli_fetch_assoc($data3)) {
                    $pelanggan = mysqli_fetch_assoc(mysqli_query($config, "SELECT * FROM tbl_pelanggan WHERE pelanggan_id='{$row3['pelanggan_id']}'"));
                    $total_harga = number_format($row3["total_harga"], 0);
                    
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>{$row3['transaksi_id']}</td>
                        <td>{$row3['tgl_wktu_transaksi']}</td>
                        <td>{$pelanggan['pelanggan_nama']}</td>
                        <td>{$row3['jumlah_item']}</td>
                        <td>Rp. $total_harga</td>
                    </tr>";
                    $no++;
                }

                $data6 = mysqli_query($config, "SELECT SUM(total_harga_m) as total_harga_m, SUM(total_harga) as total_harga FROM tbl_transaksi $queryConditions");

                if (!$data6) {
                    die("Query error (data6): " . mysqli_error($config));
                }

                $row6 = mysqli_fetch_assoc($data6);
                $total_harga_m = number_format($row6["total_harga"] - $row6["total_harga_m"], 0);
                $total_harga = number_format($row6["total_harga"], 0);

                echo "
                <tr>
                    <td colspan='4' align='right'>Total Harga Keseluruhan</td>
                    <td colspan='2' align='center'>Rp. $total_harga</td>
                </tr>
                <tr>
                    <td colspan='4' align='right'>Total Pendapatan Harga Keseluruhan</td>
                    <td colspan='2' align='center'>Rp. $total_harga_m</td>
                </tr>
                </tbody>
                </table>
                </div>";
                ?>

                <table style="width: 100%; text-align:center">
                    <tr>
                        <td style="width: 80%;"></td>
                        <td>
                            Ps. Baru, <?= $tgl ?>
                            <br><br><br><br><br>
                            <?= $nama_input ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
