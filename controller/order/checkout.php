<?php
session_start();
include "../../config/koneksi.php";

$id_user = $_SESSION['id_user'];

try {
	$sql = "SELECT
				sum(cart.harga) AS total,
				pelanggan.nama_pelanggan,
				pelanggan.id_pelanggan,
				cart.no_invoice,
				cart.id_produk,
				produk.nama_produk,
				cart.harga,
				SUM(cart.qty) AS qty
			FROM
				cart
			INNER JOIN pelanggan ON cart.nama_pelanggan = pelanggan.nama_pelanggan
			LEFT JOIN produk ON produk.id_produk = cart.id_produk

			GROUP BY
				2,
				3,
				4,
				5,
				6,
				7
			HAVING
				sum(cart.harga) > 0";
	// $copyorder=mysqli_query($konek, "select sum(cart.harga) as total, pelanggan.nama_pelanggan, pelanggan.id_pelanggan, cart.nama_pelanggan, cart.no_invoice, cart.id_produk, cart.qty, cart.harga from cart inner join pelanggan on cart.nama_pelanggan = pelanggan.nama_pelanggan");
	if($copyorder=mysqli_query($konek, $sql)){ }else{ die ("Terdapat kesalahan1 : ". mysqli_error($konek)); }
	$data=mysqli_fetch_array($copyorder);
	$id_pelanggan=$data['id_pelanggan'];
	$no_invoice=$data['no_invoice'];
	$nama_pelanggan=$data['nama_pelanggan'];
	$qty=$data['qty'];
	$nama_produk=$data['nama_produk'];
	$id_produk=$data['id_produk'];
	$total=$data['total'];
	$harga=$data['harga'];
	$status_order = 'MENUNGGU PEMBAYARAN';
	if($add = mysqli_query($konek, "INSERT INTO order_penjualan (no_invoice, id_pelanggan, nama_pelanggan, id_produk, status_order, total_pembayaran, id_user) VALUES
		('$no_invoice','$id_pelanggan','$nama_pelanggan', '$id_produk', '$status_order', '$total', '$id_user')")){ }else{ die ("Terdapat kesalahan2 : ". mysqli_error($konek)); }

	$id_order_penjualan = mysqli_insert_id($konek);

	// $details=mysqli_query($konek, "INSERT INTO order_penjualan_detail (id_order_penjualan, nama_pelanggan, no_invoice, nama_produk, qty, harga) select nama_pelanggan, no_invoice, id_produk, qty, harga from cart");
	if($details=mysqli_query($konek, "INSERT INTO order_penjualan_detail (id_order_penjualan, nama_produk, qty, harga) VALUES ('$id_order_penjualan','$nama_produk', '$qty', '$harga')")){ }else{ die ("Terdapat kesalahan3 : ". mysqli_error($konek)); }

	$stok=mysqli_query($konek, "select cart.id_produk, produk.nama_produk, cart.qty, produk.stok from produk inner join cart on cart.id_produk = produk.id_produk");
	while($data=mysqli_fetch_array($stok)){
		$sisa=$data['stok']-$data['qty'];
		$id_produk = $data['id_produk'];
		if(mysqli_query($konek, "update produk set stok='$sisa' where produk.id_produk = '$id_produk'")){ }else{ die ("Terdapat kesalahan4 : ". mysqli_error($konek)); }
	}

	$sql = "SELECT
				cart.id_produk,
				cart.qty,
				gudang.id_gudang,
				produk.id_produk,
				produk.lokasi_penyimpanan,
				gudang.nama_gudang
			FROM
				cart
			INNER JOIN produk ON cart.id_produk = produk.id_produk
			INNER JOIN gudang ON produk.lokasi_penyimpanan = gudang.nama_gudang";
	// $pengeluaran=mysqli_query($konek, "select cart.id_produk, cart.qty, gudang.id_produk, gudang.id_gudang, produk.id_produk, produk.lokasi_penyimpanan, gudang.nama_gudang from cart inner join gudang, produk on cart.id_produk=produk.id_produk AND produk.id_produk = gudang.id_produk AND produk.lokasi_penyimpanan = gudang.nama_gudang'");
	$pengeluaran=mysqli_query($konek, $sql);
	$data=mysqli_fetch_array($pengeluaran);
	$id_gudang=$data['id_gudang'];
	$id_produk=$data['id_produk'];
	$qty=$data['qty'];
	if($add_aliran = mysqli_query($konek, "INSERT INTO aliran_bahan_baku_dan_produk (id_gudang, id_produk, qty, id_user, status_aliran) VALUES
		('$id_gudang','$id_produk', '$qty', '$id_user', 'TERJUAL')")){ }else{ die ("Terdapat kesalahan5 : ". mysqli_error($konek)); }

	if($delete = mysqli_query($konek, "DELETE FROM cart WHERE no_invoice='$no_invoice'")){ }else{ die ("Terdapat kesalahan6 : ". mysqli_error($konek)); }

	header("Location: ../../pages/index.php?pemesanan_produk");
	exit();
} catch (Exception $e) {
	die ("Terdapat kesalahan : ". mysqli_error($konek) .' & '.$e);
}
?>
