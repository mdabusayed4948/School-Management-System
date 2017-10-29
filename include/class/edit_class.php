
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Class   </span></h2>

<?php
	if(isset($_POST['txtClassId'])){
		$class_id = $_POST['txtClassId'];	
		
                
		$class_table = $db->query("select id,class_name,tbl_teacher_teacher_id from sayclass  where id='$class_id '");
		list($class_id,$class_name,$tid)=$class_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$class_id  = $_POST['txtClassId'];	
	$class_name = $_POST['txtClassname'];
	$teacher  =$_POST["cmbTeacher"];
        
	$db->query("update sayclass set class_name='$class_name',tbl_teacher_teacher_id='$teacher'  where id='$class_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}             

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=27'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="#" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Class ID:</label>
  <div class="col-sm-5">
      <input type="number"  name="txtClassId"  value="<?php echo isset($class_id)?$class_id:" "?>"   class="form-control" />  
      <span class="boxshadow"> 
         <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
      </span>
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Class Name:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtClassname"   value="<?php echo isset($class_name)?$class_name:" "?>"  class="form-control" />  
 
  </div>
 </div>
      <div class="form-group">
  <label class="control-label col-sm-2">Teacher Name:</label>
  <div class="col-sm-5">
<select name="cmbTeacher" class="form-control" >
                    	
                    <?php
	$dep_tble=$db->query("select teacher_id,teacher_name from saytbl_teacher");
	while(list($id,$name)=$dep_tble->fetch_row()){
							 
	 if($tid==$id){
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
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>