<?php
include "../../config/koneksi.php";
session_start();

$no_invoice				       = $_POST["no_invoice"];
$id_pelanggan				   = $_POST["id_pelanggan"];
$id_produk				       = $_POST["id_produk"];
$harga     				       = $_POST["harga"];
$qty					       = $_POST["qty"];
$id_user				       = $_POST["id_user"];

$status=mysqli_query($konek, "select * from produk where id_produk='$id_produk'");
$data=mysqli_fetch_array($status);
$komposisi=$data['id_jenis'];

if ($komposisi['id_jenis'] == 1) {

$pelanggana=mysqli_query($konek, "select * from pelanggan where id_pelanggan='$id_pelanggan'");
$data=mysqli_fetch_array($pelanggana);
$pelanggan=$data['nama_pelanggan'];
$add = mysqli_query($konek, "INSERT INTO order_penjualan (id_order_penjualan, no_invoice, id_pelanggan, nama_pelanggan, id_produk, id_user) VALUES
	('','$no_invoice','$id_pelanggan', '$pelanggan','$id_produk','$id_user')");

$dt=mysqli_query($konek, "select * from produk where id_produk='$id_produk'");
$data=mysqli_fetch_array($dt);
$sisa=$data['stok']-$qty;
mysqli_query($konek, "update produk set stok='$sisa' where id_produk='$id_produk'");

$cari_kd=mysqli_query($konek, "select max(id_order_penjualan)as kode from order_penjualan"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_kd);
        $kode=substr($tm_cari['kode'] + 1); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
            if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $id="".$tambah;
            }else{
            $id="0".$tambah;
            }

$add_aliran = mysqli_query($konek, "INSERT INTO monitoring_produksi (id_monitoring_produksi, id_order_produk, status_produksi) VALUES
	('','$id','BELUM PRODUKSI')");

$total_harga=$harga*$qty;
$produk=mysqli_query($konek, "select nama_produk from produk where id_produk='$id_produk'");
$data=mysqli_fetch_array($produk);
$nama_produk=$data['nama_produk'];
mysqli_query($konek, "INSERT INTO order_penjualan_detail(id_order_penjualan, nama_produk, qty, harga) VALUES ('','$nama_produk','$qty','$total_harga')")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'add success';
header("location: ../../pages/index.php?order-confirm");

}else{

$pelanggana=mysqli_query($konek, "select * from pelanggan where id_pelanggan='$id_pelanggan'");
$data=mysqli_fetch_array($pelanggana);
$pelanggan=$data['nama_pelanggan'];
$add = mysqli_query($konek, "INSERT INTO order_penjualan (id_order_penjualan, no_invoice, id_pelanggan, nama_pelanggan, id_produk, id_user) VALUES
	('','$no_invoice','$id_pelanggan', '$pelanggan','$id_produk','$id_user')");

$dt=mysqli_query($konek, "select * from produk where id_produk='$id_produk'");
$data=mysqli_fetch_array($dt);
$sisa=$data['stok']-$qty;
mysqli_query($konek, "update produk set stok='$sisa' where id_produk='$id_produk'");

$pengeluaran=mysqli_query($konek, "select * from produk inner join gudang where id_produk='$id_produk AND produk.lokasi_penyimpanan = gudang.nama_gudang'");
$data=mysqli_fetch_array($pengeluaran);
$id_gudang=$data['id_gudang'];
$add_aliran = mysqli_query($konek, "INSERT INTO aliran_bahan_baku_dan_produk (id_aliran, id_gudang, id_bahan_baku, id_produk, qty, id_user, status_aliran) VALUES
	('','$id_gudang',NULL,'$id_produk', '$qty','$id_user','TERJUAL')");

$total_harga=$harga*$qty;
$produk=mysqli_query($konek, "select nama_produk from produk where id_produk='$id_produk'");
$data=mysqli_fetch_array($produk);
$nama_produk=$data['nama_produk'];
mysqli_query($konek, "INSERT INTO order_penjualan_detail(id_order_penjualan, nama_produk, qty, harga) VALUES ('','$nama_produk','$qty','$total_harga')")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'add success';

$pesan_pemberitahuan = 'Terdapat transaksi Pemesanan Produk pada tanggal: '.date('d-m-Y');
$tipe_pemberitahuan = 'pemesanan_produk';
$status_pemberitahuan = 'belum';
$kirim_ke = 'supervisor';
$tanggal_pemberitahuan = date('Y-m-d');
$status = 'ok';
mysqli_query($konek, "INSERT INTO pemberitahuan(pesan_pemberitahuan, tipe_pemberitahuan, status_pemberitahuan, kirim_ke, tanggal_pemberitahuan, status) VALUES ('$pesan_pemberitahuan','$tipe_pemberitahuan','$status_pemberitahuan','$kirim_ke','$tanggal_pemberitahuan','$status')")or die(mysqli_error($konek));
$_SESSION['status_operasi'] = 'add success';

header("location: ../../pages/index.php?order-confirm");

};

?>
