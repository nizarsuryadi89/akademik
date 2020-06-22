<?php
	$datasiswa = $con->query("select * from tbl_guru a inner join
                               tbl_tahun b on a.tmt=b.tahun_id inner join 
                                tbl_pendidikan c on a.guru_pendidikan =c.pendidikan_id");
?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      
      <div class="panel-heading">
         <a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class='glyphicon glyphicon-question-sign'></i> </button></a>
        <a href="#"><button class="btn btn-success" type="button" data-target="#guru" data-toggle="modal"><i class="fa fa-plus"></i></button></a>
      </div>
      <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
          <thead>
              <tr>
                  <th width='10%'>NUPTK/Peg ID</th>
                
                  <th width='20%'>Nama Lengkap</th>
                  <th>P/L</th>
                  <th>Tempat,Tgl Lahir</th>
                  <th>Pendidikan Terakhir</th>
                  <th>TMT</th>
                  <th width="15%">Aksi</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	while ($aa=$datasiswa->fetch_array())
          	{
              	echo"
      	        <tr class='odd gradeX'>
      	            <td>$aa[guru_nuptk]</td>
                   
      	            <td>
                      <div>
                            <img src='assets/foto-guru/$aa[guru_foto]'  class='img-rounded zoom' width='30' height='40'> - $aa[guru_nama]
                      </div>
                    </td>
      	            <td>$aa[guru_jk]</td>
      	            <td>$aa[guru_tempatlahir]," .tgl_indo($aa['guru_tgllahir'])."</td>
                    <td>$aa[pendidikan_jenjang] - $aa[guru_jurusan]</td>
                    <td>$aa[tahun]</td>
      	            <td align='center'>
                          <a href='?page=Edit Data Guru&idguru=$aa[guru_id]' class='btn btn-success'><i class='glyphicon glyphicon-edit'></i></a>
                              &nbsp;
                          <a href='#' class='btn btn-primary'><i class='fa fa-print'></i>
                          </a>
                      </td>
      	        </tr>";
          	}
          ?>
          </tbody>
      </table>

      <!-- Modal Popup untuk Add--> 
<div id="guru" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Guru</h4>
      </div>
      <div class="modal-body">
       <form action ="" method="POST" class="">
                  
                   <div class="form-group">
                          <label class="control-label" for="mapelurut">Nama Guru</label>
                          <input type="text" name="namarombel" class="form-control" id="mapelurut" placeholder="Nama Guru">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="mapelkode">NIY - NUPTK</label>
                          <input type="text" class="form-control" id="mapelkode" placeholder="NIY"><br>
                           <input type="text" class="form-control" id="mapelkode" placeholder="NUPTK">
                         
                        </div>
                         <div class="form-group">
                          <label class="control-label" for="mapelkode">Tempat - Tanggal Lahir</label>
                          <input type="text" class="form-control" id="mapelkode" placeholder="Tempat Lahir"><br>
                           <input type="date" class="form-control" id="mapelkode" placeholder="Tanggal Lahir">
                        </div>
                        
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit" name="save" value="save">
          Simpan
        </button>
        <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
          Cancel
        </button>
        </form>
      </div>
    </div>
  </div>
</div>