<?php
	@$kode 		= $_GET['kode'];
	$tampil		= $con->query("select * from tbl_prakerin a inner join tbl_siswa b 
								on a.siswa_id=b.siswa_id where prakerin_id=$kode");
	$aa 		= $tampil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="?page=Praktik Kerja Industri"><button class="btn btn-warning"><i class="fa fa-backward"></i></button></a>
		
		
				
			</div>
			<div class="panel-body">
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="col-md-6">
				   
			       <table width="100%">
			       		<tr>
			       			<td><label class="control-label" for="nis">Nama Siswa <font color="red">*</font></label></td>
			       			<td><input type="text" name="kode" class="form-control" id="nis" value="<?php echo"$aa[siswa_nama]"; ?>" readonly><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">No Induk Siswa <font color="red">*</font></label></td>
			       			<td><input type="text" name="nama" class="form-control" id="nis" value="<?php echo"$aa[siswa_nis]"; ?>" readonly><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Jenis Kelamin <font color="red">*</font></label></td>
			       			<td>
			       				<select name="jk" class="form-control" readonly>
			       				<?php 
			       					if ($aa[siswa_jk]=='L')
			       					{
			       						echo "<option value='L' selected>Laki-Laki</option>";
			       						echo"<option value='P'>Perempuan</option>";
			       					}elseif ($aa[siswa_jk]=='P')
			       					{
			       						echo"<option value='P' selected>Perempuan</option>";
			       						echo"<option value='L'>Laki-Laki</option>";
			       					}
			       				?>
			       				
			       					
			       					
			       				</select><br></td>
			       		</tr>
			       		
			       		
			       		<tr>
			       			<td><label class="control-label" for="nis">Tempat Tanggal Lahir <font color="red">*</font></label></td>
			       			<td>
			       				<input type="text" name="tempatlahir" class="form-control" id="nis" value="<?php echo"$aa[siswa_tempatlahir]"; ?>" placeholder="Tempat Lahir" readonly><br>
			       				<input type="date" name="tgllahir" class="form-control" id="nis" value="<?php echo"$aa[siswa_tanggallahir]"; ?>" readonly><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="pembimbingint">Nama Pembimbing Sekolah</label></td>
			       			<td><input type="text" name="pembimbingint" class="form-control" id="pembimbingint" value="<?php echo"$aa[prakerin_pembimbingint]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td colspan="2"><hr>
			              		<font color="red">*</font> tidak dapat di edit pada form ini</td>
			       		</tr>
			       		
			       	</table>
			    </div>
				<div class="col-md-6">
					<table width="100%">
						
						<tr>
			       			<td><label class="control-label" for="nis">Tempat Prakerin</label></td>
			       			<td><input type="text" name="tempat" class="form-control" id="nis" value="<?php echo"$aa[prakerin_tempat]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Alamat Prakerin</label></td>
			       			<td><textarea class="form-control" rows="5" name="alamat"><?php echo"$aa[prakerin_alamat]"; ?></textarea><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Telp</label></td>
			       			<td><input type="text" name="telp" class="form-control" id="nis" value="<?php echo"$aa[prakerin_telp]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Pimpinan Perusahaan/Instansi</label></td>
			       			<td><input type="text" name="pimpinan" class="form-control" id="nis" value="<?php echo"$aa[prakerin_pimpinan]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Nama Pembimbing Industri</label></td>
			       			<td><input type="text" name="pembimbingext" class="form-control" id="nis" value="<?php echo"$aa[prakerin_pembimbingext]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Tanggal Mulai Prakerin</label></td>
			       			<td><input type="date" name="mulai" class="form-control" id="nis" value="<?php echo"$aa[prakerin_mulai]"; ?>"><br></td>
			       		</tr>
			       		<tr>
			       			<td><label class="control-label" for="nis">Tanggal Akhir Prakerin </label></td>
			       			<td><input type="date" name="akhir" class="form-control" id="nis" value="<?php echo"$aa[prakerin_selesai]"; ?>" placeholder="Nama Ibu"><br></td>
			       		</tr>
			       		<tr>
			       			<td colspan="2">
			       				<div class="form-group">
			              		<hr>
			              		<button type="submit" name="btnUpload" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> EDIT</button> 

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
	
	if(isset($_POST['btnUpload']))
	{
		
		@$pembimbingint 	= $_POST[pembimbingint];
		@$tempat 			= $_POST[tempat];
		@$alamat  			= $_POST[alamat];
		@$pimpinan   		= $_POST[pimpinan];
		@$pembimbingext		= $_POST[pembimbingext];
		@$mulai	   			= $_POST[mulai];
		@$akhir   			= $_POST[akhir];
		@$telp   			= $_POST[telp];
				
		$tambahberita = $con->query("update tbl_prakerin set 
										prakerin_tempat			= '$tempat ',
										prakerin_alamat			= '$alamat',
										prakerin_telp			= '$telp',
										prakerin_mulai			= '$mulai',
										prakerin_selesai		= '$akhir',
										prakerin_pimpinan		= '$pimpinan',
										prakerin_pembimbingext	= '$pembimbingext',
										prakerin_pembimbingint	= '$pembimbingint'
										
																								
										where prakerin_id			=	 $kode

										");		

		
		echo"<meta http-equiv='refresh' content='0.2;?page=Praktik Kerja Industri'>";

		
		
	}

?>