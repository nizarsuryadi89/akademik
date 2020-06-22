<?php
	$datasiswa = $con->query("select * from tbl_tahunajaran");
?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
          
      <div class="panel-heading">
        <a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class='glyphicon glyphicon-question-sign'></i> </button></a>
        <a href="#"><button class="btn btn-success" type="button" data-target="#tahun" data-toggle="modal"><i class="fa fa-plus"></i></button></a>
      </div>
      
      <div class="panel-body">
      <div class="col-md-6">
      <table width="100%" class="table table-striped table-bordered table-hover">
          <thead>
              <tr>
                  <th width='10%'>No</th>
                  <th width='70%'>Tahun Akademik</th>
                  
                  <th>Aksi</th>
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
                    <td>$aa[tahun_ajaran]</td>
                    
      	            <td align='center'>
                          <a href='#'> <button class='btn btn-success'><span class='glyphicon glyphicon-edit'> </button></a>
                              &nbsp;
                          <a href='#'><button class='btn btn-primary'><span class='glyphicon glyphicon-print'></span>
                          </button></a>
                      </td>
      	        </tr>";
                $no++;
          	}
          ?>
          </tbody>
      </table>
      </div>
      <div class="col-md-6">
     
      </div>

      <!-- Modal Popup untuk Add--> 
      

<!-- Modal Popup untuk Edit--> 
<div id="tahun" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Tahun Ajaran</h4>
      </div>
      <div class="modal-body">
          <form action ="" method="POST" class="" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label" for="judulberita">Tahun Ajaran</label>
                  <input type="text" name="judulberita" class="form-control" id="judulberita" required>
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