<?php
include "../../config/koneksi.php";
session_start();

$nama_pelanggan				   = $_POST["nama_pelanggan"];
$alamat						   = $_POST["alamat"];
$telepon     				   = $_POST["telepon"];
$email					       = $_POST["email"];
$tipe_pelanggan				   = $_POST["tipe_pelanggan"];
$kredit				           = $_POST["kredit_limit"];
$status				           = $_POST["status"];
$id_user				       = $_POST["id_user"];


if ($add = mysqli_query($konek, "INSERT INTO pelanggan (nama_pelanggan, alamat, telepon, email, kredit_limit, id_user, tipe_pelanggan,status) VALUES
	('$nama_pelanggan','$alamat','$telepon','$email','$kredit', '$id_user','$tipe_pelanggan','$status')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?pelanggan");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
