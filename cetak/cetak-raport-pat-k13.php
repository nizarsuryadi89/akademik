<?php
	//echo"test";
	@$kode 		= $_GET['nissiswa'];
	@$rombel    = $_GET['rombel'];
	@$semester  = $_SESSION['semester'];
	//@$datasiswa = $con->query("select * from tbl_transkrip where rombel_id=$rombel");
	//$dtsiswa 	= $datasiswa->fetch_assoc();
	//@$nis 		= $dtsiswa[siswa_nis];
	include 	"fungsi_terbilang.php";
?>

	<?php
		$semua = $con->query("select * from tbl_transkrip where rombel_id=$rombel group by siswa_nis");
		
			$walikelas 	= $con->query("select * from tbl_rombel a inner join tbl_guru b 
										on a.rombel_wali = b.guru_id where rombel_id=$rombel");
			$wl 		= $walikelas->fetch_assoc();
	?>
	
		<div class="row">
			<div class="panel panel-default">
			<div class="panel-heading">
				<a href="?page=Cetak%20Raport&rombelid=<?php echo"$rombel"; ?> "><button class="btn btn-success"><i class="fa fa-backward"></i></button>
				<?php echo "
				<a href='?page=cetak-raport-pas-sms2-k13&rombel=$rombel&nissiswa=$kode'>
				";
				?>
				<button class="btn btn-success"><i class="fa fa-print"></i> Print Raport</button></a>
			</div>
		
			<div class="panel panel-body">
			<br>
			<?php
				$datasiswa 	= $con->query("select * from tbl_transkrip a inner join tbl_siswa b 
											on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
												on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' and rombel_semester = $semester");
				$dt 		= $datasiswa->fetch_assoc();

			?>
			<div class="row">

				<div class="col-lg-3">	
					<P>	Nama Siswa : <?PHP echo"$dt[siswa_nama]";?></P>
					<P>	NIS/NISN        : <?PHP echo"$dt[siswa_nis]";?>  / <?PHP echo"$dt[siswa_nisn]";?></P>
					
				</div>
				
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3">	
				</div>
				<div class="col-lg-3" align="left">	
					<P>	Kelas		 	: <?PHP echo"$dt[rombel_nama]";?></P>
					<P>	Semester        : <?PHP echo"$dt[rombel_semester]";?> - GENAP /<?PHP echo"2017-2018";?></P>
					
				</div>

					
			</div>
		
	
			<div class="row">
			<div class="col-lg-12" align="center">
					<div class="table-responsive">
					<table class="table table-striped table-bordered" align="center">
						<thead>
							<tr valign="middle">
								<th rowspan="2">No</th>
								<th rowspan="2">Kode / Mata Pelajaran</th>
								
								<th rowspan="2">% Kehadiran</th>
								<th colspan="3">Nilai Pengetahuan</th>
								<th colspan="3">Nilai Keterampilan</th>
								<th rowspan="2">Aksi</th>
								
									
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
					if (@$dt[rombel_semester]==2)
					{
						$query=$con->query("select * from tbl_transkrip  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id 
												where siswa_nis='$kode' and rombel_id = $rombel order by a.mapel_id asc");
						$no = 1;
						while ($data=$query->fetch_array())
						{	

						  // $guru = $con->query("select guru_nama where ")

						   	@$nilai 	= $data[sms_2];
						   	@$kk    	= ucwords(terbilang($nilai));
						   	@$nilai2	= $data[keterampilan_sms2];
						   	@$pp 		= ucwords(terbilang($nilai2));


						   	if ($nilai < 70)
						   {
						   		$naik = "TIDAK NAIK";
						   }else
						   {
						   		$naik = "NAIK";
						   }

						   
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
									<td>$data[kehadiran_sms2] %</td>
									<td>$data[sms_2]</td>
									<td>$kk</td>
									<td>$predikat1</td>
									<td>$data[keterampilan_sms2]</td>
									<td>$pp</td>
									<td>$predikat2</td>
									<td align='center'><a href='?page=cetak-raport-pat-k13&rombel=$rombel&nissiswa=$kode&hapus=Ya&id=$data[nilai_id]'>
											<button class='btn btn-danger'><i class='fa fa-trash'></i></button>
										</a></td>
									
								</tr>
							";
							@$no++;
							@$jml = @$jml+$nilai;
						}
					}
					
				if (@$_GET[hapus]=='Ya')
				{
					$id = @$_GET[id];
					$hapus = $con->query("delete from tbl_transkrip where nilai_id = $id ");
					echo "<meta http-equiv='refresh' content='0.2;URL=?page=cetak-raport-pat-k13&rombel=$rombel&nissiswa=$kode'>";
				}	
				
				?>
						<tr>
							<td colspan="3" align="center">Jumlah </td><td><?php echo "$jml"; ?></td><td colspan="6"></td>
						</tr>
						</tbody>
					</table>
				
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					Kegiatan Ektra Kulikuler
					<table class="table table-bordered">
						<tr>
							<td width="5%">No</td>
							<td width="30%">Kegiatan Ektra Kulikuler</td>
							<td>Nilai Huruf</td>
							<td>Deskripsi</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Pramuka</td>
							<td><input type="text" name="Pramuka"></td>
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
				</div>
			</div>
			<hr>
			
			<div class="row">
				<div class="col-lg-12" align="left">
					Deskripsi<br>
					<table class='table table-bordered' >
						<tr>
							<td width="5%">No</td>
							<td>Mata Pelajaran</td>
							<td>Deskripsi Pengetahuan</td>
							<td>Deskripsi Keterampilan</td>
						</tr>
					
					<?php 
					if (@$dt[rombel_semester]== 2)
					{
						$query=$con->query("select * from tbl_transkrip  a inner join
											 tbl_mapel b on a.mapel_id=b.mapel_id 
												where siswa_nis=$kode and rombel_id = $rombel order by a.mapel_id asc");
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
									<td>$data[desk_pengetahuan_sms2]</td>
										
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
						
					</table>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-12">
					<table class='table table-bordered  table-striped '>
						<tr>
							<th colspan="2">Deskripsi Sikap</th>
						</tr>

						<tr>
							<td><?php echo "$ns[desk_sikap_sms2]";?></td>
						</tr>
					</table>
				</div>
			</div>
			


		</div>
	
	</div>

	</div>


	</body>
</body>