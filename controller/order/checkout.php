<?php
include "../../config/koneksi.php";

$copyorder=mysqli_query($konek, "select sum(cart.harga) as total, pelanggan.nama_pelanggan, pelanggan.id_pelanggan, cart.nama_pelanggan, cart.no_invoice, cart.id_produk, cart.qty, cart.harga from cart inner join pelanggan on cart.nama_pelanggan = pelanggan.nama_pelanggan");
$data=mysqli_fetch_array($copyorder);
$id_pelanggan=$data['id_pelanggan'];
$no_invoice=$data['no_invoice'];
$nama_pelanggan=$data['nama_pelanggan'];
$qty=$data['qty'];
$total=$data['total'];
$add = mysqli_query($konek, "INSERT INTO order_penjualan (id_order_penjualan, no_invoice, id_pelanggan, nama_pelanggan, total_pembayaran) VALUES
	('','$no_invoice','$id_pelanggan','$nama_pelanggan', '$total')");

$details=mysqli_query($konek, "INSERT INTO order_penjualan_detail (nama_pelanggan, no_invoice, nama_produk, qty, harga) select nama_pelanggan, no_invoice, id_produk, qty, harga from cart");

$stok=mysqli_query($konek, "select cart.id_produk, produk.id_produk, cart.qty, produk.stok from produk inner join cart on cart.id_produk = produk.id_produk");
$data=mysqli_fetch_array($stok);
$sisa=$data['stok']-$data['qty'];
mysqli_query($konek, "select cart.id_produk, produk.id_produk, cart.qty, produk.stok from produk inner join cart on cart.id_produk = produk.nama_produk update produk set stok='$sisa' where cart.id_produk = produk.nama_produk");

$pengeluaran=mysqli_query($konek, "select cart.id_produk, cart.qty, gudang.id_produk, gudang.id_gudang, produk.id_produk, produk.lokasi_penyimpanan, gudang.nama_gudang from cart inner join gudang, produk on cart.id_produk=produk.id_produk AND produk.id_produk = gudang.id_produk AND produk.lokasi_penyimpanan = gudang.nama_gudang'");
$data=mysqli_fetch_array($pengeluaran);
$id_gudang=$data['id_gudang'];
$id_produk=$data['id_produk'];
$qty=$data['qty'];
$add_aliran = mysqli_query($konek, "INSERT INTO aliran_bahan_baku_dan_produk (id_aliran, id_gudang, id_bahan_baku, id_produk, qty, status_aliran) VALUES
	('','$id_gudang',NULL,'$id_produk', '$qty', 'TERJUAL')");

$delete = mysqli_query($konek, "DELETE FROM cart WHERE no_invoice='$no_invoice'");


$details=mysqli_query($konek, "select produk.nama-produk, cart.id_produk, produk.id_produk, cart.qty, produk.stok from produk inner join cart on cart.id_produk = produk.id_produk");
$data=mysqli_fetch_array($details);
$nama_produk=$data['nama_produk'];
$qty=$data['qty'];
$harga=$data['harga'];
if ( $add = mysqli_query($konek, "INSERT INTO order_penjualan_detail(id_order_penjualan, nama_produk, qty, harga) VALUES ('','$nama_produk','$qty','$harga')")){
	header("Location: ../../pages/index.php?pemesanan_produk");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>