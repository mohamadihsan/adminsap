<table class="table js-exportable dataTable">
    <thead>
		<tr>
			<th>No invoice</th>
			<th>pelanggan</th>
			<th>Produk</th>
			<th>Qty</th>
			<th>Tanggal Pesan</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
            $sql = "SELECT
                    	op.id_order_penjualan,
                    	op.no_invoice,
                    	op.nama_pelanggan,
                    	op.id_produk,
                    	op.tgl_pesan,
                    	opd.nama_produk,
                    	opd.qty
                    FROM
                    	order_penjualan op
                    LEFT JOIN order_penjualan_detail opd ON opd.id_order_penjualan = op.id_order_penjualan
                    WHERE
                    	op.approval = 'DISETUJUI' GROUP BY 1,2,3,4,5,6,7";
			$queryspl = mysqli_query ($konek, $sql);
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){

				echo "
					<tr>
						<td>$spl[no_invoice]</td>
						<td>$spl[nama_pelanggan]</td>
						<td>$spl[nama_produk]</td>
						<td>$spl[qty]</td>
						<td>$spl[tgl_pesan]</td>
						<td>
							<a href='index.php?detail_kebutuhan_bahan_baku&id_order_penjualan=".$spl['id_order_penjualan']."' title='Kebutuhan Bahan Baku'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>reorder</i></button></a>
                        </td>
                        </td>
					</tr>";
			}
		?>
	</tbody>
</table>
