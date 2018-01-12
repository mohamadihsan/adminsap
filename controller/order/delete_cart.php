<?php
include "../../config/koneksi.php";

$id_produk = $_GET["id_produk"];

if($delete = mysqli_query($konek, "DELETE FROM cart WHERE id_produk='$id_produk'")){
		header("Location: ../../pages/index.php?order-produks");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>