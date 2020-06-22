<?php
    //echo "$id";
?>
<div class="row">
      <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Data Siswa Pelanggar</h4>
                </div>
                <div class="panel-body" >
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>No</th>
                                <th>Pelanggaran</th>
                                <th>Tgl Pelanggaran</th>
                               
                                <th>Total Point</th>
                            </tr>
                            <?php
                                $no = 1;
                                @$funismen   = $con->query("select * from tbl_pointpelanggaran a inner join      
                                                            tbl_pelanggaran b on a.pelanggaran_kode=b.pelanggaran_id inner join tbl_siswa c on a.siswa_id=c.siswa_id where c.siswa_nis=$username");

                                while ($abc = $funismen->fetch_array())
                                {
                            echo "
                            <tr>
                                <td>$no</td>
                                <td>$abc[pelanggaran_nama]</td>
                                <td>$abc[pelanggaran_tgl]</td>
                               
                                <td>$abc[pelanggaran_point]</td>
                            </tr>";   
                                $no++;
                                    @$jml = $jml+$abc[pelanggaran_point];
                                }
                            ?>
                            <tr>
                                <td colspan="3">Total Point Pelanggaran</td>
                                <td><?php echo "$jml"?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h5 class="panel-title">FUNISMENT POINT</h5>
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
                                  <td>$aa[pelanggaran_kode]</td>
                                  <td>$aa[pelanggaran_nama]</td>
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
          
      
