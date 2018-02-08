<?php
include "../../config/koneksi.php";
session_start();

$id_order_penjualan  = $_GET["id_order_penjualan"];

mysqli_query($konek, "UPDATE order_penjualan SET approval='DISETUJUI' WHERE id_order_penjualan = '$id_order_penjualan'")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'update success';
header("location: ../../pages/index.php?verifikasi_persetujuan");

?>
