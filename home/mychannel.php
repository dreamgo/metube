<!DOCTYPE html>
<html>
<?php
	require('personal_nav.php');
?>
<head>

<style>
.hl1{
	color: #8bb82a;
	font-size: large;
}
.hl4{
	color: orange;	
}
body {
	background: #E9E9E9; 
}
</style>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/focus_index1.css" type="text/css" />
</head>
<body>
<div class="index_focus">
<div class="bd">

<ul>
<li>
<a href="#" class="pic">
<div class="index_focus_info">
<h3>personal Channel</h3>
<p class="text" style="font-size:large">Here is my personal Channel! It includes movies, music and photos. Have fun!</p>
</div>
<img class="pic" src="images/clemson.jpg" width="1600" height="400" alt=""></a>
</li>
</ul>

</div>
<div class="slide_nav">

</div>
</div>
<h3 align="center">recently upload</h3>
<div id="templatemo_content">
<?php
	require('conn.php');
	$userid=$_GET['uid'];
	if(!$userid)
		$userid=$user_id;
	$list_query="select * from playlists where createUid ='$userid'";
	$list_result=mysql_query($list_query);
	while($list_res=mysql_fetch_array($list_result)){
		echo $list_res['pltitle']."  ".$list_res['pldescription']."  ".$list_res['createTime']."<br>";
		$query="select * from playlistFiles where plid=".$list_res['plid'];
		//echo "plid:".$list_res['plid']."<br>";
		$result=mysql_query($query) or die("1".mysql_error());
		
		$num=mysql_num_rows($row);
		if($num==0)
			echo "<br><br>"."there is no any files you upload.<br>";
		while($mres=mysql_fetch_array($result)){
		//echo $list_res['plid'];
		$query="select * from multimediaFiles where mid=".$mres['mid'];
		$res=mysql_query($query) or die("2".mysql_error());
		$res = mysql_fetch_array($res);
		//echo $num;
		
		
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
	        echo "</div>";
			
			}
		echo "<div class=\"cleaner_h20\"></div>";
	}
	echo "Default List<br>";
	$query="select * from multimediaFiles where uploadUid=".$userid;
	$result=mysql_query($query) or die("3".mysql_error());
	$num=0;
	while($res=mysql_fetch_array($result)){
		$query="select plid from playlistFiles where mid=".$res['mid'];
		$plResult=mysql_query($query) or die("4".mysql_error());
		if(mysql_num_rows($plResult))
			continue;
		$num++;
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
        echo "</div>";
		
		}
		if($num==0)
			echo "<br><br>"."there is no any files you upload.<br>";


	
    
    
?>    
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->
</body>
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
effect: "fold",
autoPlay: true,
trigger: "click",
startFun:function(i){
	jQuery(".index_focus_info").eq(i).find("h3").css("display","block").fadeTo(1000,1);
	jQuery(".index_focus_info").eq(i).find(".text").css("display","block").fadeTo(1000,1);
}
});
</script>
</html>