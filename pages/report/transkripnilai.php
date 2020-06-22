<?php
	$kode 		= $_GET['nis-siswa'];
	$datasiswa 	= $con->query("select * from tbl_siswa a left join 
								tbl_transkrip b on a.siswa_nis=b.siswa_nis 
								 		where a.siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel-body">
            <dl>
                <dt>Nis : <?php echo"$dtsiswa[siswa_nis]"?></dt>
                <dt>NISN : <?php echo"$dtsiswa[siswa_nisn]";?></dt>
                <dt>Nama Lengkap : <?php echo"$dtsiswa[siswa_nama]";?></dt>
                <dt>Tempat/Tanggal Lahir : <?php echo"$dtsiswa[siswa_tempatlahir] / $dtsiswa[siswa_tanggallahir]";?></dt>
                <dt>Kompetensi Keahlian : <?php echo"$dtsiswa[program_alias]";?></dt>               
            </dl>
        </div>
	</div>


	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th rowspan="2">No</th>
						<th rowspan="2">Mata Pelajaran</th>
						<th colspan="5">Nilai Semester</th>
						<th rowspan="2">US</th>
						<th rowspan="2">UN</th>
						<th rowspan="2">Rata-Rata</th>
					</tr>
				
					<tr>
						<th>1</th>
						<th>2</th>
						<th>3</th>
						<th>4</th>
						<th>5</th>
						
					</tr>

				</thead>
				<tbody>
				<?php
					$no=1;
					$nilaisiswa = $con->query("select * from tbl_siswa a left join 
									tbl_transkrip b on a.siswa_nis=b.siswa_nis inner 
									 		join tbl_mapel d on b.mapel_id=d.mapel_id 
								 				where a.siswa_nis = $kode");
					while ($nilai=$nilaisiswa->fetch_array())
					{
						$rata = (@$nilai[sms_1] + @$nilai[sms_2] + @$nilai[sms_3] + @$nilai[sms_4] + @$nilai[sms_5])/5;
				?>
					<tr>
						<td><?php echo"$no"; ?></td>
						<td><?php echo"$nilai[mapel_nama]"; ?></td>
						<td><?php echo"$nilai[sms_1]"; ?></td>
						<td><?php echo"$nilai[sms_2]"; ?></td>
						<td><?php echo"$nilai[sms_3]"; ?></td>
						<td><?php echo"$nilai[sms_4]"; ?></td>
						<td><?php echo"$nilai[sms_5]"; ?></td>
						<td><?php echo"$nilai[us]"; ?></td>
						<td><?php echo"$nilai[un]"; ?></td>
						<td><?php echo"$rata"; ?></td>
					</tr>
				<?php	
					$no++;
					}
				
				?>
				</tbody>
			</table>
			<?php 
			echo"<a href='pages/report/transkrip-nilai.php?&siswa-nis=$nis' target='blank'>";
			?>
			<button>Print Transkrip</button>

			
		</div>
</div>
</div>