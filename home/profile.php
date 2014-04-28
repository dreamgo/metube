<!DOCTYPE html>
<html>
<?php
	require('personal_nav.php');
?>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <link rel="stylesheet" type="text/css" href="css/register.css" />
        <link rel="stylesheet" type="text/css" href="css/login.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

<link rel="stylesheet" type="text/css" href="css/upload.css" />
<style>
.hl1{
	color: #8bb82a;
	font-size: large;
}
.hl3{
	color: orange;
	
}
</style>
</head>
<body>
<br>
<h2>Manage </h2>
<?php
		include_once ("dbconnect.inc.php");
		session_name("Global");
		session_start();
		$user_name=$_SESSION['valid_user'];
		$dbcxn=mysqli_connect($host,$user,$password,$database) or die("could not connect to database");
		$queryprofile= "select * from user where uname='$user_name'";
		$result = mysqli_query($dbcxn, $queryprofile);

		
		while($row = mysqli_fetch_array($result))
			  {
			  $dname=$row['uname'];
			  $dgender=$row['gender'];
			  $ddob=$row['dob'];
			  $demail=$row['email'];
			  echo "<br>";
			  }
	?>
	  <div class="container">
         
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">

                        <div id="manageprofile" class="animate form">
                            <form  action="updateprofile.php" method = post autocomplete="on"> 
                                <h1> Manage your profile here </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" value="<?php echo $dname ?>" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" value="<?php echo $demail ?>"/> 
                                </p>
                                <p> 
                                    <label for="usergenderupdate" class="ugender" data-icon="p">Gender </label>
                                    <input id="usergenderupdate" name="usergenderupdate" required="required" type="text" value="<?php echo $dgender ?>"/>
                                </p>
                                <p> 
                                    <label for="dobupdate" class="udob" data-icon="p">Date of Birth </label>
                                    <input id="dobupdate" name="dobupdate" required="required" type="text" Value="<?php echo $ddob ?>"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. admin"/>
                                </p>
                                
                                <p class="update button"> 
									<input type="submit" value="Update Profile"/> 
								</p>

                            </form>
                        </div>
                        </div>
                        </div>
</body>
</html>
