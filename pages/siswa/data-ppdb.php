<?php
  @$daftar  = $_GET[daftarulang];
  if ($daftar != '')
  {  
    if ($daftar =='Ya')
    {
      @$kode  = $_GET[ppdbid];
      $siswa  = $con->query("select * from tbl_ppdb where ppdb_id=$kode");
      $s      = $siswa->fetch_assoc();
      
      @$nisn     = $s[ppdb_siswanisn];
      @$nama     = $s[ppdb_siswanama];
      @$tempat   = $s[ppdb_siswatempatlahir];
      @$tgl      = $s[ppdb_siswatgllahir];
      @$jk       = $s[ppdb_siswajk];
      @$alamat   = $s[ppdb_siswaalamat];
      @$asal     = $s[ppdb_asalsekolah];
      @$foto     = $s[ppdb_fotosiswa];



      $simpan = $con->query("insert into tbl_siswa set 
                                siswa_nisn          = '$nisn',
                                siswa_nama          = '$nama',
                                siswa_tempatlahir   = '$tempat',
                                siswa_tanggallahir  = '$tgl',
                                siswa_jk            = '$jk ',
                                siswa_alamat        = '$alamat',
                                siswa_asalsekolah   = '$asal',
                                siswa_foto          = '$foto'

                            ");
    }
  }
?>
<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
             DATA PPDB
            </div>
            
            <div class="panel-heading">
				      <button class="btn btn-warning" type="submit" name="help"><i class='glyphicon glyphicon-question-sign'></i> </button>
              
              <button class="btn btn-danger" type="submit" name="hapus"><i class='glyphicon glyphicon-trash'></i> </button>
              <button class="btn btn-success" type="submit" name="lulus"><i class='glyphicon glyphicon-upload'></i> </button>
              <button class="btn btn-primary" type="submit" name="do"><i class='glyphicon glyphicon-print'></i> </button> 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php

                    	$datasiswa = $con->query("select * from tbl_ppdb a left join tbl_program 
                                                b on a.program_id=b.program_id where tahun_id=4");
                      $juml      = mysqli_num_rows($datasiswa);

                    ?>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th>NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>JK</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Program</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        if ($juml != 0)
                        { 
                          $no = 1;
                        	while ($aa=$datasiswa->fetch_array())
                        	{
                                @$id         = $aa[ppdb_siswanisn];

                                @$dsiswa     = $con->query("select * from tbl_siswa where siswa_nisn = '$id' ");
                                @$ds         = $dsiswa->fetch_assoc();
                                @$is         = $ds[siswa_nisn]; 

                                
                            	echo"
                    	        <tr class='odd gradeX'>
                                  
                    	            <td>$no</td>
                                  <td><a href='?page=Data PPDB&ppdbid=$aa[ppdb_siswanisn]'>$aa[ppdb_siswanama]</a></td>
                                  <td>$aa[ppdb_siswajk]</td>
                                  <td>$aa[ppdb_siswanisn]</td>
                                  <td>$aa[ppdb_asalsekolah]</td>
                                  <td>$aa[program_nama]</td>
                                 
                    	            
                    	           
                                 
                    	            <td align='center' width='120'>
                                        
                                         
                                        <a href='?page=edit-data-ppdb&ppdbid=$aa[ppdb_id]'><button class='btn btn-primary '><span class='glyphicon glyphicon-edit'></span></button></a>
                                            &nbsp;&nbsp;&nbsp;";
                                      if ($id == '')
                                        {
                                          echo"<a href=''><button class='btn btn-danger btn-block' disabled><span class='glyphicon glyphicon-edit' ></span> NISN Kosong</button></a>";
                                        }
                                      elseif ($id != $is)
                                        {echo"
                                        <a href='?page=Data PPDB&daftarulang=Ya&ppdbid=$aa[ppdb_id]'><button class='btn btn-warning'><span class='glyphicon glyphicon-edit'></span> </button></a>";
                                        }
                                      else
                                        {
                                          echo"<a href=''><button class='btn btn-success' disabled><span class='glyphicon glyphicon-check' ></span> </button></a>";
                                        }
                                        
                                        
                                    echo"
                                    </td>
                              </tr>";
                                       
                           
                          $no++;
                        	}
                        }else
                        {
                          echo "<tr><td colspan='7' align='center'><font color='red'>Belum Ada Yang Melakukan Pendaftaran</font></td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="panel panel-default">
        <div class="panel-heading">
           Aktif Siswa
        </div>
        <div class="panel-body" >
            <?php
                @$kodea = $_GET[ppdbid];
                if (@$kodea != '')
                {
                    
                  
                    //echo "$rm";
                    @$siswa     = $con->query("select * from tbl_siswa where siswa_nisn=$kodea");
                   // @$rmbel     = $con->query("select * from tbl_rombel where rombel_id=$rm");


                    @$dd        = $siswa->fetch_assoc();
                   // @$ee        = $rmbel->fetch_assoc();
                   // @$pro       = $ee[program_id];
                    @$foto      = $dd[siswa_foto];
                   // @$thn       = $ee[tahun_id];

                    if ($foto == '')
                    {
                        echo"<img src='../img/foto-siswa/noimage.png' class='img img-rounded img-responsive'>";
                    }
                    else
                    {
                        echo"<img src='../img/foto-siswa/$dd[siswa_foto]' class='img img-rounded img-responsive'>";
                    }
                    echo "<br>
                        <form action='' method='POST' >

                            <div class='form-group'>
                                <label class='control-label' for='mapelurut'>Nama Siswa</label>
                                <input type='text' name='namasiswa' class='form-control' id='mapelurut' value='$dd[siswa_nama]' readonly>
                                <input type='hidden' name='siswaid' class='form-control' id='mapelurut' value='$dd[siswa_id]' readonly>
                            </div>
                            
                            <div class='form-group'>
                                <label class='control-label' for='mapelurut'>Masuk Rombel</label>
                                
                                <select name='rombelid' class='form-control'>";

                                    $rombel = $con->query("select * from tbl_rombel a left join tbl_tahunajaran b 
                                                            on a.tahun_id=b.tahun_id 
                                                              where a.rombel_semester=1 and a.tahun_id=$tahun order by rombel_id");

                                    while ($as = $rombel->fetch_array())
                                    {
                                        echo "<option value='$as[rombel_id]'> $as[rombel_nama] - $as[tahun_ajaran]</option>";
                                    }
                                ?>
                                </select>
                                <hr>
                                <button class="btn btn-success" name="naik" value="naik">Masuk</button>
                            </form>
                            </div>      
            <?php        
                }
            ?>
            <font color="red">
              <ul>
              <li>Data Siswa Dapat Dimasukkan kedalam Rombel jika sudah daftar ulang</li>
              <li>NISN Harus diisi Jika Akan Memasukkan Siswa kedalam Database</li>
              </ul>
        </div>
        </div>
<?php
    if (@$_POST['naik']=='naik')
    {
        @$siswaid    = $_POST[siswaid];
        @$rombelid   = $_POST[rombelid];

        @$simpan     = $con->query("insert into tbl_pesertarombel set siswa_id=$siswaid, rombel_id=$rombelid");
        echo"Siswa Berhasil Naik";
    }
?>