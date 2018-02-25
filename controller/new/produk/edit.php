<?php
include "../../config/koneksi.php";
session_start();
$id_produk				       = $_POST["id_produk"];
$kode_produk				   = $_POST["kode_produk"];
$nama_produk				   = $_POST["nama_produk"];
$satuan						   = $_POST["satuan"];
$harga     				       = $_POST["harga"];
$lokasi					       = $_POST["lokasi_penyimpanan"];
$stok				           = $_POST["stok"];
$id_user				       = $_POST["id_user"];
$id_supplier				   = $_POST["id_supplier"];


if($edit = mysqli_query($konek, "UPDATE produk SET id_produk='$id_produk', kode_produk='$kode_produk', nama_produk='$nama_produk', satuan='$satuan' , harga='$harga', lokasi_penyimpanan='$lokasi', stok='$stok', id_user='$id_user', id_supplier='$id_supplier'
          WHERE id_produk='$id_produk'")){
              $_SESSION['status_operasi'] = 'update success';
        header("Location: ../../pages/index.php?produk");
		exit();
	}
    $_SESSION['status_operasi'] = 'update failed';
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
