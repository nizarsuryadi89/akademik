<dl>
    <dt>Nama Lengkap</dt>
    <dd><?php echo"$af[guru_nama]"?></dd>
    <dt>NUTPK/PEG ID</dt>
    <dd><?php echo"$af[guru_nuptk]";?></dd>
    <dt>Tempat/Tanggal Lahir</dt>
    <dd><?php echo"$af[guru_tempatlahir] /" .tgl_indo(@$af[guru_tgllahir]). "";?></dd>
    <dt>Alamat</dt>
    <dd><?php echo"$af[guru_alamat] <br> <b>HP :</b> $af[guru_hp] <b>email :</b> $af[guru_email]" ;?>
    </dd>
    <dt>TMT SMK NU</dt>
    <dd><?php echo"$af[tahun] - $af[no_sk]";?></dd>
    <dt>Pendidikan Terakhir</dt>
    <dd><?php echo"$af[pendidikan_jenjang] - $af[guru_jurusan]";?></dd>
    <hr>
    <dt>IP Address / Device Name</dt>
    <dd><?php echo"$ip / $hostname";?></dd>
</dl>