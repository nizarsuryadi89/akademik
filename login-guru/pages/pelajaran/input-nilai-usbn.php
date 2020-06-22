<?php
	//error_reporting(0);

	@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombel-kd'];
	@$kur 		=$_GET['kur-id'];
	@$mapelkd 	=$_GET['mapelrombel'];

	$query		="select * from tbl_nilaipengetahuan a 
					inner join tbl_siswa b on a.siswa_id=b.siswa_id 
						inner join tbl_mapel c on a.mapel_id=c.mapel_id
							inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
								inner join tbl_guru e on d.guru_id=e.guru_id 
									
										where a.mapel_id=$kode and a.rombel_id=$rombel";
	
	$tampil		="select c.kur_id,b.siswa_nis,b.siswa_id,a.nilai_id,
					b.siswa_nama,a.nh1,a.nilai_uts,a.nilai_uas,a.kehadiran,b.siswa_jk,a.nilai_id, c.rombel_semester
						from tbl_nilaipengetahuan a
							inner join tbl_siswa b on a.siswa_id=b.siswa_id 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id 
									
									where a.mapel_id=$kode and a.rombel_id=$rombel order by siswa_nis asc";	

						
	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
	//assoc
	@$hasil	 	= $con->query($query); 
	@$aa		= $hasil->fetch_assoc();

	if ($jumlah != 0)
	{
		
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<iframe src="<?php echo"cetak/print-nilaimapel.php?mapel-kd=$kode&rombel-kd=$rombel";?>" style="display:none;" name="frame" ></iframe>
				<a href="?page=mapel-rombel&kd-rombel=<?php echo $rombel ; ?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</button></a>
				
				<button type="button" class="btn btn-primary" onClick="frames['frame'].print()" ><i class="glyphicon glyphicon-print"></i> Cetak Nilai</button>
					
				<a href="?page=mapel-rombel&kd-rombel=<?php echo $rombel ; ?>"><button class="btn btn-success"><i class="glyphicon glyphicon-cloud"></i> Export Excel</button></a>
				   

				    <div class="heading" align="right">
				        <?php echo"$aa[mapel_nama] - KKM: $aa[kkm] - $aa[guru_nama] "; ?>
				    </div>
			</div>

			<div class="panel-body">
		<div class="table-responsive">
			<table width="100%" class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th rowspan='2'>No</th>
						<th rowspan='2'>Nama Siswa</th>
						

						<th 
						<?php if ((@$kode == 58) or (@$kode == 61) or (@$kode == 62) or (@$kode == 53) or (@$kode == 65) or (@$kode == 67)) 
						{ echo"colspan='3' "; } else{ echo "colspan='2' ";} ?>>
						Nilai</th>
						<th rowspan='2'>Predikat</th>
						<th rowspan="2">Ket</th>
						<th rowspan="2">Aksi</th>
					</tr>	
					<tr>
						<?php if((@$kode == 58) or (@$kode == 61) or (@$kode == 62) or (@$kode == 53) or (@$kode == 65) or (@$kode == 67)) 
						{ 
							echo "<th>Praktik</th>";
						}
						?>
						<th>Teori</th>
						
						<th>Nilai Akhir</th>
						
						
					</tr>
				</thead>

		<?php																	
			while($row= $result->fetch_array())
			{
				$rs 		=$row['rombel_semester'];
				
				$uts		=$row['nilai_uts'];
				$uas		=$row['nilai_uas'];
				$kkm		=$aa['kkm'];
				
				if ((@$kode == 58) or (@$kode == 61) or (@$kode == 62) or (@$kode == 53) or (@$kode == 65) or (@$kode == 67)) 
				{ 
					$raport		=($uts * 0.6)+($uas * 0.4);
				}
				else
				{
					$raport		=$uas;
				}
					//huruf
					if (($raport>=90) and ($raport <=100))
					{$huruf		="A";}else
					if (($raport>=80.00) and ($raport<=89.99))
					{$huruf		="B";}else
					if (($raport>=70.00) and ($raport<=79.99))
					{$huruf		="C";}else
					if (($raport>=60.00) and ($raport<=69.99))
					{$huruf		="D";}else
					if (($raport<=59.99)and ($raport>=1))
					{$huruf	="E";}else{$huruf="-";}
					
					//keterangan
				if ($raport >=$kkm)
				{$ket="<font color='blue'>T</font>";}else
				if ($raport <=$kkm)
				{$ket="<font color='red'>BT</font>";}
				
				echo"
				<form action='' method='POST'>
				<tbody>
					<tr class='odd gradeX'>
						<td align='center'>$no</td>
						<td align='left'>$row[siswa_nama] 
							<input type='hidden' value='$row[siswa_nis]' name='nis'>
						</td>
							<input type='hidden' name='kode' value='$row[nilai_id]' size='5'>";

						
					if ((@$kode == 58) or (@$kode == 61) or (@$kode == 62) or (@$kode == 53) or (@$kode == 65) or (@$kode == 67))
					{ 
						
						if (@$row[nilai_uts] < $kkm )
						echo"
						<td align='center'>
							<div class='form-group'>
								<input type='number' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uts'   value='$row[nilai_uts]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						else{ 
						echo"
						<td align='center'>
							<div class='form-group'>
								<input type='number' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uts'   value='$row[nilai_uts]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						}
					}
						if (@$row[nilai_uas] < $kkm )
						echo"
						<td align='center'>
							<div class='form-group'>
								<input type='number' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uas'   value='$row[nilai_uas]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						else{echo"
						<td align='center'>
							<div class='form-group'>
								<input type='number' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uas'   value='$row[nilai_uas]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						}echo"
						<td align='center'>$raport 
							<input type='hidden' value='$raport' name='raport'>
							<input type='hidden' value='$row[rombel_semester]' name='rombel'>
						</td>

						<td align='center'>$huruf</td>
					
						<td align='center'><font color='green'>$ket <button name='save' value='save' hidden>Save</button>
						</td>
						<td>
				
							<button class='btn btn-success' name='kirim' value='kirim'> <i class='glyphicon glyphicon-upload'></i></button>
						";
					
					echo"
						</td>			
					</tr>
				</tbody>
			</form>

				";
			$no++;
			}
			echo"</table>";

				if (@$_POST['save']=='save')
				{

					$id		=	$_GET['kode'];
					$kodea	=	$_POST['kode'];
					$hadir	=	$_POST['hadir'];
					$nh1	=	$_POST['nh1'];
					$uts	=	$_POST['uts'];
					$uas	=	$_POST['uas'];
					
					if (($hadir <= 100) and ($nh1 <= 100) and ($uts <= 100) and ($uas <= 100))
					{
						if ((@$kode == 58) or (@$kode == 61) or (@$kode == 62) or (@$kode == 53) or (@$kode == 65) or (@$kode == 67))
						{ 
						$con->query("update tbl_nilaipengetahuan set 
										nilai_uts	=$uts,
										nilai_uas	=$uas 
									where nilai_id	=$kodea	"); 
						}else
						{
						$con->query("update tbl_nilaipengetahuan set 
										
										nilai_uas	=$uas 
									where nilai_id	=$kodea	"); 	
						}
										
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-usbn&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1'>";
					}
					else
					{
						echo "DATA YANG ANDA MASUKKAN SALAH";
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-usbn&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1'>";
					}
				}
				if (@$_POST[kirim]=='kirim') 
				{
					$snis   = $row[nis];
					$raport = $_POST[raport];
					$nis 	= $_POST[nis];
					$kkm 	= $aa[kkm];
					$hadir  = $_POST[hadir];
					$guru   = $aa[guru_id];

					$transkrip  = $con->query("select * from tbl_transkrip where 
													siswa_nis = '$nis' and mapel_id= $kode");
					$tr 		= $transkrip->fetch_assoc();

					$sms1 		= $tr[sms_1];
					$sms2 		= $tr[sms_2];
					$sms3 		= $tr[sms_3];
					$sms4 		= $tr[sms_4];
					$sms5 		= $tr[sms_5];
					
					echo "";
					if ($rs == '1')
					{
						echo "1";
					}
					elseif ($rs == '2')
					{
						$transkrip  = $con->query("select * from tbl_transkrip where 
													siswa_nis = '$nis' and mapel_id= $kode");
						$tr 		= $transkrip->fetch_assoc();

						$sms2 		= $tr[sms_2];
						$siswa 		= $tr[siswa_nis];
					

						if ($sms2 == '')
							{
								$save = $con->query("insert into tbl_transkrip set siswa_nis = '$nis', mapel_id = $kode,sms_2=$raport, kkm_sms2 = $kkm, kehadiran_sms2=$hadir, rombel_id=$rombel, guru_sms2=$guru");

							}
							else
							{
								$save = $con->query("update tbl_transkrip set 
														sms_2=$raport,
														kehadiran_sms2=$hadir,
														guru_sms2=$guru
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");										
							}
						
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-siswa&mapel-kd=$kode&rombel-kd=$rombel'>";


						
					}
					//input transkrip semester 3
					elseif ($rs == '3')
					{				

						if ($sms3 == '')
							{
								$save = $con->query("insert into tbl_transkrip set siswa_nis = '$nis', mapel_id = $kode,sms_3=$raport, kkm_sms3 = $kkm, kehadiran_sms3=$hadir, rombel_id=$rombel, guru_sms3=$guru");	
							}
							else
							{
								$save = $con->query("update tbl_transkrip set 
														sms_3=$raport,
														kehadiran_sms3=$hadir,
														guru_sms3=$guru
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
								
							}
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$mapelkd'>";
					}
					elseif ($rs == '4')
					{				

						if ($sms4 == '')
							{
								$save = $con->query("insert into tbl_transkrip set siswa_nis = '$nis', mapel_id = $kode,sms_4=$raport, kkm_sms4 = $kkm, rombel_id=$rombel");
							}
							else
							{
								$save = $con->query("update tbl_transkrip set 
														sms_4=$raport 
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
							}
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-siswa&mapel-kd=$kode&rombel-kd=$rombel'>";
					}
					//input transkrip semester 5
					elseif ($rs == '5')
					{
						if ($sms5 == '')
							{
								$save = $con->query("insert into tbl_transkrip set siswa_nis = '$nis', mapel_id = $kode,sms_5=$raport, kkm_sms5 = $kkm, kehadiran_sms5=$hadir, rombel_id=$rombel, guru_sms5=$guru");


								
							}
							else
							{
								$save = $con->query("update tbl_transkrip set 
														sms_3=$raport,
														kehadiran_sms3=$hadir,
														guru_sms2=$guru
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
								
							}
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$mapelkd'>";
					}
					elseif ($rs == '6')
					{
						if ($sms6 == '')
							{
								$save = $con->query("insert into tbl_transkrip set siswa_nis = '$nis', mapel_id = $kode,us=$raport, kkm_us = $kkm, rombel_id=$rombel, guru_us=$guru");
	
							}
							else
							{
								$save = $con->query("update tbl_transkrip set 
														us=$raport,
														
														guru_us=$guru
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
								
							}
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-usbn&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$mapelkd'>";
						//echo "insert into tbl_transkrip set siswa_nis = '$nis', mapel_id = $kode,us=$raport, kkm_us = $kkm, rombel_id=$rombel, guru_us=$guru";
					}
				}
				else 
				{
				//include "inputsiswa.php";
				}
		
		
	
					
				
			?>
				</table>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
}
	else
	{
		echo "Rombongan Belajar Masih Kosong";
	}
?>

