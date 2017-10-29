<h2 class='styl boxshadow'><span class='style boxshadow'> Add Student's fee </span></h2>

 

<?php 
if(isset($_POST["btnSubmit"])){

	$sid  =validate($_POST["txtId"]);
	$source  =validate($_POST["cmbSource"]);
	$date   = validate($_POST["txtDate"]);
	$pamount  =validate($_POST["txtPamount"]);
	$damount  =validate($_POST["txtDamount"]);
                           $status =validate($_POST["cmbStatus"]);
	$errors=array();
	
		 
	
	 if($sid==""){		 
	   array_push($errors,"Student field is empty!");	 
	 }
	
	  if($source==""){		 
	   array_push($errors,"Source field is empty!");	 
	 }
	  if($date==""){		 
	   array_push($errors,"Month field is empty!");	 
	 }
	
       
            if($status==""){		 
	   array_push($errors,"Status field is empty!");	 
	 }
                          
	 
if(count($errors)==0){
$db->query("insert into say_payment(student_id,source_id, income_date,paid_amount,due_amount,status)values('$sid','$source','$date','$pamount','$damount','$status');");
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



<form action="home.php?item=13" method="post" style="margin-top:30px;" class="form-horizontal" >
    <hr/>
 <div class="form-group">
  <label class="control-label col-md-2">Student's ID :</label>
  <div class="col-md-5">
    
   
 
					
 <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtId"  value="<?php echo isset($sid)?$sid:""?>" data-size="10">
	<option>--Select--</option>
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
  <label class="control-label col-md-2">Source :</label>
  <div class="col-md-5">

 <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSource"  value="<?php echo isset($source )?$source :""?>" data-size="10">
		 	<option>--Select--</option>
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
  <label class="control-label col-md-2">Date :</label>
  
  <div class="col-md-5" >
    <div  class='input-group date'>
           <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtDate"  placeholder="yyyy-mm-dd"/>
                 
                </div>
 
                     
                 
    <!--- <input type="date" name="txtDate"  class="form-control"  placeholder="yyyy-mm-dd" required />-->
  </div>
 </div> 
    
 <div class="form-group">
  <label class="control-label col-md-2">Paid Amount :</label>
  <div class="col-md-5">
      <input type="number" name="txtPamount" placeholder=" Input  Amount"  class="form-control"  />
  </div>
 </div> 
<div class="form-group">
  <label class="control-label col-md-2">Due Amount :</label>
  <div class="col-md-5">
      <input type="number" name="txtDamount" placeholder=" Input Due Amount"  class="form-control" />
  </div>
 </div> 
    <div class="form-group">
  <label class="control-label col-md-2">Status :</label>
  <div class="col-md-5">
      <select class="form-control" required name="cmbStatus">
          <option>--select--</option>
          <option value="Paid">Paid</option>
          <option value="Unpaid">Unpaid</option>
          <option value="Due">Due</option>
      </select>
  </div>
 </div> 
   <div class="form-group">
  <div class="col-md-offset-2 col-md-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
	
</form>



</body>


