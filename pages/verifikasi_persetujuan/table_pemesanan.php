
<?php
if (isset($_GET['id_order_penjualan'])) {
    $id = $_GET['id_order_penjualan'];
    ?>
    <table class="table table-responsive">
        <caption><b><h2>RINCIAN</h2></b></caption>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Qty</th>
            <th>Harga</th>
        </tr>
        <?php
        $sql = "SELECT nama_produk, qty, harga FROM order_penjualan_detail WHERE id_order_penjualan='$id'";
        $result = mysqli_query($konek, $sql);
        $no=1;
        while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_produk'] ?></td>
                <td><?= $row['qty'] ?></td>
                <td><?= $row['harga'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>


  <table class="table table-hover dataTable js-exportable">
                <thead>
					<tr>
						<th>No Invoice</th>
						<th>Tgl Order</th>
						<th>Status Pembayaran</th>
						<th>Status Approval</th>
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
						$queryspl = mysqli_query ($konek, "SELECT order_penjualan.total_pembayaran, order_penjualan.approval, order_penjualan.id_order_penjualan, order_penjualan_detail.id_order_penjualan, order_penjualan.no_invoice, order_penjualan.tanggal_order, DAY(order_penjualan.tanggal_order) as Hari, MONTHNAME(order_penjualan.tanggal_order) as Bulan, YEAR(order_penjualan.tanggal_order) as Tahun, order_penjualan.tgl_pesan, DAY(order_penjualan.tgl_pesan) as HariPesan, MONTHNAME(order_penjualan.tgl_pesan) as BulanPesan, YEAR(order_penjualan.tgl_pesan) as TahunPesan, order_penjualan.nama_pelanggan, order_penjualan_detail.nama_produk, order_penjualan.tgl_pesan, order_penjualan.status_order, order_penjualan_detail.harga, DATE_ADD(tgl_pesan, INTERVAL 3 DAY) as kirim FROM order_penjualan INNER JOIN order_penjualan_detail WHERE order_penjualan.id_order_penjualan = order_penjualan_detail.id_order_penjualan");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[no_invoice]</td>
									<td>$spl[Hari] $spl[Bulan] $spl[Tahun]</td>";
									if ($spl['status_order'] == 'MENUNGGU PEMBAYARAN' ){
							          echo " <td><button class='btn-status bg-gradient-red waves-effect'>BLM BAYAR</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-green waves-effect'>SDH BAYAR</button></td>";
									};

                                    if ($spl['approval'] == '' ){
							          echo " <td><button class='btn-status bg-gradient-red waves-effect'>BLM APPRV</button></td>";
									}else{
									  echo" <td><button class='btn-status bg-gradient-green waves-effect'>DISETUJUI</button></td>";
									};

							echo "
									<td>{$fn($spl["total_pembayaran"])}</td>";

									if ($spl['approval'] == '' ){
							          echo " <td><a href='index.php?verifikasi_persetujuan=true&id_order_penjualan=$spl[id_order_penjualan]'><button class='btn-status bg-grey waves-effect'>RINCIAN</button></a>
							              <a href='../controller/order/approval_penjualan.php?id_order_penjualan=$spl[id_order_penjualan]' class='lanjut-link'><button class='btn-status bg-gradient-blue waves-effect'>APPROVE</button></a></td>";
									}else{
									  echo" <td><a href='index.php?verifikasi_persetujuan=true&id_order_penjualan=$spl[id_order_penjualan]'><button class='btn-status bg-grey waves-effect'>RINCIAN</button></a>
										    </td>";
									};

							echo "
								</tr>";
						}
					?>
				</tbody>
                            </table>
