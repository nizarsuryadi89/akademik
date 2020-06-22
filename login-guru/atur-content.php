<?php
 // error_reporting(0);

        if ((@$_GET['page'] == '') || ($_GET['page']=='Dashboard'))
        {
            include "pages/pelajaran/data-pelajaran.php";
        }
       else if ($_GET['page']=='ganti-password')
       {
           include "pages/gantipass.php";
       }
        else if ($_GET['page']=='data-pelajaran')
       {
           include "pages/pelajaran/data-pelajaran.php";
       }
       
        else if ($_GET['page']=='input-nilai-pengetahuan')
       {
           include "pages/pelajaran/input-nilai-pengetahuan.php";
       }
       else if ($_GET['page']=='input-nilai-keterampilan')
       {
           include "pages/pelajaran/input-nilai-keterampilan.php";
       }
        else if ($_GET['page']=='input-nilai-sikap')
       {
           include "pages/pelajaran/input-nilai-sikap.php";
       }
        else if ($_GET['page']=='agenda-harian')
       {
           include "pages/agenda/agenda-harian.php";
       }
        else if ($_GET['page']=='edit-agenda')
       {
           include "pages/agenda/edit-agenda.php";
       }
        else if ($_GET['page']=='tambah-agenda')
       {
           include "pages/agenda/tambah-agenda.php";
       }
        else if ($_GET['page']=='data-artikel')
       {
           include "pages/artikel/data-artikel.php";
       }
        else if ($_GET['page']=='tambah-artikel')
       {
           include "pages/artikel/tambah-artikel.php";
       }
        else if ($_GET['page']=='edit-artikel')
       {
           include "pages/artikel/edit-artikel.php";
       }
        else if ($_GET['page']=='ki-kd')
       {
           include "pages/pelajaran/ki-kd.php";
       }
       else if ($_GET['page']=='data-ki-kd')
       {
           include "pages/pelajaran/data-ki-kd.php";
       }
       else if ($_GET['page']=='dok-akademik')
       {
           include "pages/pelajaran/dok-akademik.php";
       }
        else if ($_GET['page']=='info')
       {
           include "pages/info.php";
       }
        else if ($_GET['page']=='input-nilai-usbn')
       {
           include "pages/pelajaran/input-nilai-usbn.php";
       }
        else if ($_GET['page']=='simpankeraportP')
       {
           include "pages/pelajaran/simpankeraportP.php";
       }
       else if ($_GET['page']=='simpankeraportK')
       {
           include "pages/pelajaran/simpankeraportK.php";
       }
        else if ($_GET['page']=='simpankeraportS')
       {
           include "pages/pelajaran/simpankeraportS.php";
       }
       else if ($_GET['page']=='cetak-raport')
       {
           include "pages/pelajaran/cetak-raport.php";
       }
        else if ($_GET['page']=='cetak-raport-pas-k13')
       {
           include "pages/cetak/cetak-raport-pas-k13.php";
       }
        else if ($_GET['page']=='cetak-raport-pas-sms1-k13')
       {
           include "pages/cetak/cetak-raport-pas-sms1-k13.php";
       }
        else if ($_GET['page']=='cetak-raport-pat-sms2-k13')
       {
           include "pages/cetak/cetak-raport-pas-sms2-k13.php";
       }
       else if ($_GET['page']=='cetak-nilai-pengetahuan-isi')
       {
           include "pages/cetak/cetak-nilai-pengetahuan-isi.php";
       }
       else if ($_GET['page']=='cetak-nilai-keterampilan-isi')
       {
           include "pages/cetak/cetak-nilai-keterampilan-isi.php";
       }
        else if ($_GET['page']=='nilai-ekskul')
       {
           include "pages/nilai/nilai-ekskul.php";
       }
        else if ($_GET['page']=='nilai-prakerin')
       {
           include "pages/nilai/nilai-prakerin.php";
       }
        else if ($_GET['page']=='catatan-walikelas')
       {
           include "pages/nilai/catatan-walikelas.php";
       }
       else if ($_GET['page']=='nilai-kehadiran')
       {
           include "pages/nilai/nilai-kehadiran.php";
       }
       else if ($_GET['page']=='mapel-rombel')
       {
           include "pages/nilai/mapel-rombel.php";
       }
       else
       {
           include "pages/error404.php";
       }
?>                    