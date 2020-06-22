<?php
	//error_reporting(0);
	@$semester 	=$_GET['semester'];
	@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombel-kd'];
	@$kur 		=$_GET['kur'];
	@$mapelkd 	=$_GET['mapelrombel'];
	@$guru 		=$_GET['guru'];

	
	//echo"$kode";
//	echo"$guru";
	include "query_semester.php";


	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
	//assoc
	@$hasil	 	= $con->query($query); 
	@$aa		= $hasil->fetch_assoc();

	
		
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<a href='?page=data-pelajaran'><button class="btn btn-danger"><i class='fa fa-backward'></i> Kembali</button></a>
				<button class = "btn btn-success" disabled="true"><?php echo"$aa[mapel_nama] - KKM: $aa[kkm] - $aa[guru_nama] "; ?></button>
				<?php echo"
				<a href='?page=cetak-nilai-pengetahuan-isi&mapel-kd=$kode&rombel-kd=$rombel&kur_id=2&semester=$semester'><button class='btn btn-warning'><i class='fa fa-print'></i> Cetak Nilai</button></a>
				";
				?>
				
				<?php echo"
				<a href='?page=cetak-nilai-pengetahuan-kosong&mapel-kd=$kode&rombel-kd=$rombel&kur_id=2&semester=$semester'><button class='btn btn-primary'><i class='fa fa-print'></i> Cetak Blanko</button></a>
				";
				?>
					
				   
				    
			</div>

			<?php

				
					include "kur-k13.php";
				
						
			?>
			
		</div>
	</div>
</div>


