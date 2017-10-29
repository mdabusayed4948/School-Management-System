<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Class Shedule</span></h2>
<?php

if(isset($_POST['txtSheduleId'])){
		$shedule_id = $_POST['txtSheduleId'];	
		
		$session_table = $db->query("select id,class_id,photo from say_classschedule where id='$shedule_id '");
		list($shedule_id,$cname,$photo)=$session_table->fetch_row();
	}
	


        


if(isset($_POST["btnSubmit"])){
	
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
	    
	     $shedule_id  = $_POST['txtSheduleId'];
                     
	$msg=$db->query("update  say_classschedule set  photo='$upload_image' where id='$shedule_id'");
                
	
	    }
        
        }   
              $shedule_id  = $_POST['txtSheduleId'];
                   $cname      = validate($_POST["cmbClass"]);
           $msg= $db->query("update  say_classschedule set class_id='$cname'  where id='$shedule_id'"); 
           
             if( $msg){
  
       echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
      }
        }
 
       
   
         function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
         ?>

<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=83'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 5px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=84" method="post" style="margin-top:30px;" class="form-horizontal"  enctype="multipart/form-data"  id="uploadForm">
 

    <div class="col-sm-6" hidden="">
      <input type="number"  name="txtSheduleId"  value="<?php echo isset($shedule_id)?$shedule_id:" "?>"   class="form-control" />  
   <span class="boxshadow"> 
        <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
   
   </span>
 
  </div>
 
      <div class="form-group">
  <label class="control-label col-sm-2">Class :</label>
  <div class="col-sm-3">
      <select name="cmbClass" class="form-control" required="">
                    		<option >--Select--</option>
                        <?php
                        $class = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$class->fetch_row()){
                      if($cname==$id){				
                        echo "<option value='$id' selected>$name</option>";
                        }else{
                              echo "<option value='$id' >$name</option>";   
                        }
	}
	?>
                    </select>
  
 
  </div>
 </div>   
    
    
     <div class="form-group">
  <label class="control-label col-sm-2">Class Shedule Image  :</label>
  <div class="col-sm-6">
       <input type="file" name="abc" id="abc"  value="<?php echo isset($photo)?$photo:" "?>" >
       <br>
     <img src="<?php echo $photo;?>" width='100' height='110'/>
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









