<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading" align="right">
          <a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class="fa fa-question-circle"></i></button></a>
       
      </div>
      <div class="panel-body">
        <div class="col-md-7">
          <table width="100%">
            <tr><td width="20%">Nama Lengkap </td><td width="5%">:</td><td><?php echo "$af[siswa_nama]"?></td></tr>
            <tr><td width="20%">NIS </td><td width="5%">:</td><td><?php echo "$af[siswa_nis]"?></td></tr>
            <tr><td width="20%">NISN </td><td width="5%">:</td><td><?php echo "$af[siswa_nisn]"?></td></tr>
            <tr><td width="20%">Jenis Kelamin </td><td width="5%">:</td><td><?php echo "$af[siswa_jk]"?></td></tr>
            
          </table>
        </div>
        <div class="col-md-5">
          <?php
          if (@$af[siswa_foto] != '')
            {
          ?>
          <img src="../asstes/foto-siswa/<?php echo "$af[siswa_foto] "; ?>" class="img-rounded" alt="<?php echo "$af[siswa_foto]";?>" width="120">
          <?php 
            }else
            {
          ?>
           <img src="../asstes/foto-siswa/avatar.png" class="img-circle" alt="User Image">    
          <?php  
            }
          ?>
        </div>
      </div>
    </div>
  </div>

 

 <div id="info" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informasi Update</h4>
      </div>
      <div class="modal-body">
        Update tgl 24 Agustus 2017
        <ul>
            <li>Siswa sudah bisa melihat Point Pelanggaran</li>
            <li>Siswa sudah bisa membuat Artikel</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>


