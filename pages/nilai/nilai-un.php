<div class="row">
    <div class="col-lg-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Master Transkrip Nilai TA. <?PHP echo "$as[tahun_ajaran] ";?></h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <?php
                	$datasiswa = $con->query("select * from tbl_siswa a inner join tbl_nilai_un b on a.siswa_nis=b.siswa_nis ");
                ?>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                        <th width='5%' rowspan='2'>No</th>
                       
                        <th width='10%' rowspan='2'>No Ujian</th>
                        <th width='20%' rowspan='2'>Nama lengkap</th>
                        <th colspan='4'>Mata Pelajaran</th>
                        <th width='5%' rowspan='2'>Keterangan</th>
                    </tr>
                    <tr>
                    	<th>Bahasa Indonesia</th>
                    	<th>Matematika</th>
                    	<th>Bahasa Inggris</th>
                    	<th>Kompetensi Kejuruan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no   = 1;
                	while ($aa=$datasiswa->fetch_array())
                	{
                		$kelulusan = "Lulus";
                    	echo"
          	        <tr class='odd gradeX'>
                        <td>$no</td>
          	           
                        <td>$aa[nomor_ujian]</td>
          	            <td>$aa[siswa_nama]</td>
          	            <td>$aa[bahasa_indonesia]</td>
          	            <td>$aa[matematika]</td>
          	            <td>$aa[bahasa_inggris]</td>
          	            <td>$aa[kompetensi_kejuruan]</td>
                        <td>$kelulusan</td>
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
          <div class="col-lg-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4>Keterangan</h4>
                </div>
                <div class="panel-body">
                    
                </div>
              </div>
          </div>

       
</div> 

 