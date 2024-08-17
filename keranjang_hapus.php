<?php
include 'config.php';
$submit_d = mysqli_query($config, "DELETE FROM tbl_keranjang WHERE keranjang_id='$_GET[keranjang_id]' ");

$data8 = mysqli_query($config, "SELECT * FROM tbl_produk WHERE produk_id='$_GET[produk_id]' ");
while ($row8 = mysqli_fetch_array($data8)) {
    $produk_stok = $row8["produk_stok"] + $_GET["jumlah_item"];
}

$submit_up = mysqli_query($config, "UPDATE tbl_produk SET produk_stok='$produk_stok' WHERE produk_id='$_GET[produk_id]' ");
echo '<script>alert("Keranjang Terhapus");window.location="penjualan_insert.php"</script>';
