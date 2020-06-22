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
	if ($semester == 4){
		$tampil		="select * from tbl_transkrip_sms4 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
	}elseif ($semester == 5) {
		@$tampil		="select * from tbl_transkrip_sms5 a inner join tbl_siswa b on a.siswa_nis=b.siswa_nis where rombel_id = $rombel group by a.siswa_nis";	
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
						<th rowspan='2'>Nama Lengkap</th>
						<th colspan='4'>Prakerin </th>
					</tr>
					<tr>
						<th width="20%">Tempat Prakerin</th>
						<th width="35%">Alamat Prakerin</th>
						<th width="10%">Lamanya (Hari)</th>
						<th width="5%">Aksi</th>
						
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
						<td><input type='text' name='tempat' value='$row[tempat_prakerin]'></td>
						<td>
							<input type='hidden' name='id' value='$row[nilai_id]'>

							<textarea class='form-control' name='alamat' cols='40'>$row[alamat_prakerin]</textarea>
						</td>
						<td>
							<input class='form-control' type='text' name='nilai' value='$row[nilai_prakerin]'>
						</td>
						<td>
							<button type='submit' name='save' value='save'>Simpan</button>
							</form>
						</td>
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
		$tempat 	= $_POST[tempat];
		$nilai 		= $_POST[nilai];
		$alamat 	= $_POST[alamat];

		if ($semester == 4)
		{
			$editnilai 	= $con->query("update tbl_transkrip_sms4 set tempat_prakerin = '$tempat',nilai_prakerin = '$nilai', alamat_prakerin = '$alamat' where nilai_id = $id ");
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=nilai-prakerin&semester=$semester&rombelid=$rombel'>";
		
		}
		elseif ($semester == 5)
		{
			$editnilai 	= $con->query("update tbl_transkrip_sms5 set tempat_prakerin = '$tempat',nilai_prakerin = '$nilai', alamat_prakerin = '$alamat' where nilai_id = $id ");
			echo "<meta http-equiv='refresh' content='0.2;URL=?page=nilai-prakerin&semester=$semester&rombelid=$rombel'>";
		
		}	
			//echo "$_POST[id] - $_POST[tempat] - $_POST[nilai]";
	}
?>