<?php
	//echo"$kd";
?>
<div class="col-lg-3">
	 <div class="panel panel-default">
		    <div class="panel-heading">
		        <?php echo"$af[guru_nama]";?>
		    </div>
		    <div class="panel-body">
		        <div class="thumbnail">
		        <?php echo"<img src='../foto-guru/$af[guru_foto]'  width='130' height='150'>"?>
		        </div>
		    </div>
	 </div>
</div>

  <div class="col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading">
           GANTI PASSWORD
        </div>
        <div class="panel-body">
            <form action='' method='POST'>
            	<div class="form-group">
            		<label for="inputPassword3">Username</label><input type="text"  name='username' class="form-control" id="inputPassword3" value="<?php echo"$username"?>">
	            	<div class="form-group">

            		<label for="inputPassword3">Password</label><input type="password"  name='password' class="form-control" id="inputPassword3" placeholder="Password Baru">
	            	<div class="form-group">
	            </div>
				<div >
					<button type="submit" name='ganti' value='ganti' class="btn btn-default">Ganti Password</button>
				</div>
					  
            </form>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
</div>
<?php
	if (@$_POST[ganti]=='ganti')
	{
		$gantipass = $con->query("update user set 
			username = '$_POST[username]',
			password = '$_POST[password]' 
			where id_user =  $kd ");
	?>
	<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Password sudah diganti <a href="content.php?page=info-user" class="alert-link">Kembali</a>.
    </div>

 <?php		
	}
?>
