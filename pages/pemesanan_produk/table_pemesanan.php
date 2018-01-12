 
                <thead>
					<tr>
						<th>No Invoice</th>
						<th>Tgl Order</th>
						<th>Tgl Pengiriman</th>
						<th>Status</th>
						<th>Total Pembayaran</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
$fn = 'convert_to_rupiah';
function convert_to_rupiah($angka)
    {return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));}; // Setting Untuk Fungsi Rupiah 
?>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT order_penjualan.total_pembayaran, order_penjualan.id_order_penjualan, order_penjualan_detail.id_order_penjualan, order_penjualan.no_invoice, order_penjualan.tanggal_order, DAY(order_penjualan.tanggal_order) as Hari, MONTHNAME(order_penjualan.tanggal_order) as Bulan, YEAR(order_penjualan.tanggal_order) as Tahun, order_penjualan.tgl_pesan, DAY(order_penjualan.tgl_pesan) as HariPesan, MONTHNAME(order_penjualan.tgl_pesan) as BulanPesan, YEAR(order_penjualan.tgl_pesan) as TahunPesan, order_penjualan.nama_pelanggan, order_penjualan_detail.nama_produk, order_penjualan.tgl_pesan, order_penjualan.status_order, order_penjualan_detail.harga, DATE_ADD(tgl_pesan, INTERVAL 3 DAY) as kirim FROM order_penjualan INNER JOIN order_penjualan_detail WHERE order_penjualan.id_order_penjualan = order_penjualan_detail.id_order_penjualan");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[no_invoice]</td>
									<td>$spl[Hari] $spl[Bulan] $spl[Tahun]</td>
									<td>$spl[kirim]</td>";
									if ($spl['status_order'] == '' ){
							          echo " <td><button class='btn-status bg-gradient-red waves-effect'>BLM BAYAR</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-green waves-effect'>SDH BAYAR</button></td>";
									};

							echo "
									<td>{$fn($spl["total_pembayaran"])}</td>";

									if ($spl['status_order'] == '' ){
							          echo " <td><a href='index.php?no_invoice=$spl[no_invoice]'><button class='btn-status bg-grey waves-effect'>RINCIAN</button></a>
							              <a href='../controller/order/confirm_bayar.php?id_order_penjualan=$spl[id_order_penjualan]' class='lanjut-link'><button class='btn-status bg-gradient-blue waves-effect'>KONFIRM</button></a></td>";
									}else{
									  echo" <td><a href='index.php?id_order_penjualan=$spl[id_order_penjualan]'><button class='btn-status bg-grey waves-effect'>RINCIAN</button></a>
										    <a href='#'><button class='btn-status bg-gradient-green waves-effect'>LUNAS</button></a></td>";
									};

							echo "
								</tr>";
						}
					?>
				</tbody>
                            </table>