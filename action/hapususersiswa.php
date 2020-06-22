<?php
	include "../config/config.php";

	if ($_GET['ID'] <> ''){
		$qreset 	= "DELETE FROM user_siswa where username = '$_GET[ID]' ";
		
		$reset = $con->query($qreset);

		// echo $qreset;

		 header('location:../index.php?page=Data%20User%20Siswa');
	}
?>