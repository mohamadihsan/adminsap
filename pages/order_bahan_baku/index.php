<?php
        $tanggal = date("Ymd");
        $cari_kd=mysqli_query($konek, "select max(no_invoice)as kode from order_pembelian"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_kd);
        $kode= substr($tm_cari['kode'],12,12); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
            if($tambah<=9){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $id="INV".$tanggal."-".$tambah;
            }else if ($tambah<=99){
            $id="INV".$tanggal."-".$tambah;
            }else if ($tambah<=999){
            $id="INV".$tanggal."-".$tambah;
            }else if ($tambah<=9999){
            $id="INV".$tanggal."-".$tambah;
            }
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BUAT ORDER</h2>
            </div>

            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                INPUT BUAT ORDER
                                <small>Data kelengkapan order</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                              <form action="../controller/order/supplier_process.php" id="sign_in" method="POST">
                                <div id="Tambah">
                                    <div class="col-sm-2 hidden">
                                    <p><b>Nomor Invoice</b></p>
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">receipt</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="no_invoice" class="form-control" placeholder="Invoice" value="<?php echo $id;  ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                     <p><b>Supplier</b></p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                           <select name="nama_supplier" class="form-control show-tick"  data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';

                                                $queryproduk = mysqli_query($konek, "SELECT * FROM supplier WHERE status = 'Aktif'");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<option value='$produk[nama_supplier]'>$produk[nama_supplier]</option>";
                                                }
                                            ?>
                                            </select>
                                      </div>
                                </div>
                                <!-- <button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;" id="add_order">
                                <i class="material-icons">add</i>
                                </button>
                                <button type="button" class="btn bg-gradient-red btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;" id="min_order">
                                <i class="material-icons">clear</i>
                                </button> -->
                                 </div>
                                <div class="col-md-12">
                                    <button id="add_order" class="btn btn-lg bg-gradient waves-effect" type="submit">LANJUTKAN</button>
                                    <a href="index.php?pemesanan_bahan_baku" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
