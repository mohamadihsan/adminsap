<?php
include "../../config/koneksi.php";

$id_peramalan = $_GET["id_peramalan"];

if($delete = mysqli_query($konek, "DELETE FROM peramalan WHERE id_peramalan='$id_peramalan'")){
		header("Location: ../../pages/index.php?peramalan_produk");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>