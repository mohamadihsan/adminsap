<?php
include "../../config/koneksi.php";
session_start();

$kode_produk				   = $_POST["kode_produk"];
$nama_produk				   = $_POST["nama_produk"];
$satuan						   = $_POST["satuan"];
$harga     				       = $_POST["harga"];
$id_jenis					   = $_POST["id_jenis"];
$id_kemasan     			   = $_POST["id_kemasan"];
$id_merk     			       = $_POST["id_merk"];
$lokasi					       = $_POST["lokasi_penyimpanan"];
$stok				           = $_POST["stok"];
$id_user				       = $_POST["id_user"];
$id_supplier				   = $_POST["id_supplier"];
$status_komposisi 			   = 'BELUM';


if ($add = mysqli_query($konek, "INSERT INTO produk (kode_produk, nama_produk, satuan, harga, status_komposisi, lokasi_penyimpanan, id_jenis, id_kemasan, id_merk, stok, id_user, id_supplier) VALUES
	('$kode_produk','$nama_produk','$satuan','$harga', '$status_komposisi', '$lokasi', '$id_jenis', '$id_kemasan', '$id_merk', '$stok','$id_user','$id_supplier')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?produk");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
