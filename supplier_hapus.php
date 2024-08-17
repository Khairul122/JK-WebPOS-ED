<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_supplier");
echo '<script>alert("Supplier Terhapus");window.location="supplier.php"</script>';
