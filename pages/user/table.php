
                <thead>
					<tr>
                        <th>Username</th>
						<th>Password</th>
                        <th>Hak Akses</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM user");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[username]</td>
									<td>$spl[password]</td>
									<td>$spl[hak_akses]</td>";
									if ($spl['status'] != '0'){
							          echo " <td><button class='btn-status bg-gradient-green waves-effect'>Aktif</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-red waves-effect'>Non Aktif</button></td>";
									};

							echo "<td>
										<a href='index.php?id_user=$spl[id_user]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
										<a href='../controller/pegawai/delete.php?id_user=$spl[id_user]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>
