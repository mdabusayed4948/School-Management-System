<h2 class='styl boxshadow'><span class='style boxshadow'> Add Others Exp</span></h2>

<?php 
if(isset($_POST["btnSubmit"])){

	
	$source  =validate($_POST["cmbSource"]);
	$pamount  =validate($_POST["txtPamount"]);
                        $date   = validate($_POST["txtDate"]);
	$status  =validate($_POST["txtstatus"]);
	$errors=array();
	
		 
	
	
	
	  if($source==""){		 
	   array_push($errors,"Source field is empty!");	 
	 }
	  if($date==""){		 
	   array_push($errors,"Month field is empty!");	 
	 }
	   if($pamount==""){		 
	   array_push($errors,"Paid Amount field is empty!");	 
	 }
                          
	 
if(count($errors)==0){
$db->query("insert into expences(source_id, amount,exp_date,status)values('$source','$pamount','$date','$status');");
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";

$id = $source = $date= $pamount=$damount= "";
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



<form action="home.php?item=50" method="post" style="margin-top:30px;" class="form-horizontal" >
    <hr/>

    
 <div class="form-group">
  <label class="control-label col-sm-2">Source :</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSource"  value="<?php echo isset($source)?$source:""?>" data-size="10" required="">
 
                    	<option>Select Source</option>
                        <?php
                        $table = $db->query("select id,source_name from source");
	while(list($id,$name)=$table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
            }
            ?>
                    </select>   
  </div>
 </div>       

 
    
 <div class="form-group">
  <label class="control-label col-sm-2"> Amount :</label>
  <div class="col-sm-5">
      <input type="number" name="txtPamount" placeholder=" Input  Amount"  class="form-control"  />
  </div>
 </div> 
    <div class="form-group">
  <label class="control-label col-sm-2">Date :</label>
  <div class="col-sm-5">
         <div  class='input-group date'>
               <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
             <input type='text' class="form-control" id="Date" name="txtDate"  placeholder="yyyy-mm-dd" />
                  
                </div>
 
  </div>
 </div> 
    <div class="form-group" hidden="">
  <label class="control-label col-sm-2"> Status :</label>
  <div class="col-sm-5">
      <select name="txtstatus" class="form-control">
          <option value="othersexp">Others exp</option>
      </select>
  </div>
 </div> 
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
	
</form>




