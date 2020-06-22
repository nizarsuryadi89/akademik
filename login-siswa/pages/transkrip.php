<?php
	@$sms   = $_GET[sms];
	$nilai = $con->query("select * from tbl_nilaipengetahuan a inner join
							 tbl_siswa b on a.siswa_id=b.siswa_id inner join 
							 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
							 		tbl_mapel d on a.mapel_id=d.mapel_id
							 			where siswa_nis = '$username' and rombel_semester=$sms order by mapel_urut asc");
	@$jml    = mysqli_num_rows($nilai);


?>
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"> Nilai Semester <?php echo "$sms"; ?></h3> 
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table width="100%" class="table table-striped table-bordered table-hover">
					<tr>
						<th width="5%">No</th>
						<th width="40%">Mata Pelajaran <br> (Nama Guru)</th>
						<th width="10%">Kehadiran</th>
						<th width="10%">NH</th>
						<th width="10%">PTS</th>
						<th width="10%">PAS/PAT</th>
						<th width="10%">Raport</th>
					</tr>
			<?php
				$no = 1;
				while ($row=$nilai->fetch_array())
				{
					@$kkm = $con->query("select kkm, a.guru_id,b.guru_id, guru_nama from tbl_mapelrombel a 
											inner join tbl_guru b on a.guru_id=b.guru_id
												where mapel_id=$row[mapel_id] ");
					@$kk  = $kkm->fetch_assoc();
					@$kkk = $kk[kkm];


					$rs 		=$row['rombel_semester'];
					$harian		=$row['nh1'];
					$uts		=$row['nilai_uts'];
					$uas		=$row['nilai_uas'];
							
					$na			=(($harian+$uts)+(2*$uas))/4;
					$raport		=round($na);
					echo "<tr>
							<td>$no</td>
							<td><b>$row[mapel_nama]</b> <br> $kk[guru_nama]</td> 
						
							
							<td>$row[kehadiran]</td>
							<td>$row[nh1]</td>
							<td>$row[nilai_uts]</td>
							<td>$row[nilai_uas]</td>

						";
					if ($raport < $kkk)
					{
						echo "<td><font color='red'>$raport</td>";
					}else
					{
						echo "<td>$raport</td>";
					}
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

			?>
				
				</table>
			</div>
		</div>
	</div>
	</div>

