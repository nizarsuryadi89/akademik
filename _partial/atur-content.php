<?php
        if ((@$_GET['page'] == '') || ($_GET['page']=='Dashboard'))
        {
            include "pages/info.php";
        }
        elseif ($_GET['page']=='Data Siswa Aktif')
        {
            include "pages/siswa/data-siswa.php";
        }
        elseif ($_GET['page']=='Data Alumni')
        {
            include "pages/siswa/data-alumni.php";
        }
        elseif ($_GET['page']=='Transkrip Nilai')
        {
            include "pages/nilai/master-transkrip-nilai.php";
        }
        elseif ($_GET['page']=='edit-transkrip-nilai')
        {
            include "pages/nilai/edit-transkrip-nilai.php";
        }
        elseif ($_GET['page']=='input-transkrip')
        {
            include "pages/nilai/input-transkrip.php";
        }
        elseif ($_GET['page']=='Data Guru')
        {
            include "pages/guru/dataguru.php";
        }
         elseif ($_GET['page']=='Data Tenaga Kependidikan')
        {
            include "pages/tu/datatu.php";
        }
         elseif ($_GET['page']=='nilai-us')
        {
            include "pages/nilai/nilaius.php";
        }
        elseif ($_GET['page']=='Rombongan Belajar')
        {
            include "pages/rombel/data-rombel.php";
        }
        elseif ($_GET['page']=='tambah-rombel')
        {
            include "pages/rombel/tambah-rombel.php";
        }
        elseif ($_GET['page']=='Praktik Kerja Industri')
        {
            include "pages/prakerin/data-prakerin.php";
        }
        elseif ($_GET['page']=='Edit Data Praktik Kerja Industri')
        {
            include "pages/prakerin/edit-data-prakerin.php";
        }
         elseif ($_GET['page']=='Berita')
        {
            include "pages/blog/databerita.php";
        }
        elseif ($_GET['page']=='Agenda Kegiatan')
        {
            include "pages/blog/data-agenda.php";
        }
         elseif ($_GET['page']=='Input Berita')
        {
            include "pages/blog/tambahberita.php";
        }
        elseif ($_GET['page']=='raport-pas')
        {
            include "pages/report/raport-pas.php";
        }
         elseif ($_GET['page']=='mapel-rombel')
        {
            include "pages/pelajaran/mapel-rombel.php";
        }
        elseif ($_GET['page']=='input-nlai-us')
        {
            include "pages/nilai/data-nilai-us.php";
        }
        elseif ($_GET['page']=='input-nilai-pengetahuan')
        {
            include "pages/nilai/input-nilai-pengetahuan.php";
        }
         elseif ($_GET['page']=='input-nilai-keterampilan')
        {
            include "pages/nilai/input-nilai-keterampilan.php";
        }
         elseif ($_GET['page']=='Edit Data Siswa')
        {
            include "pages/siswa/edit-data-siswa.php";
        }
         elseif ($_GET['page']=='print-data-siswa')
        {
            include "pages/cetak/print-data-siswa.php";
        }
         elseif ($_GET['page']=='peserta-rombel')
        {
            include "pages/rombel/peserta-rombel.php";
        }
         elseif ($_GET['page']=='Data User GTK')
        {
            include "pages/user/data-user-gtk.php";
        }
        elseif ($_GET['page']=='Data User Siswa')
        {
            include "pages/user/data-user-siswa.php";
        }
        elseif ($_GET['page']=='Data Pelajaran')
        {
            include "pages/pelajaran/datapelajaran.php";
        }
         elseif ($_GET['page']=='edit-pelajaran')
        {
            include "pages/pelajaran/edit-pelajaran.php";
        }
         elseif ($_GET['page']=='cetak-transkrip-nilai')
        {
            include "pages/cetak/cetak-transkrip-nilai.php";
        }
        elseif ($_GET['page']=='input-nilai-un')
        {
            include "pages/nilai/input-nilai-un.php";
        }
         elseif ($_GET['page']=='nilai-un')
        {
            include "pages/nilai/nilai-un.php";
        }
         elseif ($_GET['page']=='cetak-nilai-un')
        {
            include "pages/cetak/cetak-nilai-un.php";
        }
         elseif ($_GET['page']=='gettranskrip')
        {
            include "pages/nilai/gettranskrip.php";
        }
         elseif ($_GET['page']=='cetak-raport-pat')
        {
            include "pages/cetak/cetak-raport-pat.php";
        }
         elseif ($_GET['page']=='pembelajaran-rombel')
        {
            include "pages/rombel/pembelajaran-rombel.php";
        }
        elseif ($_GET['page']=='info-user')
        {
            include "pages/info-user.php";
        }
         elseif ($_GET['page']=='Data PPDB')
        {
            include "pages/siswa/data-ppdb.php";
        }
        elseif ($_GET['page']=='tambah-mapel-rombel')
        {
            include "pages/pelajaran/tambah-mapel-rombel.php";
        }
        elseif ($_GET['page']=='edit-data-ppdb')
        {
            include "pages/siswa/edit-data-ppdb.php";
        }
         elseif ($_GET['page']=='Funisment')
        {
            include "pages/point/data-funisment.php";
        }
        elseif ($_GET['page']=='Reward')
        {
            include "pages/point/data-reward.php";
        }
        elseif ($_GET['page']=='setting-data-gallery')
        {
            include "pages/setting/setting-data-gallery.php";
        }
         elseif ($_GET['page']=='Data User Alumni')
        {
            include "pages/user/data-user-alumni.php";
        }
        elseif ($_GET['page']=='Setting Info Sekolah')
        {
            include "pages/setting/setting-foto.php";
        }
        elseif ($_GET['page']=='data-pembayaran-siswa')
        {
            include "pages/keuangan/data-pembayaran-siswa.php";
        }
        elseif ($_GET['page']=='transaksi-pembayaran')
        {
            include "pages/keuangan/transaksi_pembayaran.php";
        }
        elseif ($_GET['page']=='Kompetensi Keahlian')
        {
            include "pages/referensi/read-kompetensi.php";
        }
         elseif ($_GET['page']=='Tahun Akademik')
        {
            include "pages/referensi/read-tahunakademik.php";
        }
        elseif ($_GET['page']=='Jam Mengajar Guru')
        {
            include "pages/pelajaran/jumlah-jam.php";
        }
        elseif ($_GET['page']=='Pesan')
        {
            include "pages/pesan/pesan.php";
        }
        elseif ($_GET['page']=='Compose')
        {
            include "pages/pesan/buat-pesan.php";
        }
         elseif ($_GET['page']=='Kurikulum')
        {
            include "pages/akademik/kurikulum.php";
        }
        elseif ($_GET['page']=='Artikel')
        {
            include "pages/blog/data-artikel.php";
        }
         elseif ($_GET['page']=='Edit Artikel')
        {
            include "pages/blog/edit-artikel.php";
        }
         elseif ($_GET['page']=='Tambah Artikel')
        {
            include "pages/blog/tambah-artikel.php";
        }
        elseif ($_GET['page']=='Agenda Harian')
        {
            include "pages/akademik/agenda-harian.php";
        }
         elseif ($_GET['page']=='Edit Data Guru')
        {
            include "pages/guru/edit-data-guru.php";
        }
        elseif ($_GET['page']=='Data Guru')
        {
            include "pages/guru/data-guru.php";
        }
        elseif ($_GET['page']=='Edit Data Tu')
        {
            include "pages/tu/edit-data-tu.php";
        }
        elseif ($_GET['page']=='Data Tu')
        {
            include "pages/tu/datatu.php";
        }
        elseif ($_GET['page']=='Legger')
        {
            include "pages/rombel/legger.php";
        }
        elseif ($_GET['page']=='cetak-raport-pas')
        {
            include "pages/cetak/cetak-raport-pas.php";
        }
        elseif ($_GET['page']=='cetak-raport-pas-k13')
        {
            include "pages/cetak/cetak-raport-pas-k13.php";
        }
         elseif ($_GET['page']=='cetak-raport-pat-k13')
        {
            include "pages/cetak/cetak-raport-pas-sms2-k13.php.php";
        }
       
        elseif ($_GET['page']=='cetak-legger')
        {
            include "pages/cetak/cetak-legger.php";
        }
        elseif ($_GET['page']=='cetak-raport-pas-sms1-k13')
        {
            include "pages/cetak/cetak-raport-pas-sms1-k13.php";
        }
        elseif ($_GET['page']=='cetak-raport-pas-sms2-k13')
        {
            include "pages/cetak/cetak-raport-pas-sms2-k13.php";
        }
        elseif ($_GET['page']=='cetak-deskripsi-pat-k13')
        {
            include "pages/cetak/cetak-deskripsi-pat-k13.php";
        }
        elseif ($_GET['page']=='Cetak Raport')
        {
            include "pages/cetak/data-cetak-raport.php";
        }
        elseif ($_GET['page']=='cetak-raport-cover')
        {
            include "pages/cetak/raport-cover.php";
        }
         elseif ($_GET['page']=='Input Nilai USBN')
        {
            include "pages/nilai/input-nilai-usbn.php";
        }
        elseif ($_GET['page']=='Tambah Pelajaran')
        {
            include "pages/pelajaran/tambah-pelajaran-rombel.php";
        }
         elseif ($_GET['page']=='Print-Transkrip-Nilai')
        {
            include "pages/cetak/cetak-transkrip.php";
        }
         elseif ($_GET['page']=='input-nilai-sikap')
        {
            include "pages/nilai/input-nilai-sikap.php";
        }
        elseif ($_GET['page']=='input-siswa')
        {
            include "pages/rombel/input-siswa.php";
        }
         elseif ($_GET['page']=='print-jumlahjam')
        {
            include "pages/pelajaran/print-jumlahjam.php";
        }
        elseif ($_GET['page']=='simpankeraport')
        {
            include "pages/nilai/simpankeraport.php";
        }
         elseif ($_GET['page']=='simpankeraportP')
        {
            include "pages/nilai/simpankeraportP.php";
        }
        elseif ($_GET['page']=='simpankeraportS')
        {
            include "pages/nilai/simpankeraportS.php";
        }
        elseif (@$_GET[page]=='cetak-raport-pat-sms2-k13')
        {
            include "pages/cetak/cetak-raport-pat-sms2-k13.php";
        }
        elseif (@$_GET[page]=='Input-Nilai-Ekskul')
        {
            include "pages/nilai/nilai-ekskul.php";
        }
        elseif (@$_GET[page]=='cetak-nilai-pengetahuan-kosong')
        {
            include "pages/nilai/cetak-nilai-pengetahuan-kosong.php";
        }
         elseif (@$_GET[page]=='cetak-nilai-pengetahuan-isi')
        {
            include "pages/nilai/cetak-nilai-pengetahuan-isi.php";
        }
        elseif (@$_GET[page]=='cetak-nilai-keterampilan-isi')
        {
            include "pages/nilai/cetak-nilai-keterampilan-isi.php";
        }
        elseif (@$_GET[page]=='cetak-nilai-keterampilan-kosong')
        {
            include "pages/nilai/cetak-nilai-keterampilan-kosong.php";
        }

        elseif (@$_GET[page]=='cetak-daftar-hadir-kosong')
        {
            include "pages/nilai/cetak-daftar-hadir-kosong.php";
        }
        elseif (@$_GET[page]=='list-siswa')
        {
            include "pages/nilai/list-siswa.php";
        }
        elseif (@$_GET[page]=='edit-kkm')
        {
            include "pages/pelajaran/edit-kkm.php";
        }
        elseif (@$_GET[page]=='Transkrip-Nilai')
        {
            include "pages/nilai/transkrip-nilai.php";
        }

        else
        {
            include "pages/error404.php";
        }
        


?>                   