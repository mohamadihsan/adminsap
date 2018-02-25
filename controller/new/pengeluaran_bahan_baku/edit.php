<?php
session_start();
include "../../config/koneksi.php";

$id_aliran          = $_POST['id_aliran'];
$id_gudang			= $_POST["id_gudang"];
$id_bahan_baku		= $_POST["id_bahan_baku"];
$qty				= $_POST["qty"];
$status_aliran		= $_POST["status_aliran"];
$id_user            = $_SESSION["id_user"];

$sql = "UPDATE aliran_bahan_baku_dan_produk
        SET
            id_bahan_baku = '$id_bahan_baku',
            qty = '$qty',
            id_gudang = '$id_gudang',
            status_aliran = '$status_aliran',
            id_user = '$id_user'
        WHERE
        	id_aliran = '$id_aliran'";

if ($add = mysqli_query($konek, $sql)){
    $_SESSION['status_operasi'] = 'update success';
	header("Location: ../../pages/index.php?pengeluaran_bahan_baku");
	exit();
}
$_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>
