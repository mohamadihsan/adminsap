 
                <thead>
					<tr>
	
						<th>Nama Produk</th>
						<th>Periode</th>
						<th>Jumlah Pejualan</th>
						<th>Hasil Peramalan</th>
						<th>Selisih</th>
						<th>Persentase kesalahan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT * FROM peramalan");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nama_produk]</td>
									<td>$spl[periode]</td>
									<td>$spl[jumlah_penjualan]</td>
									<td>$spl[hasil_peramalan]</td>
									<td>$spl[selisih]</td>
									<td>$spl[persentase_kesalahan]</td>
									<td>
										<a href='../controller/peramalan_produk/delete.php?id_peramalan=$spl[id_peramalan]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>