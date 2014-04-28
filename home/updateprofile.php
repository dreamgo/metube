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
	if($upusername && $upemail && $uppassword && $uppasswordconfirm && $upgender && $updob){
		try{
		//	login($username,$passwd);
		$dbcxn=mysqli_connect($host,$user,$password,$database) or die("could not connect to database");
		$querylogin= "select * from user where uname='$currentuname'";
		$result = mysqli_query($dbcxn, $querylogin);
		$n=mysqli_num_rows($result);
		var_dump($n);
		$queryupdate= "UPDATE user SET uname='$upusername', gender='$upgender', dob='$updob', password='$uppasswordconfirm',email='$upemail' WHERE uname='$currentuname'";	
		if($n > 0)
			{
				echo 'YAY!';
			if (!mysqli_query($dbcxn,$queryupdate))
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
	unset($_SESSION['valid_user']);
	$_SESSION['valid_user']=$upusername;
?>
<a href="index.php">successful! click here return metube.</a>
