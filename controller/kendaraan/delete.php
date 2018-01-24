<?php
include "../../config/koneksi.php";

$id_kendaraan = $_GET["id_kendaraan"];

if($delete = mysqli_query($konek, "DELETE FROM kendaraan WHERE id_kendaraan='$id_kendaraan'")){
		header("Location: ../../pages/index.php?kendaraan");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
