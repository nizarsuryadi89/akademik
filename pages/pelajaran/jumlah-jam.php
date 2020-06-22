<?php
	$datasiswa = $con->query("select * from tbl_guru a inner join
                               tbl_tahun b on a.tmt=b.tahun_id inner join 
                                tbl_pendidikan c on a.guru_pendidikan =c.pendidikan_id");
?>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
    
      <div class="panel-heading" align="right">
          <a href="pages/pelajaran/print-jumlahjam.php"><button class="btn btn-primary">Cetak <i class="fa fa-print"></i></button></a>
      </div>
      <div class="panel-body">
        Pembagian Tugas Guru
      <table width="100%" class="table table-striped table-bordered" id="example2">
          <thead>
              <tr>
                  <th>No</th>
                  <th width='30%'>Nama Guru</th>
                  <th width='50%'>Pelajaran</th>
                  <th>Jumlah Jam - Per Minggu</th>
                  
              </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
          	while ($aa=$datasiswa->fetch_array())
          	{
                $pelajaran = $con->query("select * from tbl_mapelrombel a inner join 
                                    tbl_mapel b on a. mapel_id=b.mapel_id inner join 
                                      tbl_rombel c on a.rombel_id=c.rombel_id
                                        where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $aa[guru_id] 
                                          order by c.kelas_id desc");
                

                @$jml = $con->query("select sum(mapel_jam) as jmll from tbl_mapelrombel a inner join 
                                    tbl_mapel b on a. mapel_id=b.mapel_id inner join 
                                      tbl_rombel c on a.rombel_id=c.rombel_id
                                        where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $aa[guru_id] 
                                          order by c.kelas_id desc");
                @$jm   = $jml->fetch_assoc();
                @$jumlah = $jm[jmll];
              	echo"
                <tr class='odd gradeX'>
                  <td>$no</td>
      	            <td>
                      <a href='#'><div>";
                            // <img src='assets/foto-guru/$aa[guru_foto]'  class='img-rounded zoom' width='30' height='40'> 
                       echo "$aa[guru_nama]</div></a>
                    </td>
                    <td>
                    <ol type='1'>
                    ";
                    $nom=1;
                    while ($pel= $pelajaran->fetch_array())
                    {
                      echo "<li>$pel[mapel_nama]  - $pel[mapel_jam]  Kelas : $pel[rombel_nama]"; 
                      $nom++; 
                    }
                    echo"
                    </ol>
                    </td>
                    <td align='center'>$jumlah - Jam</td>
      	           
                </tr>";
                $no++;
                @$total = $total+$jumlah;
          	}
          ?>
              
          </tbody>
      </table>
      </div>
    </div>
<!-- Modal Popup untuk Edit--> 
 <div class="modal modal-primary fade" id="info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informasi</h4>
              </div>
              <div class="modal-body">
                <p>
                 <ol type='1'>
                   <li>Informasi Jumlah Jam dan Pelajaran tiap Guru</li>
                 </ol>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->