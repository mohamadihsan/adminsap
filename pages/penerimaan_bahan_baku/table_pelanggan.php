 
                <thead>
					<tr>
						<th>Nama Pengeluaran</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Telepon</th>
						<th>Kredit</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM pengeluaran");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nama_pengeluaran]</td>
									<td>$spl[alamat]</td>
									<td>$spl[email]</td>
									<td>$spl[telepon]</td>
									<td>$spl[kredit_limit]</td>
									<td>
										<a href='index.php?id_pengeluaran=$spl[id_pengeluaran]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
										<a href='../controller/pengeluaran/delete.php?id_pengeluaran=$spl[id_pengeluaran]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>