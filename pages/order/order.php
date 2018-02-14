<?php
        $tanggal = date("Ymd");
        $cari_kd=mysqli_query($konek, "select max(id_order_penjualan)as kode from order_penjualan"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_kd);
        // $kode= substr($tm_cari['kode'],12,12); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $kode = $tm_cari['kode'];
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
<?php
$fn = 'convert_to_rupiah';
function convert_to_rupiah($angka)
    {return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));}; // Setting Untuk Fungsi Rupiah
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
                                   <a href="index.php?order-custom"><button id="add_pemesanan" class="btn btn-lg bg-gradient-green waves-effect" type="submit">ORDER PRODUK CUSTOM</button></a>
                        <br>
                        <br>
                            <div class="row clearfix">
                              <form action="../controller/order/cart_process.php" id="sign_in" method="POST">
                                <div id="Tambah">
                                <div class="col-sm-4">
                                     <p><b>Nama Produk</b></p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">call_to_action</i>
                                        </span>
                                        <?php

                                           $result  = mysqli_query($konek, "select * from produk WHERE id_jenis != 1");
                                           $jsArray = "var produkName = new Array();
                                            ";

                                          ?>
                                           <select name="id_produk" class="form-control show-tick" " data-live-search="true" onchange="document.getElementById('produk_name').value = produkName[this.value]">


                           <?php

                           while ($row = mysqli_fetch_array($result)) {

                             echo '

                             <option value = "' . $row['id_produk'] . '">' . $row['nama_produk'] . '</option>';

                             $jsArray .= "produkName['" . $row['id_produk'] . "'] = '" . addslashes($fn($row["harga"])) . "';
                             ";
                                }

                                echo '

                                </select>

                                ';

                                ?>
                                            </select>
                                      </div>
                                </div>
                                 <div class="col-sm-4">
                                     <p><b>Harga Satuan</b></p>
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="produk_name" name="harga" class="form-control" placeholder="Harga Satuan" readonly>
                                            <script>

                                              <?php echo $jsArray; ?>

                                            </script>
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
                                <div class="col-sm-4">
                                     <p><b>Banyaknya</b></p>
                                    <div class="input-group spinner" data-trigger="spinner">
                                        <span class="input-group-addon">
                                            <i class="material-icons">layers</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="qty" class="form-control text-center" data-rule="quantity">
                                        </div>
                                        <span class="input-group-addon">
                                            <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                            <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <!-- <button type="button" class="btn bg-gradient btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;" id="add_order">
                                <i class="material-icons">add</i>
                                </button>
                                <button type="button" class="btn bg-gradient-red btn-circle waves-effect waves-circle waves-float" style="margin-left: 10px;" id="min_order">
                                <i class="material-icons">clear</i>
                                </button> -->
                                 </div>
                                 <div class="col-sm-3">

                                    <div class="input-group hidden">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                           <select name="nama_pelanggan" class="form-control show-tick" " data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';

                                                $queryproduk = mysqli_query($konek, "SELECT nama_pelanggan FROM cart GROUP BY nama_pelanggan DESC LIMIT 1");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<option value='$produk[nama_pelanggan]'>$produk[nama_pelanggan]</option>";
                                                }
                                            ?>
                                            </select>
                                      </div>
                                      <div class="input-group hidden">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                           <select name="no_invoice" class="form-control show-tick" " data-live-search="true">
                                                <?php
                                                include '../config/koneksi.php';

                                                $queryproduk = mysqli_query($konek, "SELECT no_invoice FROM cart GROUP BY no_invoice DESC LIMIT 1");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<option value='$produk[no_invoice]'>$produk[no_invoice]</option>";
                                                }
                                            ?>
                                            </select>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <button id="add_order" class="btn btn-lg bg-gradient waves-effect" type="submit">MASUKAN KERANJANG</button>
                                    <a href="index.php?pemesanan_produk" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
                                    <a href="index.php?order-confirm">CHECK OUT</a>
                                </div>
                              </form>
                            </div>
                            <?php
                                                include '../config/koneksi.php';

                                                $queryproduk = mysqli_query($konek, "SELECT nama_pelanggan FROM cart GROUP BY nama_pelanggan DESC LIMIT 1");
                                                if($queryproduk == false){
                                                    die ("Terdapat Kesalahan : ". mysqli_error($konek));
                                                }
                                                while ($produk = mysqli_fetch_array($queryproduk)){
                                                    echo "<h3>$produk[nama_pelanggan]</h3>";
                                                }
                            ?>
                            <table class="table dataTable">
                              <?php

                                include 'table_cart.php';

                              ?>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
