<?php
	$datasiswa = $con->query("select * from tbl_tu a inner join
                               tbl_tahun b on a.tmt=b.tahun_id inner join 
                                tbl_pendidikan c on a.tu_pendidikan =c.pendidikan_id");
?>
<h4>Data Tenaga Administrasi</h4>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th width='10%'>NUPTK</th>
            <th width='10%'>NIY</th>
            <th width='20%'>Nama Lengkap</th>
            <th>P/L</th>
            <th>Tempat,Tgl Lahir</th>
            <th>Pendidikan Terakhir</th>
            <th>TMT</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    	while ($aa=$datasiswa->fetch_array())
    	{
        	echo"
	        <tr class='odd gradeX'>
	            <td>$aa[tu_nuptk]</td>
              <td>$aa[tu_nip]</td>
	            <td> <div>
                      <img src='../foto-guru/$aa[tu_foto]'  class='img-rounded zoom' width='30' height='40'> - $aa[tu_nama]
                </div></td>
	            <td>$aa[tu_jk]</td>
	            <td>$aa[tu_tempatlahir],$aa[tu_tgllahir]</td>
              <td>$aa[pendidikan_jenjang] - $aa[tu_jurusan]</td>
              <td>$aa[tahun]</td>
	            <td align='center'>
                    <a href='# class='open_modal' id='$aa[tu_id]' <span class='glyphicon glyphicon-edit'></a>
                        &nbsp;
                    <a href='#' class='view-record' data-id='$aa[tu_id]' ><span class='glyphicon glyphicon-print'></span>
                    </a>
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
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>