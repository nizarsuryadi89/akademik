<?php
	@$semester 	= $_GET[sms];
	@$mapelid 	= $_GET[kdmapel];
	@$rombel 	= $_GET[kdrombel];

	if ($semester == '1'){ 
		$query 		= "SELECT * FROM tbl_transkrip_sms1 a inner join tbl_mapel b 
						on a.mapel_id = b.mapel_id inner join tbl_guru c on a.guru_sms1 = c.guru_id 
							where a.mapel_id = $mapelid";
		$cek 		= $con->query($query);
		$hasilcek 	= $cek->fetch_assoc();
	}elseif ($semester == '2'){ 
		$query 		= "SELECT * FROM tbl_transkrip_sms2 a inner join tbl_mapel b 
						on a.mapel_id = b.mapel_id inner join tbl_guru c on a.guru_sms1 = c.guru_id 
						where a.mapel_id = '$mapelid'";
		//  echo "$query";
		$cek 		= $con->query($query);
		$hasilcek 	= $cek->fetch_assoc();
	}elseif ($semester == '3'){ 
		$query 		= "SELECT * FROM tbl_transkrip_sms3 a inner join tbl_mapel b 
						on a.mapel_id = b.mapel_id inner join tbl_guru c on a.guru_sms1 = c.guru_id
						where a.mapel_id = $mapelid";
		$cek 		= $con->query($query);
		$hasilcek 	= $cek->fetch_assoc();
	}elseif ($semester == '4'){ 
		$query 		= "SELECT * FROM tbl_transkrip_sms4 a inner join tbl_mapel b 
						on a.mapel_id = b.mapel_id inner join tbl_guru c on a.guru_sms1 = c.guru_id
						where a.mapel_id = $mapelid";
		$cek 		= $con->query($query);
		$hasilcek 	= $cek->fetch_assoc();
	}elseif ($semester == '5'){ 
		$query 		= "SELECT * FROM tbl_transkrip_sms5 a inner join tbl_mapel b 
						on a.mapel_id = b.mapel_id inner join tbl_guru c on a.guru_sms1 = c.guru_id
						where a.mapel_id = $mapelid";
		$cek 		= $con->query($query);
		$hasilcek 	= $cek->fetch_assoc();
	}elseif ($semester == '6'){ 
		$query 		= "SELECT * FROM tbl_transkrip_sms6 a inner join tbl_mapel b 
						on a.mapel_id = b.mapel_id inner join tbl_guru c on a.guru_sms1 = c.guru_id
						where a.mapel_id = $mapelid";
		$cek 		= $con->query($query);
		$hasilcek 	= $cek->fetch_assoc();
	}
	
	
?>


<div class="panel panel-default">
	<div class="panel-heading">
		<button onclick="history.back();" class="btn btn-default" >Kembali</button>
	</div>
	<div class="panel-body">
		<form action="action/simpan-kkm.php" method="POST">
		<table class="table table-bordered">
			<tr><td width="20%">Mata Pelajaran</td><td>
				<input class="form-control" type="text" name="namamapel" value="<?php echo $hasilcek['mapel_nama']; ?>">
				<input class="form-control" type="hidden" name="sms" value="<?php echo"$semester";?>">
			</td></tr>
			<tr>
				<td>Nama Guru</td>
				<td><input class="form-control" type="text" name="guruid" value="<?php echo $hasilcek['guru_id']?>" readonly>
					<input class="form-control" type="text" name="guru" value="<?php echo $hasilcek['guru_nama']?>"></td>
			</tr>
			<tr><td>KKM</td><td>
				
				<input class="form-control" type="hidden" name="rombel" value="<?php echo"$rombel";?>">
				<input class="form-control" type="hidden" name="mapelkd" value="<?php echo"$mapelid";?>">
				<input class="form-control" type="text" name="kkm" value="<?php echo $hasilcek['kkm_sms1']?>">
			</td></tr>
			<tr>
				<td colspan="2">
					<button name="simpan" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
				</td>
			</tr>
		</table>

	</div>
	<div class="panel-footer>">
	</div>
</div>