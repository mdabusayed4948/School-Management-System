
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Gradelevels   </span></h2>

<?php
	if(isset($_POST['txtGradeId'])){
	    $grade_id = $_POST['txtGradeId'];	
	$exam_table = $db->query("select id,name,description, gradepoints,gradefrom,gradeto from gradelevels  where id='$grade_id '");
	list($grade_id,$grade_name,$desc,$gradepoint,$gradefrom,$gradeto)=$exam_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$grade_id            = $_POST['txtGradeId'];	
                        $grade_name    = $_POST["txtGname"];
	$gradepoint             = $_POST["txtGpoint"];
                       $gradefrom     = $_POST["txtGfrom"];
                       $gradeto     = $_POST["txtGto"];
                     $desc     = $_POST["txtDesc"];
                
	
        
	$db->query("update gradelevels set name='$grade_name', description='$desc',gradepoints='$gradepoint',gradefrom='$gradefrom',gradeto='$gradeto' where id='$grade_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}  

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=65'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 5px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=66" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Gradelevels ID:</label>
  <div class="col-sm-5">
    
       <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  name="txtGradeId" value="<?php echo isset($grade_id)?$grade_id:" "?>"     data-size="10" >

		   <?php
                        $table = $db->query("select id,name from gradelevels");
while(list($id,$name)=$table->fetch_row()){
        if($grade_id==$id){
             echo "<option value='$id' selected>ID=$id || $name</option>";  
        }else{
             echo "<option value='$id'>ID=$id || $name</option>";      
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
  <label class="control-label col-sm-2">Grade Name:</label>
  <div class="col-sm-5">
         <input type="text"  name="txtGname"  value="<?php echo isset($grade_name)?$grade_name:" "?>"   class="form-control" />  
      
  </div>
 </div>
        <div class="form-group">
  <label class="control-label col-sm-2">Gradepoints :</label>
  <div class="col-sm-5">
<input type="text"  name="txtGpoint"  value="<?php echo isset($gradepoint)?$gradepoint:" "?>"   class="form-control" />  
 
  </div>
 </div>
     <div class="form-group">
  <label class="control-label col-sm-2">Grade From :</label>
  <div class="col-sm-5">
      <input type="number"  name="txtGfrom"  value="<?php echo isset($gradefrom)?$gradefrom:" "?>"   class="form-control" />  
      
 
  </div>
 </div>

     <div class="form-group">
  <label class="control-label col-sm-2"> Grade To :</label>
  <div class="col-sm-5">
      <input type="number"  name="txtGto"  value="<?php echo isset($gradeto)?$gradeto:" "?>"   class="form-control"  />  
       
  </div>
 </div>
    
   
 <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="txtDesc" placeholder="Description" cols="20" rows="4" class="form-control" required=""><?php echo isset($desc)?$desc:" "?></textarea>
   
  </div>
 </div>  
    
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>




