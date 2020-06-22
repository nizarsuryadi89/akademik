<?php	
	include 	"../../configakademik.php";
	$infosekolah 	= $con->query("select * from tbl_foto");
	$in 			= $infosekolah->fetch_assoc();
?>
<table class="laporan2" width="100%">
	<tr>
		<td align="center">
			Mengetahui Kepala <br><?php echo "$in[nama_sekolah]";?>
			<br><br><br><br>
			<strong><?php echo "$in[nama_kepsek]";?></strong>
		</td>

		<td align="center">
		   Tasikmalaya, <?php echo "$tgl";?> <br>
			Guru Pengampu
			<br><br><br><br>
			<strong><?php echo "$aa[guru_nama]"?></strong>
		</td>
	</tr>
	
</table>