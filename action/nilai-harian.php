<?php
	include "../../config.php";

	$kode 	= @$_GET[nilai_id];

	$nilai 	= $con->query("select * from tbl_nilaipengetahuan a inner join tbl_siswa b 
							on a.siswa_id=b.siswa_id where nilai_id=$kode ");
	$nn 	= $nilai->fetch_assoc();
	$siswa  = @$nn[siswa_nama];	

	$nilaiharian = $con->query("select * from tbl_nilai_harian where nilai_id=$kode");
	$nh 		 = $nilaiharian->fetch_assoc();

	$mapelrombel = $con->query("select * form tbl_mapelrombel where mapelrombel_id = ")

?>
<form action="action/aksi-nilai-harian.php" method="POST">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Nilai Harian <?php echo ""; ?></h4>
			</div>
			<div class="modal-body">
				<table width="100%">
					<tr><td>Nama Siswa <hr></td><td><?php echo"$siswa";?> <hr></td></tr>
							<input type="hidden" name="siswa" value="<?php echo"$nn[siswa_id]"; ?> ">
							<input type="hidden" name="nilaiid" value="<?php echo"$nn[nilai_id]"; ?> ">
					<tr>
						<td>KD 3.1 Penugasan (Bobot 1) <br></td>
						<td><input name="kd31" type="text" class="form-control"  value='<?php echo "$nh[kd_31]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.1 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd31a" type="text" class="form-control"  value='<?php echo "$nh[kd_31a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.2 Penugasan (Bobot 1) <br></td>
						<td><input name="kd32" type="text" class="form-control"  value='<?php echo "$nh[kd_32]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.2 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd32a" type="text" class="form-control"  value='<?php echo "$nh[kd_32a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.3 Penugasan (Bobot 1) <br></td>
						<td><input name="kd33" type="text" class="form-control"  value='<?php echo "$nh[kd_33]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.3 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd33a" type="text" class="form-control"  value='<?php echo "$nh[kd_33a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.4 Penugasan (Bobot 1) <br></td>
						<td><input name="kd34" type="text" class="form-control"  value='<?php echo "$nh[kd_34]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.4 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd34a" type="text" class="form-control"  value='<?php echo "$nh[kd_34a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.5 Penugasan (Bobot 1) <br></td>
						<td><input name="kd35" type="text" class="form-control"  value='<?php echo "$nh[kd_35]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.5 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd35a" type="text" class="form-control"  value='<?php echo "$nh[kd_35a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.6 Penugasan (Bobot 1) <br></td>
						<td><input name="kd36" type="text" class="form-control"  value='<?php echo "$nh[kd_36]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.6 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd36a" type="text" class="form-control"  value='<?php echo "$nh[kd_36a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.7 Penugasan (Bobot 1) <br></td>
						<td><input name="kd37" type="text" class="form-control"  value='<?php echo "$nh[kd_37]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.7 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd37a" type="text" class="form-control"  value='<?php echo "$nh[kd_37a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.8 Penugasan (Bobot 1) <br></td>
						<td><input name="kd38" type="text" class="form-control"  value='<?php echo "$nh[kd_38]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.8 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd38a" type="text" class="form-control"  value='<?php echo "$nh[kd_38a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.9 Penugasan (Bobot 1) <br></td>
						<td><input name="kd39" type="text" class="form-control"  value='<?php echo "$nh[kd_39]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.9 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd39a" type="text" class="form-control"  value='<?php echo "$nh[kd_39a]";?>'><br></td>
					</tr>
					<tr>
						<td>KD 3.10 Penugasan (Bobot 1) <br></td>
						<td><input name="kd310" type="text" class="form-control"  value='<?php echo "$nh[kd_310]";?>'> <br></td>
					</tr>
					<tr>
						<td>KD 3.10 Penugasan Harian (Bobot 3) <br></td>
						<td><input name="kd310a" type="text" class="form-control"  value='<?php echo "$nh[kd_310a]";?>'><br></td>
					</tr>
				</table>
				
				
				

			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" name="simpan" value="simpan">
					Save
				</button>
				<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
			</div>
		</div>
	</div>
</form>
