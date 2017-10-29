<h2 class='styl boxshadow'><span class='style boxshadow'>Add Dormitory </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	$dormitory  = validate($_POST["txtDormitory"]);
	$dnum             = validate($_POST["txtDnum"]);
	$dormdesc   =  validate($_POST["dormdesc"]);
        
	$errors=array();
	
	  if($dormitory==""){		 
	   array_push($errors,"Dormitory Name field is empty!");	 
	 }
           if($dnum==""){		 
	   array_push($errors,"Room number  field is empty!");	 
	 }
	
           if($dormdesc==""){		 
	   array_push($errors,"Dormitory Description field is empty!");	 
	 }
	 
if(count($errors)==0){
$db->query("insert into say_dormitories(name,number_of_room,dormdesc)values('$dormitory','$dnum','$dormdesc');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$dormitory=$dormdesc=$dnum= "";
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



<form action="home.php?item=85" method="post" style="margin-top:30px;" class="form-horizontal" >

 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtDormitory" placeholder="Dormitory Name"  class="form-control" />
  </div>
 </div> 
        <div class="form-group">
  <label class="control-label col-sm-2">Number of Room :</label>
  <div class="col-sm-5">
      <input type="number" name="txtDnum" placeholder="Number of room"  class="form-control" />
  </div>
 </div> 
    
     <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="dormdesc" cols="20" rows="3" class="form-control"></textarea>
  </div>
 </div> 

   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>







