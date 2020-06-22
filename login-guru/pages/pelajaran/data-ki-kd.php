<?php
    //include "../../configakademik.php";

    @$kode       = $_GET[mapelkd];
	$query		= $con->query("select * from tbl_kikd where mapel_id=$kode");
	
	if ($_GET[hapus]=='Y')
	{
	    $kodekd = $_GET[kode];
	    $hapus  = $con->query("delete from tbl_kikd where kikd_id = $kodekd");
	    echo "<meta http-equiv='refresh' content='0.2;URL=?page=data-ki-kd&mapelkd=$kode'>";
	}
	
?>
<div class="col-lg-12"">
    <div class="row">
    
    <div class="panel panel-default">
        <div class="panel-heading" align="left">
            <a href="?page=ki-kd"><button type='button'  class='btn btn-warning'><i class="fa fa-backward"></i></button></a>
          	<a href="#"><button class="btn btn-success" type="button" data-target="#datakikd" data-toggle="modal"><i class="fa fa-plus"></i></button></a>  
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <td width="5%">No</td>
                        <td width="40%">KD Pengetahuan</td>
                        <td width="40%">KD Keterampilan</td>
                        <td width="10%" align="center">Jam</td>
                        <td>Ket</td>
                    </tr>
        <?php 
            $no =1;
            while ($hasil=$query->fetch_array())
            {
        ?>
                    <tr>
                        <td><?php echo "$no";?></td>
                        <td><?php echo"$hasil[id_3] . $hasil[kd_3]"; ?></td> 
                        <td><?php echo"$hasil[id_4] . $hasil[kd_4] </td>"; ?>
                        <td align="center"><?php echo"$hasil[kd_jam] </td>"; ?>
                        <td><?php echo"<a href='?page=data-ki-kd&mapelkd=$kode&hapus=Y&kode=$hasil[kikd_id]'>";?><button class='btn btn-warning'><i class='fa fa-trash'></i></button></a></td>
                    </tr>
        <?php
            @$no++;
           	@$jml = $jml+$hasil[kd_jam];
            }
        ?>
                   	<tr><td colspan="3" align="right">Jumlah : </td><td align="center"><?php echo "$jml JP"; ?></td></tr>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>

<div id="datakikd" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah KI/KD</h4>
			</div>
			<div class="modal-body">
				<form action ="" method="POST" class="">
        			    
        			     <div class="form-group">
                          <label class="control-label" for="mapelurut">Kode KD</label>
                          <input type="text" name="id3" class="form-control" id="mapelurut" name="id3"><br>
                           <input type="text" name="id4" class="form-control" id="mapelurut" name="id4">
                      	</div>
        			    <div class="form-group">
                          <label class="control-label" for="mapelkode">KD Pengetahuan</label>
                          <textarea class="form-control ckeditor" name="kd3"></textarea>
                         
                         
                      	</div>
                      	 <div class="form-group">
                          <label class="control-label" for="mapelkode">KD Keterampilan</label>
                          <textarea class="form-control ckeditor" name="kd4"></textarea>
                          
                      	</div>
                      	 <div class="form-group">
                          <label class="control-label" for="mapelurut">Jumlah Jam</label>
                          
                           <input type="number" name="jam" class="form-control" id="mapelurut">
                      	</div>
        				        
                       
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" name="save" value="save">
					Simpan
				</button>
				<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				</form>
			
			</div>
		</div>
	</div>
</div>

<?php
  if (@$_POST[save]=='save')
  {
    $mapel  = $_GET[mapelkd];
    $id3    = $_POST[id3];
    $id4    = $_POST[id4];
    $kd3    = $_POST[kd3];
    $kd4    = $_POST[kd4];
    $jam    = $_POST[jam];


    $simpan = $con->query("insert into tbl_kikd set 
                                  mapel_id  = $mapel,
                                  id_3      = '$id3',
                                  id_4      = '$id4',
                                  kd_3      = '$kd3',
                                  kd_4      = '$kd4',
                                  kd_jam    = $jam
                          ");
    echo "<meta http-equiv='refresh' content='0.2;URL=?page=data-ki-kd&mapelkd=$kode'>";
  }
?>