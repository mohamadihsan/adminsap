<?php
include "../../config/koneksi.php";

$id_aliran = $_GET["id_aliran"];

if($delete = mysqli_query($konek, "DELETE FROM aliran_bahan_baku_dan_produk WHERE id_aliran='$id_aliran'")){
		header("Location: ../../pages/index.php?pengeluaran_bahan_baku");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
