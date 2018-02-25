<?php
include "../../config/koneksi.php";
session_start();

$id_peramalan = $_GET["id_peramalan"];

if($delete = mysqli_query($konek, "DELETE FROM peramalan WHERE id_peramalan='$id_peramalan'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?peramalan_produk");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
