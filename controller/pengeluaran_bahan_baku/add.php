<?php
session_start();
include "../../config/koneksi.php";

$id_gudang			= $_POST["id_gudang"];
$id_bahan_baku		= $_POST["id_bahan_baku"];
$qty				= $_POST["qty"];
$id_user            = $_SESSION["id_user"];
$status_aliran      = $_POST['status_aliran'];


if ($add = mysqli_query($konek, "INSERT INTO aliran_bahan_baku_dan_produk (id_gudang, id_bahan_baku, qty, id_user, status_aliran) VALUES
('$id_gudang','$id_bahan_baku','$qty','$id_user','$status_aliran')")){

	// get dta stock saat ini
	$sql = "SELECT
				stock
			FROM
				bahan_baku
			WHERE
				id_bahan_baku = '$id_bahan_baku'";
	$result = mysqli_query($konek, $sql);
	$row=mysqli_fetch_assoc($result);
	$stock_sebelumnya = $row['stock'];

	$stock_baru = $stock_sebelumnya - $qty;

	//update stock
	$sql = "UPDATE bahan_baku
			SET stock = '$stock_baru'
			WHERE
				id_bahan_baku = '$id_bahan_baku'";
	mysqli_query($konek, $sql);

	header("Location: ../../pages/index.php?pengeluaran_bahan_baku");
	exit();
}
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>
