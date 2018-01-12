<?php
include "../../config/koneksi.php";

$truncate = mysqli_query($konek, "TRUNCATE cart");

if ($truncate) {
	header("Location: ../../pages/index.php?order-produk");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>