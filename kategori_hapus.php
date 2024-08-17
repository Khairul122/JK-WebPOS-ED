<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_kategori");
echo '<script>alert("Kategori Terhapus");window.location="kategori.php"</script>';
