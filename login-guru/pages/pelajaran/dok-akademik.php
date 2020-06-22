<?php
    //include "../../configakademik.php";

	$sql 		= "select * from tbl_mapelrombel a inner join 
						tbl_mapel b on a. mapel_id=b.mapel_id inner join 
							tbl_rombel c on a.rombel_id=c.rombel_id
								where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $userkd group by a.mapel_id
									order by c.kelas_id desc";
	$query		= $con->query($sql);
	
	
?>
<div class="col-lg-12"">
    <div class="row">
    
    <div class="panel panel-default">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <td>No</td>
                        <td width="20%">Mata Pelajaran</td>
                        <td width="75%">Dokumen Akademik</td>
                       
                    </tr>
        <?php 
            $no =1;
            while ($hasil=$query->fetch_array())
            {
        ?>
                    <tr>
                        <td><?php echo "$no";?></td>
                        <td><?php echo "$hasil[mapel_nama]";?></td>
						<td>
                            <a href>Silabus</a>
                            <a href>RPP</a>
                            <a href>Bank Soal</a>                  
                        </td>

                    </tr> 
        <?php
            $no++;
            @$total = @$total + @$hasil[mapel_jam];
            }
        ?>
                    
                </table>
            </div>
        </div>
    </div>
    </div>
</div>