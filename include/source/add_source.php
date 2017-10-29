<h2 class='styl boxshadow'><span class='style boxshadow'>Add Source </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	$source  =validate($_POST["txtSource"]);
	
	$errors=array();
	
	  if($source==""){		 
	   array_push($errors,"source field is empty!");	 
	 }
	
	 
if(count($errors)==0){
$db->query("insert into source(source_name)values('$source');");
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


<div  style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow ' style='float:right;'><a href='home.php?item=41'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin-right: 5px'> <i class='glyphicon glyphicon-eye-open'></i>  Source List</a></span></div>
<hr/>
<form action="home.php?item=40" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Source :</label>
  <div class="col-sm-5">
      <input type="text" name="txtSource" placeholder=" Input Source Name"  class="form-control" required=""/>
  </div>
 </div> 

   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>








