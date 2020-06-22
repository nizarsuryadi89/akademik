<?php
	$kode 		= $_GET['siswanis'];
	$tampil		= $con->query("select * from tbl_siswa a inner join tbl_orangtua b on a.siswa_id=b.siswa_id
								 where a.siswa_id='$kode' ");
	$aa 		= $tampil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					Update Data Siswa
				</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<form action ="" method="POST" class="" enctype="multipart/form-data">
					<div class="col-md-6">
							<div class="form-group">
			                  <label class="control-label" for="nis">NIS </label>
			                 <?php echo"$aa[siswa_nis]"; ?>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="nisn">NISN</label>
			                  <?php echo"$aa[siswa_nisn]"; ?>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="nama">Nama Lengkap</label>
			                 <?php echo"$aa[siswa_nama]"; ?>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="tempat">Tempat Lahir</label>
			                  <input type="text" name="tempat" class="form-control" id="tempat" value="<?php echo"$aa[siswa_tempatlahir]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="tanggal">Tanggal Lahir</label>
			                  <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo"$aa[siswa_tanggallahir]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="jk">Jenis Kelamin</label>
			                  <select class="form-control" name="jk" id="jk">
			                  		<option>Laki-Laki</option>
			                  		<option>Perempuan</option>
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
			              		<?php echo"<img src='../assets/foto-siswa/$aa[siswa_foto]' class='img-rounded' width='40' height='30'> ";
			              		?>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="foto">Foto 3x4 Terbaru</label>
			                  <input type="file" name="foto" class="form-control" id="foto" required>
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
			        		<h4>Identitas Akademik</h4><hr>
			              	<div class="form-group">
			                  <label class="control-label" for="asalsekolah">Asal Sekolah (SMP/MTs)</label>
			                  <input type="text" name="asalsekolah" class="form-control" id="asalsekolah" value="<?php echo"$aa[siswa_asalsekolah]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="asalsekolah">Lulus Tahun</label>
			                  <input type="text" name="asalsekolah" class="form-control" id="asalsekolah" value="<?php echo"$aa[siswa_asalsekolah]"; ?>">
			              	</div>
			              	<h4>Identitas Orang Tua</h4><hr>
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
			        </div>
			    </div>
			 
			    <div class="row">
				    <div class="col-md-12"> <hr>
				    	<div class="col-md-4">
				    	</div>
					    <div class="col-md-4">
					        <button type="reset" class="btn-danger">Reset</button>
					        <input type="submit" class="btn-success" name="btnUpload" value='simpan'></button>
					    </div>
					    <div class="col-md-4">
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
	$folder		= '../assets/berita-foto/';
	$file_type	= array('jpg');
	$max_size	= 10000000; // 10MB

	if(isset($_POST['btnUpload']))
	{
		$file_name	= $_FILES['data_upload']['name'];
		$file_size	= $_FILES['data_upload']['size'];

		@$kodeberita 	= $_POST[kdberita];
		@$judulberita	= $_POST[judulberita];
		@$isiberita		= $_POST[isiberita];

		$file 			= "berita-".round(microtime(true)).".".end($file_type);
		$sumber			= $_FILES['data_upload']['tmp_name'];
		$upload			= move_uploaded_file($sumber, $folder.$file);

		if($upload)
		{
			$tambahberita = $con->query("insert into tbl_berita set 
											berita_kode		=   '$kodeberita',
											berita_judul 	=	'$judulberita',
											berita_isi		= 	'$isiberita',
											berita_tgl 		=	'$date',
											berita_posted	=	'$nama',
											berita_foto		=	'$file'
										");		
			echo"<meta http-equiv='refresh' content='0.2;?page=data-berita'>";
		}
		else
		{
			echo"upload gagal";
		}

	}

?>