<?php
	$tampil		= $con->query("select * from tbl_siswa a inner join tbl_orangtua b on a.siswa_id=b.siswa_id
								 where a.siswa_nis='$username' ");
	$aa 		= $tampil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-12">
		<form action ="" method="POST" class="" enctype="multipart/form-data">
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class='glyphicon glyphicon-question-sign'></i> </button></a>
				<button type="submit" class="btn btn-success" name="btnUpload" value='simpan'><i class="fa fa-save"></i></button>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-6">
						<div class="form-group">
		                  <label class="control-label" for="nis">NIS </label>
		                  <input type="number" name="nis" class="form-control" id="nis" value="<?php echo"$aa[siswa_nis]"; ?>" readonly>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="nisn">NISN</label>
		                  <input type="number" name="nisn" class="form-control" id="nisn" value="<?php echo"$aa[siswa_nisn]"; ?>">
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="nama">Nama Lengkap</label>
		                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo"$aa[siswa_nama]"; ?>">
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="tempat">Tempat Lahir</label>
		                  <input type="text" name="tempat" class="form-control" id="tempat" value="<?php echo"$aa[siswa_tempatlahir]"; ?>">
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="tanggal">Tanggal Lahir</label>
		                  <input type="date" name="tanggal"  class="form-control" id="tanggal" value="<?php echo"$aa[siswa_tanggallahir]"; ?>">
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="jk">Jenis Kelamin</label>
		                  <select class="form-control" name="jk" id="jk">
		                  		<option value='L'>Laki-Laki</option>
		                  		<option value='P'>Perempuan</option>
		                  </select>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="alamatsiswa">Alamat Siswa</label>
		                  <textarea class="form-control" name="alamatsiswa" rows="8" id="alamatsiswa"><?php echo"$aa[siswa_alamat]";?></textarea>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="agama">Agama</label>
		                  <select class="form-control" name="agama" id="agama">
		                  		<option value="1">Islam</option>
		                  		
		                  </select>
		              	</div>
		              
		              	
		              	<div class="form-group">
		                  <label class="control-label" for="hp">No HP</label>
		                  <input type="text" name="hp" class="form-control" id="hp" value="<?php echo"$aa[siswa_hp]"; ?>">
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="email">Alamat Email</label>
		                  <input type="text" name="email" class="form-control" id="email" value="<?php echo"$aa[siswa_email]"; ?>">
		              	</div>
			        </div>
			        <div class="col-md-6">
			        		
			              	<div class="form-group">
			                  <label class="control-label" for="asalsekolah">Asal Sekolah (SMP/MTs)</label>
			                  <input type="text" name="asalsekolah" class="form-control" id="asalsekolah" value="<?php echo"$aa[siswa_asalsekolah]"; ?>">
			              	</div>
			              	
			              
			              	<div class="form-group">
			                  <label class="control-label" for="namaayah">Nama Ayah</label>
			                  <input type="text" name="namaayah" class="form-control" id="namaayah" value="<?php echo"$aa[ortu_namaayah]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="namaibu">Nama Ibu</label>
			                  <input type="text" name="namaibu" class="form-control" id="namaibu" value="<?php echo"$aa[ortu_namaibu]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="alamatortu">Alamat Orang Tua</label>
			                  <textarea class="form-control" name="alamatortu" rows="8" id="alamatortu"><?php echo"$aa[ortu_alamat]";?></textarea>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="telportu">Telp Orang Tua</label>
			                  <input type="text" name="telportu" class="form-control" id="telportu" value="<?php echo"$aa[ortu_telp]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="pekerjaanaayah">Pekerjaan Ayah</label>
			                  <input type="text" name="pekerjaanaayah" class="form-control" id="pekerjaanaayah" value="<?php echo"$aa[ortu_pekerjaanayah]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="pekerjaanibu">Pekerjaan Ibu</label>
			                  <input type="text" name="pekerjaanibu" class="form-control" id="pekerjaanibu" value="<?php echo"$aa[ortu_pekerjaanibu]"; ?>">
			              	</div>
			              	<div class="form-group">
		                  <label class="control-label" for="foto">
		                  	<?php 
		                  		if (@$aa[siswa_foto]=='')
		                  		{
		                  		echo"<img src='../img/foto-siswa/avatar.png' class='img-rounded' width='140' height='170'> ";
		                  		}
		                  		else
		                  		{
		                  		echo"<img src='../img/foto-siswa/$aa[siswa_foto]' class='img-rounded' width='120' height='170'> ";
		                  		}
		              		?>
		                  Foto 3x4 Terbaru</label>
		                  <input type="file" name="foto" class="form-control" id="foto" >
		              	</div>
			        </div>
			    </div>
			 
			   
			</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$folder		= '../assets/foto-siswa/';
	$file_type	= array('jpg','png');
	$max_size	= 10000000; // 10MB

	if(isset($_POST['btnUpload']))
	{
		$file_name	= $_FILES['foto']['name'];
		$file_size	= $_FILES['foto']['size'];

		@$nis 			= $_POST[nis];
		@$nisn 			= $_POST[nisn];
		@$nama  		= $_POST[nama];
		@$tempat   		= $_POST[tempat];
		@$tanggal  		= $_POST[tanggal];
		@$jk	   		= $_POST[jk];
		@$alamatsiswa   = $_POST[alamatsiswa];
		@$agama   		= $_POST[agama];
		@$hp   			= $_POST[hp];
		@$email   		= $_POST[email];
		@$asalsekolah 	= $_POST[asalsekolah];

		$file 			= "$nama.".end($file_type);
		$sumber			= $_FILES['foto']['tmp_name'];
		$upload			= move_uploaded_file($sumber, $folder.$file);

		$tambahberita = $con->query("update tbl_siswa set 
											siswa_nis			=   '$nis',
											siswa_nisn 			=	'$nisn',
											siswa_nama			= 	'$nama',
											siswa_tempatlahir 	=	'$tempat',
											siswa_tanggallahir	=	'$tanggal',
											siswa_jk			=	'$jk',
											siswa_alamat		=	'$alamatsiswa',
											agama_kode			=	'$agama',
											siswa_asalsekolah	=	'$asalsekolah',
											siswa_hp 			=	'$hp',
											siswa_email 		=	'$email'
											
										 where siswa_id			=	 $id

										");		

			
			echo"<meta http-equiv='refresh' content='0.2;?page=data-siswa'>";

		if($upload)
		{
			$tambahberita = $con->query("update tbl_siswa set 
											siswa_foto			=	'$file'
										 where siswa_id			=	 $kode

										");		

			
			echo"<meta http-equiv='refresh' content='0.2;?page=data-siswa'>";
		}
		else
		{
			echo"upload gagal";
		}

	}

?>