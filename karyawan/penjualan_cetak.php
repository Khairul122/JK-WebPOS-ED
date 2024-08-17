<!DOCTYPE html>
<html lang="en">
<?php

include '../config.php';
session_start();
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
    <title>POS - Toko Mitra</title>

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
                        <p>Alamat: Pasar Baru, Kec Bayang, Kab Pesisir Selatan</p>
                        <p>No Hp: 082284853896</p>
                        <h3>Nota Transaksi</h3>
                    </div>
                </center>
                <br>
                <br>
                <?php
                $transaksi_id = $_GET['transaksi_id'];
                $query = "SELECT transaksi_id, tgl_wktu_transaksi, pelanggan_id, SUM(jumlah_item) AS jumlah_item, SUM(total_harga) AS total_harga, pengguna
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
                $jumlah_item = $transaksi["jumlah_item"];
                $total_harga = number_format($transaksi["total_harga"], 0);
                $pengguna = $transaksi["pengguna"];

                $query = "SELECT * FROM tbl_pelanggan WHERE pelanggan_id='$pelanggan_id'";
                $result = mysqli_query($config, $query);
                if (!$result) {
                    die("Query error: " . mysqli_error($config));
                }
                $pelanggan = mysqli_fetch_array($result);

                $pelanggan_nama = $pelanggan["pelanggan_nama"];
                $pelanggan_alamat = $pelanggan["pelanggan_alamat"];
                $pelanggan_no_hp = $pelanggan["pelanggan_no_hp"];
                ?>
                <h6>Nota : <?= htmlspecialchars($transaksi_id) ?> </h6>
                <h6>Nama Pembeli : <?= htmlspecialchars($pelanggan_nama) ?> </h6>
                <h6>Tanggal : <?= htmlspecialchars(date("Y-m-d", strtotime($tgl_wktu_transaksi))) ?> </h6>
                <h6>Waktu Transaksi : <?= htmlspecialchars(date("H:i:s", strtotime($tgl_wktu_transaksi))) ?> </h6>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th></th>
                                    <th>Jumlah Item</th>
                                    <th>Total Harga</th>
                                </tr> -->
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $total_items = 0;  // Inisialisasi total item
                                $query = "SELECT * FROM tbl_transaksi WHERE transaksi_id='$transaksi_id'";
                                $result = mysqli_query($config, $query);
                                if (!$result) {
                                    die("Query error: " . mysqli_error($config));
                                }

                                while ($item = mysqli_fetch_array($result)) {
                                    $produk_id = $item["produk_id"];
                                    $jumlah_item = $item["jumlah_item"];
                                    $total_harga_item = number_format($item["total_harga"], 0);
                                    $total_items += $jumlah_item;
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
                                    <td><?= $total_items ?></td>
                                </tr>

                                <tr>
                                    <td colspan='6' align='right'>Grand Total :</td>
                                    <td>Rp. <?= $total_harga_semua ?></td>
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Tanggal Transaksi :</td>
                                    <td><?= date("Y-m-d") ?></td> <!-- Tanggal dan waktu saat ini -->
                                </tr>
                                <tr>
                                    <td colspan='6' align='right'>Nama Kasir :</td>
                                    <td><?= htmlspecialchars($pengguna) ?></td> <!-- Nama pengguna (kasir) -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
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

<?php
// Handling the form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_ip"])) {
        $produk_id = $_POST["produk_id"];
        $jumlah_item = $_POST["jumlah_item"];

        $query = "SELECT * FROM tbl_produk WHERE produk_id='$produk_id'";
        $result = mysqli_query($config, $query);
        if (!$result) {
            die("Query error: " . mysqli_error($config));
        }
        $produk = mysqli_fetch_array($result);

        $produk_stok = $produk["produk_stok"] - $jumlah_item;
        $produk_harga_jual = $produk["produk_harga_jual"] * $jumlah_item;

        mysqli_query($config, "INSERT INTO tbl_keranjang (produk_id, jumlah_item, total_harga) VALUES ('$produk_id', '$jumlah_item', '$produk_harga_jual')");
        mysqli_query($config, "UPDATE tbl_produk SET produk_stok='$produk_stok' WHERE produk_id='$produk_id'");

        echo '<script>alert("Keranjang Inserted");window.location="transaksi_insert.php"</script>';
    }

    if (isset($_POST["submit_it"])) {
        $transaksi_id = $_POST["transaksi_id"];
        $tgl_wktu_transaksi = date("d-m-Y H:i:s");
        $pelanggan_id = $_POST["pelanggan_id"];

        $query = "SELECT * FROM tbl_keranjang";
        $result = mysqli_query($config, $query);
        if (!$result) {
            die("Query error: " . mysqli_error($config));
        }

        while ($keranjang = mysqli_fetch_array($result)) {
            $keranjang_id = $keranjang["keranjang_id"];
            $produk_id = $keranjang["produk_id"];
            $jumlah_item = $keranjang["jumlah_item"];
            $total_harga = $keranjang["total_harga"];

            mysqli_query($config, "INSERT INTO tbl_transaksi (keranjang_id, transaksi_id, tgl_wktu_transaksi, pelanggan_id, produk_id, jumlah_item, total_harga) 
                                   VALUES ('$keranjang_id', '$transaksi_id', '$tgl_wktu_transaksi', '$pelanggan_id', '$produk_id', '$jumlah_item', '$total_harga')");
        }

        mysqli_query($config, "DELETE FROM tbl_keranjang");
        echo '<script>alert("Transaksi Inserted");window.location="penjualan.php"</script>';
    }
}

?>