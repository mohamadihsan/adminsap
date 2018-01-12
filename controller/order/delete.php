<?php
include "../../config/koneksi.php";

$id_produk = $_GET["id_produk"];

if($delete = mysqli_query($konek, "DELETE FROM produk WHERE id_produk='$id_produk'")){
		header("Location: ../../pages/index.php?produk");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>