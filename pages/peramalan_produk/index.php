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
                               <a href="index.php?tambah-peramalan"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
                                    <i class="material-icons">add</i>
                                </button></a>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                          <table class="table js-exportable dataTable">
                           <?php
                           
                                include 'table_peramalan_produk.php';
                            
                           ?>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
        </div>
    </section>
    