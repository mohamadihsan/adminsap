<?php
include "../../config/koneksi.php";
session_start();

$id_aliran = $_GET["id_aliran"];

if($delete = mysqli_query($konek, "DELETE FROM aliran_bahan_baku_dan_produk WHERE id_aliran='$id_aliran'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?pengeluaran_produk");
		exit();
	}

	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
