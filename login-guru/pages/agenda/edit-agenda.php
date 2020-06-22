<?php
    @$kode 		= $_GET[kode];
    $agenda     = $con->query("select * from tbl_agenda where agenda_id = $kode");
    $ab         = $agenda->fetch_assoc();
    
	$sql 		= "select * from tbl_mapelrombel a inner join 
						tbl_mapel b on a. mapel_id=b.mapel_id inner join 
							tbl_rombel c on a.rombel_id=c.rombel_id
								where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $userkd 
									order by c.kelas_id desc";
									
	$sql1 		= "select * from tbl_mapelrombel a inner join 
						tbl_mapel b on a. mapel_id=b.mapel_id inner join 
							tbl_rombel c on a.rombel_id=c.rombel_id
								where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $userkd group by c.rombel_id
									order by c.kelas_id desc  ";
									
									
									
	$query		= $con->query($sql);
	$rombel 	= $con->query($sql1);
?>
<script>    
	$(document).ready(function(){
	 $("#kirim").click(function(){
	 var ed = tinyMCE.get('tanyasoal');
	 
	    // Do you ajax call here, window.setTimeout fakes ajax call
	    ed.setProgressState(1); // Show progress
	    window.setTimeout(function() {
	        ed.setProgressState(0); // Hide progress
	        //alert(ed.getContent());
	    }, 2000);

	var a = tinymce.get('tanyasoal').getContent();
</script>
<div class="col-lg-12">
	
	<div class="row">
		<div class="panel panel-default">
			<div class=panel-heading>
				<a href="?page=agenda-harian"><button type='button'  class='btn btn-warning'><i class="fa fa-backward"></i></button></a>
			</div>
			
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form action ="" method="POST" class="" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-12" align="left">
					        		<input type='submit' class='btn btn-success' name='btnUpload' value='simpan'>
					        	</div>  
					        </div>
					        <hr>
					        <div class="row">
								<div class="col-lg-4">
									<div class="form-group">               
					                    <label for="inputPassword3">Hari / Tanggal</label>
					           			<div class="row">
											<div class="col-lg-6">
												<input type='hidden' name='guru' value='<?php echo "$af[guru_id]"?>'>
								                <select class="form-control" name='hari' autofocus>
				                                	<option value="senin">Senin</option>
				                                	<option value="selasa">Selasa</option>
				                                	<option value="rabu">Rabu</option>
				                                	<option value="kamis">Kamis</option>
				                                	<option value="jumat">Jumat</option>
				                                	<option value="sabtu">Sabtu</option>
						                                	
						                        </select>
						                    </div>
						          			<div class="col-lg-6">
				                           		<input type="date"  name='tgl' class="form-control" id="tgl" value="<?php echo "$ab[agenda_tgl]"; ?>">
				                           	</div>
				                        </div>	
					                </div>
					            </div>
					        
			                    <div class="row">  
									<div class="col-lg-4">
										<div class="form-group">          
					                        <label for="inputPassword3">Mata Pelajaran/Rombel</label>
					                   	        
					                        <select class="form-control" name='mapel'>
					                                <?php 
					                                	while ($aa=$query->fetch_array())
					                                	{
					                                		echo"<option value='$aa[mapel_id]'>$aa[mapel_nama]</option>";
					                                	}
					                                ?>			                                	
					                        </select>
					                        <br>
					                        <select class="form-control" name='rombel'>
					                                <?php 
					                                	while ($aa=$rombel->fetch_array())
					                                	{
					                                		if ($aa[rombel_id]==$ab[rombel_id])
					                                		{
					                                			echo"<option value='$aa[rombel_id]' selected>$aa[rombel_nama]</option>";
					                                		}
					                                		echo"<option value='$aa[rombel_id]'>$aa[rombel_nama]</option>";
					                                	}
					                                ?>			                                	
					                        </select>
					                	</div>
					                </div>
					                    
					            </div> 
					              
					         </div>
					         <div class="row">  
									<div class="col-lg-4">
										<div class="form-group">          
					                        <label for="inputPassword3">Jam ke - </label>
					                        <input type="number"  name='mulai' class="form-control" <?php echo "value='$ab[agenda_jammulai]' "; ?>>
					                	</div>

					                </div>
					                <div class="col-lg-4">
										<div class="form-group">          
					                        <label for="inputPassword3">Sampai Jam Ke -</label>
					                         <input type="number"  name='selesai' class="form-control" <?php echo "value='$ab[agenda_jamselesai]' "; ?>>
					                	</div>

					                </div>
					                
					                    
					            </div> 
					        <div class="row">
					        	<div class="col-lg-12">
									<div class="form-group">
										 <label for="inputPassword3">Catatan Kegiatan Harian</label>
										 <textarea align= "right" name= "isi" id="tanyasoal" class="form-control ckeditor" ><?php echo "$ab[agenda_isi] "; ?></textarea>
									</div>
								</div>
					        </div>
					        <div class="row">
					        	<div class="col-lg-3">
									<div class="form-group">
										 <label for="inputPassword3">Foto Kegiatan Harian</label>
										 <input type="file" class="form-control" name="data_upload">
									</div>
								</div>
					        </div>
		                </form>
					</div>
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

		
		@$guru 			= $_POST[guru];
		@$rombel 		= $_POST[rombel];
		@$hari 		 	= $_POST[hari];
		@$tanggal 		= $_POST[tgl];
		@$mapel 		= $_POST[mapel];
		@$jammulai 		= $_POST[mulai];
		@$jamselesai	= $_POST[selesai];
		
		@$isi 			= $_POST[isi];

		$file 			= "berita-".round(microtime(true)).".".end($file_type);
		$sumber			= $_FILES['data_upload']['tmp_name'];
		$upload			= move_uploaded_file($sumber, $folder.$file);

		if($upload)
		{
			$tambahberita = $con->query("update tbl_agenda set 
											agenda_foto			=	'$file'
											
											where agenda_id = $kode
										");		
			
			echo"<meta http-equiv='refresh' content='0.2;?page=agenda-harian'>";
		
		}
		else
		{
			echo"upload gagal";
		}
			$tambahberita = $con->query("update tbl_agenda set 
											guru_id 			=	'$guru',
											rombel_id			= 	'$rombel',
											agenda_hari 		=	'$hari',
											agenda_tgl			=	'$tanggal',
											mapel_id			=	'$mapel',
											agenda_jammulai 	= 	'$jammulai',
											agenda_jamselesai	= 	'$jamselesai',
											agenda_isi			= 	'$isi'
											
											
											where agenda_id = $kode
										");		
			
			echo"<meta http-equiv='refresh' content='0.2;?page=agenda-harian'>";

	}

?>
