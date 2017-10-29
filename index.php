
<?php session_start();
  require_once("db_config.php");
  if(isset($_POST["btnLogin"])){
	  $username=validate($_POST["txtusername"]);
	  $password=md5(validate($_POST["pwdPassword"]));
	  
	  $user_table=$db->query("select id,username,role_id from sayuser where username='$username' and password='$password'");
	  
	  list($uid,$uname,$role_id)=$user_table->fetch_row();
	  
	  if(isset($uname)){
		$_SESSION["s_id"]=$uid;
		$_SESSION["s_username"]=$uname;	
		$_SESSION["s_role_id"]=$role_id;
		header("location:home.php");
	  }else{
		 $msg="Incorrect email or password !!";  
	  }
	  
	  
 }
	function validate($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>

<!DOCTYPE html >
<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--STYLESHEETS-->
<link href="css1/style.css" rel="stylesheet" type="text/css" />


<!--SCRIPTS-->
<!---<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>----->
<script src="cdn/jquery-2.2.1.min.js" type="text/javascript"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
       <div class="user-icon"></div>
 	  <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

	<!--HEADER-->
    <div class="header">
	      <div style="text-align: center"><a href="http://dev.intels.co/sayed/" style="text-decoration: none;color:#DF6025"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>Return to Project Gallery</a></div>
    	<div style="text-align:center">
            <img src="images/school.png" width="150" />
        </div>
    	
    <!--TITLE--><h3 style="text-align:center">School Management System</h3><!--END TITLE-->
    <!--DESCRIPTION--><span>Sign in Internal User Only</span><!--END DESCRIPTION-->
     <div style="color:#F00; font-weight:bold;">
    	<?php
    echo isset($msg)?$msg:"";
     ?>
    </div>
    </div>
    <!--END HEADER-->
   
	
	<!--CONTENT-->
    <div class="content">
  
	<!--USERNAME--><input  type="text"  required="" name="txtusername" class="input username" value="" placeholder="Username"  /><!--END USERNAME-->
  
    <!--PASSWORD--><input type="password" required  name="pwdPassword" class="input password" value="" placeholder="Password" /><!--END PASSWORD-->
     
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="btnLogin" value="Login" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON<input type="submit" name="submit" value="For username and Password" class="register" data-toggle="modal" data-target="#myModal"/>--END REGISTER BUTTON-->
    <span style="color:#DF6025"><strong><h4>For username & Password</h4></strong></span>
  <!-- Trigger the modal with  and Passworda button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Click Here</button>
    </div>
    <!--END FOOTER-->
<div style="position:position;float:left; bottom:0px; font-size:13px;padding:11px 0; font-weight:bold; text-align:center;">
    <div>Copyright <a style='color:red; text-decoration:none' href='http://www.bfastit.com/' target='_blank'>B-Fast IT Ltd</a> <span style="color: red">© <?php echo Date("Y")?></span> All Right Reserve</div>
</div>
</form>
<!--END LOGIN FORM-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        </div>
		<div>
		  <h3 class="modal-title" style="text-align:center; color:#DF6025">Welcome To My School Management System(SMS)</h3>
		</div>
		<hr>
        <div class="modal-body" style="text-align:center">
		<h2 style="background-color:#F3F3F3">For Admin</h2>
          <p><strong>Username : </strong> admin</p>
          <p><strong>Password : </strong> admin</p>
		  
        </div>
		<hr>
		 <div class="modal-body" style="text-align:center">
		<h2 style="background-color:#F3F3F3">For Teacher</h2>
          <p><strong>Username : </strong> teacher</p>
          <p><strong>Password : </strong> teacher</p>
		  
        </div>
		<hr>
		 <div class="modal-body" style="text-align:center">
		<h2 style="background-color:#F3F3F3">For Student</h2>
          <p><strong>Username : </strong> student</p>
          <p><strong>Password : </strong> student</p>
		  
        </div>
		        
		  
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>
