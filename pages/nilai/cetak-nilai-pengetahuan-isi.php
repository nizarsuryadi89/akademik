<head>
	 <link rel="stylesheet" type="text/css" href="style_table.css" />
    <link href="style.css" rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<?php
	//error_reporting(0);
	@$semester 	=$_GET['semester'];
	@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombel-kd'];
	@$kur 		=$_GET['kur-id'];
	@$mapelkd 	=$_GET['mapelrombel'];
	@$guru 		=$_GET['guru'];


//	echo"$guru";
	include "query_semester.php";


	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
	//assoc
	@$hasil	 	= $con->query($query); 
	@$aa		= $hasil->fetch_assoc();

	
		
?>
		<table border='0' width='100%'>
			<tr>
				<td width='20%' align='center'>
					<img src='../assets/images/jabar.png' width="50%">
				</td>
				<td width='60%' align='center'>
					LEMBAGA PENDIDIKAN MA’ARIF NU <br>
					SEKOLAH MENENGAH KEJURUAN NAHDLATUL ULAMA <br>
					“SK Dinas Pendidikan No. 421.5/1628/Dikmen <br>
					Jalan Argasari No. 31 Telp ( 0265 ) 313275<br>
					email : smknu_kotatasik@yahoo.co.id Tasikmalaya 4612
					
				</td>
				<td width='20%' align='center'>
					<img src='../assets/images/smk.png' width="50%">
				</td>
			</tr>
		</table>
		<hr>
		<center>NILAI PENGETAHUAN <br> SEMESTER <?php echo"$ad[semester_nama]"; ?> TAHUN AJARAN <?php echo"$as[tahun_ajaran]"; ?></center><br>
				Mata Pelajaran :<?php echo"$aa[mapel_nama] - KKM: $aa[kkm] <br>

				Nama Guru :  $aa[guru_nama] "; ?>
				    
			
	
			<table border='1' class='laporan' width='100%'>
				
					<tr valign='middle'>
						<th >No</th>
						<th  width="10%">NIS</th>
						<th  width="30%">Nama Siswa</th>
						<th  width="5%">L/P</th>
						
						
						<th  width="5%">Kehadiran</th>
						<th width="10%">Nilai Harian (Bobot 4)</th>
						<th width="10%">Nilai PTS (Bobot 2)</th>
					
						<th width="10%">PAT/PAS (Bobot 2)</th>
						
						<th >Nilai Akhir</th>
						<th >Predikat</th>
					
						
					</tr>	
					
				

<?php						
	if ($jumlah <> 0)
		{											
			while($row= $result->fetch_array())
			{
				$rs 		=$row['rombel_semester'];
				//$jml_kd 	= $con->query("select jml_kd from tbl_mapelrombel where mapelrombel_id = $mapelkd");
				//$jml 		= $jml_kd->fetch_assoc();

				//echo" $mapelkd $jml[jml_kd]";
				@$kkm		=$aa['kkm'];
				
				@$nilaiuts 	= $row[pts_sms1];
				@$nilaiuas  = $row[pas_sms1];
				@$nilaiH 	= $row[nh_sms1];

				@$nilaiakhir  = (($nilaiH * 4)+($nilaiuts * 2)+($nilaiuas * 2))/8;

				$angka4 	  = ($nilaiakhir*4)/100;
				$k13 		  = round($angka4,2);

				
				if (($nilaiakhir >= 88) and ($nilaiakhir <= 100))
				{	
					@$predikat			="A";
					@$deskripsi 			="<b>Sangat baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar";
				}else
				if (($nilaiakhir >= 74) and ($nilaiakhir<= 87 ))
				{	@$predikat			="B";
					@$deskripsi 		="<b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar" ;
				}else
				if (($nilaiakhir >= 60) and ($nilaiakhir <= 73))
				{	@$predikat			="C";
					@$deskripsi  		= "<b>Cukup</b>. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar";
				}else
				if (($nilaiakhir < 60) and ($nilaiakhir >= 1))
				{	@$predikat		="D";
					@$deskripsi 	= "<b>Sangat kurang</b>. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja. "; 
				}
				elseif ($nilaiakhir == 0){
					@$predikat		="-";
					$deskripsi = "Nilai Belum Diisi";
				}

				//$deskripsi = substr($deskripsi, 0,20);
				echo"
				<form action='' method='POST'>
				
					<tr>
						<td align='center'>$no</td>
						<td>$row[siswa_nis]</td>
						<td align='left'>
							$row[siswa_nama]
						</td>
						<td align='center'>$row[siswa_jk]</td>
						<td align='center'>$row[absen_sms1]</td>
					
						<td align='center'>
				
							
							$row[nh_sms1]</td>
						<td align='center'>$row[pts_sms1]</td>
						<td align='center'>$row[pas_sms1]</td>
						<td align='center'>$nilaiakhir
							
							
						</td>
						<td align='center'><b>$predikat</b></td>
					
						
						
						</td>
								
					</tr>
				
			</form>

				";
			$no++;
			}
			
		}else
		{
			echo"<tr><td colspan='10' align='center'>
				<a href='?page=input-siswa&mapel-kd=$kode&rombel-kd=$rombel&guru=$guru&kkm=75&semester=$semester'><button class='btn btn-primary'>Input Siswa</button></a></td></tr>";
		}

			echo"
			

			</table>";
		?>

	Keterangan : <br>
	A : <b>Sangat baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar <br>
	B : <b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar <br>
	C : <b>Cukup</b>. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar<br>
	D : <b>Sangat kurang</b>. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja.<br>

	<br><br>
	<table width="100%" align="center">
		<tr>
			<td align="center">
				Mengetahui,<br>
				Kepala SMKNU <br><br><br>
				Asep Susanto, S.Ag., M.Pd.I
			</td>
			<td align="center">
				Tasikmalaya, Juni 2019<br>
				Guru Mata Pelajaran <br><br><br>
				___________________________
			</td>
		</tr>
	</table>




