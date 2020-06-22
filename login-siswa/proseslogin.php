<?php
   session_start();
   require_once("../config/config.php");
   $username 	= $_GET['username'];
   $pass 		= $_GET['password'];
  
      
   $sql 		= "SELECT * FROM user_siswa WHERE username = '$username' ";
   
   $query 		= $con->query($sql);   
   $hasil 		= $query->fetch_assoc();
   
   if($query->num_rows == 0) 
   {
     echo "<div align='center'>Username Belum Terdaftar! <a href='index.php'>Back</a></div>";
   } 
   else
		{
			if($pass <> $hasil['password']) 
			{
				echo "<div align='center'>Password salah! <a href='index.php'>Back</a></div>";
			} 
			else 
			{
	
				$_SESSION['hak'] 		= $hasil['hak'];
				$_SESSION['username'] 	= $hasil['username'];
				$_SESSION['nama'] 		= $hasil['nama'];
								 
				if($_SESSION['hak'] == 'siswa')
					{
					header("location:index.php");
					}
				
			}
		}
?>