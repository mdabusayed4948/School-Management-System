
<h2 class='styl boxshadow'><span class='style boxshadow'>Subject List Edit Form</span></h2>

<?php
	if(isset($_POST['txtSubjectId'])){
		$subject_id = $_POST['txtSubjectId'];	
		
                
		$subject_table = $db->query("select id,subject_name from say_subject  where id='$subject_id '");
		list($subject_id,$subject_name)=$subject_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$subject_id  = $_POST['txtSubjectId'];	
	$subject_name = $_POST['txtSubjectname'];
	
        
	$db->query("update say_subject set subject_name='$subject_name'  where id='$subject_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}             

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=56'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=57" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Subject ID:</label>
  <div class="col-sm-5">
      <input type="number"  name="txtSubjectId"  value="<?php echo isset($subject_id)?$subject_id:" "?>"   class="form-control" />  
       
      <span class="boxshadow">
      
           <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>     
      </span>
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Subject Name:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtSubjectname"   value="<?php echo isset($subject_name)?$subject_name:" "?>"  class="form-control" />  
 
  </div>
 </div>
    
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>
