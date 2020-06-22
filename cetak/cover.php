<?php
	include 	"../../configakademik.php";
	$infosekolah 	= $con->query("select * from tbl_foto");
	$in 			= $infosekolah->fetch_assoc();

?>
<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table width="100%" align="center">
					<tr>
						<td align="center">
							<img src="<?php echo "../../../assets/images/$in[logo_provinsi]"?>" width="70" height="110">
						</td>
						<td align="center">
							<h4>Lembaga Pendidikan Ma'Arif NU <br>
							Sekolah Menengah Kejuruan Nahdlatul Ulama SMK NU<br>
							SK Dinas Pendidikan No. 421.5/1628/Dikmen
							</h4>
							Jalan Argasari No. 31 Telp (0265) 313275 <br>
							email : smknu_kotatasik@yahoo.co.id<br>
							Tasikmalaya 46122
							
						</td>
						<td align="center">
							<img src="<?php echo "../../../assets/images/$in[logo_sekolah]"?>" width="80" height="80">
						</td>
					</tr>
				</table>
				<hr>
			</div>
		</div>
	</div>