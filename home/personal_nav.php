
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
                        <a href="personalCenter.php"><div class="hl2">Personal Center</div></a>
                    </li>         
                    <li>
                        <a href="./subscription.php" ><div class="hl3">Subscription</div> </a>
                    </li>
                    <li>
                        <a href="./mychannel.php" ><div class="hl4">MyChannel</div> </a>
                    </li>
                   <li>
                        <a href="./myfavorite.php" ><div class="hl5">MyFavorite</div> </a>
                    </li>
                
                </ul>
                
                
                <ul>
	                 <li>
                        <a   onclick="checkLogin()" style="color:#FFFFFF">upload</a>
                    </li>
                    <li>
                    	<a href="message.php"><?php if($user_name=="guest") echo "";else echo "message";?></a>
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



