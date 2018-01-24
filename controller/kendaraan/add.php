<?php
include "../../config/koneksi.php";

$no_polisi = $_POST["no_polisi"];
$driver	   = $_POST["driver"];
$id_user   = $_POST["id_user"];
$status    = $_POST["status"];


if ($add = mysqli_query($konek, "INSERT INTO kendaraan (no_polisi, driver, id_user, status) VALUES
('$no_polisi','$driver','$id_user','$status')")){
	header("Location: ../../pages/index.php?kendaraan");
	exit();
}
die ("Terdapat kesalahan : ". mysqli_error($konek));


?>
