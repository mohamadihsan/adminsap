<section class="content">
        <div class="container-fluid">

         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                INPUT USER
                                <small>Data kelengkapan user</small>
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
                              <form action="../controller/user/add.php" id="sign_in" method="POST">
                                  <div class="col-sm-6">
                                      <p>
                                          <b>Username</b>
                                      </p>
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">person</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="text" name="username" class="form-control" placeholder="Username" required>
                                          </div>
                                      </div>
                                  </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>Password</b>
                                    </p>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>

                              <div class="col-sm-6">
                                  <p>
                                      <b>Hak Akses</b>
                                  </p>
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">person</i>
                                      </span>
                                      <div class="form-line">
                                          <select class="select" name="hak_akses" required>
                                              <option value="administrator">administrator</option>
                                              <option value="supervisor">supervisor</option>
                                              <option value="sales admin">sales admin</option>
                                              <option value="kepala produksi">kepala produksi</option>
                                              <option value="admin gudang">admin gudang</option>
                                              <option value="purchasing">purchasing</option>
                                              <option value="kepala keuangan">kepala keuangan</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                                <div class="col-sm-6">
                                    <p>
                                        <b>Status User</b>
                                    </p>
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">card_membership</i>
                                        </span>
                                            <select name="status" class="form-control show-tick" data-live-search="true" placeholder="Status User">
                                                <option value="1">Aktif</option>
                                                <option value="0">Suspend</option>
                                            </select>
                                      </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="add_user" class="btn btn-lg bg-gradient waves-effect" type="submit">TAMBAH</button>
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
