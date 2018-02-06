<?php
include "../../config/koneksi.php";
session_start();

$nip				   = $_POST["nip"];
$nama_pegawai				   = $_POST["nama_pegawai"];
$alamat						   = $_POST["alamat"];
$phone_number     			   = $_POST["phone_number"];
$email					       = $_POST["email"];
$status				           = $_POST["status"];
$id_user				           = $_POST["id_user"];


if ($add = mysqli_query($konek, "INSERT INTO pelanggan (nip, nama_pegawai, alamat, phone_number, email, id_user, status) VALUES
	('$nip', '$nama_pegawai','$alamat','$phone_number','$email','$id_user', '$status')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?pelanggan");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
