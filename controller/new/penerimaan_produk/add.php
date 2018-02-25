<?php
session_start();
include "../../config/koneksi.php";

$id_gudang			= $_POST["id_gudang"];
$id_produk			= $_POST["id_produk"];
$qty				= $_POST["qty"];
$id_user            = $_SESSION["id_user"];
$status_aliran      = 'MASUK';


if ($add = mysqli_query($konek, "INSERT INTO aliran_bahan_baku_dan_produk (id_gudang, id_produk, qty, id_user, status_aliran) VALUES
('$id_gudang','$id_produk','$qty','$id_user','$status_aliran')")){
	$_SESSION['status_operasi'] = 'add success';
	header("Location: ../../pages/index.php?penerimaan_produk");
	exit();
}
$_SESSION['status_operasi'] = 'add failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>
