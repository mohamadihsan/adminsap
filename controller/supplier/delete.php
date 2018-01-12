<?php
include "../../config/koneksi.php";

$id_supplier = $_GET["id_supplier"];

if($delete = mysqli_query($konek, "DELETE FROM supplier WHERE id_supplier='$id_supplier'")){
		header("Location: ../../pages/index.php?supplier");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>