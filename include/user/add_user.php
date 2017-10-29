<h2 class='styl boxshadow'><span class='style boxshadow'>Add User</span></h2>
<?php
  
  if(isset($_POST["btnSubmit"])){
        $role_id           = $_POST["cmbRole"];
         $username   = validate($_POST["txtUsername"]);
          $gender        = validate($_POST["cmbGender"]);
           $mail             = validate($_POST["txtEmail"]);
           $address     = validate($_POST["txtAddress"]);
           $mobile       = validate($_POST["txtMobile"]);
          $join              = validate($_POST["txtJoin"]);
         $pwd              = md5(validate($_POST["pwdPassword"]));
         $repwd         = md5(validate($_POST["pwdRePassword"]));
	  
         $errors         = array();
	 
 if($pwd!=$repwd){		
array_push($errors,"Password did not match."); 		 		  
}
	  
	  
if(count($errors)==0){
		  
 $db->query("insert into sayuser(role_id,username,gender,email,address,mobile,join_date,password)values('$role_id','$username',' $gender','$mail ',' $address ','$mobile',' $join','$pwd')");
		  
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";
		 
 $username=$pwd=$repwd=   $gender  =  $mail=  $address=   $mobile = $join =  "";
	 
}else{
		  
echo "<div class='alert alert-danger' role='alert'><strong> Error:</strong>".implode("<br/>",$errors)."</div>";
	  
}
	  
  }
  function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>
<form action="home.php?item=1" method="post" style="margin-top:30px;" class="form-horizontal" enctype="multipart/form-data">

    <div class="form-group">
  <label class="control-label col-sm-2">Role:</label>
  <div class="col-sm-5">
      <div class="input-group input-group-md">
          <span class="input-group-addon" id="sizing-addon1">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          </span>
     <select name="cmbRole" class="form-control">
            <?php
                        $role_table=$db->query("select id,name from sayrole");	 	 
	 while(list($id,$name)=$role_table->fetch_row()){
	echo "<option value='$id'>$id $name</option>";
	}	 	 
	?>
            </select>
  </div>
  </div>
 </div>
       <div class="form-group">
  <label class="control-label col-sm-2">Username:</label>
  <div class="col-sm-5">
      <div class="input-group input-group-md">
          <span class="input-group-addon" id="sizing-addon1">
                   <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          </span>
   <input type="text" name="txtUsername" value="<?php echo isset($username)?$username:""?>" class="form-control"/>
      </div>
  </div>
 </div> 
    <div class="form-group">
  <label class="control-label col-sm-2">Gender:</label>
  <div class="col-sm-5">
 <div class="input-group input-group-md">
     <span class="input-group-addon" id="sizing-addon1">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
     </span>
    <select name="cmbGender" class="form-control">
                    	<option value="<?php echo isset($gender)?$gender:""?>" >Select Gender</option>
                        <option value="Male" >Male</option>
                         <option value="Female">Female</option>
                        
                    </select>  
                    
                <!--	<input type="radio" name="cmbGender" value="Male" required/>Male
                    <input type="radio" name="cmbGender" value="Female" required/>Female-->
 </div>
  </div>
 </div>   
     <div class="form-group">
  <label class="control-label col-sm-2">E-mail:</label>
  <div class="col-sm-5">
      <div class="input-group input-group-md">
          <span class="input-group-addon" id="sizing-addon1">
                   <span class=" glyphicon glyphicon-envelope" aria-hidden="true"></span>
          </span>
  <input type="mail"  name="txtEmail" placeholder="E-mail" class="form-control"/>
      </div>
  </div>
 </div>   
    <div class="form-group">
  <label class="control-label col-sm-2">Address:</label>
  <div class="col-sm-5">
 <div class="input-group input-group-md">
     <span class="input-group-addon" id="sizing-addon1">
           <span class=" glyphicon glyphicon-list" aria-hidden="true"></span>
     </span>
      <textarea name="txtAddress" placeholder="Address" cols="20" rows="3" class="form-control"></textarea>
 </div>
  </div>
 </div> 
     <div class="form-group">
  <label class="control-label col-sm-2">Mobile No:</label>
  <div class="col-sm-5">
      <div class="input-group input-group-md">
      <span class="input-group-addon" id="sizing-addon1">
                <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
          </span>
  <input type="text"  name="txtMobile" placeholder="Mobile No" class="form-control"/>
      </div>
  </div>
 </div>   
    
 <div class="form-group">
  <label class="control-label col-sm-2">Join Date:</label>
  <div class="col-sm-5">
          <div class="input-group input-group-md">
              <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtJoin"  placeholder="yyyy-mm-dd" />
                   
                </div>
 
 
  </div>
 </div>  
       <div class="form-group">
  <label class="control-label col-sm-2">Password:</label>
  <div class="col-sm-5">
    <div class="input-group input-group-md">
        <span class="input-group-addon" id="sizing-addon1">
                   <span class=" glyphicon glyphicon-pushpin" aria-hidden="true"></span>
        </span>
   <input type="password" name="pwdPassword" value="<?php echo isset($pwd)?$pwd:""?>"  class="form-control"/>
    </div>
  </div>
 </div>
      <div class="form-group">
  <label class="control-label col-sm-2">Retype Password:</label>
  <div class="col-sm-5">
      <div class="input-group input-group-md">
          <span class="input-group-addon" id="sizing-addon1">
                     <span class=" glyphicon glyphicon-pushpin" aria-hidden="true"></span>
          </span>
 <input type="password" name="pwdRePassword" value="<?php echo isset($repwd)?$repwd:""?>"  class="form-control"/>
      </div>
  </div>
 </div>
    <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>

</form>