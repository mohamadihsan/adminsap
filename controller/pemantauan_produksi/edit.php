<?php
include "../../config/koneksi.php";

$id_monitoring_produksi				           = $_POST["id_monitoring_produksi"];
$status_produksi				               = $_POST["status_produksi"];


if($edit = mysqli_query($konek, "UPDATE monitoring_produksi SET status_produksi='$status_produksi'
          WHERE id_monitoring_produksi='$id_monitoring_produksi'")){
		header("Location: ../../pages/index.php?pemantauan_produksi");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
