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
                    	$datasiswa = $con->query("select a.siswa_id,a.siswa_nis,a.siswa_nama, a.siswa_nisn, b.status 
                    	                            from tbl_siswa a left join user_siswa b on a.siswa_nis = b.username where siswa_aktif='L' ");
                    ?>
                    <table id="example1" class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                            	<th>No</th>
                                <th width='5%'>NIS</th>
                                <th width='10%'>NISN</th>
                                <th>NAMA LENGKAP</th>
                               
                                <th>Status Login</th>
                                <th>Aksi</th>
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
                                    <td>$aa[siswa_nisn]</td>
                    	            <td>$aa[siswa_nama]</td>
                    	           

                    	            <td><a href='?page=Data User Siswa&aksi=status&id=$aa[siswa_id]'>";                                                 
                                    if($stts=='1')
                                        { 
                                    ?>
                                        <button type="button" class="btn btn-success">Aktif</button></a>
                                        
                                    <?php
                                        } else 
                                        { 
                                    ?>
                                        <button type="button" class="btn btn-default">Non Aktif</button></a>
                                        <?php } ?>
                                        </td>           
                    	            <td align='center'>
                        
                                <a href='#myModal' id='custId' data-toggle='modal' data-id=".$aa['siswa_id']." ?>
                                        <button type="button" class="btn btn-success btn-xl" >
                                  <i class="glyphicon glyphicon-edit"></i>
                                </button></a>

                                
                                <button type="button" class="btn btn-warning btn-xl" data-toggle="modal" data-target="#edit">
                                  <i class="glyphicon glyphicon-eye-open"></i>
                                </button>
                                 <button type="button" class="btn btn-danger btn-xl" data-toggle="modal" data-target="#edit">
                                  <i class="glyphicon glyphicon-trash"></i>
                                </button>
                        <?php
                                 echo"       
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

       