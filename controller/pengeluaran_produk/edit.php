<?php
session_start();
include "../../config/koneksi.php";

$id_aliran          = $_POST['id_aliran'];
$id_gudang			= $_POST["id_gudang"];
$id_produk		= $_POST["id_produk"];
$qty				= $_POST["qty"];
$status_aliran		= $_POST["status_aliran"];
$id_user            = $_SESSION["id_user"];

$sql = "UPDATE aliran_bahan_baku_dan_produk
        SET
            id_produk = '$id_produk',
            qty = '$qty',
            id_gudang = '$id_gudang',
            status_aliran = '$status_aliran',
            id_user = '$id_user'
        WHERE
        	id_aliran = '$id_aliran'";

if ($add = mysqli_query($konek, $sql)){
    $_SESSION['status_operasi'] = 'udpate success';
	header("Location: ../../pages/index.php?pengeluaran_produk");
	exit();
}

$_SESSION['status_operasi'] = 'udpate failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>
