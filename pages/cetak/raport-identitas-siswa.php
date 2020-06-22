<?php
//$sekolah = $this->sekolah->get($sekolah_id);
//$setting = $this->settings->get(1);
//$s = $this->siswa->get($siswa_id);
?>
<br>
<div class="panel panel-default" align='center'>
  <div class="panel-body">
    <div class="text-center">
    <br>
    <h4>KETERANGAN TENTANG DIRI SISWA</h4><br>
  
    </div>
  <table width="100%" id="alamat" border='0'>
    <tr>
      <td style="width: 5%;">1.</td>
      <td style="width: 25%;padding:5px;">Nama Siswa (Lengkap)</td>
      <td style="width: 5%;">:</td>
      <td style="width: 65%"><?php echo "$siswa[siswa_nama]" ?></td>
    </tr>
    <tr>
      <td style="width: 5%;">2.</td>
      <td style="width: 25%;padding:5px;">Nomor Induk/NISN</td>
      <td style="width: 5%;">:</td>
      <td style="width: 65%"><?php echo "$siswa[siswa_nis] / $siswa[siswa_nisn]" ?></td>
    </tr>
    <tr>
      <td style="width: 5%;">3.</td>
      <td style="width: 25%;padding:5px;">Tempat, Tanggal Lahir</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[siswa_tempatlahir] / ".tgl_indo($siswa['siswa_tanggallahir']).""; ?></td>
    </tr>
    <tr>
      <td style="width: 5%;">4.</td>
      <td style="width: 25%;padding:5px;">Jenis Kelamin</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[siswa_jk]" ?></td>
    </tr>
    <tr>
      <td style="width: 5%;">5.</td>
      <td style="width: 25%;padding:5px;">Agama</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%">Islam</td>
    </tr>
    <tr>
      <td style="width: 5%;">6.</td>
      <td style="width: 25%;padding:5px;">Status dalam Keluarga</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"></td>
    </tr>
    <tr>
      <td style="width: 5%;">7.</td>
      <td style="width: 25%;padding:5px;">Anak Ke</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"></td>
    </tr>
    <tr>
      <td style="width: 5%;">8.</td>
      <td style="width: 25%;padding:5px;">Alamat Siswa</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[siswa_alamat]" ?></td>
    </tr>
    <tr>
      <td style="width: 5%;">9.</td>
      <td style="width: 25%;padding:5px;">Nomor Telepon Rumah</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"></td>
    </tr>
    <tr>
      <td style="width: 5%;">10.</td>
      <td style="width: 25%;padding:5px;">Sekolah Asal</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[siswa_asalsekolah]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">11.</td>
      <td style="width: 25%;padding:5px;">Diterima di sekolah ini</td>
      <td style="width: 5%">&nbsp;</td>
      <td style="width: 65%"><?php echo "$siswa[siswa_tahunmasuk]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">Di kelas</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%">X</td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">Pada tanggal</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%">18 Juli 2018</td>
    </tr>
    <tr>
      <td style="width: 5%;">12</td>
      <td style="width: 25%;padding:5px;">Nama Orang Tua</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%">&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">a. Ayah</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[ortu_namaayah]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">b. Ibu</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[ortu_namaibu]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">13.</td>
      <td style="width: 25%;padding:5px;">Alamat Orang Tua</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[ortu_alamat]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">Nomor Telepon Rumah</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[ortu_telp]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">14.</td>
      <td style="width: 25%;padding:5px;">Pekerjaan Orang Tua</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%">&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">a. Ayah</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[ortu_pekerjaanayah]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">b. Ibu</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"><?php echo "$siswa[ortu_pekerjaanibu]"?></td>
    </tr>
    <tr>
      <td style="width: 5%;">15.</td>
      <td style="width: 25%;padding:5px;">Nama Wali Siswa</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"></td>
    </tr>
    <tr>
      <td style="width: 5%;">16.</td>
      <td style="width: 25%;padding:5px;">Alamat Wali Siswa</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"></td>
    </tr>
    <tr>
      <td style="width: 5%;">&nbsp;</td>
      <td style="width: 25%;padding:5px;">Nomor Telepon Rumah</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"></td>
    </tr>
    <tr>
      <td style="width: 5%;">17.</td>
      <td style="width: 25%;padding:5px;">Pekerjaan Wali Siswa</td>
      <td style="width: 5%">:</td>
      <td style="width: 65%"></td>
    </tr>
  </table>
  <table width="100%" style="margin-top:70px;">
    <tr>
      <td style="width: 15%;padding:5px;" rowspan="5">
  	</td>
  	<td style="width: 15%;padding:5px;" rowspan="5">
  		<table width="100%" border="0">
  			<tr>
  				<td align="center"> 
              <?php 
                if (@$siswa[siswa_foto] <> '')
                {
                  echo"<img class='img-rounded' src='../img/foto-siswa/$siswa[siswa_foto]' width='100%' >"; 
                }
                else{
                  echo"<table>
                          <tr>
                              <td> Foto <br>3 x 4</td>
                          </tr>
                       </table>"; 
                }
              ?>
            </td>
  			</tr>
  		</table>
  	</td>
  	<td style="width: 15%;padding:5px;" rowspan="5">&nbsp;</td>
      <td style="width: 50%;padding:5px;">Tasikmalaya<br />Kepala Sekolah</td>
    </tr>
    <tr>
      <td style="width: 50%;padding:5px;">&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 50%;padding:5px;">&nbsp;</td>
    </tr>
    
    <tr>
      <td style="width: 50%;padding:5px;">Asep Susanto, S.Ag., M.Pd.I</td>
    </tr>
  </table>
  </div>
</div>