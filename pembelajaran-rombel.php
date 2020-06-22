<?php
	$kode	=	$_GET['kd-rombel'] ;
	$rombel = 	$con->query("SELECT * FROM tbl_mapelrombel a 
								inner join tbl_rombel b on a.rombel_id=b.rombel_id 
									left join tbl_guru c on a.guru_id=c.guru_id
										where a.rombel_id=$kode"); 
	$field	=	$rombel->fetch_assoc();
	//echo"$field[rombel_semester]";

	if(@$_GET['aksi'] == 'hapus') 
		{
			//$id		=	$_GET['id'];
			$mapelkode		=	$_GET['mapel-kd'] ;
			$rombelkode		=	$_GET['rombel-kd'];
			
			$hapus 	= 	$con->query("delete from tbl_mapelrombel where mapelrombel_id='$rombelkode' ");
			
			echo "<meta http-equiv='refresh' content='1;URL=?page=mapel-rombel&kd-rombel=$rombelkode'>";
		}	
	
?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
				    <a href="?page=data-rombel"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</button></a>
				    <div class ="heading" align="right">
				        <h4 class="panel-title">Rombel : <?php echo"$field[rombel_nama]"?></h4>
				    </div>
			    	
			    </div>
			    <div class="panel-body">
				    <div class="table-responsive">
				    	<table  class="table table-striped  table-hover" >
								<thead>
								<tr>
									<th width="5%">No</th>
									<th width="5%">Kode</th>
									<th width="25%">Mata Pelajaran</th>
									<th width="20%">Nama Guru</th>
									<th width="5%">JP</th>
									<th width="5%">Peserta<br>Rombel</th>
									<th >Progress </th>
									<th width="10%">Aksi</th>
									
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
								@$mapelid 	= $row[mapel_id];
								$hasil	=$con->query("select count(mapel_id) as jml 
													from tbl_nilaipengetahuan 
														where mapel_id=$row[mapel_id] and rombel_id=$kode");
								$aa		=$hasil->fetch_assoc();
								
							echo"
							 <tbody>
								<tr valign='midle'>
									<td align='center'>$no</td>
									<td>$row[mapel_kode]</td>
									<td>$row[mapel_nama] - ($row[kkm])</td>
									<td>
										<div>
						                	<img src='../assets/foto-guru/$row[guru_foto]'  class='img-rounded zoom' width='30' height='40'> - $row[guru_nama]
						                </div>
										</td>
									<td align='center'>$row[mapel_jam] - JP</td>
									<td align='center'><a href='?page=peserta-rombel&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]'>$aa[jml]</a></td>
									<td>";

								$jmlsiswa	= @$aa[jml];
								//kehadiran
								@$jmlkhd   = $con->query("select kehadiran from tbl_nilaipengetahuan 
															where mapel_id=$mapelid and rombel_id=$kode and kehadiran > 0 ");
								$jmla 		= mysqli_num_rows($jmlkhd);
								@$persena 	= ($jmla/$jmlsiswa)*100;
								@$persenna	= round($persena);

								//nilaiharian
								@$jmlnh1    = $con->query("select nh1 from tbl_nilaipengetahuan 
															where mapel_id=$mapelid and rombel_id=$kode and nh1 > 0 ");
								$jmlb 		= mysqli_num_rows($jmlnh1);
								@$persenb 	= ($jmlb/$jmlsiswa)*100;
								@$persennb	= round($persenb);

								//nilai uts
								@$jmluts    = $con->query("select nilai_uts from tbl_nilaipengetahuan 
															where mapel_id=$mapelid and rombel_id=$kode and nilai_uts > 0 ");
								$jmlc 		= mysqli_num_rows($jmluts);
								@$persenc 	= ($jmlc/$jmlsiswa)*100;
								@$persennc	= round($persenc);

								//nilai PAT
								@$jmlpat    = $con->query("select nilai_uas from tbl_nilaipengetahuan 
															where mapel_id=$mapelid and rombel_id=$kode and nilai_uas > 0 ");
								$jmld 		= mysqli_num_rows($jmlpat);
								@$persend 	= ($jmld/$jmlsiswa)*100;
								@$persennd	= round($persend);

								
								echo"
									Kehadiran : 
										<div class='progress'>
                                              <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $persenna% '>
                                                 $persenna %
                                                <span class='sr-only'>(primary)</span>
                                              </div>
                                         </div>
									 Nilai Harian : 
									 <div class='progress'>
                                              <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $persennb% '>
                                                 $persennb %
                                                <span class='sr-only'>(primary)</span>
                                              </div>
                                         </div>
                                     Nilai PTS :
                                      <div class='progress'>
                                              <div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $persennc% '>
                                                 $persennc %
                                                <span class='sr-only'>(primary)</span>
                                              </div>
                                         </div>
                                         
                                     Nilai PAT : 
                                     <div class='progress'>
                                              <div class='progress-bar progress-bar-warnig' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $persennd% '>
                                                 $persennd %
                                                <span class='sr-only'>(primary)</span>
                                              </div>
                                         </div>
									</td>
							";



							if (@$field[rombel_semester]!= 6)
							{
							echo"
									<td align='center'>
										
										<a href='?page=input-nilai-siswa&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]'><button class='btn btn-success'><i class='glyphicon glyphicon-book'></i></button></a> &nbsp;

										<a href='?page=input-nlai-us&aksi=hapus&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]'><button class='btn btn-danger'><i class='glyphicon glyphicon-trash' title='Nilai US'></i></button></a>		
											
									
									</td>
								
							";
							}
							else{
							echo"
								<td>
									<a href='?page=input-nlai-us&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]'><button class='btn btn-success'><i class='glyphicon glyphicon-list-alt' title='Nilai US'></i></button></a> &nbsp;


								</td>
							</tr>
							</tbody>";
							}
							
							$no++;
							}
							$hasil	= $con->query("select sum(mapel_jam) as aa 
													from tbl_mapel a inner join 
														tbl_mapelrombel b on a.mapel_id=b.mapel_id 
															where rombel_id=$kode "); 
							$rec	= $hasil->fetch_assoc();
							$jumlah	= $rec['aa'];
						
						?>
						</table>
						
					</div>
				</div>
				<div class="panel-footer">
					<?php 
					if (@$field[rombel_semester]!= 6)
					{
						 echo" Jumlah Jam : $jumlah - JP";

					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
