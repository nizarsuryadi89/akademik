<?php 

switch ($sms) {
	case '6':
		//jumlah siswa
		$qsiswa 			= "SELECT COUNT(siswa_nis) as jmlsiswa from tbl_transkrip_sms6 where (mapel_id = $row[mapel_id]) AND rombel_id = $row[rombel_id]";
		$jml 				= $con->query($qsiswa);
		$jmlsiswa 			= $jml->fetch_assoc();

		$totalsiswa 		= $jmlsiswa['jmlsiswa'];


		//pengetahuan 
		$cekpengetahuan 	= "SELECT count(nh_sms1) as sukses from tbl_transkrip_sms6 where ((nh_sms1 <> 0) AND (pts_sms1 <> 0) AND (pas_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id]))";

		$jml 				= $con->query($cekpengetahuan);
		$jmlpeng 			= $jml->fetch_assoc();
		$suksespengethuan 	= $jmlpeng['sukses'];

		
		//keterampilan
		$cekketerampilan 	= "SELECT count(nPraktik_sms1) as sukses FROM tbl_transkrip_sms6 WHERE ((nPraktik_sms1 <> 0) AND (nProduk_sms1 <> 0) AND (nProyek_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id])) ";

		$jml 				= $con->query($cekketerampilan);
		$jmlket 			= $jml->fetch_assoc();
		$suksesketerampilan = $jmlket['sukses'];

		//echo $cekketerampilan;

		//persentsi pengetahuan
		$progresspengetahuan = ($suksespengethuan/$totalsiswa) * 100;
		$persenpengetahuan 	 = round($progresspengetahuan);
		//echo "$jmlpeng[sukses] - $jmlsiswa[jmlsiswa] $persenpengetahuan";

		$progressketerampilan = ($suksesketerampilan/$totalsiswa) * 100;
		$persenketerampilan   = round($progressketerampilan);
		//echo $persenketerampilan;
		break;
	case '5':
		//jumlah siswa
		$qsiswa 			= "SELECT COUNT(siswa_nis) as jmlsiswa from tbl_transkrip_sms5 where (mapel_id = $row[mapel_id]) AND rombel_id = $row[rombel_id]";
		$jml 				= $con->query($qsiswa);
		$jmlsiswa 			= $jml->fetch_assoc();

		$totalsiswa 		= $jmlsiswa['jmlsiswa'];


		//pengetahuan 
		$cekpengetahuan 	= "SELECT count(nh_sms1) as sukses from tbl_transkrip_sms5 where ((nh_sms1 <> 0) AND (pts_sms1 <> 0) AND (pas_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id]))";

		$jml 				= $con->query($cekpengetahuan);
		$jmlpeng 			= $jml->fetch_assoc();
		$suksespengethuan 	= $jmlpeng['sukses'];

		
		//keterampilan
		$cekketerampilan 	= "SELECT count(nPraktik_sms1) as sukses FROM tbl_transkrip_sms5 WHERE ((nPraktik_sms1 <> 0) AND (nProduk_sms1 <> 0) AND (nProyek_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id])) ";

		$jml 				= $con->query($cekketerampilan);
		$jmlket 			= $jml->fetch_assoc();
		$suksesketerampilan = $jmlket['sukses'];

		//echo $cekketerampilan;

		//persentsi pengetahuan
		$progresspengetahuan = ($suksespengethuan/$totalsiswa) * 100;
		$persenpengetahuan 	 = round($progresspengetahuan);
		//echo "$jmlpeng[sukses] - $jmlsiswa[jmlsiswa] $persenpengetahuan";

		$progressketerampilan = ($suksesketerampilan/$totalsiswa) * 100;
		$persenketerampilan   = round($progressketerampilan);
		//echo $persenketerampilan;
		break;
		case '4':
		//jumlah siswa
		$qsiswa 			= "SELECT COUNT(siswa_nis) as jmlsiswa from tbl_transkrip_sms4 where (mapel_id = $row[mapel_id]) AND rombel_id = $row[rombel_id]";
		$jml 				= $con->query($qsiswa);
		$jmlsiswa 			= $jml->fetch_assoc();

		$totalsiswa 		= $jmlsiswa['jmlsiswa'];


		//pengetahuan 
		$cekpengetahuan 	= "SELECT count(nh_sms1) as sukses from tbl_transkrip_sms4 where ((nh_sms1 <> 0) AND (pts_sms1 <> 0) AND (pas_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id]))";

		$jml 				= $con->query($cekpengetahuan);
		$jmlpeng 			= $jml->fetch_assoc();
		$suksespengethuan 	= $jmlpeng['sukses'];

		
		//keterampilan
		$cekketerampilan 	= "SELECT count(nPraktik_sms1) as sukses FROM tbl_transkrip_sms4 WHERE ((nPraktik_sms1 <> 0) AND (nProduk_sms1 <> 0) AND (nProyek_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id])) ";

		$jml 				= $con->query($cekketerampilan);
		$jmlket 			= $jml->fetch_assoc();
		$suksesketerampilan = $jmlket['sukses'];

		//echo $cekketerampilan;

		//persentsi pengetahuan
		$progresspengetahuan = ($suksespengethuan/$totalsiswa) * 100;
		$persenpengetahuan 	 = round($progresspengetahuan);
		//echo "$jmlpeng[sukses] - $jmlsiswa[jmlsiswa] $persenpengetahuan";

		$progressketerampilan = ($suksesketerampilan/$totalsiswa) * 100;
		$persenketerampilan   = round($progressketerampilan);
		//echo $persenketerampilan;
		break;
	case '3':
	//jumlah siswa
		$qsiswa 			= "SELECT COUNT(siswa_nis) as jmlsiswa from tbl_transkrip_sms3 where (mapel_id = $row[mapel_id]) AND rombel_id = $row[rombel_id]";
		$jml 				= $con->query($qsiswa);
		$jmlsiswa 			= $jml->fetch_assoc();

		$totalsiswa 		= $jmlsiswa['jmlsiswa'];


		//pengetahuan 
		$cekpengetahuan 	= "SELECT count(nh_sms1) as sukses from tbl_transkrip_sms3 where ((nh_sms1 <> 0) AND (pts_sms1 <> 0) AND (pas_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id]))";

		$jml 				= $con->query($cekpengetahuan);
		$jmlpeng 			= $jml->fetch_assoc();
		$suksespengethuan 	= $jmlpeng['sukses'];

		
		//keterampilan
		$cekketerampilan 	= "SELECT count(nPraktik_sms1) as sukses FROM tbl_transkrip_sms3 WHERE ((nPraktik_sms1 <> 0) AND (nProduk_sms1 <> 0) AND (nProyek_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id])) ";

		$jml 				= $con->query($cekketerampilan);
		$jmlket 			= $jml->fetch_assoc();
		$suksesketerampilan = $jmlket['sukses'];

		//echo $cekketerampilan;

		//persentsi pengetahuan
		$progresspengetahuan = ($suksespengethuan/$totalsiswa) * 100;
		$persenpengetahuan 	 = round($progresspengetahuan);
		//echo "$jmlpeng[sukses] - $jmlsiswa[jmlsiswa] $persenpengetahuan";

		$progressketerampilan = ($suksesketerampilan/$totalsiswa) * 100;
		$persenketerampilan   = round($progressketerampilan);
		//echo $persenketerampilan;
	break;
	case '2':
	//jumlah siswa
		$qsiswa 			= "SELECT COUNT(siswa_nis) as jmlsiswa from tbl_transkrip_sms2 where (mapel_id = $row[mapel_id]) AND rombel_id = $row[rombel_id]";
		$jml 				= $con->query($qsiswa);
		$jmlsiswa 			= $jml->fetch_assoc();

		$totalsiswa 		= $jmlsiswa['jmlsiswa'];


		//pengetahuan 
		$cekpengetahuan 	= "SELECT count(nh_sms1) as sukses from tbl_transkrip_sms2 where ((nh_sms1 <> 0) AND (pts_sms1 <> 0) AND (pas_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id]))";

		$jml 				= $con->query($cekpengetahuan);
		$jmlpeng 			= $jml->fetch_assoc();
		$suksespengethuan 	= $jmlpeng['sukses'];

		
		//keterampilan
		$cekketerampilan 	= "SELECT count(nPraktik_sms1) as sukses FROM tbl_transkrip_sms2 WHERE ((nPraktik_sms1 <> 0) AND (nProduk_sms1 <> 0) AND (nProyek_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id])) ";

		$jml 				= $con->query($cekketerampilan);
		$jmlket 			= $jml->fetch_assoc();
		$suksesketerampilan = $jmlket['sukses'];

		//echo $cekketerampilan;

		//persentsi pengetahuan
		$progresspengetahuan = ($suksespengethuan/$totalsiswa) * 100;
		$persenpengetahuan 	 = round($progresspengetahuan);
		//echo "$jmlpeng[sukses] - $jmlsiswa[jmlsiswa] $persenpengetahuan";

		$progressketerampilan = ($suksesketerampilan/$totalsiswa) * 100;
		$persenketerampilan   = round($progressketerampilan);
		//echo $persenketerampilan;
		break;
		case '1':
		//jumlah siswa
		$qsiswa 			= "SELECT COUNT(siswa_nis) as jmlsiswa from tbl_transkrip_sms1 where (mapel_id = $row[mapel_id]) AND rombel_id = $row[rombel_id]";
		$jml 				= $con->query($qsiswa);
		$jmlsiswa 			= $jml->fetch_assoc();

		$totalsiswa 		= $jmlsiswa['jmlsiswa'];


		//pengetahuan 
		$cekpengetahuan 	= "SELECT count(nh_sms1) as sukses from tbl_transkrip_sms1 where ((nh_sms1 <> 0) AND (pts_sms1 <> 0) AND (pas_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id]))";

		$jml 				= $con->query($cekpengetahuan);
		$jmlpeng 			= $jml->fetch_assoc();
		$suksespengethuan 	= $jmlpeng['sukses'];

		
		//keterampilan
		$cekketerampilan 	= "SELECT count(nPraktik_sms1) as sukses FROM tbl_transkrip_sms1 WHERE ((nPraktik_sms1 <> 0) AND (nProduk_sms1 <> 0) AND (nProyek_sms1 <> 0) AND (mapel_id = $row[mapel_id]) AND (rombel_id = $row[rombel_id])) ";

		$jml 				= $con->query($cekketerampilan);
		$jmlket 			= $jml->fetch_assoc();
		$suksesketerampilan = $jmlket['sukses'];

		//echo $cekketerampilan;

		//persentsi pengetahuan
		$progresspengetahuan = ($suksespengethuan/$totalsiswa) * 100;
		$persenpengetahuan 	 = round($progresspengetahuan);
		//echo "$jmlpeng[sukses] - $jmlsiswa[jmlsiswa] $persenpengetahuan";

		$progressketerampilan = ($suksesketerampilan/$totalsiswa) * 100;
		$persenketerampilan   = round($progressketerampilan);
		//echo $persenketerampilan;

	default:
		# code...
	break;
}
?>