<h2 class='styl boxshadow'><span class='style boxshadow'>Add Exam </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	$exam          = validate($_POST["txtExam"]);
	$date             = validate($_POST["txtDate"]);
                        $comment  = validate($_POST["txtComments"]);
                        
	$errors=array();
	
	  if($exam==""){		 
	   array_push($errors,"Exam Name field is empty!");	 
	 }
                         if($date==""){		 
	   array_push($errors,"Date field is empty!");	 
	 }
                         if($comment==""){		 
	   array_push($errors,"Comments field is empty!");	 
	 }
                      
	
	 
if(count($errors)==0){
$db->query("insert into exam(exam_name,start_date,comment)values('$exam','$date','$comment');");
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



<form action="home.php?item=58" method="post" style="margin-top:30px;" class="form-horizontal" >
    <hr/>
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Exam Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtExam" placeholder="Please Input Exam Name"  class="form-control" required=""/>
  </div>
 </div> 
    
    
     <div class="form-group">
  <label class="control-label col-sm-2">Start Date :</label>
  <div class="col-sm-5">
          <div  class='input-group date'>
                     <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date1" name="txtDate"  placeholder="yyyy-mm-dd" required=""/>
              
                </div>
   
  </div>
 </div> 

 <div class="form-group">
  <label class="control-label col-sm-2">Comments :</label>
  <div class="col-sm-5">
      <textarea name="txtComments" placeholder="Comments" cols="20" rows="4" class="form-control" required=""></textarea>
   
  </div>
 </div>     
    
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>








