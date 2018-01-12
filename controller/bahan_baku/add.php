<?php
include "../../config/koneksi.php";

$id_bahan_baku				           = $_POST["id_bahan_baku"];
$kode_bahan_baku				       = $_POST["kode_bahan_baku"];
$nama_bahan_baku				       = $_POST["nama_bahan_baku"];
$stock				                   = $_POST["stock"];
$lokasi_penyimpanan    				   = $_POST["lokasi_penyimpanan"];


if ($stock['stock'] > 0) {

	if ($add = mysqli_query($konek, "INSERT INTO bahan_baku (id_bahan_baku, kode_bahan_baku, nama_bahan_baku, stock, lokasi_penyimpanan, status) VALUES
	('','$kode_bahan_baku','$nama_bahan_baku','$stock','$lokasi_penyimpanan','TERSEDIA')")){
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
    die ("Terdapat kesalahan : ". mysqli_error($konek));

}else{

	if ($add = mysqli_query($konek, "INSERT INTO bahan_baku (id_bahan_baku, kode_bahan_baku, nama_bahan_baku, stock, lokasi_penyimpanan, status) VALUES
	('','$kode_bahan_baku','$nama_bahan_baku','$stock','$lokasi_penyimpanan','HABIS')")){
		header("Location: ../../pages/index.php?bahan_baku");
		exit();
	}
    die ("Terdapat kesalahan : ". mysqli_error($konek));

};

?>