<script>
    function myFunction(){
        $('#myModal').modal('show');
    }
</script>

<?php
    session_start();
    // error_reporting(0);

    include "../config/config.php";
    include "../config/fungsi_indotgl.php";
    $date   = date('Y-m-d');

    $username       = $_SESSION['username'];
    $nama           = $_SESSION['nama'];
    $sms            = $_SESSION['semester'];
    $tahun          = $_SESSION['tahun'];
    $userkd         = $_SESSION['id'];
    $date           = date('Y-m-d');
   
    $qtahun         = $con->query("select * from tbl_tahunajaran where tahun_id=$tahun ");
    $as             = $qtahun->fetch_assoc();

    $qsemester      = $con->query("select * from tbl_semester where semester_id=$sms ");
    $ad             = $qsemester->fetch_assoc();

    $login          = "select * from user a inner join tbl_guru 
                        b on a.guru_id=b.guru_id inner join tbl_tahun 
                            c on b.tmt=c.tahun_id inner join tbl_jabatan
                                d on b.jabatan_id=d.jabatan_id inner join tbl_pendidikan 
                                    e on b.guru_pendidikan=e.pendidikan_id
                                     where a.guru_id=$userkd ";

    $userlogin      = $con->query($login);
    $af            =  $userlogin->fetch_assoc();

    //echo"$userkd";
     $walikelas    = $con->query("select * from tbl_rombel where (rombel_wali = $userkd) and (tahun_id = $tahun) and (semester_id = $sms)");
    $wk           = $walikelas->fetch_assoc();

    $jmm          = mysqli_num_rows($walikelas);

    $smsms     = @$wk[rombel_semester];

    //echo"$wk[rombel_wali]";

    $infosekolah    = $con->query("select * from tbl_foto");
    $sk             = $infosekolah->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../assets/image/smk.png">
  <title><?php echo "$af[guru_nama]";?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="and Validation" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
    <script src="../assets/js/ace-extra.min.js"></script>
  
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
          <a href="?page=Dashboard" class="navbar-brand">
            <small>
              SIAK SMK Nahdlatul Ulama
            </small>
          </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <?php  include "header.php";?>
        </div>
      </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>

      <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <hr>
          <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
            
          </div>
          
          <img src="../assets/foto-guru/<?php echo"$af[guru_foto]";?>" class="img img-rounded " width='40%' alt="User Image">

          <hr>
          
                  <font color='white'><?php echo "$af[guru_nama]";?><br>
                  <small><?php echo"$af[guru_tempatlahir] - " .tgl_indo(@$af[guru_tgllahir]). "";?></small>
                  </font>      
          <br>
          <br>
        </div><!-- /.sidebar-shortcuts -->
    
        <?php
            include "leftmenu.php";
        ?>
    </div>

            <div class="main-content">
                <div class="main-content-inner">
                   

                    <div class="page-content">
                        
                        <div class="row">
                            <div class="col-xs-12">
                               <?PHP include "atur-content.php";?>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->


            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->
    <?php
          //include "../footer.php";
        ?>

        <script src="../assets/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
          if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="../assets/js/bootstrap.min.js"></script>

        <script src="../assets/js/jquery-ui.custom.min.js"></script>
        <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="../assets/js/jquery.easypiechart.min.js"></script>
        <script src="../assets/js/jquery.sparkline.index.min.js"></script>
        <script src="../assets/js/jquery.flot.min.js"></script>
        <script src="../assets/js/jquery.flot.pie.min.js"></script>
        <script src="../assets/js/jquery.flot.resize.min.js"></script>

        <!-- ace scripts -->
        <script src="../assets/js/ace-elements.min.js"></script>
        <script src="../assets/js/ace.min.js"></script>
        
        <!-- page specific plugin scripts -->
        <script src="../assets/js/wizard.min.js"></script>
        <script src="../assets/js/jquery.validate.min.js"></script>
        <script src="../assets/js/jquery-additional-methods.min.js"></script>
        <script src="../assets/js/bootbox.js"></script>
        <script src="../assets/js/jquery.maskedinput.min.js"></script>
        <script src="../assets/js/select2.min.js"></script>

        <!-- ace scripts -->
        <script src="../assets/js/ace-elements.min.js"></script>
        <script src="../assets/js/ace.min.js"></script>
    </body> 

    


</html>
