<h2 class='styl boxshadow'><span class='style boxshadow'>Create Promotion </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	 $sid  =validate($_POST["txtSid"]);
	 $roll  =validate($_POST["txtroll"]);
                        $class  =validate($_POST["cmbClass"]);
                        $session =validate($_POST["cmbSession"]);
                         $section =validate($_POST["cmbSection"]);
                        $date  =validate($_POST["txtDate"]);
                        
	$errors=array();
	
	  if($sid==""){		 
	   array_push($errors,"Student Id field is empty!");	 
	 }
                         if($roll==""){		 
	   array_push($errors,"Roll  field is empty!");	 
	 }
                      if($class==""){		 
	   array_push($errors,"Class field is empty!");	 
	 }
                        if($session==""){		 
	   array_push($errors,"Session field is empty!");	 
	 }
                           if($section==""){		 
	   array_push($errors,"Section field is empty!");	 
	 }
                           if($date==""){		 
	   array_push($errors,"Date field is empty!");	 
	 }
                        
	 
if(count($errors)==0){
$db->query("insert into s_promotion(student_id,roll,class_id,session_id,group_id,p_date)values('$sid','$roll','$class','$session','$section','$date');");
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



<form action="home.php?item=67" method="post" style="margin-top:30px;" class="form-horizontal" >
    <hr/>
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Student Id :</label>
  <div class="col-sm-5">
       <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtSid"  value="<?php echo isset($sid)?$sid:""?>" data-size="10">
	<option>--Select Student Id--</option>
		   <?php
                        $table = $db->query("select id,student_name,email,mobile from say_student");
	while(list($id,$name,$mail,$mobile)=$table->fetch_row()){
					
                        echo "<option value='$id'>ID=$id || $name || $mail || $mobile</option>";
						
}
						
?>
      
      </select>
      
  </div>
 </div> 
  <div class="form-group">
  <label class="control-label col-sm-2">Roll No  :</label>
  <div class="col-sm-5">
      <input type="number" name="txtroll" placeholder=" Input  Student Roll"  class="form-control" required=""/>
  </div>
 </div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Class :</label>
  <div class="col-sm-5">
      <select name="cmbClass" class="form-control" required="">
                    		<option >--Select--</option>
                        <?php
                        $class = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$class->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                    </select>
  
 
  </div>
 </div>    
    <div class="form-group">
  <label class="control-label col-sm-2">Session:</label>
  <div class="col-sm-5">
      <select name="cmbSession" class="form-control" required="">
                    	<option>--Select--</option>
                        <?php
                        $session = $db->query("select id,session_name from say_session");
	while(list($id,$name)=$session->fetch_row()){
					
                        echo "<option value='$id'> $name</option>";
						}
						?>
                    </select>
 
 
  </div>
 </div> 
  <div class="form-group">
  <label class="control-label col-sm-2">Section  :</label>
  <div class="col-sm-5">
     <select name="cmbSection" class="form-control" required="">
                    	<option>--Select--</option>
                        <?php
                        $table = $db->query("select id,group_name from say_c_group");
                        while(list($id,$name)=$table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                    </select>
 
 
  </div>
 </div>
     <div class="form-group">
  <label class="control-label col-sm-2">Date :</label>
  <div class="col-sm-5">
          <div  class='input-group date'>
                    <input type='text' class="form-control" id="Date" name="txtDate"  placeholder="yyyy-mm-dd"/>
                    <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                </div>
      
  
  </div>
 </div> 

   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>








