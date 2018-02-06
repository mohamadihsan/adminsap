
                <thead>
					<tr>
                        <th>NIP</th>
						<th>Nama Pegawai</th>
                        <th>Gender</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Telepon</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM pegawai");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nip]</td>
									<td>$spl[nama_pegawai]</td>
									<td>$spl[gender]</td>
									<td>$spl[address]</td>
									<td>$spl[email]</td>
									<td>$spl[phone_number]</td>";

									if ($spl['status'] == 'Aktif'){
							          echo " <td><button class='btn-status bg-gradient-green waves-effect'>$spl[status]</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-red waves-effect'>$spl[status]</button></td>";
									};

							echo "<td>
										<a href='index.php?id_pegawai=$spl[id_pegawai]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
										<a href='../controller/pegawai/delete.php?id_pegawai=$spl[id_pegawai]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>
