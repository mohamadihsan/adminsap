<?php
include "../../config/koneksi.php";
session_start();

$id_kendaraan	= $_POST["id_kendaraan"];
$no_polisi		= $_POST["no_polisi"];
$driver			= $_POST["driver"];
$id_user			= $_POST["id_user"];
$status    		= $_POST["status"];


if($edit = mysqli_query($konek, "UPDATE kendaraan SET no_polisi='$no_polisi', driver='$driver', id_user='$id_user' , status='$status' WHERE id_kendaraan='$id_kendaraan'")){
		$_SESSION['status_operasi'] = 'udpate success';
		header("Location: ../../pages/index.php?kendaraan");
		exit();
	}
	$_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
