<?php    
    @$infosekolah  = $con->query("select * from tbl_foto");
    @$in       = $infosekolah->fetch_assoc();


    $ip         =   $_SERVER['REMOTE_ADDR'];
    $hostname   =   gethostbyaddr($_SERVER['REMOTE_ADDR']);

?>
<div>
    <div class="alert alert-block alert-success">
      <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
      </button>

      <i class="ace-icon fa fa-check green"></i>
      <center>
      Selamat Datang  <strong class="green"><?php echo"$username"?></strong> di 
      <strong class="green">
        SiAkad
        <small>(v4.2.1) 2018</small>
      </strong>,
        Banyak Yang Baru pada Versi ini bisa di cek disini <a href="#" data-target="#info" data-toggle="modal"><i class="fa fa-question-circle"></i></a><br> Selamat Bekerja Bapak/Ibu Administrator
    </div>
  </div>
  <div class="row">
      <div class="col-xs-12 col-sm-8 widget-container-col" id="widget-container-col-1">
        <div class="widget-box widget-color-blue" id="widget-box-2">
          <div class="widget-header">
            <h4 class="widget-title lighter smaller " >Info Satuan Pendidikan</h4>
          </div>
          <div class="widget-body">
            <div class="widget-main">
              
              <table width="60%">
                <tr><td>No SK Pendirian </td><td>: &nbsp; <b><?php echo "$sk[no_sk]";?></b></td> </tr>
                <tr><td>NPSN </td><td>: &nbsp; <b><?php echo "$sk[npsn]";?></b></td> </tr>
                <tr><td>Pendidikan </td><td>: &nbsp;<b><?php echo"$sk[pendidikan]";?></b></td></tr>
                <tr><td>Status </td><td>:&nbsp; <b> <?php echo"$sk[status] - $sk[nama_yayasan]";?></b></td></tr>
                <tr><td>Alamat  </td><td>:&nbsp; <b><?php echo "$sk[alamat_sekolah]";?></b></td></tr>
                <tr><td>Email  </td><td>:&nbsp; <b><?php echo "$sk[email_sekolah]";?></b></td></tr>
                <tr><td>Kecamatan  </td><td>:&nbsp; <b><?php echo "$sk[kecamatan]";?></b></td></tr>
                <tr><td>Kota/Kab</td><td>:&nbsp; <b><?php echo "$sk[kota]";?></b></td></tr>
                <tr><td>Provinsi</td><td>:&nbsp; <b><?php echo "$sk[provinsi]";?></b></td></tr>
                <tr><td>Kepala Sekolah</td><td>:&nbsp; <b><?php echo"$sk[nama_kepsek]";?></b></td></tr>
              </table>
            </div>
            </div>
          </div>
        </div>
    
    <div class="widget-box widget-color-blue2 col-sm-4">
    <div class="widget-header">
      Informasi Login
    </div>
        <div class="panel-body">
    <dl>
      <dt>IP Address / Device Name</dt>
      <dd><?php echo"$ip / $hostname";?></dd>
      <dd><?php echo"$username / $nama";?></dd>
    </dl>
    </div>
    </div> 
     
    <div class="widget-box widget-color-blue2 col-sm-4">
    <div class="widget-header">
            Jam Mengajar  TA <?php echo"$as[tahun_ajaran] Semester $ad[semester_nama]";?></h4>
          </div>
        <div class="panel-body">
    <?php
        //include "rombel/data-rombel.php";
        //include "pelajaran/jumlah-jam.php";
        echo "Klik <a href='?page=Jam Mengajar Guru'>disini</a> untuk membuka jam mengajar ";
    ?>
    </div>
  
  </div>
  </div>
  
  <div class="row">
    

      <div class="col-xs-12 col-sm-8 widget-container-col" id="widget-container-col-1">
        <div class="widget-box widget-color-blue" id="widget-box-2">
          <div class="widget-header">
            <h4 class="widget-title lighter smaller " >Rombongan Belajar TA. <?php echo"$as[tahun_ajaran] Semester  $ad[semester_nama]";?></h4>
          </div>
          
      <?php
        $rombel = $con->query("select * from tbl_rombel where tahun_id=$tahun and semester_id=$ad[semester_id] order by rombel_semester asc");

      ?>
     <div class="panel-body">
          Klik  <a href='?page=Rombongan Belajar'>disini</a> untuk melihat Detail <br><br>
       
        <div class="table-responsive">
          <table class="table table-stripes table-hover">
            <tr>
              <th>No</th>
              <th>Wali Kelas</th>
              <th>Kelas(Input Nilai)</th>
              <th>L</th>
              <th>P</th>
              <th>Jml</th>

            </tr>

        <?php

        
        $no =1;
        while ($data=$rombel->fetch_array())
        {
          $lakilaki  = $con->query("select count(siswa_jk)as L from tbl_siswa a inner join tbl_pesertarombel b on a.siswa_id=b.siswa_id where siswa_jk = 'L' and rombel_id = $data[rombel_id]");

          $perempuan = $con->query("select count(siswa_jk)as P from tbl_siswa a inner join tbl_pesertarombel b on a.siswa_id=b.siswa_id where siswa_jk = 'P' and rombel_id = $data[rombel_id]");
          $ll        = $lakilaki->fetch_assoc();
          $pp        = $perempuan->fetch_assoc();
          $jumlah    = @$pp[P]+@$ll[L];

          $walikelas = $con->query("select guru_foto from tbl_guru where guru_id=$data[rombel_wali] ");
          @$wl        = $walikelas->fetch_array();
        ?>
            <tr>
              <td><?php echo"$no"; ?></td>
              <td><img src='assets/foto-guru/<?php echo"$wl[guru_foto]" ?>' width='30' height='47' class='img-rounded'></td>
              <td>
                 <?php
                  echo" <a href='?page=mapel-rombel&kd-rombel=$data[rombel_id]&semester=$data[rombel_semester]'><button class='btn btn-primary btn-block btn-sm'>$data[rombel_nama]"; ?> </button></a> </td>

              <td><?php echo"$ll[L]"; ?></td>
              <td><?php echo"$pp[P]"; ?></td>
              <td><?php echo"$jumlah "; ?></td>
            </tr>
        <?php 
        $no++;
        @$jmll  = $jmll+$ll[L];
        @$jmlp  = $jmlp+$pp[P];
        @$jmlll = $jmll+$jmlp;
        }
        ?>
            <tr><td colspan="3" align="center"><b>Jumlah</td><td><b><?php echo"$jmll";?></td><td><b><?php echo"$jmlp";?></td><td><b><?php echo"$jmlll";?></td></tr>
          </table>
        </div>
      </div>
    </div>
    <?php
   

    if ((@$_SESSION[hak] == 'master') or (@$_SESSION[hak] == 'keuangan')) 
       {
    ?>
  </div>
  
  <?php
    }
    
  ?>
  

<div class="widget-box widget-color-blue2 col-sm-4">
    <div class="widget-header">
        Informasi Update -   Update tgl 28 November 2018
    </div>
    <div class="panel-body">
      
        <marquee direction="up" loop="2" behavior="slide">
        <ul>
            <li>Menu Akademik - Kurikulum
                <ol type="1">
                    <li>dapat melihat struktur kurikulum / rombel</li>
                    <li>dapat melihat Peserta Rombel Rombel</li>
                    <li>Cetak Administrasi Belum Dapat Dilakukan</li>
                    <li><font color="red">dapat melihat Agenda Harian, tapi masih ada BUG</font></li>
                </ol>
            </li>
            <li>Menu Akademik - Data Pelajaran
                <ol type="1">
                    <li>Masih Bug Karena Tabel Kelompok Mata Pelajaran Belum di Buat</li>   
                </ol>
            </li>
            <li>Menu Akademik - Pembagian Jam Guru
                <ol type="1">
                    <li>Sudah dapat melihat Jumlah Jam Guru</li>
                    <li>Sudah Bisa Di Print</li>   
                </ol>
            </li>
            <li>Menu Akademik - Prakerin
                <ol type="1">
                    <li>Sudah Bisa Menambah Data Siswa Prakerin</li>
                    <li>Sudah Bisa Mengedit Data Siswa Prakerin</li>   
                    <li>Sudah Bisa Melihat Data Siswa Prakerin</li>
                    <li>Sudah Bisa Menghapus Data Siswa Prakerin</li>
                    <li><font color="red">Belum Bisa Print Data Siswa Prakerin</font></li>      
                </ol>
            </li>
            <li> <font color="red">Menu Akademik - Akhir Tahun - Uji Komptensi (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Akhir Tahun - US (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Akhir Tahun - UN (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Report - Semester Ganjil (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Report - Semester Ganjil (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Report - Transkrip Nilai (Masih BUG)</font></li>
            <li> Menu Kesiswaan - Peserta Didik
                <ol type="1">
                    <li>Sudah Bisa Melihat Data Seluruh Siswa</li>
                    <li>Belum Bisa Mengedit Data Siswa</li>   
                    <li>Sudah Bisa Cetak Semua Data Siswa</li>
                    <li>Sudah Bisa Menghapus Data Siswa </li>
                    <li>Sudah Bisa Meluluskan Data Siswa </li>
                  
                </ol>
            </li>
             <li> <font color="red">Menu Kesiswaan - Alumni BUG</font>
                <ol type="1">
                    <li>Sudah Bisa Melihat Data Seluruh Alumni</li>
                    
                  
                </ol>
            </li>
        </ul>
      </div>
    </marquee>
 
    
<div id="info" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informasi Update</h4>
      </div>
      <div class="modal-body">
        Update tgl 28 November 2018
        <ul>
            <li>Menu Akademik - Kurikulum
                <ol type="1">
                    <li>dapat melihat struktur kurikulum / rombel</li>
                    <li>dapat melihat Peserta Rombel Rombel</li>
                    <li>Cetak Administrasi Belum Dapat Dilakukan</li>
                    <li><font color="red">dapat melihat Agenda Harian, tapi masih ada BUG</font></li>
                </ol>
            </li>
            <li>Menu Akademik - Data Pelajaran
                <ol type="1">
                    <li>Masih Bug Karena Tabel Kelompok Mata Pelajaran Belum di Buat</li>   
                </ol>
            </li>
            <li>Menu Akademik - Pembagian Jam Guru
                <ol type="1">
                    <li>Sudah dapat melihat Jumlah Jam Guru</li>
                    <li>Sudah Bisa Di Print</li>   
                </ol>
            </li>
            <li>Menu Akademik - Prakerin
                <ol type="1">
                    <li>Sudah Bisa Menambah Data Siswa Prakerin</li>
                    <li>Sudah Bisa Mengedit Data Siswa Prakerin</li>   
                    <li>Sudah Bisa Melihat Data Siswa Prakerin</li>
                    <li>Sudah Bisa Menghapus Data Siswa Prakerin</li>
                    <li><font color="red">Belum Bisa Print Data Siswa Prakerin</font></li>      
                </ol>
            </li>
            <li> <font color="red">Menu Akademik - Akhir Tahun - Uji Komptensi (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Akhir Tahun - US (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Akhir Tahun - UN (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Report - Semester Ganjil (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Report - Semester Ganjil (Masih BUG)</font></li>
            <li> <font color="red">Menu Akademik - Report - Transkrip Nilai (Masih BUG)</font></li>
            <li> Menu Kesiswaan - Peserta Didik
                <ol type="1">
                    <li>Sudah Bisa Melihat Data Seluruh Siswa</li>
                    <li>Belum Bisa Mengedit Data Siswa</li>   
                    <li>Sudah Bisa Cetak Semua Data Siswa</li>
                    <li>Sudah Bisa Menghapus Data Siswa </li>
                    <li>Sudah Bisa Meluluskan Data Siswa </li>
                  
                </ol>
            </li>
             <li> <font color="red">Menu Kesiswaan - Alumni BUG</font>
                <ol type="1">
                    <li>Sudah Bisa Melihat Data Seluruh Alumni</li>
                    
                  
                </ol>
            </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="peringatan" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informasi Kesalahan</h4>
      </div>
      <div class="modal-body">
        <?php //include "peringatan.php";?>
      </div>
    </div>
  </div>
</div>
