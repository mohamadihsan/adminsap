<?php
include "../../config/koneksi.php";
session_start();

$id_order_penjualan  = $_GET["id_order_penjualan"];
$tgl_pembayaran = date('Y-m-d H:i:s');

mysqli_query($konek, "UPDATE order_penjualan SET status_order='DIPROSES', tgl_pembayaran='$tgl_pembayaran' WHERE id_order_penjualan = '$id_order_penjualan'")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'update success';
header("location: ../../pages/index.php?konfirmasi_pembayaran");

?>
