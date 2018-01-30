<?php
include "../../config/koneksi.php";
session_start();
$id_monitoring_produksi				           = $_POST["id_monitoring_produksi"];
$status_produksi				               = $_POST["status_produksi"];


if($edit = mysqli_query($konek, "UPDATE monitoring_produksi SET status_produksi='$status_produksi'
          WHERE id_monitoring_produksi='$id_monitoring_produksi'")){
              $_SESSION['status_operasi'] = 'udpate success';
        header("Location: ../../pages/index.php?pemantauan_produksi");
		exit();
	}
    $_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
