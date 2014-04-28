<!DOCTYPE html>
<html>

<?php
	require('html_nav.php');
?>
<head>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<style>
.hl1{
	color: #8bb82a;
	font-size: x-large;
}
</style>
</head>
<body>
<br>
<br>
<?php
	require('conn.php');
	$keyword=$_POST['q'];
	$query="select * from tag where keywords='$keyword'";
	$result=mysql_query($query);
	$res=mysql_fetch_array($result);
	$tagID=$res['tagId'];
	if ($tagID==''){
		echo "sorry,there is no result!";
	}
	else{
		$query="select * from multimediaFiles where mid = any(select mid from keyword where tagId=$tagID)";
		$result=mysql_query($query);
		echo "<div id=\"templatemo_content\">";
		
		while($res=mysql_fetch_array($result)){
		$mid=$res['mid'];
		$imagecover=$res['imagecover'];		
		$description=$res['mdescription'];
		$title=$res['mtitle'];
	
		

		echo "<div class=\"product_box margin_r40\">";
		echo "<div class=\"itemsContainer\">";
        echo "<div class=\"thumb_wrapper\">";
        echo "<a href=\"playvideo.php?mid=$mid\">";
        echo "<img src=\"$imagecover\" alt=\"image 1\" width=\"210\" heigth=\"170\" />";
        echo "</a></div>";
		echo "<div class=\"play\"><img src=\"images/button_play_blue.png\" /> </div></div>";
        echo "<h2>$title</h2>";
        echo "<p>$description</p>";
        echo "</div>";
		
		}
		echo "<div class=\"cleaner_h20\"></div></div>";
			
	}
?>
</body>