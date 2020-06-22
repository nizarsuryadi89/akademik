<head>
	<style>
		table 
		{ 
			font-family: Arial;
			font-size :12;
		 }
	</style>
</head>

<?php
	$semester 	= @$_GET[semester];
	$kode	=	@$_GET['kd-rombel'] ;
	$rombel = 	$con->query("SELECT * FROM tbl_mapelrombel a 
								inner join tbl_rombel b on a.rombel_id=b.rombel_id 
									left join tbl_guru c on a.guru_id=c.guru_id
										where a.rombel_id=$kode"); 
	$field	=	$rombel->fetch_assoc();
	//echo"$field[rombel_semester]";

	$kur 	=   $con->query("select kur_id,rombel_id from tbl_rombel where rombel_id=$kode");
	$kk 	= 	$kur->fetch_assoc();

	@$kurikulum = $kk[kur_id];
	@$rombel 	= $kk[rombel_id];

	if(@$_GET['aksi'] == 'hapus') 
		{
			$mapelkode		=	$_GET['mapel-kd'] ;
			$rombelkode		=	$_GET['kd-rombel'];
			
			$hapus 	= 	$con->query("delete from tbl_mapelrombel where mapelrombel_id=$mapelkode ");
			//echo "delete from tbl_mapelrombel where mapelrombel_id=$mapelkode";
			
			echo "<meta http-equiv='refresh' content='1;URL=?page=pembelajaran-rombel&kd-rombel=$rombelkode'>";
		}	
	
?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <a href="?page=Kurikulum" class="btn btn-grey">
						<i class="ace-icon fa fa-arrow-left"></i>
					</a>

				    <?php echo"<a href='?page=Tambah Pelajaran&kur=$kurikulum&rombel=$rombel'><button class='btn btn-success'><i class='fa fa-plus'></i></button></a> ";?>
				  	<button class="btn btn-primary" disabled>Rombel Nama : <?php echo"$field[rombel_nama]"?></button>	    	
			    </div>
			    <div class="panel-body" align="right">
				    <div class="table-responsive">
				    	<table  class="table  table-borderred table-hover table-bordered" >
								<thead>
								<tr>
									<th width="5%">No Urut</th>
									<th width="5%">Kode</th>
									<th width="25%">Mata Pelajaran / KKM</th>
									<th width="20%">Nama Guru</th>
									<th width="5%">JP</th>
									<th width="20%">Aksi</th>	
								</tr>
								</thead>		
						<?php
							$query 	= "SELECT * FROM tbl_mapelrombel a 
													inner join tbl_mapel b on a.mapel_id=b.mapel_id 
														left join tbl_guru c on a.guru_id=c.guru_id
															inner join tbl_rombel d on a.rombel_id = d.rombel_id
															where d.rombel_id=$kode order by mapel_urut asc ";
							// echo "$query";
							$result = $con->query($query);

							$jml 	= mysqli_num_rows($result);
							$no 	=1;

							if ($jml != 0)
							{
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
										
										<td>$row[mapel_urut]</td>
										<td>$row[mapel_kode]</td>
										<td>$row[mapel_nama]</td>
										<td>";
										if (@$row[guru_id] != '')
											{echo"
											<div>
							                	<img src='assets/foto-guru/$row[guru_foto]'  class='img-rounded zoom' width='30' height='40'> - $row[guru_nama]
							                </div>";
							            	}
							            else
							            {
							            	echo"
											<div>
							                	<a href=''><button>Pilih Guru Mata Pelajaran</a>
							                </div>";
							            }echo"
										</td>
										<td align='center'>$row[mapel_jam] - JP</td>
										<td align='center'>	
											<a href='?page=input-siswa&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]&guru=$row[guru_id]&kkm=$row[kkm]&semester=$row[rombel_semester]'>
											<button class='btn btn-success' title='Tambah Peserta Pelajaran'><i class='glyphicon glyphicon-plus'></i></button></a> &nbsp;
											
											<a href='?page=edit-kkm&kdrombel=$row[rombel_id]&semester=$row[rombel_semester]&kdmapel=$row[mapel_id]&sms=$semester'><button class='btn btn-warning'><i class='glyphicon glyphicon-book'></i></button></a>
											&nbsp;
											<a href='?page=pembelajaran-rombel&aksi=hapus&mapel-kd=$row[mapelrombel_id]&kd-rombel=$row[rombel_id]'><button title='Hapus Pelajaran pada Rombel ini' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button></a> &nbsp;
											<a href='?page=list-siswa&mapel-kd=$row[mapel_id]&rombel-kd=$row[rombel_id]&guru=$row[guru_id]&kkm=$row[kkm]&semester=$row[rombel_semester]'><button title='List Siswa' class='btn btn-primary'><i class='glyphicon glyphicon-user'></i></button></a>

										</td>				
								</tr>
								</tbody>";							
								$no++;
								}
								$hasil	= $con->query("select sum(mapel_jam) as aa 
													from tbl_mapel a inner join 
														tbl_mapelrombel b on a.mapel_id=b.mapel_id 
															where rombel_id=$kode "); 
								$rec	= $hasil->fetch_assoc();
								$jumlah	= $rec['aa'];
								}
							else
							{
								echo "Data Masih Kosong";
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
