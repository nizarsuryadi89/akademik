<?php
	error_reporting(0);
	include 	"../../configakademik.php";
	include 	"../../assets/fungsi/fungsi_indotgl.php";

	$hari 		= date(d);
	$bulan 		= date(M);
	$tahun 		= date(Y);

	$tgl 		= "$hari $bulan $tahun";
	$kode		=$_GET['mapel-kd'];
	$rombel		=$_GET['rombel-kd'];

	$query		="select * from tbl_nilaipengetahuan a 
					inner join tbl_siswa b on a.siswa_id=b.siswa_id 
						inner join tbl_mapel c on a.mapel_id=c.mapel_id
							inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
								inner join tbl_guru e on d.guru_id=e.guru_id 
									
										where a.mapel_id=$kode and a.rombel_id=$rombel";

	$tampil		="select b.siswa_nis,
					b.siswa_nama,a.nh1,a.nilai_uts,a.nilai_uas,a.kehadiran,b.siswa_jk,a.nilai_id, c.rombel_semester
						from tbl_nilaipengetahuan a
							inner join tbl_siswa b on a.siswa_id=b.siswa_id 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id
									where a.mapel_id=$kode and a.rombel_id=$rombel order by siswa_nis asc";	
	$hasil      = $con->query($query);
	$aa 		= $hasil->fetch_assoc();

	$result 	= $con->query($tampil);
?>
<head>
	 <link rel="stylesheet" href="style_table.css">
</head>
<body>
<?php
	include "cover.php";
?>
<div class="row">
	<div class="col-lg-12">	
		<table class="laporan1" width="100%">
			<tr>
				<td colspan="2" align="center">
					<h3>Transkrip Nilai Per Mata Pelajaran</h3>
				</td>
			</tr>
			<tr>
				<td>Mata Pelajaran : <?php echo "$aa[mapel_nama]"; ?></td> 
				<td align="right">Nama Guru   : <?php echo "$aa[guru_nama]"; ?></td>
			</tr>
			<tr>
				<td>KKM : <?php echo "$aa[kkm]"; ?></td> 
				
			</tr>
		</table>
		<table width="100%" border="0" class="laporan">
			<thead>
				<tr>
					<th rowspan='2'>No</th>
					<th rowspan='2'>NIS</th>
					<th rowspan='2'>Nama Siswa</th>
					<th rowspan='2'>% Kehadiran</th>

					<th colspan='4'>Nilai</th>
					<th colspan='2'>Predikat</th>
					<th rowspan="2">Ket</th>
				</tr>	
				<tr>
					<th>Rerata<br>Harian</th>
					<th>PTS</th>
					<th>PAT</th>
					<th>Nilai Akhir</th>
					<th>Huruf</th>
					<th>Skala 4</th>
				</tr>
			</thead>
			<?php
				$no = 1;
				$warna1 	= "lightgrey";   // baris genap berwarna hijau tua
				$warna2 	= "white";   // baris ganjil berwarna hijau muda
				$warna  	= $warna1;     // warna default
				while($row= $result->fetch_array())
					{

						if(@$warna == @$warna1)
							{
								$warna = $warna2;
							}
							else 
							{
								$warna = $warna1;
							}

							$rs 		=$row['rombel_semester'];
							$harian		=$row['nh1'];
							$uts		=$row['nilai_uts'];
							$uas		=$row['nilai_uas'];
							$kkm		=$aa['kkm'];

							$na			=(($harian+$uts)+(2*$uas))/4;
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

							if ($raport >=$kkm)
							{$ket="<font color='blue'>T</font>";}else
							if ($raport <=$kkm)
							{$ket="<font color='red'>BT</font>";}
			echo"
						<tr bgcolor=$warna>";
			?>
							<td><?php echo"$no"; ?></td>
							<td><?php echo"$row[siswa_nis]"; ?></td>
							<td><?php echo"$row[siswa_nama]"; ?></td>
							<td align="right"><?php echo"$row[kehadiran]"; ?> %</td>
							<td align="right"><?php echo"$row[nh1]"; ?></td>
							<td align="right"><?php echo"$row[nilai_uts]"; ?></td>
							<td align="right"><?php echo"$row[nilai_uas]"; ?></td>
							<td align="right"><?php echo"$raport"; ?></td>
							<td align="right"><?php echo"$huruf"; ?></td>
							<td align="right"><?php echo"$k13"; ?></td>
							<td align="right"><?php echo"$ket"; ?></td>
						</tr>
			<?php
				$no++;
					}
			?>
			<tr>
				<th colspan='11'>&nbsp;</th>
			</tr>
			<tr>
				<td colspan="11">
					Nilai Akhir : (Nilai Harian + Nilai PTS) + (2 x Nilai PAT)

				</td>
			</tr>
		</table>
	</div>
</div>
<?php
	include "footer.php";
?>

