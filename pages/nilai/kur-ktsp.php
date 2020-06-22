<?php
	error_reporting(0);
?>
<div class="panel-body">
		<div class="table-responsive">
			<table width="100%" class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
						<th rowspan='2'>No</th>
						<th rowspan='2'>Nama Siswa</th>
						<th rowspan='2'>% Kehadiran</th>

						<th colspan='4'>Nilai</th>
						<th colspan='2'>Predikat</th>
						<th rowspan="2">Ket</th>
						<th rowspan="2">Aksi</th>
					</tr>	
					<tr>
						<th>Rerata Harian</th>
						<th>PTS</th>
						<th>PAT</th>
						<th>Nilai Akhir</th>
						<th>Huruf</th>
						<th>Skala 4</th>
					</tr>
				</thead>

		<?php																	
			while($row= $result->fetch_array())
			{
				$rs 		=$row['rombel_semester'];
				$harian		=$row['nh1'];
				$uts		=$row['nilai_uts'];
				$uas		=$row['nilai_uas'];
				$kkm		=$aa['kkm'];
				
				$na			=(($harian+$uts)+(2*$uas))/4;
				$raport		=round($na);
				
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
				
				//k13	
				$k4		= (($raport*4)/100);	
				$k13	= round($k4,1);
				
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

						if (@$row[kehadiran] >= 75)
						{echo"	
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='hadir'   value='$row[kehadiran]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>
						";
						}
						else
						{echo"
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='hadir'   value='$row[kehadiran]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						}
						if (@$row[nh1] < $kkm )
						{echo"	
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='nh1'   value='$row[nh1]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						}
						else
						{echo"
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='nh1'   value='$row[nh1]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						}
						if (@$row[nilai_uts] < $kkm )
						echo"
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uts'   value='$row[nilai_uts]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						else{
						echo"
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uts'   value='$row[nilai_uts]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						}
						if (@$row[nilai_uas] < $kkm )
						echo"
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uas'   value='$row[nilai_uas]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						else{echo"
						<td align='center'>
							<div class='form-group'>
								<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" name='uas'   value='$row[nilai_uas]'  onkeypress='submitOnEnter(this, event);'> 
							</div>
						</td>";
						}echo"
						<td align='center'>$raport 
							<input type='hidden' value='$raport' name='raport'>
							<input type='hidden' value='$row[rombel_semester]' name='rombel'>
						</td>

						<td align='center'>$huruf</td>
						<td align='center'>$k13</td>
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
						$con->query("update tbl_nilaipengetahuan set 
										kehadiran	=$hadir,
										nh1			=$nh1, 
										nilai_uts	=$uts,
										nilai_uas	=$uas 
									where nilai_id	=$kodea	"); 
										
					//	echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$kode'>";
					}
					else
					{
						echo "DATA YANG ANDA MASUKKAN SALAH";
						//echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$kode'>";
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
					
					if ($rs == '1')
					{
					     /**
						if (($sms1 == '') or ($sms1 == 0))
							{
								$save = $con->query("insert into tbl_transkrip set 
														siswa_nis 				= '$nis', 
														mapel_id 				= $kode,
														sms_1					= $raport, 
														kkm_sms1				= $kkm, 
														rombel_id				= $rombel, 
														
														kehadiran_sms1 			= $hadir,
														guru_sms1				= $guru");
							}
							else
							{ **/
						
								$save = $con->query("update tbl_transkrip set 
														sms_1					= $raport,
														guru_sms1				= $guru,
														
														kehadiran_sms1			= $hadir
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
						//	}
						
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$kode'>";
					}
					elseif ($rs == '2')
					{ 
					     /**
					if (($sms2 == '') or ($sms2 == 0))
							{
								$save = $con->query("insert into tbl_transkrip set 
														siswa_nis 				= '$nis', 
														mapel_id 				= $kode,
														sms_2					= $raport, 
														kkm_sms2				= $kkm, 
														rombel_id				= $rombel, 
														
														kehadiran_sms2 			= $hadir,
														guru_sms2				= $guru");
							}
							else
							{ **/
								$save = $con->query("update tbl_transkrip set 
														sms_2					= $raport,
														guru_sms2				= $guru,
														
														kehadiran_sms2			= $hadir
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
						//	}
						echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$kode'>";
						
					}
					elseif ($rs == '3')
					{				
                        /**
						if (($sms3 == '') or ($sms3 == 0))
							{
								$save = $con->query("insert into tbl_transkrip set 
														siswa_nis 				= '$nis', 
														mapel_id 				= $kode,
														sms_3					= $raport, 
														kkm_sms3				= $kkm, 
														rombel_id				= $rombel, 
														
														kehadiran_sms3 			= $hadir,
														guru_sms3				= $guru");
							}
							else
							{ 
							**/
								$save = $con->query("update tbl_transkrip set 
														sms_3					= $raport,
														guru_sms3				= $guru,
														
														kehadiran_sms3			= $hadir
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
							//}
							echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&mapelrombel=$kode'>";
					}
					elseif ($rs == '4')
					{				
                        /**
						if (($sms4 == '') or ($sms4 == 0))
							{
								$save = $con->query("insert into tbl_transkrip set 
														siswa_nis 				= '$nis', 
														mapel_id 				= $kode,
														sms_4					= $raport, 
														kkm_sms4				= $kkm, 
														rombel_id				= $rombel, 
														
														kehadiran_sms4 			= $hadir,
														guru_sms4				= $guru");
							}
							else
							{  **/
								$save = $con->query("update tbl_transkrip set 
														sms_4					= $raport,
														guru_sms4				= $guru,
														
														kehadiran_sms4			= $hadir
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
							//}
							//echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&&mapelrombel=$kode'>";
					}
					elseif ($rs == '5')
					{
					     /**
					if (($sms5 == '') or ($sms5 == 0))
							{
								$save = $con->query("insert into tbl_transkrip set 
														siswa_nis 				= '$nis', 
														mapel_id 				= $kode,
														sms_5					= $raport, 
														kkm_sms5				= $kkm, 
														rombel_id				= $rombel, 
														
														kehadiran_sms5 			= $hadir,
														guru_sms5				= $guru");
							}
							else
							{  **/
								$save = $con->query("update tbl_transkrip set 
														sms_5					= $raport,
														guru_sms5				= $guru,
														
														kehadiran_sms5			= $hadir
														where 
													siswa_nis = '$nis' and mapel_id= $kode ");
													
								
						//	}
							//echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur_id=1&&mapelrombel=$kode'>";
							
					}
					
				}
				
		
		
	
					
				
			?>
				</table>
				</div>
			</div>