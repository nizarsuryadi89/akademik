<?php
  $sql    = "select * from tbl_mapelrombel a inner join 
            tbl_mapel b on a. mapel_id=b.mapel_id inner join 
              tbl_rombel c on a.rombel_id=c.rombel_id
                where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $userkd 
                  order by c.kelas_id desc";
  $query    = $con->query($sql);
  @$tot      = mysqli_num_rows($query);

  if ($tot != '')
  {
	$task 	= $con->query("select * from tbl_nilaipengetahuan a 
							inner join tbl_siswa b on a.siswa_id=b.siswa_id 
								inner join tbl_mapel c on a.mapel_id=c.mapel_id 
									inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id 
										inner join tbl_guru e on d.guru_id=e.guru_id 
											inner join tbl_rombel f on a.rombel_id=f.rombel_id 
												where e.guru_id=$af[guru_id] and semester_id=$semester and tahun_id=$tahun");
	$ts 	= $task->fetch_assoc();
	$jmltotal = mysqli_num_rows($task);
	
	$kehadiran = $con->query("select * from tbl_nilaipengetahuan a 
								inner join tbl_mapel c on a.mapel_id=c.mapel_id inner join 
									tbl_mapelrombel d on c.mapel_id=d.mapel_id inner join 
										tbl_guru e on d.guru_id=e.guru_id inner join 
											tbl_rombel f on a.rombel_id=f.rombel_id 
												where e.guru_id=$af[guru_id] and semester_id=$semester 
													and tahun_id=$tahun and a.kehadiran > 0");
	$az			= $kehadiran->fetch_assoc();
	$jmlhadir   = mysqli_num_rows($kehadiran);
	
	$uts = $con->query("select * from tbl_nilaipengetahuan a 
								inner join tbl_mapel c on a.mapel_id=c.mapel_id inner join 
									tbl_mapelrombel d on c.mapel_id=d.mapel_id inner join 
										tbl_guru e on d.guru_id=e.guru_id inner join 
											tbl_rombel f on a.rombel_id=f.rombel_id 
												where e.guru_id=$af[guru_id] and semester_id=$semester 
													and tahun_id=$tahun and a.nilai_uts > 0");
	$ax			= $uts->fetch_assoc();
	$jmluts   = mysqli_num_rows($uts);
	
	$harian = $con->query("select * from tbl_nilaipengetahuan a 
								inner join tbl_mapel c on a.mapel_id=c.mapel_id inner join 
									tbl_mapelrombel d on c.mapel_id=d.mapel_id inner join 
										tbl_guru e on d.guru_id=e.guru_id inner join 
											tbl_rombel f on a.rombel_id=f.rombel_id 
												where e.guru_id=$af[guru_id] and semester_id=$semester 
													and tahun_id=$tahun and a.nh1 > 0");
	$ay			= $harian->fetch_assoc();
	$jmlharian   = mysqli_num_rows($harian);
	
	
	$pat = $con->query("select * from tbl_nilaipengetahuan a 
								inner join tbl_mapel c on a.mapel_id=c.mapel_id inner join 
									tbl_mapelrombel d on c.mapel_id=d.mapel_id inner join 
										tbl_guru e on d.guru_id=e.guru_id inner join 
											tbl_rombel f on a.rombel_id=f.rombel_id 
												where e.guru_id=$af[guru_id] and semester_id=$semester 
													and tahun_id=$tahun and a.nilai_uas > 0");
	$at			= $pat->fetch_assoc();
	$jmlpat   = mysqli_num_rows($pat);
	
	
	
	$thadir1 	= ($jmlhadir/$jmltotal)*100;
	$thadir 	= round($thadir1);
	$tuts1 		= ($jmluts/$jmltotal)*100;
	$tuts 		= round($tuts1);	
	$tharian1 	= ($jmlharian/$jmltotal)*100;
	$tharian 	= round($tharian1);
	$tpat1 		= ($jmlpat/$jmltotal)*100;
	$tpat		= round($tpat1);
	
	

}
 @$tot_pesan  = 6;

?>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo "$tot_pesan";?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Pesan Masuk</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="?page=pesan-masuk&<?php echo"$dt[pesan_id]"; ?>">
                      <div class="pull-left">
                        <img src="../assets/foto-guru/<?php echo"$af[guru_foto]";?>" class="user-image" alt="User Image">
                      </div>
                      <h4>
                        <?php 
							$waktu = 5;
						?>
                        <small><i class="fa fa-clock-o"></i> <?php echo"$waktu"?></small>
                      </h4>
                      <p><?php echo ""; ?></p>
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="footer"><a href="?page=semua-pesan">See All Messages</a></li>
            </ul>
          </li>
          
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Presentase Kegiatan Penilaian</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                         Kehadiran
                        <small class="pull-right"><?php echo"$thadir"; ?> %</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: <?php echo"$thadir";?>%" role="progressbar" aria-valuenow="<?php echo"$thadir"?>" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only"><?php echo"$thadir";?> % Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
				  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                         Nilai Harian
                        <small class="pull-right"><?php echo"$tharian"; ?> %</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: <?php echo"$tharian";?>%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only"><?php echo"$tharian";?>% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                       Nilai PTS
                         <small class="pull-right"><?php echo"$tuts"; ?> %</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: <?php echo"$tuts";?>%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only"><?php echo"$tuts";?>% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                       Nilai PAT
                        <small class="pull-right"><?php echo"$tpat"; ?> %</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: <?php echo"$tpat";?>%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only"><?php echo"$tpat";?>% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                 
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="?page=data-pelajaran">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo"$af[guru_nama]"; ?></span>
            </a>
            <ul class="dropdown-menu">
              
              <!-- Menu Body -->
            
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>