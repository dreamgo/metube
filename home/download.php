<?php


	session_name("Global");
	session_start();
	$user_name=$_SESSION['valid_user'];
	$user_id=$_SESSION['valid_uid'];
	if(!$user_id){
		die("you have no permission to donwload");
	}
	$mid=$_GET['mid'];
	require('conn.php');
	$mfile=mysql_query("select * from multimediaFiles where mid='$mid'") or die("query failed");
	$getmfile=mysql_fetch_array($mfile);
	$filepath=$getmfile['filePath'];
	$filename=$getmfile['mtitle'];
	
	
	header("Content-Type: application/force-download"); 
	header("Content-Disposition: attachment; filename=".basename($filepath)); 
	readfile($filepath); 

?>