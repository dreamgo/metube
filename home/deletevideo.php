<!DOCTYPE html>
<html>


<?php
	require('html_nav.php');
	include('conn.php');
	echo "<br><br>";
	foreach($_POST as $key => $value)
	{
		echo $key."*";
		mysql_query("delete from keyword where mid='$key'");
		mysql_query("delete from comment where mid='$key'");
		mysql_query("delete from favavoratelistfiles where mid='$key'");
		mysql_query("delete from multimediaFiles where mid='$key'") 
		or die("delete fail".mysql_error());
	}
		$url="videomanage.php";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
	
?>


</html>