

<?php

	session_name("Global");
	session_start();
	$user_name=$_SESSION['valid_user'];
	if(!$user_name){
		$user_name="guest";
	}
?>

<script>
	function checkLogin(){
		var status='<?php echo $user_name ?>';
		if(status=="guest"){
			self.location='login.php';
		}
		else
			self.location='upload.php';
	}
</script>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>METUBE</title>
<link href="css/nav.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.js"></script>

</head>




<body>


<!-- navigation -->

            <div class="navig top">
                <ul>
                    <li>
                        <a href="./index.php" ><div class="hl1">HOME</div></a>
                    </li>
                    <li>
                        <a href="./video.php" ><div class="hl2">VIDEO</div></a>
                    </li>
                    <li>
                        <a href="./music.php" ><div class="hl3">MUSIC</div> </a>
                    </li>
                    <li>
                        <a href="./photo.php" ><div class="hl4">PHOTO</div> </a>
                    </li>
                   
                
                </ul>
                <ul>
                	<form method="post" action="#" id="search">
						<input name="q" type="text" size="40" placeholder="Search..." />
					</form>
                </ul>
                
                <ul>
	                 <li>
                        <a   onclick="checkLogin()" style="color:#FFFFFF;">Upload</a>
                    </li>
                    <li>
                        <a href="login.php"><?php if($user_name=="guest") echo "login";else echo "logout";?></a>
                    </li>
                    <li>
                    	<a href="#" target="_blank"><?php  echo $user_name; ?> 	</a>
                    <li>
                        <a href="#" target="_blank"><img width="23" height="23" src="images/picture1.jpg"></a>
                    </li>
                   
                   
                </ul>
            </div>

 


