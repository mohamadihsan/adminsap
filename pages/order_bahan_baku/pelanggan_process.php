<?php
include "../../config/koneksi.php";

$nama_pelanggan	   = $_POST["nama_pelanggan"];

if ($add = mysqli_query($konek, "INSERT INTO cart (nama_pelanggan) VALUES
	('$nama_pelanggan')")){
		header("Location: ../../pages/index.php?order-produks");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>