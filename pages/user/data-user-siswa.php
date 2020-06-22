<?php
    if(@$_GET['aksi'] =='status')
        { 
            $id         = $_GET['id'];

            $sqlcek     = $con->query("select * from tbl_siswa where siswa_id = $id ");
            $sta        = $sqlcek->fetch_assoc();
            @$nim        = $sta[siswa_nis];
            @$nama       = $sta[siswa_nama];


            
            $input      = $con->query("insert into user_siswa set 
                                            username    = '$nim',
                                            password    = 'smknubisa',
                                            nama        = '$nama',
                                            hak         = 'siswa',
                                            siswa_id    = '$_REQUEST[id]',
                                            status      = 1
                                     ");
            echo"<meta http-equiv='refresh' content='0.2;?page=Data User Siswa'>";
        }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    	$datasiswa = $con->query("select b.password, a.siswa_id,a.siswa_nis,a.siswa_nama, a.siswa_nisn, b.status from tbl_siswa a left join user_siswa b on a.siswa_nis = b.username where siswa_aktif='A' ");
                    ?>
                     <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th>No</th>
                                <th width='5%'>NIS - USERNAME</th>
                                <th width='10%'>Password</th>
                                <th>NAMA LENGKAP</th>
                               
                                <th>Status Login</th>
                                <th>Aksi</th>
                                <th class="hidden">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	$no = 1;
                        	while ($aa=$datasiswa->fetch_array())
                        	{

                                @$id    = $aa[siswa_id];
                                @$stts  = $aa[status];
                            	echo"
                    	        <tr class='odd gradeX'>
                    	        	<td>$no</td>
                    	            <td>$aa[siswa_nis]</td>
                                    <td>$aa[password]</td>
                    	            <td>$aa[siswa_nama]</td>
                    	           

                    	            <td><a href='?page=Data User Siswa&aksi=status&id=$aa[siswa_id]'>";                                                 
                                    if($stts=='1')
                                        { 
                                    ?>
                                        <button type="button">Aktif</button></a>
                                        
                                    <?php
                                        } else 
                                        { 
                                    ?>
                                        <button type="button">Non Aktif</button></a>
                                        <?php } ?>
                                        </td>           
                    	            <td align='center'>
                        
                                
                                <a href="action/hapususersiswa.php?&ID=<?= $aa['siswa_nis']?>" ><i class="fa fa-trash"></i></a> &nbsp;
                                <a href="action/resetpassword.php?&ID=<?= $aa['siswa_nis']?>" >
                                    <i class="fa fa-refresh"></i>
                                </a>
                    
                                    </td>
                                    <td class="hidden"></td>
                    	        </tr>
                    	   <?php
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

       