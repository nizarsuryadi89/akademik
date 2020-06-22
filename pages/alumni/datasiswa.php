<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">DATA SISWA AKTIF</h5>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    	$datasiswa = $con->query("select * from tbl_siswa WHERE siswa_aktif='A' ");
                    ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width='5%'>NIS</th>
                                <th width='10%'>NISN</th>
                                <th>NAMA LENGKAP</th>
                                <th>P/L</th>
                                <th width='25%'>Tempat,Tgl Lahir</th>
                                <th>Ket</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	while ($aa=$datasiswa->fetch_array())
                        	{
                                @$id = $aa[siswa_id];
                            	echo"
                    	        <tr class='odd gradeX'>
                    	            <td>$aa[siswa_nis]</td>
                                  <td>$aa[siswa_nisn]</td>
                    	            <td>$aa[siswa_nama]</td>
                    	            <td>$aa[siswa_jk]</td>
                    	            <td>$aa[siswa_tempatlahir]," .tgl_indo($aa['siswa_tanggallahir'])."</td>
                                  <td align='center'>";
                                  if (@$aa[siswa_aktif] == 'A') 
                                  {
                                    echo "<a href='?page=data-siswa&aksi=L&siswanis=$aa[siswa_id]'><button class='btn btn-primary'><span class='glyphicon glyphicon-ok' title='AKTIF'></button></a>";
                                  } 
                                  elseif (@$aa[siswa_aktif] == 'L') 
                                  {
                                    echo "<a href='?page=data-siswa&aksi=A&siswanis=$aa[siswa_id]'><button class='btn btn-success'><span class='glyphicon glyphicon-saved' title='AKTIF'></button></a>";
                                  }


                                        
                            echo"
                                    </td>
                    	            <td align='center'>
                                         <a href='?page=print-data-siswa&siswanis=$aa[siswa_id]'><button class='btn btn-primary'><span class='glyphicon glyphicon-print'></button></span>
                                        </a> &nbsp;
                                        <a href='?page=edit-data-siswa&siswanis=$aa[siswa_id]'><button class='btn btn-success'><span class='glyphicon glyphicon-edit'></button></a>
                                            &nbsp;";
                                       
                            ?>

                                        <a class="hapus_barang" data-id="<?php echo $id; ?>" href="javascript:void(0)"><button class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button>
                                        </a>
                                    </td>
                    	        </tr>
                        <?php
                        	}
                        ?>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<script src="jquery-1.12-0.min.js"></script>
<script src="bootbox.min.js"></script>
<script>
    $(document).ready(function(){
        
        $('.hapus_barang').click(function(e){
            
            e.preventDefault();
            
            var pid = $(this).attr('data-id');
            var parent = $(this).parent("td").parent("tr");
            
            bootbox.dialog({
              message: "Anda yakin ingin menghapus?",
              title: "<i class='glyphicon glyphicon-trash'></i> Hapus!",
              buttons: {
                success: {
                  label: "Batal",
                  className: "btn-success",
                  callback: function() {
                     $('.bootbox').modal('hide');
                  }
                },
                danger: {
                  label: "Hapus!",
                  className: "btn-danger",
                  callback: function() {

                      /*
                      //menggunakan $.ajax();
                      
                      $.ajax({
                          type: 'POST',
                          url: 'hapus.php',
                          data: 'hapus='+pid 
                      })
                      .done(function(response){
                          bootbox.alert(response);
                          parent.fadeOut('slow'); 
                      })
                      .fail(function(){
                          bootbox.alert('Ada yang salah...');                         
                      })
                      */

                      $.post('pages/siswa/hapus-siswa.php', { 'hapus':pid })
                      .done(function(response){
                          bootbox.alert(response);
                          parent.fadeOut('slow');
                      })
                      .fail(function(){
                          bootbox.alert('Ada yang salah...');
                      })                      
                  }
                }
              }
            });
        });
    });
</script>

            
              


