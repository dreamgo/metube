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
<br>

<div id="templatemo_content">

<?php
	require('conn.php');
	$type=$_GET['type'];
	$query="select * from multimediaFiles where type='$type'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	if($num==0)
		echo "<br><br>"."there is no any files now";
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


	
    
    
?>    
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->

</html>