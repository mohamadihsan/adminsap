 
                <thead>
					<tr>
						<th>Nama Supplier</th>
						<th>Alamat</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM supplier");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nama_supplier]</td>
									<td>$spl[alamat_supplier]</td>";

									if ($spl['status'] == 'Aktif'){
							          echo " <td><button class='btn-status bg-gradient-green waves-effect'>$spl[status]</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-red waves-effect'>$spl[status]</button></td>";
									};
								
							echo "<td>
										<a href='index.php?id_supplier=$spl[id_supplier]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
										<a href='../controller/supplier/delete.php?id_supplier=$spl[id_supplier]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>