<?php
include "../../config/koneksi.php";

$id_produk				           = $_POST["id_produk"];
$id_bahan_baku				       = $_POST["id_bahan_baku"];
$komposisi				           = $_POST["komposisi"];
$status				               = $_POST["status"];
$id_user				           = $_POST["id_user"];

$dt=mysqli_query($konek, "select * from bahan_baku where id_bahan_baku='$id_bahan_baku'");
$data=mysqli_fetch_array($dt);
$sisa=$data['stock']-$komposisi;
mysqli_query($konek, "update bahan_baku set stock='$sisa' where id_bahan_baku='$id_bahan_baku'");

$add2 = mysqli_query($konek, "UPDATE produk SET status_komposisi='SUDAH' WHERE id_produk ='$id_produk'");

$pengeluaran=mysqli_query($konek, "select * from bahan_baku inner join gudang where id_bahan_baku='$id_bahan_baku AND bahan_baku.lokasi_penyimpanan = gudang.nama_gudang'");
$data=mysqli_fetch_array($pengeluaran);
$id_gudang=$data['id_gudang'];
$add_aliran = mysqli_query($konek, "INSERT INTO aliran_bahan_baku_dan_produk (id_aliran, id_gudang, id_bahan_baku, id_produk, qty, id_user, status_aliran) VALUES
	('','$id_gudang',$id_bahan_baku, NULL , '$komposisi','$id_user','DIPAKAI')");

$add = mysqli_query($konek, "INSERT INTO komposisi_produk (id_produk, id_bahan_baku, komposisi, status) VALUES
	('$id_produk','$id_bahan_baku','$komposisi','SUDAH DIBUAT')") or die(mysqli_error($konek));
header("location: ../../pages/index.php?komposisi-produk");

?>