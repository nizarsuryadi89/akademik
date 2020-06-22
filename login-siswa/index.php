<?php
    session_start();


    include "../config/config.php";
    include "../config/fungsi_indotgl.php";
    $date           = date('Y-m-d');

    if(@$_SESSION['hak'] == 'siswa')
    {

    $username       = $_SESSION['username'];
    $nama           = $_SESSION['nama'];

    //echo "$username - select * form tbl_siswa where siswa_nis = '$username'";
   
    $q_siswa        = $con->query("select * from tbl_siswa where siswa_nis = '$username' ");
    $af             = $q_siswa->fetch_assoc();

?>
<?php
	include "_partial/head.php";
?>
<head>
  <style type="text/css">
    
  table 
    { 
      font-family: Arial;
      font-size :11;
     }
   }
  </style>
</head>
<body class="skin-2">
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
    
        <?php include "_partial/leftmenu.php"; ?>
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
           // include "bundle_scripft.php";
        ?>
    </body> 

     <?php
          }
          else
          {
            include "login.php";
            //echo "<a href='logout.php'>logout</a>";
          }
    ?>


</html>
