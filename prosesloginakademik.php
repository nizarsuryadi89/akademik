<?php
   session_start();
   include "config/config.php";
   $username 	= $_GET['username'];
   $pass 		= $_GET['password'];
   $tahun 		= $_GET['tahun'];
   $sms 		= $_GET['semester'];
      
   $sql 		= "SELECT * FROM user WHERE username = '$username' ";
   
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
				$_SESSION['semester']	= $sms;
				$_SESSION['tahun']		= $tahun;
				$_SESSION['id']			= $hasil['guru_id'];
				$_SESSION['kd']			= $hasil['id_user'];
				
				 
				
				if(($_SESSION['hak'] == 'keuangan') or ($_SESSION['hak'] == 'master') or ($_SESSION['hak'] == 'admin'))
 					{
						header("location:index.php?page=Dashboard ");
					} 
				else if($_SESSION['hak'] == 'guru')
					{
					    	$_SESSION['semester']	= $sms;
			            	$_SESSION['tahun']		= $tahun;
					header("location: login-guru/index.php");
					}
				else if($_SESSION['hak'] == 'walikelas')
					{
					header("location: walikelas/index.php");
					}
				else if($_SESSION['hak'] == 'tu')
					{
					header("location: tu/index.php");
					}
				else if($_SESSION['hak'] == 'siswa')
					{
					header("location: siswa/index.php");
					}
				else if($_SESSION['hak'] == 'ppdb')
					{
					header("location: ppdb/index.php");
					}
				else if($_SESSION['hak'] == 'bendahara')
					{
					header("location: bendahara/index.php");
					}
				else if($_SESSION['hak'] == 'walikelas')
					{
					header("localtion: walikelas/index.php");
					}
			}
		}
?>