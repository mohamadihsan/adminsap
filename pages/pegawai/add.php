<section class="content">
        <div class="container-fluid">

         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                INPUT PEGAWAI
                                <small>Data kelengkapan pegawai</small>
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
                              <form action="../controller/pegawai/add.php" id="sign_in" method="POST">
                                  <div class="col-sm-6">
                                      <p>
                                          <b>Nomor Induk Pegawai</b>
                                      </p>
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">person</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai" required>
                                          </div>
                                      </div>
                                  </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>Nama Pegawai</b>
                                    </p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required>
                                        </div>
                                    </div>
                                </div>

                              <div class="col-sm-6">
                                  <p>
                                      <b>Gender</b>
                                  </p>
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">person</i>
                                      </span>
                                      <div class="form-line">
                                          <select class="select" name="gender" required>
                                              <option value="laki-laki">Laki-Laki</option>
                                              <option value="perempuan">Perempuan</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>Alamat Pegawai</b>
                                    </p>
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="address" class="form-control" placeholder="Alamat" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>Email</b>
                                    </p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control email" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>Telepon</b>
                                    </p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="phone_number" class="form-control" placeholder="Telepon" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>Status Pegawai</b>
                                    </p>
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
                                                        	user
                                                        WHERE
                                                        	id_user NOT IN (SELECT id_user FROM pegawai)";
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
		                        <div class="col-md-12">
		                            <button id="add_pegawai" class="btn btn-lg bg-gradient waves-effect" type="submit">TAMBAH</button>
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
