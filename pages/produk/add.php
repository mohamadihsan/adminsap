<?php

        $cari_kd=mysqli_query($konek, "select max(kode_produk)as kode from produk"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_kd);
        $kode=substr($tm_cari['kode'],1,4); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
            if($tambah<=9){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $id="P000".$tambah;
            }elseif ($tambah<=99){
            $id="P00".$tambah;
            }elseif ($tambah<=999){
            $id="P0".$tambah;
            }elseif ($tambah<=9999){
            $id="P".$tambah;
            }
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
                                INPUT PRODUK
                                <small>Data kelengkapan produk</small>
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
                              <form action="../controller/produk/add.php" id="sign_in" method="POST">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo $id;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">dns</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">archive</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="satuan" class="form-control" placeholder="Satuan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                           <select name="id_jenis" class="form-control show-tick" " data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';
                                                
                                                $queryproduk = mysqli_query($konek, "SELECT * FROM jenis");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<option value='$produk[id_jenis]'>$produk[nama_jenis]</option>";
                                                }
                                            ?>
                                            </select>
                                      </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                           <select name="id_merk" class="form-control show-tick" " data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';
                                                
                                                $queryproduk = mysqli_query($konek, "SELECT * FROM merk");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<option value='$produk[id_merk]'>$produk[nama_merk]</option>";
                                                }
                                            ?>
                                            </select>
                                      </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                           <select name="id_kemasan" class="form-control show-tick" " data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';
                                                
                                                $queryproduk = mysqli_query($konek, "SELECT * FROM kemasan");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<option value='$produk[id_kemasan]'>$produk[nama_kemasan]</option>";
                                                }
                                            ?>
                                            </select>
                                      </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="harga" class="form-control" placeholder="Harga" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                            <select name="lokasi_penyimpanan" class="form-control show-tick" " data-live-search="true" placeholder="Tipe Pelanggan">
                                                <option value="Gudang 1">Gudang 1</option>
                                                <option value="Gudang 2">Gudang 2</option>
                                                <option value="Gudang 3">Gudang 3</option>
                                            </select>
                                    </div>
                                </div>
                                 <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">archive</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="stok" class="form-control" placeholder="Stok" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <select name="id_supplier" class="form-control show-tick" " data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';
                                                
                                                $querysupplier = mysqli_query($konek, "SELECT * FROM supplier");
                                                if($querysupplier == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($supplier = mysqli_fetch_array($querysupplier)){
                                                    echo "<option value='$supplier[id_supplier]'>$supplier[nama_supplier]</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_user" class="form-control" placeholder="id_user" value="<?php echo "".$_SESSION["id_user"]."" ?>">
                                        </div>
                                    </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="add_produk" class="btn btn-lg bg-gradient waves-effect" type="submit">TAMBAH</button>
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
    