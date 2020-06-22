<ul class="nav nav-list">
    <li><a href="?page=Dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
     <?php
             if ((@$_SESSION[hak] == 'master') or (@$_SESSION[hak] == 'admin')) 
             {
      ?> 
        <li class="">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-desktop"></i> <span> Akademik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="submenu">
              <li class="">
              <a href="?page=Kurikulum"><i class="fa fa-circle-o"></i> Kurikulum
                <span class="pull-right-container"></span>
              </a>
            </li>
             <li>
              <a href="?page=Data Pelajaran"><i class="fa fa-circle-o"></i> Data Pelajaran
                <span class="pull-right-container"></span>
              </a>
            </li>
            <li>
              <a href="?page=Jam Mengajar Guru"><i class="fa fa-circle-o"></i> Pembagian Pelajaran
                <span class="pull-right-container"></span>
              </a>
            </li>
             <li><a href="?page=Praktik Kerja Industri"><i class="fa fa-circle-o"></i> Prakerin</a></li>
             
            <li class="">
          <a href="#" class="dropdown-toggle">
            <i class="glyphicon glyphicon-download"></i> <span>Akhir Tahun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="submenu">
             <li><a href="?page=Uji Kompetensi"><i class="fa fa-circle-o"></i> Uji Kompetensi</a></li>
             <li><a href="?page=Ujian Sekolah"><i class="fa fa-circle-o"></i> US</a></li>
             <li><a href="?page=Ujian Nasional"><i class="fa fa-circle-o"></i> UN</a></li>
            
            
            
          </ul>
        </li>
         <li class="">
          <a href="#" class="dropdown-toggle">
            <i class="glyphicon glyphicon-print"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="submenu">
            <li><a href="?page=Nilai Semester <?php echo "$ad[semester_nama]&sms=$semester"; ?>"><i class="fa fa-circle-o"></i> Nilai Semester <?php echo "$ad[semester_nama]"; ?></a></li>
           
            <li><a href="?page=Transkrip Nilai"><i class="fa fa-circle-o"></i> Transkrip Akhir</a></li>
            
            
          </ul>
        </li>   
          </ul>
        </li>
        
           <li class="">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-graduation-cap"></i> <span> Kesiswaan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                    <ul class="submenu">
                      <li><a href="?page=Data Siswa Aktif"><i class="fa fa-circle-o"></i> Peserta Didik</a></li>
                      <li><a href="?page=Data Alumni"><i class="fa fa-circle-o"></i> Alumni</a></li>
                      <li><a href="?page=Data PPDB"><i class="fa fa-circle-o"></i> PPDB TA <?php echo"$as[tahun_ajaran]";?></a></li>
                      <li class="treeview">
              <a href="#" class="dropdown-toggle">
             <i class="glyphicon glyphicon-user"></i> <span>Point Siswa</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                    <ul class="submenu">
                      <li><a href="?page=Reward"><i class="fa fa-circle-o"></i> Reward</a></li>
                      <li><a href="?page=Funisment"><i class="fa fa-circle-o"></i> Funisment</a></li>
                    </ul>
                </span>
              </a>
              
            </li>
                    </ul>
                </span>
              </a>
              
            </li>
           <?php 
         }

           ?> 
         
       
           <li class="">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-user"></i> <span> GTK</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                   <ul class="submenu">
                      <li><a href="?page=Data Guru"><i class="fa fa-circle-o"></i> Guru</a></li>
                      <li><a href="?page=Data Tenaga Kependidikan"><i class="fa fa-circle-o"></i> Tendik</a></li>
                      
                  </ul>
                </span>
              </a>
              
            </li>
            
           <?php
             if ((@$_SESSION[hak] == 'keuangan') or (@$_SESSION[hak] == 'master'))
             {
           ?> 
           <li class="">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-money"></i> <span> Keuangan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                   <ul class="submenu">
                      <li><a href="?page=data-pembayaran-siswa"><i class="fa fa-circle-o"></i> Keuangan Siswa</a></li>
                       <li><a href="?page=transaksi-pembayaran"><i class="fa fa-circle-o"></i> Transaksi Pembayaran</a></li>
                      <li><a href="?page=data-pendapatan"><i class="fa fa-circle-o"></i> Honorarium</a></li>
                      
                  </ul>
                </span>
              </a>
              
            </li>
            <?php
              }
            ?>
           
           <?php
             if (@$_SESSION[hak] == 'master')
             {
           ?> 
           <li class="">
              <a href="#" class="dropdown-toggle">
                 <i class="fa fa-internet-explorer"></i> <span>Website</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                   <ul class="submenu">
                      <li><a href="?page=Berita" ><i class="fa fa-circle-o"></i> Data Berita</a></li>
                      <li><a href="?page=Agenda Kegiatan" ><i class="fa fa-circle-o"></i> Data Agenda</a></li>
                      <li><a href="?page=Artikel" ><i class="fa fa-circle-o"></i> Data Artikel</a></li>
                       
                      
                  </ul>
                </span>
              </a>
              
            </li>
            <li class="">
              <a href="#" class="dropdown-toggle">
                 <i class="fa fa-gears"></i> <span>Setting</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                   <ul class="submenu">
                      <li><a href="?page=Setting Info Sekolah"><i class="fa fa-circle-o"></i> Setting Info Sekolah</a></li>
                      <li><a href="?page=Data User GTK"><i class="fa fa-circle-o"></i> Data User GTK</a></li>
                      <li><a href="?page=Data User Siswa"><i class="fa fa-circle-o"></i> Data User Siswa</a></li>
                      <li><a href="?page=Data User Alumni"><i class="fa fa-circle-o"></i> Data User Alumni</a></li>
                      <li><a href="?page=Gallery"><i class="fa fa-circle-o"></i> Setting Data Gallery</a></li>
                      <li><a href="?page=Pesan"> <i class="fa fa-envelope"></i> Pesan</a></li>

                     
                      
                      
                  </ul>
                </span>
              </a>
              
            </li>
            <li class="">
              <a href="#" class="dropdown-toggle">
                 <i class="glyphicon glyphicon-duplicate"></i> <span>Referensi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                   <ul class="submenu">
                      <li><a href="?page=Tahun Akademik"><i class="fa fa-circle-o"></i> Tahun Akademik</a></li>
                      <li><a href="?page=Kompetensi Keahlian"><i class="fa fa-circle-o"></i> Kompetensi Keahlian</a></li>
                    
                      <li><a href="?page=Rombongan Belajar"><i class="fa fa-circle-o"></i> Rombel</a></li>
                      
                     
                      
                      
                  </ul>
                </span>
              </a>
              
            </li>
             <li class="">
              <a href="#" class="dropdown-toggle">
                 <i class="glyphicon glyphicon-duplicate"></i> <span>Laporan Hasil Belajar</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                   <ul class="submenu">
                      <li><a href="?page=Tahun Akademik"><i class="fa fa-circle-o"></i> Catatan Wali Kelas</a></li>
                      <li><a href="?page=Kompetensi Keahlian"><i class="fa fa-circle-o"></i> Deskripsi Sikap</a></li>
                    
                      <li><a href="?page=Rombongan Belajar"><i class="fa fa-circle-o"></i> Absensi</a></li>
                      <li><a href="?page=Rombongan Belajar"><i class="fa fa-circle-o"></i> Ektra Kulikuler</a></li>
                      <li><a href="?page=Cetak Raport"><i class="fa fa-circle-o"></i> Cetak Raport</a></li>
                      
                      
                  </ul>
                </span>
              </a>
              
            </li>
             <li><a href="../" target="blank"><i class="fa fa-rocket"></i> <span>Lihat Situs</span> </a></li>
             <li><a href="logout.php"><i class="fa fa-user"></i> <span>Logout</span> </a></li>
         <?php
          }
         ?>
    
 
</ul>