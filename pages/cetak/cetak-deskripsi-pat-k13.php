<head>
	<style>
		{
			position: absolute;
			top: 60px
			-moz-transform:rotate(-90deg);
			-webkit-transform:rotate(-90deg);
			-o-transform:rotate(-90deg);
			-ms-transform:(-90deg);
			font-size: 10px; 

		}
	</style>
</head>
<?php
	@$kode 		= $_GET['nissiswa'];
	@$rombel    = $_GET['rombel'];
	//@$datasiswa = $con->query("select * from tbl_transkrip where rombel_id=$rombel");
	//$dtsiswa 	= $datasiswa->fetch_assoc();
	//@$nis 		= $dtsiswa[siswa_nis];
	include 	"fungsi_terbilang.php";
?>
	
<BODY bgcolor='white'>
<!--<body onload="window.print()"> --> 
	<?php
		$semua = $con->query("select * from tbl_transkrip where rombel_id=$rombel group by siswa_nis");
		
			$walikelas 	= $con->query("select * from tbl_rombel a inner join tbl_guru b 
										on a.rombel_wali = b.guru_id where rombel_id=$rombel");
			$wl 		= $walikelas->fetch_assoc();
	?>
	<?php
	$datasiswa 	= $con->query("select * from tbl_transkrip a inner join tbl_siswa b 
								on a.siswa_nis=b.siswa_nis inner join tbl_rombel c 
									on a.rombel_id = c.rombel_id where  b.siswa_nis = '$kode' ");
	$dt 		= $datasiswa->fetch_assoc();

?>

<table width="100%" align="center" border='0'>
	<tr>
		<td align="center" width="20%">
			<img src="assets/images/jabar.png" width="90" height="140">
		</td>
		<td align="center">
			<h4>Lembaga Pendidikan Ma'Arif NU <br>
			Sekolah Menengah Kejuruan Nahdlatul Ulama SMK NU<br>
			SK Dinas Pendidikan No. 421.5/1628/Dikmen
			</h4>
			Jalan Argasari No. 31 Telp (0265) 313275 <br>
			email : smknu_kotatasik@yahoo.co.id<br>
			Tasikmalaya 46122
			
		</td>
		<td align="center" width="20%">
			<img src="assets/images/smk.png" width="120" height="120">
		</td>
	</tr>
	<tr>
		<td colspan="3"><hr></td>
	</tr>
	<tr>
		<td colspan="3" align="center"><h4><u>DESKRIPSI NILAI</u></h4>
			PENILAIAN AKHIR SEMESTER <br> TAHUN AJARAN 2017-2018 <br>

		</td>
	</tr>
</table>
	
<table width="100%" border='0'>
	<tr>
		<td width="75%"><P>	Nama Siswa : <?PHP echo"$dt[siswa_nama]";?></P></td>
		<td><P>	Kelas	: <?PHP echo"$dt[rombel_nama]";?></P></P></td>
	</tr>
	<tr>
		<td width="75%" align=""><P>		NIS/NISN   : <?PHP echo"$dt[siswa_nis]";?>  / <?PHP echo"$dt[siswa_nisn]";?></P></td>
		<td width="75%"><P>	Semester        : 1";?> - GENAP /<?PHP echo"2017-2018";?></P></td>

	</tr>
</table>
<?php
	//include "nilai-PAT.php";
?>
	<br>
<?php 
	//include "";
?>	
<?php
	include "raport-deskripsi.php";
?>
				
				