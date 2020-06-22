
<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
             
              <div class="panel-heading">
              <a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"> Add</button></a>

              <iframe src="<?php echo"cetak/print-daftarsiswa.php";?>" style="display:none;" name="frame" ></iframe>
               
                
                <button type="button" class="btn btn-primary" onClick="frames['frame'].print()" ><i class="glyphicon glyphicon-print"></i> Cetak</button>
                  
                <a href="?page=mapel-rombel&kd-rombel=<?php echo $rombel ; ?>"><button class="btn btn-success"><i class="glyphicon glyphicon-cloud"></i> Export Excel</button></a>
                 

                    
              </div>
            </div>
           
            
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    	$datasiswa = $con->query("select * from tbl_siswa a inner join tbl_pembayaran b 
                    								on a.siswa_id=b.siswa_id left join tbl_jenispembayaran c 
                    									on b.jenis_id= c.jenis_id where siswa_aktif='A' GROUP BY a.siswa_id");
                    ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th width='5%'>NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>PARTISIPASI <br> PENDIDIKAN</th>
                                <th>OSIS</th>
                                <th>PRAKTIK</th>
                                                                
                                
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
                    	           <td onclick=\"location.href='?page=data-pembayaran-siswa&kat=info&kdsiswa=$id'\">$aa[siswa_nama]</a></td>
                                <td align='center'><a href='?page=data-pembayaran-siswa&aksi=bayar&kodesiswa=$aa[siswa_id]&pembayaran=1'><button class='btn btn-success'>  <i class='glyphicon glyphicon-edit'></i> Bayar</button></a></a></td>
                                  
                                <td align='center'><a href='?page=data-pembayaran-siswa&aksi=bayar&kodesiswa=$aa[siswa_id]&pembayaran=2'><button class='btn btn-warning'>  <i class='glyphicon glyphicon-edit'></i> Bayar</button></a></a></td>
                                <td align='center'><a href='?page=data-pembayaran-siswa&aksi=bayar&kodesiswa=$aa[siswa_id]&pembayaran=3'><button class='btn btn-danger'>  <i class='glyphicon glyphicon-edit'></i> Bayar</button></a></a></td>

                    	          
                               
                    	            
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

          <div class="col-lg-5">
            <div class="panel panel-default">
                
                  <?php
                  	if (@$_GET[aksi]=='bayar') 
                  	{
                  		@$kodesiswa = $_GET[kodesiswa];
                  		@$jenis 	= $_GET[pembayaran]; 
                  	?>
                  		<div class="panel-heading">
		                 PEMBAYARAN PARTISIPASI PENDIDIKAN
		                </div>
		                <div class="panel-body">

						<form action=""  method="POST">
							<div class="form-group">
								<label>Bulan</label>
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
							<div class="form-group">
								<label>Tanggal Bayar</label>
								<div class="input-group">
									<input type="date" name="tanggal" class="form-control">
								</div>
						
						<hr>			
						<button class="btn btn-success" type="submit" name="simpan" value="simpan">
							Simpan
						</button>
						
						</form>
						<?php	

						if (@$_GET[pembayaran]=='1')
							{
								if (@$_POST[simpan]=='simpan')
								{
									@$bulan 		= $_POST[bulan];
									@$tanggal 		= $_POST[tanggal];
									@$jenis 		= $_GET[pembayaran]; 
									@$simpan = $con->query("update tbl_pembayaran set
																					bulan_bayar  = $bulan,
																					tgl_bayar 	 = '$tanggal'
																				where jenis_id   = $jenis
														 ");
								}	
							}
						elseif (@$_GET[pembayaran]=='2')
						{
							if (@$_POST[simpan]=='simpan')
								{
									@$bulan 		= $_POST[bulan];
									@$tanggal 	= $_POST[tanggal];
									@$simpan = $con->query("insert into tbl_pembayaran set siswa_id  	= $kodesiswa,
																						   jenis_id 	= $jenis,
																						   bulan_bayar  = $bulan,
																						   tgl_bayar 	= '$tanggal'
														 ");
								}	
						}
						elseif (@$_GET[pembayaran]=='3')
						{
							if (@$_POST[simpan]=='simpan')
								{
									@$bulan 		= $_POST[bulan];
									@$tanggal 	= $_POST[tanggal];
									@$simpan = $con->query("insert into tbl_pembayaran set siswa_id  	= $kodesiswa,
																						   jenis_id 	= $jenis,
																						   bulan_bayar  = $bulan,
																						   tgl_bayar 	= '$tanggal'
														 ");
								}	
						}
						?>
					
                  <?php
                  	}
                    if (@$_GET[kat]== 'info')
                    {
                      if (@$_GET[kdsiswa] != '')
                      {
                      	?>
                      <div class="panel-heading">
		                 REKAPITULASI PEMBAYARAN SISWA
		                </div>
		                <div class="panel-body">
		             <?php
                      @$datasiswa = $con->query("select * from tbl_siswa WHERE siswa_id='$_GET[kdsiswa]' ");
                      @$bayar  	  = $con->query("select * from tbl_pembayaran where siswa_id='$_GET[kdsiswa]' group by bulan_bayar ");
                      @$inf       = $datasiswa->fetch_assoc();

                      echo"
                  
                      Nama Siswa : $inf[siswa_nama] <hr>

                      <table id='example2' class='table table-bordered table-striped'>
                      	<tr>
                      		<Th>Bulan</th>
                      		<Th>Partisipasi</th>
                      		<Th>OSIS</th>
                      		<Th>Praktik</th>
                      		<th>Ket</th>
                     	</tr>";

                     
                     while ($ab = $bayar->fetch_array())
                     {
                     	$partisipasi 	= $con->query("select * from tbl_pembayaran where jenis_id = '1'  
                     									and siswa_id=$ab[siswa_id] and bulan_bayar=$ab[bulan_bayar] ");
                     	$part 			= $partisipasi->fetch_assoc();

                     	$partisipasi1 	= $con->query("select * from tbl_pembayaran where jenis_id = '2'  
                     									and siswa_id=$ab[siswa_id] and bulan_bayar=$ab[bulan_bayar]");
                     	$osis 			= $partisipasi1->fetch_assoc();

                     	$partisipasi2 	= $con->query("select * from tbl_pembayaran where jenis_id = '3'  
                     									and siswa_id=$ab[siswa_id] and bulan_bayar=$ab[bulan_bayar]");
                     	$prak 			= $partisipasi2->fetch_assoc();


                     	if (($part['tgl_bayar'] != '') and ($osis['tgl_bayar'] != '') and ($prak['tgl_bayar']))
                     	{
                     		$ket = "LUNAS";
                     	}
                     	echo "
                     	<tr>
                     		<td>$ab[bulan_bayar] </td>
                     		<td>" .tgl_indo($part['tgl_bayar'])." </td>
                     		<td>" .tgl_indo($osis['tgl_bayar'])." </td>
                     		<td>" .tgl_indo($prak['tgl_bayar'])."</td>
                     		<td><button type='button' class='btn btn-primary' ><i class='glyphicon glyphicon-print'></i> Cetak</button></td>
                     	</tr>

                     	";
                     }
                     	
                     	echo"
                      </table>

                       ";
                    }
                    }

                  ?>

                </div>
            </div>
          </div>
        </div>

<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">TAMBAH DATA SISWA</h4>
					</div>
					<div class="modal-body">
						<form action="" name="modal_popup" method="POST">
							<div class="form-group">
								<label>Nama Siswa</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-id-card"></i>
									</div>
									<select name="siswa_id" class="form-control" style>
											<option>Pilih Siswa</option>
										<?php 
											$barang = $con->query("select * from tbl_siswa where siswa_aktif='A' order by siswa_nis asc");
											while($data=$barang->fetch_array())
											{
												
												echo"<option value='$data[siswa_id]'>$data[siswa_nama]</option>";
											}
										?>
									</select>
								</div>
							</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="submit" name="simpan" value="simpan">
						Simpan
					</button>
					<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
						Cancel
					</button>
					</form>
				</div>
			</div>		
		</div>

<?php
	if (@$_POST['simpan']=='simpan')
		{	
			$siswa = $_POST[siswa_id];
			$i = $con->query("insert into tbl_pembayaran set siswa_id=$siswa, jenis_id=1 ");
			$j = $con->query("insert into tbl_pembayaran set siswa_id=$siswa, jenis_id=2 ");
			$k = $con->query("insert into tbl_pembayaran set siswa_id=$siswa, jenis_id=3 ");
			
			echo"<meta http-equiv='refresh' content='0.2;?page=data-pembayaran-siswa'>";
		}

?>
		
        
    