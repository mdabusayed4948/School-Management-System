<h2 class='styl boxshadow'><span class='style boxshadow'>Edit  Parents  </span></h2>

<?php
if(isset($_POST['txtPId'])){
    $p_id=$_POST['txtPId'];
    $p_table=$db->query("select id,student_id,email,phone,profession,address,gender from parents  where id='$p_id'");
   // $user_table = $db->query("select id,student_id,source_id,income_date, paid_amount,due_amount from payment where id='$fee_id '");
    list($p_id,$sid,$mail,$phone,$profession,$address,$gender)=$p_table->fetch_row();
    
}

if(isset($_POST['btnSave'])){
	$p_id  = $_POST['txtPId'];	
	$sid = $_POST['txtId'];
	$mail        = $_POST['txtMail'];
	$phone      = $_POST['txtPhone'];
	$profession     = $_POST['txtProfession'];
                        $address     = $_POST['txtAddress'];
                        $gender     = $_POST['cmbGender'];

	
	
	$db->query("update parents set student_id='$sid',email='$mail',phone='$phone',profession='$profession',address='$address',gender='$gender'  where id='$p_id'");
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
}
?>
<div   style='margin-left:10px;' class="btn btn-default"><a href='home.php?item=37'  style='font-weight:bold; color:#5A5A5A; text-decoration:none;margin:5px;'><span class=' boxshadow' style="padding:3px"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>  Return </span></a></div>
<form action="#" method="post" style="margin-top:30px;" class="form-horizontal" >
    <div class="form-group">
  <label class="control-label col-sm-2">Parents ID:</label>
  <div class="col-sm-6">
    <input type="number" name="txtPId" value="<?php echo isset($p_id)?$p_id:" "?>"  class="form-control" />  
      <span class="boxshadow"> 
     
         <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
      </span>
 
  </div>
 </div>
    
      <div class="form-group">
  <label class="control-label col-sm-2">Parents Name :</label>
  <div class="col-sm-6 ">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtId"  value="<?php echo isset($sid)?$sid:""?>" data-size="10" class="form-control" >
	<option>--Select--</option>
		   <?php
                        $table = $db->query("select id,student_name,email,mobile,father_name,mother_name from say_student");
	while(list($id,$name,$email,$mobile,$fname,$mname)=$table->fetch_row()){
	 if($sid==$id){				
                        echo "<option value='$id' selected>ID=$id || $name || $email || $mobile || $fname || $mname</option>";
	 }else{
               echo "<option value='$id'>ID=$id || $name || $email || $mobile || $fname || $mname</option>";
        }
       					
}
						
?>
      
      </select>
  
    

  </div>
 </div>  
  
      <div class="form-group">
  <label class="control-label col-sm-2">E-mail Address :</label>
  <div class="col-sm-6">
      <input type="email" name="txtMail"  value="<?php echo isset($mail)?$mail:""?>"   class="form-control" required=""/>
 
  </div>
 </div>  
    <div class="form-group">
  <label class="control-label col-sm-2">Address:</label>
  <div class="col-sm-6">
 
      <textarea name="txtAddress" placeholder="Address" cols="20" rows="3" class="form-control"><?php echo isset($address)?$address:""?></textarea>
  </div>
 </div>  
     <div class="form-group">
  <label class="control-label col-sm-2">Gender:</label>
  <div class="col-sm-6">
 
    <select name="cmbGender" class="form-control">
                    	<option value="<?php echo isset($gender)?$gender:""?>" ><?php echo isset($gender)?$gender:""?></option>
                        <option value="Male" >Male</option>
                         <option value="Female">Female</option>
                        
                    </select>  
                    
                <!--	<input type="radio" name="cmbGender" value="Male" required/>Male
                    <input type="radio" name="cmbGender" value="Female" required/>Female-->
  </div>
 </div>  
      <div class="form-group">
  <label class="control-label col-sm-2">Phone :</label>
  <div class="col-sm-6">
      <input type="number" name="txtPhone"  value="<?php echo isset($phone)?$phone:""?>"   class="form-control" required=""/>
 
  </div>
 </div>  
      <div class="form-group">
  <label class="control-label col-sm-2">Profession :</label>
  <div class="col-sm-6">
       <input type="text" name="txtProfession"  value="<?php echo isset($profession)?$profession:""?>"   class="form-control" required=""/>
 
  </div>
 </div>  
    
    <div class="form-group">
  <div class="col-sm-offset-2 col-sm-6">
  <input type="submit" name="btnSave" value="Submit" class="btn btn-primary  " />
  
  </div>
 </div>     
    
</form>
