<?php
	@$kode 		= $_GET['nissiswa'];
	@$rombel    = $_GET['rombel'];
	@$semester 	= $_GET['semester'];
	//@$datasiswa = $con->query("select * from tbl_transkrip where rombel_id=$rombel");
	//$dtsiswa 	= $datasiswa->fetch_assoc();
	//@$nis 		= $dtsiswa[siswa_nis];
	include 	"fungsi_terbilang.php";
?>
	
	<div class="panel-heading">
		<a href="?page=Cetak Raport&rombelid=<?php echo"$rombel&semester=$semester"; ?>"><button class="btn btn-success"><i class="fa fa-backward"></i></button>
		<?php echo "
		<a href='?page=cetak-raport-pat-sms2-k13&rombel=$rombel&nissiswa=$kode&semester=$semester'>
		";
		?>
		<button class="btn btn-success"><i class="fa fa-print"></i> Print Raport</button></a>
	</div>
		

	<?php
		$semua = $con->query("select * from tbl_transkrip_sms1 where rombel_id=$rombel group by siswa_nis");
		
			$walikelas 	= $con->query("select * from tbl_rombel a inner join tbl_guru b 
										on a.rombel_wali = b.guru_id where rombel_id=$rombel ");
			$wl 		= $walikelas->fetch_assoc();
	?>
	<div class="container">
		<div class="row">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<div class="col-lg-12">
					<table width="100%" align="center">
						<tr>
							<td align="center">
								<img src="../img/jabar.png" width="90" height="140">
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
								<img src="../img/smk.png" width="120" height="120">
							</td>
						</tr>
					</table>
					<hr>
				</div>
			
			
	
			<div class="row">
	
			
		
				<div class="col-lg-12" align="center">	
					<h4><u>LAPORAN HASIL BELAJAR PESERTA DIDIK</u></h4>
					PENILAIAN AKHIR SEMESTER TAHUN AJARAN 2018-2019
				</div>
				<br>
			</div>
			<br><br>
			<?php
				if ($semester == 1)
				{
					$datasiswa 	= $con->query("select * from tbl_transkrip_sms1 a inner join tbl_siswa b 
												on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
													on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
				}
				elseif ($semester == 2)
				{
					$datasiswa 	= $con->query("select * from tbl_transkrip_sms2 a inner join tbl_siswa b 
												on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
													on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
				}
				elseif ($semester == 3)
				{
					$datasiswa 	= $con->query("select * from tbl_transkrip_sms3 a inner join tbl_siswa b 
												on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
													on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
				}elseif ($semester == 4)
				{
					$datasiswa 	= $con->query("select * from tbl_transkrip_sms4 a inner join tbl_siswa b 
												on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
													on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
				}elseif ($semester == 5)
				{
					$datasiswa 	= $con->query("select * from tbl_transkrip_sms5 a inner join tbl_siswa b 
												on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
													on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
				}elseif ($semester == 6)
				{
					$datasiswa 	= $con->query("select * from tbl_transkrip_sms6 a inner join tbl_siswa b 
												on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
													on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
				}

				$dt 		= $datasiswa->fetch_assoc();

			?>
			<div class="row">

				<div class="col-lg-3">	
					<P>	Nama Siswa : <?PHP echo"$dt[siswa_nama]";?></P>
					<P>	NIS/NISN        : <?PHP echo"$dt[siswa_nis]";?>  / <?PHP echo"$dt[siswa_nisn]";?></P>
					
				</div>
				
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3" align="left">	
					<P>	Kelas		 	: <?PHP echo"$dt[rombel_nama]";?></P>
					<P>	Semester        : <?PHP echo"$dt[rombel_semester]";?> - SATU /<?PHP echo"2018-2019";?></P>
					
				</div>

					
			</div>
		
	
			<div class="row">
			<div class="col-lg-12" align="center">
					<div class="table-responsive">
					<table class="table table-striped table-bordered" align="center">
						<thead>
							<tr valign="middle">
								<th rowspan="2">No</th>
								<th rowspan="2">Kode / Mata Pelajaran</th>
								
								<th rowspan="2">% Kehadiran</th>
								<th colspan="3">Nilai Pengetahuan</th>
								<th colspan="3">Nilai Keterampilan</th>
								
								
									
							</tr>
							<tr>
								<th width="5%">Angka</th>
								<th width="15%">huruf</th>
								<th width="5%">Predikat</th>
								<th width="5%">Angka</th>
								<th width="15%">huruf</th>
								<th width="5%">Predikat</th>
							</tr>
						</thead>
						<tbody>
				<?php 
					if (@$dt[rombel_semester]== $semester)
					{
						$query=$con->query("select * from tbl_transkrip_sms1  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
						$no = 1;
						while ($row=$query->fetch_array())
						{	

						  // $guru = $con->query("select guru_nama where ")
						   
						   
						   	@$pp 		= ucwords(terbilang($nilai2));

						   	@$nilaiuts 		= $row[pts_sms1];
							@$nilaiuas  	= $row[pas_sms1];
							@$nilaiH 		= $row[nh_sms1];

							@$nilaiakhir  	= (($nilaiH * 4)+($nilaiuts * 2)+($nilaiuas * 2))/8;

								//$nBulat 	  = ($nilaiakhir*4)/100;
							$nBulat 		= round($nilaiakhir,1);
							$huruf    		= ucwords(terbilang($nBulat));
							
							if (($nBulat >= 88) and ($nBulat <= 100))
								{	
									@$predikat			="A";
									@$deskripsi 			="<b>Sangat baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasa";
								}else
								if (($nBulat >= 74) and ($nBulat<= 87 ))
								{	@$predikat			="B";
									@$deskripsi 		="<b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar" ;
								}else
								if (($nBulat >= 60) and ($nBulat <= 73))
								{	@$predikat			="C";
									@$deskripsi  		= "<b>Cukup</b>. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar";
								}else
								if (($nBulat < 60) and ($nBulat >= 1))
								{	@$predikat		="D";
									@$deskripsi 	= "<b>Sangat kurang</b>. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja. "; 
								}
								elseif ($nBulat == 0){
									@$predikat		="-";
									$deskripsi = "Nilai Belum Diisi";
								}


								@$nk 	= (@$row[nPraktik_sms1] + @$row[nProduk_sms1] + @$row[nProyek_sms1])/3;

								//$nBulat 	  = ($nilaiakhir*4)/100;
								$nKBulat 	  	= round($nk,1);
								$hurufK    		= ucwords(terbilang($nKBulat));
								if (($nk >= 88) and ($nk <= 100))
								{	
									@$predikatK			="A";
									@$deskripsiK 			="<b>Sangat Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
								}else
								if (($nk >= 74) and ($nk<= 87 ))
								{	@$predikatK			="B";
									@$deskripsiK 		="<b>Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
								}else
								if (($nk >= 60) and ($nk <= 73))
								{	@$predikatK			="C";
									@$deskripsiK  		= "<b>Kurang Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD";
								}else
								if (($nk < 60) and ($nk >= 1))
								{	@$predikatK		="D";
									@$deskripsiK 	= "<b>Tidak Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD"; 
								}
								elseif ($nk == 0){
									@$predikatK		="-";
									$deskripsiK = "Nilai Belum Diisi";
								}
						   
							echo"
								<tr>
									<td>$no</td>
									<td>
										($row[mapel_kode]) &nbsp;
										$row[mapel_nama] <br> $row[guru_nama]
									</td>
									<td>$row[absen_sms1] %</td>
									<td>$nBulat</td>
									<td>$huruf</td>
									<td>$predikat</td>
									<td>$nk</td>
									<td>$hurufK</td>
									<td>$predikatK</td>
								
									
								</tr>
							";
							@$no++;
							@$jml = @$jml+$nBulat;
						}
					}
					
				
				?>
						<tr>
							<td colspan="3" align="right">Jumlah </td><td><?php echo ""; ?></td><td colspan="5"></td>
						</tr>
						</tbody>
					</table>
				
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-12">
					Kegiatan Ektra Kulikuler
					<table class="table table-bordered">
						<tr>
							<td width="5%">No</td>
							<td width="30%">Kegiatan Ektra Kulikuler</td>
							<td>Nilai Huruf</td>
							<td>Deskripsi</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Pramuka</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Kesenian</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>3</td>
							<td>English Club</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
			<hr>
			<div class="row">
				
				<div class="col-lg-6" align="center">
				Orang Tua /Wali, <br><br><br><br>
				__________________
				</div>
				<div class="col-lg-6" align="center">
				Wali Kelas,	<br><br><br><br>


				<?php
					echo"<u><b> $wl[guru_nama]</b></u>";
				?>
				</div>
				
			</div>
			<hr>
			<div class="row">

				<div class="col-lg-3">	
					<P>	Nama Siswa : <?PHP echo"$dt[siswa_nama]";?></P>
					<P>	NIS/NISN        : <?PHP echo"$dt[siswa_nis]";?>  / <?PHP echo"$dt[siswa_nisn]";?></P>
					
				</div>
				
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3" align="left">	
					<P>	Kelas		 	: <?PHP echo"$dt[rombel_nama]";?></P>
					<P>	Semester        : <?PHP echo"$dt[rombel_semester]";?> - SATU /<?PHP echo"2018-2019";?></P>
					
				</div>

					
			</div>
			<div class="row">
				<div class="col-lg-12" align="left">
					Deskripsi<br><br>
					<table class='table table-bordered' >
						<tr>
							<td width="5%">No</td>
							<td width="25%">Mata Pelajaran</td>
							<td width="35%">Deskripsi Pengetahuan</td>
							<td width="35%">Deskripsi Keterampilan</td>
						</tr>
					
					<?php 
					if (@$dt[rombel_semester]== $semester)
					{
						$query=$con->query("select * from tbl_transkrip_sms1  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id 
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
						$no = 1;
						while ($row=$query->fetch_array())
						{	

						   	@$pp 		= ucwords(terbilang($nilai2));

						   	@$nilaiuts 		= $row[pts_sms1];
							@$nilaiuas  	= $row[pas_sms1];
							@$nilaiH 		= $row[nh_sms1];

							@$nilaiakhir  	= (($nilaiH * 4)+($nilaiuts * 2)+($nilaiuas * 2))/8;

								//$nBulat 	  = ($nilaiakhir*4)/100;
							$nBulat 		= round($nilaiakhir,1);
							$huruf    		= ucwords(terbilang($nBulat));
							
							if (($nBulat >= 88) and ($nBulat <= 100))
								{	
									@$predikat			="A";
									@$deskripsi 			="<b>Sangat baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasa";
								}else
								if (($nBulat >= 74) and ($nBulat<= 87 ))
								{	@$predikat			="B";
									@$deskripsi 		="<b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar" ;
								}else
								if (($nBulat >= 60) and ($nBulat <= 73))
								{	@$predikat			="C";
									@$deskripsi  		= "<b>Cukup</b>. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar";
								}else
								if (($nBulat < 60) and ($nBulat >= 1))
								{	@$predikat		="D";
									@$deskripsi 	= "<b>Sangat kurang</b>. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja. "; 
								}
								elseif ($nBulat == 0){
									@$predikat		="-";
									$deskripsi = "Nilai Belum Diisi";
								}


								@$nk 	= (@$row[nPraktik_sms1] + @$row[nProduk_sms1] + @$row[nProyek_sms1])/3;

								//$nBulat 	  = ($nilaiakhir*4)/100;
								$nKBulat 	  	= round($nk,1);
								$hurufK    		= ucwords(terbilang($nKBulat));
								if (($nk >= 88) and ($nk <= 100))
								{	
									@$predikatK			="A";
									@$deskripsiK 			="<b>Sangat Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
								}else
								if (($nk >= 74) and ($nk<= 87 ))
								{	@$predikatK			="B";
									@$deskripsiK 		="<b>Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
								}else
								if (($nk >= 60) and ($nk <= 73))
								{	@$predikatK			="C";
									@$deskripsiK  		= "<b>Kurang Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD";
								}else
								if (($nk < 60) and ($nk >= 1))
								{	@$predikatK		="D";
									@$deskripsiK 	= "<b>Tidak Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD"; 
								}
								elseif ($nk == 0){
									@$predikatK		="-";
									$deskripsiK = "Nilai Belum Diisi";
								}
						   
							echo"
								<tr>
									<td>$no</td>
									<td width='25%'>
										$row[mapel_nama]
									</td> 
									<td>$deskripsi</td>
										
									<td>
										$deskripsiK
									</td>
									
									
								
									
								</tr>
							";
							@$no++;
							@$jml = $jml+$nilai;
						}
					}
					
				
				
					?>
						
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12" align="left">
					
					<table class='table table-bordered' >
						<tr>
							<td>Penilaian Sikap</td>
						</tr>
					
					<?php 
					if (@$dt[rombel_semester]== $semester)
					{
						$query=$con->query("select deskS_sms1 from tbl_transkrip_sms1 where siswa_nis=$kode and rombel_id = $rombel and (mapel_id = 2 or mapel_id=1) ");

						while ($row=$query->fetch_array())
						{	
							echo"<tr>
									<td>$row[deskS_sms1]</td>
								</tr>";
						}
					}
						?>	
					
						
					</table>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-6" align="center">
				Orang Tua /Wali, <br><br><br><br>
				__________________
				</div>
				<div class="col-lg-6" align="center">
				Tasikmalaya, 14 Desember 2018<br>
				Wali Kelas,	<br><br><br>


				<?php
					echo"<u><b> $wl[guru_nama]</b></u>";
				?>
				</div>
				
			</div>


		</div>
	</div>
	</div>
	</div>

	</body>
</body>