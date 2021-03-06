<?php
    $sql = "SELECT COUNT(*) as jumlah_user FROM user";
    $result = mysqli_query($konek, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlah_user = $row['jumlah_user'];
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>USER</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-gradient hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">JUMLAH USER</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_user ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card-table">
                    <div class="header">
                        <div class="row clearfix">
                           <a href="index.php?tambah-user"><button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;">
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
                       <?php

							include 'table.php';

                       ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# CPU Usage -->
    </div>
</section>
