<?php
include_once '../config/koneksi.php';

function Tanggal($tanggal) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $tahun = substr($tanggal, 0, 4);
    $bulan = substr($tanggal, 5, 2);
    $tgl = substr($tanggal, 8, 2);

    $hasil = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($hasil);
}

$kirim_ke = $_SESSION['id_user'];

$sql = "SELECT
        	*
        FROM
        	(
        		SELECT
        			COUNT(*) jumlah_pemesanan_produk, pemberitahuan.tanggal_pemberitahuan
        		FROM
        			pemberitahuan
        		WHERE
        			kirim_ke = ''
        		AND tipe_pemberitahuan = 'pemesanan_produk'
        GROUP BY 2
        	) AS x
        JOIN (
        	SELECT
        		COUNT(*) jumlah_pembayaran_produk, pemberitahuan.tanggal_pemberitahuan
        	FROM
        		pemberitahuan
        	WHERE
        		kirim_ke = ''
        	AND tipe_pemberitahuan = 'pembayaran_produk'
        GROUP BY 2
        ) AS y
        JOIN (
        	SELECT
        		COUNT(*) jumlah_pengiriman_produk, pemberitahuan.tanggal_pemberitahuan
        	FROM
        		pemberitahuan
        	WHERE
        		kirim_ke = ''
        	AND tipe_pemberitahuan = 'pengiriman_produk'
        GROUP BY 2
        ) AS z";

$result = mysqli_query($konek, $sql);
$row = mysqli_fetch_assoc($result);
$jumlah_pemesanan_produk = $row['jumlah_pemesanan_produk'];
$jumlah_pembayaran_produk = $row['jumlah_pembayaran_produk'];
$jumlah_pengiriman_produk = $row['jumlah_pengiriman_produk'];
$tanggal_pemberitahuan = $row['tanggal_pemberitahuan'];
if ($tanggal_pemberitahuan != null) {
    $tanggal_pemberitahuan = Tanggal($tanggal_pemberitahuan);
}else{
    $tanggal_pemberitahuan = 'tidak ada pesan';
}
?>
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed waves-effect" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars" style="margin-bottom: 50px;"></a>
            <a style="margin-left: 20px;" class="navbar-brand" href="#">CV. SAP</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li class="dropdown ">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">PEMBERITAHUAN</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">account_balance_wallet</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><?= $jumlah_pembayaran_produk ?> Pembayaran</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> <?= $tanggal_pemberitahuan ?>
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><?= $jumlah_pemesanan_produk ?> Pemesanan Produk</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> <?= $tanggal_pemberitahuan ?>
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-red">
                                            <i class="material-icons">local_shipping</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><?= $jumlah_pengiriman_produk ?> Pengiriman Barang</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> <?= $tanggal_pemberitahuan ?>
                                            </p>
                                        </div>
                                    </a>
                                <!-- </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-orange">
                                            <i class="material-icons">mode_edit</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy</b> changed name</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-blue-grey">
                                            <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> commented your post</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">cached</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> updated status</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-purple">
                                            <i class="material-icons">settings</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Settings updated</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> Yesterday
                                            </p>
                                        </div>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="">Tampilkan Semua Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">account_circle</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?php echo "".ucwords($_SESSION["hak_akses"])."" ?></li>
                        <li class="body">
                            <a href="../controller/logout.php">
                                <ul class="menu">
                                    <i class="material-icons">exit_to_app</i>
                                    <span>Keluar Aplikasi</span>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
