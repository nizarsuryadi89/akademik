<?php
error_reporting(0);
    include "../config.php";
    if (@$_GET[kat] == 'hapuslist')
    {
        $rombel     = $_GET[rombelkode];
        $mapel      = $_GET[mapelkd]; 
        $semester   = $_GET[sms];
        $guru       = $_GET[guru];
        $kkm        = $_GET[kkm];

       
        if ($semester == 1)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms1 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=1'>";
        }
        elseif ($semester == 2)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms2 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=2'>";
        }
        elseif ($semester == 3)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms3 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=3'>";
        }
          elseif ($semester == 4)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms4 where nilai_id = $id");
           echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=4'>";
        }
          elseif ($semester == 5)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms5 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=5'>";
        }
          elseif ($semester == 6)
        {
            $id = $_GET[id];
            $hapus = $con->query("delete from tbl_transkrip_sms6 where nilai_id = $id");
            echo "<meta http-equiv='refresh' content='0.2;URL=../?page=list-siswa&mapel-kd=$mapel&rombel-kd=$rombel&guru=$guru&kkm=$kkm&semester=6'>";
        }
    }
?>