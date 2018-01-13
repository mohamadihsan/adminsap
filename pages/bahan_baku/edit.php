<?php
include '../config/koneksi.php';

$id_bahan_baku  = $_GET["id_bahan_baku"];

$querybb = mysqli_query($konek, "SELECT * FROM bahan_baku WHERE id_bahan_baku='$id_bahan_baku' GROUP BY nama_bahan_baku");
if($querybb == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($bb = mysqli_fetch_array($querybb)){

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BAHAN - BAKU</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                EDIT BAHAN - BAKU
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
                              <form action="../controller/bahan_baku/edit.php" id="sign_in" method="POST">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kode_bahan_baku" class="form-control" placeholder="Kode Bahan - baku" value="<?php echo $bb['kode_bahan_baku'];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">dns</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_bahan_baku" class="form-control" placeholder="Nama Bahan - baku" value="<?php echo $bb['nama_bahan_baku'];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <select name="lokasi_penyimpanan" class="form-control show-tick" data-live-search="true" placeholder="Tipe Pelanggan">
                                            <?php
                                            $sql = "SELECT
                                                    	nama_gudang
                                                    FROM
                                                    	gudang";
                                            $result = mysqli_query($konek, $sql);
                                            while ($row=mysqli_fetch_assoc($result)) {
                                                $nama_gudang = $row['nama_gudang'];
                                                ?>
                                                <option value="<?= $nama_gudang ?>" <?php if($nama_gudang == $bb['lokasi_penyimpanan']) echo "selected"; ?> ><?= $nama_gudang ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">archive</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="stock" class="form-control" placeholder="Stok" min="0" value="<?php echo $bb['stock'];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_bahan_baku" class="form-control" placeholder="id_bahan_baku" value="<?php echo $bb["id_bahan_baku"]; ?>">
                                        </div>
                                    </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="edit_produk" class="btn btn-lg bg-gradient waves-effect" type="submit">EDIT</button>
		                            <a href="index.php?bahan_baku" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
