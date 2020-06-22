<ul class="nav nav-list">
    <li class="">
        <a href="?page=Dashboard"><i class="fa fa-desktop"></i> Dashboard </a>
    </li>
<li class="">
<a href="#" class="dropdown-toggle">
  <i class="fa fa-book"></i> <span>Akademik</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="submenu">
   <li><a href="?page=data-pelajaran"><i class="fa fa-circle-o"></i> Penilaian</a></li>
   <li><a href="?page=agenda-harian"><i class="fa fa-circle-o"></i> Agenda Harian</a></li>
   <li><a href="?page=ki-kd"><i class="fa fa-circle-o"></i> KI-KD</a></li>
   <li><a href="?page=dok-akademik"><i class="fa fa-circle-o"></i> Dokumen Akademik</a></li>
  
</ul>
</li>
<?php
  if (@$jmm <> 0)
  {
?>
<li class="">
<a href="#" class="dropdown-toggle">
  <i class="fa fa-user"></i> <span>Wali Kelas</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="submenu">
   <li><a href="?page=mapel-rombel"><i class="fa fa-circle-o"></i> Input Nilai Kelas</a></li>
   <li><a href="?page=data-pelajaran"><i class="fa fa-circle-o"></i> Leger</a></li>
   <li><a href="?page=agenda-harian"><i class="fa fa-circle-o"></i> Buku Induk</a></li>
   <li><a href="?page=cetak-raport&semester=<?php echo"$smsms&rombelid=$wk[rombel_id]";?>"><i class="fa fa-circle-o"></i> Raport</a></li>
   <li><a href="?page=dok-akademik"><i class="fa fa-circle-o"></i> Transkrip Nilai</a></li>
   <li><a href="?page=nilai-ekskul&semester=<?php echo"$smsms&rombelid=$wk[rombel_id]";?>"><i class="fa fa-circle-o"></i> Nilai Ekskul</a></li>
   <li><a href="?page=nilai-prakerin&semester=<?php echo"$smsms&rombelid=$wk[rombel_id]";?>"><i class="fa fa-circle-o"></i> Nilai Prakerin</a></li>
   <li><a href="?page=catatan-walikelas&semester=<?php echo"$smsms&rombelid=$wk[rombel_id]";?>"><i class="fa fa-circle-o"></i> Catatan Wali Kelas</a></li>
    <li><a href="?page=nilai-kehadiran&semester=<?php echo"$smsms&rombelid=$wk[rombel_id]";?>"><i class="fa fa-circle-o"></i> Nilai Kehadiran</a></li>
  
</ul>
</li>
<?php
}
?>  

<li class="">
<a href="#" class="dropdown-toggle">
  <i class="fa fa-gear"></i> <span>Setting</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="submenu">
   <li><a href="?page=info"><i class="fa fa-circle-o"></i>Info Pribadi</a></li>
   
  
</ul>
</li>
  <li class="">
  <a href="logout.php">
  Logout  </a>
  

</li>


</ul>


<!-- /.sidebar -->