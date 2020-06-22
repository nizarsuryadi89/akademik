<?php
include "../../config/config.php";
$datasiswa = $con->query("select * from tbl_guru a inner join
                               tbl_tahun b on a.tmt=b.tahun_id inner join 
                                tbl_pendidikan c on a.guru_pendidikan =c.pendidikan_id ");


?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table width="100%" align="center">
					<tr>
						<td align="center">
							<img src="../../assets/images/jabar.png" width="90" height="140">
						</td>
						<td align="center">
							<h4>Lembaga Pendidikan Ma'Arif NU <br>
							Sekolah Menengah Kejuruan Nahdlatul Ulama SMK NU<br>
							SK Dinas Pendidikan No. 421.5/1628/Dikmen
							</h4>
							Jalan Argasari No. 31 Telp (0265) 313275 <br>
							email : smknu_kotatasik@yahoo.co.id web: smknutasikmalaya.sch.id<br>
							Tasikmalaya 46122
							
						</td>
						<td align="center">
							<img src="../../assets/images/smk.png" width="120" height="120">
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<hr>
	<div class="container">	
			 <div class="panel panel-default">
    		 <div class="panel-heading" align="center">
				<h2 class="panel-title">Pembagian Pelajaran Semester <?php echo"$ad[semester_nama]";?> <br>Tahun Ajaran <?php echo"$as[tahun_ajaran]";?></h2>    		 
    		 </div>
     
      <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered" id="example2">
          <thead>
              <tr>
					<th>No</th>
                  	<th width='30%'>Nama Guru</th>
                  	<th width='50%'>Pelajaran</th>
                  	<th>Jumlah Jam - Per Minggu</th>
                  
              </tr>
          </thead>
          <tbody>
          <?php 
          	$no = 1;
          	while ($aa=$datasiswa->fetch_array())
          	{
                $pelajaran = $con->query("select * from tbl_mapelrombel a inner join 
                                    tbl_mapel b on a. mapel_id=b.mapel_id inner join 
                                      tbl_rombel c on a.rombel_id=c.rombel_id
                                        where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $aa[guru_id] 
                                          group by a.mapel_id order by c.kelas_id desc ");
                

                @$jml = $con->query("select sum(mapel_jam) as jmll from tbl_mapelrombel a inner join 
                                    tbl_mapel b on a. mapel_id=b.mapel_id inner join 
                                      tbl_rombel c on a.rombel_id=c.rombel_id
                                        where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $aa[guru_id] 
                                          order by c.kelas_id desc");
                @$jm   = $jml->fetch_assoc();
                @$jumlah = $jm[jmll];
               
              	echo"
      	        <tr class='odd gradeX'>
      	        		<td>$no</td>
      	            <td>
                     
                            $aa[guru_nama]
                    
                    </td>
                    <td>
                    <ol type='1'>
                    ";
                   
                    while ($pel= $pelajaran->fetch_array())
                    {
                      echo "<li>$pel[mapel_nama]</li>"; 
                     
                    }
                    echo"
                    </ol>
                    </td>
                   
                    <td align='center'>$jumlah - Jam</td>
      	           
      	        </tr>";
                @$total = $total+$jumlah;
                $no++;
          	}
          ?>
              
          </tbody>
      </table>
      </div>
	</div>
	<div class="row">
			
					<table class="table" align="center">
						<tr>
							<td width="50%" align="center">Mengetahui,<br>
							Kepala SMK NU Kota Tasikmalaya<br><br><br><br>
							Asep Susanto, S.Ag,M.Pd.I							
							</td>
							<td width="50%" align="center">Tasikmalaya, 
								<?php 
								if ((@$ad[semester_nama]=='GENAP') and (@$ta[tahun_ajaran]=='2019-2020'))
								{ 
									echo"15 Juli 2019 <br><br>"; }
								else
								{
									echo"15 Juli 2019 <br>";
								}
								?>
							Wakil Kepala Bidang Kurikulum<br><br><br><br>
							Nizar Suryadi, ST							
							</td>
						</tr>					
					</table> 
				
			</div>
			
			<!-- <body onload="window.print()"> -->
