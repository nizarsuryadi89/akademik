<?php
    session_start();
    include       "config/config.php";
    include       "config/fungsi_indotgl.php";
    include_once  "config/fungsilogout.php";

    if ((@$_SESSION[hak] == 'master') or (@$_SESSION[hak] == 'keuangan')or (@$_SESSION[hak] == 'admin'))
      {
        include "config/sesi_login.php";
?>

<!DOCTYPE html>
<html lang="en">
  <?php
      include "_partial/head.php";
  ?>
 <body class="<?php echo"$in[skin]"; ?>">
            <div id="navbar" class="navbar navbar-default ace-save-state">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
        <?php 
            include"_partial/sidebar.php";
        ?>
          
        </div><!-- /.sidebar-shortcuts -->
    
        <?php include "_partial/menu-kiri.php"; ?>
      </div>

      <div class="main-content">
          <div class="page-content">
             
              <div class="row">
                  <div class="col-xs-12">
                      <?PHP include "_partial/atur-content.php";?>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.page-content -->
          
      </div><!-- /.main-content -->


      <?php include "_partial/buttonup.php"?>
      </div>
        
    <?php include "_partial/js.php"; ?>
        
         <?php
            include "_partial/bundle_scripft.php";
        ?>
    </body> 

     <?php
          }
          else
          {
            include "index.html";
          }
    ?>

  </html>