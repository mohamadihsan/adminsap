<table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>Kode Produk</th>
			<th>Nama Produk</th>
			<th>Satuan</th>
			<th>Harga</th>
			<th>Komposisi</th>
			<th>Lokasi Penyimpanan</th>
			<th>Stok</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$queryspl = mysqli_query ($konek, "SELECT * FROM produk");
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){

				echo "
					<tr>
						<td>$spl[kode_produk]</td>
						<td>$spl[nama_produk]</td>
						<td>$spl[satuan]</td>
						<td>$spl[harga]</td>";
						if ($spl['id_jenis'] == 1 && $spl['status_komposisi'] == ''){
				          echo " <td><a href='index.php?tambah-komposisi'><button class='btn-status bg-gradient-red waves-effect'>BELUM</button></a></td>";
						}else{
						  echo " <td><button class='btn-status bg-gradient-green waves-effect'>SUDAH</button></td>";
						};

				echo "	<td>$spl[lokasi_penyimpanan]</td>
						<td>$spl[stok]</td>
						<td>
							<a href='index.php?id_produk=$spl[id_produk]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float'; title='Ubah'><i class='material-icons'>create</i></button></a>
							<a href='../komposisi/index.php?id_produk=$spl[id_produk]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float'; title='Komposisi'><i class='material-icons'>call_to_action</i></button></a>
							<a data-toggle='modal' data-target='#hapus' onclick='return hapus(\"".$spl['id_produk']."\")'  class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float' title='Hapus'><i class='material-icons'>delete</i></button></a
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
            <form method="get" action="../controller/produk/delete.php" class="">
                <div class="modal-body">
                    <input type="hidden" name="id_produk" readonly>
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
    function hapus(id_produk){
        $('.modal-body input[name=id_produk]').val(id_produk);
    }
</script>
