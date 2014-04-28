<?php 
	include_once ("dbconnect.inc.php");
	session_name("Global");
	session_start();
	unset($_SESSION['valid_user']);
	$usernamesignup=$_POST['usernamesignup'];
	$emailsignup=$_POST['emailsignup'];
	$passwordsignup = $_POST['passwordsignup'];
	$passwordconfirm=$_POST['passwordsignup_confirm'];
	$uidinsert=rand ( 1 ,999999999 );
	$date = date('Y-m-d H:i:s');
	echo 'register test<br>';
	if($usernamesignup && $emailsignup && $passwordsignup && $passwordconfirm){
		try{
		//	login($username,$passwd);
		$dbcxn=mysqli_connect($host,$user,$password,$database) or die("could not connect to database");
		$querylogin= "select * from user where uname='$usernamesignup'";
		$result = mysqli_query($dbcxn, $querylogin);
		$n=mysqli_num_rows($result);
		$queryregister= "INSERT INTO user VALUES ($uidinsert,'$usernamesignup', 'Not Yet Input', '1999-01-01', '$date', '$passwordconfirm','$emailsignup', '$date')";	
		if($n < 1)
			{
				echo 'YAY!';
			if (!mysqli_query($dbcxn,$queryregister))
				{
				  die('Error: ' . mysqli_error($dbcxn));
				}		
			}
		else{
			echo 'That user name is already take, please choose another';
			}			
		}
		catch(Exception $e){
			echo 'please check your name or password';
			exit;
		}
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

	mysqli_close($dbcxn)
	$_SESSION['valid_user']=$usernamesignup;
?>

<a href="index.php">sxx</a>











