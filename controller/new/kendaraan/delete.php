<?php
include "../../config/koneksi.php";
session_start();

$id_kendaraan = $_GET["id_kendaraan"];

if($delete = mysqli_query($konek, "DELETE FROM kendaraan WHERE id_kendaraan='$id_kendaraan'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?kendaraan");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
