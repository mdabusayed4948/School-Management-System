<h2 class='styl boxshadow'><span class='style boxshadow'>Create Class Shedule</span></h2>
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
		 
	
		
        if($kb<=2000000){
		
	    copy($tmp_name,$upload_image);
	    
		 echo " ";
	
	    }else{
                
		echo"<div class='alert alert-danger' role='alert'><strong>File size is more than 200kb. Actual file size is $kb kb</strong></div> ";
		}
		
	 }else{
	   echo "<div class='alert alert-danger' role='alert'><strong>Invalid format !</strong></div>";
         }
       
        
            $cname      = validate($_POST["cmbClass"]);
            
    $errors=array();
	

          if($cname==""){		 
	   array_push($errors,"Class Name field is empty!");	 
	 }
             
         	if(count($errors)==0){
		$db->query("insert into say_classschedule(class_id,photo)values('$cname','$upload_image');");
                
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


<form action="home.php?item=74" method="post" style="margin-top:30px;" class="form-horizontal"  enctype="multipart/form-data"  id="uploadForm">
 
 
      <div class="form-group">
  <label class="control-label col-sm-2">Class :</label>
  <div class="col-sm-3">
      <select name="cmbClass" class="form-control" required="">
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
  <label class="control-label col-sm-2">Class Shedule Image  :</label>
  <div class="col-sm-6">
       <input type="file" name="abc" id="abc"  >
    
  </div>
 </div> 


   
   
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-6">
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
            $('#uploadForm').after('<img src="'+e.target.result+'" width="680" height="480"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#abc").change(function () {
    filePreview(this);
});
</script>









