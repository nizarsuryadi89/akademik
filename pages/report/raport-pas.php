 <?php 
    //error_reporting(0);
    if (@$_GET['print-raport']=='Y')
    {
        @$kodesiswa     = $_GET['siswa-nis'];
        $datasiswa      = $con->query("select * from tbl_siswa a inner join tbl_pesertarombel b 
                                        on a.siswa_id=b.siswa_id inner join tbl_rombel c 
                                            on b.rombel_id=c.rombel_id inner join tbl_program d 
                                                on c.program_id=d.program_id
                                                    where c.tahun_id= $tahun && c.semester_id=$semester && a.siswa_id=$kodesiswa");
        $dt             = $datasiswa->fetch_assoc();
        @$prog          = $dt[program_id];
        @$rombel        = $dt[rombel_id];
        @$program_kode  = $dt[program_kode];
        @$programnama   = $dt[program_alias];
        //echo"$rombel";
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-3">Nama Sekolah </div><div class="col-lg-5">: SMK Nahdlatul Ulama</div>
                        </div>
                         <div class="row">
                            <div class="col-lg-3">Alamat Sekolah </div><div class="col-lg-5">: Jl. Argasari No.32</div>
                        </div>
                         <div class="row">
                            <div class="col-lg-3">Nama Siswa </div><div class="col-lg-5">: <?php echo"$dt[siswa_nama]";?></div>
                        </div>
                         <div class="row">
                            <div class="col-lg-3">No Induk/NISN </div><div class="col-lg-5">: <?php echo"$dt[siswa_nis] / $dt[siswa_nisn]";?></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4">Kelas </div><div class="col-lg-6">: SMK Nahdlatul Ulama</div>
                        </div>
                         <div class="row">
                            <div class="col-lg-4">Semester </div><div class="col-lg-5">: <?php echo" $ad[semester_nama]";?></div>
                        </div>
                         <div class="row">
                            <div class="col-lg-4">Tahun Pelajaran</div><div class="col-lg-5">: <?php echo"$as[tahun_ajaran]";?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">Kompetensi Keahlian</div><div class="col-lg-6">: <?php echo"$program_kode / $programnama";?></div>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
            <hr>
                <div class="col-lg-10">
                    <div class="row">
                        <p> Capaian Hasil Belajar</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">A. Sikap</h3>
                            </div>
                            <div class="panel-body">
                                <?php echo "nilai sikap";?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">B. Pengetahuan dan Keterampilan</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="10">No</th>
                                            <th rowspan="2" align="center">Mata Pelajaran</th>
                                            <th colspan="4">Pengetahuan</th>
                                            <th colspan="4">Keterampilan</th>
                                        </tr>
                                        <tr>
                                            <th>KB</th>
                                            <th>Angka</th>
                                            <th>Predikat</th>
                                            <th>Deskripsi</th>
                                            <th>KB</th>
                                            <th>Angka</th>
                                            <th>Predikat</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="10" align="center">Kelompok Wajib A (Wajib)</td>
                                    </tr>
                                <?php 
                                    @$no1    = 1;
                                    $mapelwajiba = $con->query("select * from tbl_mapel  a inner join tbl_mapelrombel b on a.mapel_id=b.mapel_id where mapel_kode like'A%' and kur_id='2' and b.rombel_id='$rombel'");
                                    
                                    while ($aa = $mapelwajiba->fetch_array())
                                    { 
                                        echo"
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>$aa[mapel_nama] - $aa[kkm]</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        ";
                                       @$no++;
                                    }
                                ?>
                                        <tr>
                                            <td colspan="10" align="center">Kelompok Wajib B (Wajib)</td>
                                        </tr>
                                <?php 
                                    $mapelwajibb = $con->query("select * from tbl_mapel  a inner join tbl_mapelrombel b on a.mapel_id=b.mapel_id where mapel_kode like'B%' and kur_id='2' and b.rombel_id='$rombel'");
                                    while ($aa = $mapelwajibb->fetch_array())
                                    {
                                        echo"
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>$aa[mapel_nama] - $aa[kkm]</td>
                                        </tr>
                                        ";
                                        @$no++;
                                    }
                                ?>
                                        <tr>
                                            <td colspan="10" align="center">Kelompok Wajib C (Peminatan)</td>
                                        </tr>
                                 <?php 
                                    $program        = 1;
                                    $mapelpeminatan = $con->query("select * from tbl_mapel a inner join tbl_mapelrombel b on a.mapel_id=b.mapel_id where  mapel_kode like 'C%' and kur_id='2' and b.rombel_id='$rombel' ");

                                    while ($aa = $mapelpeminatan->fetch_array())
                                    {
                                        echo"
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>$aa[mapel_nama] - $aa[kkm]</td>
                                        </tr>
                                        ";
                                        @$no++;
                                    }
                                ?>
                                        <tr>
                                            <td colspan="10" align="center">Muatan Lokal</td>
                                        </tr>
                                 <?php 
                                    $mapelwajibb = $con->query("select * from tbl_mapel a inner join tbl_mapelrombel b on a.mapel_id=b.mapel_id where mapel_kode like 'M%' and kur_id='2' and b.rombel_id='$rombel' ");
                                    while ($aa = $mapelwajibb->fetch_array())
                                    {
                                        echo"
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>$aa[mapel_nama] - $aa[kkm] </td>
                                        </tr>
                                        ";
                                        @$no++;
                                    }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button onclick="myFunction()">Print Raport</button>
                    <script>
                        function myFunction() {
                            window.print();
                        }
                    </script>
            </div>
        </div>
       
    </div>


     
<?php        
    }
else
{
?>
    <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php
            $datasiswa = $con->query("select * from tbl_siswa where siswa_aktif='A' order by siswa_nis asc");
        ?>
        <table width="100%" class="table table-striped table-bordered table-hover">
            <thead>
                <tr bgcolor="lightgrey">
                    <th>No</th>
                    <th width='5%'>NIS</th>
                    <th width='10%'>NISN</th>
                    <th>NAMA LENGKAP</th>
                    <th>P/L</th>
                    <th>Tempat,Tgl Lahir</th>
                    <th width='10%'>Cetak Raport</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $no  = 1;
                while ($aa=$datasiswa->fetch_array())
                {
                    echo"
                    <tr class='odd gradeX'>
                      <td>$no</td>
                        <td>$aa[siswa_nis]</td>
                      <td>$aa[siswa_nisn]</td>
                        <td>$aa[siswa_nama]</td>
                        <td>$aa[siswa_jk]</td>
                        <td>$aa[siswa_tempatlahir],$aa[siswa_tanggallahir]</td>
                        <td align='center'>
                            <a href='?page=raport-pas&print-raport=Y&siswa-nis=$aa[siswa_id]' class='view-record' data-id='$aa[siswa_id]' ><span class='glyphicon glyphicon-print'></span>
                            </a>
                        </td>
                    </tr>";
                  $no++;
                }
            ?>
            </tbody>
        </table> 
</div>  
<?php
}
?>

