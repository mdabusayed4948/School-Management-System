<h2 class='styl boxshadow'><span class='style boxshadow'>Add Parents  </span></h2>

<?php
if(isset($_POST["btnSubmit"])){
    $sid                  = $_POST["txtId"];
    $mail               = $_POST["txtMail"];
    $phone           = $_POST["txtPhone"];
    $profession = $_POST["txtProfession"];
      $address             = $_POST["txtAddress"];
        $gender               = $_POST["cmbGender"];
    
    $errors=array();
    
      if($sid==""){		 
	   array_push($errors,"Parents field is empty!");	 
	 }
           if($mail==""){		 
	   array_push($errors,"Mail field is empty!");	 
	 }
           if($phone==""){		 
	   array_push($errors,"Phone field is empty!");	 
	 }
           if($profession==""){		 
	   array_push($errors,"Profession field is empty!");	 
	 }
           if($address==""){		 
	   array_push($errors,"Profession field is empty!");	 
	 }
           if($gender==""){		 
	   array_push($errors,"Profession field is empty!");	 
	 }
         
         if(count($errors)==0){
            $db->query ("insert into parents(student_id,email,phone,profession,address,gender)values('$sid','$mail','$phone','$profession','$address','$gender');");
            echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";
            $sid=$mail=$phone=$profession="";
         }  else {
             echo "<div class='alert alert-danger' role='alert'><strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
         }
         
}
?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=37'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 3px'><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> parents List</a></span></div>

<form action="home.php?item=36" method="post" style="margin-top:30px;" class="form-horizontal" >
    <div class="form-group">
  <label class="control-label col-sm-2">Parents Name :</label>
  <div class="col-sm-5">
       <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtId"  value="<?php echo isset($sid)?$sid:""?>" data-size="10" class="form-control" >
	<option>--Select--</option>
		   <?php
                        $table = $db->query("select id,student_name,email,mobile,father_name,mother_name from say_student");
	while(list($id,$name,$mail,$mobile,$fname,$mname)=$table->fetch_row()){
					
                        echo "<option value='$id'>ID=$id || $name || $mail || $mobile || $fname || $mname</option>";
						
}
						
?>
      
      </select>
    
  </div>
 </div>  
      <div class="form-group">
  <label class="control-label col-sm-2">E-mail Address :</label>
  <div class="col-sm-5">
      <input type="email" name="txtMail"  value="<?php echo isset($mail)?$mail:""?>"  placeholder="E-mail address" class="form-control" required=""/>
 
  </div>
 </div>  
    <div class="form-group">
  <label class="control-label col-sm-2">Address:</label>
  <div class="col-sm-5">
 
      <textarea name="txtAddress" placeholder="Address" cols="20" rows="3" class="form-control"></textarea>
  </div>
 </div>   
    <div class="form-group">
  <label class="control-label col-sm-2">Gender:</label>
  <div class="col-sm-5">
 
    <select name="cmbGender" class="form-control">
                    	<option value="<?php echo isset($gender)?$gender:""?>" >--Select--</option>
                        <option value="Male" >Male</option>
                         <option value="Female">Female</option>
                        
                    </select>  
                    
                <!--	<input type="radio" name="cmbGender" value="Male" required/>Male
                    <input type="radio" name="cmbGender" value="Female" required/>Female-->
  </div>
 </div>   
      <div class="form-group">
  <label class="control-label col-sm-2">Phone :</label>
  <div class="col-sm-5">
      <input type="number" name="txtPhone"  value="<?php echo isset($phone)?$phone:""?>"  placeholder="phone number" class="form-control" required=""/>
 
  </div>
 </div>  
      <div class="form-group">
  <label class="control-label col-sm-2">Profession :</label>
  <div class="col-sm-5">
       <input type="text" name="txtProfession"  value="<?php echo isset($profession)?$profession:""?>"  placeholder="Profession" class="form-control" required=""/>
 
  </div>
 </div>  
    
    <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
    
</form>
