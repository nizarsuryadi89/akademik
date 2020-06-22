<h4>ROMBEL AKTIF</h4>
<!-- /.row -->
<div class="row">
<?PHP 
	$no 	= 1;
	$rombel = $con->query("select * from tbl_rombel a inner join tbl_guru b 
								on a.rombel_wali = b.guru_id where semester_id= $semester and tahun_id= $tahun and rombel_semester=6 order by rombel_semester asc");
	while ($aa=$rombel->fetch_array())
		{
?>
	    <div class="col-lg-6" center>
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h4><?php echo"$aa[rombel_nama] - Semester $aa[rombel_semester]";?></h4>
	            </div>
	            <div class="panel-body">
	            	<div class="col-xs-4">
	                <?php echo"<img src='../assets/foto-guru/$aa[guru_foto]' width='130' height='150' class='img-rounded'> ";?>
	                </div>
	                <div class="col-xs-8">
	                <ul>
	                	<li>Wali Kelas : <?php echo"$aa[guru_nama]";?></li>	
	                	<li>Nama Rombel : <?php echo"$aa[rombel_nama]";?></li>	
	                </div>	
	               
	            </div>
	            <?php
	            	echo" <a href='?page=mapel-rombel&kd-rombel=$aa[rombel_id]'>";
	            ?>
	            <div class="panel-footer">
			        <span class="pull-left">Lihat Detail</span>
			        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
			        <div class="clearfix"></div>
			    </div>
			    </a>
	        </div>
	    </div>    
	
<?php
	$no++;
	}
?>
</div>