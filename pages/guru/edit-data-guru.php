<?php
	$kode 		= $_GET['idguru'];
	$tampil		= $con->query("select * from tbl_guru a inner join
                               tbl_tahun b on a.tmt=b.tahun_id inner join 
                                tbl_pendidikan c on a.guru_pendidikan =c.pendidikan_id inner join tbl_jabatan d on a.jabatan_id=d.jabatan_id
                                where guru_id = $kode");
	$aa 		= $tampil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<a href="?page=Data Guru"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i>Kembali Ke Data guru</button></a>
		
		
				
			</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="row">
					    <div class="col-md-12" align="right">
					    	<div class="row">
						    	<div class="col-md-8">
						    		<button type="submit" class="btn btn-primary" name="btnUpload" value='simpan'><span class='glyphicon glyphicon-print'></span> Cetak</button>
						    	</div>
					<form action ="" method="POST" class="" enctype="multipart/form-data">
					
					    		<div class="col-md-2">		        
						        	<button type="submit" class="btn btn-success" name="btnUpload" value='simpan'><span class='glyphicon glyphicon-edit'></span> Update</button>
						        </div>
						    </div>
						    <div class="col-md-4">
					    	</div>
						</div>
			       	</div>
			       	<hr>
					<div class="col-md-6">
							<div class="form-group">
			                  <label class="control-label" for="nuptk">NUPTK/Peg ID</label>
			                  <input type="number" name="nuptk" class="form-control" id="nuptk" value="<?php echo"$aa[guru_nuptk]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="nip">NIY</label>
			                  <input type="text" name="nip" class="form-control" id="nip" value="<?php echo"$aa[guru_nip]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="nama">Nama Lengkap</label>
			                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo"$aa[guru_nama]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="tempat">Tempat Lahir</label>
			                  <input type="text" name="tempat" class="form-control" id="tempat" value="<?php echo"$aa[guru_tempatlahir]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="tanggal">Tanggal Lahir</label>
			                  <input type="date" name="tanggal"  class="form-control" id="tanggal" value="<?php echo"$aa[guru_tgllahir]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="jk">Jenis Kelamin</label>
			                  <select class="form-control" name="jk" id="jk">
			                  		<option value='L'>Laki-Laki</option>
			                  		<option value='P'>Perempuan</option>
			                  </select>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="alamat">Alamat</label>
			                  <textarea class="form-control" name="alamat" rows="8" id="alamat"><?php echo"$aa[guru_alamat]";?></textarea>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="agama">Agama</label>
			                  <select class="form-control" name="agama" id="agama">
			                  		<option value="1">Islam</option>
			                  		
			                  </select>
			              	</div>
			        </div>
			        <div class="col-md-6">
			        		<div class="form-group">
			                  <label class="control-label" for="nosk">No SK</label>
			                  <input type="text" name="nosk"  class="form-control" id="nosk" value="<?php echo"$aa[no_sk]"; ?>">
			              	</div>
			        		<div class="form-group">
			                  <label class="control-label" for="jabatan">Jabatan</label>
			                  <select class="form-control" name="jabatan" id="jabatan">
			                  	<?php
			                  		$panggil_jabatan=$con->query("select * from tbl_jabatan");
			                  		while($jbtn = $panggil_jabatan->fetch_array())
			                  			{
			                  				if($jbtn[jabatan_id]==$aa[jabatan_id])
			                  				{
			                  					echo"<option value='$jbtn[jabatan_id]' selected>$jbtn[jabatan_nama]</option>";
			                  				}else
			                  				{
			                  					echo"<option value='$jbtn[jabatan_id]'>$jbtn[jabatan_nama]</option>";
			                  				}
			                  			}
			                  	?>
			                  </select>
			              	</div>
			        		<div class="form-group">
			                  <label class="control-label" for="foto">
			                  	<?php 
			                  		if (@$aa[guru_foto]=='')
			                  		{
			                  		echo"<img src='../../assets/foto-guru/avatar.png' class='img-rounded' width='140' height='170'> ";
			                  		}
			                  		else
			                  		{
			                  		echo"<img src='../../assets/foto-guru/$aa[guru_foto]' class='img-rounded' width='140' height='170'> ";
			                  		}
			              		?>
			                  Foto 3x4 Terbaru</label>
			                  <input type="file" name="foto" class="form-control" id="foto" >
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="hp">No HP</label>
			                  <input type="text" name="hp" class="form-control" id="hp" value="<?php echo"$aa[guru_hp]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="email">Alamat Email</label>
			                  <input type="text" name="email" class="form-control" id="email" value="<?php echo"$aa[guru_email]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="pendidikanterakhir">Pendidikan Terakhir</label>
			                  <select class="form-control" name="pendidikanterakhir" id="pendidikanterakhir">
			                  	<?php
			                  		$panggil_pendidikan=$con->query("select * from tbl_pendidikan");
			                  		while($pndkn = $panggil_pendidikan->fetch_array())
			                  			{
			                  				if($pndkn[pendidikan_id]==$aa[pendidikan_id])
			                  				{
			                  					echo"<option value='$pndkn[pendidikan_id]' selected>$pndkn[pendidikan_jenjang]</option>";
			                  				}
			                  				else
			                  				{
			                  					echo"<option value='$pndkn[pendidikan_id]'>$pndkn[pendidikan_jenjang]</option>";
			                  				}
			                  			}
			                  	?>
			                  </select>
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="jurusan">Jurusan</label>
			                  <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?php echo"$aa[guru_jurusan]"; ?>">
			              	</div>
			              	<div class="form-group">
			                  <label class="control-label" for="tahunlulus">Lulus Tahun</label>
			                  <select class="form-control" name="tahunlulus" id="tahunlulus">
			                  	<?php
			                  		$panggil_tahun=$con->query("select * from tbl_tahun");
			                  		while($thn = $panggil_tahun->fetch_array())
			                  			{
			                  				if ($thn[tahun_id]==$aa[tahun_id])
			                  				{
			                  				echo"<option value='$thn[tahun_id]' selected>$thn[tahun]</option>";
			                  				}
			                  				else
			                  				{
			                  					echo"<option value='$thn[tahun_id]'>$thn[tahun]</option>";
			                  				}
			                  			}
			                  	?>
			                  </select>
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
	$folder		= '../../assets/foto-guru/';
	$file_type	= array('jpg','png','jpeg');
	$max_size	= 10000000; // 10MB

	if(isset($_POST['btnUpload']))
	{
		$file_name	= $_FILES['foto']['name'];
		$file_size	= $_FILES['foto']['size'];

		@$nama 			= $_POST[nama];
		@$nuptk 		= $_POST[nuptk];
		@$nip  			= $_POST[nip];
		@$tempat   		= $_POST[tempat];
		@$tanggal  		= $_POST[tanggal];
		@$jk	   		= $_POST[jk];
		@$alamat 	  	= $_POST[alamat];
		@$agama   		= $_POST[agama];
		@$hp   			= $_POST[hp];
		@$email   		= $_POST[email];
		@$jabatan 		= $_POST[jabatan];
		@$pendidikanterakhir = $_POST[pendidikanterakhir];
		@$jurusan 		= $_POST[jurusan];
		@$tahunlulus 	= $_POST[tahunlulus];
		@$nosk 	= $_POST[nosk];

		$file 			= "$nama.".end($file_type);
		$sumber			= $_FILES['foto']['tmp_name'];
		$upload			= move_uploaded_file($sumber, $folder.$file);

		$editguru = $con->query("update tbl_guru set 
											guru_nuptk			=   '$nuptk',
											guru_nip 			=	'$nip',
											guru_nama			= 	'$nama',
											guru_tempatlahir 	=	'$tempat',
											guru_tgllahir		=	'$tanggal',
											guru_jk				=	'$jk',
											guru_alamat			=	'$alamat',
											agama_kode			=	'$agama',
											guru_pendidikan		=	'$pendidikanterakhir',
											guru_jurusan		=	'$jurusan',
											jabatan_id			=	'$jabatan',
											guru_hp 			=	'$hp',
											no_sk 				=	'$nosk',
											tmt 				=	'$tahunlulus',
											guru_email 			=	'$email'
											
										 where guru_id			=	 $kode

										");		

			
			echo"<meta http-equiv='refresh' content='0.2;?page=Data Guru'>";

		if($upload)
		{
			$editfoto = $con->query("update tbl_guru set 
											guru_foto			=	'$file'
										 where guru_id			=	 $kode

										");		

			
			echo"<meta http-equiv='refresh' content='0.2;?page=Data Guru'>";
		}
		else
		{
			echo"upload gagal";
		}

	}

?>