
  <table class="table table-hover dataTable js-exportable">
    <thead>
		<tr>
            <th>Nomor Invoice</th>
			<th>Tanggal Produksi</th>
			<th>Tanggal Selesai Produksi</th>
			<th>Status Produksi</th>
			<th>Ubah Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
            function Tanggal($tanggal) {
                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                $tahun = substr($tanggal, 0, 4);
                $bulan = substr($tanggal, 5, 2);
                $tgl = substr($tanggal, 8, 2);

                $hasil = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
                return ($hasil);
            }
            
            $sql = "SELECT
                    	mp.id_monitoring_produksi,
                    	op.no_invoice,
                    	mp.tanggal_produksi,
                    	DAY (mp.tanggal_produksi) AS hari,
                    	MONTHNAME(mp.tanggal_produksi) AS bulan,
                    	YEAR (mp.tanggal_produksi) AS tahun,
                    	mp.status_produksi,
                    	SUM(opd.qty) AS jumlah
                    FROM
                    	monitoring_produksi mp
                    LEFT JOIN order_penjualan op ON op.id_order_penjualan = mp.id_order_penjualan
                    LEFT JOIN order_penjualan_detail opd ON opd.id_order_penjualan = op.id_order_penjualan
                    GROUP BY
                    	1,
                    	2,
                    	3,
                    	4,
                    	5,
                    	6,
                    	7";
			$queryspl = mysqli_query ($konek, $sql);
			if($queryspl == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}

			while ($spl = mysqli_fetch_array ($queryspl)){
                $id = $spl['id_monitoring_produksi'];
                $tanggal_produksi = $spl['tanggal_produksi'];
                $jumlah = $spl['jumlah'];
                if ($jumlah > 96) {
                    $tanggal_selesai_produksi = date('Y-m-d', strtotime('+1 day', strtotime($tanggal_produksi)));
                }else{
                    $tanggal_selesai_produksi = $tanggal_produksi;
                }
                ?>
					<tr>
                        <td><?= $spl['no_invoice'] ?></td>
						<td><?= $spl['hari'].' '.$spl['bulan'].' '.$spl['tahun'] ?></td>
						<td><?= Tanggal($tanggal_selesai_produksi) ?></td>
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
