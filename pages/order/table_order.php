 
                <thead>
					<tr>
						<th>Nama Buat Order</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Telepon</th>
						<th>Tipe</th>
						<th>Kredit</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					 <?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM order");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nama_order]</td>
									<td>$spl[alamat]</td>
									<td>$spl[email]</td>
									<td>$spl[telepon]</td>
									<td>$spl[tipe_order]</td>
									<td>$spl[kredit_limit]</td>";

									if ($spl['status'] == 'Aktif'){
							          echo " <td><button class='btn-status bg-gradient-green waves-effect'>$spl[status]</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-red waves-effect'>$spl[status]</button></td>";
									};

							echo "<td>
										<a href='index.php?id_order=$spl[id_order]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
										<a href='../controller/order/delete.php?id_order=$spl[id_order]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?> 
				</tbody>
                            </table>