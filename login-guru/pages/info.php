<?php
    $ip         =   $_SERVER['REMOTE_ADDR'];
    $hostname   =   gethostbyaddr($_SERVER['REMOTE_ADDR']);
?>
<div class="row">
    <div class="col-lg-3">
         <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo"$af[guru_nama]";?>
            </div>
            <div class="panel-body">
                <div class="thumbnail">
                    <?php echo"<img src='../assets/foto-guru/$af[guru_foto]' class='img-rounded' width='130' height='150'>"?>
                </div>
               

            </div>
         </div>
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Link Download Dokumen Guru</title>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th>Dokumen</th>
                        <th>Download</th>
                    </tr>
                    
                    <?php 
                        $download = $con->query("select * from tbl_download");
                        while ($dw=$download->fetch_array())
                        {
                    ?>
                    <tr>
                        <td><?php  echo"$dw[download_nama]"; ?></td>
                        <td align="center"><a href='<?php  echo"$dw[download_link]"; ?>' target="blank"><i class="fa fa-download"></i></a></td>
                        
                    </tr>
                    <?php
                        }
                    
                    ?>
                </table>
            </div>
         </div>
    </div>
    <div class="col-lg-9">
        <div class="panel panel-default">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Informasi User</a></li>
                <li><a href="#edituser" data-toggle="tab">Edit Informasi Pribadi</a></li>
                <li><a href="#gantipass" data-toggle="tab">Ganti Password</a></li>
                
            </ul>
             <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="panel-body">
                        <?php include "info-guru.php";?>
                        
                    </div>
                </div>   
                
                <div class="tab-pane fade" id="edituser">
                     <div class="panel-body">
                        <?php 
                            include "edit-info.php";
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="gantipass">
                     <div class="panel-body">
                        <?php
                            include "gantipass.php";
                        ?>
                     </div>
                </div>
               
               
            <!-- /.panel-body -->
        </div>
        </div>
        <!-- /.panel -->
        
    
</div>
