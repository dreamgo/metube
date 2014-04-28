<!DOCTYPE html>
<html>

<?php
	require('html_nav.php');
?>
<head>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<style>
.hl1{
	color: #8bb82a;
	font-size: x-large;
}
body {
	background: #5c5b5b; 
	
}

</style>
    <!-- Load JQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!-- Load jquery.cookie plugin (optional) -->
    <script type="text/javascript" src="./navgoco/src/jquery.cookie.js"></script>
    <!-- Load jquery.navgoco plugin js and css files -->
    <script type="text/javascript" src="./navgoco/src/jquery.navgoco.js"></script>
    <link rel="stylesheet" href="./navgoco/src/jquery.navgoco.css" type="text/css" media="screen" />
    <style>
    	.contactlist{
    		margin-left: auto;
    		margin-right: auto;
	    	width: 40%;
    	}
    </style>
</head>

<body>
	<br>
	<h1 align="center">Contact</h1>
	<div class="contactlist">
	<ul class="nav">
	<form action="deletecontact.php" method="post">
    <li><a href="#">friend</a>
    
        <ul>
            <?php
            	include('conn.php');
            	$list = mysql_query("select contactUid from contact where uid='$user_id' and contactGroup='friend'");
            	
            	while($row=mysql_fetch_row($list)){
					$friendid=$row[0];
					$frindname1=mysql_query("select * from user where uid=$friendid");
					$row1=mysql_fetch_array($frindname1);
					$friendname=$row1[uname];
					echo "<li><a href=\"#\">"."<input name=\"".$friendid."\" type=\"checkbox\">".$friendname."</a>"."\n";									
				}
            ?>
        </ul>
        
    </li>
    
    <li><a href="#">foe</a>
        <ul>
            <?php
            	include('conn.php');
            	$list = mysql_query("select contactUid from contact where uid='$user_id' and contactGroup='foe'");
            	while($row=mysql_fetch_row($list)){
					$friendid=$row[0];
					$frindname1=mysql_query("select * from user where uid=$friendid");
					$row1=mysql_fetch_array($frindname1);
					$friendname=$row1[uname];
					echo "<li><a href=\"#\">"."<input name=\"".$friendid."\" type=\"checkbox\">".$friendname."</a>"."\n";
				}
            ?>
        </ul>
    </li>
    <input type="submit" value="delete" align=middle>
	</form>
   
	</ul>
	</div>
<script type="text/javascript">
$(document).ready(function() {
    $('.nav').navgoco();
});
</script>
</body>
</html>