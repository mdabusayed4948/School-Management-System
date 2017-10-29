
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit ExamMarks </span></h2>

<?php
	if(isset($_POST['txtMarkId'])){
	    $mark_id = $_POST['txtMarkId'];	
	 
                        
                
$exam_table = $db->query("select id,student_id,roll,subject_id,exam_id,session_id,class_id, group_id,mark_obtained from mark  where id='$mark_id '");
list($mark_id,$student_name,$roll,$subject,$exam_name,$session,$class,$section,$mark)=$exam_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$mark_id            = $_POST['txtMarkId'];	
                       $student_name    = validate($_POST["cmbSname"]);
	$roll              = validate($_POST["txtRoll"]);
                        $subject     = validate($_POST["cmbSubject"]);
                        $exam_name         = validate($_POST["cmbExam"]);
                        $session    = validate($_POST["cmbSession"]);
                        $class         = validate($_POST["cmbClass"]);
                        $section    = validate($_POST["cmbSection"]);
                       $mark         = validate($_POST["txtMark"]);
        
	$db->query("update mark set student_id='$student_name', roll='$roll',subject_id='$subject',exam_id='$exam_name',session_id='$session',class_id='$class' ,group_id='$section', mark_obtained='$mark' where id='$mark_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}  
 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=62'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=63" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Mark ID:</label>
  <div class="col-sm-5">
      <input type="number"  name="txtMarkId"  value="<?php echo isset($mark_id)?$mark_id:" "?>"   class="form-control" />  
       
      <span class="boxshadow"> 
       
         <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
      </span>
 
  </div>
 </div>
    
 
        <div class="form-group">
  <label class="control-label col-sm-2">Student Name:</label>
  <div class="col-sm-5">
           <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSname"  value="<?php echo isset($student_name)?$student_name:""?>"  >
     
                        <?php
                        $table = $db->query("select id,student_name from say_student");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($student_name==$id){
                     echo "<option value='$id' selected>Id=$id || $name</option>";	
	 }else{
	echo "<option value='$id'>Id=$id || $name</option>"; 
	 }
	}
	?>
                    </select>
      
 
  </div>
 </div>
       <div class="form-group">
  <label class="control-label col-sm-2"> Roll No :</label>
  <div class="col-sm-5">
      <input type="number"  name="txtRoll"  value="<?php echo isset($roll)?$roll:" "?>"   class="form-control"  />  
       
  </div>
 </div>
        <div class="form-group">
  <label class="control-label col-sm-2">Subject Name:</label>
  <div class="col-sm-5">

          <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSubject"  value="<?php echo isset($subject)?$subject:""?>"  >
            
             
                        <?php
                        $table = $db->query("select id,subject_name from say_subject");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($subject==$id){
                     echo "<option value='$id' selected> $name </option>";	
	 }else{
	echo "<option value='$id'> $name </option>"; 
	 }
	}
	?>
                    </select>
      
 
  </div>
 </div>
     <div class="form-group">
  <label class="control-label col-sm-2">Exam Name:</label>
  <div class="col-sm-5">
        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbExam"  value="<?php echo isset($exam_name)?$exam_name:""?>"  >
            

                  
                        <?php
                        $table = $db->query("select id,exam_name from exam");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($exam_name==$id){
                     echo "<option value='$id' selected> $name</option>";	
	 }else{
	echo "<option value='$id'> $name</option>"; 
	 }
	}
	?>
                    </select>
      
 
  </div>
 </div>
   <div class="form-group">
  <label class="control-label col-sm-2">Session :</label>
  <div class="col-sm-5">
         <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSession"  value="<?php echo isset($session)?$session:""?>"  >
              
                        <?php
                        $table = $db->query("select id,session_name from say_session");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($session==$id){
                     echo "<option value='$id' selected> $name</option>";	
	 }else{
	echo "<option value='$id'> $name</option>"; 
	 }
	}
	?>
                    </select>
      
 
  </div>
 </div>
     <div class="form-group">
  <label class="control-label col-sm-2">Class :</label>
  <div class="col-sm-5">
         <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbClass"  value="<?php echo isset($class)?$class:""?>"  >


                  
                        <?php
                        $table = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($class==$id){
                     echo "<option value='$id' selected> $name</option>";	
	 }else{
	echo "<option value='$id'> $name</option>"; 
	 }
	}
	?>
                    </select>
      
 
  </div>
 </div>
     <div class="form-group">
  <label class="control-label col-sm-2">Section :</label>
  <div class="col-sm-5">
          <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSection"  value="<?php echo isset($section)?$section:""?>"  >

                  
                        <?php
                        $table = $db->query("select id,group_name from say_c_group");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($section==$id){
                     echo "<option value='$id' selected> $name </option>";	
	 }else{
	echo "<option value='$id'> $name </option>"; 
	 }
	}
	?>
                    </select>
      
 
  </div>
 </div>
         <div class="form-group">
  <label class="control-label col-sm-2">Obtained Mark :</label>
  <div class="col-sm-5">
        <input type="number" name="txtMark"  value="<?php echo isset($mark)?$mark:" "?>"   class="form-control" />
   
  </div>
 </div> 
    
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>



