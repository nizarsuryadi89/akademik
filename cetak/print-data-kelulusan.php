<?php
	include 	"../../configakademik.php";
	include 	"../../assets/fungsi/fungsi_indotgl.php";
	$kode 		= $_GET['nis'];
	@$datasiswa 	= $con->query("select * from tbl_siswa a left join 
								tbl_transkrip b on a.siswa_nis=b.siswa_nis inner join
									 tbl_nilai_un c on a.siswa_nis=c.siswa_nis inner join 
									 	tbl_program d on c.program_id=d.program_id 
								 			where a.siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];
?>
<head>
	<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table width="100%" align="center">
					<tr>
						<td align="center">
							<img src="../../assets/images/jabar.png" width="90" height="140">
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
							<img src="../../assets/images/smk.png" width="120" height="120">
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<div class="row">
		<hr>
				<div class="col-lg-12" align="center">	
					<h3><u>Surat Keterangan Lulus</u></h3>
					Nomor : 039/SMKNU/V/2017 <br><br>
					Tahun Pelajaran 2016 - 2017
				</div>
				<br>
			</div>
			<br><br>
			<div class="row">
				<div class="col-lg-12">	
					<p>
						Yang Bertanda tangan dibawah ini Kepala Sekolah Menengah Kejuruan Nahdlatul Ulama Kota Tasikmalaya
						dengan ini menerangkan : 
					</p>

						
					<table width="100%" align="center" border='0'>
						<tr><td>Nama Lengkap</td><td>: <?php echo"$dtsiswa[siswa_nama]"?></td></tr>
						<tr><td>Tempat dan Tanggal Lahir</td><td>: <?php echo"$dtsiswa[siswa_tempatlahir] - ".tgl_indo($dtsiswa['siswa_tanggallahir'])." ";?></td></tr>		
						<tr><td width="30%">Nomor Induk Siswa</td><td>: <?php echo"$dtsiswa[siswa_nis]"?></td></tr>
						<tr><td>Nomor Induk Siswa Nasional</td><td>: <?php echo"$dtsiswa[siswa_nisn]"?></td></tr>
						<tr><td>Nomor Peserta Ujian Nasional</td><td>: <?php echo"$dtsiswa[nomor_ujian]"?></td></tr>
						<tr><td>Kompetensi Keahlian</td><td>: <?php echo"$dtsiswa[program_alias]"?></td></tr>
						<tr><td>Asal Sekolah</td><td>: SMK Nahdlatul Ulama Kota Tasikmalaya</td></tr>
					</table>
					<br>	
					<p>
						Telah Mengikuti Ujian Nasional Berbasis Komputer, Ujian Sekolah, Ujian Sekolah Berbasis Nasional, sesuai dengan Peraturan Menteri Pendidikan dan Kebudayaan Nomor 5 Tahun 2015 dengan hasil sebagai berikut :  
					</p>	
				</div>

					
			</div>
		
	
			<div class="row">
			<div class="col-lg-12" align="center">
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" align="center">
						<thead>
							<tr valign="middle">
								<th colspan="4">Mata Pelajaran</th>
								<th rowspan="2">Jumlah</th>
									
							</tr>
							<tr>
								<th>Bahasa Indonesia</th>
								<th>Matematika</th>
								<th>Bahasa Inggris</th>
								<th>Kompetensi Kejuruan</th>
							</tr>

						</thead>
						<tbody>
				<?php 
					$query=$con->query("select * from tbl_nilai_un where siswa_nis=$kode");
					while ($data=$query->fetch_array())
					{
					    
					   
						$jumlah = @$data[bahasa_indonesia]+@$data[matematika]+@$data[bahasa_inggris]+@$data[kompetensi_kejuruan];

						
						echo"
							<tr>
								<td>$data[bahasa_indonesia]</td>
								<td>$data[matematika]</td>
								<td>$data[bahasa_inggris]</td>
								<td>$data[kompetensi_kejuruan]</td>
								<td>$jumlah</td>
							</tr>
						";
							if (@$data[status] == '1')
            				{
            				    $ket = "LULUS";
            				}else
            				{
            				    $ket = "BELUM LULUS";
            				}
					}
					
			
				?>
						</tbody>
					</table>
				
					</div>
				</div>
			</div>
			<p>Maka Siswa Tersebut dinyatakan <font size='+2'><strong><u><?php echo $ket ; ?></u> </strong></font></p>
			<div class="row">
				<div class="col-lg-12">	
					<table width="100%">
						<tr>
							<td width="60%" align="center"><?php echo "<img src='../../assets/foto-siswa/$dtsiswa[siswa_foto]' class='img img-rounded' width='70'>";?></td>
							</td>
							<td align="center">
								Tasikmalaya, 02 Mei 2017<br>
								Mengetahui Kepala <br>SMK Nahdlatul Ulama
								<br><br><br><br>
								<strong><u>Asep Susanto, S.Ag., M.Pd.I</u></strong>
							</td>
						</tr>
					</table>
				
		
				
		
	
	</div>
</body>