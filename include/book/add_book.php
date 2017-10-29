<h2 class='styl boxshadow'><span class='style boxshadow'>Add Book </span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	
	$bname       = validate($_POST["txtBook"]);
                        $aname        = validate($_POST["txtAuthor"]);
                        $pname       = validate($_POST["txtPublisher"]);
                        $desc          = validate($_POST["txtDesc"]);
                
	$errors=array();
	
	  if($bname==""){		 
	   array_push($errors,"Book Name field is empty!");	 
	 }
                         if($aname==""){		 
	   array_push($errors,"Author Name field is empty!");	 
	 }
                         if($pname==""){		 
	   array_push($errors,"Publisher Name field is empty!");	 
	 }
                         if($desc==""){		 
	   array_push($errors," Description field is empty!");	 
	 }
                       
                        
	
	 
if(count($errors)==0){
$db->query("INSERT INTO say_book (name,author,publisher,description) VALUES ('$bname','$aname','$pname','$desc');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$bname =$aname  =  $pname =$desc=""; 
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



<form action="home.php?item=18" method="post" style="margin-top:30px;" class="form-horizontal" >
 
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Book Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtBook" placeholder=" Input  Book Name " value="<?php echo isset($bname)?$bname:"" ?>"  class="form-control" required=""/>
  </div>
 </div> 
    
    
     <div class="form-group">
  <label class="control-label col-sm-2">Author Name   :</label>
  <div class="col-sm-5">
      <input type="text" name="txtAuthor" placeholder=" Input  Author Name " value="<?php echo isset($aname)?$aname:"" ?>"  class="form-control" required=""/>
  </div>
 </div> 

 <div class="form-group">
  <label class="control-label col-sm-2">Publisher :</label>
  <div class="col-sm-5">
      <input type="text" name="txtPublisher" placeholder=" Input  Publisher Name " value="<?php echo isset($pname)?$pname:"" ?>" class="form-control" required=""/>
   
  </div>
 </div>  
   
  <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="txtDesc" placeholder="Description" cols="20" rows="4" class="form-control" value="<?php echo isset($desc)?$desc:"" ?>" required=""></textarea>
   
  </div>
 </div>      
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
	
</form>









