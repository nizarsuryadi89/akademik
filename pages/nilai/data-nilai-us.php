<?php
	error_reporting(0);

	$kode		=$_GET['mapel-kd'];
	$rombel		=$_GET['rombel-kd'];
	

	$query		="select * from tbl_nilaipengetahuan a 
					inner join tbl_siswa b on a.siswa_id=b.siswa_id 
						inner join tbl_mapel c on a.mapel_id=c.mapel_id
							inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
								inner join tbl_guru e on d.guru_id=e.guru_id
									where a.mapel_id=$kode and a.rombel_id=$rombel";
	
	$tampil		="select b.siswa_nis,b.siswa_nama,a.nh1,a.nilai_uts,a.nilai_uas,a.kehadiran,b.siswa_jk,a.nilai_id
					from tbl_nilaipengetahuan a
						inner join tbl_siswa b on a.siswa_id=b.siswa_id 
							where a.mapel_id=$kode and a.rombel_id=$rombel order by siswa_nis asc";	

						
	$result 	= $con->query($tampil); 
	$jumlah		= mysqli_num_rows($result);
	$no			=1;	
	
	//assoc
	$hasil	 	= $con->query($query); 
	$aa			= $hasil->fetch_assoc();

	if ($jumlah != 0)
	{
		
?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="">
                <button class="btn btn-default">Kembali</button>
            </a>
            <div align="right">
                <strong><?php echo"$aa[mapel_nama] - KKM: $aa[kkm] - $aa[guru_nama] "; ?></strong>
            </div>
        </div>   	
        <div class="panel-body">
            <div class="table-responsive">
            	<table width="100%" class="table table-striped table-bordered table-hover" >
            		<thead>
            			<tr>
            				<th>No</th>
            				<th>Nama Siswa</th>
            				<th colspan='2' >Absen</th>
            
            				<th>Harian (Bobot 30%)</th>
            				<th>US (Bobot  70%)</th>
            				<th>Nilai Akhir</th>
            				<th>Huruf</th>
            				<th>Keterangan</th>
            				<th>Kirim Ke Transkrip</th>
            			</tr>	
            		</thead>
            
            <?php											
            	$warna1 	= "lightgrey";   // baris genap berwarna hijau tua
            	$warna2 	= "white";   // baris ganjil berwarna hijau muda
            	$warna  	= $warna1;     // warna default
            		
            	while($row= $result->fetch_array())
            	{
            		$harian		=$row['nh1'];
            		$uts		=$row['nilai_uts'];
            		$uas		=$row['nilai_uas'];
            		$kkm		=$aa['kkm'];
            		
            		$na			=($harian * 0.3)+($uas * 0.7);
            		$raport		=round($na,1);
            		
            		//huruf
            		if (($raport>=90) and ($raport <=100))
            		{$huruf		="A";}else
            		if (($raport>=80.00) and ($raport<=89.99))
            		{$huruf		="B";}else
            		if (($raport>=70.00) and ($raport<=79.99))
            		{$huruf		="C";}else
            		if (($raport>=60.00) and ($raport<=69.99))
            		{$huruf		="D";}else
            		if (($raport<=59.99)and ($raport>=1))
            		{$huruf	="E";}else{$huruf="-";}
            		
            		//k13	
            		$k4		= (($raport*4)/100);	
            		$k13	= round($k4,1);
            		
            		//keterangan
            		if ($raport >=$kkm)
            		{$ket="<font color='blue'>Tuntas</font>";}else
            		if ($raport <=$kkm)
            		{$ket="<font color='red'>Belum</font>";}
            		
            		echo"
            		<form action='' method='POST'>
            		<tbody>
            			<tr class='odd gradeX'>
            				<td align='center'>$no</td>
            				<td align='left'>$row[siswa_nama] </td>
            					<input type='hidden' name='kode' value='$row[nilai_id]' size='5'>
            					";
            
            				if ($row[kehadiran] >= 75)
            				{echo"	
            				<td align='center' bgcolor='#00ffff'>
            					<div class='form-group'>
            						<input type='number' style=\"width: 70px;\" name='hadir' class='form-control'  value='$row[kehadiran]' size='2'  onkeypress='submitOnEnter(this, event);'> </td>
            					</div>
            				</td>
            				<td>%</td>";
            				}
            				else
            				{echo"
            				<td align='center' bgcolor='#ff0040'>
            					<div class='form-group'>
            						<input type='number' style=\"width: 70px;\"  class='form-control' name='hadir' value='$row[kehadiran]' size='2' onkeypress='submitOnEnter(this, event);'></td>
            					</div>
            				</td><td>%</td>";
            				}
            				if ($row[nh1] < $kkm )
            				{echo"	
            				<td align='center' bgcolor='#ff0040'>
            					<div class='form-group'>
            						<input type='number' name='nh1' style=\"width: 70px;\"   value='$row[nh1]' size='2' class='form-control' id='exampleInputPassword1' onkeypress='submitOnEnter(this, event);'>
            					</div>
            				</td>";
            				}
            				else
            				{echo"
            				<td align='center' bgcolor='#00ffff'>
            					<div class='form-group'>
            						<input type='number' name='nh1' style=\"width: 70px;\"  value='$row[nh1]' size='2' class='form-control' id='exampleInputPassword1' onkeypress='submitOnEnter(this, event);'>
            					</div>
            				</td>";
            				}
            				
            				if ($row[nilai_uas] < $kkm )
            				echo"
            				<td align='center' bgcolor='#ff0040'><div class='form-group'>
            						<input type='number' name='uas' style=\"width: 70px;\"  value='$row[nilai_uas]' size='2' class='form-control' id='exampleInputPassword1' onkeypress='submitOnEnter(this, event);'>
            					</div>
            				</td>";
            				else{echo"
            				<td align='center' bgcolor='#00ffff'><div class='form-group'>
            						<input type='number' name='uas' style=\"width: 70px;\"  value='$row[nilai_uas]' size='2' class='form-control' id='exampleInputPassword1' onkeypress='submitOnEnter(this, event);'>
            					</div>
            				</td>";
            				}echo"
            				<td align='center'>$raport</td>
            				<td align='center'>$huruf</td>
            			
            				<td align='center'><font color='green'>$ket <button name='save' value='save' hidden>Save</button>
            				</td>	
            				
            				
            		
            	</form>
            	
            	<form action='pages/nilai/gettranskrip.php' method='GET'>
            	    	<input type='hidden' value='$row[siswa_nis]' name='nis'>
            			<input type='hidden' value='$raport' name='nilai'>
            			<input type='hidden' value='$kode' name='mapel'>
                        <input type='hidden' value='$rombel' name='rombel'>
            			<td>
            				<button type='submit' class='btn btn-success' name='simpan' value='simpan'>simpan</button>
            			</td>
            	</form>
            		</tr>
            		</tbody>
        
        		";
        	$no++;
        	}
        	echo"</table>";?>
        </div>
    </div>
</div>
            	
       	
	
<?php
	if ($_POST['save']=='save')
	{
		$id		=	$_GET['kode'];
		$kodea	=	$_POST['kode'];
		$hadir	=	$_POST['hadir'];
		$nh1	=	$_POST['nh1'];
		$uts	=	$_POST['uts'];
		$uas	=	$_POST['uas'];
		
		if (($hadir <= 100) and ($nh1 <= 100) and ($uts <= 100) and ($uas <= 100))
		{
			$con->query("update tbl_nilaipengetahuan set 
							kehadiran	=$hadir,
							nh1			=$nh1, 
							
							nilai_uas	=$uas 
						where nilai_id	=$kodea	");
							
			echo "<meta http-equiv='refresh' content='1;URL=?page=input-nlai-us&mapel-kd=$kode&rombel-kd=$rombel'>";
		}
		else
		{
			echo "DATA YANG ANDA MASUKKAN SALAH";
			echo "<meta http-equiv='refresh' content='1;URL=?page=input-nlai-us&mapel-kd=$kode&rombel-kd=$rombel'>";
		}
	}
?>
		
			
	
	<?php }
	else {
		include "inputsiswa.php";
	}
	?>
</html>