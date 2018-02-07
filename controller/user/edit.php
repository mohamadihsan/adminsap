<?php
include "../../config/koneksi.php";
session_start();
$id_user                   = $_POST["id_user"];
$username				   = $_POST["username"];
$password				   = md5($_POST["password"]);
$hak_akses				   = $_POST["hak_akses"];
$status     			   = $_POST["status"];


if($edit = mysqli_query($konek, "UPDATE user SET username='$username', password='$password', hak_akses='$hak_akses', status='$status'
          WHERE id_user='$id_user'")){
              $_SESSION['status_operasi'] = 'update success';
        header("Location: ../../pages/index.php?user");
		exit();
	}
    $_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
