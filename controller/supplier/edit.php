<?php
include "../../config/koneksi.php";

$id_supplier                   = $_POST["id_supplier"];
$nama_supplier				   = $_POST["nama_supplier"];
$alamat				           = $_POST["alamat_supplier"];
$status				           = $_POST["status"];
$id_user				       = $_POST["id_user"];


if($edit = mysqli_query($konek, "UPDATE supplier SET id_supplier='$id_supplier', nama_supplier='$nama_supplier', alamat_supplier='$alamat', id_user='$id_user', status='$status'
          WHERE id_supplier='$id_supplier'")){
		header("Location: ../../pages/index.php?supplier");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>