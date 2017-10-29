
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Driver  </span></h2>

<?php
	if(isset($_POST['txtDriverId'])){
		$driver_id = $_POST['txtDriverId'];	
		
		$user_table = $db->query("select id,name,photo,email,phone,gender,join_date from say_driver where id='$driver_id'");
		list($driver_id,$name,$photo,$mail,$phone,$gender,$join)=$user_table->fetch_row();
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
	    
	     $driver_id  = $_POST['txtDriverId'];
                     

         	
	$msg=$db->query("update  say_driver set  photo='$upload_image' where id='$driver_id'");
                
	
	    }
	 }
                
	$teacher_id  = $_POST['txtDriverId'];	
	$name = $_POST['txtDname'];
	$mail        = $_POST['txtMail'];
	$gender      = $_POST['cmbGender'];
	
	$phone      = $_POST['txtMobile'];
	$join      = $_POST['txtJoin'];
	
	
	$msg=$db->query("update say_driver set name='$name',email='$mail',gender='$gender' ,phone='$phone',join_date='$join' where id='$driver_id'");
if($msg){
           echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
}	
 
}
?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=89'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="#" method="post" style="margin-top:30px;" class="form-horizontal" enctype="multipart/form-data" id="uploadForm">
    
       <div class="form-group">
  <label class="control-label col-sm-2">Driver's ID:</label>
  <div class="col-sm-5">
          <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtDriverId"  value="<?php echo isset($driver_id)?$driver_id:""?>"  >
     
                        <?php
                        $table = $db->query("select id,name,email,phone from say_driver");
	while(list($id,$dname,$email,$mobile)=$table->fetch_row()){
					
                       	 if($driver_id==$id){
                     echo "<option value='$id' selected>Id=$id || $dname || $email || $mobile</option>";	
	 }else{
	echo "<option value='$id'>Id=$id || $dname || $mail || $mobile</option>"; 
	 }
	}
	?>
                    </select>
  
    <span class="boxshadow">
  
         <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>     
    </span>
 
  </div>
 </div>
    
    <div class="form-group">
  <label class="control-label col-sm-2">Driver's Name:</label>
  <div class="col-sm-5">
   <input type="text" name="txtDname" value="<?php echo isset($name)?$name:" "?>" class="form-control" />  
   
 
  </div>
 </div>  
    
      <div class="form-group">
  <label class="control-label col-sm-2">E-mail:</label>
  <div class="col-sm-5">
      <input type="email" name="txtMail"  value="<?php echo isset($mail)?$mail:" "?>"  class="form-control" />  
  
 
  </div>
 </div>  
    
       <div class="form-group">
  <label class="control-label col-sm-2">Gender:</label>
  <div class="col-sm-5">
 <!-- <input type="radio" name="cmbGender" value="Male" required/>Male
                    <input type="radio" name="cmbGender" value="Female" required/>Female-->
                  <select name="cmbGender" class="form-control" >
                    	<option value="<?php echo isset($gender)?$gender:" "?>" ><?php echo isset($gender)?$gender:" "?></option>
                        <option value="Male" >Male</option>
                         <option value="Female">Female</option>
                        
                    </select> 
 
  </div>
 </div>  
   
   
     <div class="form-group">
  <label class="control-label col-sm-2">Mobile:</label>
  <div class="col-sm-5">
      <input type="text" name="txtMobile"  value="<?php echo isset($phone)?$phone:" "?>"  class="form-control" />  
   
 
  </div>
 </div>
    
     <div class="form-group">
  <label class="control-label col-sm-2">Join Date:</label>
  <div class="col-sm-5">
         <div  class='input-group date'>
                  <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtJoin" value="<?php echo isset($join)?$join:" "?>"  placeholder="yyyy-mm-dd" />
               
                </div>
      
  
   
 
  </div>
 </div>
    
       <div class="form-group">
  <label class="control-label col-sm-2">Student's Photo  :</label>
  <div class="col-sm-5">
       
       <input type="file" name="abc" id="abc"  value="<?php echo isset($photo)?$photo:" "?>" >
       <br>
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