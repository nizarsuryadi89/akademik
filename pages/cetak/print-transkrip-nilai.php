<?php
	$kode 		= $_GET['nis'];
	$datasiswa 	= $con->query("select * from tbl_siswa a left join 
								tbl_transkrip b on a.siswa_nis=b.siswa_nis 
								 		where a.siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];
?>
<head>
	<link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 centered">
				<img src="../../../assets/images/smk.png" width="140" height="140">
			</div>
			<div class="col-lg-8 ">
				<h3>
					TRANSKRIP NILAI TAHUN AJARAN 2016-2017 <br>
					SMK NAHDLATUL ULAMA TASIKMALAYA
				</h3>
			</div>
		</div>
		<hr> 	
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-2">
					<dt>Nis</dt>
					<dt>NISN</dt>
					<dt>Nama Lengkap</dt>
					<dt>Tempat/Tanggal Lahir</dt>
				</div>
				<div class="col-lg-10">
					<dt>: <?php echo"$dtsiswa[siswa_nis]"?></dt>
					<dt> : <?php echo"$dtsiswa[siswa_nisn]";?></dt>
					<dt>: <?php echo"$dtsiswa[siswa_nama]";?></dt>
					<dt>: <?php echo"$dtsiswa[siswa_tempatlahir] / $dtsiswa[siswa_tanggallahir]";?></dt>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr valign="middle">
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
								$rata = (@$nilai[sms_1] + @$nilai[sms_2] + @$nilai[sms_3] + @$nilai[sms_4] + @$nilai[sms_5]+@$nilai[us])/6;
								$rata2 = round($rata,2);
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
								<td><?php echo"$rata2"; ?></td>
							</tr>
						<?php	
							$no++;
							}
						
						?>
						</tbody>
					</table>
				</div>
				<HR>
				<div class="row">
					<div class="col-lg-9">
						Tanggal Kelulusan : 
					</div>
					<div class="col-lg-3">
						Mengetahui Kepala <br>SMK Nahdlatul Ulama
						<br><br><br><br>
						<strong>Asep Susanto, S.Ag., M.Pd.I</strong>
					</div>
				</div>
				<button onclick="myFunction()">Cetak</button>
			</div>

		</div>
	</div>
</body>