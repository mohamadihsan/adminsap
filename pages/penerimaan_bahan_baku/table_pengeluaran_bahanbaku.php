 
                <thead>
					<tr>
						<th>Nama Bahan Baku</th>
						<th>Gudang</th>
						<th>Qty</th>
						<th>User</th>
						<th>Tanggal</th>
						<th>Status Aliran</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_aliran, bahan_baku.id_bahan_baku, aliran_bahan_baku_dan_produk.id_bahan_baku, bahan_baku.nama_bahan_baku, aliran_bahan_baku_dan_produk.id_gudang, gudang.id_gudang, gudang.nama_gudang, qty, aliran_bahan_baku_dan_produk.id_user, user.id_user, user.username, DAY(tanggal) as Hari, MONTHNAME(tanggal) as Bulan, YEAR(tanggal) as Tahun, status_aliran FROM aliran_bahan_baku_dan_produk JOIN gudang ON aliran_bahan_baku_dan_produk.id_gudang = gudang.id_gudang JOIN user ON aliran_bahan_baku_dan_produk.id_user = user.id_user LEFT JOIN bahan_baku ON aliran_bahan_baku_dan_produk.id_bahan_baku = bahan_baku.id_bahan_baku");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){
								if ($spl['id_bahan_baku'] == NULL ){

							echo "
								 ";
							}else{
								echo "
								<tr>
									<td>$spl[nama_bahan_baku]</td>
									<td>$spl[nama_gudang]</td>
									<td>$spl[qty]</td>
									<td>$spl[username]</td>
									<td>$spl[Hari] $spl[Bulan] $spl[Tahun]</td>";
									if ($spl['status_aliran'] == 'DIPAKAI' ){
							         echo" <td><button type='button' class='btn-status bg-gradient-green waves-effect'><i class='material-icons'>done</i> DIPAKAI</button></td>";
									};

							echo "
								</tr>";
							}
						}
					?>
				</tbody>
                            </table>