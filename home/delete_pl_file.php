<!DOCTYPE html>
<html>


<?php
	require('html_nav.php');
	include('conn.php');
	echo "<br><br>";
	foreach($_POST as $key => $value)
	{
		$values = explode(":", $key);
		mysql_query("delete from playlistFiles where plid=".$values[0]." and mid=".$values[1])
		or die("delete fail".mysql_error());
	}
		$url="displaypl.php?plid=$values[0]";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
	
?>


</html>