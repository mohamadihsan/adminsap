<?php
include "../../config/koneksi.php";

$nama_pelanggan	   = $_POST["nama_pelanggan"];
$no_invoice  	   = $_POST["no_invoice"];

if ($add = mysqli_query($konek, "INSERT INTO cart (nama_pelanggan, no_invoice) VALUES
	('$nama_pelanggan','$no_invoice')")){
		header("Location: ../../pages/index.php?order-produks");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>