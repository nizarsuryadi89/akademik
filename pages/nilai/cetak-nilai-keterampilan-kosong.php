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
					<img src='../img/jabar.png' width="50%">
				</td>
				<td width='60%' align='center'>
					LEMBAGA PENDIDIKAN MA’ARIF NU <br>
					SEKOLAH MENENGAH KEJURUAN NAHDLATUL ULAMA <br>
					“SK Dinas Pendidikan No. 421.5/1628/Dikmen <br>
					Jalan Argasari No. 31 Telp ( 0265 ) 313275<br>
					email : smknu_kotatasik@yahoo.co.id Tasikmalaya 4612
					
				</td>
				<td width='20%' align='center'>
					<img src='../img/smk.png' width="50%">
				</td>
			</tr>
		</table>
		<hr>
		<center><b>NILAI KETERAMPILAN <br> SEMESTER <?php echo"$ad[semester_nama]"; ?> TAHUN AJARAN <?php echo"$as[tahun_ajaran]"; ?></center></b><br>
				Mata Pelajaran :<?php echo"$aa[mapel_nama] - KKM: $aa[kkm] <br>

				Nama Guru :  $aa[guru_nama] "; ?>
				    
			
	
			<table border='1' class='laporan' width='100%'>
				
					<tr valign='middle'>
						<th >No</th>
						<th  width="10%">NIS</th>
						<th  width="30%">Nama Siswa</th>
						<th  width="5%">L/P</th>
						
						
						<th  width="5%">PRAKTIK</th>
						<th width="10%">PRODUK</th>
						<th width="10%">PROYEK</th>
					
						
						<th >Nilai Raport</th>
						<th >Predikat</th>
					
						
					</tr>	
					
				

<?php						
	if ($jumlah <> 0)
		{											
			while($row= $result->fetch_array())
			{
				

			echo"	
				<tbody>
					<tr class='odd gradeX'>
                        <td align='center'>$no</td>
                        <td>$row[siswa_nis]</td>
                        <td align='left'>$row[siswa_nama]</td>
                        <td align='center'>$row[siswa_jk]</td>
							
					
						<td align='center'>
						    
						</td>
						<td align='center'>
						
						</td>
						<td align='center'>
					
						</td>	
								
						<td align='center'><b></b>
						
						</td>
						<td align='center'></td>
						
					</tr>

				</tbody>
				";
			$no++;
			}
			
		}else
		{
			
		}

			echo"
			

			</table>";
		?>

	Keterangan : <br>
	A : <b>Sangat Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD<br>
	B : <b>Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD<br>
	C : <b>Kurang Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD<br>
	D : <b>Tidak Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD<br>

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




