<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PENGELUARAN BAHAN BAKU</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card-add">
                    <div class="header">
                        <h2>
                            INPUT PENGELUARAN
                            <small>Data kelengkapan pengeluaran</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <form action="../controller/pengeluaran_bahan_baku/add.php" id="sign_in" method="POST">
                                <div class="col-sm-6">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">dns</i>
                                        </span>
                                        <div class="form-line">
                                            <select name="id_bahan_baku" class="form-control show-tick"  data-live-search="true" placeholder="Bahan Baku" required>
                                                <?php
                                                $sql = "SELECT
                                                        	id_bahan_baku,
                                                        	kode_bahan_baku,
                                                        	nama_bahan_baku
                                                        FROM
                                                        	bahan_baku";
                                                $result = mysqli_query($konek, $sql);
                                                while ($row=mysqli_fetch_assoc($result)) {
                                                    $id_bahan_baku = $row['id_bahan_baku'];
                                                    $kode_bahan_baku = $row['kode_bahan_baku'];
                                                    $nama_bahan_baku = $row['nama_bahan_baku'];
                                                    ?>
                                                    <option value="<?= $id_bahan_baku ?>"><?= $kode_bahan_baku.' - '.$nama_bahan_baku ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">archive</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="qty" class="form-control" placeholder="Stok" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <select name="id_gudang" class="form-control show-tick"  data-live-search="true" placeholder="Lokasi Penyimpanan" required>
                                                <?php
                                                $sql = "SELECT
                                                            id_gudang,
                                                        	nama_gudang
                                                        FROM
                                                        	gudang";
                                                $result = mysqli_query($konek, $sql);
                                                while ($row=mysqli_fetch_assoc($result)) {
                                                    $id_gudang = $row['id_gudang'];
                                                    $nama_gudang = $row['nama_gudang'];
                                                    ?>
                                                    <option value="<?= $id_gudang ?>"><?= $nama_gudang ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">help</i>
                                        </span>
                                        <div class="form-line">
                                            <select name="status_aliran" class="form-control show-tick"  data-live-search="true" placeholder="Lokasi Penyimpanan" required>
                                                <option value="DIPAKAI">Status : DIPAKAI</option>
                                                <option value="TERJUAL">Status : TERJUAL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
    	                        <div class="col-md-12">
    	                            <button id="" class="btn btn-lg bg-gradient waves-effect" type="submit">TAMBAH</button>
    	                            <a href="index.php?pengeluaran_bahan_baku" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
