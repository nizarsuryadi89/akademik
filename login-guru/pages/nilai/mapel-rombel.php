<?php
	$kode 		= $wk['rombel_id'];	
	$q_rombel 	= "SELECT * FROM tbl_mapelrombel a 
								inner join tbl_rombel b on a.rombel_id=b.rombel_id 
									left join tbl_guru c on a.guru_id=c.guru_id
										where a.rombel_id=$kode";
	// echo "$q_rombel";

	$rombel = 	$con->query($q_rombel); 
	$field	=	$rombel->fetch_assoc();

	$hasil	= $con->query("select sum(mapel_jam) as aa 
							from tbl_mapel a inner join 
								tbl_mapelrombel b on a.mapel_id=b.mapel_id 
									where rombel_id=$kode "); 
	$rec	= $hasil->fetch_assoc();
	$jumlah	= $rec['aa'];
	
	


	

	
	
?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="javascript:history.back()" class="btn btn-grey">
						<i class="ace-icon fa fa-arrow-left"></i>
						Go Back
					</a>

				    <a href="?page=Dashboard" class="btn btn-warning">
							<i class="fa fa-tachometer"></i>
							Dashboard
						</a>
					<button class="btn btn-success">Rombel : <?php echo"$field[rombel_nama]"?></button>
					<?php 
					if (@$field[rombel_semester]!= 6)
					{
					?>
						 <button class="btn btn-primary" disabled>Jumlah Jam : <?php echo $jumlah ?> - JP </button>
					<?php
					}
					?>
			    </div>
			    <div class="panel-body">
			    	<div class="table-responsive">
				    	<table  class="table table-responsive table-bordered" id="dynamic-table">
								<thead>
								<tr>
									<th width="5%">No</th>
									<th width="5%">Kode</th>
									<th width="20%">Mata Pelajaran</th>
									<th width="20%">Nama Guru</th>
									<th width="20%">Progress </th>
									
								</tr>
								</thead>
									
						<?php	
							$result = $con->query("SELECT * FROM tbl_mapelrombel a 
													inner join tbl_mapel b on a.mapel_id=b.mapel_id 
														left join tbl_guru c on a.guru_id=c.guru_id
															where rombel_id=$kode order by mapel_urut asc ");

							$no 	=1;
							while($row= $result->fetch_array())
							{
								$sms = $field['rombel_semester'];
								//progress bar
								include"progressbar.php";
								
								
								
							echo"
							
							 <tbody>
								<tr valign='midle'>
									<td align='center'>$no</td>
									<td><b>$row[mapel_kode]</b></td>
									<td>
										<b>$row[mapel_nama] </b><br><br>
									";
									echo"
										<a href='?page=input-nilai-pengetahuan&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]&kur_id=$row[kur_id]&semester=$sms&guru=$row[guru_id]' class='btn btn-success btn-xs btn-block'><i class='fa fa-book'></i>  NP </a> ";
										
										if (@$field[kur_id] == '2')
										{
											echo "
										<a href='?page=input-nilai-keterampilan&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]&kur_id=$row[kur_id]&semester=$sms' class='btn btn-primary btn-xs btn-block'><i class='fa fa-gears'></i>  NPK</a>";

											if ((@$row[mapel_id] == 1) or (@$row[mapel_id] == 2))
											{
												echo "

										<a href='?page=input-nilai-sikap&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]&semester=$sms'><button class='btn btn-warning btn-xs btn-block'><i class='fa fa-user'></i> &nbsp; Sikap</button></a>";
											}
										}
										
									echo"	
									</td>
									<td>
										
										<div>
						                	<img src='../assets/foto-guru/$row[guru_foto]'  class='img-rounded zoom' width='30' height='40'>
						                	
						                <p>$row[guru_nama] </p>
						                </div>
									</td>
									<td>";
									?>
										<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?= $persenpengetahuan ?>"
											  aria-valuemin="0" aria-valuemax="100" style="width:<?= $persenpengetahuan?>%">
											    NP : <?= $suksespengethuan ?> Dari <?= $totalsiswa ?> Siswa
											  </div>
											</div>

											<div class="progress">
											  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?= $persenketerampilan ?>"
											  aria-valuemin="0" aria-valuemax="100" style="width:<?= $persenketerampilan?>%">
											   	NK : <?= $suksesketerampilan ?> Dari <?= $totalsiswa ?> Siswa
											  </div>
											</div>
											<?php 
												if ((@$row[mapel_id] == 1) or (@$row[mapel_id] == 2))
											{
											?>
											<!-- <div class="progress">
											  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
											  aria-valuemin="0" aria-valuemax="100" style="width:60%">
											    60% Nilai Sikap
											  </div>
											</div> -->
											<?php
											}
											?>
									</td>
									<?php

									
									
										
									// include "progress-input.php ";
									
									echo"

							</tr>
							</tbody>";
							
							
							$no++;
							}
							
						
						?>
						</table>
					
						
					</div>
				</div>
				<div class="panel-footer">
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	if (@$_POST['save']=='save')
		{
			@$jml 			= $_POST[jml_kd];
			@$kodee = $_POST[mapelrombel_id];
			

			$update = $con->query("update tbl_mapelrombel set jml_kd = $jml where mapelrombel_id = $kodee");
			//echo"update tbl_mapelrombel set jml_kd = $jml where mapelrombel_id = $kodee";

			//echo "<meta http-equiv='refresh' content='1;URL=?page=mapel-rombel&kd-rombel=$rombelkode'>";
		}

	
?>
