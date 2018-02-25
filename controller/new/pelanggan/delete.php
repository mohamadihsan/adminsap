<?php
include "../../config/koneksi.php";
session_start();
$id_pelanggan = $_GET["id_pelanggan"];

if($delete = mysqli_query($konek, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?pelanggan");
		exit();
	}

	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
