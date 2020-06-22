<?php
	@$kode 		 = @$_GET[kode];
	@$dataartikel = $con->query("select * from tbl_artikel where id_berita = $kode");

	$br 		 = $dataartikel->fetch_assoc();

?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="?page=data-artikel"><button type='button'  class='btn btn-warning'><i class="fa fa-backward"></i></button></a>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<form action ="" method="POST" class="" enctype="multipart/form-data">
						
		              	<div class="form-group">
		                  <label class="control-label" for="judulberita">Judul Artikel</label>
		                  <input type="text" <?php echo "value='$br[judul]'"; ?> name="judulberita" class="form-control" id="judulberita" required>
		              	</div>
		              	<div class="form-group">
		                  <label class="control-label" for="judulberita">Isi Artikel</label>
		                  <textarea class="form-control ckeditor" placeholder="Isi Berita" rows="8" name="isiberita"><?php echo "value='$br[isi_berita]'"; ?></textarea>
		              	</div>
		              	<div class="form-group">

		                  <label class="control-label" for="file">
		                  <?php echo "<img class='img img-rounded' width='30%' src='../../assets/berita/$br[gambar]'>";?></label>
		                  <input type="file" name="data_upload" class="form-control" id="file" required>
		              	</div>
		                 	<input type='hidden' <?php echo "value='$br[dibaca]'"; ?> name='dibaca' >
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
		@$dibaca 		= $_POST[dibaca];

		$file 			= "berita-".round(microtime(true)).".".end($file_type);
		$sumber			= $_FILES['data_upload']['tmp_name'];
		$upload			= move_uploaded_file($sumber, $folder.$file);

		if($upload)
		{
			$tambahberita = $con->query("update tbl_artikel set 
											judul 			=	'$judulberita',
											isi_berita		= 	'$isiberita',
											tanggal 		=	'$date',
											penulis			=	'$nama',
											gambar			=	'$file',
											dibaca 			= 	'$dibaca'

											where id_berita 		= $kode
										");		
			
			echo"<meta http-equiv='refresh' content='0.2;?page=data-artikel'>";
		}
		else
		{
			echo"upload gagal";
		}

	}

?>