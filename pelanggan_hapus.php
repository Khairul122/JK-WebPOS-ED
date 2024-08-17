<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_pelanggan");
echo '<script>alert("Pelanggan Terhapus");window.location="pelanggan.php"</script>';
