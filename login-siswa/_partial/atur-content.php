<?php
        if ((@$_GET['page'] == '') || ($_GET['page']=='Dashboard'))
        {
            include "pages/info.php";
        }
        elseif ($_GET['page']=='Transkrip Nilai')
        {
            include "pages/transkripk13.php";
        }
        elseif ($_GET['page']=='Data Artikel')
        {
            include "pages/data-artikel.php";
        }
        elseif ($_GET['page']=='Tambah Artikel')
        {
            include "pages/tambah-artikel.php";
        }
         elseif ($_GET['page']=='Edit Informasi Pribadi')
        {
            include "pages/edit-info-siswa.php";
        }
         elseif ($_GET['page']=='Pelajaran')
        {
            include "pages/pelajaran.php";
        }
        elseif ($_GET['page']=='Ganti Password')
        {
            include "pages/ganti-password.php";
        }
        elseif ($_GET['page']=='Point Siswa')
        {
            include "pages/point.php";
        }
        

?>                    