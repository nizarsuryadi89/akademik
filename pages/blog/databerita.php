 <?php
    if (@$_GET[aksi]=='hapus')
    {
      @$kode   = $_GET[kdberita];
      @$hapus  = $con->query("delete from tbl_berita where id_berita=$kode");
    }
 ?>
  <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
             <a href="#"><button class="btn btn-warning" type="button" data-target="#info" data-toggle="modal"><i class='glyphicon glyphicon-question-sign'></i> </button></a>
            <a href="?page=Input Berita"><button class="btn btn-success" ><i class="fa fa-plus"></i></button></a>
          </div>
          <div class="panel-body">
       
      
            <div class="table-responsive">
              <?php
              	$datasiswa = $con->query("SELECT * FROM tbl_berita order by id_berita desc limit 0,10");
              ?>
              <table  id="example1" class="table table-striped table-bordered table-hover" ">
                  <thead>
                      <tr>
                          <th width='8%'>N0</th>
                          <th width="30%">Judul Berita</th>
                         
                          <th>Tanggal Posting</th>
                          <th>Nama Pemosting</th>
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
                            <td align='center'><img src='../../assets/berita/$aa[gambar]' class='img-rounded' width='70' height='50'>
                            </td>
              	            <td align='center'>
                                <a href='# class='open_modal' id='$aa[id_berita]'><button class='btn btn-primary'> <span class='glyphicon glyphicon-edit'></button>
                                </a>   &nbsp;
                                <a href='?page=data-berita&aksi=hapus&kdberita=$aa[id_berita]' > <button class='btn btn-warning'> <span class='glyphicon glyphicon-trash'></button>
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
        </div>
      </div>
