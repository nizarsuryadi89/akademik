<?php
  $infosekolah  = $con->query("select * from tbl_foto");
  $foto       = $infosekolah->fetch_assoc();

?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h5 class="panel-title">SETTING INFO SEKOLAH </h5>
            </div>
            <div class="panel-body">
                <form action="" method="post"> 
                <div class="col-lg-6">
                <table width="100%" border='0'> 
                  <tr><td width="30%">Nama Sekolah <br></td><td>: <br></td><td><input type="text" name="namasekolah" class="form-control" value="<?php echo"$foto[nama_sekolah]"; ?> " ><br></td></tr>
                  <tr><td width="30%">NPSN<br></td><td>:<br></td><td><input type="text" name="npsn" class="form-control" value="<?php echo"$foto[npsn]"; ?> " ><br></td></tr>
                  <tr><td width="30%">Nama Kepala Sekolah<br></td><td>:<br></td><td> <input type="text" name="namakepsek" class="form-control" value="<?php echo"$foto[nama_kepsek]"; ?> " ><br></td></tr>
                  <tr valign="top"><td width="30%">Alamat Sekolah<br></td><td>:<br></td><td>
                   
                    <textarea class="form-control" placeholder="Alamat" rows="5" name="alamat"><?php echo"$foto[alamat_sekolah]"; ?>
                    </textarea><br></td></tr>
                  <tr><td width="30%">Kelurahan<br></td><td>:<br></td><td><input name="kel" type="text" class="form-control" value="<?php echo"$foto[kelurahan]"; ?> "><br></td></tr>
                  <tr><td width="30%">Kecamatan<br></td><td>:<br></td><td><input name="kec" type="text" class="form-control" value="<?php echo"$foto[kecamatan]"; ?> "><br></td></tr>
                  <tr><td width="30%">Kota/Kab<br></td><td>:<br></td><td><input name="kota" type="text" class="form-control" value="<?php echo"$foto[kota]"; ?> "><br></td></tr>
                  <tr><td width="30%">Provinsi<br></td><td>:<br></td><td><input name="prov" type="text" class="form-control" value="<?php echo"$foto[provinsi]"; ?> "><br></td></tr>
                  <tr><td width="30%">Skin<br></td><td>:<br></td><td>
                      <select name='skin'>
                        <option value='skin-1'>skin-1</option>
                        <option value='skin-2'>skin-2</option>
                        <option value='skin-3'>skin-3</option>
                        <option value='noskin'>noskin</option>
                      </select>
                  <br></td></tr>
                </table>
                <hr>
                <input type="submit" class="btn btn-success" name="btnUpload" value='simpan'></button>
                </div>
                </form>
                <div class="col-lg-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-4">
                     <div class="panel panel-default" align="center">
                        <div class="panel-heading">
                            <h4 class="panel-title"> Kepala Sekolah</h4>
                        </div>
                        <div class="panel-body">
                          <div class="form-group" align="center">
                            <label class="control-label" for="kepsek">
                               <?php echo"<img src='assets/images/$foto[foto_kepsek]' width='80' class='img img-rounded img-responsive'> ";?>
                            </label>
                            <input type="file" name="kepsek" class="form-control" id="kepsek" >
                          </div>
                        </div>
                        <div class="panel-footer">
                          <input type="submit" class="btn btn-success" name="btnkepsek" value='simpan'></button>
                        </div>
                      </div>
                    </div>
                    </form>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-4">
                     <div class="panel panel-default" align="center">
                        <div class="panel-heading">
                            <h4 class="panel-title"> LOGO SEKOLAH</h4>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="control-label" for="kepsek">
                               <?php echo"<img src='assets/images/$foto[logo_sekolah]' width='100' class='img img-rounded'> ";?>
                            </label>
                          </div>
                          <input type="file" name="logo" class="form-control" id="kepsek" >
                        </div>
                        <div class="panel-footer">
                          <input type="submit" class="btn btn-success" name="btnlogo" value='simpan'></button>
                        </div>
                      </div>
                    </div>
                    </form>
                    <form action="" method="POST" enctype="multipart/form-data">
                     <div class="col-lg-4">
                     <div class="panel panel-default" align="center">
                        <div class="panel-heading">
                            <h4 class="panel-title"> LOGO PROVINSI</h4>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="control-label" for="peta">
                                <?php echo"<img src='assets/images/$foto[logo_provinsi]' width='100' class='img img-rounded'> ";?>
                            </label>
                          </div>
                          <input type="file" name="peta" class="form-control" id="peta" >
                        </div>
                        <div class="panel-footer">
                           <input type="submit" class="btn btn-success" name="btnpeta" value='simpan'></button>
                        </div>
                      </div>
                    </div>
                  </form>
                <hr>
                   
                    <form action="" method="POST" enctype="multipart/form-data" name="home">
                    <div class="col-lg-6">
                      <div class="panel panel-default" align="center">
                        <div class="panel-heading">
                            <h4 class="panel-title"> Halaman Home </h4>
                        </div>
                        <div class="panel-body">
                        
                            <div class="form-group">
                              <label class="control-label" for="home">
                                <?php echo"<img src='assets/images/$foto[home]' width='300' class='img img-rounded img-responsive'> ";?> 1024 x 250 px
                              </label>
                            </div>
                            <input type="file" name="home" class="form-control" id="home" >
                        </div>
                        <div class="panel-footer">
                         <input type="submit" class="btn btn-success" name="btnhome" value='simpan'></button>
                        </div>
                      </div>
                    </div>
                    </form>


                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-6">
                       <div class="panel panel-default" align="center">
                          <div class="panel-heading">
                              <h4 class="panel-title"> Slide 1 </h4>
                          </div>
                          <div class="panel-body">
                            <div class="form-group">
                              <label class="control-label" for="slide1">
                                <?php echo"<img src='assets/images/$foto[slide_1]' width='300' class='img img-rounded img-responsive'> ";?> 1024 x 250 px 
                              </label>
                            </div>
                            <input type="file" name="slide1" class="form-control" id="slide1" >
                          </div>
                          <div class="panel-footer">
                            <input type="submit" class="btn btn-success" name="btnslide1" value='simpan'></button>
                          </div>
                        </div>
                    </div>
                    </form>


                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-6">
                       <div class="panel panel-default" align="center">
                          <div class="panel-heading">
                              <h4 class="panel-title"> Slide 2 </h4>
                          </div>
                          <div class="panel-body">
                            <div class="form-group">
                              <label class="control-label" for="slide2">
                                <?php echo"<img src='assets/images/$foto[slide_2]' width='300' class='img img-rounded img-responsive'> ";?> 1024 x 250 px
                              </label>
                            </div>
                            <input type="file" name="slide2" class="form-control" id="slide2" >
                          </div>
                          <div class="panel-footer">
                            <input type="submit" class="btn btn-success" name="btnslide2" value='simpan'></button>
                          </div>
                        </div>
                    </div>
                    </form>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-6">
                     <div class="panel panel-default" align="center">
                        <div class="panel-heading">
                            <h4 class="panel-title"> Slide 3 </h4>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="control-label" for="slide3">
                              <?php echo"<img src='assets/images/$foto[slide_3]' width='300' class='img img-rounded img-responsive'> ";?> 1024 x 250 px
                            </label>
                          </div>
                          <input type="file" name="slide3" class="form-control" id="slide3" >
                        </div>
                        <div class="panel-footer" align="center">
                          <input type="submit" class="btn btn-success" name="btnslide3" value='simpan'></button>
                        </div>
                      </div>
                    </div>
                    </form>
                    

                    

                    
                </div>
              </div>
              
            
            </div>
            </div>
          </div>
        </div>

        <?php
        $folder  = '../../assets/images/';
       

        $file_type    = array('jpg','jpeg','png');
        @$max_size     = 100000000; // 10MB

        if(isset($_POST['btnhome']))
        {
          @$file_name = $_FILES['home']['name'];
          @$file_size = $_FILES['home']['size'];


          $filehome       = "slide-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['home']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto  set home   = '$filehome' ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }

        }
        elseif (isset($_POST['btnslide1']))
        {
          @$file_name = $_FILES['slide1']['name'];
          @$file_size = $_FILES['slide1']['size'];


          $filehome       = "slide-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['slide1']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto  set slide_1   = '$filehome' ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
        elseif (isset($_POST['btnslide2']))
        {
          @$file_name = $_FILES['slide2']['name'];
          @$file_size = $_FILES['slide2']['size'];


          $filehome       = "slide-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['slide2']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto  set slide_2   = '$filehome' ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
        elseif (isset($_POST['btnslide3']))
        {
          @$file_name = $_FILES['slide3']['name'];
          @$file_size = $_FILES['slide3']['size'];


          $filehome       = "slide-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['slide3']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto  set slide_3   = '$filehome' ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
        elseif (isset($_POST['btnbupati']))
        {
          @$namabupati = $_POST[namabupati];
          @$file_name = $_FILES['bupatifoto']['name'];
          @$file_size = $_FILES['bupatifoto']['size'];


          $filehome       = "foto-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['bupatifoto']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto  set bupati  = '$filehome', nama_bupati = '$namabupati' ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
        elseif (isset($_POST['btnwabup']))
        {
          @$namabupati = $_POST[namawakil];
          @$file_name = $_FILES['wabupfoto']['name'];
          @$file_size = $_FILES['wabupfoto']['size'];


          $filehome       = "foto-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['wabupfoto']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto  set wabup  = '$filehome', nama_wakil = '$namabupati' ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
        elseif (isset($_POST['btnkepsek']))
        {
          @$namabupati = $_POST[namakepsek];
          @$file_name = $_FILES['kepsek']['name'];
          @$file_size = $_FILES['kepsek']['size'];


          $filehome       = "foto-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['kepsek']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto  set foto_kepsek  = '$filehome'");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
         elseif (isset($_POST['btnlogo']))
        {
         
          @$file_name = $_FILES['logo']['name'];
          @$file_size = $_FILES['logo']['size'];


          $filehome       = "foto-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['logo']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto set logo_sekolah  = '$filehome'  ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
        elseif (isset($_POST['btnpeta']))
        {
         
          @$file_name = $_FILES['peta']['name'];
          @$file_size = $_FILES['peta']['size'];


          $filehome       = "foto-".round(microtime(true)).".".end($file_type);
          @$sumber        = $_FILES['peta']['tmp_name'];
          $upload         = move_uploaded_file($sumber, $folder .$filehome);

          if($upload)
          {
            $tambahberita = $con->query("update tbl_foto set logo_provinsi  = '$filehome'  ");   
            echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
          }
          else
          {
            echo"upload gagal";
          }
        }
        elseif (isset($_POST['btnUpload']))
        {
          @$nsekolah    = $_POST[namasekolah];
          @$alamat      = $_POST[alamat];
          @$npsn        = $_POST[npsn];
          @$nkepsek     = $_POST[namakepsek];
          @$kel         = $_POST[kel];
          @$kec         = $_POST[kec];
          @$kota        = $_POST[kota];
          @$prov        = $_POST[prov];
          @$alamat      = $_POST[alamat];
          @$email       = $_POST[email];
          @$telp        = $_POST[telp];
          @$skin        = $_POST[skin];

          $ubahinfo = $con->query("update tbl_foto set
                                  nama_kepsek   = '$nkepsek',
                                  nama_sekolah  = '$nsekolah',
                                  npsn          = '$npsn',
                                  alamat_sekolah= '$alamat',
                                  email_sekolah = '$email',
                                  telp_sekolah  = '$telp',
                                  kelurahan     = '$kel',
                                  kecamatan     = '$kec',
                                  provinsi      = '$prov',
                                  kota          = '$kota',
                                  skin          = '$skin'
                                  where id = $foto[id]


            ");

         
          echo"<meta http-equiv='refresh' content='0.2;?page=Setting Info Sekolah'>";
        }
        
      ?>
    