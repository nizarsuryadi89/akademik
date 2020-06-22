<?php
	@$faktur = $con->query("select * from tbl_transaksi order by faktur_id desc limit 0,1");
	@$fak 	= $faktur->fetch_assoc();
	@$fakk 	= $fak[faktur_id] + 1;

	  @$tahun = date(Y);
	  @$bulan = date(M);
	  @$hari  = date(d);
	  @$bul   = date(m);

	  $no 		= 1;
	  //$query 		= $con->query("select * from tmp_transaksi");

	  @$inputtgl = $tahun-$bulan-$hari;
?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						&nbsp;<i class="glyphicon glyphicon-edit"></i> No Faktur : <?php echo $fakk ;?> &nbsp; Tgl : <?php echo "$hari  $bulan  $tahun" ;?>
					</div>
					<div class="panel-body">
					
						<a href="#"><button class="btn btn-success" type="button" data-target="#siswanama" data-toggle="modal"><i class="fa fa-plus"></i> PILIH SISWA</button></a>
						
					</div>
				</div>
			</div>


			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading" >
						
						
					</div>
					<div class="panel-body">
						<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
						<br>
						<br>
						<div class="table-responsive">
							
							<table class="table table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<td>No</td>
										<td>Jenis Pembayaran</td>
										<td>Bulan</td>
										<td>Harga</td>
										<td>Total</td>
										<td width="20%">Aksi</td>
									</tr>
								</thead>
								<tbody>
						<?php
							$query = $con->query("select * from tmp_transaksi a inner join tbl_jenispembayaran b 
													on a.jenis_id=b.jenis_id");
							$jumlah = mysqli_num_rows($query);
							if (@$jumlah != 0)
							{

								while ($data=$query->fetch_array())
								{
									
						?>
								
								<tr>
									<td><?php echo "$data[jenis_nama]"?></td>	
								</tr>
								
								
						<?php
								
								}
							}
						?>						
								</tbody>
							</table>
								
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-titlr">TOTAL :</h3>
					</div>
					<br><br><br>
					<div class="panel-body" align="center">
						<h1> </h1>
					</div>
				</div>
			</div>
			
			<div class="col-md-12" align="center">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h1 class="panel-title">Bayar</h1>
					</div>
					<div class="panel-body">
						<form action="action/aksitransaksi.php" method="GET">
							<div class="form-group">
								<label for="bayar">Rp. </label>
								<input type="hidden" name="faktur" value="<?php //echo"$faktur";?>">
								<input type="hidden" name="subtotal" value="<?php echo"$subtotal";?>">
								<input type="text" name="bayar" class="form-control" value="000"
										id="bayar" >
							</div>
							
							<button class="btn btn-success btn-lg" name="btnbayar" value="btnbayar">Cetak Faktur</button>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		<div id="siswanama" class="modal fade" tabindex="-2" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Transaksi</h4>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
                    <?php
                    	$datasiswa = $con->query("select * from tbl_siswa WHERE siswa_aktif='A' ");
                    ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th>NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>JK</th>
                                <th>NIS</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $no = 1;
                        	while ($aa=$datasiswa->fetch_array())
                        	{
                                @$id = $aa[siswa_id];
                            	echo"
                    	        <tr class='odd gradeX'>
                                 
                    	          <td>$no</td>
                                  <td><a href='?page=transaksi-pembayaran&aksi=pilihsiswa&kodesiswa=$aa[siswa_id]'>$aa[siswa_nama]</a></td>
                                  <td>$aa[siswa_jk]</td>
                                  <td>$aa[siswa_nis]</td>
                                 
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

		<?php
			if (@$_GET[aksi]=='pilihsiswa')
			{
				@$kode = $_GET[kodesiswa];
				@$temp = $con->query("insert into tmp_transaksi set siswa_id=$kode");
			}
		?>


		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Transaksi</h4>
					</div>
					<div class="modal-body">
					<form action ="" method="POST">
						<div class="form-group">
						<label>Jenis Pembayaran</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-id-card"></i>
							</div>
							<select name="barang" class="form-control" style>
								<option>Pilih Jenis Pembayaran</option>
								<?php 
									$barang = $con->query("select * from tbl_jenispembayaran");
									while($data=$barang->fetch_array())
									{
										echo"<option value='$data[jenis_id]'>$data[jenis_nama] </option>";
									}
								?>
							</select>
						</div>
						<label>Bulan Pembayaran</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-id-card"></i>
							</div>
							<select name="bulan" class="form-control" style>
										
										<option value="7">Juli</option>
										<option value="8">Agustus</option>
										<option value="9">September</option>
										<option value="10">Oktober</option>
										<option value="11">Novemver</option>
										<option value="12">Desember</option>
									</select>
						</div>
						
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" type="submit" name="simpan" value="simpan">
							Simpan
						</button>
						<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
							Cancel
						</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		
		<?php

		if (@$_POST['simpan']=='simpan')
			{
				$temp 	= $query("select * from tmp_transaksi");
				$tm 	= $temp->fetch_assoc();

				$siswa 	= $tm[siswa_id];

				@$barang 	= $_POST[barang];
				@$bulan 	= $_POST[bulan];

				$masuk 	= $con->query("insert into tmp_transaksi set siswa_id = $siswa,
																	 jenis_id = $barang,
																	 bulan_id = $bulan
																");
				echo"<meta http-equiv='refresh' content='0.2;?page=transaksi-pembayaran '>";

				
			}
		?>



		