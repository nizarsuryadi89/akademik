<?php
    @$kat  = $_GET[kat];
    @$kode = $_GET[id];

    if ($kat == 'hapus')
    {
        $hapus = $con->query("delete from tbl_gallery where id = $kode ");
        echo"<meta http-equiv='refresh' content='0.2;?page=setting-gallery'>";
    }
?>
           
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">DATA FOTO GALLERY </h5>
            </div>
          
            <div class="panel-heading">
              <a href="?page=dashboard"><button class="btn btn-primary"><i class='glyphicon glyphicon-arrow-left'></i> Kembali</button></a>
              <a href="?page=tambah-foto-gallery"><button class="btn btn-success" type="submit" name="hapus"><i class='glyphicon glyphicon-plus-sign'></i> Tambah</button></a>
             
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                  <?php
                     $datasiswa = $con->query("select * from tbl_gallery order by id desc");
                  
                  ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                               
                               
                                <th width='20%'>Foto</th>
                                <th>Ket Foto</th>
                               
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                        	while ($aa=$datasiswa->fetch_array())
                        	{
                               
                            	echo"
                    	        <tr class='odd gradeX'>
                                  <td width='5%' align='center'>$no</td>
                    	           
                                  <td><img src='../assets/gallery/$aa[foto_gallery]' width='100' class='img img-rounded'></td>
                                  <td>$aa[ket_foto]</td>
                    	          
                                 
                    	             <td align='center'>
                                        <a href='?page=edit-data-desa&desakode=$aa[id]'><button class='btn btn-success' title='Edit Foto $aa[ket_foto]'><i class='glyphicon glyphicon-edit'></i></button></a>
                                            &nbsp;

                                        

                                         <a href='?page=setting-gallery&kat=hapus&id=$aa[id]'><button class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button>
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
    