<?php
	
	if (@$_POST[simpan]=='simpan')
	{
		$mapel 			= @$_POST[mapel];
		$rombel 		= @$_POST[rombel];
		$semester 		= @$_POST[semester];
	//	$mr 		 	= @$_POST[mapelrombel];

		//echo"$rombel <br>";
		//echo"$mapel <br>";
	//	echo"$mr <br>";

		if ($semester == 1)
		{
			$dd = $con->query("select * from tbl_transkrip_sms1 where mapel_id = $mapel and rombel_id=$rombel");
		}
		elseif ($semester == 2) 
		{
			$dd = $con->query("select * from tbl_transkrip_sms2 where mapel_id = $mapel and rombel_id=$rombel");
		}
		elseif ($semester == 3) 
		{
			$dd = $con->query("select * from tbl_transkrip_sms3 where mapel_id = $mapel and rombel_id=$rombel");
		}
		elseif ($semester == 4) 
		{
			$dd = $con->query("select * from tbl_transkrip_sms4 where mapel_id = $mapel and rombel_id=$rombel");
		}elseif ($semester == 5) 
		{
			$dd = $con->query("select * from tbl_transkrip_sms5 where mapel_id = $mapel and rombel_id=$rombel");
		}
		elseif ($semester == 2) 
		{
			$dd = $con->query("select * from tbl_transkrip_sms6 where mapel_id = $mapel and rombel_id=$rombel");
		}


		while ($row= $dd->fetch_array())
		{
			@$nilaiakhir 	= (@$row[nPraktik_sms1] + @$row[nProduk_sms1] + @$row[nProyek_sms1])/3;

				//$nBulat 	  = ($nilaiakhir*4)/100;
				$nBulat 	  = round($nilaiakhir,1);

				include "deskripsi-sikap.php";

			//echo "$row[nilai_id] - $row[siswa_nis] &nbsp;  $row[nPraktik_sms1] &nbsp; $row[nProyek_sms1] &nbsp; $row[nProduk_sms1]  $nBulat $deskripsi<br> ";

			if ($semester == 1)
			{
				$simpan = $con->query("update tbl_transkrip_sms1 set deskS_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");

			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
			}
			elseif ($semester == 2)
			{
				$simpan = $con->query("update tbl_transkrip_sms2 set deskS_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");

			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
			}
			elseif ($semester == 3)
			{
				$simpan = $con->query("update tbl_transkrip_sms3 set deskS_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");

			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
			}
			elseif ($semester == 4)
			{
				$simpan = $con->query("update tbl_transkrip_sms4 set deskS_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");

			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
			}
			elseif ($semester == 5)
			{
				$simpan = $con->query("update tbl_transkrip_sms5 set deskS_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");

			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
			}
			elseif ($semester == 6)
			{
				$simpan = $con->query("update tbl_transkrip_sms6 set deskS_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");

			echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-sikap&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
			}
			//echo"update tbl_transkrip_sms1 set deskP_sms1 = '$deskripsi' where nilai_id = $row[nilai_id] <br>";

		}
	}
?>