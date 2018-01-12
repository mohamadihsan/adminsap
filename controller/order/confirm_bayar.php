<?php
include "../../config/koneksi.php";

$id_order_penjualan  = $_GET["id_order_penjualan"];

mysqli_query($konek, "UPDATE order_penjualan SET status_order='Dibayar' WHERE id_order_penjualan = '$id_order_penjualan'")or die(mysqli_error($konek));
header("location: ../../pages/index.php?pemesanan_produk");

?>