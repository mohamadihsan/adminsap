<?php
include "../../config/koneksi.php";

$id_retur = $_GET["id_retur"];

if($delete = mysqli_query($konek, "DELETE FROM retur WHERE id_retur='$id_retur'")){
		header("Location: ../../pages/index.php?retur");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
