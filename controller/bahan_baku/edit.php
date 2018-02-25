<?php
include "../../config/koneksi.php";
session_start();

$id_bahan_baku				           = $_POST["id_bahan_baku"];
$kode_bahan_baku				       = $_POST["kode_bahan_baku"];
$nama_bahan_baku				       = $_POST["nama_bahan_baku"];
$stock				                   = $_POST["stock"];
$satuan				                   = $_POST["satuan"];
$lokasi_penyimpanan    				   = $_POST["lokasi_penyimpanan"];


if($edit = mysqli_query($konek, "UPDATE bahan_baku SET id_bahan_baku='$id_bahan_baku', kode_bahan_baku='$kode_bahan_baku', nama_bahan_baku='$nama_bahan_baku', stock='$stock' , satuan='$satuan' , lokasi_penyimpanan='$lokasi_penyimpanan' WHERE id_bahan_baku='$id_bahan_baku'")){
		$_SESSION['status_operasi'] = 'update success';
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
	$_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
