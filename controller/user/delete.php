<?php
include "../../config/koneksi.php";
session_start();
$id_user = $_GET["id_user"];

if($delete = mysqli_query($konek, "DELETE FROM user WHERE id_user='$id_user'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?user");
		exit();
	}

	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
