  <?php
    if (@$_GET[aksi]=='hapus')
    {
      @$kode = $_GET[kode];
      $hapus = $con->query("delete from tbl_prakerin where prakerin_id=$kode");
      echo"<meta http-equiv='refresh' content='0.2;?page=Praktik Kerja Industri'>";
    }
  ?>
   <div class="col-lg-9">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-warning" type="submit" name="help"><i class='glyphicon glyphicon-question-sign'></i> </button>
        <a href="?page=Praktik Kerja Industri&aksi=tambah"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <?php
          	$datasiswa = $con->query("select * from tbl_prakerin a inner join tbl_siswa b on a.siswa_id=b.siswa_id where tahun_id = $tahun order by siswa_nis asc");
          ?>
          <table width="100%" class="table table-striped table-bordered table-hover" id="example1">
              <thead>
                  <tr>
                      <th width='4%'>NO</th>
                      
                      <th >NAMA SISWA</th>
                      <th>TEMPAT PRAKERIN</th>
                      <th>ALAMAT PRAKERIN</th>
                      <th width="15%">AKSI</th>
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
                       
          	            <td>$aa[siswa_nama]</td>
          	            <td>$aa[prakerin_tempat]</td>
          	            <td>$aa[prakerin_alamat]</td>
          	            <td align='center'>
                            <a href='?page=Edit Data Praktik Kerja Industri&kode=$aa[prakerin_id]'><span class='glyphicon glyphicon-edit'></span>
                            </a>
                             
                            <a href='?page=Praktik Kerja Industri&aksi=view&kode=$aa[prakerin_id]'><span class='glyphicon glyphicon-print'></span>
                            </a>
                                
                             <a href='?page=Praktik Kerja Industri&aksi=hapus&kode=$aa[prakerin_id]' class='view-record' data-id='$aa[prakerin_id]' ><span class='glyphicon glyphicon-trash'></span>
                            </a>
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
  <div class="col-lg-3">
    <?php 
      if (@$_GET[aksi]=='tambah')
      {

    ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        Tambah Data
      </div>
      <div class="panel-body">
        <form action="" Method="POST">
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">Nama Siswa</label>
                      <select name="namasiswa" class="form-control">
                        <?php
                          $siswa = $con->query("select * from tbl_siswa a inner join tbl_pesertarombel b 
                                                  on a.siswa_id=b.siswa_id inner join tbl_rombel c on b.rombel_id=c.rombel_id 
                                                     where siswa_aktif ='A' and rombel_semester=5 ");
                          while ($aa = $siswa->fetch_array())
                          {
                            echo"<option value='$aa[siswa_id]'>$aa[siswa_nama]</option>";
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
            </div>
          </div>
        <?php 
          }
          else if(@$_GET[aksi]=='view')
          {
            @$kode  = $_GET[kode];
            $pra    = $con->query("select * from tbl_siswa a inner 
                                    join tbl_prakerin b on a.siswa_id=b.siswa_id where prakerin_id=$kode");
            $pp     = $pra->fetch_assoc();
          ?>
            <div class="panel panel-default">
      <div class="panel-heading">
        <h5 class="panel-title">View Data Prakerin</h5>
      </div>
      <div class="panel-body">
        
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">Nama Siswa </label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[siswa_nama]"; ?> " readonly>
                  </div>
                   <div class="form-group">
                      <label class="control-label" for="kd_barang">NISN</label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[siswa_nisn]"; ?> " readonly>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">NIS</label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[siswa_nis]"; ?> " readonly>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">Tempat Prakerin</label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[prakerin_tempat]"; ?> " readonly>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">Tanggal Mulai / Tanggal Selesai</label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[prakerin_mulai]"; ?> " readonly><br>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[prakerin_selesai]"; ?> " readonly>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">Tempat Prakerin</label>
                      <textarea class="form-control" rows="3" readonly><?php echo "$pp[prakerin_alamat] - Telp : $pp[prakerin_telp]";?></textarea>
                  </div>
                   <div class="form-group">
                      <label class="control-label" for="kd_barang">Pimpinan Industri</label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[prakerin_pimpinan]"; ?> " readonly>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">Pembimbing Industri</label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[prakerin_pembimbingext]"; ?> " readonly>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="kd_barang">Pembimbing Sekolah</label>
                      <input type="text" name="tempat" class="form-control" id="kd_barang" value="<?php echo "$pp[prakerin_pembimbingint]"; ?> " readonly>
                  </div>
                   
             
            </div>
          </div>
        <?php
          }
        ?>
        </div>


              <?php
                if (@$_POST['simpan']=='simpan')
                  {
                    @$tahun      = $tahun;
                    @$namasiswa  = $_POST[namasiswa];
                    @$tempat     = $_POST[tempat];
                    @$alamat     = $_POST[alamat];
                    @$telp       = $_POST[telp];
                    @$mulai      = $_POST[mulai];
                    @$selesai    = $_POST[selesai];
                    @$pimpinan   = $_POST[pimpinan];

                    $simpan     = $con->query("insert into tbl_prakerin set 
                                                  tahun_id            = '$tahun',
                                                  siswa_id            = '$namasiswa',
                                                  prakerin_tempat     = '$tempat',
                                                  prakerin_alamat     = '$alamat',
                                                  prakerin_telp       = '$telp',
                                                  prakerin_mulai      = '$mulai',
                                                  prakerin_selesai    = '$selesai',
                                                  prakerin_pimpinan   = '$pimpinan'
                                              ");
                    echo"<meta http-equiv='refresh' content='0.2;?page=Praktik Kerja Industri'>";
                   
                  }
              ?>


  
</div>
</div>
  

