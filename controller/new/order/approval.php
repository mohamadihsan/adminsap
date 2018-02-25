<?php
include "../../config/koneksi.php";
session_start();

$id_order_pembelian  = $_GET["id_order_pembelian"];

mysqli_query($konek, "UPDATE order_pembelian SET status_order='DIBAYAR', approval='DISETUJUI' WHERE id_order_pembelian = '$id_order_pembelian'")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'update success';
header("location: ../../pages/index.php?pembelian_barang");

?>
