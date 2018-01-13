<?php
include "../../config/koneksi.php";

$id_bahan_baku = $_GET["id_bahan_baku"];

if($delete = mysqli_query($konek, "DELETE FROM bahan_baku WHERE id_bahan_baku='$id_bahan_baku'")){
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
