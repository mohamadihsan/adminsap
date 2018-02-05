
  <table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
			<th>Tanggal Produksi</th>
			<th>Nomor Invoice</th>
			<th>Status Produksi</th>
			<th>Ubah Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
            $sql = "SELECT
                    	id_monitoring_produksi,
                    	no_invoice,
                    	tanggal_produksi,
                    	DAY (tanggal_produksi) AS hari,
                    	MONTHNAME(tanggal_produksi) AS bulan,
                    	YEAR (tanggal_produksi) AS tahun,
                    	status_produksi
                    FROM
                    	monitoring_produksi mp
                    LEFT JOIN order_penjualan op ON op.id_order_penjualan = mp.id_order_penjualan";
			$queryspl = mysqli_query ($konek, $sql);
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){
                $id = $spl['id_monitoring_produksi'];
                ?>
					<tr>
						<td><?= $spl['hari'].' '.$spl['bulan'].' '.$spl['tahun'] ?></td>
						<td><?= $spl['no_invoice'] ?></td>
                        <?php
                        if ($spl['status_produksi'] == 'BELUM PRODUKSI' OR $spl['status_produksi']=='Menunggu'){
				          ?>
                          <td><a href='index.php?tambah-komposisi'><button class='btn-status bg-gradient-red waves-effect'>MENUNGGU</button></a></td>
                          <?php
                      }else if($spl['status_produksi']=='SELESAI'){
                            ?>
						  <td><button class='btn-status bg-gradient-green waves-effect'>SUDAH PRODUKSI</button></td>
                          <?php
                      }else{
                          ?>
                          <td><button class='btn-status bg-gradient-blue waves-effect'>SEDANG PRODUKSI</button></td>
                            <?php
                      }
                        ?>
						<td>
						<div class='btn-group'>
                        <button type='button' class='btn-status bg-gradient dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            STATUS <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu'>
                            <li><a data-toggle="modal" data-target="#update" onclick="return update('SEDANG','<?= $id ?>')"><i class='material-icons'>done</i> SEDANG</a></li>
                            <li role='separator' class='divider'></li>
                            <li><a data-toggle="modal" data-target="#update" onclick="return update('SELESAI','<?= $id ?>')"><i class='material-icons'>done_all</i> SELESAI</a></li>
                        </ul>
                        </div>
						</td>
					</tr>
                    <?php
			}
		?>
	</tbody>
</table>
