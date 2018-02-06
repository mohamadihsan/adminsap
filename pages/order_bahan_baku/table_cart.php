 
                <thead>
					<tr>
						<th>Nama Produk</th>
						<th>Qty</th>
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT produk.id_produk, cart.harga, cart.qty, produk.nama_produk FROM cart inner join produk on cart.id_produk = produk.id_produk");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nama_produk]</td>
									<td>$spl[qty]</td>
									<td>{$fn($spl["harga"])}</td>
									<td>
										<a href='../controller/order/delete_cart.php?id_produk=$spl[id_produk]' class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
                            </table>