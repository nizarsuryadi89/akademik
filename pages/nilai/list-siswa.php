<?php
	//error_reporting(0);
	@$semester 	=$_GET['semester'];
	@$kode		=$_GET['mapel-kd'];
	@$rombel	=$_GET['rombel-kd'];
	@$kur 		=$_GET['kur-id'];
	@$mapelkd 	=$_GET['mapelrombel'];
	@$guru 		=$_GET['guru'];
	@$kkm 		=$_GET['kkm'];

	//echo"$kode";
//	echo"$guru";
    include "query_semester.php";
    
    

	@$result 	= $con->query($tampil); 
	@$jumlah	= mysqli_num_rows($result);
	@$no			=1;	
	
	//assoc
	@$hasil	 	= $con->query($query); 
	@$aa		= $hasil->fetch_assoc();

	
		
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
		<div class="panel-heading">
			<a href="javascript:history.back()"><button class="btn btn-block">Kembali</button></a>
		</div>
        <div class="panel-body"> 
		<div class="table-responsive">
			<table  class="table table-stripped table-bordered table-responsive" >
				<thead>
					<tr valign='middle'>
						<th>No</th>
                        <th>NIS/NISN</th>
						<th>Nama Siswa</th>
						<th>Jenis Kelamin</th>
						<th>Tempat, Tanggal Lahir</th>
						<th>Aksi</th>
					</tr>	
					
				</thead>

<?php						
										
			while($row= $result->fetch_array())
			{
				echo"
				<tbody>
					<tr class='odd gradeX'>
                        <td align='center'>$no</td>
                        <td>$row[siswa_nis]</td>
						<td align='left'>
							$row[siswa_nama]  <br>
						</td>
						<td>$row[siswa_jk]</td>
					
						<td align='center'>
							<input type='text' style=\"width: 70px; border:0px; font-family:Arial; font-size:15px; \" size='4' value='$row[nh_sms1]' name='harian'>
							</td>
                        <td align='center'>
                            <a href='index.php?page=list-siswa&kat=hapuslist&id=$row[nilai_id]&mapelkd=$kode&rombelkode=$rombel&sms=$semester&guru=$guru&kkm=$kkm'>
                                <button class='btn btn-danger'><i class='fa fa-trash'></i></button>
                            </a>
                        </td>			
					</tr>
				</tbody>
			</form>

				";
			$no++;
			}
			echo"
		

			</table>";

				
		?>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
if (@$_GET[kat] == 'hapuslist')
    {
        $rombel     = $_GET[rombelkode];
        $mapel      = $_GET[mapelkd]; 
        $semester   = $_GET[sms];
        $guru       = $_GET[guru];
        $kkm        = $_GET[kkm];

       
        if ($semester == 1)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms1 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=1'>";
        }
        elseif ($semester == 2)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms2 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=2'>";
        }
        elseif ($semester == 3)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms3 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=3'>";
        }
          elseif ($semester == 4)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms4 where nilai_id = $id");
           echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=4'>";
        }
          elseif ($semester == 5)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms5 where nilai_id = $id");
            //echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=5'>";
        }
          elseif ($semester == 6)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms6 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=6'>";
        }
    }


?>