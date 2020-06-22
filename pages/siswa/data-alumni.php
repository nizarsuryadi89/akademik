<?php
    if (@$_GET[aksi]=='do')
    {
      @$kode = $_GET[siswanis];
      @$do   = $con->query("update tbl_siswa set siswa_aktif = 'D' where siswa_id=$kode");
      echo"<meta http-equiv='refresh' content='0.2;?page=data-siswa'>";
    }

    if (@$_GET[aksi]=='lulus')
    {
      @$kode = $_GET[siswanis];
      @$do   = $con->query("update tbl_siswa set siswa_aktif = 'L' where siswa_id=$kode");
      echo"<meta http-equiv='refresh' content='0.2;?page=data-siswa'>";
    }
?>
 
<div class="row">
      <div class="col-xs-12 col-sm-12widget-container-col" id="widget-container-col-1">
        <div class="widget-box widget-color-blue" id="widget-box-2">
          <div class="widget-header">
            <h4 class="widget-title lighter smaller "><i class="fa fa-user"></i> Data Alumni</h4>
          </div>
          <div class="widget-body">
            <div class="widget-main">
    
                 <iframe src="<?php echo"cetak/print-daftarsiswa.php";?>" style="display:none;" name="frame" ></iframe>
               
                
                <button type="button" class="btn btn-primary" onClick="frames['frame'].print()" ><i class="glyphicon glyphicon-print"></i></button>
                  
                <a href="?page=mapel-rombel&kd-rombel=<?php echo $rombel ; ?>"><button class="btn btn-success"><i class="fa fa-download"></i></button></a>
                <br>
                <br>
                <div class="table-responsive">
                    <?php
                    	$datasiswa = $con->query("select * from tbl_siswa WHERE siswa_aktif='L' ");
                    ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th>NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>JK</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                                                
                                <th>Tempat,Tgl Lahir</th>
                               
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                        	while ($aa=$datasiswa->fetch_array())
                        	{
                                @$id = $aa[siswa_id];
                            	echo"
                    	        <tr class='odd gradeX'>
                                 
                    	            <td>$no</td>
                                  <td onclick=\"location.href='?page=data-siswa&kat=info&kdsiswa=$id'\">$aa[siswa_nama]</a></td>
                                  <td>$aa[siswa_jk]</td>
                                  <td>$aa[siswa_nis]</td>
                                  <td>$aa[siswa_nisn]</td>
                                                    	            
                    	            <td>$aa[siswa_tempatlahir]," .tgl_indo($aa['siswa_tanggallahir'])."</td>
                               
                    	            <td align='center'>
                                         <a href='?page=print-data-siswa&siswanis=$aa[siswa_id]'><span class='glyphicon glyphicon-print'></span>
                                        </a> &nbsp;
                                        <a href='?page=edit-data-siswa&siswanis=$aa[siswa_id]'><span class='glyphicon glyphicon-edit'></span></a>
                                            &nbsp;
                                        <a href='?page=data-siswa&aksi=do&siswanis=$aa[siswa_id]'><span class='glyphicon glyphicon-trash'></span></a>
                                            &nbsp;
                                         <a href='?page=data-siswa&aksi=lulus&siswanis=$aa[siswa_id]'><i class='fa fa-upload'></i></span></a>
                                        &nbsp;

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
    