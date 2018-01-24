<table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>Nomor Polisi</th>
			<th>Driver</th>
			<th>ID User</th>
			<th>Status</th>
            <?php
            if($_SESSION["hak_akses"] == 'sales admin'){
                ?>
			    <th>Action</th>
                <?php
            } ?>
        </tr>
	</thead>
	<tbody>
		<?php
			$queryspl = mysqli_query ($konek, "SELECT
                                                	k.id_kendaraan,
                                                	k.no_polisi,
                                                	k.driver,
                                                	k.id_user,
                                                	k.`status`
                                                FROM
                                                	kendaraan k");
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){

				echo "
					<tr>
						<td>$spl[no_polisi]</td>
						<td>$spl[driver]</td>
						<td>$spl[id_user]</td>
						<td>$spl[status]</td>";

                    if($_SESSION["hak_akses"] == 'sales admin'){
        				echo "
        						<td>
        							<a href='index.php?id_kendaraan=$spl[id_kendaraan]'><button type='button' class='btn bg-gradient btn-circle-table waves-effect waves-circle waves-float'; title='Ubah'><i class='material-icons'>create</i></button></a>
        							<a data-toggle='modal' data-target='#hapus' onclick='return hapus(\"".$spl['id_kendaraan']."\")'  class='delete-link'><button type='button' class='btn bg-gradient-red btn-circle-table waves-effect waves-circle waves-float' title='Hapus'><i class='material-icons'>delete</i></button></a>
        						</td>";

                    }

                echo "</tr>";;
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
            <form method="get" action="../controller/kendaraan/delete.php" class="">
                <div class="modal-body">
                    <input type="hidden" name="id_kendaraan" readonly>
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
    // function update(id_kendaraan, no_polisi, driver, id_user, status){
    //     $('.modal-body input[name=id_kendaraan]').val(id_kendaraan);
    //     $('.modal-body input[name=no_polisi]').val(no_polisi);
    //     $('.modal-body input[name=driver]').val(driver);
    //     $('.modal-body input[name=id_user]').val(id_user);
    //     $('.modal-body input[name=status]').val(status);
    // }

    function hapus(id_kendaraan){
        $('.modal-body input[name=id_kendaraan]').val(id_kendaraan);
    }
</script>
