

			
<table class="table table-striped table-bordered" align="center">
	<thead>
		<tr valign="middle">
			<th rowspan="2">No</th>
			<th rowspan="2">Kode / Mata Pelajaran</th>
			<th rowspan="2">KKM</th>
		
			<th colspan="3">Nilai Pengetahuan</th>
			<th colspan="3">Nilai Keterampilan</th>
			
			
				
		</tr>
		<tr>
			<th>Angka</th>
			<th>huruf</th>
			<th>Predikat</th>
			<th>Angka</th>
			<th>huruf</th>
			<th>Predikat</th>
		</tr>
	</thead>
	<tbody>
<?php 
if (@$dt[rombel_semester]==1)
{
	$query=$con->query("select * from tbl_transkrip  a inner join
						 tbl_mapel b on a.mapel_id=b.mapel_id 
							where siswa_nis=$kode and rombel_id = $rombel order by a.mapel_id asc");
	$no = 1;
	while ($data=$query->fetch_array())
	{	

	  // $guru = $con->query("select guru_nama where ")

	   	@$nilai 	= $data[sms_2];
	   	@$kk    	= ucwords(terbilang($nilai));
	   	@$nilai2	= $data[keterampilan_sms2];
	   	@$pp 		= ucwords(terbilang($nilai2));

	   	$angka4 	  = ($nilai*4)/100;
		$k13 		  = round($angka4,2);
	   	if (($k13>=3.85) and ($k13 <=4.00))
			{	
				@$predikat1			="A";
				
			}else
			if (($k13>=3.51) and ($k13<=3.84))
			{	@$predikat1			="A-";
				
			}else
			if (($k13>=3.18) and ($k13<=3.50))
			{	@$predikat1			="B+";
				
			}else
			if (($k13>=2.85) and ($k13<=3.17))
			{	@$predikat1		="B";
				
			}else
			if (($k13>=2.51) and ($k13<=2.84))
			{	@$predikat1		="B-";
				
			}else
			if (($k13>=2.18) and ($k13<=2.50))
			{	@$predikat1		= "C+";
				
			}else
			if (($k13>=1.85) and ($k13<=2.17))
			{	@$predikat1		="C";
				
			}else
			if (($k13>=1.51) and ($k13<=1.84))
			{	@$predikat1		="C-";
				
			}else
			if (($k13>=1.18) and ($k13<=1.50))
			{	@$predikat1		="D+";
				
			}else
			if (($k13>=1.00) and ($k13<=1.17))
			{	@$predikat1		="D";
				
			}else
			{
				@$predikat1		="E";
				
			}


		$angka4 	  = ($nilai2*4)/100;
		$k13 		  = round($angka4,2);
	   	if (($k13>=3.85) and ($k13 <=4.00))
			{	
				@$predikat2			="A";
				
			}else
			if (($k13>=3.51) and ($k13<=3.84))
			{	@$predikat2			="A-";
				
			}else
			if (($k13>=3.18) and ($k13<=3.50))
			{	@$predikat2			="B+";
				
			}else
			if (($k13>=2.85) and ($k13<=3.17))
			{	@$predikat2		="B";
				
			}else
			if (($k13>=2.51) and ($k13<=2.84))
			{	@$predikat2		="B-";
				
			}else
			if (($k13>=2.18) and ($k13<=2.50))
			{	@$predikat2		= "C+";
				
			}else
			if (($k13>=1.85) and ($k13<=2.17))
			{	@$predikat2		="C";
				
			}else
			if (($k13>=1.51) and ($k13<=1.84))
			{	@$predikat2		="C-";
				
			}else
			if (($k13>=1.18) and ($k13<=1.50))
			{	@$predikat2		="D+";
				
			}else
			if (($k13>=1.00) and ($k13<=1.17))
			{	@$predikat2		="D";
				
			}else
			{
				@$predikat2		="E";
				
			}

	   
		echo"
			<tr>
				<td>$no</td>
				<td>
					$data[mapel_kode] <br>
					$data[mapel_nama] 
				</td>
				<td>70</td>
			
				
				<td>$data[sms_2]</td>
				<td>$kk</td>
				<td>$predikat1</td>
				<td>$data[keterampilan_sms2]</td>
				<td>$pp</td>
				<td>$predikat2</td>
			
				
			</tr>
		";
		@$no++;
		@$jml = $jml+$nilai;
	}
}


?>
	<tr>
		<td colspan="3" align="center">Jumlah </td><td><?php echo "$jml"; ?></td><td colspan="5"></td>
	</tr>
	</tbody>
</table>
<table>

</table>				
				

<table class="table table-bordered">
	<tr>
		<th colspan="4">Kegiatan Ektra Kulikuler</th>
	</tr>
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
<br><br>
<table width="100%" align='right' border='0'>
	<tr>
		<td width="30%"></td>
		<td width="30%" align='center'>	
			Tasikmalaya, 9 Juni 2018<br>
			Wali Kelas,<br><br><br>
			<?php
			echo"<u><b> $wl[guru_nama]</b></u>";
			?>
		</td>
	</tr>
</table>
<hr>