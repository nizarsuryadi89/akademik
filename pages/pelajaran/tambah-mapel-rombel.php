<?php
	@$kur   = $_GET[kur];
	@$rom   = $_GET[rombel];
	$mapel  = $con->query("select * from tbl_mapel where kur_id=$kur");
	
	$rombel = $con->query("select * from tbl_rombel a inner join tbl_program 
							b on a.program_id=b.program_id where rombel_id=$rom");

	$rr 	= $rombel->fetch_assoc();


?>
<div class="row">	
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h5 class="panel-title">Rombel : <?php echo "$rr[rombel_nama]"; ?> - - -
					Program : <?php echo "$rr[program_alias]";?>
				</h5><hr>
				<button class="btn btn-success">Simpan</button>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-responsive">
						<tr>
							<th></th>
							<th>Nama Pelajaran</th>
							<th>Kompetensi Keahlian</th>
						</tr>
				<?php
					while ($aa = $mapel->fetch_array())
					{
						echo "
						<tr>
							<td><input type='checkbox'></td>
							<td>$aa[mapel_nama]</td>
							<td>$aa[kom_keahlian]</td>
						</tr>
						";
					}
				?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>