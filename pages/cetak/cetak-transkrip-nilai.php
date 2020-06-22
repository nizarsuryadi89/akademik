<?php
	@$kode 		= $_GET['nis'];
	@$datasiswa 	= $con->query("select * from tbl_siswa a left join 
								tbl_transkrip b on a.siswa_nis=b.siswa_nis 
								 		where a.siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];
?>

	<iframe src="<?php echo"cetak/print-transkrip-nilai.php?nis=$kode";?>" style="display:none;" name="frame"></iframe>
	<a href="?page=master-transkrip-nilai&ket=<?php echo$kode ; ?>"><button class="btn btn-default btn-sm" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</button></a>	
	<button type="button" class="btn btn-default btn-sm" onClick="frames['frame'].print()" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-print"></i> Cetak</button>
		
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table width="100%" align="center">
					<tr>
						<td align="center">
							<img src="../assets/images/jabar.png" width="90" height="140">
						</td>
						<td align="center">
							<h4>Lembaga Pendidikan Ma'Arif NU <br>
							Sekolah Menengah Kejuruan Nahdlatul Ulama SMK NU<br>
							SK Dinas Pendidikan No. 421.5/1628/Dikmen
							</h4>
							Jalan Argasari No. 31 Telp (0265) 313275 <br>
							email : smknu_kotatasik@yahoo.co.id<br>
							Tasikmalaya 46122
							
						</td>
						<td align="center">
							<img src="../assets/images/smk.png" width="120" height="120">
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<div class="container">	
		<hr>	
		<div class="row">
			<div class="row">
				<div class="col-lg-12" align="center">	
					<h4>Transkrip Nilai</h4>
					Nomor : 030/SMKNU/V/2018
				</div>
				<br>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-12">	
					<div class="col-lg-12">
						<table width="100%" align="center" border='0'>
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
									<table width="70%" align="right">
										<tr>
											<td><?php echo "<img src='../assets/foto-siswa/$dtsiswa[siswa_foto]' class='img img-rounded' width='70'>";?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>			
					</div>

					
				</div>
			</div>
			<br>
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
								<th rowspan="2">UN</th>
								
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
					<div class="col-lg-9">
						Tanggal Kelulusan : 07 Mei 2017
					</div>
					<div class="col-lg-3" align="right">
						Mengetahui Kepala <br>SMK Nahdlatul Ulama
						<br><br><br><br>
						<strong>Asep Susanto, S.Ag., M.Pd.I</strong>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</body>