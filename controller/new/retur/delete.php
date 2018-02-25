<?php
include "../../config/koneksi.php";
session_start();
$id_retur = $_GET["id_retur"];

if($delete = mysqli_query($konek, "DELETE FROM retur WHERE id_retur='$id_retur'")){
        $_SESSION['status_operasi'] = 'delete success';
        header("Location: ../../pages/index.php?retur");
		exit();
	}
    $_SESSION['status_operasi'] = 'delete failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
