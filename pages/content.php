<?php
    session_start();
    include "../../../configakademik.php";
    $username   = $_SESSION['username'];
    $semester   = $_SESSION['semester'];
    $tahun      = $_SESSION['tahun'];
    $userkd     = $_SESSION['id'];
    $kd         = $_SESSION['kd'];   

    $qtahun     = $con->query("select tahun_ajaran from tbl_tahunajaran where tahun_id= $tahun ");
    $as     = $qtahun->fetch_assoc();

    $qsemester    = $con->query("select semester_nama from tbl_semester where semester_id= $semester ");
    $ad     = $qsemester->fetch_assoc();

    $login        = "select * from user a inner join tbl_guru 
                        b on a.guru_id=b.guru_id inner join tbl_tahun 
                            c on b.tmt=c.tahun_id inner join tbl_jabatan
                                d on b.jabatan_id=d.jabatan_id inner join tbl_pendidikan 
                                    e on b.guru_pendidikan=e.pendidikan_id
                                     where a.guru_id=$userkd ";

    //$query      = $con->query($login);
   // $af         = $query->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIAK - SMK NU - <?PHP ECHO"$af[guru_nama]";?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="../vendor/zoom.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">SMK NU KOTA TASIKMALAYA</a>
            </div>
            <!-- /.navbar-header -->
            <?php 
                include "../menuhead.php";
            ?>
           
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php
                        include "../menukiri.html";
                    ?>
                       
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">SELAMAT DATANG DI SISTEM AKADEMIK SMK NU</H4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- dashbord -->
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <?php 
                    include "../atur-content.php";
                ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
