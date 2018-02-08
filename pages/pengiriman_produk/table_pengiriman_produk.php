<table class="table table-hover dataTable js-exportable">
    <caption><h4>Jadwal Pengiriman Produk <small></small></h4></caption>
    <thead>
		<tr>
			<th>No</th>
			<th>No Invoice</th>
			<th>Tanggal Pengiriman</th>
			<th>Nama Pelangan</th>
			<th>Jenis Kendaraan</th>
			<th>Nomor Polisi</th>
			<th>Jumlah Barang</th>
		</tr>
	</thead>
	<tbody>
		<?php
            $sql = "SELECT
                    	op.no_invoice,
                    	op.nama_pelanggan,
                    	p.tanggal_kirim,
                    	p.jenis_kendaraan,
                    	p.no_polisi,
                    	k.nama_kemasan,
                    	k.isi_per_dus,
                    	SUM(opd.qty) AS kapasitas
                    FROM
                    	order_penjualan op
                    LEFT JOIN pengiriman p ON p.id_order_penjualan = op.id_order_penjualan
                    LEFT JOIN order_penjualan_detail opd ON opd.id_order_penjualan = op.id_order_penjualan
                    LEFT JOIN produk pr ON pr.nama_produk = opd.nama_produk
                    LEFT JOIN kemasan k ON k.id_kemasan = pr.id_kemasan
                    WHERE
                    	p.tanggal_kirim IS NOT NULL
                    GROUP BY
                    	1,
                    	2,
                    	3,
                    	4,
                    	5,
                    	6,
                    	7
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
					<td><?= $spl['kapasitas']*$spl['isi_per_dus'].' kemasan '.$spl['nama_kemasan'] ?></td>
				</tr>
                <?php
			}
		?>
	</tbody>
</table>
