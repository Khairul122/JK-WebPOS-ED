<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_supplier WHERE supplier_id='$_GET[supplier_id]' ");
echo '<script>alert("Supplier Terhapus");window.location="supplier.php"</script>';
