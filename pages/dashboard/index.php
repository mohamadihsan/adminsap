<section class="content">
    <div class="container-fluid">
        <!-- Widgets -->
        <div class="row clearfix">

            <?php
            if ($_SESSION['hak_akses']=='administrator'){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="block-header">
                        <h1>Halaman Utama <small>Administrator</small></h1>
                    </div>
                </div>

                <?php
                    $sql = "SELECT COUNT(*) as jumlah_pegawai FROM pegawai";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_pegawai = $row['jumlah_pegawai'];

                    $sql = "SELECT COUNT(*) as jumlah_user FROM user";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_user = $row['jumlah_user'];
                ?>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-gradient hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">PEGAWAI</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_pegawai ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-gradient hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">USER</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_user ?></div>
                        </div>
                    </div>
                </div>
                <?php
            }else if ($_SESSION['hak_akses']=='supervisor'){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="block-header">
                        <h1>Halaman Utama <small>Supervisor</small></h1>
                    </div>
                </div>

                <?php
                    $sql = "SELECT COUNT(*) as jumlah_retur FROM retur WHERE verifikasi IS null";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_retur = $row['jumlah_retur'];

                    $sql = "SELECT COUNT(*) as jumlah_order_penjualan FROM order_penjualan WHERE approval IS null";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_order_penjualan = $row['jumlah_order_penjualan'];

                    $sql = "SELECT COUNT(*) as jumlah_pembayaran FROM order_penjualan WHERE tgl_pembayaran IS null";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_pembayaran = $row['jumlah_pembayaran'];

                    $sql = "SELECT COUNT(*) as jumlah_order_pembelian FROM order_pembelian WHERE approval IS null";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_order_pembelian = $row['jumlah_order_pembelian'];
                ?>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">PEMESANAN BELUM DIVERIFIKASI</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_order_penjualan ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">PEMESANAN BELUM DIBAYAR</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_pembayaran ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">PEMBELIAN BELUM DIVERIFIKASI</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_order_pembelian ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_return</i>
                        </div>
                        <div class="content">
                            <div class="text">RETUR BELUM DIVERIFIKASI</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_retur ?></div>
                        </div>
                    </div>
                </div>
                <?php
            }else if ($_SESSION['hak_akses']=='sales admin'){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="block-header">
                        <h1>Halaman Utama <small>Sales Admin</small></h1>
                    </div>
                </div>

                <?php
                    $sql = "SELECT COUNT(*) as jumlah_retur FROM retur WHERE verifikasi IS null";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_retur = $row['jumlah_retur'];

                    $sql = "SELECT COUNT(*) as jumlah_order_penjualan FROM order_penjualan WHERE approval IS null";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_order_penjualan = $row['jumlah_order_penjualan'];

                    $sql = "SELECT COUNT(*) as jumlah_pembayaran FROM order_penjualan WHERE tgl_pembayaran IS null";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_pembayaran = $row['jumlah_pembayaran'];

                    $sql = "SELECT COUNT(*) as jumlah_pengiriman FROM pengiriman WHERE DATE_FORMAT(tanggal_kirim, '%Y-%m-%d') >= CURRENT_DATE";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_pengiriman = $row['jumlah_pengiriman'];

                    $sql = "SELECT COUNT(*) as jumlah_produk FROM produk WHERE stok <= 0";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_produk = $row['jumlah_produk'];

                    $sql = "SELECT COUNT(*) as jumlah_kendaraan FROM kendaraan";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_kendaraan = $row['jumlah_kendaraan'];

                    $sql = "SELECT COUNT(*) as jumlah_pelanggan FROM pelanggan";
                    $result = mysqli_query($konek, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_pelanggan = $row['jumlah_pelanggan'];
                ?>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <div class="content">
                                <div class="text">PEMESANAN BELUM DIVERIFIKASI</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_order_penjualan ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-blue hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">account_balance_wallet</i>
                            </div>
                            <div class="content">
                                <div class="text">PEMESANAN BELUM DIBAYAR</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_pembayaran ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-red hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">local_shipping</i>
                            </div>
                            <div class="content">
                                <div class="text">PESANAN BELUM DIKIRIM</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_pengiriman ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-teal hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">assignment_return</i>
                            </div>
                            <div class="content">
                                <div class="text">RETUR BELUM DIVERIFIKASI</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_retur ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-orange hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">assignment_return</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL PELANGGAN</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_pelanggan ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-teal hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">assignment_return</i>
                            </div>
                            <div class="content">
                                <div class="text">STOK PRODUK TIDAK AMAN</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_produk ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-grey hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">local_shipping</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL KENDARAAN</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_kendaraan ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <table class="table table-responsive">
                        <caption><h4>Monitoring Stok</h4></caption>
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Produk</th>
                                <th width="25%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM produk WHERE stok <= 0";
                            $result = mysqli_query($konek, $sql);
                            $no=1;
                            while($row = mysqli_fetch_assoc($result)){
                                $nama_produk = $row['nama_produk'];
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $nama_produk ?></td>
                                    <td>
                                        <button class='btn-status bg-gradient-red waves-effect'>TIDAK AMAN</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <?php
            }else{ ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-gradient hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TASKS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-gradient hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-gradient-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-gradient-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW VISITORS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <!-- #END# Widgets -->
    </div>
</section>
