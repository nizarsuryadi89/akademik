<?php
	$sms 		= @$_GET[semester];
	$rombel 	= @$_GET[rombelid];
	
	$qRombel 	= "SELECT rombel_nama FROM tbl_rombel where rombel_id = $rombel";
	//echo $qRombel;
	$nRombel 	= $con->query($qRombel);

	$nmrombel	= $nRombel->fetch_array();

?>
<div class="panel panel-success" >
	<div class="panel-heading">
		
	</div>
	
	
	<div class="panel-body">
		<h3>Cetak Raport Semseter <?= $sms ?> Kelas <?= $nmrombel['rombel_nama'] ?></h3>
		<br>
	<div class="table responsive">
		<table class="table table-striped table-hover table-bordered">	
			<thead>
			<tr>
				<th>No</th>
				<th>Nama Siswa</th>
				<th>Cetak Cover</th>
				<th>Cetak Raport</th>
				
				
				
			</tr>
			</thead>
	<?php 
		if($sms == 1)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms1 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");

		}
		elseif($sms == 2)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms2 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}
		elseif($sms == 3)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms3 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}
		elseif($sms == 4)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms4 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}
		elseif($sms == 5)
		{ 
			@$angrombel 	= $con->query("select * from tbl_transkrip_sms5 a inner join tbl_siswa b on a.siswa_nis = b.siswa_nis where rombel_id=$rombel group by a.siswa_nis");
		}
		elseif($sms == 6)
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
				<td align='center'><a href='?page=cetak-raport-cover&nis=$data[siswa_nis]' target='blank'><button class='btn btn-danger'><i class='fa fa-print'></i> Cetak Cover</button></a></td>
				
				<td class='text-center'>
					<a target ='blank' href='?page=cetak-raport-pat-sms2-k13&rombel=$data[rombel_id]&nissiswa=$data[siswa_nis]&semester=$sms'><button class='btn btn-success' title='Print Raport PAS'><i class='fa fa-print'></i> Cetak Raport </button></a>
					
					
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
