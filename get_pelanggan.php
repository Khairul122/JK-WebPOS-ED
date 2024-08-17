<?php
include 'config.php';

if (isset($_POST['pelanggan_no_hp'])) {
    $pelanggan_no_hp = mysqli_real_escape_string($config, $_POST['pelanggan_no_hp']);

    $query = "SELECT pelanggan_nama FROM tbl_pelanggan WHERE pelanggan_no_hp='$pelanggan_no_hp' LIMIT 1";
    $result = mysqli_query($config, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['pelanggan_nama'];
    } else {
        echo '';
    }
}
?>
