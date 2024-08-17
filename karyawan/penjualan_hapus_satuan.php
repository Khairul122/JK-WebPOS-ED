<?php
include '../config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_transaksi WHERE transaksi_id='$_GET[transaksi_id]' ");
echo '<script>alert("Transaksi Terhapus");window.location="penjualan.php"</script>';
