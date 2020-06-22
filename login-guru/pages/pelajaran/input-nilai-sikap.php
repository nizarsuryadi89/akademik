<head>
	<style type="text/css">
		
	table 
		{ 
			font-family: Arial;
			font-size :13;
		 }
   }
	</style>
</head>
<?php
	//error_reporting(0);

	@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombel-kd'];
	@$kur 		=$_GET['kur-id'];
	@$semester 	=$_GET['semester'];

	include "query_semester.php";
						
	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
	//assoc
	@$hasil	 	= $con->query($query); 
	@$aa		= $hasil->fetch_assoc();

	
		
?>
<div class="panel panel-info">
<div class="panel-heading">
	<a href='?page=data-pelajaran'><button class="btn btn-danger"><i class='fa fa-backward'></i> Kembali</button></a>
	<button class="btn btn-primary">Cetak</button>
	<button class="btn btn-warning"> <?php echo"$aa[mapel_nama] - KKM: $aa[kkm] - $aa[guru_nama] "; ?></button>
	
</div>
<div class="panel-body">
		<div class="table-responsive">
			<table width="100%" class="table table-striped table-bordered table-hover" >
				<thead>
					<tr valign='middle'>
						<th rowspan='2'>No</th>
						<th rowspan='2'>Nama Siswa</th>
						
						<th colspan='7'>Kriteria Penilaian</th>
						
					
						
						<th rowspan="2">Predikat</th>
						<th width="15%" rowspan="2">Deskripsi</th>
						
					</tr>	
					<tr>
						<th width="5%">Jujur</th>
						<th width="5%">Toleransi</th>
						<th width="5%">Disiplin</th>
						<th width="5%">Tanggung Jawab</th>
						<th width="5%">Gotong Royong</th>
						<th width="5%">Sopan Santun</th>
						<th width="5%">Percaya Diri</th>
						
						
						
					</tr>
				</thead>

		<?php																	
			while($row= $result->fetch_array())
			{
				include "deskripsi-sikap.php";


				echo"
				<form action='' method='POST'>
				<tbody>
					<tr class='odd gradeX'>
						<td align='center'>$no</td>
						<td align='left'>$row[siswa_nama]  - $row[nilai_id] - $row[siswa_nis]
							<input type='hidden' value='$row[siswa_nis]' name='nis'>
							<input type='hidden' name='kode' value='$row[nilai_id]' size='5'>
							<input type='hidden' name='nilaiid' value='$row[nilai_id]'>
							
						</td>
						<td align='center'>
							<form action='' method='POST'>
							<select name='jujur' onchange='javascript: submit()'>
								<option>Pilih</option>";
							if ($row[nSjujur_sms1]=='1')
								{echo"
								<option value='1' selected>SB</option>
								<option value='0'>PB</option>";
								}elseif ($row[nSjujur_sms1]=='0')
								{echo"
								<option value='1' >SB</option>
								<option value='0' selected>PB</option>";
								}else
								{
								echo"

								<option value='1' >SB</option>
								<option value='0' >PB</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>

						</td>";



						echo"
						<td align='center'>
							<form action='' method='POST'>
							<select name='toleransi' onchange='javascript: submit()'>
								<option>Pilih</option>";
							if ($row[nStoleransi_sms1]=='1')
								{echo"
								<option value='1' selected>SB</option>
								<option value='0'>PB</option>";
								}elseif ($row[nStoleransi_sms1]=='0')
								{echo"
								<option value='1' >SB</option>
								<option value='0' selected>PB</option>";
								}else
								{
								echo"

								<option value='1' >SB</option>
								<option value='0' >PB</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>

						</td>
						
						<td align='center'>
							<form action='' method='POST'>
							<select name='disiplin' onchange='javascript: submit()'>
								<option>Pilih</option>";
							if ($row[nSdisiplin_sms1]=='1')
								{echo"
								<option value='1' selected>SB</option>
								<option value='0'>PB</option>";
								}elseif ($row[nSdisiplin_sms1]=='0')
								{echo"
								<option value='1' >SB</option>
								<option value='0' selected>PB</option>";
								}else
								{
								echo"

								<option value='1' >SB</option>
								<option value='0' >PB</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>

						</td>
						<td align='center'>
							<form action='' method='POST'>
							<select name='tanggungjawab' onchange='javascript: submit()'>
								<option>Pilih</option>";
							if ($row[nStanggungjawab_sms1]=='1')
								{echo"
								<option value='1' selected>SB</option>
								<option value='0'>PB</option>";
								}elseif ($row[nStanggungjawab_sms1]=='0')
								{echo"
								<option value='1' >SB</option>
								<option value='0' selected>PB</option>";
								}else
								{
								echo"

								<option value='1' >SB</option>
								<option value='0' >PB</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>

						</td>
						<td align='center'>
							<form action='' method='POST'>
							<select name='gotongroyong' onchange='javascript: submit()'>
								<option>Pilih</option>";
							if ($row[nSgotongroyong_sms1]=='1')
								{echo"
								<option value='1' selected>SB</option>
								<option value='0'>PB</option>";
								}elseif ($row[nSgotongroyong_sms1]=='0')
								{echo"
								<option value='1' >SB</option>
								<option value='0' selected>PB</option>";
								}else
								{
								echo"

								<option value='1' >SB</option>
								<option value='0' >PB</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>

						</td>
						<td align='center'>
							<form action='' method='POST'>
							<select name='sopansantun' onchange='javascript: submit()'>
							<option>Pilih</option>";
							if ($row[nSsopansantun_sms1]=='1')
								{echo"
								<option value='1' selected>SB</option>
								<option value='0'>PB</option>";
								}elseif ($row[nSsopansantun_sms1]=='0')
								{echo"
								<option value='1' >SB</option>
								<option value='0' selected>PB</option>";
								}else
								{
								echo"

								<option value='1' >SB</option>
								<option value='0' >PB</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>
						</td>		
						
						<td align='center'>
							<form action='' method='POST'>
							<select name='percayadiri' onchange='javascript: submit()'>
							<option>Pilih</option>";
							if ($row[nSpercayadiri_sms1]=='1')
								{echo"
								<option value='1' selected>SB</option>
								<option value='0'>PB</option>";
								}elseif ($row[nSpercayadiri_sms1]=='0')
								{echo"
								<option value='1' >SB</option>
								<option value='0' selected>PB</option>";
								}else
								{
								echo"

								<option value='1' >SB</option>
								<option value='0' >PB</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>
						</td>		
						<td>$predikat</td>
						<td><font color='green'><p align='justify'>$deskripsi</p></td>
						
						
					</tr>
				</tbody>
			</form>

				";
			$no++;
			}
				echo"
				<form action='?page=simpankeraportS' method='POST'>
					<tr>
						<td colspan='11' align='center'>
						<input type='hidden' name='mapel' value='$kode'>
						<input type='hidden' name='rombel' value='$rombel'>
						<input type='hidden' name='semester' value='$semester'>

						<button class='btn btn-primary' name='simpan' value='simpan'><i class='fa fa-save'></i> Simpan Ke Raport</button></td>
					</tr>
			</form>";


?>
				</table>

				</div>
			</div>

<div id="nilaiharian" class="modal fade" tabindex="1" role="dialog"></div>

<?php

if (@isset($_POST[jujur]))
	{
		@$jujur 	= @$_POST[jujur];
		@$idnilai 	= @$_POST[idnilai];
		if ($semester == 1)
		{
			$update = $con->query("update tbl_transkrip_sms1 set nSjujur_sms1 = $jujur where nilai_id = $idnilai");

		}
		elseif($semester == 2)
		{
			$update = $con->query("update tbl_transkrip_sms2 set nSjujur_sms1 = $jujur where nilai_id = $idnilai");

		}
		elseif($semester == 3)
		{
			$update = $con->query("update tbl_transkrip_sms3 set nSjujur_sms1 = $jujur where nilai_id = $idnilai");

		}
		elseif($semester == 4)
		{
			$update = $con->query("update tbl_transkrip_sms4 set nSjujur_sms1 = $jujur where nilai_id = $idnilai");

		}
		elseif($semester == 5)
		{
			$update = $con->query("update tbl_transkrip_sms5 set nSjujur_sms1 = $jujur where nilai_id = $idnilai");

		}
		elseif($semester == 6)
		{
			$update = $con->query("update tbl_transkrip_sms6 set nSjujur_sms1 = $jujur where nilai_id = $idnilai");

		}
		echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
		echo"update tbl_transkrip_sms1 set nSjujur_sms1 = $jujur where nilai_id = $idnilai";
	}
if (@isset($_POST[toleransi]))
	{
		@$jujur 	= @$_POST[toleransi];
		@$idnilai 	= @$_POST[idnilai];
		
		if ($semester == 1)
		{
			$update = $con->query("update tbl_transkrip_sms1 set nStoleransi_sms1 = $jujur where nilai_id = $idnilai");
		
		}
		elseif ($semester == 2)
		{
			$update = $con->query("update tbl_transkrip_sms2 set nStoleransi_sms1 = $jujur where nilai_id = $idnilai");
		
		} 
		elseif ($semester == 3)
		{
			$update = $con->query("update tbl_transkrip_sms3 set nStoleransi_sms1 = $jujur where nilai_id = $idnilai");
		
		}
		elseif ($semester == 4)
		{
			$update = $con->query("update tbl_transkrip_sms4 set nStoleransi_sms1 = $jujur where nilai_id = $idnilai");
		
		}
		elseif ($semester == 5)
		{
			$update = $con->query("update tbl_transkrip_sms5 set nStoleransi_sms1 = $jujur where nilai_id = $idnilai");
		
		}
		elseif ($semester == 6)
		{
			$update = $con->query("update tbl_transkrip_sms6 set nStoleransi_sms1 = $jujur where nilai_id = $idnilai");
		
		}
		echo"update tbl_transkrip_sms1 set nSjujur_sms1 = $jujur where nilai_id = $idnilai";
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
		
	}
if (@isset($_POST[disiplin]))
	{
		@$jujur 	= @$_POST[disiplin];
		@$idnilai 	= @$_POST[idnilai];

		if ($semester == 1)
		{
			$update = $con->query("update tbl_transkrip_sms1 set nSdisiplin_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 2)
		{
			$update = $con->query("update tbl_transkrip_sms2 set nSdisiplin_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 3)
		{
			$update = $con->query("update tbl_transkrip_sms3 set nSdisiplin_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 4)
		{
			$update = $con->query("update tbl_transkrip_sms4 set nSdisiplin_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 5)
		{
			$update = $con->query("update tbl_transkrip_sms5 set nSdisiplin_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 6)
		{
			$update = $con->query("update tbl_transkrip_sms6 set nSdisiplin_sms1 = $jujur where nilai_id = $idnilai");
		}
		echo"update tbl_transkrip_sms1 set nSjujur_sms1 = $jujur where nilai_id = $idnilai";
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
		
	}
if (@isset($_POST[tanggungjawab]))
	{
		@$jujur 	= @$_POST[tanggungjawab];
		@$idnilai 	= @$_POST[idnilai];

		if ($semester == 1)
		{
			$update = $con->query("update tbl_transkrip_sms1 set nStanggungjawab_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 2)
		{
			$update = $con->query("update tbl_transkrip_sms2 set nStanggungjawab_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 3)
		{
			$update = $con->query("update tbl_transkrip_sms3 set nStanggungjawab_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 4)
		{
			$update = $con->query("update tbl_transkrip_sms4 set nStanggungjawab_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 5)
		{
			$update = $con->query("update tbl_transkrip_sms5 set nStanggungjawab_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 6)
		{
			$update = $con->query("update tbl_transkrip_sms6 set nStanggungjawab_sms1 = $jujur where nilai_id = $idnilai");
		}
		echo"update tbl_transkrip_sms1 set nSjujur_sms1 = $jujur where nilai_id = $idnilai";
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
	}
if (@isset($_POST[gotongroyong]))
	{
		@$jujur 	= @$_POST[gotongroyong];
		@$idnilai 	= @$_POST[idnilai];
		if ($semester == 1)
		{
			$update = $con->query("update tbl_transkrip_sms1 set nSgotongroyong_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 2)
		{
			$update = $con->query("update tbl_transkrip_sms2 set nSgotongroyong_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 3)
		{
			$update = $con->query("update tbl_transkrip_sms3 set nSgotongroyong_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 4)
		{
			$update = $con->query("update tbl_transkrip_sms4 set nSgotongroyong_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 5)
		{
			$update = $con->query("update tbl_transkrip_sms5 set nSgotongroyong_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 6)
		{
			$update = $con->query("update tbl_transkrip_sms6 set nSgotongroyong_sms1 = $jujur where nilai_id = $idnilai");
		}
		echo"update tbl_transkrip_sms1 set nSjujur_sms1 = $jujur where nilai_id = $idnilai";
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
		
	}
if (@isset($_POST[sopansantun]))
	{
		@$jujur 	= @$_POST[sopansantun];
		@$idnilai 	= @$_POST[idnilai];
		if ($semester==1)
		{
			$update = $con->query("update tbl_transkrip_sms1 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester==2)
		{
			$update = $con->query("update tbl_transkrip_sms2 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai");
		}
			elseif ($semester==3)
		{
			$update = $con->query("update tbl_transkrip_sms3 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai");
		}
			elseif ($semester==4)
		{
			$update = $con->query("update tbl_transkrip_sms4 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai");
		}
			elseif ($semester==5)
		{
			$update = $con->query("update tbl_transkrip_sms5 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai");
		}
			elseif ($semester==6)
		{
			$update = $con->query("update tbl_transkrip_sms6 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai");
		}
		echo"update tbl_transkrip_sms1 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai";
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
		
	}
if (@isset($_POST[percayadiri]))
	{
		@$jujur 	= @$_POST[percayadiri];
		@$idnilai 	= @$_POST[idnilai];

		if ($semester == 1)
		{
			$update = $con->query("update tbl_transkrip_sms1 set nSpercayadiri_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 2)
		{
			$update = $con->query("update tbl_transkrip_sms2 set nSpercayadiri_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 3)
		{
			$update = $con->query("update tbl_transkrip_sms3 set nSpercayadiri_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 4)
		{
			$update = $con->query("update tbl_transkrip_sms4 set nSpercayadiri_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 5)
		{
			$update = $con->query("update tbl_transkrip_sms5 set nSpercayadiri_sms1 = $jujur where nilai_id = $idnilai");
		}
		elseif ($semester == 6)
		{
			$update = $con->query("update tbl_transkrip_sms6 set nSpercayadiri_sms1 = $jujur where nilai_id = $idnilai");
		}
		echo"update tbl_transkrip_sms1 set nSsopansantun_sms1 = $jujur where nilai_id = $idnilai";
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
	}
?>