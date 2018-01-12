<?php 
include '../config/koneksi.php';

$id_supplier  = $_GET["id_supplier"];

$querysupplier = mysqli_query($konek, "SELECT * FROM supplier WHERE id_supplier='$id_supplier' GROUP BY nama_supplier");
if($querysupplier == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($supplier = mysqli_fetch_array($querysupplier)){

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SUPPLIER</h2> 
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                EDIT SUPPLIER
                                <small>Edit data kelengkapan produk</small>
                            </h2>
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
                            <div class="row clearfix">
                              <form action="../controller/supplier/edit.php" id="sign_in" method="POST">
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_supplier" class="form-control" placeholder="id_supplier" value="<?php echo $supplier["id_supplier"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" value="<?php echo $supplier["nama_supplier"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="alamat_supplier" class="form-control" placeholder="Alamat" value="<?php echo $supplier["alamat_supplier"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                            <select name="status" class="form-control show-tick" " data-live-search="true" placeholder="Tipe Pelanggan">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Suspend">Suspend</option>
                                            </select>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_user" class="form-control" placeholder="id_user" value="<?php echo $supplier["id_user"]; ?>">
                                        </div>
                                    </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="edit_produk" class="btn btn-lg bg-gradient waves-effect" type="submit">EDIT</button>
		                            <a href="index.php?produk" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
		                        </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
    <?php
      }
    ?>
    