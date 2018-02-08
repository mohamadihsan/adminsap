
                <thead>
					<tr>
						<th>Nama Pelanggan</th>
						<th width="15%">Alamat</th>
						<th width="15%">Email</th>
						<th>Telepon</th>
						<th>Tipe</th>
						<th>Kredit</th>
						<th>Status</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM pelanggan");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nama_pelanggan]</td>
									<td>$spl[alamat]</td>
									<td>$spl[email]</td>
									<td>$spl[telepon]</td>
									<td>$spl[tipe_pelanggan]</td>
									<td>$spl[kredit_limit]</td>";

									if ($spl['status'] == 'Aktif'){
							          echo " <td><button class='btn-status bg-gradient-green waves-effect'>$spl[status]</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-red waves-effect'>$spl[status]</button></td>";
									};

							echo "<td>
										<a href='index.php?id_pelanggan=$spl[id_pelanggan]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
										<a href='../controller/pelanggan/delete.php?id_pelanggan=$spl[id_pelanggan]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>
