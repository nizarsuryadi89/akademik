<?php
	@$sms   = $_GET[sms];
	$nilai = $con->query("select * from tbl_nilaipengetahuan a inner join
							 tbl_siswa b on a.siswa_id=b.siswa_id inner join 
							 	tbl_rombel c on a.rombel_id=c.rombel_id inner join 
							 		tbl_mapel d on a.mapel_id=d.mapel_id
							 			where siswa_nis = '$username' and semester_id=1 and tahun_id=4 order by mapel_urut asc");
	@$jml    = mysqli_num_rows($nilai);


?>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class='glyphicon glyphicon-question-sign'></i> </button></a>
			<button type="submit" class="btn btn-primary" name="btnUpload" value='simpan'><i class="fa fa-print"></i></button>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table width="100%" class="table table-striped table-bordered table-hover">
					<tr>
						<th width="5%">No</th>
						<th width="30%">Mata Pelajaran</th>
						<th>KKM</th>
						<th>Guru Pengampu</th>
						<th>Moda Daring</th>
						
					</tr>
			<?php
				$no=1;
				while ($row=$nilai->fetch_array())
				{
					@$kkm = $con->query("select kkm, a.guru_id,b.guru_id, guru_nama from tbl_mapelrombel a 
											inner join tbl_guru b on a.guru_id=b.guru_id
												where mapel_id=$row[mapel_id] ");
					@$kk  = $kkm->fetch_assoc();
					@$kkk = $kk[kkm];


					
					echo "<tr>
							<td>$no</td>
							<td><b><a href=#>$row[mapel_nama]</a></b></td>
							<td>$kkk</td>
							<td><a href='#' data-target='#siswanama' data-toggle='modal'>$kk[guru_nama]</a></td>
							<td>
								<a class='btn btn-app' href='?page=Moda Daring&kode-mapel=$row[mapel_id]'>
					                <span class='badge md-teal'></span>
					                <i class='fa fa-inbox'></i>
					              </a>
							</td>

						";
					$no++;
				
				}
				

			?>
				
				</table>
			</div>
		</div>
	</div>
	</div>



