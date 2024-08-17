<?php
include '../config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_transaksi");
echo '<script>alert("Transaksi Terhapus Semua");window.location="penjualan.php"</script>';
