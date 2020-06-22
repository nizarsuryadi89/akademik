<?php
    include "../../configakademik.php";
	$sql 		= "select * from tbl_mapelrombel a inner join 
						tbl_mapel b on a. mapel_id=b.mapel_id inner join 
							tbl_rombel c on a.rombel_id=c.rombel_id
								where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $userkd 
									order by c.kelas_id desc";
	$query		= $con->query($sql);
	
	
?>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table-responsive">
                 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <td>Mata Pelajaran</td>
                        <td>Jumlah Jam</td>
                    </tr>
        <?php 
            while ($hasil=$query->fetch_array())
            {
        ?>
                    <tr>
                        <td><?php echo"<a href='?page=mapel-rombel&rombel-kd=$hasil[rombel_id]&mapel-kd=$hasil[mapel_id]'>$hasil[mapel_nama]</a> - $hasil[rombel_nama]"; ?>
                            
                        </td>
                        <td><?php echo"$hasil[mapel_jam]";?> - jam/minggu</td>
                    </tr>
        <?php
            }
        ?>
                </table>
            </div>
        </div>
    </div>
</div>