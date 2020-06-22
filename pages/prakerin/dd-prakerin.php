  <?php
    //echo "$tahun";
  ?>
  <div class="row">
   <div class="col-md-8">
    <div class="panel-body">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
    </div>
  </div>
  </div>
  <div class="ros">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php
        	$datasiswa = $con->query("select * from tbl_prakerin a inner join tbl_siswa b on a.siswa_id=b.siswa_id where tahun_id = $tahun");
        ?>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th width='8%'>NO</th>
                    <th width='10%'>NISN</th>
                    <th>NAMA SISWA</th>
                    <th>TEMPAT PRAKEIN</th>
                    <th>ALAMAT PRAKEIN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $no=1;
            	while ($aa=$datasiswa->fetch_array())
            	{
                	echo"
        	        <tr class='odd gradeX'>
        	            <td>$no</td>
                      <td>$aa[siswa_nisn]</td>
        	            <td>$aa[siswa_nama]</td>
        	            <td>$aa[prakerin_tempat]</td>
        	            <td>$aa[prakerin_alamat]</td>
        	            <td align='center'>
                          <a href='# class='open_modal' id='$aa[prakerin_id]' <span class='glyphicon glyphicon-edit'>
                          </a>
                                &nbsp;
                          <a href='#' class='view-record' data-id='$aa[prakerin_id]' ><span class='glyphicon glyphicon-print'></span>
                          </a>
                        </td>
        	        </tr>";
            	$no++;
              }

            ?>
            </tbody>
        </table>
      </div>
      <div class="col-md-8">
        
    </div>
  </div>
  </div>
  <div id="tambah" class= "modal modal-fade" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
          <p>Input Data Prakerin </p>
          <button type="button" class="close" data-dismiss="modal">&times</button>
        </div>

        <div class="modal-body">
          <form action="" Method="POST">

              
              <div class="form-group">
                  <label class="control-label" for="kd_barang">Nama Siswa</label>
                  <select name="namasiswa" class="form-control">
                    <?php
                      $siswa = $con->query("select * from tbl_siswa where siswa_aktif ='A' ");
                      while ($aa = $siswa->fetch_array())
                      {
                        echo"<option value='$aa[siswa_nis]'>$aa[siswa_nama]</option>";
                      }
                      ?>
                  </select>
                  
              </div>
              <div class="form-group">
                  <label class="control-label" for="kd_barang">Tempat Prakerin</label>
                  <input type="text" name="tempat" class="form-control" id="kd_barang" required>
              </div>
               <div class="form-group">
                  <label class="control-label" for="kd_barang">Alamat Prakerin</label>
                  <textarea class="form-control" name="alamat" rows="5"> </textarea>
              </div>
              <div class="form-group">
                  <label class="control-label" for="kd_barang">Telp Tempat Prakerin</label>
                  <input type="text" name="telp" class="form-control" id="kd_barang" required>
              </div>
               <div class="form-group">
                  <label class="control-label" for="kd_barang">Tgl Mulai Prakerin</label>
                  <input type="date" name="mulai" class="form-control" id="kd_barang" required>
              </div>
              <div class="form-group">
                  <label class="control-label" for="kd_barang">Tgl Selesai Prakerin</label>
                  <input type="date" name="selesai" class="form-control" id="kd_barang" required>
              </div>
               <div class="form-group">
                  <label class="control-label" for="kd_barang">Nama Pimpinan Tempat Prakerin</label>
                  <input type="text" name="pimpinan" class="form-control" id="kd_barang" required>
              </div>
              <div class="modal-footer">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <input type="submit" class="btn btn-success" name="simpan" value='simpan'></button>
              </div>
          </form>
          <?php
            if (@$_POST['simpan']=='simpan')
              {
                $tahun      = $tahun;
                $namasiswa  = $_POST[namasiswa];
                $tempat     = $_POST[tempat];
                $alamat     = $_POST[alamat];
                $telp       = $_POST[telp];
                $mulai      = $_POST[mulai];
                $selesai    = $_POST[selesai];
                $pimpinan   = $_POST[pimpinan];

                $simpan     = $con->query("insert into tbl_prakerin set 
                                              tahun_id          = '$tahun',
                                              siswa_nis         = '$namasiswa',
                                              prakerin_tempat   = '$tempat',
                                              prakerin_alamat   = '$alamat',
                                              prakerin_mulai    = '$mulai',
                                              prakerin_selesai   = '$selesai',
                                              prakerin_pimpinan  = '$pimpinan'
                                          ");
               
              }
          ?>
        </div>
    </div>
  </div>

  

