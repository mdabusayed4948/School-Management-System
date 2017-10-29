<h2 class='styl boxshadow'><span class='style boxshadow'>   Edit  Income</span></h2>
<?php
	if(isset($_POST['txtFeeId'])){
		$fee_id = $_POST['txtFeeId'];	
		
		$user_table = $db->query("select id,student_id,source_id,income_date, paid_amount,due_amount from say_payment where id='$fee_id '");
		list($fee_id,$sid,$source,$date,$pamount,$damount)=$user_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	//$fee_id =  $_POST["txtFeeId"];
	
	//$sid  = $_POST["cmbRoll"];
	$source  = $_POST["cmbSource"];
	$date   = $_POST["txtDate"];
	$pamount  = $_POST["txtPamount"];
                       // $damount  = $_POST["txtDamount"];
	
	$db->query("update say_payment set student_id='$sid',source_id='$source',income_date='$date',paid_amount ='$pamount ',due_amount ='$damount ' where id='$fee_id'");
	echo "<div class='alert alert-success' role='alert'><strong> Success: </strong> Successfully Updated. </div>";
}

?>
<div    style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=43'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin-left:10px; padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=44" method="post" style="margin-top:30px;" class="form-horizontal" >
   
<div class="form-group">
  <label class="control-label col-sm-2">payment's ID :</label>
  <div class="col-sm-5">
      <input type="text" name="txtFeeId" value="<?php echo isset($fee_id)?$fee_id:" "?>" class="form-control"  readonly=""/>
  <!-- <span class="boxshadow"><input type="submit" value="Go" name="btnSubmit"/></span>-->
   
  </div>
 </div>        
    

 
<div class="form-group">
  <label class="control-label col-sm-2">Source :</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSource" value="<?php echo isset($source)?$source:" "?>"  >
        

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
         <div  class='input-group date'>
          <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtDate"  placeholder="yyyy-mm-dd"   value="<?php echo $date?>"/>
                    
                </div>

   
  </div>
 </div>    
        
 <div class="form-group">
  <label class="control-label col-sm-2"> Amount :</label>
  <div class="col-sm-5">
<input type="text" name="txtPamount" value="<?php echo isset($pamount)?$pamount:" "?>"  class="form-control"/>
   
  </div>
 </div>     
         
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSave" value="Submit" class="btn btn-primary  " />

  </div>
 </div>          
	
</form>

