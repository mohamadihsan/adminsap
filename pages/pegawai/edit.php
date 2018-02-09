<?php
include '../config/koneksi.php';

$id_pegawai  = $_GET["id_pegawai"];

$querypegawai = mysqli_query($konek, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai' GROUP BY nama_pegawai");
if($querypegawai == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($pegawai = mysqli_fetch_array($querypegawai)){

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PEGAWAI</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                Edit PEGAWAI
                                <small>Edit data kelengkapan pegawai</small>
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
                              <form action="../controller/pegawai/edit.php" id="sign_in" method="POST">
                                  <div class="col-sm-6">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">person</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai" value="<?php echo $pegawai["nip"]; ?>" required>
                                          </div>
                                      </div>
                                  </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" value="<?php echo $pegawai["nama_pegawai"]; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">group</i>
                                        </span>
                                        <div class="form-line">
                                            <select class="select" name="gender">
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="address" class="form-control" placeholder="Alamat" value="<?php echo $pegawai["address"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $pegawai["email"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="phone_number" class="form-control" placeholder="Telepon" value="<?php echo $pegawai["phone_number"]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                            <select name="status" class="form-control show-tick" data-live-search="true" placeholder="Tipe Pegawai">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Suspend">Suspend</option>
                                            </select>
                                      </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>ID User & Hak Akses</b>
                                    </p>
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                            <select name="id_user" class="form-control show-tick" data-live-search="true" placeholder="Tipe Pegawai">
                                                <?php
                                                $sql = "SELECT
                                                        	*
                                                        FROM
                                                        	user";
                                                $result = mysqli_query($konek, $sql);
                                                while ($row=mysqli_fetch_assoc($result)) {
                                                    $id_user = $row['id_user'];
                                                    $hak_akses = $row['hak_akses'];

                                                    if ($hak_akses == 'kepala keuangan') {
                                                        $hak_akses = 'akuntan';
                                                    }
                                                    ?>
                                                    <option value="<?= $id_user ?>" <?php if($id_user==$pegawai["id_user"]) echo 'selected' ?>><?= $hak_akses ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                      </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_pegawai" class="form-control" placeholder="id_pegawai" value="<?php echo $pegawai["id_pegawai"]; ?>">
                                        </div>
                                    </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="edit_pegawai" class="btn btn-lg bg-gradient waves-effect" type="submit">EDIT</button>
		                            <a href="index.php?pegawai" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
