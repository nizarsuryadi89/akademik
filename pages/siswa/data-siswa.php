<div class="row">
    <div class="col-lg-12">
       <h6>DAFTAR SISWA</h6>
       <hr>
                <div class="table-responsive">
                    <?php
                    	$datasiswa = $con->query("select * from tbl_siswa WHERE siswa_aktif='A' order by siswa_nis asc ");
                    ?>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
												
                        <thead>
                            <tr>
                               
                                <th>NO</th>
                                <th width="25%">NAMA LENGKAP</th>
                                <th>JK</th>
                                <th>NIS</th>
                               
                                                                
                                <th>Tempat,Tgl Lahir</th>
                                <th>Tahun Masuk</th>
                               
                                <th width="25%">#</th>
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
                                  <td>$aa[siswa_nama]</td>
                                  <td>$aa[siswa_jk]</td>
                                  <td>$aa[siswa_nis]</td>        	            
                    	            <td>$aa[siswa_tempatlahir]," .tgl_indo($aa['siswa_tanggallahir'])."</td>
                                  <td>$aa[siswa_tahunmasuk]</td>
                               
                    	            <td align='center'>
                                         <a href='?page=print-data-siswa&siswanis=$aa[siswa_id]' class='btn btn-success btn-xs'><i class='fa fa-print'></i>
                                        </a> &nbsp;
                                        <a href='?page=Edit Data Siswa&siswanis=$aa[siswa_id]' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></a>
                                            &nbsp;
                                        <a href='action/aksi-do-siswa.php?&aksi=do&siswanis=$aa[siswa_id]' class='btn btn-danger btn-xs'><i class='fa fa-stop'></i></a>
                                            &nbsp;
                                         <a href='action/aksi-lulus-siswa.php?&aksi=lulus&siswanis=$aa[siswa_id]' class='btn btn-success btn-xs'><i class='fa fa-upload'></i></a>
                                        

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
    