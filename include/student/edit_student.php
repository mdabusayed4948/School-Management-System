
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Student  </span></h2>

<?php
	if(isset($_POST['txtStudentId'])){
		$student_id = $_POST['txtStudentId'];	
		
		$student_table = $db->query("select id,student_name ,photo,father_name,mother_name,address,birth_day,email,gender,class_id,roll,mobile,apply_date,session_id,group_id,status from say_student where id='$student_id '");
		list($student_id,$studentname,$photo,$fname,$mname,$address,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group,$status)=$student_table->fetch_row();
	}
	
        
if(isset($_POST['btnSave'])){
    
    $file_name=$_FILES["abc"]["name"];
	$tmp_name=$_FILES["abc"]["tmp_name"];
	$type=$_FILES["abc"]["type"];
	$file_size=$_FILES["abc"]["size"];
	$div=explode('.',$file_name);
	$file_ext=strtolower(end($div));
	$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
	$upload_image="img/".$unique_image;
                  
                  

	$kb=$file_size/1024; //size convert to kb
	
	
	 if("image/jpeg"==$type||
	    "image/png"==$type||
	    "image/gif"==$type||
                        "application/pdf"==$type){ 
		 
	
		
        if($kb<=2000000){
		
	    copy($tmp_name,$upload_image);
	    
	     $student_id  = $_POST['txtStudentId'];
                     

         	
	$msg=$db->query("update  say_student set  photo='$upload_image' where id='$student_id'");
                
	
	    }
        
        }   
          $student_id  = $_POST['txtStudentId'];	
	$studentname = $_POST['txtName'];
	$fname       = $_POST['txtfname'];
	$mname       = $_POST['txtmname'];
                         $address    = $_POST['txtAddress'];      
	$dob         = $_POST['txtBirth'];
	$mail        = $_POST['txtMail'];
	$gender      = $_POST['cmbGender'];
	$class       = $_POST['cmbClass'];
                        $roll        = $_POST['txtRoll'];
	$mobile      = $_POST['txtMobile'];
	$join        = $_POST['txtJoin'];
	$session     = $_POST['cmbSession'];
                        $group       = $_POST['cmbGroup'];
	$status      = $_POST['cmbStatus'];
	
	$msg=$db->query("update say_student set student_name='$studentname',father_name='$fname',mother_name ='$mname ', address='$address',birth_day='$dob',email='$mail',gender='$gender',class_id='$class',roll='$roll',mobile='$mobile',apply_date='$join',session_id='$session',group_id='$group',status='$status'  where id='$student_id'");
	
        
           
             if( $msg){
  
       echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
      }
    

}

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=8'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 5px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=6" method="post" style="margin-top:30px;" class="form-horizontal" enctype="multipart/form-data"   id="uploadForm">
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Student's ID:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtStudentId"  value="<?php echo isset($student_id)?$student_id:" "?>"   class="form-control" />  
      <span class="boxshadow">
        
           <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>     
      </span>
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Student's Name:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtName"   value="<?php echo isset($studentname)?$studentname:" "?>"  class="form-control" />  
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Father's Name:</label>
  <div class="col-sm-5">
  <input type="text" name="txtfname" value="<?php echo isset($fname)?$fname:" "?>"  class="form-control"/>
 
  </div>
 </div>    
   <div class="form-group">
  <label class="control-label col-sm-2">Mother's Name:</label>
  <div class="col-sm-5">
<input type="text" name="txtmname" value="<?php echo isset($mname)?$mname:" "?>"  class="form-control"/>
 
  </div>
 </div>   
   <div class="form-group">
  <label class="control-label col-sm-2">Address:</label>
  <div class="col-sm-5">
 
      <textarea name="txtAddress"  cols="20" rows="5" class="form-control"><?php echo isset($address)?$address:" "?></textarea>
  </div>
 </div>   
      <div class="form-group">
  <label class="control-label col-sm-2">Date Of Birth:</label>
  <div class="col-sm-5">
           <div  class='input-group date'>
                 <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtBirth" value="<?php echo isset($dob)?$dob:" "?>"  placeholder="yyyy-mm-dd" />
                  
                </div>

 
  </div>
 </div>  
  
   <div class="form-group">
  <label class="control-label col-sm-2">E-mail:</label>
  <div class="col-sm-5">
      <input type="email" name="txtMail"value="<?php echo isset($mail)?$mail:" "?>" class="form-control"/>
 
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
  <label class="control-label col-sm-2">Class:</label>
  <div class="col-sm-5">
<select name="cmbClass" class="form-control">
                  
                        <?php
                        $table = $db->query("select * from sayclass");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($class==$id){
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
  <label class="control-label col-sm-2">Roll No:</label>
  <div class="col-sm-5">
      <input type="text" name="txtRoll"value="<?php echo isset($roll)?$roll:" "?>" class="form-control"/>
 
  </div>
 </div>  
     <div class="form-group">
  <label class="control-label col-sm-2">Mobile No:</label>
  <div class="col-sm-5">
      <input type="text" id="text-basic" name="txtMobile" value="<?php echo isset($mobile)?$mobile:" "?>" class="form-control"style="background-color:#FFFFFF"/>     
     
 
  </div>
 </div>  
   <div class="form-group">
  <label class="control-label col-sm-2">Apply Date:</label>
  <div class="col-sm-5">
      <div  class='input-group date'>
            <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date1" name="txtJoin" value="<?php echo isset($join)?$join:" "?>"  placeholder="yyyy-mm-dd" />
                  
                </div>

 
  </div>
 </div>  
    <div class="form-group">
  <label class="control-label col-sm-2">Session:</label>
  <div class="col-sm-5">
<select name="cmbSession" class="form-control">
                  
                        <?php
                        $table = $db->query("select * from say_session");
	while(list($id,$name)=$table->fetch_row()){
					
                       if($session==$id){
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
  <label class="control-label col-sm-2">Section:</label>
  <div class="col-sm-5">
<select name="cmbGroup" class="form-control">
         
             <?php
              $table = $db->query("select id,group_name from say_c_group");
            while(list($id,$name)=$table->fetch_row()){
					
            if($group==$id){
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
  <label class="control-label col-sm-2">Status:</label>
  <div class="col-sm-5">
  <select name="cmbStatus" class="form-control" required="">
                    	<option><?php echo isset($status)?$status:" "?></option>
                        <option value="Present">Present</option>
                        <option value="Previous">Previous</option>
                    </select>
 
  </div>
 </div>    
    <div class="form-group">
  <label class="control-label col-sm-2">Student's Photo  :</label>
  <div class="col-sm-5">
       
       <input type="file" name="abc" id="abc"  value="<?php echo isset($photo)?$photo:" "?>" >
       <br/>
     <img src="<?php echo $photo;?>" width='90' height='100'/>
  </div>
 </div> 
    
  
    
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
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