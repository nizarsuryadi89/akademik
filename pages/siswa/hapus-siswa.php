<?php
	require_once "../../../configakademik.php";
	if ($_REQUEST['hapus']) {
		
		$pid = $_REQUEST['hapus'];
		$query = "DELETE FROM tbl_siswa WHERE siswa_id =$pid ";
		$stmt = $con->query($query);
		
		
		if ($stmt) {
			echo "Siswa berhasil dihapus...";
		}
	}
?>