<?
$fl=$_GET['fl'];
$mid=$_GET['mid'];
require('conn.php');
session_name("Global");
session_start();
$user_id=$_SESSION['valid_uid'];

if(isset($user_id))
{
	mysql_query("insert into favavorateListFiles (mid,flid) values ($mid,$fl)");
	echo "This video has been added";
}
else
	echo "Please login first.";
?>
