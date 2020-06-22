<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           DATA PELAJARAN
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">K13</a></li>
                <li><a href="#ktsp" data-toggle="tab">KTSP 2006</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <?php
                        $no        = 1; 
                        $datasiswa = $con->query("select * from tbl_mapel a inner join tbl_kurikulum b on a.kur_id=b.kur_id inner 
                                                    join tbl_kel_mapel c on a.mapel_kelompok=c.mapelkel_id
                                                        where a.kur_id = 2 order by mapel_urut asc");
                    ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th width='5%'>NO</th>
                                <th width='5%'>Kode</th>
                                <th width='5%'>Mapel Urut</th>
                                <th width='10%'>Kelompok</th>
                                <th>Mata Pelajaran</th>
                               
                                <th>Kurikulum  - Kompetensi Keahlian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            while ($aa=$datasiswa->fetch_array())
                            {
                                echo"
                                <tr class='odd gradeX'>
                                    <td>$no</td>
                                    <td>$aa[mapel_kode]</td>
                                    <td>$aa[mapel_urut]</td>
                                    <td>$aa[mapel_kelompok]</td>
                                    <td>$aa[mapel_nama]</td>
                                   
                                    <td>$aa[kur_nama] - $aa[kom_keahlian]</td>
                                   
                                    <td align='center'>
                                            <a href='?page=edit-pelajaran&mapel_id=$aa[mapel_id]'>
                                                 <button class='btn btn-success'><i class='glyphicon glyphicon-edit'></i></button>
                                            </a> &nbsp;
                                            <a href='content.php?page=siswa-update&id=$aa[mapel_id]' class='edit-record' data-id='$aa[mapel_id]'>
                                         <button class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button>
                                    </a> &nbsp;
                                    </td>
                                </tr>";
                                $no++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                        <!-- /.panel-body -->

                <?php
                    $no        = 1; 
                    $datasiswa = $con->query("select * from tbl_mapel a inner join tbl_kurikulum b on a.kur_id=b.kur_id inner 
                                                    join tbl_kel_mapel c on a.mapel_kelompok=c.mapelkel_id
                                                        where a.kur_id = 1 order by mapel_urut asc");
                ?>
                
                <div class="tab-pane fade" id="ktsp">
                    
                    <div class="table-responsive">
                         <table width="100%" class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th width='5%'>NO</th>
                                <th width='5%'>Kode</th>
                                <th width='5%'>Mapel Urut</th>
                                <th width='10%'>Kelompok</th>
                                <th>Mata Pelajaran</th>
                               
                                <th>Kurikulum  - Kompetensi Keahlian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            while ($aa=$datasiswa->fetch_array())
                            {
                                echo"
                                <tr class='odd gradeX'>
                                    <td>$no</td>
                                    <td>$aa[mapel_kode]</td>
                                    <td>$aa[mapel_urut]</td>
                                    <td>$aa[mapel_kelompok]</td>
                                    <td>$aa[mapel_nama]</td>
                                   
                                    <td>$aa[kur_nama] - $aa[kom_keahlian]</td>
                                   
                                    <td align='center'>
                                            <a href='?page=edit-pelajaran&mapel_id=$aa[mapel_id]'>
                                                 <button class='btn btn-success'><i class='glyphicon glyphicon-edit'></i></button>
                                            </a> &nbsp;
                                            <a href='content.php?page=siswa-update&id=$aa[mapel_id]' class='edit-record' data-id='$aa[mapel_id]'>
                                         <button class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button>
                                    </a> &nbsp;
                                    </td>
                                </tr>";
                                $no++;
                            }
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
                <!-- /.col-lg-6 -->
               
                  