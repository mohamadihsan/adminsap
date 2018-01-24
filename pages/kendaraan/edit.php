<?php
include '../config/koneksi.php';

$id_kendaraan  = $_GET["id_kendaraan"];

$querybb = mysqli_query($konek, "SELECT * FROM kendaraan WHERE id_kendaraan='$id_kendaraan' GROUP BY no_polisi");
if($querybb == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($bb = mysqli_fetch_array($querybb)){

?>
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
                                EDIT KENDARAAN
                                <small>Edit data kelengkapan Kendaraan</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                              <form action="../controller/kendaraan/edit.php" id="sign_in" method="POST">
                                  <div class="col-sm-3">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">card_membership</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="hidden" name="id_kendaraan" class="form-control" placeholder="" value="<?= $bb['id_kendaraan'] ?>" required>
                                              <input type="text" name="no_polisi" class="form-control" placeholder="Nomor Polisi" value="<?= $bb['no_polisi'] ?>" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">dns</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="text" name="driver" class="form-control" value="<?= $bb['driver'] ?>" placeholder="Nama Driver" required>
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
                                              $i=0;
                                              while ($row=mysqli_fetch_assoc($result)) {
                                                  $id_user[$i] = $row['id_user'];
                                                  $hak_akses = $row['hak_akses'];
                                                  ?>
                                                  <option value="<?= $id_user[$i] ?>" <?php if($id_user[$i] == $bb['id_user']) echo 'selected' ?> ><?= $hak_akses ?></option>
                                                  <?php
                                                  $i++;
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

                                               <option value="AKTIF" <?php if($bb['status'] == 'AKTIF') echo 'selected' ?>>AKTIF</option>
                                               <option value="NON AKTIF" <?php if($bb['status'] == 'NON AKTIF') echo 'selected' ?>>NON AKTIF</option>

                                           </select>
                                       </div>
                                  </div>
		                        <div class="col-md-12">
		                            <button id="edit_produk" class="btn btn-lg bg-gradient waves-effect" type="submit">EDIT</button>
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
    <?php
      }
    ?>
