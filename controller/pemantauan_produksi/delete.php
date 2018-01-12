<?php
include "../../config/koneksi.php";

$komposisi = $_GET["komposisi"];

if($delete = mysqli_query($konek, "DELETE FROM komposisi WHERE komposisi='$komposisi'")){
		header("Location: ../../pages/index.php?komposisi-produk");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>