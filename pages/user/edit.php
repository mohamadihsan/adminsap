<?php
include '../config/koneksi.php';

$id_user  = $_GET["id_user"];

$queryuser = mysqli_query($konek, "SELECT * FROM user WHERE id_user='$id_user' GROUP BY hak_akses");
if($queryuser == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$user = mysqli_fetch_array($queryuser);

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>USER</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                Edit USER
                                <small>Edit data kelengkapan user</small>
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
                              <form action="../controller/user/edit.php" id="sign_in" method="POST">
                                  <div class="col-sm-6">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">person</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user["username"]; ?>" required>
                                          </div>
                                      </div>
                                  </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $user["password"]; ?>" required>
                                        </div>
                                    </div>
                                </div>

                              <div class="col-sm-6">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">person</i>
                                      </span>
                                      <div class="form-line">
                                          <select class="select" name="hak_akses" required>
                                              <option value="administrator" <?php if($user['hak_akses']=='administrator') echo 'selected' ?> >administrator</option>
                                              <option value="supervisor" <?php if($user['hak_akses']=='supervisor') echo 'selected' ?>>supervisor</option>
                                              <option value="sales admin" <?php if($user['hak_akses']=='sales admin') echo 'selected' ?>>sales admin</option>
                                              <option value="kepala produksi" <?php if($user['hak_akses']=='kepala produksi') echo 'selected' ?>>kepala produksi</option>
                                              <option value="admin gudang" <?php if($user['hak_akses']=='admin gudang') echo 'selected' ?>>admin gudang</option>
                                              <option value="purchasing" <?php if($user['hak_akses']=='purchasing') echo 'selected' ?>>purchasing</option>
                                              <option value="kepala keuangan" <?php if($user['hak_akses']=='kepala keuangan') echo 'selected' ?>>kepala keuangan</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                                <div class="col-sm-6">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                            <select name="status" class="form-control show-tick"  data-live-search="true" placeholder="Tipe Pegawai">
                                                <option value="1">Aktif</option>
                                                <option value="0">Suspend</option>
                                            </select>
                                      </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="id_user" class="form-control" placeholder="id_user" value="<?php echo $user["id_user"]; ?>">
                                        </div>
                                    </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="edit_user" class="btn btn-lg bg-gradient waves-effect" type="submit">EDIT</button>
		                            <a href="index.php?user" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
