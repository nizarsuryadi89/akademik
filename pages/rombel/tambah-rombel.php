<?php
   $smss = $con->query("select * from tbl_semester where semester_id=$semester");
   $thnn = $con->query("select * from tbl_tahunajaran where tahun_id=$tahun");

   $sms      = $smss->fetch_assoc();
   $thn      = $thnn->fetch_assoc();

   @$t       = $thn[tahun_ajaran];
   @$tt      = $thn[tahun_id];
   @$s       = $sms[semester_nama];
   @$ss      = $sms[semester_id]; 
    //echo "$t";
  
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <a href="?page=data-rombel"><button class="btn btn-default">Kembali</button></a> 
            </div>
            <div class="panel-body">
                <div class="form-group">
        			<form action ="" method="POST" class="">
        			    
        			          <div class="form-group">
                          <label class="control-label" for="mapelurut">Nama Rombel</label>
                          <input type="text" name="namarombel" class="form-control" id="mapelurut">
                      	</div>
        			          <div class="form-group">
                          <label class="control-label" for="mapelkode">Semester Ajaran</label>
                          <input type="text" class="form-control" id="mapelkode" value="<?php echo $s ;?>" readonly>
                          <input type="hidden" name="semester" class="form-control" id="mapelkode" value="<?php echo $ss ;?>" readonly>
                      	</div>
                      	 <div class="form-group">
                          <label class="control-label" for="mapelkode">Tahun Pelajaran</label>
                          <input type="text" class="form-control" id="mapelkelompok" value="<?php echo $t;?>" readonly>
                          <input type="hidden" name="tahun" class="form-control" id="mapelkelompok" value="<?php echo $tt;?>" readonly>
                      	</div>
        				        <div class="form-group">
                          <label class="control-label" for="sms">Semester Rombel</label>
                          <input type="text" name="sms" class="form-control" id="sms" >
                      	</div>
                      	<div class="form-group">
                          <label class="control-label" for="mapeljam">Kompetensi Keahlian</label>
                          <select class="form-control" name="komp">
                              <?php
                                $prog = $con->query("select * from tbl_program");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value='$asd[program_id]'>$asd[program_nama]</option>";
                                }
                              ?>
                              
                          </select>
                      	</div>
                        <div class="form-group">
                          <label class="control-label" for="mapeljam">Kelas</label>
                          <select class="form-control" name="kelas">
                              <?php
                                $prog = $con->query("select * from tbl_kelas");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value='$asd[kelas_id]'>$asd[kelas_nama]</option>";
                                }
                              ?>
                              
                          </select>
                        </div>
                      	<div class="form-group">
                          <label class="control-label" for="kurikulum">Penggunaan Kurikulum</label>
                         <select class="form-control" name="kurikulum">
                              <?php
                                $prog = $con->query("select * from tbl_kurikulum");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value=$asd[kur_id]>$asd[kur_nama]</option>";
                                }
                              ?>
                              
                          </select>
                      	</div>
                        <div class="form-group">
                          <label class="control-label" for="walikelas">Wali Kelas</label>
                         <select class="form-control" name="walikelas" id="walikelas">
                              <?php
                                $prog = $con->query("select * from tbl_guru");

                                while ($asd = $prog->fetch_array())
                                {
                                  echo "<option value=$asd[guru_id]>$asd[guru_nama]</option>";
                                }
                              ?>
                              
                          </select>
                        </div>
                      	<hr>
                        <button class="btn btn-success" name="save" value="save">SIMPAN</button>
                         
                      </div>
        			</form>
        			<?php
        			    if (@$_POST['save']=='save')
        			    {
        			       $namarombel = $_POST[namarombel];
                     $semester   = $_POST[semester];
                     $tahun      = $_POST[tahun];
                     $sms        = $_POST[sms];
                     $komp       = $_POST[komp];
                     $kurikulum  = $_POST[kurikulum];
                     $walikelas  = $_POST[walikelas];
                     $kelas      = $_POST[kelas];
        			        
        			        $simpan    = $con->query("insert into tbl_rombel set
        			                                     rombel_nama       = '$namarombel',
                                                   semester_id       = '$semester',
                                                   tahun_id          = '$tahun',
                                                   kur_id            = '$kurikulum',
                                                   rombel_wali       = '$walikelas',
                                                   kelas_id          = '$kelas',
                                                   rombel_semester   = '$sms',
                                                   program_id        = '$komp'


        			                                 ");

                      echo "insert into tbl_rombel set
                                                   rombel_nama       = '$namarombel',
                                                   semester_id       = '$semester',
                                                   tahun_id          = '$tahun',
                                                   kur_id            = '$kurikulum',
                                                   rombel_wali       = '$walikelas',
                                                   kelas_id          = '$kelas',
                                                   rombel_semester   = '$sms',
                                                   program_id        = '$komp'";

        			        echo"<meta http-equiv='refresh' content='0.2;?page=data-rombel'>";
        			    }
        			?>
                        
            </div>
        </div>
    </div>
</div>