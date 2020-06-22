
<?php
	include "../config/config.php";
	if (@$_GET[aksi]=='do')
    {
      @$kode = $_GET[siswanis];
      @$do   = $con->query("update tbl_siswa set siswa_aktif = 'D' where siswa_id=$kode");
      
      header('location:../index.php?page=Data%20Siswa%20Aktif');
    }