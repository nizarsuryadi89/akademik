 <?php
    $datasiswa          = $con->query("select * from tbl_siswa where siswa_aktif='A' ");
    $dataguru           = $con->query("select * from tbl_guru");
    $datarombel         = $con->query("select * from tbl_rombel where semester_id= $semester and tahun_id= $tahun ");
    $datamapel          = $con->query("select * from tbl_mapel");

    $jmlsiswa           = mysqli_num_rows($datasiswa);
    $jmlguru            = mysqli_num_rows($dataguru);
    $jmlrombel          = mysqli_num_rows($datarombel);
    $jmlmapel           = mysqli_num_rows($datamapel);
 ?>
 <div class="row">
     <div class="col-md-12">
         <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo"$jmlsiswa"?></div>
                                <div>Jumlah Siswa Aktif</div>
                            </div>
                        </div>
                    </div>
                    <a href="?page=data-siswa">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo"$jmlguru"?></div>
                    <div>Jumah Guru Aktif</div>
                </div>
            </div>
            </div>
              <a href="?page=dataguru">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
            </div>
        </a>
        </div>
        </div>
        <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                      <div class="huge"><?php echo"$jmlrombel"?></div>
                    <div>Jumlah Rombel Aktif</div>
                </div>
            </div>
        </div>
        <a href="?page=data-rombel">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
        </div>
        </div>
        <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-support fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo"$jmlmapel"?></div>
                    <div>Jumlah Mata Pelajaran</div>
                </div>
            </div>
        </div>
        <a href="?page=data-pelajaran">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
        </div>
        </div>
    </div>
</div>