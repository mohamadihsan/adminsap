<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PERAMALAN</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">

            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card-table">
                        <div class="header">
                            <div class="row clearfix">
                               <a href="index.php?tambah_peramalan"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
                                    <i class="material-icons">add</i>
                                </button></a>
                            </div>
                        </div>
                        <div class="body">
                            <?php
                                include 'table_peramalan_produk.php';
                            ?>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
