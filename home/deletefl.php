<!DOCTYPE html>
<html>


<?php
	require('html_nav.php');
	include('conn.php');
	echo "<br><br>";
	foreach($_POST as $key => $value)
	{
		echo $key."*";
		mysql_query("delete from favavoratelistfiles where flid='$key'");
		mysql_query("delete from favorateLists where flid='$key'") 
		or die("delete fail".mysql_error());
	}
		$url="favoritemanage.php";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
	
?>


</html>