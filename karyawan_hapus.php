<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_pengguna");
echo '<script>alert("Karyawan Terhapus Semuanya");window.location="karyawan.php"</script>';
