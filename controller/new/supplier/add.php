<?php
include "../../config/koneksi.php";
session_start();
$nama_supplier				   = $_POST["nama_supplier"];
$alamat				           = $_POST["alamat_supplier"];
$status				           = $_POST["status"];
$id_user				       = $_POST["id_user"];


if ($add = mysqli_query($konek, "INSERT INTO supplier (nama_supplier, alamat_supplier, id_user, status) VALUES
	('$nama_supplier','$alamat','$id_user','$status')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?supplier");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
