<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
$tgl = date("d/m/Y");
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["pengguna_id"])) {
    echo '<script>alert("Login Dulu");window.location="login.php"</script>';
    exit(); // Pastikan script berhenti jika pengguna belum login
}

// Ambil data pengaturan dari database
$data = mysqli_query($config, "SELECT * FROM tbl_pengaturan");
if ($row = mysqli_fetch_array($data)) {
    $pengaturan_id = $row["pengaturan_id"];
    $pengaturan_nama_sidebar = $row["pengaturan_nama_sidebar"];
    $pengaturan_nama_navbar = $row["pengaturan_nama_navbar"];
    $pengaturan_alamat = $row["pengaturan_alamat"];
    $pengaturan_no_hp = $row["pengaturan_no_hp"];
}

// Ambil data pengguna dari database
$data2 = mysqli_query($config, "SELECT * FROM tbl_pengguna WHERE pengguna_id='$_SESSION[pengguna_id]'");
if ($row1 = mysqli_fetch_array($data2)) {
    $pengguna_id = $row1["pengguna_id"];
    $pengguna_nama = $row1["pengguna_nama"];
    $username = $row1["username"];
    $password = $row1["password"];
    $pengguna_pilihan = $row1["pengguna_pilihan"];
}

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

<body onload="window.print()">

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h3 class="text-center font-weight-bold">
                    <?= htmlspecialchars($pengaturan_nama_navbar) ?>
                </h3>
                <h6 class="text-center m-0">
                    Alamat: <?= htmlspecialchars($pengaturan_alamat) ?>
                </h6>
                <h6 class="text-center m-0">
                    HP : <?= htmlspecialchars($pengaturan_no_hp) ?>
                </h6>
                <hr>
                <h5 class="text-center">Laporan Produk</h5>
                <center><b class="mb-3">Tanggal : <?= $tgl ?></b></center>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Koda Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data3 = mysqli_query($config, "SELECT * FROM tbl_produk");
                            if(mysqli_num_rows($data3) > 0) {
                                while ($row3 = mysqli_fetch_array($data3)) {
                                    $produk_id = $row3["produk_id"];
                                    $produk_kategori = $row3["produk_kategori"];
                                    $produk_nama = $row3["produk_nama"];
                                    $produk_merek = $row3["produk_merek"];
                                    $produk_stok = $row3["produk_stok"];
                                    $produk_harga_modal = $row3["produk_harga_modal"];
                                    $produk_harga_jual = $row3["produk_harga_jual"];
                                    $produk_satuan = $row3["produk_satuan"];
                                    echo "
                                    <tr>
                                        <td>$no</td>
                                        <td>$produk_id</td>
                                        <td>$produk_merek, $produk_nama</td>
                                        <td>$produk_satuan</td>
                                        <td>$produk_harga_modal</td>
                                        <td>$produk_harga_jual</td>
                                        <td>$produk_stok</td>
                                    </tr>
                                    ";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>Tidak ada data produk</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <table style="width: 100%; text-align:center">
                    <tr>
                        <td style="width: 80%;"></td>
                        <td>
                            Ps. Baru, <?= $tgl ?>
                            <br><br><br><br><br>
                            Admin
                        </td>
                    </tr>
                </table>

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
