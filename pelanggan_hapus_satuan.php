<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_pelanggan WHERE pelanggan_id='$_GET[pelanggan_id]' ");
echo '<script>alert("Pelanggan Terhapus");window.location="pelanggan.php"</script>';
