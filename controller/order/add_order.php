<?php
include "../../config/koneksi.php";
session_start();

$dtx=mysqli_query($konek, "select * from cart");
$datax=mysqli_fetch_array($dtx);
$qty = $datax['qty'];
$total_harga = $datax['harga'];
$add_details = mysqli_query($konek, "INSERT INTO order_penjualan_detail(id_order_penjualan,  qty, harga) VALUES ('','$qty','$total_harga')");

mysqli_query($konek, "INSERT INTO order_penjualan SELECT no_invoice, nama_pelanggan,id_produk from cart")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'add success';
header("location: ../../pages/index.php?order-produk");

?>
