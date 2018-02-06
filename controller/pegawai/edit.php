<?php
include "../../config/koneksi.php";
session_start();
$id_pegawai                  = $_POST["id_pegawai"];
$nip                  = $_POST["nip"];
$nama_pegawai				   = $_POST["nama_pegawai"];
$alamat						   = $_POST["alamat"];
$phone_number     				   = $_POST["phone_number"];
$email					       = $_POST["email"];
$status				           = $_POST["status"];
$id_user				           = $_POST["id_user"];


if($edit = mysqli_query($konek, "UPDATE pegawai SET nip='$nip', nama_pegawai='$nama_pegawai', alamat='$alamat', phone_number='$phone_number' , email='$email', id_user='$id_user', status='$status'
          WHERE id_pegawai='$id_pegawai'")){
              $_SESSION['status_operasi'] = 'update success';
        header("Location: ../../pages/index.php?pegawai");
		exit();
	}
    $_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
