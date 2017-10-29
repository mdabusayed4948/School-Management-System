<h2 class='styl boxshadow'><span class='style boxshadow'>Add Class </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	$class  =validate($_POST["txtClass"]);
	$teacher  =validate($_POST["cmbTeacher"]);
	$errors=array();
	
	  if($class==""){		 
	   array_push($errors,"Class field is empty!");	 
	 }
                         if($teacher==""){		 
	   array_push($errors,"Teacher Name field is empty!");	 
	 }
	
	 
if(count($errors)==0){
$db->query("insert into sayclass(class_name,tbl_teacher_teacher_id)values('$class','$teacher');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$class= "";
}else{
echo "<div class='alert alert-danger' role='alert'><strong> Error:</strong>".implode("<br/>",$errors)."</div>";		  
  //echo "<div style='color:red;'><strong>Error: </strong>".implode("<br/>",$errors)."</div>";
	  
  }
}

 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>



<form action="home.php?item=26" method="post" style="margin-top:30px;" class="form-horizontal" >
    <hr/>
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Class :</label>
  <div class="col-sm-5">
      <input type="text" name="txtClass" placeholder="Please Input Class"  class="form-control" required=""/>
  </div>
 </div> 
       <div class="form-group">
  <label class="control-label col-sm-2">Teacher Name:</label>
  <div class="col-sm-5">
      <select name="cmbTeacher" class="form-control" required="">
      <option>--Select --</option>    	
                <?php
             $teacher_table = $db->query("select teacher_id,teacher_name from saytbl_teacher");
        while(list($id,$name)=$teacher_table->fetch_row()){
					
             echo "<option value='$id'> Id=$id || $name</option>";
            }
            ?>
               </select>

  </div>
 </div>  

   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>






