<?php
	@$kode 		= $_GET['nis'];
	@$rombel    = $_GET['rombel-kode'];
	//@$datasiswa = $con->query("select * from tbl_transkrip where rombel_id=$rombel");
	//$dtsiswa 	= $datasiswa->fetch_assoc();
	//@$nis 		= $dtsiswa[siswa_nis];
	include 	"fungsi_terbilang.php";
?>

	<iframe src="<?php echo"cetak/print-raport-pat.php?nis=$kode";?>" style="display:none;" name="frame"></iframe>
	<a href="?page=data-rombel"><button class="btn btn-default btn-sm" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</button></a>	
	<button type="button" class="btn btn-default btn-sm" onClick="frames['frame'].print()" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-print"></i> Cetak</button>
		
<body>
	<?php
		$semua = $con->query("select * from tbl_transkrip where rombel_id=$rombel group by siswa_nis");
		while ($req = $semua->fetch_array())
		{
			$walikelas 	= $con->query("select * from tbl_rombel a inner join tbl_guru b 
										on a.rombel_wali = b.guru_id where rombel_id=$rombel");
			$wl 		= $walikelas->fetch_assoc();
	?>
	<div class="container">
		<div class="row">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<div class="col-lg-12">
					<table width="100%" align="center">
						<tr>
							<td align="center">
								<img src="../assets/images/jabar.png" width="90" height="140">
							</td>
							<td align="center">
								<h4>Lembaga Pendidikan Ma'Arif NU <br>
								Sekolah Menengah Kejuruan Nahdlatul Ulama SMK NU<br>
								SK Dinas Pendidikan No. 421.5/1628/Dikmen
								</h4>
								Jalan Argasari No. 31 Telp (0265) 313275 <br>
								email : smknu_kotatasik@yahoo.co.id<br>
								Tasikmalaya 46122
								
							</td>
							<td align="center">
								<img src="../assets/images/smk.png" width="120" height="120">
							</td>
						</tr>
					</table>
					<hr>
				</div>
			
			
	
			<div class="row">
	
			
		
				<div class="col-lg-12" align="center">	
					<h3><u>LAPORAN HASIL BELAJAR</u></h3>
					PENILAIAN AKHIR TAHUN TA. 2016-2017
				</div>
				<br>
			</div>
			<br><br>
			<?php
				$datasiswa 	= $con->query("select * from tbl_transkrip a inner join tbl_siswa b 
											on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
												on a.rombel_id = c.rombel_id where  b.siswa_nis = $req[siswa_nis]");
				$dt 		= $datasiswa->fetch_assoc();

			?>
			<div class="row">

				<div class="col-lg-3">	
					<P>	Nama Siswa : <?PHP echo"$dt[siswa_nama]";?></P>
					<P>	NIS        : <?PHP echo"$dt[siswa_nis]";?></P>
					<P>	NISN        : <?PHP echo"$dt[siswa_nisn]";?></P>
				</div>
				
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3" align="left">	
					<P>	Kelas		 : <?PHP echo"$dt[rombel_nama]";?></P>
					<P>	Semester        : <?PHP echo"$dt[rombel_semester]";?></P>
					<P>	Tahun Pelajaran        : <?PHP echo"";?></P>
				</div>

					
			</div>
		
	
			<div class="row">
			<div class="col-lg-12" align="center">
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" align="center">
						<thead>
							<tr valign="middle">
								<th rowspan="2">No</th>
								<th rowspan="2">Mata Pelajaran</th>
								<th rowspan="2">KKM</th>
								<th rowspan="2">% Kehadiran</th>
								<th colspan="3">Nilai</th>
								<th rowspan="2">Ketercapaian<br>Kompetensi</th>
									
							</tr>
							<tr>
								<th>Angka</th>
								
								<th>huruf</th>
								<th>Predikat</th>
							</tr>
						</thead>
						<tbody>
				<?php 
					if (@$dt[rombel_semester]==2)
					{
						$query=$con->query("select a.sms_2, a.kkm_sms2, a.kehadiran_sms2, d.mapel_nama, e.guru_nama
												from tbl_transkrip a inner join tbl_siswa b 
													on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
														on a.rombel_id = c.rombel_id inner join tbl_mapel d
															on a.mapel_id=d.mapel_id inner join tbl_guru e 
																on a.guru_sms2 =e.guru_id 
														 		where a.siswa_nis=$req[siswa_nis] order by mapel_urut asc");
						$no = 1;
						while ($data=$query->fetch_array())
						{	
						   if (@$data[sms_2] < @$data[kkm_sms2] ) 
						   	{
						   		@$ket = "Tidak Tercapai";
						   	}elseif (@$data[sms_2] == @$data[kkm_sms2]) 
						   	{
						   		@$ket = "Tercapai";
						   	}else
						   	{
						   		@$ket="Terlampaui";
						   	}

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
									<td>
										$data[mapel_nama] <br>
										$data[guru_nama]

									</td>
									<td>$data[kkm_sms2]</td>
									<td>$data[kehadiran_sms2] %</td>
									<td>$data[sms_2]</td>
									<td>$kk</td>
									<td>$huruf</td>
									
									<td>$ket</td>
								</tr>
							";
							@$no++;
							@$jml = $jml+$nilai;
						}
					}
					
				
				?>
						<tr>
							<td colspan="4" align="center">Jumlah </td><td><?php echo "$jml"; ?></td>
						</tr>
						</tbody>
					</table>
				
					</div>
				</div>
			</div>
			<div>
				<div class="col-lg-12">
					Berdasarkan Hasil Belajar Siswa Pada Semester 1 dan 2, maka siswa/i tersebut dinyatakan NAIK /TIDAK NAIK 
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-4" align="center">
				Orang Tua /Wali, <br><br><br><br>
				__________________
				</div>
				<div class="col-lg-4" align="center">
				Wali Kelas,	<br><br><br><br>


				<?php
					echo"<u><b> $wl[guru_nama]</b></u>";
				?>
				</div>
				<div class="col-lg-4" align="center">
				Tasikmalaya, 17 Juni 2017<br>
				Kepala SMK Nahdaltul Ulama, <br><br><br>
				<b><u>Asep Susanto, S.Ag., M.Pd.I</u></b>
				</div>
			</div>


		</div>
	</div>
	</div>
	</div>
	<?php
}
	?>
	</body>
</body>