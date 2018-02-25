<?php
include "../../config/koneksi.php";
session_start();

$truncate = mysqli_query($konek, "TRUNCATE cart");

if ($truncate) {
	$_SESSION['status_operasi'] = 'delete success';
	header("Location: ../../pages/index.php?order-produk");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
