<link href="css/style.css" rel="stylesheet" type="text/css"/>
<h2 class='styl boxshadow'><span class='style boxshadow'>  Edit  User</span></h2>

<?php
	if(isset($_POST['txtUserId'])){
		$user_id = $_POST['txtUserId'];	
		
		$user_table = $db->query("select id,role_id,username,gender,email,address,mobile,join_date,password from sayuser  where id='$user_id '");
		list($id,$role,$username,$gender,$mail,$address,$mobile,$join,$password)=$user_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$user_id  = $_POST['txtUserId'];
	$role         = $_POST['cmbRole'];		
	$username = $_POST['txtName'];
                         $gender        = $_POST["cmbGender"];
                     $mail             = $_POST["txtMail"];
                    $address     = $_POST["txtAddress"];
                     $mobile       = $_POST["txtMobile"];
                     $join              = $_POST["txtJoin"];
                       $pwd              = md5($_POST["pwdPassword"]);
                    $repwd         = md5($_POST["pwdRePassword"]);
                    
	  $errors         = array();
	 
 if($pwd!=$repwd){		
array_push($errors,"Password did not match."); 		 		  
}
	  
	  
if(count($errors)==0){
	$db->query("update sayuser set role_id='$role',username='$username',gender='$gender', email='$mail',address='$address',mobile='$mobile',join_date='$join',password='$pwd' where id='$user_id'");
	echo "<div class='alert alert-success' role='alert'><strong> Successfully updated!</strong></div>";
		 
                     
     }else{
		  
echo "<div class='alert alert-danger' role='alert'><strong> Error:</strong>".implode("<br/>",$errors)."</div>";
	  
}

}
?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=4'  style='font-weight:bold; color:#5A5A5A; text-decoration:none;padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Return</a></span></div>
<form action="home.php?item=10" method="post" style="margin-top:30px;" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
  <label class="control-label col-sm-2">UserId:</label>
  <div class="col-sm-5">
 <input type="text" name="txtUserId" value="<?php echo isset($user_id)?$user_id:" "?>" class="form-control"/>
 <span class="boxshadow">
  
      <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>     
 </span>
  </div>
 </div> 
    
   <div class="form-group">
  <label class="control-label col-sm-2">Role:</label>
  <div class="col-sm-5">

      <select name="cmbRole" class="form-control">
                  
                        <?php
                        $table = $db->query("select * from sayrole");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($role==$id){
                     echo "<option value='$id' selected>$name</option>";	
	 }else{
	echo "<option value='$id'>$name</option>"; 
	 }
	}
	?>
                    </select>
  </div>
 </div>   
   
     <div class="form-group">
  <label class="control-label col-sm-2">Username:</label>
  <div class="col-sm-5">
 <input type="text" name="txtName" value="<?php echo isset($username)?$username:" "?>" class="form-control"/>
       
  </div>
 </div>  
   <div class="form-group">
  <label class="control-label col-sm-2">Gender:</label>
  <div class="col-sm-5">
<select name="cmbGender" class="form-control">
                    	<option value="<?php echo isset($gender)?$gender:" "?>" ><?php echo isset($gender)?$gender:" "?></option>
                        <option value="Male" >Male</option>
                         <option value="Female">Female</option>
                        
                    </select> 
 
  </div>

 </div>    
    
   <div class="form-group">
  <label class="control-label col-sm-2">E-mail:</label>
  <div class="col-sm-5">
<input type="text" name="txtMail"value="<?php echo isset($mail)?$mail:" "?>" class="form-control"/>
 
  </div>
 </div>  
    
     <div class="form-group">
  <label class="control-label col-sm-2">Address:</label>
  <div class="col-sm-5">
 
      <textarea name="txtAddress"  cols="20" rows="5" class="form-control"><?php echo isset($address)?$address:" "?></textarea>
  </div>
 </div>   
    
     <div class="form-group">
  <label class="control-label col-sm-2">Mobile No:</label>
  <div class="col-sm-5">
<input type="text" name="txtMobile" value="<?php echo isset($mobile)?$mobile:" "?>"  class="form-control"/>
 
  </div>
 </div> 
    
      <div class="form-group">
  <label class="control-label col-sm-2">Join Date:</label>
  <div class="col-sm-5">
            <div class="input-group input-group-md">
              <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtJoin"  placeholder="yyyy-mm-dd"  value="<?php echo isset($join)?$join:" "?>"/>
                   
                </div>

  </div>
 </div>   
    
    <div class="form-group">
  <label class="control-label col-sm-2">Password:</label>
  <div class="col-sm-5">
   <input type="password" name="pwdPassword" value="<?php echo isset($password)?$password:""?>"  class="form-control"/>
  
  </div>
 </div>
      <div class="form-group">
  <label class="control-label col-sm-2">Retype Password:</label>
  <div class="col-sm-5">
 <input type="password" name="pwdRePassword" value="<?php echo isset($password)?$password:""?>"  class="form-control"/>
  
  </div>
 </div> 
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div> 
	
</form>