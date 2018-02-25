<?php
    $sql = "SELECT
            	a.jumlah_bahan_baku,
            	b.jumlah_bahan_baku_dibawah_limit,
            	c.jumlah_bahan_baku_aman_limit,
            	d.lokasi_penyimpanan
            FROM
            	(
            		SELECT
            			COUNT(*) AS jumlah_bahan_baku
            		FROM
            			bahan_baku
            	) AS a
            JOIN (
            	SELECT
            		COUNT(*) AS jumlah_bahan_baku_dibawah_limit
            	FROM
            		bahan_baku
            	WHERE
            		stock <= 0
            ) AS b
            JOIN (
            	SELECT
            		COUNT(*) AS jumlah_bahan_baku_aman_limit
            	FROM
            		bahan_baku
            	WHERE
            		stock > 0
            ) AS c
            JOIN (
            	SELECT
            		COUNT(lp.lokasi_penyimpanan) AS lokasi_penyimpanan
            	FROM
            		(
            			SELECT
            				lokasi_penyimpanan
            			FROM
            				bahan_baku
            			GROUP BY
            				lokasi_penyimpanan
            		) AS lp
            ) AS d";
    $result = mysqli_query($konek, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlah_bahan_baku = $row['jumlah_bahan_baku'];
    $jumlah_bahan_baku_dibawah_limit = $row['jumlah_bahan_baku_dibawah_limit'];
    $jumlah_bahan_baku_aman_limit = $row['jumlah_bahan_baku_aman_limit'];
    $gudang = $row['lokasi_penyimpanan'];
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>KEBUTUHAN BAHAN BAKU</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">JUMLAH BAHAN - BAKU</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_bahan_baku ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient-red hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">new_releases</i>
                    </div>
                    <div class="content">
                        <div class="text">BAHAN - BAKU DIBAWAH LIMIT</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $jumlah_bahan_baku_dibawah_limit ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">BAHAN - BAKU AMAN LIMIT</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $jumlah_bahan_baku_aman_limit ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient-blue hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">GUDANG YANG DIGUNAKAN</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $gudang ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card-table">

                    <!-- <div class="header">
                        <div class="row clearfix">
                           <a href="index.php?tambah_komposisi" title="Tambah Data"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
                                <i class="material-icons">add</i>
                            </button></a>
                        </div>
                    </div> -->

                    <div class="body">

                        <?php
                        $id_order_penjualan = $_GET['id_order_penjualan'];
                        $sql = "SELECT
                                	p.kode_produk,
                                	p.nama_produk,
                                	p.satuan,
                                	opd.qty
                                FROM
                                	order_penjualan op
                                LEFT JOIN order_penjualan_detail opd ON opd.id_order_penjualan = op.id_order_penjualan
                                LEFT JOIN produk p ON p.id_produk = op.id_produk
                                WHERE
                                	op.id_order_penjualan = '$id_order_penjualan'";
                        $result = mysqli_query($konek, $sql);
                        $data=mysqli_fetch_assoc($result);
                        $kode_produk = $data['kode_produk'];
                        $nama_produk = $data['nama_produk'];
                        $satuan = $data['satuan'];
                        $jumlah_order = $data['qty'];
                        ?>
                        <a href="index.php?kebutuhan_bahan_baku" class="btn btn-default btn-sm right">Kembali</a>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th width="15%">Nama Produk</th>
                                    <td><?= $kode_produk.' - '.$nama_produk ?></td>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td><?= $satuan ?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Order </th>
                                    <td><?= $jumlah_order ?></td>
                                </tr>
                            </thead>
                        </table>

                        <table class="table table-hover dataTable js-exportable">
                            <thead>
                        		<tr>
                                    <th width="5%">No</th>
                        			<th width="30%">Bahan Baku</th>
                        			<th width="15%">Jumlah Kebutuhan</th>
                        			<th width="55%">Satuan</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                                <?php
        						// include 'table_komposisi.php';
                                $id_order_penjualan = $_GET['id_order_penjualan'];
                                $sql = "SELECT
                                        	a.id_bahan_baku,
                                        	a.kode_bahan_baku,
                                        	a.nama_bahan_baku,
                                        	a.komposisi,
                                            a.satuan,
                                        	b.qty,
                                        	(b.qty * a.komposisi) AS kebutuhan_bahan_baku
                                        FROM
                                        	(
                                        		SELECT
                                        			kp.id_produk,
                                        			kp.id_bahan_baku,
                                        			kp.komposisi,
                                        			bb.kode_bahan_baku,
                                        			bb.nama_bahan_baku,
                                                    bb.satuan
                                        		FROM
                                        			komposisi_produk kp
                                        		LEFT JOIN bahan_baku bb ON bb.id_bahan_baku = kp.id_bahan_baku
                                        		WHERE
                                        			kp.id_produk IN (
                                        				SELECT
                                        					op.id_produk
                                        				FROM
                                        					order_penjualan op
                                        				LEFT JOIN order_penjualan_detail opd ON opd.id_order_penjualan = op.id_order_penjualan
                                        				WHERE
                                        					op.id_order_penjualan = '$id_order_penjualan'
                                        			)
                                        	) AS a
                                        LEFT JOIN (
                                        	SELECT
                                        		op.id_produk,
                                        		opd.qty
                                        	FROM
                                        		order_penjualan op
                                        	LEFT JOIN order_penjualan_detail opd ON opd.id_order_penjualan = op.id_order_penjualan
                                        	WHERE
                                        		op.id_order_penjualan = '$id_order_penjualan'
                                        ) AS b ON a.id_produk = b.id_produk";
                                $result = mysqli_query($konek, $sql);
                                $no=1;
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $kode_bahan_baku = $row['kode_bahan_baku'];
                                    $nama_bahan_baku = $row['nama_bahan_baku'];
                                    $jumlah_kebutuhan_bahan_baku = $row['kebutuhan_bahan_baku'];
                                    $satuan = $row['satuan'];
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kode_bahan_baku.' - '.$nama_bahan_baku ?></td>
                                        <td><?= $jumlah_kebutuhan_bahan_baku ?></td>
                                        <td><?= $satuan ?></td>
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
