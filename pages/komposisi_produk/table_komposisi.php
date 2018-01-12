 
                <thead>
					<tr>
						<th>Nama Produk</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT  komposisi_produk.id_produk, produk.id_produk, komposisi_produk.status, produk.nama_produk FROM komposisi_produk JOIN produk ON komposisi_produk.id_produk = produk.id_produk");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
								    <td>$spl[nama_produk]</td>";
								    if ($spl['status'] == 'SUDAH DIBUAT' ){
							          echo " <td><button class='btn-status bg-gradient-green waves-effect'>TERSEDIA</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-red waves-effect'>KOSONG</button></td>";
									};

							echo "
									<td>
										<a href='#'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>reorder</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>