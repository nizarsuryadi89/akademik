<?php
	error_reporting(0);
	@$kode 		= $_GET['nissiswa'];
	@$rombel    = $_GET[rombel];
	@$sms 		= $_GET[semester];
	include 	"fungsi_terbilang.php";
//	echo"select ekskul1,ekskul2,ekskul3 from tbl_transkrip_sms3 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel";
?>	
<head>
	<style>
		table 
		{ 
			font-family: Arial;
			font-size :13;
		 }
	</style>
</head>
<!--<body onload="window.print()"> -->


	<?php
		$semua = $con->query("select * from tbl_transkrip_sms1 where rombel_id=$rombel group by siswa_nis");
		
			$walikelas 	= $con->query("select * from tbl_rombel a inner join tbl_guru b 
										on a.rombel_wali = b.guru_id where rombel_id=$rombel ");
			$wl 		= $walikelas->fetch_assoc();


		if ($sms == 1)
		{
			$datasiswa 	= $con->query("select * from tbl_transkrip_sms1 a inner join tbl_siswa b 
										on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
											on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
		}
		elseif ($sms == 2)
		{
			$datasiswa 	= $con->query("select * from tbl_transkrip_sms2 a inner join tbl_siswa b 
										on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
											on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
		}
		elseif ($sms == 3)
		{
			$datasiswa 	= $con->query("select * from tbl_transkrip_sms3 a inner join tbl_siswa b 
										on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
											on a.rombel_id = c.rombel_id where b.siswa_nis = '$kode' ");
		}elseif ($sms == 4)
		{
			$datasiswa 	= $con->query("select * from tbl_transkrip_sms4 a inner join tbl_siswa b 
										on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
											on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
		}elseif ($sms == 5)
		{
			$datasiswa 	= $con->query("select * from tbl_transkrip_sms5 a inner join tbl_siswa b 
										on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
											on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
		}elseif ($semester == 6)
		{
			$datasiswa 	= $con->query("select * from tbl_transkrip_sms6 a inner join tbl_s\iswa b 
										on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
											on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
		}

				$dt 		= $datasiswa->fetch_assoc();

			?>
<br>
<table align="center" border='0'>
	<tr>
		<td  align="center"><img src="../assets/images/garuda.png" width="10%"></td>
	</tr>
</table> 
<table width="100%" border='0'>
	<tr valign="top">
		<td width="65%">
			<table border="0" width="100%">
				
				<tr>
					<td width="20%">Nama Sekolah</td><td>:</td><td><?php echo"$sk[nama_sekolah]";?></td>
				</tr>
				<tr>
					<td width="20%">Alamat</td><td>:</td><td><?php echo"$sk[alamat_sekolah]";?></td>
				</tr>
				<tr>
					<td width="30%">Nama</td> <td>:</td> <td><?PHP echo"$dt[siswa_nama]";?></td>
				</tr>
				<tr>
					<td width="20%">No Induk/NISN</td><td>:</td><td><?PHP echo"$dt[siswa_nis]";?>  / <?PHP echo"$dt[siswa_nisn]";?></td>
				</tr>
			</table>
		<td>
		<td width="35%">
			<table border="0" width="100%">
				<tr>
					<td width="30%">Kelas</td> <td>:</td> <td><?PHP echo"$dt[rombel_nama]";?></td>
				</tr>
				<tr>
					<td width="20%">Semester</td><td>:</td><td><?php echo"$ad[semester_id] - ($ad[semester_nama])";?> </td>
				</tr>
				<tr>
					<td width="20%">Tahun Ajaran</td><td>:</td><td><?php echo"$as[tahun_ajaran]";?></td>
				</tr>
			</table>
		<td>
	

	</tr>	
</table>
<br>
<table align="center" width="100%"> 	
	<tr>
		<td colspan="3" align="center"><h4><b>CAPAIAN HASIL BELAJAR</b></h4>
		<hr></td>
	</tr>
</table>
<table class='table table-bordered' >
<B>A. SIKAP SPIRITUAL DAN SOSIAL</B><br><br>
	<?php 
	if (@$sms== 1)
	{
		$query=$con->query("select deskS_sms1 from tbl_transkrip_sms1 where siswa_nis=$kode and rombel_id = $rombel and (mapel_id = 2 or mapel_id=1) ");
	}
	elseif (@$sms== 2)
	{
		$query=$con->query("select deskS_sms1 from tbl_transkrip_sms2 where siswa_nis='$kode' and rombel_id = $rombel and (mapel_id = 2 or mapel_id=1) ");
	}
	elseif (@$sms== 3)
	{
		$query=$con->query("select deskS_sms1 from tbl_transkrip_sms3 where siswa_nis='$kode' and rombel_id = $rombel and (mapel_id = 2 or mapel_id=1) ");
	}
		elseif (@$sms== 4)
	{
		$query=$con->query("select deskS_sms1 from tbl_transkrip_sms4 where siswa_nis='$kode' and rombel_id = $rombel and (mapel_id = 2 or mapel_id=1) ");
	}
		elseif (@$sms== 5)
	{
		$query=$con->query("select deskS_sms1 from tbl_transkrip_sms5 where siswa_nis='$kode' and rombel_id = $rombel and (mapel_id = 2 or mapel_id=1) ");
	}
		elseif (@$sms== 6)
	{
		$query=$con->query("select deskS_sms1 from tbl_transkrip_sms6 where siswa_nis='$kode' and rombel_id = $rombel and (mapel_id =2 or mapel_id=1) ");
	}

	while ($row=$query->fetch_array())
	{	
		echo"<tr>
				<td>$row[deskS_sms1]</td>
			</tr>";
	}

	?>	
	
		
	</table>			
		
	
<table class="table table-bordered" align="center">
	<b>B. PENGETAHUAN DAN KETERAMPILAN<b><br><br>
	<tr valign="middle">
		<th rowspan="2">No</th>
		<th rowspan="2">Kode / Mata Pelajaran</th>
		<th rowspan='2'>KKM</th>
		<th rowspan="2">% Kehadiran</th>
		<th colspan="2">Nilai Pengetahuan</th>
		<th colspan="2">Nilai Keterampilan</th>
		
		
			
	</tr>
	<tr>
		<th width="5%">Angka</th>
		
		<th width="5%">Predikat</th>
		<th width="5%">Angka</th>
		
		
		<th width="5%">Predikat</th>

	</tr>

				<?php 
					if (@$sms == 1)
					{
						$query=$con->query("select * from tbl_transkrip_sms1  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 2)
					{
						$query=$con->query("select * from tbl_transkrip_sms2  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 3)
					{
						$query=$con->query("select * from tbl_transkrip_sms3  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 4)
					{
						$query=$con->query("select * from tbl_transkrip_sms4  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 5)
					{
						$query=$con->query("select * from tbl_transkrip_sms5  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}elseif (@$sms == 6)
					{
						$query=$con->query("select * from tbl_transkrip_sms6  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
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
								if (($nBulat >= 74) and ($nBulat<= 87.9 ))
								{	@$predikat			="B";
									@$deskripsi 		="<b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar" ;
								}else
								if (($nBulat >= 60) and ($nBulat <= 73.9))
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


								@$nkk 	= (@$row[nPraktik_sms1] + @$row[nProduk_sms1] + @$row[nProyek_sms1])/3;

								//$nBulat 	  = ($nilaiakhir*4)/100;
								@$nk 	  	= round($nkk,1);
								@$hurufK    		= ucwords(terbilang($nk));

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
										$row[mapel_nama] <br> Nama Guru : $row[guru_nama]
									</td>
									<td>$row[kkm_sms1]</td>
									<td>$row[absen_sms1] %</td>
									<td>$nBulat</td>
									<td>$predikat</td>
									<td>$nk</td>
									<td>$predikatK</td>
								
									
								</tr>
							";
							@$no++;
							@$jml = @$jml+$nBulat;
						}
					
					
				
				?>
	<tr>
		<td colspan="3" align="right">Jumlah </td><td><?php echo "$jml"; ?></td><td colspan="5"></td>
	</tr>

</table>
				
<table class="table table-bordered">
	<b>C. PRAKTIK KERJA LAPANGAN</b><br><br>
	<tr>
		<td width="5%">No</td>
		<td width="30%">Mitra DU/DI</td>
		<td>Lokasi</td>
		<td>Lamanya <br>(Bulan)</td>
		<td>Keterangan</td>
	</tr>
	<tr>
		<td>1</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>2</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>3</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<hr>
<table class="table table-bordered">

<?php
	if ($sms == 1)
	{
		$t_ekskul=$con->query("select ekskul1,ekskul2,ekskul3 from tbl_transkrip_sms1 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel");	
	}
	elseif ($sms == 2)
	{
		$t_ekskul=$con->query("select ekskul1,ekskul2,ekskul3 from tbl_transkrip_sms2 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel");	
	
	}
	elseif ($sms == 3)
	{
		$t_ekskul=$con->query("select ekskul1,ekskul2,ekskul3 from tbl_transkrip_sms3 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel");	
	
	}
	elseif ($sms == 4)
	{
		$t_ekskul=$con->query("select ekskul1,ekskul2,ekskul3 from tbl_transkrip_sms4 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel");	
	
	}
	elseif ($sms == 5)
	{
		$t_ekskul=$con->query("select ekskul1,ekskul2,ekskul3 from tbl_transkrip_sms5 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel");	
	
	}
	elseif ($sms == 6)
	{
		$t_ekskul=$con->query("select ekskul1,ekskul2,ekskul3 from tbl_transkrip_sms6 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel");	
	}

	$eks 	 = $t_ekskul->fetch_assoc();	
?>
	<b>D. EKTRA KULIKULER</b><br><br>
	<tr>
		<td width="5%">No</td>
		<td width="30%">Kegiatan Ektra Kulikuler</td>
		<td>Keterangan</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Pramuka</td>
		
		<td>Melaksanakan Kegiatan Pramuka dengan <b><?php echo"$eks[ekskul1]";?></td>
	</tr>
	<tr>
		<td>2</td>
		<td>English Club</td>
		<td>Melaksanakan Kegiatan English Club dengan ......... <b><?php echo"$eks[ekskul2]";?></td>
		
	</tr>
	<tr>
		<td>3</td>
		<td>...............................</td>
		<td>Melaksanakan Kegiatan ................................. dengan <b><?php echo"$eks[ekskul3]";?></td>
	</tr>
</table>
<br>
<table class="table table-bordered">
	<b>E. PRESTASI YANG PERNAH DIRAIH</b><br><br>
	<tr>
		<td width="5%">No</td>
		<td width="30%">Jenis Prestasi</td>
		<td>Keterangan</td>
	</tr>
	<tr>
		<td>1</td>
		<td></td>
		
		<td></td>
	</tr>
	<tr>
		<td>2</td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td>3</td>
		<td></td>
		<td></td>
	</tr>
</table>
<br>
<table class="table table-bordered">
	<b>F. KETIDAKHADIRAN</b><br><br>
	<tr>
		<td width="5%">Sakit</td>
		<td width="30%">...........hari</td>
		
	</tr>
	<tr>
		<td width="5%">Izin</td>
		<td width="30%">...........hari</td>
		
	</tr>
	<tr>
		<td width="5%">Alfa</td>
		<td width="30%">...........hari</td>
		
	</tr>
</table>
<hr>
<table class="table table-bordered">
	<b>G. CATATAN WALI KELAS</b><br><br>
	<tr>
		<td width="100%">&nbsp;<br><br><br></td>
		
	</tr>
	</table>
<table class="table table-bordered">
	<b>H. TANGGAPAN ORANG TUA</b><br><br>
	<tr>
		<td width="100%">&nbsp;<br><br><br></td>
		
	</tr>
	</table>

<table class="table">
	<tr>
		<td align="center">
			Orang Tua /Wali, <br><br><br><br>
				__________________
		</td>
		<td align="center">	
			Wali Kelas,	<br><br><br><br>


			<?php
				echo"<u><b> $wl[guru_nama]</b></u>";
			?>
		</td>
	</tr>
</table>
<br><br>
<hr>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<table width="100%" border='0'>
	<tr valign="top">
		<td width="65%">
			<table border="0" width="100%">
				
				<tr>
					<td width="20%">Nama Sekolah</td><td>:</td><td><?php echo"$sk[nama_sekolah]";?></td>
				</tr>
				<tr>
					<td width="20%">Alamat</td><td>:</td><td><?php echo"$sk[alamat_sekolah]";?></td>
				</tr>
				<tr>
					<td width="30%">Nama</td> <td>:</td> <td><?PHP echo"$dt[siswa_nama]";?></td>
				</tr>
				<tr>
					<td width="20%">No Induk/NISN</td><td>:</td><td><?PHP echo"$dt[siswa_nis]";?>  / <?PHP echo"$dt[siswa_nisn]";?></td>
				</tr>
			</table>
		<td>
		<td width="35%">
			<table border="0" width="100%">
				<tr>
					<td width="30%">Kelas</td> <td>:</td> <td><?PHP echo"$dt[rombel_nama]";?></td>
				</tr>
				<tr>
					<td width="20%">Semester</td><td>:</td><td><?php echo"$ad[semester_id] - ($ad[semester_nama])";?> </td>
				</tr>
				<tr>
					<td width="20%">Tahun Ajaran</td><td>:</td><td><?php echo"$as[tahun_ajaran]";?></td>
				</tr>
			</table>
		<td>
	

	</tr>	
</table>
<hr>

<h3 align="center">DESKRIPSI NILAI</h3><br>
					<table class='table table-bordered' >
						<tr>
							<td width="5%">No</td>
							<td width="25%">Mata Pelajaran</td>
							<td width="35%">Deskripsi Pengetahuan</td>
							<td width="35%">Deskripsi Keterampilan</td>
						</tr>
					
					<?php 
					if (@$sms == 1)
					{
						$query=$con->query("select * from tbl_transkrip_sms1  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 2)
					{
						$query=$con->query("select * from tbl_transkrip_sms2  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 3)
					{
						$query=$con->query("select * from tbl_transkrip_sms3  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 4)
					{
						$query=$con->query("select * from tbl_transkrip_sms4  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
					elseif (@$sms == 5)
					{
						$query=$con->query("select * from tbl_transkrip_sms5  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}elseif (@$sms == 6)
					{
						$query=$con->query("select * from tbl_transkrip_sms6  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id inner join tbl_guru c 
											 	on a.guru_sms1 = c.guru_id  
												where siswa_nis=$kode and rombel_id = $rombel order by b.mapel_urut asc");
					}
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
					
					
				
				
					?>
						
					</table>
					
				
<table width="100%" align="center">
	<tr>
		<td colspan="2">
			<b>Keputusan :</b> <br>
			Berdasarkan hasil yang dicapai pada semester 1 dan 2 , peserta didik ditetapkan 
			<?php 
				if ($sms == 2)
				{
					echo"
					<br>Naik ke Kelas XI  (Sebelas)";
				}
			
				elseif ($sms == 4)
				{
					echo"<br>Naik ke Kelas XII  (Dua Belas)";
				}
			?>
			<br>Tinggal di  Kelas ............. (...........)<br><br>
		</td>

	</tr>
	<tr>
		<td align="center" width="50%">
			Orang Tua /Wali, <br><br><br><br>
				__________________
		</td>
		<td align="center">	
			Tasikmalaya, 21 Juni 2019 <br>Wali Kelas,	<br><br><br>


			<?php
				echo"<u><b> $wl[guru_nama]</b></u>";
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<br>Mengetahui, <br>
			Kepala Sekolah<br><br><br>

			<u><?php echo"$sk[nama_kepsek]";?></u><br>
			NIP. -
		</td>
	</tr>
</table>
