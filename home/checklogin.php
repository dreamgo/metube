<?php 
	include('conn.php');
	session_name("Global");
	session_start();
	unset($_SESSION['valid_user']);
	$username=$_POST['username'];
	$passwd = $_POST['passwd'];
	if($username && $passwd){		
				
		$check_query = mysql_query("select * from user where uname='$username' and password='$passwd' limit 1");

		if($result = mysql_fetch_array($check_query)){
		$_SESSION['valid_user']=$username;
		$_SESSION['valid_uid']= $result[uid];
		$url="index.php";
		echo "login succesful";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
		}
		else {
		$url="login.php";
		echo "login failed:";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
		}
		
	}
	
	?>











