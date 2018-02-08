  <table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>Nama Pelanggan</th>
			<th>No Inovice</th>
			<th>Produk</th>
			<th>Qty</th>
			<th>Alasan Retur</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
            $sql = "SELECT
                    	r.id_retur,
                    	r.verifikasi,
                    	r.no_invoice,
                    	r.id_order_penjualan,
                    	r.tgl_pesan,
                    	r.tgl_kirim,
                    	r.id_produk,
                    	r.status_produk,
                    	r.nama_produk,
                    	r.qty,
                    	r.alasan_retur,
                    	r.batch,
                    	r.`status`,
                    	p.nama_pelanggan
                    FROM
                    	retur r
                    LEFT JOIN pelanggan p ON p.id_pelanggan = r.id_pelanggan";
			$queryspl = mysqli_query ($konek, $sql);
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){

				echo "
					<tr>
						<td>$spl[nama_pelanggan]</td>
						<td>$spl[no_invoice]</td>
						<td>$spl[nama_produk]</td>
						<td>$spl[qty]</td>
						<td>$spl[alasan_retur]</td>";

                        if ($spl['status'] == ''){
				          echo " <td><button class='btn-status bg-gradient-red waves-effect'>BLM APPRV</button></td>";
						}else if ($spl['status'] == 'DITOLAK'){
				          echo " <td><button class='btn-status bg-gradient-red waves-effect'>DITOLAK</button></td>";
						}else{
						  echo " <td><button class='btn-status bg-gradient-green waves-effect'>DITERIMA</button></td>";
						};
                        if ($spl['status'] == ''){
                            echo "
    						<td>
    							<a data-toggle='modal' data-target='#confirm' onclick='return confirm(\"".$spl['id_retur']."\")'  class='delete-link'><button type='button' class='btn-status bg-gradient-blue waves-effect' title='Hapus'>CONFIRM</button></a
                            </td>";
                        }else{
                            echo "<td></td>";
                        }
				echo
                    "</tr>";
			}
		?>
	</tbody>
</table>

<!-- Modal Hapus -->
<div class="modal fade" id="confirm" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Konfirmasi</h4>
            </div>
            <form method="get" action="../controller/order/approval_retur.php" class="">
                <div class="modal-body">
                    <input type="hidden" name="id_retur" readonly>
                    <p class="">Terima permintaan Retur ini ?</p>
                    <select class="form-control" name="status">
                        <option value="DISETUJUI">Ya, Setujui</option>
                        <option value="DITOLAK">Tidak disetujui</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirm(id_retur){
        $('.modal-body input[name=id_retur]').val(id_retur);
    }
</script>
