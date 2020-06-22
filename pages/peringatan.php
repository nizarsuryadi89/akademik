<?php
	$q_peringatan	=$con->query("select * from tbl_transkrip where 
									((sms_1 = 0) or (sms_2 = 0) or (sms_1 = 0) or (sms_3 = 0) or (sms_4 = 0) or (sms_5 = 0))");
	$jumlah = mysqli_num_rows($q_peringatan);
	echo "Jumlah Kesalahan : $jumlah <hr>";
	while ($per = $q_peringatan->fetch_array())
	{
		$siswa 	= $con->query("select siswa_nama from tbl_siswa where siswa_nis='$per[siswa_nis]'");
		$sis 	= $siswa->fetch_assoc();

		echo"$sis[siswa_nama] <br>semester 1 : $per[sms_1] <br> semester 2: $per[sms_2] <br>semester 3:$per[sms_3] <br> semester 4 : $per[sms_4] <br> semester 5: $per[sms_5]<br>";
	}
?>