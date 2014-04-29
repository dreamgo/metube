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
 
<!-- Start focus picutre -->
<?php
require('focus_index.php');
?>
<!-- End home page -->  
<!-- video part -->
<div id="templatemo_content">

	<h2 class="classify"><a href="./sport.php?type=sports">Sport &nbsp ></a></h2>


<?php
	require('conn.php');
	$type=$_GET['type'];
	$query="select * from multimediaFiles where type='sports' order by uploadTime limit 4 ";
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
        echo "<img src=\"$imagecover\" alt=\"image 1\"  />";
        echo "</a></div>";
		echo "<div class=\"play\"><img src=\"images/button_play_blue.png\" /> </div></div>";
        echo "<h2>$title</h2>";
        echo "<p>$description</p>";
        echo "</div>";
		
		}
    
?>    
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->

<!-- video part -->
<div id="templatemo_content">

	<h2 class="classify"><a href="./sport.php?type=game">Games &nbsp ></a></h2>

	<?php
	require('conn.php');
	$type=$_GET['type'];
	$query="select * from multimediaFiles where type='game' order by uploadTime limit 4 ";
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
        echo "<img src=\"$imagecover\" alt=\"image 1\"  />";
        echo "</a></div>";
		echo "<div class=\"play\"><img src=\"images/button_play_blue.png\" /> </div></div>";
        echo "<h2>$title</h2>";
        echo "<p>$description</p>";
        echo "</div>";
		
		}
    
?>    
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->
<!-- video part -->
<div id="templatemo_content">

	<h2 class="classify"><a href="./sport.php?type=movie">Movies &nbsp ></a></h2>

	<?php
	require('conn.php');
	$type=$_GET['type'];
	$query="select * from multimediaFiles where type='movie' order by uploadTime limit 4 ";
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
        echo "<img src=\"$imagecover\" alt=\"image 1\"  />";
        echo "</a></div>";
		echo "<div class=\"play\"><img src=\"images/button_play_blue.png\" /> </div></div>";
        echo "<h2>$title</h2>";
        echo "<p>$description</p>";
        echo "</div>";
		
		}
    
?>    
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->

<!-- video part -->
<div id="templatemo_content">

	<h2 class="classify"><a href="./sport.php?type=music">Music &nbsp ></a></h2>

<?php
	require('conn.php');
	$type=$_GET['type'];
	$query="select * from multimediaFiles where type='music' order by uploadTime limit 4 ";
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
        echo "<img src=\"$imagecover\" alt=\"image 1\"  />";
        echo "</a></div>";
		echo "<div class=\"play\"><img src=\"images/button_play_blue.png\" /> </div></div>";
        echo "<h2>$title</h2>";
        echo "<p>$description</p>";
        echo "</div>";
		
		}
    
?>    
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->

<script type="text/javascript">
jQuery(".index_focus").hover(function(){
jQuery(this).find(".index_focus_pre,.index_focus_next").stop(true, true).fadeTo("show", 1)
},function(){
jQuery(this).find(".index_focus_pre,.index_focus_next").fadeOut()
});
jQuery(".index_focus").slide({
titCell: ".slide_nav a ",
mainCell: ".bd ul",
delayTime: 500,
interTime: 3500,
prevCell:".index_focus_pre",
nextCell:".index_focus_next",
effect: "fold",
autoPlay: true,
trigger: "click",
startFun:function(i){
	jQuery(".index_focus_info").eq(i).find("h3").css("display","block").fadeTo(1000,1);
	jQuery(".index_focus_info").eq(i).find(".text").css("display","block").fadeTo(1000,1);
}
});
</script>
<footer>
  <p align="center">Copyright:2014.4~2014.6 by BoLi &nbsp &nbsp Contact information: <a href="mailto:bli@clemson.edu">bli2@clemson.edu</a>.</p>
</footer>
</body>
</html>