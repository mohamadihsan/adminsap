<?php
include "../../config/koneksi.php";
session_start();

$id_bahan_baku = $_GET["id_bahan_baku"];

if($delete = mysqli_query($konek, "DELETE FROM bahan_baku WHERE id_bahan_baku='$id_bahan_baku'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
