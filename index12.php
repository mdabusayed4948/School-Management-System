<?php session_start();
  require_once("db_config.php");
  if(isset($_POST["btnLogin"])){
	  $username=trim($_POST["txtUsername"]);
	  $password=md5(trim($_POST["pwdPassword"]));
	  
	  $user_table=$db->query("select id,username,role_id from user where username='$username' and password='$password'");
	  
	  list($uid,$uname,$role_id)=$user_table->fetch_row();
	  
	  if(isset($uname)){
		$_SESSION["s_id"]=$uid;
		$_SESSION["s_username"]=$uname;	
		$_SESSION["s_role_id"]=$role_id;
		header("location:home.php");
	  }else{
		 $msg="Incorrect username or password";  
	  }
	  
	  
 }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<?php
 echo isset($msg)?$msg:"";
?>
<fieldset>
<legend>Login</legend>
<form action="index.php" method="post">
  <div>Username<br/>
    <input type="text" name="txtUsername" />
  </div>
  <div>Password<br/>
    <input type="password" name="pwdPassword" />
  </div>
  <div>
    <input type="submit" name="btnLogin" value="Login" />
  </div>
</form>
</fieldset>
</body>
</html>