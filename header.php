<?php
  
  $userlogin  = $con->query("select * from tbl_guru where guru_id = $userkd");
  //$us         = $userlogin->fetch_assoc();

?>
<a href="?page=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>AK</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo "$in[nama_sekolah]";?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
          &nbsp; <font face="arial"><?php echo "$in[nama_sekolah]";?> - <?php echo"$as[tahun_ajaran] - $ad[semester_nama] "; ?> </font>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li class="dropdown tasks-menu">
            <?php
                @$artikel  = $con->query("select * from tbl_artikel where publis <> 'Y' ");
                @$jmll     = $con->query("select count(publis) as jml from tbl_artikel where publis <> 'Y' ");
                @$ar       = $jmll->fetch_assoc();
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger"><?php echo "$ar[jml]";?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda Memiliki  Artikel yang Masuk</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php 
                    while ($art=$artikel->fetch_array())
                    {
                        echo " <li><a href='#'> </a></li>";
                    } 
                  ?>
                </ul>
              </li>
              <li class="footer">
                <a href="?page=Artikel&publis<>Y">Lihat Semua Artikel</a>
              </li>
            </ul>
          </li>
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../assets/images/<?php echo "$in[logo_sekolah]";?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo"$username"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../assets/images/<?php echo "$in[logo_sekolah]"?>" class="img-circle" alt="User Image">

                 <p>
                  <?php echo "$username";?>
                  
                </p>
              </li>
              <!-- Menu Body -->
             <?php ?>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?page=info-user" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>