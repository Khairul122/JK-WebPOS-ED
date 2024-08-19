<!DOCTYPE html>
<html lang="en">
<?php
include '../config.php';
$tgl = date("d/m/Y");
session_start();
error_reporting(0);
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

    <title>Minimarkert Sehati</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
                <h5 class="text-center mb-3">Laporan Transaksi</h5>
                <?php
                if (isset($_POST["pilih_tanggal"])) {
                    $nama = $_POST["nama"];
                    $tanggal_pilih = date("d/m/Y", strtotime($_POST["tanggal_pilih"]));
                    echo "<h6 class='text-center'>Tanggal : $tanggal_pilih </h6>";
                } else if (isset($_POST["pilih_bulan"])) {
                    $nama = $_POST["nama"];
                    $bulan_pilih = date("F-Y", strtotime($_POST["bulan_pilih"]));
                    echo "<h6 class='text-center'>Bulan : $bulan_pilih </h6>";
                } else if (isset($_POST["pilih_tahun"])) {
                    $nama = $_POST["nama"];
                    $tahun_pilih = $_POST["tahun_pilih"];
                    echo "<h6 class='text-center'>Tahun : $tahun_pilih </h6>";
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan Transaksi Penjualan</th>
                                <th>Jumlah Item</th>
                                <th>Total Harga</th>
                            </tr>
                            <?php
                            if (isset($_POST["pilih_tahun"])) {
                                $tahun_pilih = $_POST["tahun_pilih"];
                                $januari = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%01/$tahun_pilih%'   ");
                                $feb = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%02/$tahun_pilih%'   ");
                                $maret = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%03/$tahun_pilih%'   ");
                                $april = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%04/$tahun_pilih%'   ");
                                $mei = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%05/$tahun_pilih%'   ");
                                $juni = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%06/$tahun_pilih%'   ");
                                $juli = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%07/$tahun_pilih%'   ");
                                $agustus = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%08/$tahun_pilih%'   ");
                                $sep = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%09/$tahun_pilih%'   ");
                                $oktober = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%10/$tahun_pilih%'   ");
                                $nov = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%11/$tahun_pilih%'   ");
                                $des = mysqli_query($config, "SELECT sum(jumlah_item) AS jumlah_item,sum(total_harga) as total_harga  FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%12/$tahun_pilih%'   ");
                            }
                            while ($row3 = mysqli_fetch_array($januari)) {
                                $jumlah_item1 = $row3["jumlah_item"];
                                $total_harga1 = number_format($row3["total_harga"], 0);
                            }
                            while ($rowfeb = mysqli_fetch_array($feb)) {
                                $jumlah_item2 = $rowfeb["jumlah_item"];
                                $total_harga2 = number_format($rowfeb["total_harga"], 0);
                            }
                            while ($rowmaret = mysqli_fetch_array($maret)) {
                                $jumlah_item3 = $rowmaret["jumlah_item"];
                                $total_harga3 = number_format($rowmaret["total_harga"], 0);
                            }
                            while ($rowapril = mysqli_fetch_array($april)) {
                                $jumlah_item4 = $rowapril["jumlah_item"];
                                $total_harga4 = number_format($rowapril["total_harga"], 0);
                            }
                            while ($rowmei = mysqli_fetch_array($mei)) {

                                $jumlah_item5 = $rowmei["jumlah_item"];
                                $total_harga5 = number_format($rowmei["total_harga"], 0);
                            }
                            while ($rowjuni = mysqli_fetch_array($juni)) {

                                $jumlah_item6 = $rowjuni["jumlah_item"];
                                $total_harga6 = number_format($rowjuni["total_harga"], 0);
                            }
                            while ($rowjuli = mysqli_fetch_array($juli)) {

                                $jumlah_item7 = $rowjuli["jumlah_item"];
                                $total_harga7 = number_format($rowjuli["total_harga"], 0);
                            }
                            while ($rowagustus = mysqli_fetch_array($agustus)) {

                                $jumlah_item8 = $rowagustus["jumlah_item"];
                                $total_harga8 = number_format($rowagustus["total_harga"], 0);
                            }
                            while ($rowsep = mysqli_fetch_array($sep)) {

                                $jumlah_item9 = $rowsep["jumlah_item"];
                                $total_harga9 = number_format($rowsep["total_harga"], 0);
                            }
                            while ($rowoktober = mysqli_fetch_array($oktober)) {

                                $jumlah_item10 = $rowoktober["jumlah_item"];
                                $total_harga10 = number_format($rowoktober["total_harga"], 0);
                            }
                            while ($rownov = mysqli_fetch_array($nov)) {

                                $jumlah_item11 = $rownov["jumlah_item"];
                                $total_harga11 = number_format($rownov["total_harga"], 0);
                            }
                            while ($rowdes = mysqli_fetch_array($des)) {

                                $jumlah_item12 = $rowdes["jumlah_item"];
                                $total_harga12 = number_format($rowdes["total_harga"], 0);
                            }
                            ?>
                            <tr>
                                <td>1</td>
                                <td>Januari</td>
                                <td><?php echo "$jumlah_item1" ?></td>
                                <td>Rp. <?php echo "$total_harga1" ?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Februari</td>
                                <td><?php echo "$jumlah_item2" ?></td>
                                <td>Rp. <?php echo "$total_harga2" ?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Maret</td>
                                <td><?php echo "$jumlah_item3" ?></td>
                                <td>Rp. <?php echo "$total_harga3" ?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>April</td>
                                <td><?php echo "$jumlah_item4" ?></td>
                                <td>Rp. <?php echo "$total_harga4" ?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Mei</td>
                                <td><?php echo "$jumlah_item5" ?></td>
                                <td>Rp. <?php echo "$total_harga5" ?></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Juni</td>
                                <td><?php echo "$jumlah_item6" ?></td>
                                <td>Rp. <?php echo "$total_harga6" ?></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Juli</td>
                                <td><?php echo "$jumlah_item7" ?></td>
                                <td>Rp. <?php echo "$total_harga7" ?></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Aguster</td>
                                <td><?php echo "$jumlah_item8" ?></td>
                                <td>Rp. <?php echo "$total_harga8" ?></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>September</td>
                                <td><?php echo "$jumlah_item9" ?></td>
                                <td>Rp. <?php echo "$total_harga9" ?></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Oktober</td>
                                <td><?php echo "$jumlah_item10" ?></td>
                                <td>Rp. <?php echo "$total_harga10" ?></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>November</td>
                                <td><?php echo "$jumlah_item11" ?></td>
                                <td>Rp. <?php echo "$total_harga11" ?></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Desember</td>
                                <td><?php echo "$jumlah_item12" ?></td>
                                <td>Rp. <?php echo "$total_harga12" ?></td>
                            </tr>
                            <?php

                            if (isset($_POST["pilih_tahun"])) {
                                $tahun_pilih = $_POST["tahun_pilih"];
                                $data6 = mysqli_query($config, "SELECT sum(total_harga_m) as total_harga_m,sum(total_harga) as total_harga, sum(jumlah_item) as jumlah_item FROM tbl_transaksi WHERE tgl_wktu_transaksi LIKE '%$tahun_pilih%' ");
                            } else {
                                $data6 = mysqli_query($config, "SELECT sum(total_harga_m) as total_harga_m,sum(total_harga) as total_harga FROM tbl_transaksi ");
                            }
                            while ($row6 = mysqli_fetch_array($data6)) {
                                $total_harga_m = number_format($row6["total_harga"] - $row6["total_harga_m"], 0);
                                $total_harga = number_format($row6["total_harga"], 0);
                                $jumlah_item = $row6["jumlah_item"];
                                echo
                                "
                            <tr>
                                <td colspan='3' align='right'>Jumlah Item Keseluruhan</td>
                                <td colspan='2' align='center'>Rp. $jumlah_item</td>
                            </tr>
                            <tr>
                                <td colspan='3' align='right'>Total Harga Keseluruhan</td>
                                <td colspan='2' align='center'>Rp. $total_harga</td>
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
                            Pasar Baru, <?= $tgl ?>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <?php echo "$nama" ?>
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