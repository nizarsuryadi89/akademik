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
	    <div class="col-lg-3">
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h4><?php echo"$aa[rombel_nama] - Semester $aa[rombel_semester]";?></h4>
	            </div>
	            <div class="panel-body">
	            	
	                	<p>
	                		<?php echo"<img src='../foto-guru/$aa[guru_foto]' width='130' height='150' class='img-rounded'> ";?><br>
	                		<?php echo"$aa[guru_nama]";	?>	
	                	</p>
	               
	            </div>
	            <?php
	            	echo" <a href='content.php?page=mapel-rombel&kd-rombel=$aa[rombel_id]'>";
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