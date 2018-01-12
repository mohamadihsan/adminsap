<?php ob_start(); session_start(); 
if(($_SESSION['sudahlogin']==true)&&($_SESSION['kaproduksi']!="")){ 

//KONEKSI 

include('../../lib/lib_func.php');  
$link=koneksi_db(); 

///VARIABEL 

$nama_peramalan = 'Baru'; 
$kode_produk = 
$_POST['kode_produk']; 
$queryBulan=mysql_query("SELECT MAX(pemesanan_produk.`tanggal_ pemesanan`) AS terakhir_pemesanan, MAX(pemesanan_produk.`tanggal_ pemesanan`) - INTERVAL '1' MONTH AS bulan_sebelum, MAX(pemesanan_produk.`tanggal_ pemesanan`) + INTERVAL '1' MONTH AS bulan_safety FROM pemesanan_produk, detail_pemesanan_produk WHERE pemesanan_produk.`no_faktur` = detail_pemesanan_produk.`no_fa ktur` AND detail_pemesanan_produk.`kode_ produk` = '$kode_produk'"); 

$dataBulan=mysql_fetch_array($queryBulan); 
$bulan_terakhir = $dataBulan['terakhir_pemesanan']; 
$bulan_sebelum = $dataBulan['bulan_sebelum']; 
$bulan_safety = $dataBulan['bulan_safety'] list($tahun_terakhir, $bulan_terakhir, 
$tanggal_terakhir) = explode("-",$bulan_terakhir); list($tahun_sebelum, $bulan_sebelum, 
$tanggal_sebelum) = explode("",$bulan_sebelum); list($tahun_safety, $bulan_safety, 
$tanggal_safety) = explode("-",$bulan_safety); 

//TOTAL SEBELUM 

$queryTotalSebelum=mysql_query ("SELECT SUM(detail_pemesanan_produk.`j umlah_pemesanan`) AS total_sebelum FROM detail_pemesanan_produk, pemesanan_produk WHERE pemesanan_produk.`no_faktur` = detail_pemesanan_produk.`no_faktur` AND detail_pemesanan_produk.`kode_ produk` = '$kode_produk' AND MONTH(pemesanan_produk.`tanggal_pemesanan`) = '$bulan_sebelum' AND YEAR(pemesanan_produk.`tanggal_pemesanan`) = '$tahun_sebelum'"); 
$dataTotalSebelum=mysql_fetch_array($queryTotalSebelum); 
$total_sebelum = $dataTotalSebelum['total_sebelum']; 

//TOTAL TERAKHIR 

$queryTotalTerakhir=mysql_query("SELECT SUM(detail_pemesanan_produk.`j umlah_pemesanan`) AS total_terakhir FROM detail_pemesanan_produk, pemesanan_produk WHERE pemesanan_produk.`no_faktur` = detail_pemesanan_produk.`no_fa ktur` AND detail_pemesanan_produk.`kode_ produk` = '$kode_produk' AND MONTH(pemesanan_produk.'tanggal_pemesanan') = '$bulan_terakhir' AND YEAR(pemesanan_produk.'tanggal_pemesanan') = '$tahun_terakhir'"); 
$dataTotalTerakhir=mysql_fetch_array($queryTotalTerakhir); 
$total_terakhir = $dataTotalTerakhir['total_terakhir']; 

//PERHITUNGAN SINGLE EXPONENSIAL SMOOTHING 

$alpha = 0.9; 
$nilai_sekarang = $alpha * $total_terakhir; 
$nilai_terakhir = (1-$alpha)*$total_sebelum; 
$jumlah_peramalan = $nilai_sekarang + $nilai_terakhir; 

//INSERT DATA PERAMALAN 

$myqry="INSERT into peramalan(kode_peramalan, kode_produk, nama_peramalan, tanggal_peramalan, jumlah_produksi)   values(null, trim('$kode_produk'), trim('$nama_peramalan'), NOW(), ROUND('$jumlah_peramalan'))"; 
mysql_query($myqry) or die(mysql_error()); 

//PERHITUNGAN SAFETY STOK 

$jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $bulan_safety, $tahun_safety); 
$jumlah_peramalan_bagi_hari = $jumlah_peramalan/$jumlah_hari; 
$standar_deviasi = round($jumlah_peramalan_bagi_hari)/10; $lead_time = 30; 
$standar_deviasi_lead_time = $lead_time/10; 
$service_level = 1.2816; $sdl = $standar_deviasi * sqrt($lead_time); 
$safety_stok = $service_level * round($sdl); $safety_stok_simpan = floor($safety_stok); 

while($dataSafety=mysql_fetch_array($resSafety)) 
	{ $jumlah_bahan_baku = $dataSafety['jumlah_bahan_baku']; 
$kode_bahan_baku_safety = $dataSafety['kode_bahan_baku']; 
$jumlah_safety_stok = $jumlah_bahan_baku*$safety_stok_simpan; 
$hasil_peramalan  	= $jumlah_bahan_baku*$jumlah_yang_harus_produksi; 
$myqryEditSafety="UPDATE bahan_baku SET safety_stok= ROUND('$jumlah_safety_stok'), hasil_peramalan = ROUND('$hasil_peramalan') WHERE kode_bahan_baku='$kode_bahan_b aku_safety'"; mysql_query($myqryEditSafety) or die(mysql_error()); 
} 
$myqryEditSafetyProduk="UPDATE produk SET safety_stok= ROUND('$safety_stok_simpan'), hasil_peramalan= '$jumlah_yang_harus_produksi' WHERE kode_produk='$kode_produk'"; mysql_query($myqryEditSafetyProduk) or die(mysql_error()); $queryNamaProduk=mysql_query("SELECT nama_produk FROM produk WHERE kode_produk='$kode_produk'"); $dataNamaProduk=mysql_fetch_array($queryNamaProduk); 
$nama_produk = $dataNamaProduk['nama_produk']; 

header("location:index.php?page=dataperamalan&&tambah_data_sukses=
$nama_produk"); } else{header("Location:../../va lidasi/belum-login.php");

} 
ob_end_flush(); 
?> 
