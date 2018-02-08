<?php
include "../../config/koneksi.php";
session_start();

$id_retur  = $_GET["id_retur"];

mysqli_query($konek, "UPDATE retur SET status='DISETUJUI', verifikasi='DISETUJUI' WHERE id_retur = '$id_retur'")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'update success';
header("location: ../../pages/index.php?approval_retur");

?>
