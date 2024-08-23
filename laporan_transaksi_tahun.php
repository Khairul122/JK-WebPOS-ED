<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit;
}

$tgl = date("d/m/Y");

$pengaturan = mysqli_fetch_array(mysqli_query($config, "SELECT * FROM tbl_pengaturan"));
$pengguna = mysqli_fetch_array(mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='{$_SESSION['pengguna_id']}'"));

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

<body onload="window.print()">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h3 class="text-center font-weight-bold"><?= $pengaturan['pengaturan_nama_navbar'] ?></h3>
                <h6 class="text-center m-0">Alamat: <?= $pengaturan['pengaturan_alamat'] ?></h6>
                <h6 class="text-center m-0">HP : <?= $pengaturan['pengaturan_no_hp'] ?></h6>
                <hr>
                <h5 class="text-center mb-3">Laporan Penjualan Seluruh Barang</h5>
                <?php
                if (isset($_POST["pilih_tahun"])) {
                    $tahun_pilih = $_POST["tahun_pilih"];
                    echo "<h6 class='text-center'>Tahun : $tahun_pilih </h6>";
                }

                $bulan = [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', 
                    '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                    '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                    '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                ];

                echo '<div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Kode Barang</th>
                                <th rowspan="2">Nama Barang</th>
                               <th colspan="12" style="text-align: center;">Bulan</th>
                                <th rowspan="2">Total</th>
                            </tr>
                            <tr>';
                foreach ($bulan as $key => $value) {
                    echo "<th>$value</th>";
                }
                echo '</tr>
                        </thead>
                        <tbody>';

                        $no = 1;
                        $query_barang = mysqli_query($config, "SELECT DISTINCT produk_id, produk_nama FROM tbl_produk");
                        if (!$query_barang) {
                            die("Query Error: " . mysqli_error($config));
                        }
                        
                        while ($row_barang = mysqli_fetch_array($query_barang)) {
                            $produk_id = $row_barang['produk_id'];
                            $nama_barang = $row_barang['produk_nama'];
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$produk_id}</td>
                                    <td>{$nama_barang}</td>";
                        
                            $total_barang = 0;
                            foreach ($bulan as $key => $value) {
                                $data_bulan = mysqli_fetch_array(mysqli_query($config, "SELECT SUM(total_harga) AS total_harga FROM tbl_transaksi WHERE produk_id = '$produk_id' AND MONTH(tgl_wktu_transaksi) = '$key' AND YEAR(tgl_wktu_transaksi) = '$tahun_pilih'"));
                                $total_harga = $data_bulan['total_harga'] ? $data_bulan['total_harga'] : 0;
                                echo "<td>{$total_harga}</td>";
                                $total_barang += $total_harga;
                            }
                        
                            echo "<td>{$total_barang}</td>";
                            echo "</tr>";
                            $no++;
                        }

                echo '</tbody>
                    </table>
                </div>';
                ?>
                <table style="width: 100%; text-align:center">
                    <tr>
                        <td style="width: 80%;"></td>
                        <td>
                            Ps. Baru, <?= $tgl ?><br><br><br><br><br>
                            <?= $pengguna['pengguna_nama'] ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

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
