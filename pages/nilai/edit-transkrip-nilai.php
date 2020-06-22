<?php
	//error_reporting(0);
	$kode 		= $_GET['nissiswa'];
	$datasiswa 	= $con->query("select * from tbl_siswa a left join 
								tbl_transkrip b on a.siswa_nis=b.siswa_nis 
								 		where a.siswa_nis = $kode");
	$dtsiswa 	= $datasiswa->fetch_assoc();
	@$nis 		= $dtsiswa[siswa_nis];

	if (@$_GET[aksi]=='lulus')
	{
		$lulus = $con->query("update tbl_nilai_un set status = '1' where siswa_nis = $nis ");
		echo"<meta http-equiv='refresh' content='0.2;?page=edit-transkrip-nilai&nis-siswa=$nis '>";
	}
	elseif (@$_GET[aksi]=='tidaklulus')
	{	
		$lulus = $con->query("update tbl_nilai_un set status = '0' where siswa_nis = $nis ");
		echo"<meta http-equiv='refresh' content='0.2;?page=edit-transkrip-nilai&nis-siswa=$nis '>";
	}

	if (@$_GET[hapus] == 'Ya')
	{
		$kode 	= $_GET[kode];
		$nis 	= $_GET[nissiswa];
		$delete = $con->query("delete from tbl_transkrip where nilai_id = $kode ");
		echo"<meta http-equiv='refresh' content='0.2;?page=edit-transkrip-nilai&nissiswa=$nis '>";
	}

	
?>
<div class="row">
	<div class="col-lg-12">
		<div class ="panel panel-default">
			<div class="panel-heading">
				

				<a href="?page=Transkrip%20Nilai" class="btn btn-grey">
					<i class="ace-icon fa fa-arrow-left"></i>
					Go Back
				</a>


				<a href='?page=Print-Transkrip-Nilai&nissiswa=<?php echo "$nis";?>'><button class="btn btn-primary">Cetak <i class="fa fa-print"></i></button></a>

<?php
	$kelulusan  = $con->query("select * from tbl_nilai_un a inner join tbl_program b on a.program_id=b.program_id where siswa_nis=$nis");
	if(mysqli_num_rows($kelulusan) > 0)
		{
			$l 			= $kelulusan->fetch_assoc();
			@$stt 		= $l[status];
		
				if (@$stt != '1')
				{
			?>
						<a href="?page=edit-transkrip-nilai&nis-siswa=<?php echo "$nis&aksi=lulus&nis=$nis";?>"><button type="button" class="btn btn-danger btn-sm" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-ok"></i> Belum Lulus</button></a>

						<a href="?page=cetak-nilai-un&nis=<?php echo "$nis&aksi=lulus&nis=$nis";?>"><button type="button" class="btn btn-default btn-sm" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-print"></i> Cek Nilai UN</button></a>
			<?php 
				}else{
			?>
						<a href="?page=edit-transkrip-nilai&nis-siswa=<?php echo "$nis&aksi=tidaklulus&nis=$nis";?>"><button type="button" class="btn btn-success btn-sm" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-ok"></i> LULUS</button></a>
			            <a href="?page=cetak-nilai-un&nis=<?php echo "$nis&aksi=lulus&nis=$nis";?>"><button type="button" class="btn btn-default btn-sm" style="margin-top:10px; margin-bottom:4px"><i class="glyphicon glyphicon-print"></i> Cek Nilai UN</button></a>
			<?php
				}
		}
	$q_jurusan 	= $con->query("select * from tbl_siswa a inner join tbl_pesertarombel b on a.siswa_id=b.siswa_id inner join tbl_rombel c on b.rombel_id=c.rombel_id 
		inner join tbl_program d on c.program_id=d.program_id where siswa_nis =$kode");
	$jur 		= $q_jurusan->fetch_assoc();
?>


			</div>
		<div class="panel-body">
            <dl>
                <dt>Nis : <?php echo"$dtsiswa[siswa_nis]"?></dt>
                <dt>NISN : <?php echo"$dtsiswa[siswa_nisn]";?></dt>
                <dt>Nama Lengkap : <?php echo"$dtsiswa[siswa_nama]";?></dt>
                <dt>Tempat/Tanggal Lahir : <?php echo"$dtsiswa[siswa_tempatlahir] / " .tgl_indo($dtsiswa['siswa_tanggallahir'])." ";?></dt>
                <dt>Kompetensi Keahlian : <?php  echo"$jur[program_alias]";?></dt>               
            </dl>
        
	
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th rowspan="2">No</th>
						<th rowspan="2">Kode Mata Diklat</th>
						<th rowspan="2">Mata Diklat</th>
						<th colspan="5">Nilai Semester</th>
						<th rowspan="2">US/USBN</th>
						<th rowspan="2">Aksi</th>
					</tr>
				
					<tr>
						<th>1</th>
						<th>2</th>
						<th>3</th>
						<th>4</th>
						<th>5</th>
						
					</tr>

				</thead>
				<tbody>
				<?php
					$no=1;
					$nilaisiswa = $con->query("select * from tbl_siswa a left join 
									tbl_transkrip b on a.siswa_nis=b.siswa_nis inner 
									 		join tbl_mapel d on b.mapel_id=d.mapel_id 
								 				where a.siswa_nis = $kode order by d.mapel_urut asc ");
					while ($nilai=$nilaisiswa->fetch_array())
					{
						$ket = "Lulus";
						$rata = (@$nilai[sms_1]+@$nilai[sms_2]+@$nilai[sms_3]+@$nilai[sms_4]+@$nilai[sms_5]+@$nilai[us])/6;
						$rt   = round($rata);
				?>
					<form action="" method="POST">
					<tr>
						<td><?php echo"$no"; ?></td>
						<td><?php echo"$nilai[mapel_kode]"; ?></td>
						<td><?php echo"$nilai[mapel_nama]"; ?> <input type='hidden' name='id' value="<?php echo"$nilai[nilai_id]"; ?>"></td>
						<td>
							<?php 
								if (@$nilai[sms_1] <= 73)
								{
							?>
									<input class="form-control" name='sms1' type="text" size="5" value="<?php echo"$nilai[sms_1]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php
								}
								else
								{
									echo"$nilai[sms_1]";
								?>
									<input class="form-control" name='sms1' type="hidden" size="5" value="<?php echo"$nilai[sms_1]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php	
								}
							?>
						</td>
						<td>
							<?php 
								if (@$nilai[sms_2] <= 73)
								{
							?>
									<input class="form-control" name='sms2' type="text" size="5" value="<?php echo"$nilai[sms_2]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php
								}
								else
								{
									echo"$nilai[sms_2]";
								?>
									<input class="form-control" name='sms2' type="hidden" size="5" value="<?php echo"$nilai[sms_2]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php	
								}
							?>
						</td>
						<td>
							<?php 
								if (@$nilai[sms_3] <= 73)
								{
							?>
									<input class="form-control" name='sms3' type="text" size="5" value="<?php echo"$nilai[sms_3]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php
								}
								else
								{
									echo"$nilai[sms_3]";
								?>
									<input class="form-control" name='sms3' type="hidden" size="5" value="<?php echo"$nilai[sms_3]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php	
								}
							?>
						</td>
						<td>
							<?php 
								if (@$nilai[sms_4] <= 73)
								{
							?>
									<input class="form-control" name='sms4' type="text" size="5" value="<?php echo"$nilai[sms_4]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php
								}
								else
								{
									echo"$nilai[sms_4]";
								?>
									<input class="form-control" name='sms4' type="hidden" size="5" value="<?php echo"$nilai[sms_4]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php	
								}
							?>
						</td>
						<td>
							<?php 
								if (@$nilai[sms_5] <= 73)
								{
							?>
									<input class="form-control" name='sms5' type="text" size="5" value="<?php echo"$nilai[sms_5]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php
								}
								else
								{
									echo"$nilai[sms_5]";
								?>
									<input class="form-control" name='sms5' type="hidden" size="5" value="<?php echo"$nilai[sms_5]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php	
								}
							?>
						</td>
						<td>
							<?php 
								if (@$nilai[us] <= 73)
								{
							?>
									<input class="form-control" name='us' type="text" size="5" value="<?php echo"$nilai[us]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php
								}
								else
								{
									echo"$nilai[us]";
								?>
									<input class="form-control" name='us' type="hidden" size="5" value="<?php echo"$nilai[us]"; ?>" onkeypress='submitOnEnter(this, event);'>
							<?php	
								}
							?>
						</td>
						
						<td align="center"><a href='?page=edit-transkrip-nilai&nissiswa=<?php echo"$kode&hapus=Ya&kode=$nilai[nilai_id]'><i class='fa fa-trash'></i></a> "; ?></td>
						
							
							<input type="submit" name='simpan' value='simpan' hidden>
						
					</tr>
					</form>
				<?php	
					$no++;
					}
					if (@$_POST['simpan']=='simpan')
					{
						$sms1 	= $_POST[sms1];
						$sms2 	= $_POST[sms2];
						$sms3 	= $_POST[sms3];
						$sms4 	= $_POST[sms4];
						$sms5 	= $_POST[sms5];
						$us 	= $_POST[us];
						$un 	= $_POST[un];
						$id 	= $_POST[id];

						$update=$con->query("update tbl_transkrip set 	sms_1 	= $sms1,
																		sms_2	= $sms2,
																		sms_3	= $sms3,
																		sms_4	= $sms4,
																		sms_5	= $sms5,
																		us 		= $us
																		
											where nilai_id = $id
											"); 

					    
											
						echo"<meta http-equiv='refresh' content='0.2;?page=edit-transkrip-nilai&nissiswa=$nis '>";
					}
				?>
				</tbody>
			</table>
						
		</div>
</div>
</div>