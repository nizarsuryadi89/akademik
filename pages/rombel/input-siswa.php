<?php
	//error_reporting(0);
//	include_once "config.php";
	//echo"$tahun";
	$rombelid	=$_GET['rombel-kd'];
	$mapelid	=$_GET['mapel-kd'];
	$guru 		=$_GET['guru'];
	$kkm 		=$_GET['kkm'];
	$sems 		=@$_GET[semester];

	$mapelnama 	= $con->query("select mapel_nama from tbl_mapel where mapel_id = $mapelid");
	$mapel 		= $mapelnama->fetch_assoc();



	if ($sems == 1)
	{
		$cekdata 	= $con->query("select * from tbL_transkrip_sms1  where mapel_id=$mapelid and rombel_id=$rombelid and guru_sms1 =$guru");
	}elseif ($sems == 2)
	{
		$cekdata 	= $con->query("select * from tbL_transkrip_sms2 where mapel_id=$mapelid and rombel_id=$rombelid and guru_sms1 =$guru");
	}
	elseif ($sems == 3)
	{
		$cekdata 	= $con->query("select * from tbL_transkrip_sms3 where mapel_id=$mapelid and rombel_id=$rombelid and guru_sms1 =$guru");
	}
	elseif ($sems == 4)
	{
		$cekdata 	= $con->query("select * from tbL_transkrip_sms4 where mapel_id=$mapelid and rombel_id=$rombelid and guru_sms1 =$guru");
	}
	elseif ($sems == 5)
	{
		$cekdata 	= $con->query("select * from tbL_transkrip_sms5 where mapel_id=$mapelid and rombel_id=$rombelid and guru_sms1 =$guru");
	}
	elseif ($sems == 6)
	{
		$cekdata 	= $con->query("select * from tbL_transkrip_sms6 where mapel_id=$mapelid and rombel_id=$rombelid and guru_sms1 =$guru");
	}

	$cekisi 	= mysqli_num_rows($cekdata);


	$result 	= $con->query("SELECT * FROM tbl_siswa a 
								inner join tbl_pesertarombel b on a.siswa_id=b.siswa_id 
									where b.rombel_id=$rombelid order by siswa_nis asc "); 

?>
<head>
<script type="text/javascript"> 
//check all checkbox
function checkAll(form){
	for (var i=0;i<document.forms[form].elements.length;i++)
	{
		var e=document.forms[form].elements[i];
		if ((e.name !='allbox') && (e.type=='checkbox'))
		{
			e.checked=document.forms[form].allbox.checked;
		}
	}
}
</script>

</head>
<body>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="?page=pembelajaran-rombel&kd-rombel=<?php echo"$rombelid&semester=$sems"; ?> "><button class="btn btn-warning">Kembali</button></a>
			<button class="btn btn-danger">PILIH SISWA DAN MASUKKAN KEDALAM MAPEL : <?PHP echo"$mapel[mapel_nama]";?></button>
		</div>
		<div class="panel-body">
			
				<form action='' method='POST'>

						<button class="btn btn-success btn-block" type='submit' name='Simpan' value='Simpan'>SIMPAN</button>
						<br><br>		
						<table width='100%' border='1' class='laporan2' align="left">
						
						<tr bgcolor='lightgrey'>
							<td align='center'>
								<input type="checkbox" name="allbox" onclick="checkAll(0)"/>
							</td>
							<td colspan='2' ><strong>&nbsp; PILIH SEMUA</strong></td>
						</tr>
							<?php
								$warna1 	= "lightgrey";   // baris genap berwarna hijau tua
								$warna2 	= "white";   // baris ganjil berwarna hijau muda
								$warna  	= $warna1;     // warna default
								


						//if ($cekisi == 0)
						//	{
								while($row= $result->fetch_array())
								{
									if($warna == $warna1)
									{
										$warna = $warna2;
									}
									else 
									{
										$warna = $warna1;
									}
									echo"
									<tr bgcolor=$warna>
										<td width='5%' align='center'><input type='checkbox' name='item[]' value='$row[siswa_nis]'></td>
										<td width='10%'>$row[siswa_nis]</td>
										<td>$row[siswa_nama]</td>
									</tr>
									";
									
								}
						//	}else
						//	{
								echo"<tr>
										<td colspan='3' align='center'>Data Sudah Ada <a href='?page=pembelajaran-rombel&kd-rombel=$rombelid&semester=$sems'>Klik disini untuk Kembali</a>
								</tr>";
						//	}
							?>
						</table>
						</form>						
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
	if (@$_POST[Simpan]=='Simpan')
	{
		$jmlpilih	=count(@$_POST['item']);
		$siswa1		=@$_POST['item'];
		
			for ($x=0; $x<=$jmlpilih; $x++ )
			{
				
				$siswa	=@$siswa1[$x];
				$mapel	=$mapelid;
				$rombel	=$rombelid;
				$gur 	=$guru;
				$kkm 	=$kkm;
				//$nis 	=$
				

				//$simpan	=$con->query("insert into tbl_nilaipengetahuan(siswa_id,mapel_id,rombel_id)values($siswa,$mapel,$rombel)");
				//$simpan	=$con->query("insert into tbl_keterampilan(siswa_id,mapel_id,rombel_id)values($siswa,$mapel,$rombel)");

				if ($sems == '1')
				{
					$save 	= $con->query("insert into tbl_transkrip_sms1 set siswa_nis = '$siswa' , mapel_id=$mapel, rombel_id=$rombel, guru_sms1=$gur, kkm_sms1=$kkm, tahun_id=$tahun");

					//echo"insert into tbL_transkrip_sms1 set siswa_nis = '$siswa' , mapel_id=$mapel, rombel_id=$rombel, guru_sms1=$gur, kkm_sms1=$kkm, tahun_id=$tahun <br>";

					echo "<meta http-equiv='refresh' content='2;URL=?page=pembelajaran-rombel&kd-rombel=$rombelid&semester=$sems'>";
				}
				elseif ($sems == '2')
				{
					$save 	= $con->query("insert into tbl_transkrip_sms2 set siswa_nis = '$siswa' , mapel_id=$mapel, rombel_id=$rombel, guru_sms1=$gur, kkm_sms1=$kkm, tahun_id=$tahun");

					
					echo "<meta http-equiv='refresh' content='0;URL=?page=pembelajaran-rombel&kd-rombel=$rombelid&semester=$sems'>";
				}
				elseif ($sems == '3') 
				{
					$save 	= $con->query("insert into tbl_transkrip_sms3 set siswa_nis = '$siswa' , mapel_id='$mapel', rombel_id='$rombel', guru_sms1='$gur', kkm_sms1='$kkm',  tahun_id='$tahun' ");
					echo"insert into tbl_transkrip_sms3 set siswa_nis = '$siswa' , mapel_id='$mapel', rombel_id='$rombel', guru_sms1='$gur', kkm_sms1='$kkm',  tahun_id='$tahun' <br>";

					echo "<meta http-equiv='refresh' content='2;URL=?page=pembelajaran-rombel&kd-rombel=$rombelid&semester=$sems'>";
				}
				elseif ($sems == '4') 
				{
					$save 	= $con->query("insert into tbl_transkrip_sms4 set siswa_nis = '$siswa' , mapel_id=$mapel, rombel_id=$rombel, guru_sms1=$gur, kkm_sms1=$kkm,  tahun_id=$tahun");
					
					echo "<meta http-equiv='refresh' content='0;URL=?page=pembelajaran-rombel&kd-rombel=$rombelid&semester=$sems'>";
				}
				elseif ($sems == '5') 
				{
					$save 	= $con->query("insert into tbl_transkrip_sms5 set siswa_nis = '$siswa' , mapel_id='$mapel', rombel_id='$rombel', guru_sms1='$gur', kkm_sms1='$kkm',  tahun_id='$tahun' ");
					
					echo "<meta http-equiv='refresh' content='2;URL=?page=pembelajaran-rombel&rombel-kd=$rombelid&semester=$sems'>";
				}
				elseif ($sems == '6') 
				{
					$save 	= $con->query("insert into tbl_transkrip_sms6 set siswa_nis = '$siswa' , mapel_id=$mapel, rombel_id=$rombel, guru_sms1=$gur, kkm_sms1=$kkm,  tahun_id=$tahun");
					
					echo "<meta http-equiv='refresh' content='2;URL=?page=pembelajaran-rombel&rombel-kd=$rombelid&semester=$sems'>";
				}

				$a      = $con->query("select * from tbl_nilaipengetahuan order by nilai_id desc limit 0,1");
				$as 	= $a->fetch_assoc();

				$asa 	= @$as[nilai_id]+1;
				
					

				$simpan	=$con->query("insert into tbl_nilai_harian set nilai_id=$asa ");

				
						
					
				
				if (@$_POST['simpan']=='simpan')
				{
				//echo "<meta http-equiv='refresh' content='2;URL=?page=pembelajaran-rombel&kd-rombel=$rombel'>";
				}
			}
			
		}
	?>
</div>
</div>
</body>
					