<table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>Nama Bahan Baku</th>
			<th>Gudang</th>
			<th>Qty</th>
			<th>User</th>
			<th>Tanggal</th>
			<th>Status Aliran</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
		<?php
            $status_aliran = 'MASUK';
            $id_bahan_baku = null;
			$queryspl = mysqli_query ($konek, "SELECT id_aliran, bahan_baku.id_bahan_baku, aliran_bahan_baku_dan_produk.id_bahan_baku, bahan_baku.nama_bahan_baku, aliran_bahan_baku_dan_produk.id_gudang, gudang.id_gudang, gudang.nama_gudang, qty, aliran_bahan_baku_dan_produk.id_user, user.id_user, user.username, DAY(tanggal) as Hari, MONTHNAME(tanggal) as Bulan, YEAR(tanggal) as Tahun, status_aliran FROM aliran_bahan_baku_dan_produk JOIN gudang ON aliran_bahan_baku_dan_produk.id_gudang = gudang.id_gudang JOIN user ON aliran_bahan_baku_dan_produk.id_user = user.id_user LEFT JOIN bahan_baku ON aliran_bahan_baku_dan_produk.id_bahan_baku = bahan_baku.id_bahan_baku WHERE status_aliran!='$status_aliran' AND aliran_bahan_baku_dan_produk.id_bahan_baku!='$id_bahan_baku'");
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){
					if ($spl['id_bahan_baku'] == NULL ){

				echo "
					 ";
				}else{
					echo "
					<tr>
						<td>$spl[nama_bahan_baku]</td>
						<td>$spl[nama_gudang]</td>
						<td>$spl[qty]</td>
						<td>$spl[username]</td>
						<td>$spl[Hari] $spl[Bulan] $spl[Tahun]</td>
				        <td><button type='button' class='btn-status bg-gradient-red waves-effect'>".$spl['status_aliran']."</button></td>
                        <td>
                        <a href='index.php?edit_pengeluaran_bahan_baku&id_aliran=$spl[id_aliran]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float'; title='Ubah'><i class='material-icons'>create</i></button></a>
                        <a data-toggle='modal' data-target='#hapus' onclick='return hapus(\"".$spl['id_aliran']."\")'  class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float' title='Hapus'><i class='material-icons'>delete</i></button></a>
                        </td>
                        ";

				echo "
					</tr>";
				}
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
            <form method="get" action="../controller/pengeluaran_bahan_baku/delete.php" class="">
                <div class="modal-body">
                    <input type="hidden" name="id_aliran" readonly>
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
    function hapus(id_aliran){
        $('.modal-body input[name=id_aliran]').val(id_aliran);
    }
</script>
