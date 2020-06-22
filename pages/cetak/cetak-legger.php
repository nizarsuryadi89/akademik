<head>
	<style>
		{
			position: absolute;
			top: 60px
			-moz-transform:rotate(-90deg);
			-webkit-transform:rotate(-90deg);
			-o-transform:rotate(-90deg);
			-ms-transform:(-90deg);

		}
	</style>
</head>
<?php
	$no 		= 1;
	$rombel 	= @$_GET[rombel];
	$peserta 	= $con->query("select * from tbl_pesertarombel a inner join 	
								tbl_siswa b on a.siswa_id=b.siswa_id
									where rombel_id=$rombel");

	$rom 	= $con->query("select rombel_nama, b.guru_nama from tbl_rombel a inner join tbl_guru b on 
								a.rombel_wali = b.guru_id 
									where rombel_id=$rombel");
	$rm 		= $rom->fetch_assoc();

	@$rmm 		= $rm[rombel_nama];
	@$wali 		= $rm[guru_nama];
?>
<body onload="window.print()">
<div class="col-md-12">
	
	<?php
		include "cover.php";
	?>
	
	<h4>Legger Kelas <?php echo "$rmm";?></h4>
		
		<table class="table table-bordered">
			<thead>
			<tr bgcolor='lightgrey' align="top">
				<td >No</th>
				<th width="20%">Identitas Siswa</th>
				<td >JK</th>
				<td >Aspek</th>
				
			
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
						<td>$data[mapel_nama] ($data[mapel_kode])</th>
						";
					}
				?>
				
				
				
			</tr>
			</thead>
		<?php
			while ($aa=$peserta->fetch_array())
			{
				@$siswa 	= $aa[siswa_id];
				
		?>
			<tr>
				<td rowspan='3'><?php echo "$no";?></td>
				
				<td rowspan='3'><?php echo "
					$aa[siswa_nama] <br>
					$aa[siswa_nis] / $aa[siswa_nisn] <br>
					$aa[siswa_tempatlahir], $aa[siswa_tanggallahir] <br>
					$aa[siswa_alamat]
				 ";?></td>
				<td rowspan='3'><?php echo "$aa[siswa_jk]";?></td>
			
			<?php 
				if ($kurikulum == 1)
				{
					echo "<td>Nilai</td>";
				}else{
			?>
				<td>Pengetahuan</td>
				<?php
			}
					$pelajaran = $con->query("select * from tbl_nilaipengetahuan 
												where rombel_id=$rombel and siswa_id=$siswa order by mapel_id asc");

					while ($data=$pelajaran->fetch_array())
					{
						@$rs 		=$data[rombel_semester];
						@$harian	=$data[nh1];
						@$uts		=$data[nilai_uts];
						@$uas		=$data[nilai_uas];
						@$kkm		=$data[kkm];
						
						if (@$kurikulum == 1)
						{
							@$na		=(($harian+$uts)+(2*$uas))/4;
							@$raport	=round($na);
						}elseif (@$kurikulum == 2)
						{
							@$nilaiakhir  = (($harian * 4)+($uts * 2)+($uas * 2))/8;
							@$raport	=round($nilaiakhir);
						}
					echo " 
						<td > $raport</td>
						
						
						";
						@$jumlah = $jumlah+$raport;

					}
					
							
				?>
					
				
			</tr>
			
			<tr>
			<?php 
				if ($kurikulum == 2)
				{
			?>
				<td>Keterampilan</td>
				<?php
					$pelajaran = $con->query("select * from tbl_keterampilan 
												where rombel_id=$rombel and siswa_id=$siswa order by mapel_id asc");
					while ($data=$pelajaran->fetch_array())
					{
						@$nraport 	= $con->query("select greatest(proses,produk,proyek) as max from tbl_keterampilan where nilai_id=$data[nilai_id]");
						@$nr 		= $nraport->fetch_assoc();
						@$max 		= $nr[max];
					echo " 
						<td>$data[proses]</td>
						";
					}
				}
				?>
			</tr>
			<tr>
			<?php 
				if ($kurikulum == 2)
				{
			?>
				<td>Sikap</td>
				<?php
					$pelajaran = $con->query("select * from tbl_mapelrombel a 
												inner join tbl_mapel b on a.mapel_id = b.mapel_id 
														where rombel_id=$rombel");
					while ($data=$pelajaran->fetch_array())
					{

					echo " 
						<td></td>
						";
					}
				}
				?>
			</tr>

			
		<?php
			//echo "<td></td>";
			$no++;
			}
			?>
		</table>
		<br>
		<table width="100%" border='0'>
			<tr>
				<td align="center">Mengetahui <br>Kepala SMK NU <br><br><u><b>Asep Susanto, S.Ag., M.Pd.I</u></b></td>
				<td align="center">Mengetahui <br>Wali Kelas <?php echo "$rmm";?><br><br><u><b><?php echo "$wali";?></u></b></td>
			</tr>
		</table>
		
	
</body>
