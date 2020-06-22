<?php
	include "../config/config.php";
	if (@$_GET[aksi]=='lulus')
    {

      @$kode = $_GET[siswanis];
      @$do   = $con->query("update tbl_siswa set siswa_aktif = 'L' where siswa_id=$kode");
      
      header('location:../index.php?page=Data%20Siswa%20Aktif');
    }
?>