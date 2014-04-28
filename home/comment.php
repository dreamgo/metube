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
		if(!$user_name){
			$user_name="";
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