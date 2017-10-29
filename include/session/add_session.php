<h2 class='styl boxshadow'><span class='style boxshadow'>Add Session </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	$session  =validate($_POST["txtSession"]);
	
	$errors=array();
	
	  if($session==""){		 
	   array_push($errors,"session field is empty!");	 
	 }
	
	 
if(count($errors)==0){
$db->query("insert into session(session_name)values('$session');");
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



<form action="home.php?item=32" method="post" style="margin-top:30px;" class="form-horizontal" >
    <hr/>
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Session :</label>
  <div class="col-sm-5">
      <input type="text" name="txtSession" placeholder="Please Input Session"  class="form-control" required=""/>
  </div>
 </div> 

   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>








