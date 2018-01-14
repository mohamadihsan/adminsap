  <table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>Nama Pelanggan</th>
			<th>No Inovice</th>
			<th>Produk</th>
			<th>Qty</th>
			<th>Alasan Retur</th>
			<th>Status</th>
            <?php if($_SESSION["hak_akses"] == 'sales admin'){ ?>
    			<th>Action</th>
                    <?php
            } ?>
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

                        if ($spl['status'] == 'DITOLAK'){
				          echo " <td><button class='btn-status bg-gradient-red waves-effect'>DITOLAK</button></td>";
						}else{
						  echo " <td><button class='btn-status bg-gradient-green waves-effect'>DITERIMA</button></td>";
						};


                        if($_SESSION["hak_akses"] == 'sales admin'){
                            echo "
    						<td>
    							<a href='index.php?id_retur=$spl[id_retur]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
    							<a data-toggle='modal' data-target='#hapus' onclick='return hapus(\"".$spl['id_retur']."\")'  class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float' title='Hapus'><i class='material-icons'>delete</i></button></a
                            </td>";
                        }
				echo
                    "</tr>";
			}
		?>
	</tbody>
</table>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Konfirmasi</h4>
            </div>
            <form method="get" action="../controller/retur/delete.php" class="">
                <div class="modal-body">
                    <input type="hidden" name="id_retur" readonly>
                    <p class="text-center">Apakah anda yakin, akan menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="material-icons">delete_forever</i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function hapus(id_retur){
        $('.modal-body input[name=id_retur]').val(id_retur);
    }
</script>
