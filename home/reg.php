<?php
$username=$_POST['usernamesignup'];
$password=$_POST['passwordsignup'];
$email=$_POST['emailsignup'];


include('conn.php');
$check_query = mysql_query("select uid from user where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
    echo 'error username ',$username,' exits <a href="javascript:history.back(-1);">return</a>';
    exit;
}


$regdate = time();
$sql = "INSERT INTO user(uname,password,email,createtime)VALUES('$username','$password','$email',
$regdate)";
if(mysql_query($sql,$conn)){
    exit('register successful! <a href="login.php">login</a>');
} else {
    echo 'sorry, insert failed!：',mysql_error(),'<br />';
    echo 'click here <a href="javascript:history.back(-1);">return</a> retry';
}
?>