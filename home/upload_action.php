<!DOCTYPE html>
<html>
<?php
	require('html_nav.php');
?>
<head>
<link rel="stylesheet" type="text/css" href="css/upload.css" />

<style>
.hl1{
	color: #8bb82a;
	font-size: x-large;
}

</style>
</head>
<br>
<h2>upload file</h2>
<?php
	
	
	$type=$_POST['type'];
	$filetype=$_POST['filetype'];
	$title=$_POST['title'];
	$keyword=$_POST['keywords'];
	$viewPermission=$_POST['viewPermission'];
	$ratePermission=$_POST['ratePermission'];
	$commentPermission=$_POST['commentPermission'];
	$plid = $_POST['playList'];
	$description=$_POST['description'];
	if($description=='')
		$description="no comments";
	$filename=$_FILES['uploadfile']['name'];
	if($_FILES["data_file"]["error"]>0){
		echo "Error:".$_FILES["data_file"]["error"]."<br>";	
		exit;
	}
	else if($filetype=="audio"){
		$target='upload/music/'.time().$filename;
		if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target)){
		echo "upload successful";
		}
		else
		echo "failed! please check your network";
	}
	if($filetype=="image"){
		$target='upload/image/'.time().$filename;
		if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target)){
			echo "upload successful";
		}
		else
		echo "failed! please check your network";
	}
	if($filetype=="video"){
		$target='upload/music/'.time().$filename;
		if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target)){
			echo "upload successful";
		}
		else
		echo "failed! please check your network";
	}
	$t=date('Y-m-d H:i:s');
	$imagecover="images/templatemo_image_02.jpg";
	$sql="INSERT INTO `multimediaFiles`(`mid`, `mtitle`, `mdescription`, `uploadTime`, `uploadUid`, `viewPermission`, `commentPermisssion`, `ratePermission`, `gradeofRate`, `timesofRate`, `timesofView`, `timesofComment`, `filePath`, `mtype`, `type`,`imagecover`) VALUES ('','$title','$description','$t','$user_id','$viewPermission','$commentPermission','$ratePermission','0','0','0','0','$target','$filetype','$type','$imagecover')";
	require('conn.php');
	mysql_query($sql)
		or die('insert failed:'.mysql_error());
	$result=mysql_query("select * from multimediaFiles where uploadUid='$user_id' order by mid desc limit 1")
		or die('select mid failed');
	$row=mysql_fetch_array($result);
	$mid=$row['mid'];
	
	//insert playlist
	if($plid!=0)
		$result=mysql_query("insert into playlistFiles (plid,mid) values ($plid,$mid)") or die('select mid failed');
	
	$words=explode(',', $keyword);
	for($i=0;$i<count($words);$i++){
		$word1=$words[$i];
		if($word1=='')
			break;
		$query="select * from tag where keywords='$word1'";
		$result=mysql_query($query) or die("xxx");
		
		$row=mysql_fetch_array($result);
		$tagid=$row['tagId'];
		
		if($tagid==''){
			$inserttag="INSERT INTO `tag`(`tagId`, `keywords`) VALUES ('','$word1')";
			mysql_query($inserttag) or die('insert tag fail!');
			$result=mysql_query("select * from tag where keywords='$word1'") or die("yyy");
			$row=mysql_fetch_array($result);
			$tagid=$row['tagId'];
		}
		$insertkw="INSERT INTO `keyword`(`mid`, `tagId`) VALUES ($mid,$tagid)";
		mysql_query($insertkw) or die("insert kw failed");
	
	}
	
?>


</html>