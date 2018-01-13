<table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>Kode Bahan - baku</th>
			<th>Nama Bahan - baku</th>
			<th>Stock</th>
			<th>Lokasi Penyimpanan</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$queryspl = mysqli_query ($konek, "SELECT * FROM bahan_baku");
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){

				echo "
					<tr>
						<td>$spl[kode_bahan_baku]</td>
						<td>$spl[nama_bahan_baku]</td>
						<td>$spl[stock]</td>
						<td>$spl[lokasi_penyimpanan]</td>";
						if ($spl['stock'] > 0 ){
				          echo " <td><button class='btn-status bg-gradient-green waves-effect'>TERSEDIA</button></td>";
						}else{
						  echo" <td><button class='btn-status bg-gradient-red waves-effect'>HABIS</button></td>";
						};

				echo "
						<td>
							<a href='index.php?id_bahan_baku=$spl[id_bahan_baku]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>create</i></button></a>
							<a href='index.php?id_bahan_baku=$spl[id_bahan_baku]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float';><i class='material-icons'>call_to_action</i></button></a>
							<a data-toggle='modal' data-target='#hapus' onclick='return hapus(\"".$spl['id_bahan_baku']."\")'  class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float'><i class='material-icons'>delete</i></button></a>
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
            <form method="get" action="../controller/bahan_baku/delete.php" class="">
                <div class="modal-body">
                    <input type="hidden" name="id_bahan_baku" readonly>
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
    function hapus(id_bahan_baku){
        $('.modal-body input[name=id_bahan_baku]').val(id_bahan_baku);
    }
</script>
