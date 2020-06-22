<?php
  if ($jmm <> 0){
?>
  <div id="myModal" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="alert alert-warning alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                
            </button>
            <h3>Ada Fitur Terbaru untuk Wali Kelas, <br> Sekarang Bisa Cek Progress Inputan Nilai Dari Guru Guru<br> Cek <br><a href="index.php?page=mapel-rombel">disini</a></h3>
        </div>
        
         
    </div>
  </div>
<?php
  }
?>
<?php
    //include "../../config.php";

    
	$sql 		= "select * from tbl_mapelrombel a inner join 
						tbl_mapel b on a. mapel_id=b.mapel_id inner join 
							tbl_rombel c on a.rombel_id=c.rombel_id
								where c.semester_id=$sms and c.tahun_id=$tahun and guru_id = $userkd 
									order by c.kelas_id asc";
	$query		= $con->query($sql);
	
	//echo" $userkd";
?>
<body onload="myFunction()">
<div class="col-lg-12"">
    <div class="row">
    
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4 class="panel-title">PENILAIAN</h4>
        </div>
        <div class="panel-body">
            <font color='red'>Ket : Diisi sesuai urutan Penilaiannya 1. Pengetahuan 2. Keterampilan  3. Sikap </font>
            <br></br>
            <div class="table-responsive">
                 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <td>No</td>
                        <td width="20%">Kelas - Semester</td>
                        <td width="40%">Mata Pelajaran</td>
                        <td width="20%">Penilaian</td>
                        <td >Jumlah Jam</td>
                    </tr>
        <?php 
            $no =1;
            while ($hasil=$query->fetch_array())
            {
        ?>
                    <tr>
                        <td><?php echo "$no";?></td>
                        <td><?php echo"
                           
                        <button class='btn btn-warning'>$hasil[rombel_nama]</button> <button class='btn btn-success'>$hasil[rombel_semester]</button>
                        <td>
                        $hasil[mapel_nama]
                        
						</td>
						<td>";
						       if (@$hasil[kur_id]==2)
                                    {
                                    if ((@$hasil[mapel_id] == 1) or (@$hasil[mapel_id] == 2))
                                        {
                                        echo"

                                        <a href='?page=input-nilai-sikap&rombel-kd=$hasil[rombel_id]&mapel-kd=$hasil[mapel_id]&kur=$hasil[kur_id]&semester=$hasil[rombel_semester]'>
                                            <button class='btn btn-warning btn-block'><i class='glyphicon glyphicon-new-window' title='penilaian Sikap'></i> &nbsp; 1. Sikap
                                            </button>
                                        </a>";
                                        }
                                        echo"

    	                            <a href='?page=input-nilai-pengetahuan&rombel-kd=$hasil[rombel_id]&mapel-kd=$hasil[mapel_id]&kur=$hasil[kur_id]&mapelrombel=$hasil[mapelrombel_id]&semester=$hasil[rombel_semester]'>
    	                                <button class='btn btn-success btn-block'><i class='glyphicon glyphicon-log-out' title='penilaian pengetahuan'></i> &nbsp; 2. Pengetahuan
    									</button>
    								</a>
    		                           
		                                <a href='?page=input-nilai-keterampilan&rombel-kd=$hasil[rombel_id]&mapel-kd=$hasil[mapel_id]&kur=$hasil[kur_id]&semester=$hasil[rombel_semester]'>
		                                <button class='btn btn-primary btn-block'><i class='glyphicon glyphicon-new-window' title='penilaian keterampilan'></i> &nbsp; 3. Keterampilan
		                                </button>
		                            </a>

		                            ";
                                    }else
                                    {
                                        echo"
                                        <a href='?page=input-nilai-pengetahuan&rombel-kd=$hasil[rombel_id]&mapel-kd=$hasil[mapel_id]&kur=$hasil[kur_id]&mapelrombel=$hasil[mapelrombel_id]&semester=$hasil[rombel_semester]'>
                                        <button class='btn btn-success btn-block'><i class='glyphicon glyphicon-log-out' title='penilaian pengetahuan'></i> Penilaian
                                        </button>
                                    </a>";
                                    }

		                            
		                            
		                   
                        echo"
                        </td>
                        <td >$hasil[mapel_jam] JP </td>"; ?>
                    </tr>
        <?php
            $no++;
            @$total = @$total + @$hasil[mapel_jam];
            }
        ?>
                    <tr><td colspan='4'>Total Jam/Minggu</td><td><?php echo "$total";?> Jam/Minggu</td></tr>
                </table>
            </div>
        
        </div>
    </div>
    </div>
</div>