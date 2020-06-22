<?php
	$semester = @$_GET[semester];
	$rombel   = @$_GET[rombelid];

//	ECHO"$semester - $rombel - $_SESSION[semester]";
?>
<div class="panel panel-success" >

	<div class="panel-body">
	<?php 
		$q_rombel 	= $con->query("select * from tbl_rombel where tahun_id = $tahun and semester_id='$_SESSION[semester]' ");

		while ($r_rom = $q_rombel->fetch_array())
		{
			echo "<a href='?page=Cetak%20Raport&rombelid=$r_rom[rombel_id]&semester=$r_rom[rombel_semester]'><button class='btn btn-sm  btn-primary'>$r_rom[rombel_nama]</button></a> &nbsp;";
		}		
	?>	
	</div>
	<div class="panel-body">
	<div class="table responsive">
		<table class="table table-striped table-hover table-bordered">	
			<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Nama Siswa</th>
				<th colspan="4">Cetak</th>
				
			</tr>
			<tr>
				<th>Cover</th>
				<th>Nilai Semester Ganjil</th>
				<th>Nilai Semester Genap</th>
			</tr>
			</thead>
	<?php 
		if($semester == 1)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms1 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");

		}
		elseif($semester == 2)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms2 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");

		}
		elseif($semester == 3)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms3 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}
		elseif($semester == 4)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms4 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}
		elseif($semester == 5)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms5 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}
		elseif($semester == 6)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms6 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}

		$no=1;
		while ($data=@$angrombel->fetch_array())
		{
			echo "
			<tr>
				<td>$no</td>
				<td>$data[siswa_nama]</td>
				<td align='center'><a href='?page=cetak-raport-cover&nis=$data[siswa_nis]' target='blank'><button class='btn btn-danger'><i class='fa fa-print'></button></a></td>
				<td align='center'>
					<a target ='blank' href='?page=cetak-raport-pas-sms1-k13&rombel=$data[rombel_id]&nissiswa=$data[siswa_nis]&semester=$semester'><button class='btn btn-success' title='Print Raport PAS'><i class='fa fa-print'></i></button></a>
				</td>
				<td>
					<a target ='blank' href='?page=cetak-raport-pas-sms2-k13&rombel=$data[rombel_id]&nissiswa=$data[siswa_nis]&semester=$semester'><button class='btn btn-warning' title='Print Raport PAT'><i class='fa fa-print'></i></button></a>
				</td>
				
			</tr>

			";
			$no++;
		}
	?>
			<tr>
			</tr>
		</table>
	</div>


</div>
