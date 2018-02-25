<?php
include "../../config/koneksi.php";
session_start();
$id_supplier                   = $_POST["id_supplier"];
$nama_supplier				   = $_POST["nama_supplier"];
$alamat				           = $_POST["alamat_supplier"];
$status				           = $_POST["status"];
$id_user				       = $_POST["id_user"];


if($edit = mysqli_query($konek, "UPDATE supplier SET id_supplier='$id_supplier', nama_supplier='$nama_supplier', alamat_supplier='$alamat', id_user='$id_user', status='$status'
          WHERE id_supplier='$id_supplier'")){
              $_SESSION['status_operasi'] = 'update success';
        header("Location: ../../pages/index.php?supplier");
		exit();
	}
    $_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
