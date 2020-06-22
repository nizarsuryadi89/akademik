<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
		
	table 
		{ 
			font-family: Arial;
			font-size :13;
		 }
   }
	</style>
</head>
<div class="panel-body"> 
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-bordered table-hover" >
				<thead>
					<tr valign='middle'>
						<th rowspan='2'>No</th>
						<th rowspan='2' width="20%">Nama Siswa</th>
						
						
						<th rowspan='2' width="5%">Kehadiran</th>
						
						<th colspan='3'>Kriteris Nilai Pengetahuan</th>
						<th rowspan='2'>Nilai Akhir</th>
						
						<th rowspan="2" width="30%">Deskripsi</th>
					
						
					</tr>	
					<tr>
						<th width="5%">Nilai Harian (Bobot 4)</th>
						<th width="5%">Nilai PTS (Bobot 2)</th>
					
						<th width="5%">PAT/PAS (Bobot 2)</th>
						
						
						
					</tr>
				</thead>

<?php						
	if ($jumlah <> 0)
		{											
			while($row= $result->fetch_array())
			{
				$rs 		=$row['rombel_semester'];
				//$jml_kd 	= $con->query("select jml_kd from tbl_mapelrombel where mapelrombel_id = $mapelkd");
				//$jml 		= $jml_kd->fetch_assoc();

				//echo" $mapelkd $jml[jml_kd]";
				@$kkm		=$aa['kkm'];
				
				@$nilaiuts 	= $row[pts_sms1];
				@$nilaiuas  = $row[pas_sms1];
				@$nilaiH 	= $row[nh_sms1];

				@$nilaiakhir  = (($nilaiH * 4)+($nilaiuts * 2)+($nilaiuas * 2))/8;

				$angka4 	  = ($nilaiakhir*4)/100;
				$k13 		  = round($angka4,2);

				
				if (($nilaiakhir >= 88) and ($nilaiakhir <= 100))
				{	
					@$predikat			="A";
					@$deskripsi 			="<b>Sangat baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasa";
				}else
				if (($nilaiakhir >= 74) and ($nilaiakhir<= 87.99 ))
				{	@$predikat			="B";
					@$deskripsi 		="<b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar" ;
				}else
				if (($nilaiakhir >= 60) and ($nilaiakhir <= 73.99))
				{	@$predikat			="C";
					@$deskripsi  		= "<b>Cukup</b>. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar";
				}else
				if (($nilaiakhir < 60) and ($nilaiakhir >= 1))
				{	@$predikat		="D";
					@$deskripsi 	= "<b>Sangat kurang</b>. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja. "; 
				}
				elseif ($nilaiakhir == 0){
					@$predikat		="-";
					$deskripsi = "Nilai Belum Diisi";
				}

				//$deskripsi = substr($deskripsi, 0,20);
				echo"
				<form action='' method='POST'>
				<tbody>
					<tr class='odd gradeX'>
						<td align='center'>$no</td>
						<td align='left'>
							
							$row[siswa_nama] ($row[siswa_jk]) <br>
							$row[siswa_nis] <br>
							
							<input type='hidden' value='$row[siswa_nis]' name='nis'>
							<input type='hidden' name='kode' value='$row[nilai_id]' size='5'>
							
							
						</td>
						<td><input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" size='4' value='$row[absen_sms1]' name='hadir'></td>
					
						<td align='center'>";
				?>
						<!--<a href='#' class='open_modal' id='$row[nilai_id]'>$akhir</a>
							<input type='hidden' name='nh' value='$akhir'> 
						-->
				<?php 
						echo"
							<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" size='4' value='$row[nh_sms1]' name='harian'>
							</td>
						<td align='center'><input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" size='4' value='$row[pts_sms1]' name='uts'></td>
						<td align='center'><input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" size='4' value='$row[pas_sms1]' name='uas'></td>
						<td align='center'>$nilaiakhir
							
							<input type='hidden' value='$nilaiakhir' name='raport'>
							<input type='hidden' value='$row[rombel_semester]' name='rombel'>
						</td>
						
					
						<td align='justify'><font color='green'> 
						Predikat : <b>$predikat</b>
						<br>
						$deskripsi
						<p align='justify'></p>
						<input type='hidden' name='deskripsi' value='$deskripsi'>
						<button name='save' value='save'>Save</button>
						</td>
								
					</tr>
				</tbody>
			</form>

				";
			$no++;
			}
			echo"
			<form action='?page=simpankeraportP' method='POST'>
					<tr>
						<td colspan='10' align='center'>
						<input type='hidden' name='mapel' value='$kode'>
						<input type='hidden' name='rombel' value='$rombel'>
						<input type='hidden' name='semester' value='$semester'>
						

						<button class='btn btn-primary' name='simpan' value='simpan'><i class='fa fa-save'></i> Simpan Ke Raport</button></td>
					</tr>
			</form>";
		}else
		{
			echo"<tr><td colspan='10' align='center'>
				Data Siswa Masih Kosong Hubungi Administrator</td></tr>";
		}

			echo"
			

			</table>";

				if (@$_POST['save']=='save')
				{

					@$id	=	$_GET['kode'];
					$kodea	=	$_POST['kode'];
					$nh1	=	$_POST['nh'];
					$uts	=	$_POST['uts'];
					$uas	=	$_POST['uas'];
					$hadir 	= 	$_POST['hadir'];
					$harian = 	$_POST['harian'];
					
					if (($nh1 <= 100) and ($uts <= 100) and ($uas <= 100))
					{
						if ($semester == 1){
							$con->query("update tbl_transkrip_sms1 set 
										nh_sms1		=$harian, 
										pts_sms1	=$uts,
										pas_sms1	=$uas,
										absen_sms1 	=$hadir
									where nilai_id	=$kodea	");
						}elseif ($semester == 2){
							$con->query("update tbl_transkrip_sms2 set 
										nh_sms1		=$harian, 
										pts_sms1	=$uts,
										pas_sms1	=$uas,
										absen_sms1 	=$hadir
									where nilai_id	=$kodea	");
						}elseif ($semester == 3){
							$con->query("update tbl_transkrip_sms3 set 
										nh_sms1		=$harian, 
										pts_sms1	=$uts,
										pas_sms1	=$uas,
										absen_sms1 	=$hadir
									where nilai_id	=$kodea	");

						}elseif ($semester == 4){
							$con->query("update tbl_transkrip_sms4 set 
										nh_sms1		=$harian, 
										pts_sms1	=$uts,
										pas_sms1	=$uas,
										absen_sms1 	=$hadir
									where nilai_id	=$kodea	");
						}elseif ($semester == 5){
							$con->query("update tbl_transkrip_sms5 set 
										nh_sms1		=$harian, 
										pts_sms1	=$uts,
										pas_sms1	=$uas,
										absen_sms1 	=$hadir
									where nilai_id	=$kodea	");
						}elseif ($semester == 6){
							$con->query("update tbl_transkrip_sms6 set 
										nh_sms1		=$harian, 
										pts_sms1	=$uts,
										pas_sms1	=$uas,
										absen_sms1 	=$hadir
									where nilai_id	=$kodea	");
						}
						
						
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
					}
					else
					{
						echo "DATA YANG ANDA MASUKKAN SALAH";
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
					}
				}
		?>
				</div>
			</div>


<div id="nilaiharian" class="modal fade" tabindex="1" role="dialog"></div>