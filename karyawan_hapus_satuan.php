<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_pengguna WHERE pengguna_id ='$_GET[pengguna_id]' ");
echo '<script>alert("Karyawan Terhapus");window.location="karyawan.php"</script>';
