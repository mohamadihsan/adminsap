<?php
session_start();
include "../../config/koneksi.php";

$id_gudang			= $_POST["id_gudang"];
$id_bahan_baku		= $_POST["id_bahan_baku"];
$qty				= $_POST["qty"];
$id_user            = $_SESSION["id_user"];
$status_aliran      = 'MASUK';


if ($add = mysqli_query($konek, "INSERT INTO aliran_bahan_baku_dan_produk (id_gudang, id_bahan_baku, qty, id_user, status_aliran) VALUES
('$id_gudang','$id_bahan_baku','$qty','$id_user','$status_aliran')")){
	header("Location: ../../pages/index.php?penerimaan_bahan_baku");
	exit();
}
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>
