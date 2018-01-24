
                <thead>
					<tr>
						<th>Tanggal Produksi</th>
						<th>ID Order Produk</th>
						<th>Status Produksi</th>
						<th>Ubah Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_monitoring_produksi, id_order_produk, tanggal_produksi, DAY(tanggal_produksi) as hari, MONTHNAME(tanggal_produksi) as bulan, YEAR(tanggal_produksi) as tahun, status_produksi FROM monitoring_produksi");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){
                            $id = $spl['id_monitoring_produksi'];
                            ?>
								<tr>
									<td><?= $spl['hari'].' '.$spl['bulan'].' '.$spl['tahun'] ?></td>
									<td><?= $spl['id_order_produk'] ?></td>
                                    <?php
                                    if ($spl['status_produksi'] == 'BELUM PRODUKSI' OR $spl['status_produksi']=='Menunggu'){
							          ?>
                                      <td><a href='index.php?tambah-komposisi'><button class='btn-status bg-gradient-red waves-effect'>MENUNGGU</button></a></td>
                                      <?php
                                  }else if($spl['status_produksi']=='SELESAI'){
                                        ?>
									  <td><button class='btn-status bg-gradient-green waves-effect'>SUDAH PRODUKSI</button></td>
                                      <?php
                                  }else{
                                      ?>
                                      <td><button class='btn-status bg-gradient-blue waves-effect'>SEDANG PRODUKSI</button></td>
                                        <?php
                                  }
                                    ?>
									<td>
									<div class='btn-group'>
                                    <button type='button' class='btn-status bg-gradient dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        STATUS <span class='caret'></span>
                                    </button>
                                    <ul class='dropdown-menu'>
                                        <li><a data-toggle="modal" data-target="#update" onclick="return update('SEDANG','<?= $id ?>')"><i class='material-icons'>done</i> SEDANG</a></li>
                                        <li role='separator' class='divider'></li>
                                        <li><a data-toggle="modal" data-target="#update" onclick="return update('SELESAI','<?= $id ?>')"><i class='material-icons'>done_all</i> SELESAI</a></li>
                                    </ul>
                                    </div>
									</td>
								</tr>
                                <?php
						}
					?>
				</tbody>
                            </table>
