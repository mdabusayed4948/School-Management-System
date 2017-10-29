<h2 class='styl boxshadow'><span class='style boxshadow'>Add ExamMarks </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	$sid               = validate($_POST["txtSid"]);
	$roll              = validate($_POST["txtRoll"]);
                        $subject     = validate($_POST["cmbSubject"]);
                        $exam         = validate($_POST["cmbExam"]);
                        $session    = validate($_POST["cmbSession"]);
                        $class         = validate($_POST["cmbClass"]);
                        $section    = validate($_POST["cmbSection"]);
                       $mark         = validate($_POST["txtMark"]);
                       
	$errors=array();
	
	  if($sid==""){		 
	   array_push($errors,"Student  Id field is empty!");	 
	 }
                       if($roll==""){		 
	   array_push($errors,"Student  Id field is empty!");	 
	 }
                         if($subject==""){		 
	   array_push($errors,"Subject Name field is empty!");	 
	 }
                         if($exam==""){		 
	   array_push($errors,"Exam Name field is empty!");	 
	 }
                         if($session==""){		 
	   array_push($errors,"Session field is empty!");	 
	 }
                         if(  $class  ==""){		 
	   array_push($errors,"Class field is empty!");	 
	 }
                         if($section  ==""){		 
	   array_push($errors,"Section field is empty!");	 
	 }
                       if($mark==""){		 
	   array_push($errors,"Obtained Mark field is empty!");	 
	 }
	
	 
if(count($errors)==0){
$db->query("insert into mark(student_id,roll,subject_id,exam_id,session_id,class_id,group_id,mark_obtained)values('$sid','$roll','$subject','$exam','$session','$class','$section','$mark');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$exam =$date  =  $comment =""; 
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



<form action="home.php?item=61" method="post" style="margin-top:30px;" class="form-horizontal" >
 
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Student Id :</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtSid"  value="<?php echo isset($sid)?$sid:""?>" >
		 	<option>--Select--</option>
		   <?php
                        $table = $db->query("select id,student_name from say_student");
	while(list($id,$name)=$table->fetch_row()){
					
                        echo "<option value='$id'>ID=$id  || $name</option>";
						
	}
						
	?>
      
      </select>		
	  
  </div>
 </div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Roll No  :</label>
  <div class="col-sm-5">
      <input type="number" name="txtRoll" placeholder=" Input  Roll No "  class="form-control" required=""/>
   
  </div>
 </div>   
    
     <div class="form-group">
  <label class="control-label col-sm-2">Subject  :</label>
  <div class="col-sm-5">
        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSubject"  value="<?php echo isset($subject)?$subject:""?>" >
     
                    		<option >--Select--</option>
                        <?php
                        $subject_table = $db->query("select id,subject_name from say_subject");
	while(list($id,$name)=$subject_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
            </select>
  </div>
 </div> 

 <div class="form-group">
  <label class="control-label col-sm-2">Exam :</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbExam"  value="<?php echo isset($exam)?$exam:""?>" >
 
                    		<option >--Select--</option>
                        <?php
                        $exam_table = $db->query("select id,exam_name from exam");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
  </select>
   
  </div>
 </div>  
    
     <div class="form-group">
  <label class="control-label col-sm-2">Session :</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSession"  value="<?php echo isset($session)?$session:""?>"  >
   
                    		<option >--Select--</option>
                        <?php
                        $exam_table = $db->query("select id,session_name from say_session");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
  </select>
   
  </div>
 </div> 
     <div class="form-group">
  <label class="control-label col-sm-2">Class :</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbClass"  value="<?php echo isset($class)?$class:""?>"  >

                    		<option >--Select--</option>
                        <?php
                        $exam_table = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
  </select>
   
  </div>
 </div>   
  <div class="form-group">
  <label class="control-label col-sm-2">Section :</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSection"  value="<?php echo isset($section)?$section:""?>"  >
 
                    		<option >--Select--</option>
                        <?php
                        $exam_table = $db->query("select id,group_name from say_c_group");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
  </select>
   
  </div>
 </div>      
   
  
    
  <div class="form-group">
  <label class="control-label col-sm-2">Obtained Mark :</label>
  <div class="col-sm-5">
        <input type="number" name="txtMark" placeholder=" Input  Obtained Mark "  class="form-control" />
   
  </div>
 </div>      
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
	
</form>









