 
                <thead>
					<tr>
						<th>Nama Produk</th>
						<th>Gudang</th>
						<th>Qty</th>
						<th>User</th>
						<th>Tanggal</th>
						<th>Status Aliran</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_aliran, produk.id_produk, aliran_bahan_baku_dan_produk.id_produk, produk.nama_produk, aliran_bahan_baku_dan_produk.id_gudang, gudang.id_gudang, gudang.nama_gudang, qty, aliran_bahan_baku_dan_produk.id_user, user.id_user, user.username, DAY(tanggal) as Hari, MONTHNAME(tanggal) as Bulan, YEAR(tanggal) as Tahun, status_aliran FROM aliran_bahan_baku_dan_produk JOIN gudang ON aliran_bahan_baku_dan_produk.id_gudang = gudang.id_gudang JOIN user ON aliran_bahan_baku_dan_produk.id_user = user.id_user LEFT JOIN produk ON aliran_bahan_baku_dan_produk.id_produk = produk.id_produk GROUP BY nama_produk");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){
								if ($spl['id_produk'] == NULL ){

							echo "
								 ";
							}else{
							echo "
								<tr>
									<td>$spl[nama_produk]</td>
									<td>$spl[nama_gudang]</td>
									<td>$spl[qty]</td>
									<td>$spl[username]</td>
									<td>$spl[Hari] $spl[Bulan] $spl[Tahun]</td>";
									if ($spl['status_aliran'] == 'TERJUAL' ){
							         echo" <td><button type='button' class='btn-status bg-gradient-green waves-effect'><i class='material-icons'>done</i> TERJUAL</button></td>";
									};

							echo "
								</tr>";
							};
						}
					?>
				</tbody>
                            </table>