
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Section   </span></h2>

<?php
	if(isset($_POST['txtSectionId'])){
		$section_id = $_POST['txtSectionId'];	
		
		$class_table = $db->query("select id,group_name from say_c_group where id='$section_id '");
		list($section_id,$section_name)=$class_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$section_id  = $_POST['txtSectionId'];	
	$section_name = $_POST['txtSectionname'];
	
	$db->query("update say_c_group set group_name='$section_name'  where id='$section_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}             

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow ' ><a href='home.php?item=30'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; padding:3px' ><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="#" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Section ID:</label>
  <div class="col-sm-5">
      <input type="number"  name="txtSectionId"  value="<?php echo isset($section_id)?$section_id:" "?>"   class="form-control" />  
   <span class="boxshadow"> 
    
      <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
   </span>
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Section Name:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtSectionname"   value="<?php echo isset($section_name)?$section_name:" "?>"  class="form-control" />  
 
  </div>
 </div>
 
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>
