<?php
	//error_reporting(0);
	@$semester 	=$_GET['semester'];
	//@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombelkd'];
	@$kur 		=$_GET['kur-id'];
	@$mapelkd 	=$_GET['mapelrombel'];
	@$guru 		=$_GET['guru'];
	//echo"$rombel";

//	echo"$guru";	
	$tampil		="select * from tbl_transkrip_sms1 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	


	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
		
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<a href='?page=Kurikulum'><button class='btn btn-warning'>Kembali</button></a>
			</div>
			<div class="panel-body">
				<table class="table table-striping table-bordered">
					<thead>
					<tr>
						<th rowspan='2' width="5%">No</th>
						<th rowspan='2' width="10%">NIS</th>
						<th rowspan='2'>Nama Lengkap</th>
						<th colspan='6'>Ekskul </th>
					</tr>
					<tr>
						<th width="5%">Pramuka</th>
						<th width="15%">Ket</th>
						<th width="5%">English Club</th>
						<th width="15%">Ket</th>
						<th width="5%">............</th>
						<th width="15%">Ket</th>
					</tr>
				</thead>
			<?php 
					$no=1;
					while($row= $result->fetch_array())
				{
					echo"<tr>
						<td>$no</td>
						<td>$row[siswa_nis]</td>
						<td>$row[siswa_nama]</td>
						<td>
							<form action='' method='POST'>
							<select name='ekskul1' onchange='javascript: submit()'>
								<option>Pilih Nilai</option>";
							if ($row[ekskul1]=='Baik')
								{echo"
								<option value='Baik' selected>BAIK</option>
								<option value='Cukup'>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}elseif ($row[ekskul1]=='Cukup')
								{echo"
								<option value='Baik' >BAIK</option>
								<option value='Cukup' selected>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}
								elseif ($row[ekskul1]=='Kurang')
								{echo"
								<option value='Baik' >BAIK</option>
								<option value='Cukup' >CUKUP</option>
								<option value='Kurang' selected>KURANG</option>";
								}else
								{
								echo"

								<option value='Baik'>BAIK</option>
								<option value='Cukup'>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>
						</td>
						<td>";
						if (@
							$row[ekskul1] <> '')
							{
								echo"Melaksanakan Kegiatan Kepramukaan dengan <b>$row[ekskul1]</b>";
							}
							echo"
						</td>
						<td>	<form action='' method='POST'>
							<select name='ekskul2' onchange='javascript: submit()'>
								<option>Pilih Nilai</option>";
							if ($row[ekskul2]=='Baik')
								{echo"
								<option value='Baik' selected>BAIK</option>
								<option value='Cukup'>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}elseif ($row[ekskul2]=='Cukup')
								{echo"
								<option value='Baik' >BAIK</option>
								<option value='Cukup' selected>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}
								elseif ($row[ekskul2]=='Kurang')
								{echo"
								<option value='Baik' >BAIK</option>
								<option value='Cukup' >CUKUP</option>
								<option value='Kurang' selected>KURANG</option>";
								}else
								{
								echo"

								<option value='Baik'>BAIK</option>
								<option value='Cukup'>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>
						</td>
						<td>
						";
							if (@
							$row[ekskul2] <> '')
							{
								echo"Melaksanakan Kegiatan English Club dengan <b>$row[ekskul1]</b>";
							}
							echo"
						</td>
						<td>
							<form action='' method='POST'>
							<select name='ekskul3' onchange='javascript: submit()'>
								<option>Pilih Nilai</option>";
							if ($row[ekskul3]=='Baik')
								{echo"
								<option value='Baik' selected>BAIK</option>
								<option value='Cukup'>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}elseif ($row[ekskul3]=='Cukup')
								{echo"
								<option value='Baik' >BAIK</option>
								<option value='Cukup' selected>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}
								elseif ($row[ekskul3]=='Kurang')
								{echo"
								<option value='Baik' >BAIK</option>
								<option value='Cukup' >CUKUP</option>
								<option value='Kurang' selected>KURANG</option>";
								}else
								{
								echo"

								<option value='Baik'>BAIK</option>
								<option value='Cukup'>CUKUP</option>
								<option value='Kurang'>KURANG</option>";
								}
						echo"
							</select>
							<input type='hidden' name='idnilai' value='$row[nilai_id]'>
							<noscript><input type='submit' value='Submit'></noscript>
							</form>
						</td>
						<td>";
							if (@
							$row[ekskul3] <> '')
							{
								echo"Melaksanakan Kegiatan ................... dengan <b>$row[ekskul1]</b>";
							}
							echo"
						</td>
					</tr>";
					$no++;
				}
			?>

				</table>
			</div>
			
		</div>
	</div>
</div>
<?php 

if (@isset($_POST[ekskul1]))
	{
		@$jujur 	= @$_POST[ekskul1];
		@$idnilai 	= @$_POST[idnilai];
		$update = $con->query("update tbl_transkrip_sms1 set ekskul1 = '$jujur' where nilai_id = $idnilai");

		echo "<meta http-equiv='refresh' content='0.2;URL=?page=Input-Nilai-Ekskul&rombelkd=$rombel&semester=$semester'>";
		//echo"update tbl_transkrip_sms1 set nSjujur_sms1 = '$jujur' where nilai_id = $idnilai";
	}


if (@isset($_POST[ekskul2]))
	{
		@$jujur 	= @$_POST[ekskul2];
		@$idnilai 	= @$_POST[idnilai];
		$update = $con->query("update tbl_transkrip_sms1 set ekskul2 = '$jujur' where nilai_id = $idnilai");

		echo "<meta http-equiv='refresh' content='0.2;URL=?page=Input-Nilai-Ekskul&rombelkd=$rombel&semester=$semester'>";
		//echo"update tbl_transkrip_sms1 set nSjujur_sms1 = '$jujur' where nilai_id = $idnilai";
	}

	if (@isset($_POST[ekskul3]))
	{
		@$jujur 	= @$_POST[ekskul3];
		@$idnilai 	= @$_POST[idnilai];
		$update = $con->query("update tbl_transkrip_sms1 set ekskul3 = '$jujur' where nilai_id = $idnilai");

		echo "<meta http-equiv='refresh' content='0.2;URL=?page=Input-Nilai-Ekskul&rombelkd=$rombel&semester=$semester'>";
		//echo"update tbl_transkrip_sms1 set nSjujur_sms1 = '$jujur' where nilai_id = $idnilai";
	}
?>