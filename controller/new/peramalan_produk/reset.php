<?php
include "../../config/koneksi.php";
session_start();

$truncate2 = mysqli_query($konek, "DELETE FROM order_penjualan_detail ORDER BY id_order_penjualan DESC LIMIT 1 ");

$truncate = mysqli_query($konek, "DELETE FROM order_penjualan ORDER BY id_order_penjualan DESC LIMIT 1 ");




if ($truncate2) {
	$_SESSION['status_operasi'] = 'delete success';
	header("Location: ../../pages/index.php?order");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
