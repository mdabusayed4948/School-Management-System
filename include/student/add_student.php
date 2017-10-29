  
<h2 class='styl boxshadow'><span class='style boxshadow'>Add Student</span></h2>


<?php

if(isset($_POST["btnSubmit"])){
	
	$file_name=$_FILES["abc"]["name"];
	$tmp_name=$_FILES["abc"]["tmp_name"];
	$type=$_FILES["abc"]["type"];
	$file_size=$_FILES["abc"]["size"];
	$div=explode('.',$file_name);
	$file_ext=strtolower(end($div));
	$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
	$upload_image="img/".$unique_image;
                         if($upload_image==""){		 
	   array_push($errors,"ImageUpload field is empty!");	 
	 }
	if(empty($file_name)){
		echo "<div class='alert alert-danger' role='alert'><strong> Please select any image !!</strong></div>";
	}else{
	$kb=$file_size/1024; //size convert to kb
	
	
	 if("image/jpeg"==$type||
	    "image/png"==$type||
	    "image/gif"==$type||
	    "application/pdf"==$type){ 
		 
	
		
        if($kb<=400){
		
	    copy($tmp_name,$upload_image);
	    
		 echo " ";
	
	    }else{
                
		echo"<div class='alert alert-danger' role='alert'><strong>File size is more than 200kb. Actual file size is $kb kb</strong></div> ";
		}
		
	 }else{
	   echo "<div class='alert alert-danger' role='alert'><strong>Invalid format !</strong></div>";
	 }
	
 	
	$sname      = validate($_POST["txtSname"]);
	$fname      = validate($_POST["txtFname"]);
	$mname      = validate($_POST["txtMname"]);
                        $address      = validate($_POST["txtAddress"]);
	
	 /* $day      = validate($_POST["cmbday"]);
	  $month    = validate($_POST["cmbmonth"]);
	  $year     = validate($_POST["cmbyear"]);
	  
	$dob      = $year."-".$month."-".$day;
	*/
	$dob        = $_POST["txtDob"];
	$mail       = validate($_POST["txtEmail"]);
	$gender     = validate($_POST["cmbGender"]);
	$class      = validate($_POST["cmbClass"]);
	$Roll       = validate($_POST["txtRoll"]);
	$mobile     = validate($_POST["txtMobile"]);
	$join       = validate($_POST["txtJoin"]);
	$session    = validate($_POST["cmbSession"]);
	$group      = validate($_POST["cmbGroup"]);
	$status      = validate($_POST["cmbStatus"]);
	$errors=array();
	
	 if($sname==""){		 
	   array_push($errors,"Student's Name field is empty!");	 
	 }
          if($fname==""){		 
	   array_push($errors,"Father's Name field is empty!");	 
	 }
          if($mname==""){		 
	   array_push($errors,"Mother's name field is empty!");	 
	 }
          if($address==""){		 
	   array_push($errors,"Address field is empty!");	 
	 }
          if($dob==""){		 
	   array_push($errors,"Dath of Birth field is empty!");	 
	 }
          if($gender==""){		 
	   array_push($errors,"Gender field is empty!");	 
	 }
          if($class==""){		 
	   array_push($errors,"Class field is empty!");	 
	 }
          if($Roll==""){		 
	   array_push($errors,"Roll field is empty!");	 
	 }
          if($mobile==""){		 
	   array_push($errors,"Mobile field is empty!");	 
	 }
          if($join==""){		 
	   array_push($errors,"Apply Date field is empty!");	 
	 }
          if($session==""){		 
	   array_push($errors,"Session field is empty!");	 
	 }
          if($group==""){		 
	   array_push($errors,"Group field is empty!");	 
	 }
           if($status==""){		 
	   array_push($errors,"Status field is empty!");	 
	 }
                          if($mail==""){		 
	   array_push($errors,"E-mail field is empty!");	 
	 }
	
	$mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

	// Validate e-mail
	if (filter_var($mail, FILTER_VALIDATE_EMAIL) === true) {
		echo"<div class='alert alert-success' role='alert'><strong>$mail is not a valid email address</strong></div>";
	} 

	if(count($errors)==0){
		$db->query("insert into say_student(student_name,photo,father_name, mother_name,address,birth_day, email,gender,class_id,roll,mobile,apply_date,session_id,group_id,status)values('$sname','$upload_image','$fname','$mname','$address','$dob','$mail ','$gender','$class','$Roll','$mobile','$join','$session','$group','$status');");
		 echo "<div class='alert alert-success' role='alert'><strong>Successfully Created!</strong></div>";
		$sname = $photo =$fname=$mname=$dob= $mail = $gender = $class = $Roll  = $mobile = $join =$session =$fee=$group="";
	}else{
		  
	    echo "<div style='color:red;'><strong>Error: </strong>".implode("<br/>",$errors)."</div>";
	  
	  }
	}
	}
	
	 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
?>


<form action="home.php?item=5" method="post" style="margin-top:30px;" class="form-horizontal" enctype="multipart/form-data"  id="uploadForm">

  
 <div class="form-group">
  <label class="control-label col-sm-2">Student Name:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtSname"  value="<?php echo isset($sname)?$sname:""?>"  placeholder="Student Name" class="form-control" required=""/>
  
  </div>
 </div>

<div class="form-group">
  <label class="control-label col-sm-2">Father's Name:</label>
  <div class="col-sm-5">
  <input type="text"  name="txtFname" placeholder="Father's Name" class="form-control" required=""/>
 
  </div>
 </div>    
 
 <div class="form-group">
  <label class="control-label col-sm-2">Mother's Name:</label>
  <div class="col-sm-5">
  <input type="text"  name="txtMname" placeholder="Mother's Name" class="form-control" required=""/>
 
  </div>
 </div>  
   
    <div class="form-group">
  <label class="control-label col-sm-2">Address:</label>
  <div class="col-sm-5">
 
      <textarea name="txtAddress" placeholder="Address" cols="20" rows="3" class="form-control" required=""></textarea>
  </div>
 </div>   
 
<div class="form-group">
  <label class="control-label col-sm-2">Date Of Birth:</label>
  <div class="col-sm-5" >
        <div  class='input-group date'>
                 <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtDob"  placeholder="yyyy-mm-dd" required=""/>
               
                </div>
 
   
  </div>
 </div>       	
    
  <div class="form-group">
  <label class="control-label col-sm-2">E-mail:</label>
  <div class="col-sm-5">
      <input type="email"  name="txtEmail" placeholder="E-mail" class="form-control" required=""/>
 
  </div>
 </div>    
    
<div class="form-group">
  <label class="control-label col-sm-2">Gender:</label>
  <div class="col-sm-5">
 
    <select name="cmbGender" class="form-control" required="">
                    	<option value="<?php echo isset($gender)?$gender:""?>" >--Select--</option>
                        <option value="Male" >Male</option>
                         <option value="Female">Female</option>
                        
                    </select>  
                    
                <!--	<input type="radio" name="cmbGender" value="Male" required/>Male
                    <input type="radio" name="cmbGender" value="Female" required/>Female-->
  </div>
 </div>   
    
<div class="form-group">
  <label class="control-label col-sm-2">Class :</label>
  <div class="col-sm-5">
    <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbClass"  value="<?php echo isset($class)?$class:""?>" data-size="10">
     
                    		<option >--Select--</option>
                        <?php
                        $class = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$class->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                    </select>
  
 
  </div>
 </div>    
    
 <div class="form-group">
  <label class="control-label col-sm-2">Roll No:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtRoll" placeholder="Roll No" class="form-control" required=""/>
 
  </div>
 </div>      
 
 <div class="form-group">
  <label class="control-label col-sm-2">Mobile No:</label>
  <div class="col-sm-5">
  
   <input type="text" id="text-basic" name="txtMobile" placeholder="Mobile No" class="form-control"style="background-color:#FFFFFF"/>
  </div>
 </div>   
    
 <div class="form-group">
  <label class="control-label col-sm-2">Apply Date:</label>
  <div class="col-sm-5">
           <div  class='input-group date'>
                     <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date1" name="txtJoin"  placeholder="yyyy-mm-dd" required=""/>
              
                </div>
 
  </div>
 </div>  
    
 <div class="form-group">
  <label class="control-label col-sm-2">Session:</label>
  <div class="col-sm-5">
   <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSession"  value="<?php echo isset($session)?$session:""?>" data-size="10">
     
                    	<option>--Select--</option>
                        <?php
                        $session = $db->query("select id,session_name from {$ext}session");
	while(list($id,$name)=$session->fetch_row()){
					
                        echo "<option value='$id'> $name</option>";
	}
	?>
                    </select>
 
 
  </div>
 </div> 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Section  :</label>
  <div class="col-sm-5">
  <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbGroup"  value="<?php echo isset($group)?$group:""?>" data-size="10">
    
   
                    	<option>--Select--</option>
                        <?php
                        $table = $db->query("select id,group_name from {$ext}c_group");
                        while(list($id,$name)=$table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                    </select>
 
 
  </div>
 </div>  
     <div class="form-group">
  <label class="control-label col-sm-2">Status  :</label>
  <div class="col-sm-5">
     <select name="cmbStatus" class="form-control" required="">
                    	
      <option value="Present">Present</option>
                       
                    </select>
 
 
  </div>
 </div>  
  
 <div class="form-group">
  <label class="control-label col-sm-2">Photo:</label>
  <div class="col-sm-5">
 
      <input type="file" name="abc"   id="abc"/>

 </div>    
 </div>
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>
   
</form>

<script>
  function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#uploadForm').after('<img src="'+e.target.result+'" width="180" height="180"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#abc").change(function () {
    filePreview(this);
});
</script>

