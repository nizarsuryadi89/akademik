<?php
	$datasiswa = $con->query("select * from tbl_program");
?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">   
      <div class="panel-heading">
         <a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class='glyphicon glyphicon-question-sign'></i> </button></a>
        <a href="#"><button class="btn btn-success" type="button" data-target="#komp" data-toggle="modal"><i class="fa fa-plus"></i></button></a>
      </div>
      
      <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover" >
          <thead>
              <tr>
                  <th width='10%'>Kode Kompetensi</th>
                  <th width='20%'>Nama Kompetensi</th>
                  <th width='60%'>Selayang Pandang </th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	while ($aa=$datasiswa->fetch_array())
          	{
              	echo"
      	        <tr class='odd gradeX'>
                    <td>$aa[program_kode]</td>
                    <td>$aa[program_nama] - $aa[program_alias]</td>
                    <td><p align='justify'>$aa[program_profile]</p></td>
      	            <td align='center'>
                          <a href='#'> <button class='btn btn-success'><span class='glyphicon glyphicon-edit'> </button></a>
                              &nbsp;
                          <a href='#'><button class='btn btn-primary'><span class='glyphicon glyphicon-print'></span>
                          </button></a>
                      </td>
      	        </tr>";
          	}
          ?>
          </tbody>
      </table>

      <!-- Modal Popup untuk Add--> 
      <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
              </div>

              <div class="modal-body">
                <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                  
                      <div class="form-group" style="padding-bottom: 20px;">
                        <label for="Modal Name">Modal Name</label>
                        <input type="text" name="modal_name"  class="form-control" placeholder="Modal Name" required/>
                      </div>

                      <div class="form-group" style="padding-bottom: 20px;">
                        <label for="Description">Description</label>
                         <textarea name="description"  class="form-control" placeholder="Description" required/></textarea>
                      </div>

                      <div class="form-group" style="padding-bottom: 20px;">
                        <label for="Date">Date</label>
                        <input type="text" name="date"  class="form-control" plcaceholder="Timestamp" disabled value="Timestamp" required/>
                      </div>

                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">
                            Confirm
                        </button>

                        <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                          Cancel
                        </button>
                    </div>

                    </form>

                 

                  </div>

                 
              </div>
          </div>
      </div>

<!-- Modal Popup untuk Edit--> 
<div id="komp" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Kompetensi Keahlian</h4>
      </div>
      <div class="modal-body">
          <form action ="" method="POST" class="" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label" for="judulberita">Kode Kompetensi</label>
                  <input type="text" name="judulberita" class="form-control" id="judulberita" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="judulberita">Nama Kompetensi</label>
                  <input type="text" name="judulberita" class="form-control" id="judulberita" required>
                </div>
                 <div class="form-group">
                  <label class="control-label" for="judulberita">Alias Kompetensi</label>
                  <input type="text" name="judulberita" class="form-control" id="judulberita" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="judulberita">Profile Komptensi</label>
                  <textarea class="form-control ckeditor" placeholder="Isi Berita" rows="5" name="isiberita"></textarea>
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