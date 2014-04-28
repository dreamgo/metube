<!DOCTYPE html>
<html>

<?php
	require('html_nav.php');
?>
<head>

<style>
.hl2{
	color: #8bb82a;
	font-size: x-large;
}
</style>
	<script src="js/jquery.js"></script>
	<script src="http://html5.kaltura.org/js"></script>	
	<link rel="stylesheet" href="css/video_play.css" type="text/css"/>
</head>


<title>video play</title>

<body>
	
            
	<div class="video_bg">
		<div align="center">
		<br><br>

		<?php
			$mid=$_GET['mid'];
			require('conn.php');
			
			
			mysql_query("update multimediaFiles set timesofview=(timesofview+1) where mid='$mid'") or die("+1 to view time failed.");
			$result=mysql_query("select * from multimediaFiles where mid='$mid'") or die("query failed");
			$res=mysql_fetch_array($result);
			$filepath=$res['filePath'];
			$mtype=$res['mtype'];
			$type=$res['type'];
			$title=$res['mtitle'];
			$description=$res['mdescription'];
			$uploadtime=$res['uploadTime'];
			$timesofview=$res['timesofView'];
			$gradeofrate=$res['gradeofRate'];
			$uid=$res['uploadUid'];
			$viewPermission=$res['viewPermission'];
			if($viewPermission==1 ){
			
				$conta=mysql_query("select * from contact where Uid='$uid' and contactUid='$user_id'");
					$num=mysql_num_rows($conta);
					if($num==0)
						die("you have no permission");
			}
				
			$result=mysql_query("select * from user where uid='$uid'");
			$res=mysql_fetch_array($result);
			$username=$res['uname'];
			
			
			if($mtype=='video'){
				echo "<video width=\"890\" height=\"550\" src=\"$filepath\" type=\"video/mp4\" id=\"player1\" poster=\"vivalavida.jpg\" controls=\"controls\" ></video>";
			}
			if($mtype=='audio'){
				echo "<audio width=\"890\" height=\"550\" src=\"$filepath\"  id=\"player1\" poster=\"vivalavida.jpg\" controls=\"controls\" ></audio>";
			}
			if($mtype=='image'){
				echo "<img width=\"890\" height=\"550\" src=\"$filepath\"  />";
			}
			
		?>
		
		</div>
		
	<!-- video infomation: title + times -->
	
		<div class="info">
			<div class="left"><?php echo $title; ?></div>
			<div class="right">play <?php echo $timesofview; ?> times</div>
			<br>
			<div class="left1">
			<img width="40" height="40" src="images/picture4.jpg">
			<a href="mychannel.php" style="color:#ffffff;"> <?php echo $username; ?></a>
			<button type="button" class="button1">subscribe</button>	
			</div>
					
			
			<div class="left2">
			Upload On <?php echo $uploadtime; ?>
			</div>
			
			<div class="left2">
			<?php echo $description."..." ?> 
			</div>
			<div class="left2" >
				tag:
				
				<?php  
					$result=mysql_query("select * from tag where tagId=any(select tagId from keyword where mid='$mid')");
					while($res=mysql_fetch_array($result)){
						echo "<button type=\"button\" class=\"button\">".$res["keywords"]."</button>";
					}
					
				?>
				
			</div>
			<div class="right1" >				
				<button type="button" class="button1">like</button>
				<button type="button" class="button1">Add to</button>
				<button type="button" class="button1">download</button>

			</div>
			<div class="left2">
			score <select >
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
			</select>
			total score:<?php echo $gradeofrate; ?>
			</div>
		</div>
	</div>
	
	
	<!-- comment part -->
	<div class="comment_bg">
		<div>
			<h2 class="classify">Recommend</h2>
			<!-- recommend video -->
			<!-- video part -->
<div id="templatemo_content">
	<?php
		$result=mysql_query("select * from keyword where mid=$mid");
		$limit=0;		
		while($res=mysql_fetch_array($result)){
		$tagId=$res['tagId'];
		$resultkword=mysql_query("select * from multimediaFiles where mid = any(select mid from keyword where tagId=$tagId)");
		
		
		while($res=mysql_fetch_array($resultkword)){
		$limit=$limit+1;
		if($limit==6){
			break 2;
			}
		
		$mid=$res['mid'];
		if($mid==$_GET['mid']){
			$limit=$limit-1;
			continue;
			}
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
        //echo mysql_error();
        }
        echo "<div class=\"cleaner_h20\"></div></div>";
	?>
</div> <!-- end of templatemo_content -->
 
  
  <h2 class="classify">Comment</h2>
  <div>
	  <textarea></textarea>
  </div>
  <input type="button" value="submit" class="submit">
</div>
			
		</div>
	</div>
	
	
	
	


</body>

</html>