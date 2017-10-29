<h2 class='styl boxshadow'><span class='style boxshadow'>Edit  Fee  </span></h2>
<?php
	if(isset($_POST['txtFeeId'])){
		$fee_id = $_POST['txtFeeId'];	
		
		$user_table = $db->query("select id,student_id,source_id,income_date, paid_amount,due_amount,status from say_payment where id='$fee_id '");
		list($fee_id,$sid,$source,$date,$pamount,$damount,$status)=$user_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	//$fee_id =  $_POST["txtFeeId"];
	
	$sid  = validate($_POST["txtId"]);
	$source  =validate( $_POST["cmbSource"]);
	$date   = validate($_POST["txtDate"]);
	$pamount  = validate($_POST["txtPamount"]);
                        $damount  = validate($_POST["txtDamount"]);
                       $status =validate($_POST["cmbStatus"]);
	
	$db->query("update say_payment set student_id='$sid',source_id='$source',income_date='$date',paid_amount ='$pamount ',due_amount ='$damount ',status='$status'  where id='$fee_id'");
	  echo "<div class='alert alert-success' role='alert'><strong>Successfully Edit</strong></div>";
}

 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}


?>
<div    style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=16'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin-left:10px; padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=14" method="post" style="margin-top:30px;" class="form-horizontal" >
        <hr/>
<div class="form-group">
  <label class="control-label col-sm-2">payment's ID :</label>
  <div class="col-sm-5">
      <input type="text" name="txtFeeId" value="<?php echo isset($fee_id)?$fee_id:" "?>" class="form-control" readonly="" />
   <!---<span class="boxshadow"><input type="submit" value="Go" name="btnSubmit"/></span>-->  
   
  </div>
 </div>        
    
<div class="form-group">
  <label class="control-label col-sm-2">Student's ID :</label>
  <div class="col-sm-5">

     <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtId"  value="<?php echo isset($sid)?$sid:""?>" data-size="10">
 
   <?php
    $table = $db->query("select id,student_name from say_student");
while(list($id,$name)=$table->fetch_row()){
					
 if($sid==$id){
echo "<option value='$id' selected>Id=$id || $name</option>";	
}else{
echo "<option value='$id'>Id=$id || $name</option>"; 
 }
}
?>
   </select>
 
  </div>
 </div>        
 
<div class="form-group">
  <label class="control-label col-sm-2">Source :</label>
  <div class="col-sm-5">
<select name="cmbSource" class="form-control">

     <?php
   $table = $db->query("select * from source");
while(list($id,$name)=$table->fetch_row()){
					
 if($source==$id){
 echo "<option value='$id' selected>$name</option>";	
 }else{
 echo "<option value='$id'>$name</option>"; 
 }
}
?>
  </select>
   
  </div>
 </div>   
        
 <div class="form-group">
  <label class="control-label col-sm-2">Date :</label>
  <div class="col-sm-5">
      <input type="date" name="txtDate" value="<?php echo $date?>" class="form-control" placeholder="yyyy-mm-dd"/>
   
  </div>
 </div>    
        
 <div class="form-group">
  <label class="control-label col-sm-2">Paid Amount :</label>
  <div class="col-sm-5">
<input type="text" name="txtPamount" value="<?php echo isset($pamount)?$pamount:" "?>"  class="form-control"/>
   
  </div>
 </div>     
  <div class="form-group">
  <label class="control-label col-sm-2">Due Amount :</label>
  <div class="col-sm-5">
<input type="text" name="txtDamount" value="<?php echo isset($damount)?$damount:" "?>"  class="form-control"/>
   
  </div>
 </div>      
            <div class="form-group">
  <label class="control-label col-md-2">Status :</label>
  <div class="col-md-5">
      <select class="form-control" required name="cmbStatus">
          <option><?php echo isset($status)?$status:" "?></option>
          <option value="Paid">Paid</option>
          <option value="Unpaid">Unpaid</option>
          <option value="Due">Due</option>
      </select>
  </div>
 </div> 
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSave" value="Submit" class="btn btn-primary  " />

  </div>
 </div>          
	
</form>