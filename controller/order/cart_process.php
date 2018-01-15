<?php
include "../../config/koneksi.php";

$no_invoice			   = $_POST["no_invoice"];
$id_produk		       = $_POST["id_produk"];
$nama_pelanggan		   = $_POST["nama_pelanggan"];
$harga		           = $_POST["harga"];
$qty		           = $_POST["qty"];

$dt=mysqli_query($konek, "select * from produk where id_produk='$id_produk'");
$data=mysqli_fetch_array($dt);
$total=$data['harga']*$qty;

if ($add = mysqli_query($konek, "INSERT INTO cart (no_invoice, id_produk, nama_pelanggan, qty, harga) VALUES
	('$no_invoice','$id_produk','$nama_pelanggan','$qty','$total')")){
		header("Location: ../../pages/index.php?order-produks");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
