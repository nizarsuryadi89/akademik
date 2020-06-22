<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<form action ="" method="POST" class="" enctype="multipart/form-data">
				<a href="?page=data-berita"><button class="btn btn-warning"><i class="fa fa-backward"></i></button></a>
				<button type="submit" class="btn btn-success" name="btnUpload" value='simpan'><i class="fa fa-save"></i></button>
		        
	
			</div>
			<div class="panel-body">
				<div class="form-group">
					
						
		              	<div class="form-group">
		                  <label class="control-label" for="judulberita">Judul Berita</label>
		                  <input type="text" name="judulberita" class="form-control" id="judulberita" required>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="judulberita">Isi Berita</label>
		                  <textarea class="form-control ckeditor" placeholder="Isi Berita" rows="5" name="isiberita"></textarea>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="file">Foto Berita</label>
		                  <input type="file" name="data_upload" class="form-control" id="file" required>
		              	</div>
		                 
		                  
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$folder		= '../../assets/berita/';
	$file_type	= array('jpg','PNG');
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
											judul 			=	'$judulberita',
											isi_berita		= 	'$isiberita',
											tanggal 		=	'$date',
											penulis			=	'$nama',
											gambar			=	'$file',
											dibaca 			= 	0
										");		
			ECHO "insert into tbl_berita set 
											judul 			=	'$judulberita',
											isi_berita		= 	'$isiberita',
											tanggal 		=	'$date',
											penulis			=	'$nama',
											gambar			=	'$file',
											dibaca 			= 	0";
			//echo"<meta http-equiv='refresh' content='0.2;?page=data-berita'>";
		}
		else
		{
			echo"upload gagal";
		}

	}

?>