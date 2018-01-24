<?php
    $sql = "SELECT
            	k.id_kendaraan,
            	k.no_polisi,
            	k.driver,
            	k.id_user,
            	k.`status`
            FROM
            	kendaraan k";
    $result = mysqli_query($konek, $sql);
    $jumlah_kendaraan = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>KENDARAAN</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">local-shipping</i>
                    </div>
                    <div class="content">
                        <div class="text">JUMLAH KENDARAAN</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_kendaraan ?></div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card-table">

                    <?php
                    if($_SESSION["hak_akses"] == 'sales admin'){
                        ?>
                        <div class="header">
                            <div class="row clearfix">
                               <a href="index.php?tambah_kendaraan" title="Tambah Data"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
                                    <i class="material-icons">add</i>
                                </button></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="body">
                        <?php
						    include 'table_kendaraan.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
