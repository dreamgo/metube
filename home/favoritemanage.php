<!DOCTYPE html>
<html>
<?php
	require('personal_nav.php');
?>
<head>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/upload.css" rel="stylesheet" type="text/css" />
<style>
.hl1{
	color: #8bb82a;
	font-size: large;
}
.hl5{
	color: orange;
	
}
</style>
</head>
<body>
<br>
<br>
<br>
<!-- video part -->


	<h2 class="classify"><a href="createnewfl.php">->create new favorite list<-</a></h2>
	<form action="deletefl.php" method="post">
	<?php
		require('conn.php');
		$getlist=mysql_query("select * from favorateLists where createUid='$user_id'")
			or die(mysql_error());
		echo "<ul>";
		
		while($gettile=mysql_fetch_array($getlist)){
			$id=$gettile['flid'];
			$title=$gettile['fltitle'];
			$descri=$gettile['fldescription'];
			echo "<li align=\"center\"><h4 ><a href=\"displayfl.php?flid=$id\">list name: $title</a></h4> </li>";
			echo "<li	align=\"center\">description:$descri</li>";	
			echo "<div align=\"center\"><input type=\"checkbox\" name=\"$id\">";
			
			echo "<hr>";
		}
		echo "<input type=\"submit\" value=\"delete\" align=middle></div>";
		echo "<ul>";
	?>
	</form>
</form>




</body>
</html>