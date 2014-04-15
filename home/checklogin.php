<?php 
	
	session_name("Global");
	session_start();
	unset($_SESSION['valid_user']);
	$username=$_POST['username'];
	$passwd = $_POST['passwd'];
	if($username && $passwd){
		try{
		//	login($username,$passwd);
			$_SESSION['valid_user']=$username;
			
			
		}
		catch(Exception $e){
			echo 'please check your name or password';
			exit;
		}
	}
	
	if(isset($_SESSION['valid_user'])){
		$url="index.php";
		echo "login succesful";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
	}
	else{
		$url="login.php";
		echo "login failed:";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
		
	}
	
	function login($username,$passwd){
		require('dbconnect.inc.php');
		$dbc=mysqli_connect($host,$user,$password,$database) 
			or die('fail connect database');
		//$query="select * from user where uname='".$username."' and password='".$passwd."'";
		$query="select * from user";
		echo $query;
		$result=mysqli_query($dbc,$query) or die("query failed!");
	
	if(!$result){
		exit;
	}
	}

	
?>











