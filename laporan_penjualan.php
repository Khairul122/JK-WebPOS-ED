<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
$tgl = date("d/m/Y");
session_start();
if ($_SESSION["pengguna_id"] == NULL) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
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

    <title>Minimarkert Sehati</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body onload="window.print()">

    <!-- Page Wrapper -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- DataTales Example -->
                <h3 class="text-center font-weight-bold">
                    <?= $pengaturan_nama_navbar ?>
                </h3>
                <h6 class="text-center m-0">
                    Alamat: <?= $pengaturan_alamat ?>
                </h6>
                <h6 class="text-center m-0">
                    HP : <?= $pengaturan_no_hp ?>
                </h6>
                <hr>
                <h5 class="text-center mb-3">Laporan Penjualan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Faktur</th>
                                <th>Waktu Transaksi</th>
                                <th>Nama Pelanggan</th>
                                <th>Jumlah Item</th>
                                <th>Sub Total</th>
                            </tr>
                            <?php
                           $no = 1;
                           $data3 = mysqli_query($config, "SELECT DISTINCT transaksi_id, tgl_wktu_transaksi, pelanggan_id, sum(jumlah_item) AS jumlah_item, sum(total_harga) AS total_harga 
                            FROM tbl_transaksi 
                            GROUP BY transaksi_id, tgl_wktu_transaksi, pelanggan_id
                            ");
                           
                           if (!$data3) {
                               die("Query error (data3): " . mysqli_error($config));
                           }
                           
                           while ($row3 = mysqli_fetch_array($data3)) {
                               $transaksi_id = $row3["transaksi_id"];
                               $tgl_wktu_transaksi = $row3["tgl_wktu_transaksi"];
                               $pelanggan_id = $row3["pelanggan_id"];
                               $jumlah_item = $row3["jumlah_item"];
                               $total_harga = number_format($row3["total_harga"], 0);
                           
                               $data4 = mysqli_query($config, "SELECT * FROM tbl_pelanggan WHERE pelanggan_id='$pelanggan_id'");
                               
                               if (!$data4) {
                                   die("Query error (data4): " . mysqli_error($config));
                               }
                           
                               while ($row4 = mysqli_fetch_array($data4)) {
                                   $pelanggan_nama = $row4["pelanggan_nama"];
                           
                                   echo "
                                   <tr>
                                       <td>$no</td>
                                       <td>$transaksi_id</td>
                                       <td>$tgl_wktu_transaksi</td>
                                       <td>$pelanggan_nama</td>
                                       <td>$jumlah_item</td>
                                       <td>Rp. $total_harga</td>
                                   </tr>";
                                   $no++;
                               }
                           }
                           
                            $data6 = mysqli_query($config, "SELECT sum(total_harga_m) as total_harga_m,sum(total_harga) as total_harga FROM tbl_transaksi ");
                            if (!$data6) {
                                die("Query error: " . mysqli_error($config));
                            }
                            while ($row6 = mysqli_fetch_array($data6)) {
                                $total_harga_m =  number_format($row6["total_harga"] - $row6["total_harga_m"], 0);
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
                            ";
                            }

                            ?>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>

                <table style="width: 100%; text-align:center">
                    <tr>
                        <td style="width: 80%;"></td>
                        <td>
                            Ps. Baru, <?= $tgl ?>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            Admin
                        </td>
                    </tr>
                </table>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
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