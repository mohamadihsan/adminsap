<table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>No</th>
			<th>No Invoice</th>
			<th>Tanggal Pengiriman</th>
			<th>Nama Pelangan</th>
			<th>Jenis Kendaraan</th>
			<th>Nomor Polisi</th>
		</tr>
	</thead>
	<tbody>
		<?php
            $sql = "SELECT
                    	op.no_invoice,
                    	op.nama_pelanggan,
                    	p.tanggal_kirim,
                    	p.jenis_kendaraan,
                    	p.no_polisi
                    FROM
                    	order_penjualan op
                    LEFT JOIN pengiriman p ON p.id_order_penjualan = op.id_order_penjualan
                    WHERE
                    	p.tanggal_kirim IS NOT NULL
                    ORDER BY
                        p.tanggal_kirim DESC";
			$queryspl = mysqli_query ($konek, $sql);
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}
            $no = 1;
			while ($spl = mysqli_fetch_array ($queryspl)){
                ?>
				<tr>
                    <td><?= $no++ ?></td>
					<td><?= $spl['no_invoice'] ?></td>
					<td><?= date('d M Y', strtotime($spl['tanggal_kirim'])) ?></td>
					<td><?= $spl['nama_pelanggan'] ?></td>
					<td><?= $spl['jenis_kendaraan'] ?></td>
					<td><?= $spl['no_polisi'] ?></td>
				</tr>
                <?php
			}
		?>
	</tbody>
</table>
