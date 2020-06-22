<?php
	$kode	=	$_GET['kd-rombel'] ;
	$rombel = 	$con->query("SELECT * FROM tbl_mapelrombel a 
								inner join tbl_rombel b on a.rombel_id=b.rombel_id 
									left join tbl_guru c on a.guru_id=c.guru_id
										where a.rombel_id=$kode"); 
	$field	=	$rombel->fetch_assoc();
	//echo"$field[rombel_semester]";
	
?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
			    	<h4 class="panel-title">Rombel : <?php echo"$field[rombel_nama]"?></h4>
			    </div>
			    <div class="panel-body">
				    <div class="table-responsive">
				    	<table  class="table table-striped  table-hover" >
								<thead>
								<tr bgcolor="#c0c0c0">
									<th >No</th>
									<th >Kode</th>
									<th >Mata Pelajaran</th>
									<th >Nama Guru</th>
									<th >Jam<br>Pelajaran</th>
									<th >Peserta<br>Rombel</th>
									<th >Action</th>
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
									<td align='center'><a href='?page=peserta-rombel&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]'>$aa[jml]</a></td>";


							if (@$field[rombel_semester]!= 6)
							{
							echo"
									<td align='center'>
										
										<a href='?page=input-nilai-siswa&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]'> <span class='glyphicon glyphicon-book'></span></a> &nbsp;	
											
									
									</td>
								
							";
							}
							else{
							echo"
								<td>
								<a href='?page=input-nlai-us&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]'> <span class='glyphicon glyphicon-list-alt' title='Nilai US'></span></a> &nbsp;	
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
