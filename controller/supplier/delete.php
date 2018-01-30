<?php
include "../../config/koneksi.php";
session_start();
$id_supplier = $_GET["id_supplier"];

if($delete = mysqli_query($konek, "DELETE FROM supplier WHERE id_supplier='$id_supplier'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?supplier");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
