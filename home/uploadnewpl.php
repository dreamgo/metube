<?php
	require('personal_nav.php');
	require('conn.php');
	echo "<br><br><br>";
	$title=$_POST['title'];
	$description=$_POST['description'];	
	$t=date('Y-m-d H:i:s');
	if(!$title)
		echo "please input title!";
	mysql_query("INSERT INTO `playlists`(`plid`, `pltitle`, `pldescription`, `createTime`, `createUid`) VALUES ('','$title','$description','$t','$user_id')")
		or die(mysql_error());
	echo "insert successful";
?>
