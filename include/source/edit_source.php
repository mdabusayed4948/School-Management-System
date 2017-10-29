
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Source   </span></h2>

<?php
	if(isset($_POST['txtSourceId'])){
		$source_id = $_POST['txtSourceId'];	
		
		$session_table = $db->query("select id,source_name from source where id='$source_id '");
		list($source_id,$source_name)=$session_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$source_id  = $_POST['txtSourceId'];	
	$source_name = $_POST['txtSourcename'];
	
	$db->query("update source set source_name='$source_name'  where id='$source_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}             

?>
<div    style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=41'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin-left:10px; padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=42" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Source ID:</label>
  <div class="col-sm-5">
            <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtSourceId" value="<?php echo isset($source_id)?$source_id:" "?>"  >
                    		
                        <?php
                        $exam_table = $db->query("select id, source_name from source");
	while(list($id,$name)=$exam_table->fetch_row()){
               if($source_id==$id){				
                        echo "<option value='$id' selected>$id || $name </option>";
        }else{
               echo "<option value='$id'>$id || $name </option>";
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
  <label class="control-label col-sm-2">Source Name:</label>
  <div class="col-sm-5">
      <input type="text"  name="txtSourcename"   value="<?php echo isset($source_name)?$source_name:" "?>"  class="form-control" />  
 
  </div>
 </div>
 
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>
