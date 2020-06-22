<?php
	//error_reporting(0);
	@$semester 	=$_GET['semester'];
	//@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombelid'];
	@$kur 		=$_GET['kur-id'];
	@$mapelkd 	=$_GET['mapelrombel'];
	@$guru 		=$_GET['guru'];
	//echo"$rombel";

//	echo"$guru";	
	if ($semester == 1){
		$tampil		="select * from tbl_transkrip_sms1 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
	}elseif ($semester == 2) {
		$tampil		="select * from tbl_transkrip_sms2 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
	}elseif ($semester == 3) {
		$tampil		="select * from tbl_transkrip_sms3 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
	}elseif ($semester == 4) {
		$tampil		="select * from tbl_transkrip_sms4 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
	}elseif ($semester == 5) {
		$tampil		="select * from tbl_transkrip_sms5 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
	}elseif ($semester == 6) {
		$tampil		="select * from tbl_transkrip_sms6 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
	}


	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
		
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<a href='?page=Kurikulum'><button class='btn btn-warning'>Kembali</button></a>
			</div>
			<div class="panel-body">
				<table class="table table-striping table-bordered">
					<thead>
					<tr>
						<th rowspan='2' width="5%">No</th>
						<th rowspan='2' width="10%">NIS</th>
						<th rowspan='2' width="20%">Nama Lengkap</th>
						<th colspan='3'>jumlah Ketidakhadiran </th>
						<th rowspan="2" width="5%">aksi</th>
					</tr>
					<tr>
						<th width="5%">Sakit</th>
						<th width="5%">Izin</th>
						<th width="5%">Tanpa Keterangan</th>
						
					</tr>
				</thead>
			<?php 
					$no=1;
					while($row= $result->fetch_array())
				{
					echo"<tr>
						<td>$no</td>
						<td>$row[siswa_nis]</td>
						<td>$row[siswa_nama]</td>
						<form action='' method='POST'>
						<input type='hidden' name='id' value='$row[nilai_id]'>
						<td> <input type='number' name='sakit' value='$row[sakit]'></td>
						<td><input type='number' name='izin' value='$row[izin]'></td>
						<td><input type='number' name='alfa' value='$row[alfa]'></td>
						<td><button type='submit' name='save' value='save'>Simpan</button></td>
						</form>
							
						
						
					</tr>";
					$no++;
				}
			?>

				</table>
			</div>
			
		</div>
	</div>
</div>
<?php

if (@$_POST[save] == 'save')
	{
		$id 		= $_POST[id];
		$sakit 		= $_POST[sakit];
		$izin 		= $_POST[izin];
		$alfa 		= $_POST[alfa];
		$idnilai 	= $_POST[id];

		if ($semester == '1'){
			$update = $con->query("update tbl_transkrip_sms1 set sakit = '$sakit', izin='$izin', alfa='$alfa' where nilai_id = $idnilai");
		}elseif ($semester == '2') {
			$update = $con->query("update tbl_transkrip_sms2 set sakit = '$sakit', izin='$izin', alfa='$alfa' where nilai_id = $idnilai");
		}elseif ($semester == '3') {
			$update = $con->query("update tbl_transkrip_sms3 set sakit = '$sakit', izin='$izin', alfa='$alfa' where nilai_id = $idnilai");
		}elseif ($semester == '4') {
			$update = $con->query("update tbl_transkrip_sms4 set sakit = '$sakit', izin='$izin', alfa='$alfa' where nilai_id = $idnilai");
		}elseif ($semester == '5') {
			$update = $con->query("update tbl_transkrip_sms5 set sakit = '$sakit', izin='$izin', alfa='$alfa' where nilai_id = $idnilai");
		}elseif ($semester == '6') {
			$update = $con->query("update tbl_transkrip_sms6 set sakit = '$sakit', izin='$izin', alfa='$alfa' where nilai_id = $idnilai");
		}
		echo "<meta http-equiv='refresh' content='0.2;URL=?page=nilai-kehadiran&semester=$semester&rombelid=$rombel'>";

	}
?>