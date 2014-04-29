<!DOCTYPE html>
<html>


<?php
	require('html_nav.php');
	include('conn.php');
	echo "<br><br>";
	foreach($_POST as $key => $value)
	{
		echo $key."*";
		mysql_query("delete from playlistFiles where plid='$key'");
		mysql_query("delete from playlists where plid='$key'") 
		or die("delete fail".mysql_error());
	}
		$url="playlistmanage.php";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>";
	
?>


</html>