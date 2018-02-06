<?php
include "../../config/koneksi.php";
session_start();
$id_pegawai = $_GET["id_pegawai"];

if($delete = mysqli_query($konek, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?pegawai");
		exit();
	}

	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
