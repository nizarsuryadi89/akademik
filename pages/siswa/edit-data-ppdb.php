<?php
	$kode 		= $_GET['ppdbid'];
	$tampil		= $con->query("select * from tbl_ppdb where ppdb_id=$kode");
	$aa 		= $tampil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<a href="?page=Data PPDB"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</button></a>
		
		
				
			</div>
			<div class="panel-body">
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="col-md-6">
				   
			       <table width="100%">
			       		<tr>
			       			<td><label class="control-label" for="nis">Kode Pendaftaran </label></td>
			       			<td><input type="text" name="kode" class="form-control" id="nis" value="<?php echo"$aa[ppdb_kode]"; ?>" readonly><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Nama Calon Siswa </label></td>
			       			<td><input type="text" name="nama" class="form-control" id="nis" value="<?php echo"$aa[ppdb_siswanama]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Jenis Kelamin </label></td>
			       			<td>
			       				<select name="jk" class="form-control">
			       				<?php 
			       					if ($aa[ppdb_siswajk]=='L')
			       					{
			       						echo "<option value='L' selected>Laki-Laki</option>";
			       						echo"<option value='P'>Perempuan</option>";
			       					}elseif ($aa[ppdb_siswajk]=='P')
			       					{
			       						echo"<option value='P' selected>Perempuan</option>";
			       						echo"<option value='L'>Laki-Laki</option>";
			       					}
			       				?>
			       				
			       					
			       					
			       				</select><br></td>
			       		</tr>
			       		
			       		
			       		<tr>
			       			<td><label class="control-label" for="nis">Tempat Tanggal Lahir </label></td>
			       			<td>
			       				<input type="text" name="tempatlahir" class="form-control" id="nis" value="<?php echo"$aa[ppdb_siswatempatlahir]"; ?>" placeholder="Tempat Lahir"><br>
			       				<input type="date" name="tgllahir" class="form-control" id="nis" value="<?php echo"$aa[ppdb_siswatgllahir]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Alamat </label></td>
			       			<td><textarea class="form-control" rows="5" name="alamat"><?php echo"$aa[ppdb_siswaalamat]"; ?></textarea><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Nama Ayah </label></td>
			       			<td><input type="text" name="namaayah" class="form-control" id="nis" value="<?php echo"$aa[ppdb_ayahnama]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Nama Ibu </label></td>
			       			<td><input type="text" name="namaibu" class="form-control" id="nis" value="<?php echo"$aa[ppdb_ibunama]"; ?>" placeholder="Nama Ibu"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Pekerjaan Ayah</label></td>
			       			<td><input type="text" name="pekerjaanayah" class="form-control" id="nis" value="<?php echo"$aa[ppdb_ayahpekerjaan]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Pekerjaan Ibu</label></td>
			       			<td><input type="text" name="pekerjaanibu" class="form-control" id="nis" value="<?php echo"$aa[ppdb_ibupekerjaan]"; ?>"><br></td>
			       		</tr>
			       	</table>
			    </div>
				<div class="col-md-6">
					<table width="100%">
						<tr>
			       			<td><label class="control-label" for="nis">NISN </label></td>
			       			<td><input type="text" name="nisn" class="form-control" id="nis" value="<?php echo"$aa[ppdb_siswanisn]"; ?>"><br></td>
			       		</tr>
						<tr>
			       			<td><label class="control-label" for="nis">Asal Sekolah </label></td>
			       			<td><input type="text" name="asalsekolah" class="form-control" id="nis" value="<?php echo"$aa[ppdb_asalsekolah]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Program Keahlian Terpilih </label></td>
			       			<td>
			       				<?php 

			       					$jurusan = $con->query("select * from tbl_program");
			       				?>
			       				<select name="program" class="form-control">
			       						<option>Program Keahlian Belum Dipilih</option>
			       					<?php
			       						while ($data=$jurusan->fetch_array())
			       						{
			       							if ($aa[program_id]==$data[program_id])
			       							{
			       								echo "<option value=$data[program_id] selected>$data[program_nama]-$data[program_alias]</option>";
			       							}
			       							echo "<option value=$data[program_id]>$data[program_nama]-$data[program_alias]</option>";
			       						}
			       					?>
			       				</select><br></td>
			       		</tr>
			       		<tr>
			       			<td colspan="2"><br>
			       				<div class="form-group" align="center">
				                  <label class="control-label" for="foto">
				                  	<?php 
				                  		if (@$aa[ppdb_foto]=='')
				                  		{
				                  		echo"<img src='../assets/foto-siswa/noimage.png' class='img-rounded' width='140' height='170'> ";
				                  		}
				                  		else
				                  		{
				                  		echo"<img src='../assets/foto-siswa/$aa[ppdb_foto]' class='img-rounded' width='140' height='170'>  ";
				                  		}
				              		?>
				                  	Foto 3x4 Terbaru
				                  </label>
				                  <input type="file" name="foto" class="form-control" id="foto" >
			              		</div><hr>
			              	</td>
			       		</tr>
			       		<tr>
			       			<td>
			       				<div class="form-group">
			              		
			              		<button type="submit" name="btnUpload" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> SIMPAN</button> 
			              	</div>
			       			</td>
			       		</tr>
			       	</table>	
			    </div>
			 	
			   
			</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$folder		= '../assets/foto-siswa/';
	$file_type	= array('jpg');
	$max_size	= 10000000; // 10MB

	if(isset($_POST['btnUpload']))
	{
		$file_name	= $_FILES['foto']['name'];
		$file_size	= $_FILES['foto']['size'];

		@$kd 			= $_POST[kode];
		@$nama 			= $_POST[nama];
		@$jk  			= $_POST[jk];
		@$tempatlahir   = $_POST[tempatlahir];
		@$tgllahir 		= $_POST[tgllahir];
		@$alamat	   	= $_POST[alamat];
		@$namaayah   	= $_POST[namaayah];
		@$namaibu   	= $_POST[namaibu];
		@$pekerjaanayah = $_POST[pekerjaanayah];
		@$pekerjaanibu	= $_POST[pekerjaanibu];
		@$nisn 	  	 	= $_POST[nisn];
		@$asalsekolah 	= $_POST[asalsekolah];
		@$program 		= $_POST[program];

		$file 			= "$nama.".end($file_type);
		$sumber			= $_FILES['foto']['tmp_name'];
		$upload			= move_uploaded_file($sumber, $folder.$file);

		$tambahberita = $con->query("update tbl_ppdb set 
										ppdb_kode				= '$kode',
										ppdb_siswanama			= '$nama',
										ppdb_siswanisn			= '$nisn',
										ppdb_asalsekolah		= '$asalsekolah',
										program_id				= '$program',
										ppdb_siswatempatlahir	= '$tempatlahir',
										ppdb_siswatgllahir		= '$tgllahir',
										ppdb_siswaalamat		= '$alamat',
										ppdb_siswajk			= '$jk',
										ppdb_ayahnama			= '$namaayah',
										ppdb_ayahpekerjaan		= '$pekerjaanayah',
										ppdb_ibunama			= '$namaibu',
										ppdb_ibupekerjaan		= '$pekerjaanibu'
																								
										where ppdb_id			=	 $kode

										");		

			
			echo"<meta http-equiv='refresh' content='0.2;?page=Data Siswa Aktif'>";

		if($upload)
		{
			$tambahberita = $con->query("update tbl_ppdb set 
											ppdb_foto			=	'$file'
										 where ppdb_id			=	 $kode

										");		

			
			echo"<meta http-equiv='refresh' content='0.2;?page=data-ppdb'>";
		}
		else
		{
			echo"upload gagal";
		}

	}

?>