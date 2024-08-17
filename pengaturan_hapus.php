<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_pengaturan");
echo '<script>alert("Pengaturan Terhapus");window.location="pengaturan.php"</script>';
