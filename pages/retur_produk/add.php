<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>RETUR</h2>
            </div>
         <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-add">
                        <div class="header">
                            <h2>
                                INPUT RETUR
                                <small>Data kelengkapan retur</small>
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
                              <form action="../controller/retur/add.php" id="sign_in" method="POST">
                                <div class="col-sm-6">
                                     <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="alasan_retur" class="form-control" placeholder="Alasan Retur" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="status_produk" class="form-control" placeholder="Status Produk" required>
                                        </div>
                                    </div>
                                </div>

                                  <div class="col-sm-6">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">person</i>
                                          </span>
                                          <div class="form-line">
                                              <select class="form-control" name="id_order_penjualan">
                                                  <?php
                                                  $sql = "SELECT id_order_penjualan, no_invoice FROM order_penjualan";
                                                  $result = mysqli_query($konek, $sql);
                                                  if (mysqli_num_rows($result) > 0) {
                                                      while ($row = mysqli_fetch_assoc($result)) {
                                                          ?>
                                                          <option value="<?= $row['id_order_penjualan'] ?>"><?= $row['no_invoice'] ?></option>
                                                          <?php
                                                      }
                                                  }else{
                                                      ?>
                                                      <option>Data tidak ditemukan</option>
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
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="qty" class="form-control" placeholder="Quantity Retur" required>
                                        </div>
                                    </div>
                                </div>
		                        <div class="col-md-12">
		                            <button id="add_retur" class="btn btn-lg bg-gradient waves-effect" type="submit">TAMBAH</button>
		                            <a href="index.php?retur" class="btn btn-lg bg-gradient-red waves-effect">BATAL</a>
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
