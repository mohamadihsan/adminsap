 
                <thead>
					<tr>
						<th>ID Peramalan</th>
						<th>Nama Produk</th>
						<th>Satuan</th>
						<th>Harga</th>
						<th>Komposisi</th>
						<th>Lokasi Penyimpanan</th>
						<th>Stok</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM produk");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[kode_produk]</td>
									<td>$spl[nama_produk]</td>
									<td>$spl[satuan]</td>
									<td>$spl[harga]</td>";
									if ($spl['id_jenis'] == 1 && $spl['status_komposisi'] == ''){
							          echo " <td><a href='index.php?tambah-komposisi'><button class='btn-status bg-gradient-red waves-effect'>BELUM</button></a></td>";
									}else{
									  echo " <td><button class='btn-status bg-gradient-green waves-effect'>SUDAH</button></td>";
									};

							echo "	<td>$spl[lokasi_penyimpanan]</td>
									<td>$spl[stok]</td>
									<td>
										<a href='index.php?id_produk=$spl[id_produk]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
										<a href='index.php?id_produk=$spl[id_produk]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>call_to_action</i></button></a>
										<a href='../controller/produk/delete.php?id_produk=$spl[id_produk]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>