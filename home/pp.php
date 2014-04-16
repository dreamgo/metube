<html>
	<head>
		<link type="text/css" href="css/bottom.css" rel="stylesheet" />
		<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.pikachoose.min.js"></script>
		<script type="text/javascript" src="js/jquery.touchwipe.min.js"></script>
		<script language="javascript">
			$(document).ready(function (){
					$("#pikame").PikaChoose({showTooltips:true});
				});
		</script>

		
</head>
<body>
<!-- not really needed, i'm using it to center the gallery. -->
<div class="pikachoose">
Photo
	<ul id="pikame" >
		<li><a href="#"><img src="images/11.jpg"/></a><span>This is an example of the basic theme.</span></li>
		<li><a href="#"><img src="images/21.jpg"/></a><span>jCarousel is supported and can be integrated with PikaChoose!</span></li>
		<li><a href="#"><img src="images/31.jpg"/></a><span>Be sure to check out <a href="http://www.pikachoose.com">PikaChoose.com</a> for updates.</span></li>
	</ul>
</div>

</body>
</html>