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
            <h2>BAHAN - BAKU</h2>
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
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card-table">

                    <?php
                    if($_SESSION["hak_akses"] == 'admin gudang'){
                        ?>
                        <div class="header">
                            <div class="row clearfix">
                               <a href="index.php?tambah-bahanbaku" title="Tambah Data"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
                                    <i class="material-icons">add</i>
                                </button></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="body">
                        <?php
						    include 'table_bahan_baku.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
