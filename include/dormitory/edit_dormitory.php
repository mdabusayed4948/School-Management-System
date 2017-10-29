
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Dormitory   </span></h2>

<?php
	if(isset($_POST['txtDormId'])){
	    $dorm_id = $_POST['txtDormId'];	
	 
                        
                
		$dorm_table = $db->query("select id,name, number_of_room,dormdesc from say_dormitories  where id='$dorm_id '");
		list($dorm_id,$name,$dnum,$desc)=$dorm_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$dorm_id      = validate( $_POST['txtDormId']);	
                        $name            =validate ($_POST["txtDormname"]);
                        $dnum             = validate($_POST["txtDnum"]);
	     $desc          =validate( $_POST["dormdesc"]) ;
             
	
        
	$db->query("update say_dormitories set name='$name', number_of_room='$dnum',dormdesc='$desc'  where id='$dorm_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}  

 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=86'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=87" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Dormatory ID:</label>
  <div class="col-sm-5">
    
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  name="txtDormId" value="<?php echo isset($dorm_id)?$dorm_id:" "?>"     data-size="10" >

		   <?php
                        $table = $db->query("select id,name from say_dormitories");
while(list($id,$dname)=$table->fetch_row()){
        if($dorm_id==$id){
             echo "<option value='$id' selected>ID=$id || $dname</option>";  
        }else{
             echo "<option value='$id'>ID=$id || $dname</option>";      
        }				
                     
						
}
						
?>
      
      </select>
      <span class="boxshadow"> 
            <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i> </button>  
      </span>
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Dormitory Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtDormname" value="<?php echo isset($name)?$name:" "?>"   class="form-control"/>
  </div>
 </div>  
     <div class="form-group">
  <label class="control-label col-sm-2">Number of Room :</label>
  <div class="col-sm-5">
      <input type="number" name="txtDnum" placeholder="Number of room"  value="<?php echo isset($dnum)?$dnum:" "?>"  class="form-control" />
  </div>
 </div> 
   <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="dormdesc" cols="20" rows="3" class="form-control"><?php echo isset($desc)?$desc:" "?></textarea>
  </div>
 </div>   
    
     
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>

