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
.comment{
	text-align: right;
}

#tagcloud{
        color: #dda0dd;
        font-family: Arial, verdana, sans-serif;
        width:200px;
        border: 1px solid black;
	text-align: center;
}

#tagcloud a{
        color: green;
        text-decoration: none;
        text-transform: capitalize;
}
</style>
	<script src="js/jquery.js"></script>	
	<link rel="stylesheet" href="css/video_play.css" type="text/css"/>

<script type="text/javascript">
function comment_click()
{
$('#comment').load('comment.php?mid='+$("#mid").val()+'&comment='+$("#comment_area").val());
}
</script>
</head>


<title>video play</title>

<body>
	
            
	<div class="video_bg">
		<div align="center">
		<br><br>

		<?php
			$mid=$_GET['mid'];
			require('conn.php');
			echo "<input hidden=\"true\" id=\"mid\" value=\"".$mid."\"/>";
			
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
			
			$conta=mysql_query("select * from contact where Uid='$uid' and contactUid='$user_id' and contactGroup='foe'");
			$num=mysql_num_rows($conta);
				if($num!=0){
					echo "<script>alert(\"you are in black list, you can view this author's page\")</script>";
					die("you are in black list, you can not view this author's page");
			}
			if($viewPermission==1 && $uid!=$user_id){		
				$conta=mysql_query("select * from contact where Uid='$uid' and contactUid='$user_id' and contactGroup='friend'");		
				$num=mysql_num_rows($conta);
				if($num==0)
					die("you have no permission");
									
			}
				
			$result=mysql_query("select * from user where uid='$uid'");
			$res=mysql_fetch_array($result);
			$username=$res['uname'];
			$userid=$res['uid'];
			
			
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
			<a href="<?php echo "mychannel.php?uid=$userid" ?>" style="color:#ffffff;"> <?php echo $username; ?></a>
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
				<button type="button" class="button1"><a href="download.php?mid=<?php echo $_GET['mid'];?>">download</a></button>

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
	<!-- word cloud -->
	<?php
echo "<div id=\"tagcloud\">";
/** this is our array of tags
 * We feed this array of tags and links the tagCloud
 * class method createTagCloud
 */
 $times=1;
 $searchtag=mysql_query("select * from tag order by tagId desc");
/* $tags = array(
		while($getsearchtag=mysql_fetch_array($searchtag)){
		$keyword=$getsearchtag['keywords'];
        array('weight'  =>50-$times*$times, 'tagname' =>'$keyword', 'url'=>'search.php?q=$keyword'),
        $times+=1;
        if($times>6)
        	break;
        }
        
);*/

 
/*** create a new tag cloud object ***/
$tagCloud = new tagCloud($tags);

echo $tagCloud -> displayTagCloud();
echo "</div>";


class tagCloud{

/*** the array of tags ***/
private $tagsArray;


public function __construct($tags){
 /*** set a few properties ***/
 $this->tagsArray = $tags;
}

/**
 *
 * Display tag cloud
 *
 * @access public
 *
 * @return string
 *
 */
public function displayTagCloud(){
 $ret = '';
 shuffle($this->tagsArray);
 foreach($this->tagsArray as $tag)
    {
    $ret.='<a style="font-size: '.$tag['weight'].'px;" href="'.$tag['url'].'">'.$tag['tagname'].'</a>'."\n";
    }
 return $ret;
}
    

} /*** end of class ***/

?>
	
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
	  <textarea id="comment_area"></textarea>
  </div>
  <button class="submit" onclick="comment_click()">submit</button>
<div id="comment">
	<?
	$result = mysql_query("select * from comment where mid=".$_GET['mid']." order by cmTime desc");
	while($res=mysql_fetch_array($result))
	{
		$uresult = mysql_query("select uname from user where uid=".$user_id);
		$urow = mysql_fetch_array($uresult);
		echo $urow["uname"]." at ".$res["cmTime"]." says:"."<br>".$res["cmContent"]."<br><hr>";
	}
	?>
</div>
</div>
			
		</div>
	</div>
	
	
	
	


</body>

</html>