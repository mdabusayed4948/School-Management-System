<h2 class='styl boxshadow'><span class='style boxshadow'>Add Vehicle </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	$vehicle =  validate($_POST["txtVehicle"]);
	$dname             =  validate($_POST["txtDid"]);
	$rname  =   validate($_POST["txtRname"]);
                        $vdesc  =   validate($_POST["txtVdesc"]);
                        
	$errors=array();
	
	  if($vehicle==""){		 
	   array_push($errors,"Vehicle Name field is empty!");	 
	 }
           if($dname==""){		 
	   array_push($errors,"RDriver Name  field is empty!");	 
	 }
	
           if($rname==""){		 
	   array_push($errors,"Route Name field is empty!");	 
	 }
            if($vdesc==""){		 
	   array_push($errors," Description field is empty!");	 
	 }
	 
if(count($errors)==0){
$db->query("insert into say_transportation(vehicle_name,driver_id,route_name,description)values('$vehicle','$dname','$rname','$vdesc');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$vehicle=$dname=$rname=$vdesc= "";
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



<form action="home.php?item=91" method="post" style="margin-top:30px;" class="form-horizontal" >

 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Vehicle Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtVehicle" placeholder="Vehicle Name"  value="<?php echo isset($sid)?$sid:""?>"  class="form-control" />
  </div>
 </div> 
        <div class="form-group">
  <label class="control-label col-sm-2">Driver Name:</label>
  <div class="col-sm-5">
         <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtDid"  value="<?php echo isset($sid)?$sid:""?>" data-size="10">
	<option>--Select Driver Id--</option>
		   <?php
                        $table = $db->query("select id,name,email,phone from say_driver");
	while(list($id,$name,$mail,$mobile)=$table->fetch_row()){
					
                        echo "<option value='$id'>ID=$id || $name || $mail || $mobile</option>";
						
}
						
?>
 </select>
   </div>
 </div> 
      <div class="form-group">
  <label class="control-label col-sm-2">Route Name:</label>
  <div class="col-sm-5">
      <input type="text" name="txtRname" placeholder="Route Name"  value="<?php echo isset($sid)?$sid:""?>"   class="form-control" />
  </div>
 </div> 
  
    
     <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="txtVdesc" cols="20" rows="3" class="form-control"><?php echo isset($sid)?$sid:""?></textarea>
  </div>
 </div> 

   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>







