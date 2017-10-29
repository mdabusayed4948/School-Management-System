
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Member   </span></h2>

<?php
	if(isset($_POST['txtMemberId'])){
	    $member_id = $_POST['txtMemberId'];	
	$member_table = $db->query("select id,name,email, phone,address  from say_member where id='$member_id '");
	list($member_id,$mname,$mail,$phone,$address)=$member_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$member_id            = $_POST['txtMemberId'];	
                       $mname     = validate($_POST["txtMname"]);
                        $mail            = validate($_POST["txtEmail"]);
                        $phone        = validate($_POST["txtPhone"]);
                        $address     = validate($_POST["txtAddress"]);
                
	
        
	$db->query("update say_member set name='$mname', email='$mail',phone='$phone',address='$address' where id='$member_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}  

 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow ' ><a href='home.php?item=77'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 5px' ><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=78" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Member ID:</label>
  <div class="col-sm-5">
                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtMemberId"  value="<?php echo isset($member_id)?$member_id:""?>"  >
     
                        <?php
                        $table = $db->query("select id,name,email,phone from say_member");
	while(list($id,$name,$email,$mobile)=$table->fetch_row()){
					
                       	 if($member_id==$id){
                     echo "<option value='$id' selected>Id=$id || $name || $email || $mobile</option>";	
	 }else{
	echo "<option value='$id'>Id=$id || $name || $mail || $mobile</option>"; 
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
  <label class="control-label col-sm-2">Member Name:</label>
  <div class="col-sm-5">
         <input type="text"  name="txtMname"  value="<?php echo isset($mname)?$mname:" "?>"   class="form-control" />  
      
  </div>
 </div>
        <div class="form-group">
  <label class="control-label col-sm-2">E-mail :</label>
  <div class="col-sm-5">
<input type="text"  name="txtEmail"  value="<?php echo isset($mail)?$mail:" "?>"   class="form-control" />  
 
  </div>
 </div>
     <div class="form-group">
  <label class="control-label col-sm-2">Phone :</label>
  <div class="col-sm-5">
      <input type="text"  name="txtPhone"  value="<?php echo isset($phone)?$phone:" "?>"   class="form-control" />  
      
 
  </div>
 </div>

   
 <div class="form-group">
  <label class="control-label col-sm-2">Address :</label>
  <div class="col-sm-5">
      <textarea name="txtAddress" placeholder="Description" cols="20" rows="4" class="form-control" required=""><?php echo isset($address)?$address:" "?></textarea>
   
  </div>
 </div>  
    
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>




