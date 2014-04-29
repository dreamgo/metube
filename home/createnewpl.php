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
<br>
<br>
<div align="center">

<form action="uploadnewpl.php" method="post">
<label>title</label>
<br>
<input type="text" name="title">
<br>
<label>desciption</label>
<br>
<textarea name="description" placeholder="describe at here..."></textarea>
<br>
<input type="submit" name="submit" value="add">
</form>

</div>
</body>
</html>