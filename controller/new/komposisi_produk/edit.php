<?php
include "../../config/koneksi.php";
session_start();

$id_produk				           = $_POST["id_produk"];
$id_bahan_baku				       = $_POST["id_bahan_baku"];
$komposisi				           = $_POST["komposisi"];
$status				               = $_POST["status"];


if($edit = mysqli_query($konek, "UPDATE komposisi_produk SET id_produk='$id_produk', id_bahan_baku='$id_bahan_baku', komposisi='$komposisi', status='$status'
          WHERE komposisi='$komposisi'")){
              $_SESSION['status_operasi'] = 'udpate success';
        header("Location: ../../pages/index.php?komposisi-produk");
		exit();
	}
    $_SESSION['status_operasi'] = 'udpate failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
