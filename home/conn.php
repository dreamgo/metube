<?php
$conn=mysql_connect("localhost","root","root");
if(!$conn){
	die("failed!!!!");
}
mysql_select_db("metube",$conn);
?>