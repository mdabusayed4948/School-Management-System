
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Session   </span></h2>

<?php
	if(isset($_POST['txtSessionId'])){
		$session_id = $_POST['txtSessionId'];	
		
		$session_table = $db->query("select id,session_name from say_session where id='$session_id '");
		list($session_id,$session_name)=$session_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$session_id  = $_POST['txtSessionId'];	
	$session_name = $_POST['txtSessionname'];
	
	$db->query("update say_session set session_name='$session_name'  where id='$session_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}             

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow ' ><a href='home.php?item=33'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; padding:3px' ><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="#" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Session ID:</label>
  <div class="col-sm-5">
      <input type="number"  name="txtSessionId"  value="<?php echo isset($session_id)?$session_id:" "?>"   class="form-control" />  
      <span class="boxshadow"> 
    
         <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
      </span>
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Session Name:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtSessionname"   value="<?php echo isset($session_name)?$session_name:" "?>"  class="form-control" />  
 
  </div>
 </div>
 
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>
