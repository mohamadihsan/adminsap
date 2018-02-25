<?php
include "../../config/koneksi.php";
session_start();

$no_polisi = $_POST["no_polisi"];
$driver	   = $_POST["driver"];
$id_user   = $_POST["id_user"];
$status    = $_POST["status"];


if ($add = mysqli_query($konek, "INSERT INTO kendaraan (no_polisi, driver, id_user, status) VALUES
('$no_polisi','$driver','$id_user','$status')")){
	$_SESSION['status_operasi'] = 'add success';
	header("Location: ../../pages/index.php?kendaraan");
	exit();
}
$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));


?>
