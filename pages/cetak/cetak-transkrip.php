<?php
	error_reporting(0);
	$kode 		= $_GET['nissiswa'];
	$datasiswa 	= $con->query("select * from tbl_siswa a left join 
								tbl_transkrip b on a.siswa_nis=b.siswa_nis 
								 		where a.siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];

	$q_jurusan 	= $con->query("select * from tbl_siswa a inner join tbl_pesertarombel b on a.siswa_id=b.siswa_id inner join tbl_rombel c on b.rombel_id=c.rombel_id 
		inner join tbl_program d on c.program_id=d.program_id where siswa_nis =$kode");
	$jur 		= $q_jurusan->fetch_assoc();
	
?>
<body onload="window.print()">
	<div class="container">
		<div class="row">
			
				<table width="100%" align="center">
					<tr>
						<td align="center" width="15%">
							<img src="../img/images/jabar.png" width="70" height="120">
						</td>
						<td align="center" width="70%">
							<h4>Lembaga Pendidikan Ma'Arif NU <br>
							Sekolah Menengah Kejuruan Nahdlatul Ulama SMK NU<br>
							SK Dinas Pendidikan No. 421.5/1628/Dikmen
							</h4>
							Jalan Argasari No. 31 Telp (0265) 313275 <br>
							email : smknu_kotatasik@yahoo.co.id<br>
							Tasikmalaya 46122
							
						</td>
						<td align="center" width="15%">
							<img src="../img/images/smk.png" width="100" height="100">
						</td>
					</tr>
					
				</table>
			
		</div>
		<div class="row">
		<div class="panel-body" align="center">

			<hr>
				
			<table width="100%">
				<tr><td width="20%">NIS</td><td>:</td><td><?php echo"$dtsiswa[siswa_nis]"?></td></tr>
				<tr><td width="10%">NISN</td><td>:</td><td><?php echo"$dtsiswa[siswa_nisn]"?></td></tr>
				<tr><td width="10%">Nama Lengkap</td><td>:</td><td><?php echo"$dtsiswa[siswa_nama]"?></td></tr>
				<tr><td width="10%">Tempat/Tanggal Lahir</td><td>:</td><td><?php echo"$dtsiswa[siswa_tempatlahir] / " .tgl_indo($dtsiswa['siswa_tanggallahir'])." ";?></td></tr>
				<tr><td width="10%">Kompetensi Keahlian</td><td>:</td><td><?php  echo"$jur[program_alias]";?></td></tr>
			</table>
           <hr>
           <h2>TRANSKRIP NILAI</h2>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th rowspan="2">No</th>
						<th rowspan="2">Kode</th>
						<th rowspan="2">Mata Diklat</th>
						<th colspan="5">Nilai Semester</th>
						<th rowspan="2">US/USBN</th>
						
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
								 				where a.siswa_nis = $kode order by d.mapel_urut asc ");
					while ($nilai=$nilaisiswa->fetch_array())
					{
						$ket = "Lulus";
						$rata = (@$nilai[sms_1]+@$nilai[sms_2]+@$nilai[sms_3]+@$nilai[sms_4]+@$nilai[sms_5]+@$nilai[us])/6;
						$rt   = round($rata);
				?>
					
					<tr>
						<td><?php echo"$no"; ?></td>
						<td><?php echo"$nilai[mapel_kode]"; ?></td>
						<td><?php echo"$nilai[mapel_nama]"; ?> <input type='hidden' name='id' value="<?php echo"$nilai[nilai_id]"; ?>"></td>
						<td>
							<?php
								if (($nilai[sms_1] == 0) or ($nilai[sms_1] == ''))
								{
									echo"-";
									
								}
								else
								{
									echo"$nilai[sms_1]";
								}
								
							?>
						</td>
						<td>
							
							<?php
								if (($nilai[sms_2] == 0) or ($nilai[sms_2] == ''))
								{
									echo"-";	
								}
								else
								{
									echo"$nilai[sms_2]";
								}
								?>
									
							
						</td>
						<td>
							<?php 
								if (($nilai[sms_3] == 0) or ($nilai[sms_3] == ''))
								{
									echo"-";
									
								}
								else
								{
									echo"$nilai[sms_3]";
								}
							?>
						</td>
						<td>
							<?PHP
							if (($nilai[sms_4] == 0) or ($nilai[sms_4] == ''))
								{
									echo"-";
									
								}
								else
								{
									echo"$nilai[sms_4]";
								}
							?>								
						</td>
						<td>
							<?php 
								if (($nilai[sms_5] == 0) or ($nilai[sms_5] == ''))
								{
									echo"-";
									
								}
								else
								{
									echo"$nilai[sms_5]";
								}
							?>
						</td>
						<td>
							<?php 
								if (($nilai[us] == 0) or ($nilai[us] == ''))
								{
									echo"-";
									
								}
								else
								{
									echo"$nilai[us]";
								}
							$no++;
							}
							?>
						</td>
						
						
						
					</tr>
					
				</tbody>
			</table>
						
		</div>
		<table align="right" width="30%">
			<?php
				$bulan = date(M);
				$tahun = date(Y);
			?>
			<tr><td align="center">Tasikmalaya,3 Mei 2018 <br>Kepala Sekolah</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td align="center"><b><u>Asep Susanto, S.Ag., MPd.I</td></tr>
		</table>
</div>
</div>