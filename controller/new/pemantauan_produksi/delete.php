<?php
include "../../config/koneksi.php";
session_start();
$komposisi = $_GET["komposisi"];

if($delete = mysqli_query($konek, "DELETE FROM komposisi WHERE komposisi='$komposisi'")){
		$_SESSION['status_operasi'] = 'delete success';
		header("Location: ../../pages/index.php?komposisi-produk");
		exit();
	}
	$_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
