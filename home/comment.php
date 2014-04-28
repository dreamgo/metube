<?
	require('conn.php');
	if(isset($_GET["comment"]))
	{
		$comment = $_GET["comment"];
		$mid=$_GET['mid'];
		//echo $comment;
		$date = date('Y-m-d H:i:s');
		session_name("Global");
		session_start();
		$user_id=$_SESSION['valid_uid'];
		if(!$user_id){
			die("you have no permission to comments,please login first");
		}
		$com=mysql_query("select * from multimediaFiles where mid='$mid'");
		$getcom=mysql_fetch_array($com);
		$commentPermission=$getcom['commentPermisssion'];
		$uploadUid=$getcom['uploadUid'];
		if($commentPermission==1 && $uploadUid!=$user_id){
			
				$conta=mysql_query("select * from contact where Uid='$uid' and contactUid='$user_id'");
					$num=mysql_num_rows($conta);
					if($num==0)
						die("you have no permission because you are not friend of author.");
			}
		//echo "insert into comment (mid,cmContent,cmTime,cmUid) values ($mid,'$comment','".$date."',$user_id)";
		mysql_query("insert into comment (mid,cmContent,cmTime,cmUid) values ($mid,'$comment','".$date."',$user_id)") or die("insert comment failed. Error:".mysql_error());
		

	}
	$result = mysql_query("select * from comment where mid=".$_GET['mid']." order by cmTime desc");
	while($res=mysql_fetch_array($result))
	{
		$uresult = mysql_query("select uname from user where uid=".$user_id);
		$urow = mysql_fetch_array($uresult);
		echo $urow["uname"]." at ".$res["cmTime"]." says:"."<br>".$res["cmContent"]."<br><hr>";
	}
	
?>