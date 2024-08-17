<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_kategori WHERE kategori_id='$_GET[kategori_id]' ");
echo '<script>alert("Kategori Terhapus");window.location="kategori.php"</script>';
