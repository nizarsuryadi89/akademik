<?php
  session_start();
  include "../session_login.php";
//error_reporting(0);
  include   "../../configakademik.php";
  include   "../../assets/fungsi/fungsi_indotgl.php";
?>
<head>
   <link rel="stylesheet" type="text/css" href="style_table.css" />
    <link href="style.css" rel="stylesheet" type="text/css" href="includes/style.css">
   <link rel="stylesheet" href="../../include/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<?php
  include "cover.php";

  $datasiswa = $con->query("select * from tbl_guru a inner join
                               tbl_tahun b on a.tmt=b.tahun_id inner join 
                                tbl_pendidikan c on a.guru_pendidikan =c.pendidikan_id");

?>
<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
             
              <div class="panel-heading">
              <h5 class="panel-title" align="center">Pembagian Jam Guru Mata Pelajaran</h5> <hr>
               
              </div>
            </div>
           
            
            <div class="panel-body">
               
            <table width="100%" class="table table-striped table-bordered table-hover">
           
              <tr>
                  <th>No</th>
                  <th width='30%'>Nama Guru</th>
                  <th width='50%'>Pelajaran</th>
                  <th>Jumlah Jam - Per Minggu</th>
                  
              </tr>
          
          <?php 
            $no=1;
            $warna1   = "lightgrey";   // baris genap berwarna hijau tua
            $warna2   = "white";   // baris ganjil berwarna hijau muda
            $warna    = $warna1;     // warna default
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
                $pelajaran = $con->query("select * from tbl_mapelrombel a inner join 
                                    tbl_mapel b on a. mapel_id=b.mapel_id inner join 
                                      tbl_rombel c on a.rombel_id=c.rombel_id
                                        where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $aa[guru_id] 
                                          order by c.kelas_id desc");
                

                @$jml = $con->query("select sum(mapel_jam) as jmll from tbl_mapelrombel a inner join 
                                    tbl_mapel b on a. mapel_id=b.mapel_id inner join 
                                      tbl_rombel c on a.rombel_id=c.rombel_id
                                        where c.semester_id=$semester and c.tahun_id=$tahun and guru_id = $aa[guru_id] 
                                          order by c.kelas_id desc");
                @$jm   = $jml->fetch_assoc();
                @$jumlah = $jm[jmll];
                echo"
                <tr bgcolor='$warna' valign='top'>
                    <td>$no</td>
                    <td>$aa[guru_nama]</td>
                    <td>
                    ";
                    $no=1;
                    while ($pel= $pelajaran->fetch_array())
                    {
                      echo " $no . $pel[mapel_nama]  &nbsp; - &nbsp; -  $pel[mapel_jam] &nbsp; - &nbsp; - Kelas : $pel[rombel_nama]   <br>"; 
                      $no++; 
                    }
                    echo"
                    </td>
                    <td align='center'>$jumlah - Jam</td>
                   
                </tr>";
                $no++;
                @$total = $total+$jumlah;
            }
          ?>
              
          
      </table>
                    
               
              </div>
            </div>
          </div>

          
         
        </div>
    