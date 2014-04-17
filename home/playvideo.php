<!DOCTYPE html>
<html>

<?php
	require('html_nav.php');
?>
<head>

<style>
.hl2{
	color: #8bb82a;
	font-size: x-large;
}
</style>
	<script src="js/jquery.js"></script>
	<script src="http://html5.kaltura.org/js"></script>	
	<link rel="stylesheet" href="css/video_play.css" type="text/css"/>
</head>


<title>video play</title>

<body>
	
            
	<div class="video_bg">
		<div align="center">
		<br><br>
		<video width="890" height="550" src="vivalavida.mp4" type="video/mp4" 
			id="player1" poster="vivalavida.jpg" controls="controls" >
		</video>
		</div>
		
	<!-- video infomation: title + times -->
	
		<div class="info">
			<div class="left">first project: video play page</div>
			<div class="right">play 1,999 times</div>
			<br>
			<div class="left1">
			<img width="40" height="40" src="images/picture4.jpg">
			<a href="mychannel.php" style="color:#ffffff;"> Bo Li</a>
			<button type="button" class="button1">subscribe</button>	
			</div>
					
			
			<div class="left2">
			Upload On April 2,2014
			</div>
			
			<div class="left2">
			Viva la Vida is a song by the British alternative rock band Coldplay. It was written by all members of the band for their fourth album, Viva la Vida or Death and All ...
			</div>
			<div class="left2" >
				tag:
				<button type="button" class="button">action</button>
				<button type="button" class="button">student</button>
				<button type="button" class="button">clemson</button>
				
			</div>
			<div class="right1" >
				
				<button type="button" class="button1">like</button>
				<button type="button" class="button1">Add to</button>
				<button type="button" class="button1">download</button>
				
			</div>
		</div>
	</div>
	
	
	<!-- comment part -->
	<div class="comment_bg">
		<div>
			<h2 class="classify">Recommend</h2>
			<!-- recommend video -->
			<!-- video part -->
<div id="templatemo_content">
	<div class="product_box margin_r40">
		<div class="itemsContainer">
        <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_01.jpg" alt="image 1" /></a></div>
		<div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
        <h2>Project One</h2>
        <p>Etiam molestie massa nec nulla sagittis et luctus nulla.</p>
    </div>
    
    <div class="product_box margin_r40">
    	<div class="itemsContainer">
        <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_02.jpg" alt="image 2" /></a></div>
        <div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
        <h2>Project Two</h2>
        <p>Aenean aliquam ullamcorper metus, at cursus elit sodales.</p>
    </div>
    
    <div class="product_box margin_r40">
    	<div class="itemsContainer">
        <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_03.jpg" alt="image 3" /></a></div>
        <div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
        <h2>Project Three</h2>
        <p>Nam sed volutpat ipsum. Phasellus pharetra.</p>
    </div>
    
	<div class="product_box">
		<div class="itemsContainer">
        <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_04.jpg" alt="image 4" /></a></div>
        <div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
        <h2>Project Four</h2>
        <p>Proin rutrum neque vitae nisi venenatis blandit.</p>
    </div>
    
	<div class="cleaner"></div>
    
  	<div class="product_box margin_r40">
  		<div class="itemsContainer">
        <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_05.jpg" alt="image 5" /></a></div>
        <div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
        <h2>Project Five</h2>
        <p>Mauris dignissim vehicula sapien, in commodo.</p>
    </div>
    
    <div class="product_box margin_r40">
    	<div class="itemsContainer">
	    <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_06.jpg" alt="image 6" /></a></div>
	    <div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
        <h2>Project Six</h2>
    	<p>Morbi ultrices congue nunc sit amet rutrum.</p>
    </div>
    
    <div class="product_box margin_r40">
    	<div class="itemsContainer">
         <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_07.jpg" alt="image 7" /></a></div>
         <div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
         <h2>Project Seven</h2>
	     <p>Duis facilisis ante sit amet libero sodales.</p>
    </div>
    
	<div class="product_box">
		 <div class="itemsContainer">
         <div class="thumb_wrapper"><a href="#"><img src="images/templatemo_image_08.jpg" alt="image 8" /></a></div>
         <div class="play"><img src="images/button_play_blue.png" /> </div>
		</div>
         <h2>Project Eight</h2>
	     <p>Proin vitae felis in urna laoreet suscipit.</p>
    </div>
    
    <div class="cleaner_h20"></div>

</div> <!-- end of templatemo_content -->
 
  
  <h2 class="classify">Comment</h2>
  <div>
	  <textarea></textarea>
  </div>
  <input type="button" value="submit" class="submit">
</div>
			
		</div>
	</div>
	
	
	
	


</body>

</html>