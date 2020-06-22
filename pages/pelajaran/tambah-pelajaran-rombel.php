<?php
	error_reporting(0);
	include_once "config.php";
	$rombelid	=$_GET['rombel'];

	$kur		=$_GET['kur'];
	$program	=$_GET['program'];
	$rom 		= $con->query("select rombel_nama from tbl_rombel where rombel_id = $rombelid");
	$rr 		= $rom->fetch_assoc();

	$result 	= $con->query("select * from tbl_mapel 
									where kur_id=2 and mapel_id 
										not in (select a.mapel_id from tbl_mapelrombel a 
											left join tbl_mapel b on a.mapel_id=b.mapel_id where 
												rombel_id=$rombelid)"); 
?>
<div class="row">
      <div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
        <div class="widget-box widget-color-blue" id="widget-box-2">
			 <div class="widget-header">
			 	<a href="?page=pembelajaran-rombel&kd-rombel=<?php echo "$rombelid"; ?>" class="btn btn-primary btn-xm">
					<i class="ace-icon fa fa-arrow-left"></i><?php echo "$rr[rombel_nama]";?>
					
				</a>
				<button class="btn btn-success" readonly>Masukkan Pelajaran Ke Rombel </button>
          </div>
			<div class="widget-body">
            <div class="widget-main">
			<table width='100%' class='table table-striping table-responsive' border='0'>
				<form action='' method='POST'>
				<thead>
				<tr>
					<td colspan='6' align='center'>
						<button type='reset' name='Reset'><font size='+0,5'>RESET</button>
						<button type='submit' name='Simpan'><font size='+0,5'>SIMPAN</button>
					</td>
				</tr>
				<tr>
					<th>Pilih</th>
					<th colspan="2">Kurikulum</th>
					<th>Mata Diklat</th>
					<th colspan="2">Jumlah JP</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$no=1;					
					while($row= $result->fetch_array())
					{
					echo"
					
					<tr >
						<td width='5%' align='center'><input type='checkbox' name='item[]' value='$row[mapel_id]'></td>
						<td width='3%' align='center'>$no</td>
						<td width='10%'>$row[mapel_kode]</td>
						<td width='50%'>$row[mapel_nama]</td>
						<td width='10%'>$row[mapel_jam] - JP</td>
						<td width='10%'>$row[kurikulum]</td>
					
						
					</tr>";
					$no++;					
					}
				?>
				
					</form>
							<?php
								$jmlpilih	=count($_POST['item']);
								$mapelid	=$_POST['item'];
								
									for ($x=0; $x<=$jmlpilih; $x++ )
									{
										$mapel	=$mapelid[$x];
										
										$rombel	=$rombelid;
											
										$simpan	=$con->query("insert into tbl_mapelrombel(mapel_id,rombel_id)values($mapel,$rombel)");
											
										echo"
										
										<meta http-equiv='refresh' content='30'>
										";
										
									}
								
							?>
					</td>
				</tr>
			</tbody>
			</table>
	</div>
</div>