<?php
    if (@$_GET[aksi]=='lulus')
    {
      $kode     = $_GET['nissiswa'];
      $lulus    = $con->query("update tbl_siswa set siswa_aktif = 'L' where siswa_nis = '$kode' ");
      //echo "<meta http-equiv='refresh' content='0.2;URL=?page=master-transkrip-nilai'>";
      echo"update tbl_siswa set siswa_aktif = 'L' where siswa_nis = '$kode' ";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
              Master Transkrip Nilai TA. <?PHP echo "$as[tahun_ajaran] ";?>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <?php
                	$datasiswa = $con->query("select * from tbl_siswa a inner join tbl_transkrip_sms6 b on a.siswa_nis = b.siswa_nis GROUP BY a.siswa_nis");
                ?>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
                  <thead>
                    <tr>
                        <th width='5%'>No</th>
                        <th width='5%'>NIS</th>
                        <th width='10%'>NISN</th>
                        <th width='30%'>NAMA LENGKAP</th>
                        
                        <th width='25%' align='center'>Action</th>
                        <th class="hidden"></th>
                        <th class="hidden"></th>
                        <th class="hidden"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no   = 1;
                	while ($aa=$datasiswa->fetch_array())
                	{
                    	echo"
          	        <tr class='odd gradeX'>
                        <td>$no</td>
          	            <td>$aa[siswa_nis]</td>
                          <td>$aa[siswa_nisn]</td>
          	            <td>
                          <a href='?page=Transkrip%20Nilai&ket=$aa[siswa_nis]'>$aa[siswa_nama] &nbsp; 
                        </td>
                        <td align='center'>
                            <a href='?page=Transkrip-Nilai&nis=$aa[siswa_nis]' class='btn btn-primary'><i class='fa fa-copy'></i></a>
                          </td>
                          <td class='hidden'>
                            
                          </td>
                          <td class='hidden'></td>
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
          </div>
        </div>


       
</div> 

 