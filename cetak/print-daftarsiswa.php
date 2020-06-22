<?php
error_reporting(0);
  include   "../../configakademik.php";
  include   "../../assets/fungsi/fungsi_indotgl.php";
?>
<head>
   <link rel="stylesheet" href="style_table.css">

</head>
<body>
<?php
  include "cover.php";
?>
<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
             
              <div class="panel-heading">
              <h5 class="panel-title">DATA SISWA AKTIF</h5> <hr>
               
              </div>
            </div>
           
            
            <div class="panel-body">
               
                    <?php
                    	$datasiswa = $con->query("select * from tbl_siswa a left join tbl_orangtua b on a.siswa_id=b.siswa_id WHERE siswa_aktif='A'");
                    ?>
                    <table class="laporan" border='1'>
                        <thead>
                            <tr bgcolor="grey">
                                <th>NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>JK</th>
                                
                                <th>NISN</th>
                                                                
                                <th>Tempat,Tgl Lahir</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Pekerjaan <br>Orang Tua</th>
                                <th>Foto</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $warna1   = "lightgrey";   // baris genap berwarna hijau tua
                          $warna2   = "white";   // baris ganjil berwarna hijau muda
                          $warna    = $warna1;     // warna default
                          $no = 1;
                        	while ($aa=$datasiswa->fetch_array())
                        	{
                            if($warna == $warna1)
                              {
                                $warna = $warna2;
                              }
                              else 
                              {
                                $warna = $warna1;
                              }
                                @$id = $aa[siswa_id];
                            	echo"
                    	       <tr bgcolor=$warna>
                                 
                    	            <td>$no</td>
                                  <td onclick=\"location.href='?page=data-siswa&kat=info&kdsiswa=$id'\">$aa[siswa_nama]</a></td>
                                  <td>$aa[siswa_jk]</td>
                                  
                                  <td>$aa[siswa_nisn]</td>
                                                    	            
                    	            <td>$aa[siswa_tempatlahir]," .tgl_indo($aa['siswa_tanggallahir'])."</td>
                                  <td>$aa[ortu_namaayah]</td>
                                  <td>$aa[ortu_namaibu]</td>
                                  <td>$aa[ortu_pekerjaanayah]</td>
                                   <td>$aa[siswa_foto]</td>
                    	            
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
    