<?php 
include '../config/koneksi.php';

$id_pemesanan  = $_GET["id_pemesanan"];

$querypemesanan = mysqli_query($konek, "SELECT * FROM pemesanan WHERE id_pemesanan='$id_pemesanan' GROUP BY nama_pemesanan");
if($querypemesanan == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($pemesanan = mysqli_fetch_array($querypemesanan)){

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PEMESANAN</h2> 
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                Edit PEMESANAN
                                <small>Edit data kelengkapan pemesanan</small>
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
                              <form action="../controller/pemesanan/edit.php" id="sign_in" method="POST">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_pemesanan" class="form-control" placeholder="Nama Pemesanan" value="<?php echo $pemesanan["nama_pemesanan"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $pemesanan["alamat"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control email" placeholder="Email" value="<?php echo $pemesanan["email"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pemesanan["telepon"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kredit_limit" class="form-control" placeholder="Kredit Limit" value="<?php echo $pemesanan["kredit_limit"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_user" class="form-control" placeholder="id_user" value="<?php echo $pemesanan["id_user"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_pemesanan" class="form-control" placeholder="id_pemesanan" value="<?php echo $pemesanan["id_pemesanan"]; ?>">
                                        </div>
                                    </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="edit_pemesanan" class="btn btn-lg bg-gradient waves-effect" type="submit">EDIT</button>
		                            <a href="index.php?pemesanan" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
    