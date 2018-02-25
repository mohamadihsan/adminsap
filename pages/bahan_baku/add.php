<?php

        $cari_kd=mysqli_query($konek, "select max(kode_bahan_baku) as kode from bahan_baku"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_kd);
        $kode=substr($tm_cari['kode'],4,7); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
            if($tambah<=10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $id="BB-000".$tambah;
            }elseif ($tambah<=100){
            $id="BB-00".$tambah;
            }elseif ($tambah<=1000){
            $id="BB-0".$tambah;
            }elseif ($tambah<=10000){
            $id="BB-".$tambah;
            }
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
                                INPUT BAHAN - BAKU
                                <small>Data kelengkapan produk</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                              <form action="../controller/bahan_baku/add.php" id="sign_in" method="POST">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kode_bahan_baku" class="form-control" placeholder="Kode Bahan - baku" value="<?php echo $id;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">dns</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_bahan_baku" class="form-control" placeholder="Nama Bahan - baku" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <select name="lokasi_penyimpanan" class="form-control show-tick"  data-live-search="true" placeholder="Lokasi Penyimpanan" required>
                                            <?php
                                            $sql = "SELECT
                                                    	nama_gudang
                                                    FROM
                                                    	gudang";
                                            $result = mysqli_query($konek, $sql);
                                            while ($row=mysqli_fetch_assoc($result)) {
                                                $nama_gudang = $row['nama_gudang'];
                                                ?>
                                                <option value="<?= $nama_gudang ?>"><?= $nama_gudang ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">archive</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="stock" class="form-control" placeholder="Stok" min="0" required>
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
