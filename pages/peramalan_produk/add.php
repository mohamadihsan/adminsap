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
                <h2>PERAMALAN PRODUK</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                INPUT PERAMALAN
                                <small>Data kelengkapan produk</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                              <form action="../controller/peramalan_produk/add.php" id="sign_in" method="POST">
                                <div class="col-sm-6">
                                     <p><b>Nama Produk</b></p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">call_to_action</i>
                                        </span>
                                        <?php
                                        $sql = "SELECT
                                                	DISTINCT (a.id_produk),
                                                	a.periode,
                                                	a.nama_periode,
                                                	a.nama_produk,
                                                	a.total_penjualan AS jumlah
                                                FROM
                                                	(
                                                		SELECT
                                                			op.id_produk,
                                                			DATE_FORMAT(op.tanggal_order, '%m %Y') AS periode,
                                                			DATE_FORMAT(op.tanggal_order, '%M %Y') AS nama_periode,
                                                			opd.nama_produk,
                                                			SUM(opd.qty) AS total_penjualan
                                                		FROM
                                                			order_penjualan op
                                                		LEFT JOIN order_penjualan_detail opd ON opd.id_order_penjualan = op.id_order_penjualan
                                                		WHERE
                                                			op.approval = 'OK'
                                                		GROUP BY
                                                			1,
                                                			2,
                                                			3,
                                                			4
                                                	) AS a
                                                ORDER BY
                                                    a.id_produk ASC,
                                                    a.periode DESC";
                                                // $result  = mysqli_query($konek, "SELECT MONTHNAME(order_penjualan.tanggal_order) as Bulan, sum(order_penjualan_detail.qty) as Jumlah, YEAR(order_penjualan.tanggal_order) as Tahun,order_penjualan_detail.nama_produk, order_penjualan_detail.no_invoice, order_penjualan.no_invoice, produk.nama_produk, produk.id_produk FROM order_penjualan INNER JOIN order_penjualan_detail ON order_penjualan.no_invoice = order_penjualan_detail.no_invoice INNER JOIN produk on order_penjualan_detail.nama_produk = produk.id_produk GROUP BY produk.nama_produk ORDER BY Bulan DESC");
                                        $result  = mysqli_query($konek, $sql);

                                        $jsArray = "var produkName = new Array();";
                                        $jsArray2 = "var produkTotal = new Array();";

                                        ?>

                                        <select name="nama_produk" class="form-control show-tick" data-live-search="true" onchange="document.getElementById('produk_name').value = produkName[this.value],document.getElementById('total').value = produkTotal[this.value]">
                                            <option> Pilih Produk </option>
                                            <?php
                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id_produk[$i] = $row['id_produk'];

                                                if ($id_produk[$i] != $id_produk[$i-1]) {
                                                    echo '<option value = "' . $row['nama_produk'] . '">' . $row['nama_produk'] .' ( Penjualan terakhir : ' . $row['nama_periode']. ' )</option>';
                                                }

                                                $jsArray .= "produkName['" . $row['nama_produk'] . "'] = '" . addslashes($row['id_produk']) . "';";
                                                $jsArray2 .= "produkTotal['" . $row['nama_produk'] . "'] = '" . addslashes($row['jumlah']) . "';";
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-2 hidden">
                                     <p><b>Id Produk</b></p>
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="produk_name" name="id_produk" class="form-control" placeholder="" readonly>
                                            <script>

                                              <?php echo $jsArray; ?>

                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                     <p><b>Total Penjualan</b></p>
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_giftcard</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" min="0" id="total" name="jumlah_penjualan" class="form-control" placeholder="Total Penjualan">
                                            <script>

                                              <?php echo $jsArray2; ?>

                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <p>
                                        <b>Bulan Peramalan</b>
                                    </p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <select name="bulan" class="form-control show-tick" data-live-search="true" placeholder="Tipe Pelanggan">
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <p>
                                        <b>Tahun</b>
                                    </p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <select name="tahun" class="form-control show-tick" data-live-search="true" placeholder="Tipe Pelanggan">
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                        </select>
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
		                            <a href="index.php?peramalan_produk" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
