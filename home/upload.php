<!DOCTYPE html>
<html>
<?php
	require('html_nav.php');
?>
<head>
<link rel="stylesheet" type="text/css" href="css/upload.css" />

<style>
.hl1{
	color: #8bb82a;
	font-size: x-large;
}

</style>
</head>
<br>
<h2>upload file</h2>
  
<form enctype="multipart/form-data" action="upload_action.php" method=post>
<input type="hidden" name="MAX_FILE_SIZE" value="102400000">
Upload this file: <input name="uploadfile" type="file">

<br>
select a type here:
<br>
<select name="type">
  <option value="music">music</option>
  <option value="sports">sports</option>
  <option value="games">games</option>
  <option value="movies">movies</option>
</select>
<br>
<select name="filetype">
  <option value="audio">audio</option>
  <option value="image">image</option>
  <option value="video">video</option>
</select>
<br>
<label>Title:</label>
<input type="text" name="title" maxlength="50" />
<br>
<label>keywords:</label>
<input type="text" name="keywords" maxlength="50" />
<br>
View Permission:
<br>
<select name="viewPermission">
  <option value="0">allow everyone</option>
  <option value="1">allow friend only</option>
  <option value="2">allow nobody</option>
</select>
<br>
Rate Permission:
<br>
<select name="ratePermission">
  <option value="0">allow everyone</option>
  <option value="1">allow friend only</option>
  <option value="2">allow nobody</option>
</select>
<br>
Comment Permission
<br>
<select name="commentPermission">
  <option value="0">allow everyone</option>
  <option value="1">allow friend only</option>
  <option value="2">allow nobody</option>
</select><br>
<br>
Describe your video here:
<br>
<textarea rows="7" cols="60" maxlength="50" name="description"></textarea>
<br>
<input type="submit" value="Send File">
</form>


</html>