<!DOCTYPE html>
<html>
<?php
	require('html_nav.php');
	require('conn.php');
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
  <option value="game">games</option>
  <option value="movie">movies</option>
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
Play List:
<br>
<select name="playList">
	<option value="0">default playlist</option>
  <?
	  $presult=mysql_query("select * from playlists where createUid=".$user_id) or die("Error".mysql_error());
	  $i=1;
	  while($prow = mysql_fetch_array($presult))
	  {
	  	echo "<option value=\"".$prow['plid']."\">".$prow['pltitle']."</option>";
	  	$i++;
	}
  ?>
</select><br>
<br>
View Permission:
<br>
<select name="viewPermission">
  <option value="0">allow everyone</option>
  <option value="1">allow friend only</option>
</select>
<br>
Rate Permission:
<br>
<select name="ratePermission">
  <option value="0">allow everyone</option>
  <option value="1">allow friend only</option>
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