<?php
    @$kode       =$_GET['mapel-kd'];
    @$rombel     =$_GET['rombel-kd'];
    

    $query      ="select * from tbl_nilaipengetahuan a inner join tbl_siswa b on a.siswa_id=b.siswa_id
                                    where a.rombel_id=$rombel";
    
    $tampil     ="select * from tbl_pesertarombel a inner join tbl_siswa b on a.siswa_id=b.siswa_id
                                    where a.rombel_id=$rombel order by siswa_nis asc"; 

    $kode   =   @$_GET['kd-rombel'] ;

    $asb =   $con->query("SELECT * FROM  tbl_rombel where rombel_id=$rombel");

    $field  =   $asb->fetch_assoc();

                        
    $result     = $con->query($tampil); 
  
    $no         =1; 
    
    //assoc
    $hasil      = $con->query($query); 
    @$aa         = $hasil->fetch_assoc();

    if (@$_GET[aksi] = 'hapus')
    {
        @$nis       = @$_GET[siswakd];
        //$delete     = $con->query("delete from tbl_pesertarombel where siswa_id=$nis");
      //  echo"<meta http-equiv='refresh' content='0.2;?page=peserta-rombel&rombel-kd=$rombel'>";
    } 
  
        
?>
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
       <div class="panel-heading">
			 <a href="?page=Kurikulum"><button class="btn btn-warning"><i class="fa fa-angle-double-left"></i></button></a>
             <a href='#' class=''><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
            <button class="btn btn-primary" disabled>Rombel Nama : <?php echo"$field[rombel_nama]"?></button>
            <button class="btn btn-success"><i class="fa fa-print"></i></button>
            </div>
        <div class="panel-body">
        <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr>
						<th>No</th>
                        <th>Nama Siswa</th>
                        <th>NIS</th>
                        <th>NISN</th>
                       
                        <th>JK</th>
                        <th width='25%'>Tempat,Tgl Lahir</th>
						<th>Aksi</th>
                       
                    </tr>   
                </thead>
                <tbody>

        <?php                                                       
            while($row= $result->fetch_array())
            {        
                if (@$row[siswa_foto] != '')
                {
                    @$foto = @$row[siswa_foto];
                }else
                {
                     @$foto = 'noimage.png';
                }
                echo"

                    <tr class='odd gradeX'>
                        <td align='center'>$no</td>
                        <td align='left'>$row[siswa_nama]</td>
                        <td align='left'>$row[siswa_nis]</td>
                        <td align='left'>$row[siswa_nisn]</td>
                       
                        <td>$row[siswa_jk]</td>
						<td>$aa[siswa_tempatlahir]," .tgl_indo($aa['siswa_tanggallahir'])."</td>
                        <td align='center'>";
                        if ($semester == '2')
                            {echo"
                            <a href='?page=peserta-rombel&rombel-kd=$rombel&siswakd=$row[siswa_id]'><i class='fa fa-upload'></i></a> &nbsp;
                            ";
                            }
                            echo"
                            <a href='?page=peserta-rombel&rombel-kd=$rombel&aksi=hapus&siswakd=$row[siswa_id]'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
                        </td>
                        </tr>
                
            

                ";
            $no++;
            }
        ?>
                </tbody>
             </table>
        </div>
        </div>
    </div>
</div>


