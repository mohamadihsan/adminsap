<?php
include "../../config/koneksi.php";

$id_pelanggan                  = $_POST["id_pelanggan"];
$nama_pelanggan				   = $_POST["nama_pelanggan"];
$alamat						   = $_POST["alamat"];
$telepon     				   = $_POST["telepon"];
$email					       = $_POST["email"];
$tipe_pelanggan				   = $_POST["tipe_pelanggan"];
$kredit				           = $_POST["kredit_limit"];
$status				           = $_POST["status"];
$id_user				       = $_POST["id_user"];


if($edit = mysqli_query($konek, "UPDATE pelanggan SET id_pelanggan='$id_pelanggan', nama_pelanggan='$nama_pelanggan', alamat='$alamat', telepon='$telepon' , email='$email', kredit_limit='$kredit', id_user='$id_user', tipe_pelanggan='$tipe_pelanggan', status='$status'
          WHERE id_pelanggan='$id_pelanggan'")){
		header("Location: ../../pages/index.php?pelanggan");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>