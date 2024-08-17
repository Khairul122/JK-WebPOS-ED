<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_produk");
echo '<script>alert("Produk Terhapus");window.location="produk.php"</script>';
