<?php 
	//error_reporting(0);
	@$semester 	=$_GET['semester'];
	@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombel-kd'];
	@$kur 		=$_GET['kur-id'];
	@$mapelkd 	=$_GET['mapelrombel'];
	@$guru 		=$_GET['guru'];
	include "query_semester.php";
	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
	//assoc
	@$hasil	 	= $con->query($query); 
	@$aa		= $hasil->fetch_assoc();
?>
<table  class="table table-bordered" >
	<tr valign='middle'>
		<th rowspan='2' width="5%">No</th>
		<th rowspan='2' width="10%">NIS</th>
		<th rowspan='2' width="20%">Nama Siswa</th>
		
		
		<th rowspan='2' width="5%">% Kehadiran</th>
		
		<th colspan='3'>Kriteris Nilai Pengetahuan</th>
		<th rowspan='2'>Nilai Akhir</th>
		<th rowspan='2'>Ket</th>
	
		
	</tr>	
	<tr>
		<th width="10%">Nilai Harian (Bobot 4)</th>
		<th width="10%">Nilai PTS (Bobot 2)</th>
	
		<th width="10%">PAT/PAS (Bobot 2)</th>
		
		
		
	</tr>

	<?php 
		while($row=$result->fetch_array())
		{
			echo"<tr>
				<td>$no</td>
				<td>$row[siswa_nis]</td>
				<td>$row[siswa_nama] ($row[siswa_jk]) <br>
							 <br></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				
			</tr>";
			$no++;
		}
	?>
</table>
	