<?php
  
  if(isset($_POST["btnSubmit"])){
	  $role_id=$_POST["cmbRole"];
	  $username=trim($_POST["txtUsername"]);
	  $pwd=md5(trim($_POST["pwdPassword"]));
	  $repwd=md5(trim($_POST["pwdRePassword"]));
	  
	  $errors=array();
	 
	  if($pwd!=$repwd){		
		array_push($errors,"Password did not match."); 		 		  
	  }
	  
	  
	  if(count($errors)==0){
		  
		  $db->query("insert into user(role_id,username,password)values('$role_id','$username','$pwd')");
		  
		 echo "<div style='color:green'><strong>Success:</strong> Successfully Created!</div>";
		 
		  $username=$pwd=$repwd="";
	 
	  }else{
		  
	    echo "<div style='color:red;'><strong>Error: </strong>".implode("<br/>",$errors)."</div>";
	  
	  }
	  
	  
	  
  }

?>
<form action="home.php?item=1" method="post">
<div align="center">
<div>
   Role<br/>
   <select name="cmbRole">
    <?php
	 $role_table=$db->query("select id,name from role");	 	 
     while(list($id,$name)=$role_table->fetch_row()){
		 echo "<option value='$id'>$id $name</option>";
     }	 	 
    ?>
   </select> 
 </div>
 <div>
   Username<br/>
   <input type="text" name="txtUsername" value="<?php echo isset($username)?$username:""?>" />   
 </div>
 <div>
   Password<br/>
   <input type="password" name="pwdPassword" value="<?php echo isset($pwd)?$pwd:""?>" />   
 </div>
 <div>
   Retype Password<br/>
   <input type="password" name="pwdRePassword" value="<?php echo isset($repwd)?$repwd:""?>" />   
 </div>
 
 <input type="submit" value="Submit" name="btnSubmit" />
 </div>
</form>