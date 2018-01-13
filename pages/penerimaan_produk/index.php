<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PENERIMAAN PRODUK</h2>
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card-table">

                        <?php
                        if($_SESSION["hak_akses"] == 'admin gudang'){
                            ?>
                            <div class="header">
                                <div class="row clearfix">
                                   <a href="index.php?tambah_penerimaan_produk" title="Tambah Data"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
                                        <i class="material-icons">add</i>
                                    </button></a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="body">
                           <?php
								include 'table_penerimaan_produk.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
        </div>
    </section>
