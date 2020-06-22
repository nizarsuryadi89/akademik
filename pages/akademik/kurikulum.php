 <?PHP 
	$no 	= 1;
	$rombel = $con->query("select * from tbl_rombel a inner join tbl_guru b 
								on a.rombel_wali = b.guru_id inner join tbl_kurikulum c on 
									a.kur_id=c.kur_id where semester_id= $semester and tahun_id= $tahun order by rombel_semester asc");
	
?>
<div class="panel panel-info">
<div class="panel-heading">
       <a href="?page=Dashboard" class="btn btn-warning">
              <i class="fa fa-tachometer"></i>
              Dashboard
            </a>
  </div>
  <div class="panel-body">
 <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
          	<div class="table-responsive">
          		<table class="table table-bordered table-responsive">
          			<tr>
                  <th width="5%">No</th>
          				<th width="20%">Rombongan Belajar</th>
          				<th width="20%">Kurikulum</th>
          				<th width="20%">Jumlah Siswa</th>
          				<th>Kelengkapan Kurikulum </th>
          			</tr>
          		<?php
          			while ($aa=$rombel->fetch_array())
					{
						 $lakilaki  = $con->query("select count(siswa_jk)as L from tbl_siswa a inner join tbl_pesertarombel b on a.siswa_id=b.siswa_id where siswa_jk = 'L' and rombel_id = $aa[rombel_id]");

				          $perempuan = $con->query("select count(siswa_jk)as P from tbl_siswa a inner join tbl_pesertarombel b on a.siswa_id=b.siswa_id where siswa_jk = 'P' and rombel_id = $aa[rombel_id]");
				          $ll        = $lakilaki->fetch_assoc();
				          $pp        = $perempuan->fetch_assoc();
				          $jumlah    = @$pp[P]+@$ll[L];
          			?>

          			<tr>
                  <td><?php echo "$no";?></td>
          				<td><?php echo "<b>$aa[rombel_nama]</b> <br>Semester $aa[rombel_semester]";?></td>
          				<td><?php echo "$aa[kur_nama]";?></td>
          				<td><?php echo "Laki-Laki : $ll[L] <br>Perempuan : $pp[P]";?></td>
          				<td>
          					<div class="btn-group-vertical">
		                      <?php echo"<a href='?page=pembelajaran-rombel&kd-rombel=$aa[rombel_id]&semester=$aa[rombel_semester]'>";?>
		                      <button type="button" class="btn btn-danger" title="Struktur Kurikulum"><i class="fa fa-object-group"></i> </button></a>
		                      <?php echo "<a href='?page=peserta-rombel&rombel-kd=$aa[rombel_id]'>"; ?>
		                      <button type="button" class="btn btn-primary" title="Peserta Kelas"><i class="fa fa-users"></i> </button></a>
		                    </div>
		                   
		                     <div class="btn-group-vertical">
		                    
		                      
		                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" title="Cetak Administrasi">
		                          <i class="fa fa-print"></i> 
		                        </button>
		                        <ul class="dropdown-menu">
		                          <li><a href="#"><i class="fa fa-circle-o"></i> Daftar Hadir</a></li>
		                          <li><a href="#"><i class="fa fa-circle-o"></i> Daftar Nilai</a></li>
		                        </ul>
		                      </div>
                          <?php echo "<a href='?page=Agenda Harian&rombelkd=$aa[rombel_id]'>"; ?>
                          <button type="button" class="btn btn-success" class="Agenda Harian"><i class="fa fa-users"></i> </button></a>

                          <?php echo "<a href='?page=Input-Nilai-Ekskul&rombelkd=$aa[rombel_id]&semester=$aa[rombel_semester]'>"; ?>
                          <button type="button" class="btn btn-primary" class="Agenda Harian"><i class="fa fa-futbol-o"></i> </button></a>

          				</td>
          			</tr>

          			<?php
                  $no++;
          			}
          			?>
          		</table>
          	</div>
          </div>
        </div>
      </div>
</section>