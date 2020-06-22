
<?php
	@$sms   = $_GET[sms];

	if ($sms == '1')
	{
		$nilai = $con->query("select * from tbl_transkrip_sms1 a inner join
								 tbl_siswa b on a.siswa_nis=b.siswa_nis inner join 
								 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
								 		tbl_mapel d on a.mapel_id=d.mapel_id
								 			where a.siswa_nis = '$username' and rombel_semester=$sms order by mapel_urut asc");
		@$jml    = mysqli_num_rows($nilai);
	}else
	if ($sms == '2')
	{
		$nilai = $con->query("select * from tbl_transkrip_sms2 a inner join
								 tbl_siswa b on a.siswa_nis=b.siswa_nis inner join 
								 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
								 		tbl_mapel d on a.mapel_id=d.mapel_id
								 			where a.siswa_nis = '$username' and rombel_semester=$sms order by mapel_urut asc");
		@$jml    = mysqli_num_rows($nilai);
	}
	else
	if ($sms == '3')
	{
		$nilai = $con->query("select * from tbl_transkrip_sms3 a inner join
								 tbl_siswa b on a.siswa_nis=b.siswa_nis inner join 
								 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
								 		tbl_mapel d on a.mapel_id=d.mapel_id
								 			where a.siswa_nis = '$username' and rombel_semester=$sms order by mapel_urut asc");
		@$jml    = mysqli_num_rows($nilai);
	}
	else
	if ($sms == '4')
	{
		$nilai = $con->query("select * from tbl_transkrip_sms4 a inner join
								 tbl_siswa b on a.siswa_nis=b.siswa_nis inner join 
								 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
								 		tbl_mapel d on a.mapel_id=d.mapel_id
								 			where a.siswa_nis = '$username' and rombel_semester=$sms order by mapel_urut asc");
		@$jml    = mysqli_num_rows($nilai);
	}
	else
	if ($sms == '5')
	{
		$nilai = $con->query("select * from tbl_transkrip_sms5 a inner join
								 tbl_siswa b on a.siswa_nis=b.siswa_nis inner join 
								 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
								 		tbl_mapel d on a.mapel_id=d.mapel_id
								 			where a.siswa_nis = '$username' and rombel_semester=$sms order by mapel_urut asc");
		@$jml    = mysqli_num_rows($nilai);
	}
	else
	if ($sms == '6')
	{
		$nilai = $con->query("select * from tbl_transkrip_sms6 a inner join
								 tbl_siswa b on a.siswa_nis=b.siswa_nis inner join 
								 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
								 		tbl_mapel d on a.mapel_id=d.mapel_id
								 			where a.siswa_nis = '$username' and rombel_semester=$sms order by mapel_urut asc");
		@$jml    = mysqli_num_rows($nilai);
	}

?>
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"> Nilai Semester <?php echo "$sms"; ?></h3> 
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table width="100%" class="table table-striped table-bordered table-hover">
					<tr>
						<th rowspan="2" width="5%">No</th>
						<th rowspan="2" width="30%">Mata Pelajaran  (Nama Guru)</th>
						<th width="10%" rowspan="2" >Nilai Sikap</th>
						<th colspan="5">Nilai <br> Pengetahuan</th>
						<th colspan="4">Nilai Keterampilan</th>
					</tr>
					<tr>
						
						<th  width="5%">KH</th>
						<th  width="5%">NH</th>
						<th width="5%">PTS</th>
						<th  width="5%">PAS/PAT</th>
						<th  width="5%">Raport</th>
						<th width="5%">Praktik</th>
						<th  width="5%">Project</th>
						<th width="5%">Portopolio</th>
						<th width="5%">Raport</th>
					</tr>

			<?php
			if ($jml > 0)
			{
				$no = 1;
				while ($row=$nilai->fetch_array())
				{
					@$kkm = $con->query("select kkm, a.guru_id,b.guru_id, guru_nama from tbl_mapelrombel a 
											inner join tbl_guru b on a.guru_id=b.guru_id
												where mapel_id=$row[mapel_id] ");
					@$kk  = $kkm->fetch_assoc();
					@$kkk = $kk[kkm];


					$rs 		=$row['rombel_semester'];
					$harian		=$row['nh_sms1'];
					$uts		=$row['pts_sms1'];
					$uas		=$row['pas_sms1'];
							
					$na			=(($harian+$uts)+(2*$uas))/4;
					$raport		=round($na);

					$raportK 	= round(((@$row[nPraktik_sms1] + @$row[nProyek_sms1] + @$row[nProduk_sms1])/3),1);

					echo "<tr>
							<td>$no</td>
							<td><b>$row[mapel_nama]</b> <br> $kk[guru_nama]</td> 
						
							<td></td>
							<td>$row[absen_sms1]</td>
							<td>$row[nh_sms1]</td>
							<td>$row[pts_sms1]</td>
							<td>$row[pas_sms1]</td>
							<td>$raport</td>
							<td>$row[nPraktik_sms1]</td>
							<td>$row[nProyek_sms1]</td>
							<td>$row[nProduk_sms1]</td>
							<td>$raportK</td>
							

						";
					
				echo"</tr>";
					@$jmlhadir1  = $jmlhadir+$row[kehadiran];

					@$jmll1      = $jmlhadir/$jml;
					@$jmll 		 = round($jmll1,2);
					@$rtrt      = $rtrt+$row[nh1];
					@$rt         = round(($rtrt/$jml),2);
					@$ptss		= $ptss+$uts;
					@$pts 		= round(($ptss/$jml),2);
					@$patt 		= $patt+$uas;
					@$pat 		= round(($patt/$jml),2);
					@$rpt 		= $rpt+$raport;
					@$raportt	= round(($rpt/$jml),2);

					$no++;
				}
				echo "<tr>
						<th colspan='2'>Jumlah</th>
						<th>$jmll </th>
						<th>$rt</th>
						<th>$pts</th>
						<th>$pat</th>
						<th>$raportt</th>
					  </tr>";
			}else
			{
				echo "<tr><td colspan='12' align='center'><h4> Data Masih Kosong <h4></td></tr>";
			}
				
			

			?>
				
				</table>
			</div>
		</div>
	</div>
	</div>

