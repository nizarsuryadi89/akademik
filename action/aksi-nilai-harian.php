<?php
	include "../../config.php";

	if ($_POST['simpan']=='simpan')
	{
		@$nilaiid   = $_POST[nilaiid];

		@$kd31 		= $_POST[kd31];
		@$kd32 		= $_POST[kd32];
		@$kd33 		= $_POST[kd33];
		@$kd34 		= $_POST[kd34];
		@$kd35 		= $_POST[kd35];
		@$kd36 		= $_POST[kd36];
		@$kd37 		= $_POST[kd37];
		@$kd38 		= $_POST[kd38];
		@$kd39 		= $_POST[kd39];
		@$kd310 	= $_POST[kd310];
		@$kd31a 	= $_POST[kd31a];
		@$kd32a 	= $_POST[kd32a];
		@$kd33a 	= $_POST[kd33a];
		@$kd34a		= $_POST[kd34a];
		@$kd35a 	= $_POST[kd35a];
		@$kd36a 	= $_POST[kd36a];
		@$kd37a 	= $_POST[kd37a];
		@$kd38a 	= $_POST[kd38a];
		@$kd39a 	= $_POST[kd39a];
		@$kd310a 	= $_POST[kd310a];
		
		$simpan = $con->query("update tbl_nilai_harian set 
									kd_31 	= $kd31,
									kd_32 	= $kd32,
									kd_33 	= $kd33,
									kd_34 	= $kd34,
									kd_35 	= $kd35,
									kd_36 	= $kd36,
									kd_37 	= $kd37,
									kd_38 	= $kd38,
									kd_39 	= $kd39,
									kd_310 	= $kd310,
									kd_31a 	= $kd31a,
									kd_32a 	= $kd32a,
									kd_33a 	= $kd33a,
									kd_34a	= $kd34a,
									kd_35a 	= $kd35a,
									kd_36a 	= $kd36a,
									kd_37a 	= $kd37a,
									kd_38a 	= $kd38a,
									kd_39a 	= $kd39a,
									kd_310a = $kd310a
								where nilai_id=$nilaiid
								");

		$rombel 		= $con->query("select * from tbl_nilaipengetahuan
											where nilai_id=$nilaiid");
		$rom    		= $rombel->fetch_assoc();

		$romb 			= $rom[rombel_id];
		$mapel  		= $rom[mapel_id];
		$mapelrombel 	= $rom[mapelrombel_id];

		echo "$mapelrombel";
		header("Location: ../?page=input-nilai-pengetahuan&mapel-kd=$mapel&rombel-kd=$romb&kur-id=2&mapelrombel=");

		exit();

	}
?>