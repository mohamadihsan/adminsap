
<?php
if (isset($_GET['id_order_pembelian'])) {
    $id = $_GET['id_order_pembelian'];
    ?>
    <table class="table table-responsive">
        <caption><b><h2>RINCIAN</h2></b></caption>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
        </tr>
        <?php
        $sql = "SELECT nama_bahan_baku, qty, harga FROM order_pembelian_detail WHERE id_order_pembelian='$id'";
        $result = mysqli_query($konek, $sql);
        $no=1;
        while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_bahan_baku'] ?></td>
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

        $sql = "SELECT
                	p.total_bayar as total_pembayaran,
                	p.id_order_pembelian,
                	p.no_invoice,
                	p.tanggal_order,
                	DAY (p.tanggal_order) AS Hari,
                	MONTHNAME(p.tanggal_order) AS Bulan,
                	YEAR (p.tanggal_order) AS Tahun,
                	p.tanggal_order,
                	DAY (p.tanggal_order) AS HariPesan,
                	MONTHNAME(p.tanggal_order) AS BulanPesan,
                	YEAR (p.tanggal_order) AS TahunPesan,
                	p.id_supplier,
                	pd.nama_bahan_baku,
                	p.tanggal_order,
                	p.status_order,
                	pd.harga,
                	DATE_ADD(tanggal_order, INTERVAL 3 DAY) AS kirim
                FROM
                	order_pembelian p
                INNER JOIN order_pembelian_detail pd
                WHERE
                	p.id_order_pembelian = pd.id_order_pembelian";
		$queryspl = mysqli_query ($konek, $sql);
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

			echo "
					<td>{$fn($spl["total_pembayaran"])}</td>";

					if ($spl['status_order'] == '' ){
			          echo " <td><a href='index.php?pemesanan_bahan_baku=true&no_invoice=$spl[no_invoice]'><button class='btn-status bg-grey waves-effect'>RINCIAN</button></a>
			              <a href='../controller/order/confirm_bayar.php?id_order_pembelian=$spl[id_order_pembelian]' class='lanjut-link'><button class='btn-status bg-gradient-blue waves-effect'>KONFIRM</button></a></td>";
					}else{
					  echo" <td><a href='index.php?pemesanan_bahan_baku=true&id_order_pembelian=$spl[id_order_pembelian]'><button class='btn-status bg-grey waves-effect'>RINCIAN</button></a>
						    <a href='#'><button class='btn-status bg-gradient-green waves-effect'>LUNAS</button></a></td>";
					};

			echo "
				</tr>";
		} ?>
	</tbody>
</table>
