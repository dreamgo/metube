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
<br><br><br>
<div id="templatemo_content">
<form action="delete_pl_file.php" method="post">
<?php
	require('conn.php');
	$plid=$_GET['plid'];
	$query="select * from playlistFiles where plid=".$plid;
		//echo "plid:".$list_res['plid']."<br>";
		$result=mysql_query($query) or die("1".mysql_error());
		
		$num=mysql_num_rows($result);
		if($num==0)
			echo "<br><br>"."there is no any files you upload.<br>";
		while($mres=mysql_fetch_array($result)){
		//echo $list_res['plid'];
		$query="select * from multimediaFiles where mid=".$mres['mid'];
		$res=mysql_query($query) or die("2".mysql_error());
		$res = mysql_fetch_array($res);
		$mid=$res['mid'];
		$imagecover=$res['imagecover'];		
		$description=$res['mdescription'];
		$title=$res['mtitle'];

		echo "<div class=\"product_box margin_r40\">";
		echo "<div class=\"itemsContainer\">";
        echo "<div class=\"thumb_wrapper\">";
        echo "<a href=\"playvideo.php?mid=$mid\">";
        echo "<img src=\"$imagecover\" alt=\"image 1\" />";
        echo "</a></div>";
		echo "<div class=\"play\"><img src=\"images/button_play_blue.png\" /> </div></div>";
        echo "<h2>$title</h2>";
        echo "<p>$description</p>";
        echo "<input type=\"checkbox\" name=\"$plid:$mid\">";
        echo "</div>";
		}    
?>    
<input type="submit" value="delete" align=middle>
</form>
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->

</html>