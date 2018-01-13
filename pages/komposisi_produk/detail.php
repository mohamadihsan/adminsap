<?php
    $sql = "SELECT
            	a.jumlah_produk,
            	b.jumlah_produk_dibawah_limit,
            	c.jumlah_produk_aman_limit,
            	d.lokasi_penyimpanan
            FROM
            	(
            		SELECT
            			COUNT(*) AS jumlah_produk
            		FROM
            			produk
            	) AS a
            JOIN (
            	SELECT
            		COUNT(*) AS jumlah_produk_dibawah_limit
            	FROM
            		produk
            	WHERE
            		stok <= 0
            ) AS b
            JOIN (
            	SELECT
            		COUNT(*) AS jumlah_produk_aman_limit
            	FROM
            		produk
            	WHERE
            		stok > 0
            ) AS c
            JOIN (
            	SELECT
            		COUNT(lp.lokasi_penyimpanan) AS lokasi_penyimpanan
            	FROM
            		(
            			SELECT
            				lokasi_penyimpanan
            			FROM
            				produk
            			GROUP BY
            				lokasi_penyimpanan
            		) AS lp
            ) AS d";
    $result = mysqli_query($konek, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlah_produk = $row['jumlah_produk'];
    $jumlah_produk_dibawah_limit = $row['jumlah_produk_dibawah_limit'];
    $jumlah_produk_aman_limit = $row['jumlah_produk_aman_limit'];
    $gudang = $row['lokasi_penyimpanan'];
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>KOMPOSISI PRODUK</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">JUMLAH PRODUK</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_produk ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient-red hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">new_releases</i>
                    </div>
                    <div class="content">
                        <div class="text">PRODUK DIBAWAH LIMIT</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $jumlah_produk_dibawah_limit ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">PRODUK AMAN LIMIT</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $jumlah_produk_aman_limit ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient-blue hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">home</i>
                    </div>
                    <div class="content">
                        <div class="text">PENYIMPANAN YANG DIGUNAKAN</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $gudang ?></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card-table">

                    <?php
                    if($_SESSION["hak_akses"] == 'kepala produksi'){
                        ?>
                        <div class="header">
                            <div class="row clearfix">
                               <a href="index.php?tambah_komposisi" title="Tambah Data"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
                                    <i class="material-icons">add</i>
                                </button></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="body">

                        <?php
                        $id_produk = $_GET['id_komposisi_produk'];
                        $sql = "SELECT
                                	k.id_bahan_baku,
                                	bb.kode_bahan_baku,
                                	bb.nama_bahan_baku,
                                	k.id_produk,
                                	p.kode_produk,
                                	p.nama_produk,
                                	p.satuan,
                                	j.nama_jenis,
                                	km.nama_kemasan,
                                	km.isi_per_dus,
                                	m.nama_merk,
                                	k.komposisi,
                                	k.status
                                FROM
                                	komposisi_produk k
                                LEFT JOIN bahan_baku bb ON bb.id_bahan_baku = k.id_bahan_baku
                                LEFT JOIN produk p ON p.id_produk = k.id_produk
                                LEFT JOIN jenis j ON j.id_jenis = p.id_jenis
                                LEFT JOIN kemasan km ON km.id_kemasan = p.id_kemasan
                                LEFT JOIN merk m ON m.id_merk = p.id_merk
                                WHERE
                                	k.id_produk = '$id_produk'";
                        $result = mysqli_query($konek, $sql);
                        $data=mysqli_fetch_assoc($result);
                        $kode_produk = $data['kode_produk'];
                        $nama_produk = $data['nama_produk'];
                        $satuan = $data['satuan'];
                        $nama_jenis = $data['nama_jenis'];
                        $nama_kemasan = $data['nama_kemasan'];
                        $isi_per_dus = $data['isi_per_dus'];
                        $nama_merk = $data['nama_merk'];
                        ?>
                        <a href="index.php?komposisi_produk" class="btn btn-default btn-sm right">Kembali</a>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th width="15%">Nama Produk</th>
                                    <td><?= $kode_produk.' - '.$nama_produk ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis </th>
                                    <td><?= $nama_jenis ?></td>
                                </tr>
                                <tr>
                                    <th>Merk</th>
                                    <td><?= $nama_merk ?></td>
                                </tr>
                                <tr>
                                    <th>Kemasan (Isi)</th>
                                    <td><?= $nama_kemasan.' ( '.$isi_per_dus.' '.$satuan.' )' ?></td>
                                </tr>
                            </thead>
                        </table>

                        <table class="table table-hover dataTable js-exportable">
                            <thead>
                        		<tr>
                                    <th width="5%">No</th>
                        			<th>Bahan Baku</th>
                        			<th width="70%">Qty</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                                <?php
        						// include 'table_komposisi.php';
                                $id_produk = $_GET['id_komposisi_produk'];
                                $sql = "SELECT
                                        	k.id_bahan_baku,
                                        	bb.kode_bahan_baku,
                                        	bb.nama_bahan_baku,
                                        	k.id_produk,
                                        	p.kode_produk,
                                        	p.nama_produk,
                                        	p.satuan,
                                        	j.nama_jenis,
                                        	km.nama_kemasan,
                                        	km.isi_per_dus,
                                        	m.nama_merk,
                                        	k.komposisi,
                                        	k.status
                                        FROM
                                        	komposisi_produk k
                                        LEFT JOIN bahan_baku bb ON bb.id_bahan_baku = k.id_bahan_baku
                                        LEFT JOIN produk p ON p.id_produk = k.id_produk
                                        LEFT JOIN jenis j ON j.id_jenis = p.id_jenis
                                        LEFT JOIN kemasan km ON km.id_kemasan = p.id_kemasan
                                        LEFT JOIN merk m ON m.id_merk = p.id_merk
                                        WHERE
                                        	k.id_produk = '$id_produk'";
                                $result = mysqli_query($konek, $sql);
                                $no=1;
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $kode_bahan_baku = $row['kode_bahan_baku'];
                                    $nama_bahan_baku = $row['nama_bahan_baku'];
                                    $komposisi = $row['komposisi'];
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kode_bahan_baku.' - '.$nama_bahan_baku ?></td>
                                        <td><?= $komposisi ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- #END# CPU Usage -->
    </div>
</section>
