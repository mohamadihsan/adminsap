<?php
include "../../config/koneksi.php";

$truncate2 = mysqli_query($konek, "DELETE FROM order_penjualan_detail ORDER BY id_order_penjualan DESC LIMIT 1 ");

$truncate = mysqli_query($konek, "DELETE FROM order_penjualan ORDER BY id_order_penjualan DESC LIMIT 1 ");




if ($truncate2) {
	header("Location: ../../pages/index.php?order");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>