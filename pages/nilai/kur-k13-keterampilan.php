<?php
	@$semester 	=$_GET['semester'];
	$mapelkode = @$_GET[mapel-kode];
	$kodemapel = @$_GET[mapel-kd];

?>
<div class="panel-body">
	  <?php echo"$aa[mapel_nama] - KKM: $aa[kkm] - $aa[guru_nama] "; ?> <br><br>
		<div class="table-responsive">
			<table width="100%" class="table table-striped table-bordered table-hover" >
				<thead>
					<tr valign='middle'>
						<th rowspan='2'>No</th>
						<th rowspan='2'>Nama Siswa</th>
						<th colspan='3'>Rata Rata Nilai</th>
						<th rowspan="2">Nilai Raport</th>
						<th rowspan="2">Predikat</th>
						<th width="20%" rowspan="2">Deskripsi</th>
						
					</tr>	
					<tr>
						<th width="10%">Praktik</th>
						<th width="10%">Produk</th>
						<th width="10%">Proyek</th>
							
					</tr>
				</thead>

		<?php																	
			while($row= $result->fetch_array())
			{
				$rs 		=$row['rombel_semester'];
				@$nraport 	= $con->query("select greatest(nPraktik_sms1,nProduk_sms1,nProyek_sms1) as max from tbl_transkrip_sms1 where nilai_id=$row[nilai_id]");
				@$nr 		= $nraport->fetch_assoc();
				@$max 		= $nr[max];

				$deskrips  = $con->query("select deskripsi from tbl_deskripsi_keterampilan");
				
				@$nilaiakhir 	= (@$row[nPraktik_sms1] + @$row[nProduk_sms1] + @$row[nProyek_sms1])/3;

				//$nBulat 	  = ($nilaiakhir*4)/100;
				$nBulat 	  = round($nilaiakhir,1);

				if (($nilaiakhir >= 88) and ($nilaiakhir <= 100))
				{	
					@$predikat			="A";
					@$deskripsi 			="<b>Sangat Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
				}else
				if (($nilaiakhir >= 74) and ($nilaiakhir<= 87.99 ))
				{	@$predikat			="B";
					@$deskripsi 		="<b>Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
				}else
				if (($nilaiakhir >= 60) and ($nilaiakhir <= 73.99))
				{	@$predikat			="C";
					@$deskripsi  		= "<b>Kurang Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD";
				}else
				if (($nilaiakhir < 60) and ($nilaiakhir >= 1))
				{	@$predikat		="D";
					@$deskripsi 	= "<b>Tidak Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD"; 
				}
				elseif ($nilaiakhir == 0){
					@$predikat		="-";
					$deskripsi = "Nilai Belum Diisi";
				}

				$nPraktik 	= @$row[nPraktik_sms1];
				$nProyek 	= @$row[nProyek_sms1];
				$nProduk 	= @$row[nProduk_sms1];
				echo"
				<form action='aksi.php?modul=inputnilaiketerampilan' method='POST'>
				<tbody>
					<tr class='odd gradeX'>
						<td align='center'>$no</td>
						<td align='left'>$row[siswa_nama]  - $row[nilai_id] - $row[siswa_nis]
							<input type='hidden' value='$row[siswa_nis]' name='nis'>
							<input type='hidden' name='kode' value='$row[nilai_id]' size='5'>
							<input type='hidden' value='$row[rombel_semester]' name='rombel'>
							<input type='hidden' value='$row[mapel_id]' name='mapelkode'>
							<input type='hidden' value='$row[rombel_id]' name='rombelkode'>
							
						</td>
						<td align='center'>
							<input type='text' class='form-control' name='praktik' value='$nPraktik'>
						</td>
						<td align='center'>
							<input type='text' class='form-control' name='rata' value='$nProyek'>
						</td>
						<td align='center'>
							<input type='text' class='form-control' name='produk' value='$nProduk'>
						</td>	
								
						<td align='center'><b>$nBulat</b>
						<input type='hidden' class='form-control' name='nilaiakhir' value='$nilaiakhir'>
						</td>
						<td>$predikat</td>
						<td><font color='green'><p align='justify'> $deskripsi</p>
						<button name='save' value='save' hidden>Save</button>
						
						<input type='hidden' class='form-control' name='deskripsi' value='$deskripsi'>
						</td>
						
					</tr>

				</tbody>
			</form>

				";
			$no++;
			}

			echo"
			

			<form action='?page=simpankeraport' method='POST'>
					<tr>
						<td colspan='8' align='center'>
						<input type='hidden' name='mapel' value='$kode'>
						<input type='hidden' name='rombel' value='$rombel'>
						<input type='hidden' name='semester' value='$semester'>

						<button class='btn btn-primary' name='simpan' value='simpan'><i class='fa fa-save'></i> Simpan Ke Raport</button></td>
					</tr>
			</form>
			
			
			</table>";

			
				if (@$_POST['save']=='save')
				{

				
				}
				
		
		
	
					
				
			?>
				</table>
				</div>
			</div>

<div id="nilaiharian" class="modal fade" tabindex="1" role="dialog"></div>