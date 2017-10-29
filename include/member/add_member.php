<h2 class='styl boxshadow'><span class='style boxshadow'>Add Member </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	
	$mname     = validate($_POST["txtMname"]);
                        $mail            = validate($_POST["txtEmail"]);
                        $phone        = validate($_POST["txtPhone"]);
                        $address     = validate($_POST["txtAddress"]);
                
	$errors=array();
	
	  if($mname==""){		 
	   array_push($errors,"Member Name field is empty!");	 
	 }
                         if($mail==""){		 
	   array_push($errors,"E-mail  field is empty!");	 
	 }
                         if($phone==""){		 
	   array_push($errors,"Phone Number field is empty!");	 
	 }
                         if($address==""){		 
	   array_push($errors," Address field is empty!");	 
	 }
                       
                        
	
	 
if(count($errors)==0){
$db->query("INSERT INTO say_member (name,email,phone,address) VALUES ('$mname','$mail','$phone','$address');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$mname =$mail  =  $phone =$address=""; 
}else{
echo "<div class='alert alert-danger' role='alert'><strong> Error:</strong>".implode("<br/>",$errors)."</div>";		  
  //echo "<div style='color:red;'><strong>Error: </strong>".implode("<br/>",$errors)."</div>";
	  
  }
}

 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>



<form action="home.php?item=76" method="post" style="margin-top:30px;" class="form-horizontal" >
 
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Member Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtMname" placeholder=" Input  Member Name " value="<?php echo isset($mname)?$mname:"" ?>"  class="form-control" required=""/>
  </div>
 </div> 
    
    
     <div class="form-group">
  <label class="control-label col-sm-2">E-mail  :</label>
  <div class="col-sm-5">
      <input type="text" name="txtEmail" placeholder=" Input  Email " value="<?php echo isset($mail)?$mail:"" ?>"  class="form-control" required=""/>
  </div>
 </div> 

 <div class="form-group">
  <label class="control-label col-sm-2">Phone :</label>
  <div class="col-sm-5">
      <input type="text" name="txtPhone" placeholder=" Input  Phone " value="<?php echo isset($phone)?$phone:"" ?>" class="form-control" required=""/>
   
  </div>
 </div>  
   
  <div class="form-group">
  <label class="control-label col-sm-2">Address :</label>
  <div class="col-sm-5">
      <textarea name="txtAddress" placeholder="Address" cols="20" rows="4" class="form-control" value="<?php echo isset($address)?$address:"" ?>" required=""></textarea>
   
  </div>
 </div>      
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
	
</form>









