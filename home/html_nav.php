

<?php

	session_name("Global");
	session_start();
	$user_name=$_SESSION['valid_user'];
	$user_id=$_SESSION['valid_uid'];
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
                        <a href="./sport.php?type=sports" ><div class="hl2">SPORT</div></a>
                    </li>
                    <li>
                        <a href="./sport.php?type=game" ><div class="hl3">GAME</div> </a>
                    </li>
                    <li>
                        <a href="./sport.php?type=music" ><div class="hl4">MUSIC</div> </a>
                    </li>
                    <li>
                        <a href="./sport.php?type=movie" ><div class="hl4">MOVIE</div> </a>
                    </li>
             
                
                </ul>
                <ul>
                	<form method="get" action="search.php" id="search">
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
                        <a onclick="checkhead()" target="_blank" style="color:white">profile</a>
                    </li>
                   
                   
                </ul>
            </div>

<body>


