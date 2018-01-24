<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>KENDARAAN</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                INPUT KENDARAAN
                                <small>Data kelengkapan Kendaraan</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                              <form action="../controller/kendaraan/add.php" id="sign_in" method="POST">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="no_polisi" class="form-control" placeholder="Nomor Polisi" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">dns</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="driver" class="form-control" placeholder="Nama Driver" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <select name="id_user" class="form-control show-tick"  data-live-search="true" placeholder="Lokasi Penyimpanan" required>
                                            <?php
                                            $sql = "SELECT
                                                    	id_user, hak_akses
                                                    FROM
                                                    	user";
                                            $result = mysqli_query($konek, $sql);
                                            while ($row=mysqli_fetch_assoc($result)) {
                                                $id_user = $row['id_user'];
                                                $hak_akses = $row['hak_akses'];
                                                ?>
                                                <option value="<?= $id_user ?>"><?= $hak_akses ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-2">
                                     <div class="input-group">
                                         <span class="input-group-addon">
                                             <i class="material-icons">home</i>
                                         </span>
                                         <select name="status" class="form-control show-tick"  data-live-search="true" placeholder="Lokasi Penyimpanan" required>

                                             <option value="AKTIF">AKTIF</option>
                                             <option value="NON AKTIF">NON AKTIF</option>

                                         </select>
                                     </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="add_produk" class="btn btn-lg bg-gradient waves-effect" type="submit">TAMBAH</button>
		                            <a href="index.php?kendaraan" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
