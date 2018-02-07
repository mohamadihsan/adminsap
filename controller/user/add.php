<?php
include "../../config/koneksi.php";
session_start();

$username				   = $_POST["username"];
$password				   = md5($_POST["password"]);
$hak_akses				   = $_POST["hak_akses"];
$status     			   = $_POST["status"];


if ($add = mysqli_query($konek, "INSERT INTO user (username, password, hak_akses, status) VALUES
	('$username', '$password','$hak_akses','$status')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?user");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
