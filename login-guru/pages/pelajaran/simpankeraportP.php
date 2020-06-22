<?php
	
	if (@$_POST[simpan]=='simpan')
	{
		$mapel 			= @$_POST[mapel];
		$rombel 		= @$_POST[rombel];
		$semester 		= @$_POST[semester];
		
		echo"$semester";
		
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
		}
		elseif ($semester == 5)
		{
			$dd = $con->query("select * from tbl_transkrip_sms5 where mapel_id = $mapel and rombel_id=$rombel");
		}
		elseif ($semester == 6)
		{
			$dd = $con->query("select * from tbl_transkrip_sms6 where mapel_id = $mapel and rombel_id=$rombel");
		}

		
		while ($row= $dd->fetch_array())
		{
			@$nilaiuts 	= $row[pts_sms1];
			@$nilaiuas  = $row[pas_sms1];
			@$nilaiH 	= $row[nh_sms1];

			@$nilaiakhir  = (($nilaiH * 4)+($nilaiuts * 2)+($nilaiuas * 2))/8;

				//$nBulat 	  = ($nilaiakhir*4)/100;
			$nBulat 	  = round($nilaiakhir,1);

				if (($nBulat >= 88) and ($nBulat <= 100))
				{	
					@$predikat			="A";
					@$deskripsi 			="<b>Sangat baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasa";
				}else
				if (($nBulat >= 74) and ($nBulat<= 87.99 ))
				{	@$predikat			="B";
					@$deskripsi 		="<b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar" ;
				}else
				if (($nBulat >= 60) and ($nBulat <= 73.99))
				{	@$predikat			="C";
					@$deskripsi  		= "<b>Cukup</b>. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar";
				}else
				if (($nBulat < 60) and ($nBulat >= 1))
				{	@$predikat		="D";
					@$deskripsi 	= "<b>Sangat kurang</b>. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja. "; 
				}
				elseif ($nBulat == 0){
					@$predikat		="-";
					$deskripsi = "Nilai Belum Diisi";
				}



				// update tabel update 

				if ($semester == 1)
				{
					$simpan = $con->query("update tbl_transkrip_sms1 set deskP_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");
					echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
				}
				elseif ($semester == 2)
				{	$simpan = $con->query("update tbl_transkrip_sms2 set deskP_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");
					echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
				}
				elseif ($semester == 3)
				{	$simpan = $con->query("update tbl_transkrip_sms3 set deskP_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");
					echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
				}
				elseif ($semester == 4)
				{	$simpan = $con->query("update tbl_transkrip_sms4 set deskP_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");
					echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
				}
				elseif ($semester == 5)
				{	$simpan = $con->query("update tbl_transkrip_sms5 set deskP_sms1 = '$deskripsi' where nilai_id = $row[nilai_id]");
					echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$mapel&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
				}

			
		}
	}
?>