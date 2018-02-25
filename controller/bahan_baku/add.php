<?php
include "../../config/koneksi.php";
session_start();

$kode_bahan_baku				       = $_POST["kode_bahan_baku"];
$nama_bahan_baku				       = $_POST["nama_bahan_baku"];
$stock				                   = $_POST["stock"];
$satuan				                   = $_POST["satuan"];
$lokasi_penyimpanan    				   = $_POST["lokasi_penyimpanan"];


if ($stock['stock'] > 0) {

	if ($add = mysqli_query($konek, "INSERT INTO bahan_baku (kode_bahan_baku, nama_bahan_baku, stock, satuan, lokasi_penyimpanan, status) VALUES
	('$kode_bahan_baku','$nama_bahan_baku','$stock','$satuan', '$lokasi_penyimpanan','TERSEDIA')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
    die ("Terdapat kesalahan : ". mysqli_error($konek));

}else{

	if ($add = mysqli_query($konek, "INSERT INTO bahan_baku (kode_bahan_baku, nama_bahan_baku, stock, lokasi_penyimpanan, status) VALUES
	('$kode_bahan_baku','$nama_bahan_baku','$stock','$lokasi_penyimpanan','HABIS')")){
		$_SESSION['status_operasi'] = 'add success';
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
	$_SESSION['status_operasi'] = 'add failed';
    die ("Terdapat kesalahan : ". mysqli_error($konek));

};

?>
