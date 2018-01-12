<?php
include "../../config/koneksi.php";

$no_invoice			   = $_POST["no_invoice"];
$nama_produk		   = $_POST["nama_produk"];
$harga		           = $_POST["harga"];
$qty		           = $_POST["qty"];

$dt=mysqli_query($konek, "select * from produk where nama_produk='$nama_produk'");
$data=mysqli_fetch_array($dt);
$total=$data['harga']*$qty;

if ($add = mysqli_query($konek, "INSERT INTO cart (no_invoice, nama_produk, qty, harga) VALUES
	('$no_invoice','$nama_produk','$qty','$total')")){
		header("Location: ../../pages/index.php?order-produk");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>