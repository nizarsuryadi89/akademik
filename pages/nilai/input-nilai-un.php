<?php
	$kode 		= $_GET['nis-siswa'];
	$datasiswa 	= $con->query("select * from tbl_siswa where siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];
	@$program 	= $dtsiswa[program_id];
?>
	<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="javascript:history.back()" class="btn btn-grey">
				<i class="ace-icon fa fa-arrow-left"></i>
				Go Back
			</a>

    	</div>
		<div class="panel-body">
			<div class="col-lg-12">
	            <dl>
	                <dt>Nis : <?php echo"$dtsiswa[siswa_nis]"?></dt>
	                <dt>Nama Lengkap : <?php echo"$dtsiswa[siswa_nama]";?></dt>
	                <dt>Tempat/Tanggal Lahir : <?php echo"$dtsiswa[siswa_tempatlahir] / $dtsiswa[siswa_tanggallahir]";?></dt>               
	            </dl>
	            
	        </div>
       		
       			<div class="col-lg-8">
       				<h3>Nilai Ujian Nasional</h3>
       				<hr>
       			</div>
       		
			<div class="col-lg-8">
			<form action='' method='POST'>
				<div class="form-group has-default">
					<label class="control-label" for="program">Program Keahlian</label>
					<select name="program" class="form-control">
						<option value="1">Rekayasa Perangkat Lunak</option>
						<option value="2">Teknik Sepeda Motor</option>
					</select>

				</div>
				<div class="form-group has-default">
					<label class="control-label" for="nomorujian">Nomor Ujian</label>
					<input type='text' name="nomorujian" class="form-control" id="nomorujian">
				</div>
				<div class="form-group has-default">
					<label class="control-label" for="bhsindo">Bahasa Indonesia</label>
					<input type='hidden' name="siswa_nis" class="form-control" value="<?php echo $nis ;?>">
					<input type='text' name="bhsindo" class="form-control" id="bhsindo">
				</div>
				<div class="form-group has-default">
					<label class="control-label" for="bhsing">Bahasa Inggris</label>
					<input type='text' name="bhsing" class="form-control" id="bhsing">
				</div>
				<div class="form-group has-default">
					<label class="control-label" for="matematika">Matematika</label>
					<input type='text' name="matematika" class="form-control" id="matematika">
				</div>
				
				<div class="form-group has-default">
					<label class="control-label" for="kompkejuruan">Kompetensi Kejuruan</label>
					<input type='text' name="kompkejuruan" class="form-control" id="kompkejuruan">
				</div>
				
				<div class="form-group has-default">
					<button class="btn btn-success" name="simpan" value="simpan">SIMPAN</button>
				</div>
			</form>
			<?php
				
				if (@$_POST[simpan]=='simpan')
				{
					@$nomorujian  	= $_POST[nomorujian];
					@$program   	= $_POST[program];
					@$siswa 		= $_POST[siswa_nis];
					@$bhsindo 		= $_POST[bhsindo];
					@$matematika 	= $_POST[matematika];
					@$bhsing 		= $_POST[bhsing];
					@$kompkejuruan 	= $_POST[kompkejuruan];
			
					@$simpan = $con->query("insert into tbl_nilai_un set 
													program_id 			= '$program',
													nomor_ujian			= '$nomorujian',
													siswa_nis 			= '$siswa',
													bahasa_indonesia	= '$bhsindo',
													matematika 			= '$matematika',
													bahasa_inggris		= '$bhsing',
													kompetensi_kejuruan	= '$kompkejuruan'
													

												");
					
					echo"<meta http-equiv='refresh' content='0.2;?page=master-transkrip-nilai&ket=$nis'>";
					
				}
			?>
		</div>
