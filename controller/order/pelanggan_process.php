<?php
include "../../config/koneksi.php";
session_start();

$nama_pelanggan	   = $_POST["nama_pelanggan"];
$no_invoice  	   = $_POST["no_invoice"];

if ($add = mysqli_query($konek, "INSERT INTO cart (nama_pelanggan, no_invoice) VALUES
	('$nama_pelanggan','$no_invoice')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?order-produks");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
