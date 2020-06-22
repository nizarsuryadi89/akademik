<?php
	include "../config/config.php";
	if (@$_POST[simpan] == 'simpan')
	{
		@$kkm 		= $_POST['kkm'];
		@$mapelid 	= $_POST['mapelkd'];
		@$sms 		= $_POST['sms'];
		@$rombel 	= $_POST['rombel'];
		$guru 		= $_POST['guruid'];


		echo "$kkm $mapelid $sms $rombel";


		if ($sms == 1){ 
			$edit = $con->query("UPDATE tbl_transkrip_sms1 set kkm_sms1 = $kkm where (mapel_id = $mapelid) AND (rombel_id = $rombel)");

			header('location:index.php?page=pembelajaran-rombel&kd-rombel=103&semester=1');
		}elseif ($sms == 2){
			$query 	= "UPDATE tbl_transkrip_sms2 set kkm_sms1 = $kkm 
									where (mapel_id = $mapelid) AND (rombel_id = $rombel) AND (guru_sms1 = $guru)";
			echo "$query";

			$edit 	= $con->query($query);

			// header('location:index.php?page=pembelajaran-rombel&kd-rombel=103&semester=2');
			
		}elseif ($sms == 3) {
			$edit = $con->query("UPDATE tbl_transkrip_sms3 set kkm_sms1 = $kkm where (mapel_id = $mapelid) AND (rombel_id = $rombel)");

			header('location:.index.php?page=pembelajaran-rombel&kd-rombel=103&semester=3');
		}elseif ($sms == 4) {
			$edit = $con->query("UPDATE tbl_transkrip_sms4 set kkm_sms1 = $kkm where (mapel_id = $mapelid) AND (rombel_id = $rombel)");

			header('location:index.php?page=pembelajaran-rombel&kd-rombel=103&semester=4');
		}elseif ($sms == 5) {
			$edit = $con->query("UPDATE tbl_transkrip_sms5 set kkm_sms1 = $kkm where (mapel_id = $mapelid) AND (rombel_id = $rombel)");

			header('location:index.php?page=pembelajaran-rombel&kd-rombel=103&semester=5');
		}elseif ($sms == 6) {
			$edit = $con->query("UPDATE tbl_transkrip_sms6 set kkm_sms1 = $kkm where (mapel_id = $mapelid) AND (rombel_id = $rombel)");

			header('location:index.php?page=pembelajaran-rombel&kd-rombel=103&semester=6');
		}

	}
?>