<?php
include "../../config/koneksi.php";

$tanggal_produksi				           = $_POST["tanggal_produksi"];
$id_order_produk				       = $_POST["id_order_produk"];
$status_produksi				           = $_POST["status_produksi"];

$tanggal_produksi =  date('Y-m-d', strtotime($tanggal_produksi));

if ($add = mysqli_query($konek, "INSERT INTO monitoring_produksi (tanggal_produksi, id_order_produk, status_produksi) VALUES
	('$tanggal_produksi','$id_order_produk','$status_produksi')")){
		header("Location: ../../pages/index.php?pemantauan_produksi");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
