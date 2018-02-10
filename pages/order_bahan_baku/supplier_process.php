<?php
include "../../config/koneksi.php";

$nama_supplier	   = $_POST["nama_supplier"];

if ($add = mysqli_query($konek, "INSERT INTO cart (nama_supplier) VALUES
	('$nama_supplier')")){
		header("Location: ../../pages/index.php?order_bahan_baku");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
