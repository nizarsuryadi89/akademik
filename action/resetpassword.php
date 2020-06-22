<?php
	include "../config/config.php";

	if ($_GET['ID'] <> ''){
		$qreset 	= "UPDATE user_siswa set password = 'smknubisa' where username = '$_GET[ID]' ";
		
		$reset = $con->query($qreset);

		// echo $qreset;

		 header('location:../index.php?page=Data%20User%20Siswa');
	}
?>