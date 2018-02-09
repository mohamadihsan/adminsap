<?php

        $cari_kd=mysqli_query($konek, "select max(id_produk)as kode from produk"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_kd);
        $kode=substr($tm_cari['kode'],1,4); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
            if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $id="P000".$tambah;
            }else{
            $id="P00".$tambah;
            }
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>KOMPOSISI PRODUK</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                INPUT KOMPOSISI PRODUK
                                <small>Data kelengkapan komposisi produk</small>
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
                              <form action="../controller/komposisi_produk/add.php" id="sign_in" method="POST">
                               <div id="addMoreAgain">
                                <div id="addMore">
                                    <div class="col-sm-3">
                                        <select name="id_produk" class="form-control show-tick" data-live-search="true">
                                            <?php
                                                include '../config/koneksi.php';

                                                $queryproduk = mysqli_query($konek, "SELECT * FROM produk WHERE id_jenis='1'");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<option value='$produk[id_produk]'>$produk[nama_produk]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                 <div class="col-sm-3">
                                            <select name="id_bahan_baku" class="form-control show-tick" data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';

                                                $querybahanbaku = mysqli_query($konek, "SELECT * FROM bahan_baku WHERE stock > 0");
                                                if($querybahanbaku == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($bahanbaku = mysqli_fetch_array($querybahanbaku)){
                                                    echo "<option value='$bahanbaku[id_bahan_baku]'>$bahanbaku[nama_bahan_baku]</option>";
                                                }
                                            ?>
                                            </select>
                                </div>
                                 <div class="col-sm-3">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">dns</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="komposisi" class="form-control" placeholder="Komposisi" required>
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
                                <!-- <button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;" id="add">
                                <i class="material-icons">add</i>
                                </button>
                                <button type="button" class="btn bg-gradient-red btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;" id="min">
                                <i class="material-icons">clear</i>
                                </button> -->
                               </div>
                               </div>
                               <div class="col-md-12">
                                    <button id="add_komposisi" class="btn btn-lg bg-gradient waves-effect" type="submit">TAMBAH</button>
                                    <a href="index.php?komposisi_produk" class="btn btn-lg bg-gradient-red waves-effect" id="back">BATAL</a>
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
