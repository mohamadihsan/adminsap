<?php
include "../../config/koneksi.php";

$id_produk				           = $_POST["id_produk"];
$id_bahan_baku				       = $_POST["id_bahan_baku"];
$komposisi				           = $_POST["komposisi"];
$status				               = $_POST["status"];



if ($add = mysqli_query($konek, "INSERT INTO komposisi_produk (id_produk, id_bahan_baku, komposisi, status) VALUES
	('$id_produk','$id_bahan_baku','$koposisi','$status')")){
		header("Location: ../../pages/index.php?komposisi-produk");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>