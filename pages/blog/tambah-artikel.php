<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="?page=Artikel"><button type='button'  class='btn btn-warning'><i class="fa fa-backward"></i></button></a>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<form action ="" method="POST" class="" enctype="multipart/form-data">
						
		              	<div class="form-group">
		                  <label class="control-label" for="judulberita">Judul Artikel</label>
		                  <input type="text" name="judulberita" class="form-control" id="judulberita" required>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="judulberita">Isi Artikel</label>
		                  <textarea class="form-control ckeditor" placeholder="Isi Berita" rows="5" name="isiberita"></textarea>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="file">Gambar Artikel</label>
		                  <input type="file" name="data_upload" class="form-control" id="file" required>
		              	</div>
		                 
		                  <input type="submit" class="btn btn-success" name="btnUpload" value='simpan'></button>
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
			$tambahberita = $con->query("insert into tbl_artikel set 
											judul 			=	'$judulberita',
											isi_berita		= 	'$isiberita',
											tanggal 		=	'$date',
											penulis			=	'$nama',
											gambar			=	'$file',
											dibaca 			= 	0
										");		
			
			echo"<meta http-equiv='refresh' content='0.2;?page=Artikel'>";
		}
		else
		{
			echo"upload gagal";
		}

	}

?>