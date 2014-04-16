

<?php

	session_name("Global");
	session_start();
	$user_name=$_SESSION['valid_user'];
	if(!$user_name){
		$user_name="";
	}
?>

<script>
	function checkLogin(){
		var status='<?php echo $user_name ?>';
		if(status==""){
			self.location='login.php';
		}
		else
			self.location='upload.php';
	}
	
	function checkhead(){		
		var status='<?php echo $user_name ?>';
		if(status==""){
			self.location='login.php';
		}
		else
			self.location='profile.php';	
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
                        <a href="./index.php" ><div class="hl1">MeTube</div></a>
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
                        <a   onclick="checkLogin()" style="color:#FFFFFF">upload</a>
                    </li>
                    <li>
                        <a href="login.php"><?php if($user_name=="") echo "login";else echo "logout";?></a>
                    </li>
                    <li>
                    	<a href="personalCenter.php" target="_blank"><?php  echo $user_name; ?> 	</a>
                    <li>
                        <a onclick="checkhead()" target="_blank"><img width="23" height="23" src="images/picture5.jpg"></a>
                    </li>
                   
                   
                </ul>
            </div>

 


