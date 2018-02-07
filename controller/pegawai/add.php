<?php
include "../../config/koneksi.php";
session_start();

$nip				= $_POST["nip"];
$nama_pegawai		= $_POST["nama_pegawai"];
$gender				= $_POST["gender"];
$address			= $_POST["address"];
$phone_number     	= $_POST["phone_number"];
$email				= $_POST["email"];
$status				= $_POST["status"];
$pembuat_by			= $_SESSION['id_user'];
$edit_by			= $_SESSION['id_user'];
$id_user			= $_POST["id_user"];


if ($add = mysqli_query($konek, "INSERT INTO pegawai (nip, nama_pegawai, gender, address, phone_number, email, id_user, pembuat_by, edit_by, status) VALUES
	('$nip', '$nama_pegawai', '$gender', '$address','$phone_number','$email','$id_user', '$pembuat_by', '$edit_by', '$status')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?pegawai");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
