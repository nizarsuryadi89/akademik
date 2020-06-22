  <div class="col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading">
           GANTI PASSWORD
        </div>
        <div class="panel-body">
            <form action='' method='POST'>
            	<div class="form-group">
            		<label for="inputPassword3">Username</label>
            		    <input type="text"  name='username' class="form-control" id="inputPassword3" value="<?php echo"$username"?>" readonly >
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
	    @$password       = $_POST[password];
	    @$username       = $_POST[username];

	    if ($password == '')
	    {
	    ?>
	    	<div class="alert alert-danger">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        Password Belum Diganti <a href="?page=ganti-password" class="alert-link">Terjadi Kesalahan</a>.
		    </div>
	    <?php
		}
	    else{
		$gantipass   = $con->query("update user set 
			                        password    =  '$password' 
		                            where username =   '$username' ");
		?>
		<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Password sudah diganti <a href="logout.php" class="alert-link">Silahkan Logout dan Login Kembali</a>.
    	</div>
    	<?php
		}                            
		                           	
	}
?>
