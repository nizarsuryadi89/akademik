<?php
	@$kode 	= $af[guru_id];
	$agenda = $con->query("select * from tbl_agenda a left join tbl_rombel b 
								on a.rombel_id=b.rombel_id inner join tbl_mapel c 
								  	on a.mapel_id=c.mapel_id 
 									 where guru_id=$kode order by agenda_id desc");
 									 
 	if (@$_GET[aksi]=='hapus')
 	{
 	    $kodeagenda = @$_GET[kode];
 	    $hapus = $con->query("delete from tbl_agenda where agenda_id=$kodeagenda");
 	    echo"<meta http-equiv='refresh' content='0.2;?page=agenda-harian'>";
 	    
 	}
?>
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="?page=dasboard"><button type='button'  class='btn btn-warning'><i class="fa fa-backward"></i></button></a>
			<a href="?page=tambah-agenda"><button type='button'  class='btn btn-success'><i class="fa fa-plus"></i></button></a>
			<a href="?page=cetak-agenda"><button type='button'  class='btn btn-primary'><i class="fa fa-print"></i></button></a>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th width='3%'>No</th>
							<th width='10%'>Hari/Tanggal</th>
						    <th>Rombel</th>
							<th width='10%'>Mapel</th>
							<th width="50%">Isi Agenda</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
	<?php
		$no=1;
		while ($aa=$agenda->fetch_array())
		{
			echo"<tr>
					<td>$no</td>
					<td>$aa[agenda_hari] - ".tgl_indo(@$aa[agenda_tgl])."</td>
				    <td>$aa[rombel_nama]</td>
					<td>$aa[mapel_nama]</td>
					<td>
						
							<img src='../img/berita/$aa[agenda_foto]' width='220' class='img-rounded zoom' >
						

					
						<p align='justify'>$aa[agenda_isi]</p>
						
					</td>
					<td align='center'>
                       
                        <a href='?page=edit-agenda&kode=$aa[agenda_id]'><button class='btn btn-success'><span class='fa fa-edit'></button></a>
                                            
                                       
                            
                        <a href='?page=agenda-harian&aksi=hapus&kode=$aa[agenda_id]'><button class='btn btn-danger'><i class='fa  fa-trash'></i></button></a>
                    </td>
                 </tr>";
                        $no++;
                        	}
                        ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
