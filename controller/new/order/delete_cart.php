<?php
include "../../config/koneksi.php";
session_start();
$id_produk = $_GET["id_produk"];

if($delete = mysqli_query($konek, "DELETE FROM cart WHERE id_produk='$id_produk'")){
	$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?order-produks");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
