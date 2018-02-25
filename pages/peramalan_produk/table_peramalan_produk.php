<table class="table js-exportable dataTable">
    <thead>
		<tr>
			<th>Nama Produk</th>
			<th>Periode</th>
			<th>Jumlah Pejualan</th>
			<th>Hasil Peramalan</th>
			<th>Selisih</th>
			<th>Persentase kesalahan (MSE)</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$queryspl = mysqli_query ($konek, "SELECT 
													p.id_peramalan, 
													p.nama_produk, 
													p.periode, 
													p.jumlah_penjualan, 
													p.hasil_peramalan, 
													p.selisih, 
													p.persentase_kesalahan, 
													pr.satuan 
												FROM peramalan p 
												LEFT JOIN 
													produk pr 
												ON 
													pr.id_produk=p.id_produk");
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){
				$hasil_peramalan = ceil($spl['hasil_peramalan']);
				$selisih = ceil($spl['selisih']);
				echo "
					<tr>
						<td>$spl[nama_produk]</td>
						<td>$spl[periode]</td>
						<td>$spl[jumlah_penjualan] $spl[satuan]</td>
						<td>$hasil_peramalan $spl[satuan]</td>
						<td>$selisih $spl[satuan]</td>
						<td>$spl[persentase_kesalahan]</td>
						<td>
							<a data-toggle='modal' data-target='#hapus' onclick='return hapus(\"".$spl['id_peramalan']."\")'  class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float' title='Hapus'><i class='material-icons'>delete</i></button></a
                        </td>
                        </td>
					</tr>";
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
            <form method="get" action="../controller/peramalan_produk/delete.php" class="">
                <div class="modal-body">
                    <input type="hidden" name="id_peramalan" readonly>
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
    function hapus(id_peramalan){
        $('.modal-body input[name=id_peramalan]').val(id_peramalan);
    }
</script>
