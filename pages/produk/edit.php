<?php
include '../config/koneksi.php';

$id_produk  = $_GET["id_produk"];

$queryproduk = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk='$id_produk' GROUP BY nama_produk");
if($queryproduk == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($produk = mysqli_fetch_array($queryproduk)){

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PRODUK</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                EDIT PRODUK
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
                              <form action="../controller/produk/edit.php" id="sign_in" method="POST">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo $produk["kode_produk"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">dns</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $produk["nama_produk"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">archive</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="satuan" class="form-control" placeholder="Satuan" value="<?php echo $produk["satuan"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="harga" min="0" class="form-control" placeholder="Harga" value="<?php echo $produk["harga"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
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
                                                    <option value="<?= $nama_gudang ?>" <?php if($nama_gudang == $produk['lokasi_penyimpanan']) echo "selected"; ?> ><?= $nama_gudang ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">archive</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="stok" class="form-control" placeholder="Stok" value="<?php echo $produk["stok"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <select name="id_supplier" class="form-control show-tick" data-live-search="true">
                                        <?php
                                        include '../config/koneksi.php';

                                        $querysupplier = mysqli_query($konek, "SELECT * FROM supplier");
                                        if($querysupplier == false){
                                            die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                        }
                                        while ($supplier = mysqli_fetch_array($querysupplier)){
                                            ?>
                                            <option value="<?= $supplier['id_supplier'] ?>" <?php if($supplier['id_supplier']==$produk['id_supplier']) echo "selected" ?>><?= $supplier['nama_supplier'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_user" class="form-control" placeholder="id_user" value="<?php echo $produk["id_user"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_produk" class="form-control" placeholder="id_produk" value="<?php echo $produk["id_produk"]; ?>">
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
