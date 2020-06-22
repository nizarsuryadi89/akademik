<head>
	 <link rel="stylesheet" type="text/css" href="style_table.css" />
    <link href="style.css" rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<?php
	$no 		= 1;
	$rombel 	= @$_GET[rombel];
	$peserta 	= $con->query("select * from tbl_pesertarombel a inner join 	
								tbl_siswa b on a.siswa_id=b.siswa_id
									where rombel_id=$rombel");

	$nmrombel   =$con->query("select rombel_nama, guru_nama from tbl_rombel a inner join tbl_guru b on a.rombel_wali = guru_id  where rombel_id = $rombel");
	$rob 		= $nmrombel->fetch_assoc() 
?>

<p>
	LEGGER KELAS <?PHP echo"$rob[rombel_nama] - Semester $ad[semester_nama] - TA  $as[tahun_ajaran]";?><br> 
	Wali Kelas :  <?php echo"$rob[guru_nama]";?>
		
</p>

<table class="laporan" border='1'>

	<tr>
		<th >No</th>
		
		<th width="20%">Identitas Siswa</th>
		
		<th >Aspek</th>
		
	
		<?php
			$pelajaran = $con->query("select * from tbl_mapelrombel a 
										inner join tbl_mapel b on a.mapel_id = b.mapel_id 
												where rombel_id=$rombel order by a.mapel_id asc");
			
			while ($data=$pelajaran->fetch_array())
			{
				

				@$kur		= $con->query("select kur_id  from tbl_rombel where rombel_id=$rombel");
				@$kk 		= $kur->fetch_assoc();

				@$kurikulum 	= $kk[kur_id];
			echo " 
				<th><a href='#' title='$data[mapel_nama] $data[mapel_id]'>$data[mapel_kode]</th>
				";
			}
		?>
		
		<th>Jumlah</th>
		<th>Total</th>
		
	</tr>

<?php
	$warna1 	= "#F0F8FF";   // baris genap berwarna hijau tua
	$warna2 	= "white";   // baris ganjil berwarna hijau muda
	$warna  	= $warna1;     // warna default
	while ($aa=$peserta->fetch_array())
	{
		if($warna == $warna1)
				{
					$warna = $warna2;
				}
				else 
				{
					$warna = $warna1;
				}

		@$siswa 	= $aa[siswa_id];
		
		echo"
		<tr bgcolor=$warna>"; ?>

		<td rowspan='2' valign="top"><?php echo "$no";?></td>
		
		<td rowspan='2'><?php echo "
			<b>NIS/NISN</b> 	: $aa[siswa_nis] / $aa[siswa_nisn] <br>
			<b>Nama Siswa</b>  : $aa[siswa_nama] / $aa[siswa_jk]<br>
			
			<b>TTL </b>		: $aa[siswa_tempatlahir], $aa[siswa_tanggallahir] <br>
			<b>Alamat </b>		: $aa[siswa_alamat]
		 ";?></td>
		
	
	<?php 
		
	?>
		<td align='center'>Pengetahuan</td>
		<?php
	
		
			$pelajaran = $con->query("select * from tbl_transkrip_sms1 
										where rombel_id=$rombel and siswa_nis=$aa[siswa_nis] order by mapel_id asc");

			while ($data=$pelajaran->fetch_array())
			{
				@$nilaiuts 	= $data[pts_sms1];
				@$nilaiuas  = $data[pas_sms1];
				@$nilaiH 	= $data[nh_sms1];

				@$nilaiakhir  = (($nilaiH * 4)+($nilaiuts * 2)+($nilaiuas * 2))/8;

				$angka4 	  = ($nilaiakhir*4)/100;
				$pengetahuan  = round($nilaiakhir,1);

				echo"<td align='center'>$pengetahuan</td>";

				@$jumlahh = @$jumlahh + $pengetahuan;
			}
			
			echo"<td align='center'>$jumlahh</td>";		
		?>
			
		
	</tr>
	

		<?php echo"<tr bgcolor=$warna>"; ?>
	
		<td align='center'>Keterampilan</td>
		<?php
			$pelajaran = $con->query("select * from tbl_transkrip_sms1 
										where rombel_id=$rombel and siswa_nis=$aa[siswa_nis] order by mapel_id asc");
			while ($data=$pelajaran->fetch_array())
			{
				@$nilaiakhir 	= (@$data[nPraktik_sms1] + @$data[nProduk_sms1] + @$data[nProyek_sms1])/3;

				//$nBulat 	  = ($nilaiakhir*4)/100;
				$keterampilan 	  = round($nilaiakhir,1);
			echo " 
				<td align='center'>$keterampilan</td>
				";
				@$jumlah = @$jumlah+$keterampilan;
			}
			$total = $jumlah+$jumlahh;
			echo"<td align='center'>$jumlah</td>";
		?>
		<td align="center"><?php echo"$total";?></td>
	</tr>
<?php
	//echo "<td></td>";
	$no++;
	}
	?>
	
</table>
<br>
<table width="100%">
	<tr>
		<td align="center">
			Mengetahui,<br>
			Kepala Sekolah,
			<br><br><br>
			<?php echo"$in[nama_kepsek]";?>
		</td>
		<td align="center">
			Tasikmalaya, _____ 2018<br>Wali Kelas
			<br><br><br>
			<?php echo"$rob[guru_nama]";?>
		</td>
	</tr>
</table>