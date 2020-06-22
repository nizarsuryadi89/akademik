<?php
 
?>
<div class="row">
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
              FUNISMENT POINT
            </div>
            
            <div class="panel-heading">
			<button class="btn btn-warning" type="submit" name="help"><i class='glyphicon glyphicon-question-sign'></i> </button>
              
              <button class="btn btn-danger" type="submit" name="hapus"><i class='glyphicon glyphicon-trash'></i> </button>
              <button class="btn btn-success" type="submit" name="lulus"><i class='glyphicon glyphicon-upload'></i> </button>
              <button class="btn btn-primary" type="submit" name="do"><i class='glyphicon glyphicon-print'></i> </button> 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php

                    	$datasiswa = $con->query("select * from tbl_pelanggaran");
                    ?>
                    <table  class="table table-responsive table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                               
                                <th>NO</th>
                                <th>KODE PELANGGARAN</th>
                                <th>PELANGGARAN</th>
                                <th>POINT</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                        	while ($aa=$datasiswa->fetch_array())
                        	{
                                                               
                            	echo"
                    	        <tr class='odd gradeX'>
                                  
                    	            <td>$no</td>
                                  <td>$aa[pelanggaran_kode]</a></td>
                                  <td><a href='?page=Funisment&pelanggaran=$aa[pelanggaran_nama]&id=$aa[pelanggaran_id]'>$aa[pelanggaran_nama]</td>
                                  <td>$aa[pelanggaran_point]</td>
                                  
                                  
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
          <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Input Pelanggaran Siswa
                </div>
                
                <?php
                    @$pelanggaran = $_GET[pelanggaran];
                    @$id          = $_GET[id];
                    if (@$pelanggaran != '')
                    {

                ?>
                    <div class="panel-body" >
                    <table width="100%">
                        <form action="" method="POST">
                        <tr><td>Jenis Pelanggaran</td><td>:</td><td><input type='text' value="<?php echo "$pelanggaran";?>" class='form-control' readonly>
                            <input type='hidden' name='id' value="<?php echo "$id";?>" class='form-control' readonly>
                        <br></td></tr>
                        <tr><td>Tanggal Pelanggaran</td><td>:</td><td><input type='date' class='form-control' name='tanggal'><br></td></tr>
                        <tr><td width="25%">Nama Siswa</td><td>:</td>
                            <td>
                                <select class='form-control' name="siswaid">
                                <?php
                                    $siswa = $con->query("select * from tbl_siswa where siswa_aktif='A' ");
                                    while ($data = $siswa->fetch_array())
                                    {
                                        echo "
                                            <option value='$data[siswa_id]'>$data[siswa_nama]</option>
                                        ";
                                    }
                                ?>
                                </select> 
                            </td>
                        </tr>
                         
                        
                    </table>
                     </div>
                     <div class="panel-footer">
                        <button type="submit" name="btnUpload" class="btn btn-success" ><i class="glyphicon glyphicon-check"></i> SIMPAN</button>
                     </div>
                     </form>
                    
            <?php
                    if(isset($_POST['btnUpload']))
                    {
                        @$id         = @$_POST[id];
                        @$idsiswa    = @$_POST[siswaid];
                        @$tanggal    = @$_POST[tanggal];

                        @$simpan     = $con->query("insert into tbl_pointpelanggaran set 
                                                        siswa_id            = $idsiswa,
                                                        pelanggaran_kode    = $id,
                                                        pelanggaran_tgl     = '$tanggal'
                                                    ");
                        echo"<meta http-equiv='refresh' content='0.2;?page=Funisment'>";
                    }
                }
            ?>
               
        </div>
        </div>
        <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Pelanggar
                </div>
                <div class="panel-body" >
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                               
                                <th>Total Point</th>
                            </tr>
                            <?php
                                $no = 1;
                                @$funismen   = $con->query("select * from tbl_pointpelanggaran a inner join      
                                                            tbl_pelanggaran b on a.pelanggaran_kode=b.pelanggaran_id inner join tbl_siswa c on a.siswa_id=c.siswa_id group by c.siswa_id");

                                @$jum        = $con->query("select sum(pelanggaran_point) as jmml from tbl_pointpelanggaran a inner join tbl_pelanggaran b on a.pelanggaran_kode=b.pelanggaran_id inner join tbl_siswa c on a.siswa_id=c.siswa_id group by c.siswa_id");

                                @$jml        = $jum->fetch_assoc();
                                @$asa        = $jml[jmml];
                                while ($abc = $funismen->fetch_array())
                                {
                            echo "
                            <tr>
                                <td>$no</td>
                                <td>$abc[siswa_nis]</td>
                                <td>$abc[siswa_nama]</td>
                                <td><a href=''><font color='red'>$asa</a></td>
                            </tr>";   
                                $no++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php
    if (@$_POST['naik']=='naik')
    {
        @$siswaid    = $_POST[siswaid];
        @$rombelid   = $_POST[rombelid];

        @$simpan     = $con->query("insert into tbl_pesertarombel set siswa_id=$siswaid, rombel_id=$rombelid");
        echo"Siswa Berhasil Naik";
    }
?>