<h2 class='styl boxshadow'><span class='style boxshadow'>Add Gradelevels </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	
	$gname       = validate($_POST["txtGname"]);
                        $gpoint         = validate($_POST["txtGpoint"]);
                        $gfrom        = validate($_POST["txtGfrom"]);
                        $gto            = validate($_POST["txtGto"]);
                        $desc          = validate($_POST["txtDesc"]);
                
	$errors=array();
	
	  if($gname==""){		 
	   array_push($errors,"Student  Id field is empty!");	 
	 }
                         if($gpoint==""){		 
	   array_push($errors,"Gradepoints field is empty!");	 
	 }
                         if($gfrom==""){		 
	   array_push($errors,"Grade from field is empty!");	 
	 }
                         if($gto==""){		 
	   array_push($errors," Grade to field is empty!");	 
	 }
                         if($desc==""){		 
	   array_push($errors,"Description field is empty!");	 
	 }
                        
	
	 
if(count($errors)==0){
$db->query("insert into gradelevels(name,description,gradepoints,gradefrom,gradeto)values('$gname','$desc','$gpoint','$gfrom','$gto');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$gname =$gpoint  =  $gfrom =$gto=$desc=""; 
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



<form action="home.php?item=64" method="post" style="margin-top:30px;" class="form-horizontal" >
 
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Grade Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtGname" placeholder=" Input  Grade Name " value="<?php echo isset($gname)?$gname:"" ?>"  class="form-control" required=""/>
  </div>
 </div> 
    
    
     <div class="form-group">
  <label class="control-label col-sm-2">Gradepoints  :</label>
  <div class="col-sm-5">
      <input type="number" name="txtGpoint" placeholder=" Input  Grade Points " value="<?php echo isset($gpoint)?$gpoint:"" ?>" class="form-control" required=""/>
  </div>
 </div> 

 <div class="form-group">
  <label class="control-label col-sm-2">Grade From :</label>
  <div class="col-sm-5">
      <input type="number" name="txtGfrom" placeholder=" Input  Grade From " value="<?php echo isset($gfrom)?$gfrom:"" ?>"  class="form-control" required=""/>
   
  </div>
 </div>  
        <div class="form-group">
  <label class="control-label col-sm-2">Grade To :</label>
  <div class="col-sm-5">
      <input type="number" name="txtGto" placeholder=" Input  Grade To "  value="<?php echo isset($gto)?$gto:"" ?>" class="form-control" required=""/>
  </div>
        </div> 
  <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="txtDesc" placeholder="Description" cols="20" rows="4" class="form-control" required="" value="<?php echo isset($desc)?$desc:"" ?>"></textarea>
   
  </div>
 </div>      
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
	
</form>









