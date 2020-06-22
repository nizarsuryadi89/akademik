						
<table class="table table-striped table-bordered" align="center">
	<tr><th colspan="4">DESKRIPSI NILAI</th></tr>
	<tr>
		<td width="5%">No</td>
		<td>Mata Pelajaran</td>
		<td>Deskripsi Pengetahuan</td>
		<td>Deskripsi Keterampilan</td>
	</tr>

<?php 
if (@$dt[rombel_semester]== 1)
{
	$query=$con->query("select * from tbl_transkrip  a inner join
						 tbl_mapel b on a.mapel_id=b.mapel_id 
							where siswa_nis=$kode and rombel_id = $rombel order by a.mapel_id asc ");
	$no = 1;
	while ($data=$query->fetch_array())
	{	

	  // $guru = $con->query("select guru_nama where ")

	   	@$nilai = $data[sms_2];
	   	@$kk    = ucwords(terbilang($nilai));

	   	if (($nilai>=90) and ($nilai <=100))
		{$huruf		="A";}else
		if (($nilai>=80) and ($nilai<=89.9))
		{$huruf		="B";}else
		if (($nilai>=70) and ($nilai<=79.9))
		{$huruf		="C";}else
		if (($nilai>=60) and ($nilai<=69.9))
		{$huruf		="D";}else
		if (($nilai<=59.9)and ($nilai>=1))
		{$huruf	="E";}else{$huruf="-";}


	   
		echo"
			<tr>
				<td>$no</td>
				<td width='25%'>
					$data[mapel_nama]
				</td> 
				<td>$data[desk_pengetahuan_sms]</td>
					
				<td>
				$data[desk_keterampilan_sms2]
				</td>
				
				
			
				
			</tr>
		";
		@$no++;
		@$jml = $jml+$nilai;
	}
}


		$nilaisikap 	= $con->query("select * from tbl_transkrip 
									where siswa_nis ='$kode' and rombel_id = $rombel");

		$ns = $nilaisikap->fetch_array();
?>
	
</table >
	<hr>
<table class='table table-bordered  table-striped '>
	<tr>
		<th colspan="2">Deskripsi Sikap</th>
	</tr>

	<tr>
		<td><?php echo "$ns[desk_sikap_sms2]";?></td>
	</tr>
</table>
<table width="100%" align='center' border='0'>
	<tr>
		<td width="30%" align='center'><br><br><br><br><br>Orang Tua /Wali, <br><br><br><br>
				__________________
					
		</td>
		<td width="30%" align='center'><br><br><br><br><br>
			Wali Kelas, 16 Desember 2017<br><br><br><br>
			<?php
			echo"<u><b> $wl[guru_nama]</b></u>";
			?>
		</td>
		
	</tr>
</table>
<br>
 &nbsp; *)coret yang tidak perlu