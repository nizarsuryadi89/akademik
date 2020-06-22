<?php
	@define("HOST","localhost");
	@define("USER","root");
	@define("PASS","");
	@define("DB","siak_offline");
  
	$con = mysqli_connect(HOST,USER,PASS,DB);

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Database Maintenance" . mysqli_connect_error();
	  }
	 
?>