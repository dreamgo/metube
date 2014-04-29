
<?
$grade=$_GET['score'];
$mid=$_GET['mid'];
require('conn.php');
session_name("Global");
session_start();
$user_id=$_SESSION['valid_uid'];

if(isset($user_id))
{
	mysql_query("update multimediaFiles set gradeofRate=(gradeofRate+$grade), timesofRate=(timesofRate+1) where mid='$mid'") or die("Rate failed.Error".mysql_error());
	$result=mysql_query("select gradeofRate,timesofRate from multimediaFiles where mid='$mid'") or die("query failed.Error:".mysql_error());
	$row = mysql_fetch_array($result);
	echo "Your rated score:".$grade;
	echo "total score:".$row['gradeofRate']/$row['timesofRate']; 
}
else
	echo "Please login first.";
?>
