<?php
    error_reporting(0);
    
    $kode   = $_GET[mapel_id];
    $mapel  = $con->query("select * from tbl_mapel a inner join tbl_kurikulum b on a.kur_id=b.kur_id 
                                where mapel_id  = $kode ");
    $ab     = $mapel->fetch_assoc();
?>
<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">

               <a href="?page=Data Pelajaran"><button class="btn btn-warning"><i class="fa fa-backward"></i></button></a>
               
                 
            </div>
            <div class="panel-body">
                <div class="form-group">
        			     <form action ="" method="POST" class="">
        			    
        			     
        			    <div class="form-group">
                          <label class="control-label" for="mapelurut">No Urut Mata Pelajaran</label>
                          <input type="text" name="mapelurut" class="form-control" id="mapelurut" value="<?php echo $ab[mapel_urut];?>">
                      	</div>
        			    <div class="form-group">
                          <label class="control-label" for="mapelkode">Kode Mata Pelajaran</label>
                          <input type="text" name="mapelkode" class="form-control" id="mapelkode" value="<?php echo $ab[mapel_kode];?>">
                      	</div>
                      	 <div class="form-group">
                          <label class="control-label" for="mapelkode">Kelompok Mata Pelajaran</label>
                          <input type="text" name="mapeljam" class="form-control" id="mapelkelompok" value="<?php echo $ab[mapel_kelompok];?>" readonly>
                      	</div>
        				<div class="form-group">
                          <label class="control-label" for="mapelnama">Nama Mata Pelajaran</label>
                          <input type="text" name="mapelnama" class="form-control" id="mapelnama" value="<?php echo $ab[mapel_nama];?>">
                      	</div>
                      	<div class="form-group">
                          <label class="control-label" for="mapeljam">Jumlah Jam/Minggu</label>
                          <input type="text" name="mapeljam" class="form-control" id="mapeljam" value="<?php echo $ab[mapel_jam];?>">
                      	</div>
                      	<div class="form-group">
                          <label class="control-label" for="kurikulum">Kurikulum</label>
                          <input type="text" name="kurikulum" class="form-control" id="kurikulum" value="<?php echo $ab[kur_nama];?>"readonly>
                          <input type="hidden" name="kdkur" class="form-control" id="kurikulum" value="<?php echo $ab[kur_nama];?>">
                      	</div>
                      	<button type="submit" class="btn btn-success" name="simpan" value='simpan'><i class="fa fa-save"></i> Simpan</button>
                         
                      </div>
        			</form>
        			<?php
        			    if ($_POST['simpan']=='simpan')
        			    {
        			        $mapelurut      = $_POST[mapelurut];
        			        $mapelkode      = $_POST[mapelkode];
        			        $mapelkelompok  = $_POST[mapelkelompok];
        			        $mapelnama      = $_POST[mapelnama];
        			        $mapeljam       = $_POST[mapeljam];
        			        $kdkur          = $_POST[kdkur];
        			        
        			        $simpan    = $con->query("update tbl_mapel set 
        			                                    mapel_urut      = $mapelurut,
        			                                    mapel_kode      = '$mapelkode',
        			                                    mapel_nama      = '$mapelnama',
        			                                    mapel_jam       = ' $mapeljam'
        			                                    
        			                                    where mapel_id  = $kode 
        			                                   
        			                                 ");

        			        echo"<meta http-equiv='refresh' content='0.2;?page=data-pelajaran'>";
        			    }
        			?>
                        
            </div>
        </div>
    </div>
</div>