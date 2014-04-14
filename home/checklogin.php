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
		echo "yyy";
		echo $_SESSION['valid_user'];
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

<a href="index.php">sxx</a>











