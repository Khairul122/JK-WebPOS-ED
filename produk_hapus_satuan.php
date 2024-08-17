<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_produk WHERE produk_id='$_GET[produk_id]' ");
echo '<script>alert("Produk Terhapus");window.location="produk.php"</script>';
