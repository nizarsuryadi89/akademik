<form action='' method='POST' enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputPassword3">Nama Lengkap</label><input type="text"  name='nama' class="form-control" id="inputPassword3" value="<?php echo"$af[guru_nama]"?>">
    </div>
    <div class="form-group">
        <label for="inputPassword3">NUTPK/PEG ID</label><input type="text"  name='nuptk' class="form-control" id="inputPassword3" value='<?php echo"$af[guru_nuptk]"?>'">    
    </div>
     <div class="form-group">
        <label for="inputPassword3">TEMPAT LAHIR</label><input type="text"  name='tempat' class="form-control" id="inputPassword3" value='<?php echo"$af[guru_tempatlahir]"?>'">    
    </div>
    <div class="form-group">
        <label for="inputPassword3">TEMPAT LAHIR</label><input type="date"  name='tgl' class="form-control" id="inputPassword3" value='<?php echo"$af[guru_tgllahir]"?>'">    
    </div>
    <div class="form-group">
        <label for="inputPassword3">ALAMAT</label> <TEXTAREA class="form-control" rows="3" name='alamat'><?php echo"$af[guru_alamat]"?></TEXTAREA>    
    </div>
    <div class="form-group">
        <label for="inputPassword3">NO HP</label><input type="text"  name='nohp' class="form-control" id="inputPassword3" value='<?php echo"$af[guru_hp]"?>'">    
    </div>
    <div class="form-group">
        <label for="inputPassword3">EMAIL</label><input type="text"  name='email' class="form-control" id="inputPassword3" value='<?php echo"$af[guru_email]"?>'">    
    </div>
    <div class="form-group">
          <label class="control-label" for="foto">
            <?php echo"<img src='../assets/foto-guru/$af[guru_foto]' class='img-rounded' width='80' height='110'> ";
            ?>
          Foto 3x4 Terbaru</label>
          <input type="file" name="foto" class="form-control" id="foto">
        </div>
    <div >
         <input type="submit" class="btn btn-success" name="btnUpload" value='simpan'></button>
    </div>
          
</form>

 <?php

    $folder     = '../assets/foto-guru/';
    $file_type  = array('jpg');
    $max_size   = 10000000; // 10MB

    if(@$_POST['btnUpload']=='simpan')
    {
        @$file_name  = $_FILES['foto']['name'];
        @$file_size  = $_FILES['foto']['size'];

        @$namaguru      = $_POST[nama];
        @$nuptk         = $_POST[nuptk];
        @$tempat        = $_POST[tempat];
        @$tanggal       = $_POST[tgl];
        @$alamat        = $_POST[alamat];
        @$nohp          = $_POST[nohp];
        @$email         = $_POST[email];

        $file           = "$namaguru.".end($file_type);
        $sumber         = $_FILES['foto']['tmp_name'];
        $upload         = move_uploaded_file($sumber, $folder.$file);

        $updateguru     = $con->query("update tbl_guru set 
                                            guru_nuptk          =   '$nuptk',
                                            guru_nama           =   '$namaguru',
                                            guru_tempatlahir    =   '$tempat',
                                            guru_tgllahir       =   '$tanggal',
                                            guru_alamat         =   '$alamat',
                                            guru_hp             =   '$nohp',
                                            guru_email          =   '$email'
                                            
                                           where guru_id        =   $userkd
                                        ");
        

        echo "<meta http-equiv='refresh' content='1;URL=?page=dashboard'>";

        if($upload)
        {
            $updateguru     = $con->query("update tbl_guru set 
                                            guru_foto           =   '$file'
                                           where guru_id        =   $userkd
                                        ");
        

            echo "<meta http-equiv='refresh' content='1;URL=?page=dashboard'>";
        }
        else
        {
            echo"upload gagal";
        }
    }
?>
