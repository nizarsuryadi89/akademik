<?php
	@$nis 		= $_GET['nis'];
	@$q_siswa 	= $con->query("select * from tbl_siswa a inner join tbl_orangtua b on a.siswa_id = b.siswa_id where siswa_nis=$nis");
	@$siswa 	= $q_siswa->fetch_assoc();
?>
<body onload="window.print()">
<?php
	include "raport-cover-depan.php";
?>


<?php
	include "raport-identitas-siswa.php";
?>
</body>
