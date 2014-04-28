<!DOCTYPE html>
<html>


<?php
	require('html_nav.php');
	include('conn.php');
	echo "<br><br>";
	foreach($_POST as $key => $value)
	{
		echo $key."*";
		mysql_query("delete from contact where contactUid='$key' and Uid='$user_id'") 
		or die("delete fail");
	}
		$url="contact.php";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
	
?>


</html>