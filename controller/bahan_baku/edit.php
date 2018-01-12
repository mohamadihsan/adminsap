<?php
include "../../config/koneksi.php";

$id_bahan_baku				           = $_POST["id_bahan_baku"];
$kode_bahan_baku				       = $_POST["kode_bahan_baku"];
$nama_bahan_baku				       = $_POST["nama_bahan_baku"];
$stock				                   = $_POST["stock"];
$lokasi_penyimpanan    				   = $_POST["lokasi_penyimpanan"];


if($edit = mysqli_query($konek, "UPDATE bahan_baku SET id_bahan_baku='$id_bahan_baku', kode_bahan_baku='$kode_bahan_baku', nama_bahan_baku='$nama_bahan_baku', stock='$stock' , lokasi_penyimpanan='$lokasi_penyimpanan' WHERE id_bahan_baku='$id_bahan_baku'")){
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>