<?php
	$kode 		= $_GET['nis-siswa'];
	$datasiswa 	= $con->query("select * from tbl_siswa where siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];
	@$program 	= $dtsiswa[program_id];
?>

<div class="col-lg-13">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="?page=master-transkrip-nilai"><button class="btn btn-default">Kembali Ke Data Transkrip</button></a>
		</div>
		<div class="panel-body">
            <dl>
                <dt>Nis : <?php echo"$dtsiswa[siswa_nis]"?></dt>
                <dt>Nama Lengkap : <?php echo"$dtsiswa[siswa_nama]";?></dt>
                <dt>Tempat/Tanggal Lahir : <?php echo"$dtsiswa[siswa_tempatlahir] / " .tgl_indo($dtsiswa['siswa_tanggallahir'])."";?></dt>
                              
            </dl>
       
		<form action='' method='POST'>
			<div class="form-group has-success">
			  <?php
			  	$mapel = $con->query("select a.mapel_id, a.mapel_nama,a.mapel_urut from tbl_mapel a left join
			  						 	tbl_transkrip b on a.mapel_id = b.mapel_id left join tbl_siswa c on b.siswa_nis = c.siswa_nis 
			  									where a.kur_id='1' and a.mapel_id order by a.mapel_id not in(select mapel_id from 	
			  											tbl_transkrip where siswa_nis='$kode')");

			  ?>
			  <label class="control-label" for="inputSuccess1">Mata Pelajaran : </label>

			  <select name="nm_pelajaran" class="form-control" id="inputSuccess1">
			  		<option>Pilih Mata Pelajaran</option>
			  <?php
			  	while ($data=$mapel->fetch_array())
			  	{

			  		 echo "<option value ='$data[mapel_id]'>$data[mapel_nama]</option>";
			  
			  	}
			  ?>
			  </select>
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Nilai Semester 1: </label>
				<input type='number' name="sms1" class="form-control" id="inputSuccess1">
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Nilai Semester 2: </label>
				<input type='number' name="sms2" class="form-control" id="inputSuccess1">
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Nilai Semester 3: </label>
				<input type='number' name="sms3" class="form-control" id="inputSuccess1">
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Nilai Semester 4: </label>
				<input type='number' name="sms4" class="form-control" id="inputSuccess1">
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Nilai Semester 5: </label>
				<input type='number' name="sms5" class="form-control" id="inputSuccess1">
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Nilai US/USBN </label>
				<input type='number' name="us" class="form-control" id="inputSuccess1">
			</div>
			<div class="form-group has-success">
				<button class="btn-succes" name="simpan" value="simpan">SIMPAN</button>
			</div>
		</form>
		<?php
			$nilai 		= $con->query("select mapel_id,siswa_nis from tbl_transkrip where siswa_nis = $kode");
			$input  	= $nilai->fetch_assoc();
			$mapelkd 	= $input[mapel_id];


			if (@$_POST[simpan]=='simpan')
			{
				@$mapel  		= $_POST[nm_pelajaran];
				@$program_id  	= $dtsiswa[program_id];
				@$siswa 		= $dtsiswa[siswa_nis];
				@$sms1 			= $_POST[sms1];
				@$sms2 			= $_POST[sms2];
				@$sms3 			= $_POST[sms3];
				@$sms4 			= $_POST[sms4];
				@$sms5 			= $_POST[sms5];
				@$us 			= $_POST[us];
		
				if ($mapelkd != $mapel)
				{
				@$simpan = $con->query("insert into tbl_transkrip set 
												mapel_id 		= '$mapel',
												program_id		= '$program_id',
												siswa_nis 		= '$siswa',
												sms_1			= '$sms1',
												sms_2			= '$sms2',
												sms_3			= '$sms3',
												sms_4			= '$sms4',
												sms_5			= '$sms5',
												us 				= '$us',
												un 				= 0

											");
				}
				
				echo"<meta http-equiv='refresh' content='0.2;?page=master-transkrip-nilai'>";
				
			}
		?>
	</div>
