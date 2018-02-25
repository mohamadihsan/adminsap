<?php
include "../../config/koneksi.php";
session_start();

$id_produk				       = $_POST["id_produk"];
$nama_produk				   = $_POST["nama_produk"];
$jumlah_penjualan	           = $_POST["jumlah_penjualan"];
$periode                       = $_POST["bulan"].' '.$_POST['tahun'];

if ($_POST['bulan'] == '01') {
    $periode_sebelumnya = '12 '.($_POST['tahun']-1);
}else if ($_POST['bulan'] == '02') {
    $periode_sebelumnya = '01 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '03') {
    $periode_sebelumnya = '02 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '04') {
    $periode_sebelumnya = '03 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '05') {
    $periode_sebelumnya = '04 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '06') {
    $periode_sebelumnya = '05 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '07') {
    $periode_sebelumnya = '06 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '08') {
    $periode_sebelumnya = '07 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '09') {
    $periode_sebelumnya = '08 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '10') {
    $periode_sebelumnya = '09 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '11') {
    $periode_sebelumnya = '10 '.($_POST['tahun']);
}else if ($_POST['bulan'] == '12') {
    $periode_sebelumnya = '11 '.($_POST['tahun']);
}

$sql = "SELECT
        	hasil_peramalan
        FROM
        	peramalan
        WHERE
        	id_produk = '$id_produk'
        AND periode = '$periode_sebelumnya'";
$result=mysqli_query($konek, $sql);
if (mysqli_num_rows($result) > 0) {
    $row=mysqli_fetch_assoc($result);
    $hasil_peramalan_sebelumnya = $row['hasil_peramalan'];
}else{
    $hasil_peramalan_sebelumnya = $jumlah_penjualan;
}

$alpha = 0.9;
$hasil_peramalan = $alpha*$jumlah_penjualan + (1-$alpha) * $hasil_peramalan_sebelumnya;
$selisih = abs($hasil_peramalan - $jumlah_penjualan);

$sql = "SELECT
        	SUM(hasil_peramalan) AS total_peramalan,
        	SUM(jumlah_penjualan) AS total_penjualan
        FROM
        	peramalan
        WHERE
        	id_produk = '$id_produk'";
$result=mysqli_query($konek, $sql);
$jml_data = mysqli_num_rows($result);
if ($jml_data > 0) {
    $row=mysqli_fetch_assoc($result);
    $total1 = $row['total_peramalan'];
    $total2 = $row['total_penjualan'];

    $persentase_kesalahan = number_format(pow(abs($total1 - $total2), 2)/$jml_data);
}else{
    $persentase_kesalahan = null;
}

$sql = "INSERT INTO peramalan(
        	id_produk,
        	nama_produk,
        	periode,
        	jumlah_penjualan,
        	hasil_peramalan,
        	selisih,
        	persentase_kesalahan
        )
        VALUES
        	(
        		'$id_produk',
        		'$nama_produk',
        		'$periode',
        		'$jumlah_penjualan',
        		'$hasil_peramalan',
        		'$selisih',
        		'$persentase_kesalahan'
        	)";
mysqli_query($konek, $sql)or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'add success';
header("location: ../../pages/index.php?peramalan_produk");
?>
