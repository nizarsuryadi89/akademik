<?php
if ($_GET['simpan']=='simpan')
	{
		$siswa_nis 	= $_GET[nis];
		$nilai 		= $_GET[nilai];
		$rombel 	= $_GET[rombel];
		$mapel 		= $_GET[mapel];

		$updatenilaius=$con->query("update tbl_transkrip set us = $nilai, rombel_id=$rombel
									 where mapel_id=$mapel and siswa_nis='$siswa_nis' ");

		echo"update tbl_transkrip set us = $nilai, rombel_id=$rombel
									 where mapel_id=$mapel and siswa_nis='$siswa_nis' ";
	}
?>