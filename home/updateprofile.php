<?php 
	include_once ("dbconnect.inc.php");
	session_name("Global");
	session_start();
	
	$upusername=$_POST['usernamesignup'];
	$upemail=$_POST['emailsignup'];
	$uppassword = $_POST['passwordsignup'];
	$uppasswordconfirm=$_POST['passwordsignup_confirm'];
	$upgender=$_POST['usergenderupdate'];
	$updob=$_POST['dobupdate'];
	
	$currentuname=$_SESSION['valid_user'];
	
		
	$queryupdate= "UPDATE user SET uname='$upusername', gender='$upgender', dob='$updob', password='$uppassword',email='$upemail' WHERE uname='$currentuname'";	
	require('conn.php');
	mysql_query($queryupdate)
		or die(mysql_error());
	
?>
<a href="login.php">successful! click here return metube.</a>
