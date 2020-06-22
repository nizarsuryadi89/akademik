<?php
	include 	"../config.php";
	//include 	"../../assets/fungsi/fungsi_indotgl.php";
	$kode 		= $_GET[nissiswa];
	$datasiswa 	= $con->query("select * from tbl_siswa a left join 
								tbl_transkrip b on a.siswa_nis=b.siswa_nis 
								 		where a.siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];
?>
<head>
	
</head>
<body>
	<?php
		include "cover.php";
	?>
	<div class="container">	
		<hr>	
		<div class="row">
			<div class="row">
				<div class="col-lg-12" align="center">	
					<h4>TRANSKRIP NILAI SEKOLAH</h4>
					Nomor : 040/SMKNU/V/2017 
				</div>
				<br>
			</div>
			<div class="row">
				<div class="col-lg-12">	
					<div class="col-lg-8">
						<table width="100%" align="center">
							<tr>
								<td>
									<table width="80%" align="left">
										<tr><td width="40%">NIS</td><td><?php echo"$dtsiswa[siswa_nis]"?></td></tr>
										<tr><td>NISN</td><td><?php echo"$dtsiswa[siswa_nisn]"?></td></tr>
										<tr><td>Nama Lengkap</td><td><?php echo"$dtsiswa[siswa_nama]"?></td></tr>
										<tr><td>Tempat/Tanggal Lahir</td><td><?php echo"$dtsiswa[siswa_tempatlahir] - ".tgl_indo($dtsiswa['siswa_tanggallahir'])." ";?></td></tr>
									</table>
								</td>
								<td>
									<table width="70%" align="center">
										<tr>
											<td><?php echo "<img src='../../assets/foto-siswa/$dtsiswa[siswa_foto]' class='img img-rounded' width='70'>";?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>			
					</div>

					
				</div>
			</div>
			
		</div>
		

		
		
		<div class="row">
			<div class="col-lg-12" align="center">

					<table class="table table-striped table-bordered table-hover" align="center">
						<thead>
							<tr valign="middle">
								<th rowspan="2">No</th>
								<th rowspan="2">Mata Pelajaran</th>
								<th colspan="5">Nilai Semester</th>
								<th rowspan="2">US / USBN</th>
								
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
							
							</tr>
						<?php	
							$no++;
							}
						
						?>
						</tbody>
					</table>
			</div>
			<div class="row">
				<div class="col-lg-12">	
					<div class="col-lg-8">
						Tanggal Kelulusan : 02 Mei 2017
					</div>
					<div class="col-lg-3" align="right">
					   Tasikmalaya, 02 Mei 2017 <br>
						Mengetahui Kepala <br>SMK Nahdlatul Ulama
						<br><br>
						<strong>Asep Susanto, S.Ag., M.Pd.I</strong>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</body>