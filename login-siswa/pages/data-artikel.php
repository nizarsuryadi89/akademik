 <?php
    if (@$_GET[aksi]=='hapus')
    {
      @$kode   = $_GET[kdberita];
      @$hapus  = $con->query("delete from tbl_artikel where id_berita=$kode");
    }
 ?>
<div class="row">
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a href="?page=Dashboard"><button type='button'  class='btn btn-warning'><i class="fa fa-backward"></i></button></a>
      <a href="?page=Tambah Artikel"><button type='button'  class='btn btn-success'><i class="fa fa-plus"></i></button></a>
      <a href="?page=Cetak Artikel"><button type='button'  class='btn btn-primary'><i class="fa fa-print"></i></button></a>
    </div>
      <div class="panel-body">
        <div class="table table-responsive">
          <?php
            $datasiswa = $con->query("SELECT * FROM tbl_artikel  where penulis='$nama' order by id_berita desc ");
          ?>
          <table  id="example1" class="table table-striped table-bordered table-hover" ">
              <thead>
                  <tr>
                      <th width='8%'>N0</th>
                      <th width="30%">Judul Artikel</th>
                     
                      <th>Tanggal Posting</th>
                      <th>Nama Penulis</th>
                      
                      <th>Gambar</th>
                      <th>AKSI</th>
                  </tr>
              </thead>
              <tbody>
              <?php 
                $no=1;
                while ($aa=$datasiswa->fetch_array())
                {
                    echo"
                    <tr class='odd gradeX'>
                        <td>$no</td>
                        <td>$aa[judul]</td>
                       
                        <td>" .tgl_indo($aa['tanggal'])."</td>
                        <td>$aa[penulis]</td>
                        <td align='center'><img src='../assets/berita/$aa[gambar]' class='img-rounded zoom' width='100' height='70'>
                        </td>
                        <td align='center'>
                            <a href='?page=edit-artikel&kode=$aa[id_berita]'><button class='btn btn-success'> <i class='fa fa-edit'></i></button>
                            </a>   &nbsp;
                            <a href='?page=data-artikel&aksi=hapus&kode=$aa[id_berita]' > <button class='btn btn-danger'> <i class='fa fa-trash'></i></button>
                          </td>
                    </tr>";
                $no++;
                }

              ?>
              </tbody>
          </table>
      
      
     </div>
  </div>
  </div>
  

  

