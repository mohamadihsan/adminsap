<?php
include "../../config/koneksi.php";
session_start();

$id_order_penjualan     = $_POST["id_order_penjualan"];
$status_produk		    = $_POST["status_produk"];
$alasan_retur		    = $_POST["alasan_retur"];
$qty     			    = $_POST["qty"];
$status                 = 'DITERIMA';
$id_user                = $_SESSION['id_user'];

$sql = "SELECT
        	order_penjualan.no_invoice,
        	order_penjualan.tanggal_order,
        	pengiriman.tanggal_kirim,
        	order_penjualan.id_pelanggan,
        	order_penjualan.id_produk,
        	produk.nama_produk
        FROM
        	order_penjualan
        LEFT JOIN pengiriman ON pengiriman.id_order_penjualan = order_penjualan.id_order_penjualan
        LEFT JOIN produk ON produk.id_produk = order_penjualan.id_produk
        WHERE
        	order_penjualan.id_order_penjualan = '$id_order_penjualan'";
$result = mysqli_query($konek, $sql);
$row = mysqli_fetch_assoc($result);
$tgl_pesan = $row['tanggal_order'];
$tgl_kirim = $row['tanggal_kirim'];
$id_pelanggan = $row['id_pelanggan'];
$no_invoice = $row['no_invoice'];
$id_produk = $row['id_produk'];
$nama_produk = $row['nama_produk'];

if ($add = mysqli_query($konek, "INSERT INTO retur (no_invoice, id_order_penjualan, tgl_pesan, tgl_kirim, id_pelanggan, id_produk, status_produk, nama_produk, qty, alasan_retur, status, id_user) VALUES
	('$no_invoice','$id_order_penjualan','$tgl_pesan','$tgl_kirim', '$id_pelanggan', '$id_produk', '$status_produk', '$nama_produk', '$qty', '$alasan_retur','$status','$id_user')")){
		header("Location: ../../pages/index.php?retur");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
