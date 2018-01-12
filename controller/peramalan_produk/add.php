<?php
include "../../config/koneksi.php";

$id_produk				       = $_POST["id_produk"];
$nama_produk				   = $_POST["nama_produk"];
$jumlah_penjualan	           = $_POST["jumlah_penjualan"];
$periode                       = $_POST["periode"];
 
$ramal=mysqli_query($konek, "select order_penjualan_detail.nama_produk, sum(order_penjualan_detail.qty) as jumlah, order_penjualan_detail.qty as awal from order_penjualan_detail inner join order_penjualan on order_penjualan.no_invoice =  order_penjualan_detail.no_invoice");
$data=mysqli_fetch_array($ramal);

$bulan = 1;
$alpha = 0.9;
$S = $jumlah_penjualan / $bulan * $alpha;
$selisih = $S + $bulan * $alpha;

mysqli_query($konek, "INSERT INTO peramalan(id_peramalan, id_produk, nama_produk, jumlah_penjualan, periode, hasil_peramalan, selisih) VALUES ('','$id_produk','$nama_produk','$jumlah_penjualan','$periode', '$S','$selisih')")or die(mysqli_error($konek));
header("location: ../../pages/index.php?peramalan_produk");
?>