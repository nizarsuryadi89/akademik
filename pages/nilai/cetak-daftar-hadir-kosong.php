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
				<td width='10%' align='center'>
					<img src='../img/jabar.png' width="50%">
				</td>
				<td width='60%' align='center'>
					LEMBAGA PENDIDIKAN MA’ARIF NU <br>
					SEKOLAH MENENGAH KEJURUAN NAHDLATUL ULAMA <br>
					“SK Dinas Pendidikan No. 421.5/1628/Dikmen <br>
					Jalan Argasari No. 31 Telp ( 0265 ) 313275 &nbsp;
					email : smknu_kotatasik@yahoo.co.id Tasikmalaya 4612
					
				</td>
				<td width='10%' align='center'>
					<img src='../img/smk.png' width="50%">
				</td>
			</tr>
		</table>
		<hr>
		<center><b>NILAI HADIR <br> SEMESTER <?php echo"$ad[semester_nama]"; ?> TAHUN AJARAN <?php echo"$as[tahun_ajaran]"; ?></center></b><br>
				Mata Pelajaran :<?php echo"$aa[mapel_nama] - KKM: $aa[kkm] <br>

				Nama Guru :  $aa[guru_nama] "; ?>
				    
			
	
			<table border='1' class='laporan2' width='100%'>
				
					<tr valign='middle'>
						<th ROWSPAN='3'>No</th>
						<th ROWSPAN='3' width="5%">NIS</th>
						<th ROWSPAN='3' width="25%">Nama Siswa</th>
						<th ROWSPAN='3' width="5%">L/P</th>
						
						
						<th  COLSPAN='15' >PERTEMUAN KE / TANGGAL</th>	
						<th  ROWSPAN='3' width="10%" >%Kehadiran</th>	
					</tr>
                    <tr valign='middle'>
						<th >1</th>
						<th >2</th>
						<th >3</th>
						<th >4</th>
						<th >5</th>
						<th >6</th>
						<th >7</th>
						<th >8</th>
						<th >9</th>
						<th >10</th>
						<th >11</th>
						<th >12</th>
						<th >13</th>
						<th >14</th>
						<th >15</th>
					</tr>	
                    <tr valign='middle'>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						
					
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
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					
					
						
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

	

	<br><br>
	<table width="100%" align="center">
		<tr>
			<td align="center">
				Mengetahui,<br>
				Kepala SMKNU <br><br><br>
				Asep Susanto, S.Ag., M.Pd.I
			</td>
			<td align="center">
				Tasikmalaya, Juli 2019<br>
				Guru Mata Pelajaran <br><br><br>
				<?php echo" $aa[guru_nama]";  ?>
			</td>
		</tr>
	</table>




