<?
$pl=$_GET['pl'];
$mid=$_GET['mid'];
require('conn.php');
session_name("Global");
session_start();
$user_id=$_SESSION['valid_uid'];

if(isset($user_id))
{
	mysql_query("insert into playlistFiles (mid,plid) values ($mid,$pl)");
	echo "This video has been added";
}
else
	echo "Please login first.";
?>
