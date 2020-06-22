<?php
	//error_reporting(0);
	@$semester 	=$_GET['semester'];
	@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombel-kd'];
	@$kur 		=$_GET['kur-id'];
	
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
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href='?page=data-pelajaran'><button class="btn btn-danger"><i class='fa fa-backward'></i> Kembali</button></a>
				
				<?php echo"
				<a href='?page=cetak-nilai-keterampilan-isi&mapel-kd=$kode&rombel-kd=$rombel&kur_id=2&semester=$semester'><button class='btn btn-warning'><i class='fa fa-print'></i> Cetak Nilai</button></a>
				";
				?>
				   

				    <div class="heading" align="right">
				      
				    </div>
			</div>

			<?php

					include "kur-k13-keterampilan.php";
				
						
			?>
			
		</div>
	</div>
</div>

