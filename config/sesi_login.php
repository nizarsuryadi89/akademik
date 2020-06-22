<?php
    @$master    = ($_SESSION[hak] == 'master');
    @$kasir     = ($_SESSION[hak] == 'keuangan');
    @$foto      = $_SESSION[foto];
    @$nmpegawai = $_SESSION[nama];

    $username       = $_SESSION['username'];
    $nama           = $_SESSION['nama'];
    $semester       = $_SESSION['semester'];
    $tahun          = $_SESSION['tahun'];
    $userkd         = $_SESSION['id'];
    

    $date           = date('Y-m-d');
   
    $qtahun         = $con->query("select tahun_ajaran from tbl_tahunajaran where tahun_id= $tahun ");
    $as             = $qtahun->fetch_assoc();

    $qsemester      = $con->query("select * from tbl_semester where semester_id= $semester ");
    $ad             = $qsemester->fetch_assoc();

    $sekolah        = $con->query("select * from tbl_foto");
    $sk             = $sekolah->fetch_assoc();

    $login          = "select * from user a inner join tbl_guru 
                        b on a.guru_id=b.guru_id inner join tbl_tahun 
                            where b.guru_id=$userkd";

    @$userlogin     = $con->query("select * from user where guru_id=$id");
    //$af            =  $userlogin->fetch_assoc();

    $infosekolah    = $con->query("select * from tbl_foto");
    $in             = $infosekolah->fetch_assoc();

    $kohor          = $con->query("select * form tbl_ppdb");
?>