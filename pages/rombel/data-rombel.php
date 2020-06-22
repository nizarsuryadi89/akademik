	<div class="panel panel-default">
		<div class="panel-heading" >
			 <a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class='glyphicon glyphicon-question-sign'></i> </button></a>
  	 		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Rombel</button>
  	 	</div>
  	 	<div class="panel-body" align="center">
<?PHP 
	$no 	= 1;
	$rombel = $con->query("select * from tbl_rombel a inner join tbl_guru b 
								on a.rombel_wali = b.guru_id inner join tbl_kurikulum c on 
									a.kur_id=c.kur_id where semester_id= $semester and tahun_id= $tahun order by rombel_semester asc");
	$jumm 	= mysqli_num_rows($rombel);
	echo "<h4>Jumlah Rombel : $jumm Rombel </h4> <br>";

	while ($aa=$rombel->fetch_array())
		{
			
			$jumlah = $con->query("select * from tbl_pesertarombel where rombel_id=$aa[rombel_id]");
			$jum    = mysqli_num_rows($jumlah);

			
?>
	    <div class="col-md-3 col-xm-12 col-md-4">
	        <div class="panel panel-info">
	            <div class="panel-heading" align="center">
	                
	                <h5><?php echo"Kurikulum : $aa[kur_nama]";?></h5>
	                
	                <h5><?php echo"Semester  : $aa[rombel_semester]";?></h5>
	                
	            </div>
	            <div class="panel-body">
	            	<div class="col-md-12" align="center">
	                		<?php echo"<img src='assets/foto-guru/$aa[guru_foto]' width='70' height='90' class='img-rounded'> ";?>
	                </div>
	                <div class="col-md-12" align="center">
						<hr><p>
	                		Wali Kelas : <br><?php echo"$aa[guru_nama]";	?>	<br>
	                	</p>	
	                </div>
	                <div class="col-md-12" align="center">
	                	<a href="<?php echo "?page=cetak-raport-pat&rombel-kode=$aa[rombel_id]&semester=$aa[rombel_semester]";?>"><button class="btn btn-primary"><i class='fa fa-print'></i> &nbsp; Raport</button></a>
	                	<?php if (@$aa[rombel_semester] != 6 )
	                	{ ?>
	                	<a href="?page=Legger&rombel=<?php echo "$aa[rombel_id]&semester=$aa[rombel_semester]";?>"><button class="btn btn-primary"><i class='fa fa-print'></i> &nbsp; Legger</button></a>
	                	<?php
	                	} else{
	                	?>
	                	<a href="?page=Legger&rombel=<?php echo "$aa[rombel_id]&semester=$aa[rombel_semester]";?>"><button class="btn btn-primary"><i class='fa fa-print'></i> &nbsp; Trans</button></a>
	                	<?php	
	                	}
	                	?>
	                </div>
	               
	            </div>
	            <?php
	            	echo" <a href='?page=mapel-rombel&kd-rombel=$aa[rombel_id]'>";
	            ?>
	            <div class="panel-footer">
	                
			        <span class="pull-left">  Input Nilai </span>
			        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
			        <div class="clearfix"></div>
			    </div>
				</a>
				<?php
					echo"<a href='?page=pembelajaran-rombel&kd-rombel=$aa[rombel_id]'>";
				?>

					<div class="panel-footer">
					<span class="pull-left">  Struktur Kurikulum </span>
			        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
			        <div class="clearfix"></div>
					</div>
				</a>
				<?php
					echo"<a href='?page=peserta-rombel&rombel-kd=$aa[rombel_id]'>";
				?>
					<div class="panel-footer">
					<span class="pull-left">  Data Siswa: <?php echo "$jum "; ?> - Orang </span>
			        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
			        <div class="clearfix"></div>
					</div>
				     
			    </a> 
				<div class="panel-footer">
					
					<?php
						$mapelrombel = $con->query("select * from tbl_nilaipengetahuan where rombel_id=$aa[rombel_id]");
						$jml 		 = mysqli_num_rows($mapelrombel);
						
						
						
						$ceknilai	= $con->query("select * from tbl_nilaipengetahuan where rombel_id=$aa[rombel_id] 
													and kehadiran <> 0 and nh1 <> 0 and nilai_uts <> 0 and nilai_uas <> 0");
						$jmla 		= mysqli_num_rows($ceknilai);
						
						
						$sisa = $jml - $jmla;
					?>
					
			    </div>
			    </a>
	        </div>
	    </div>    
	
<?php
	$no++;
	}
?>
	</div>
</div>
</div>

<?php
   $smss = $con->query("select * from tbl_semester where semester_id=$semester");
   $thnn = $con->query("select * from tbl_tahunajaran where tahun_id=$tahun");

   $sms      = $smss->fetch_assoc();
   $thn      = $thnn->fetch_assoc();

   @$t       = $thn[tahun_ajaran];
   @$tt      = $thn[tahun_id];
   @$s       = $sms[semester_nama];
   @$ss      = $sms[semester_id]; 
    //echo "$t";
  
?>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Rombongan Belajar</h4>
			</div>
			<div class="modal-body">
				<form action ="" method="POST" class="">
        			    
        			     <div class="form-group">
                          <label class="control-label" for="mapelurut">Nama Rombel</label>
                          <input type="text" name="namarombel" class="form-control" id="mapelurut">
                      	</div>
        			          <div class="form-group">
                          <label class="control-label" for="mapelkode">Semester Ajaran</label>
                          <input type="text" class="form-control" id="mapelkode" value="<?php echo $s ;?>" readonly>
                          <input type="hidden" name="semester" class="form-control" id="mapelkode" value="<?php echo $ss ;?>" readonly>
                      	</div>
                      	 <div class="form-group">
                          <label class="control-label" for="mapelkode">Tahun Pelajaran</label>
                          <input type="text" class="form-control" id="mapelkelompok" value="<?php echo $t;?>" readonly>
                          <input type="hidden" name="tahun" class="form-control" id="mapelkelompok" value="<?php echo $tt;?>" readonly>
                      	</div>
        				        <div class="form-group">
                          <label class="control-label" for="sms">Semester Rombel</label>
                          <input type="text" name="sms" class="form-control" id="sms" >
                      	</div>
                      	<div class="form-group">
                          <label class="control-label" for="mapeljam">Kompetensi Keahlian</label>
                          <select class="form-control" name="komp">
                              <?php
                                $prog = $con->query("select * from tbl_program");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value='$asd[program_id]'>$asd[program_nama]</option>";
                                }
                              ?>
                              
                          </select>
                      	</div>
                        <div class="form-group">
                          <label class="control-label" for="mapeljam">Kelas</label>
                          <select class="form-control" name="kelas">
                              <?php
                                $prog = $con->query("select * from tbl_kelas");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value='$asd[kelas_id]'>$asd[kelas_nama]</option>";
                                }
                              ?>
                              
                          </select>
                        </div>
                      	<div class="form-group">
                          <label class="control-label" for="kurikulum">Penggunaan Kurikulum</label>
                         <select class="form-control" name="kurikulum">
                              <?php
                                $prog = $con->query("select * from tbl_kurikulum");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value=$asd[kur_id]>$asd[kur_nama]</option>";
                                }
                              ?>
                              
                          </select>
                      	</div>
                        <div class="form-group">
                          <label class="control-label" for="walikelas">Wali Kelas</label>
                         <select class="form-control" name="walikelas" id="walikelas">
                              <?php
                                $prog = $con->query("select * from tbl_guru");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value=$asd[guru_id]>$asd[guru_nama]</option>";
                                }
                              ?>
                              
                          </select>
                        </div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" name="save" value="save">
					Simpan
				</button>
				<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
   if (@$_POST['save']=='save')
    {
     $namarombel = $_POST[namarombel];
     $semester   = $_POST[semester];
     $tahun      = $_POST[tahun];
     $sms        = $_POST[sms];
     $komp       = $_POST[komp];
     $kurikulum  = $_POST[kurikulum];
     $walikelas  = $_POST[walikelas];
     $kelas      = $_POST[kelas];
	        
	        $simpan    = $con->query("insert into tbl_rombel set
	                                     rombel_nama       = '$namarombel',
                                   semester_id       = '$semester',
                                   tahun_id          = '$tahun',
                                   kur_id            = '$kurikulum',
                                   rombel_wali       = '$walikelas',
                                   kelas_id          = '$kelas',
                                   rombel_semester   = '$sms',
                                   program_id        = '$komp'


	                                 ");



	        echo"<meta http-equiv='refresh' content='0.2;?page=Rombongan%20Belajar'>";
	    }
?>
