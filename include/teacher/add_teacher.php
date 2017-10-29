
<h2 class='styl boxshadow'><span class='style boxshadow'>Add Teacher</span></h2>
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
	   array_push($errors,"Image Upload field is empty!");	 
	 }
	if(empty($file_name)){
		echo "<span style='color:red; font-weight:bold,'><strong>Error:</strong> Please select any image !!</span>";
	}else{
	$kb=$file_size/1024; //size convert to kb
	
	
	 if("image/jpeg"==$type||
	    "image/png"==$type||
	    "image/gif"==$type||
	    "application/pdf"==$type){ 
		 
	
		
        if($kb<=400){
		
	    copy($tmp_name,$upload_image);
	    
		 echo "";
	
	    }else{
		echo"<div class='alert alert-danger' role='alert'><strong>File size is more than 200kb. Actual file size is $kb kb</strong></div>";
		}
		
	 }else{
	   echo "<div class='alert alert-danger' role='alert'><strong>Invalid format !</strong></div>";
	 }
	}
 	
	$tname      = validate($_POST["txtTname"]);
	$mail       = validate($_POST["txtEmail"]);
	$gender     = validate($_POST["cmbGender"]);
	$dept       = validate($_POST["cmbDepart"]);
	$code       = validate($_POST["txtCode"]);
	$mobile     = validate($_POST["txtMobile"]);
	$join       = validate($_POST["txtJoin"]);
	
	$errors=array();
	
	 if($tname==""){		 
	   array_push($errors,"tname field is empty!");	 
	 }	
	
	$mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

	// Validate e-mail
	if (filter_var($mail, FILTER_VALIDATE_EMAIL) === true) {
		echo "<div class='alert alert-danger' role='alert'><strong>$mail is not a valid email address</strong></div>" ;
	} 

	if(count($errors)==0){
		$db->query("insert into saytbl_teacher(teacher_name,photo,email,gender,c_group_id,teacher_code,mobile,apply_time)values('$tname','$upload_image','$mail ','$gender','$dept','$code','$mobile','$join');");
		 echo "<div class='alert alert-success' role='alert'><strong>Successfully Created!</strong></div>";
		$tname = $photo = $mail = $gender = $dept = $code  = $mobile = $join ="";
	}else{
		  
	    echo "<div class='alert alert-danger' role='alert'><strong>Error: </strong>".implode("<br/>",$errors)."</div>";
	  
	  }
	
	}
	
	function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
?>

<form action="home.php?item=9" method="post" style="margin-top:30px;" class="form-horizontal" enctype="multipart/form-data"   id="uploadForm">
 
    <div class="form-group">
  <label class="control-label col-sm-2"> Name:</label>
  <div class="col-sm-5">
    <input type="text" name="txtTname"  value="<?php echo isset($tname)?$tname:""?>"  placeholder="Teacher Name" class="form-control" required=""/>

  </div>
 </div>
    
      <div class="form-group">
  <label class="control-label col-sm-2">E-mail:</label>
  <div class="col-sm-5">
      <input type="email" name="txtEmail"  placeholder="E-mail" value="<?php echo isset($mail)?$mail:""?>"   class="form-control" required=""/>

  </div>
 </div>
    
     <div class="form-group">
  <label class="control-label col-sm-2">Gender:</label>
  <div class="col-sm-5">
      <select name="cmbGender"  class="form-control" required="">
                    	<option value="<?php echo isset($gender)?$gender:""?>" >--Select--</option>
                        <option value="Male" >Male</option>
                         <option value="Female">Female</option>
                         <!--	<input type="radio" name="cmbGender" value="Male" required/>Male
                    <input type="radio" name="cmbGender" value="Female" required/>Female-->
                    </select>  

  </div>
 </div> 
    
    <div class="form-group">
  <label class="control-label col-sm-2">Section:</label>
  <div class="col-sm-5">
      <select name="cmbDepart" class="form-control" required="">
      <option>--Select--</option>    	
                <?php
             $teacher_table = $db->query("select id,group_name from say_c_group");
        while(list($id,$name)=$teacher_table->fetch_row()){
					
             echo "<option value='$id'> $name</option>";
            }
            ?>
               </select>

  </div>
 </div>  

 <div class="form-group">
  <label class="control-label col-sm-2"> Code:</label>
  <div class="col-sm-5">
      <input type="text" name="txtCode"  placeholder="Code" value="<?php echo isset($code)?$code:""?>"   class="form-control" required=""/>

  </div>
 </div>

 <div class="form-group">
  <label class="control-label col-sm-2">Mobile:</label>
  <div class="col-sm-5">
      <input type="text" name="txtMobile" id="text-basic" placeholder="Mobile No"  value="<?php echo isset($mobile)?$mobile:""?>"   class="form-control" style="background-color:#FFFFFF"/>

  </div>
 </div>

 <div class="form-group">
  <label class="control-label col-sm-2">Join Date:</label>
  <div class="col-sm-5">
          <div  class='input-group date'>
               <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtJoin"  value="<?php echo isset($join)?$join:""?>"  placeholder="yyyy-mm-dd" />
                   
                </div>
    
  </div>
 </div>
    
      <div class="form-group">
  <label class="control-label col-sm-2">Photo:</label>
      <input type="file" name="abc"   id="abc"/>
 </div>
    
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
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