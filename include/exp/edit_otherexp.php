<h2 class='styl boxshadow'><span class='style boxshadow'>   Edit Others Expenses </span></h2>
<?php
	if(isset($_POST['txtothersexpId'])){
		$exp_id = $_POST['txtothersexpId'];	
		
		$exp_table = $db->query("select id,source_id,amount, exp_date from expences where id='$exp_id '");
		list($exp_id,$source,$pamount,$date)=$exp_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	//$exp_id =  $_POST["txtFeeId"];
	
	//$sid  = $_POST["cmbRoll"];
	$source  = $_POST["cmbSource"];
	$date   = $_POST["txtDate"];
	$pamount  = $_POST["txtPamount"];
                       // $damount  = $_POST["txtDamount"];
	
	$db->query("update expences set source_id='$source',exp_date='$date',amount ='$pamount ' where id='$exp_id'");
	  echo "<div class='alert alert-success' role='alert'><strong>Successfully Update</strong></div>";
}

?>
<div    style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=51'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin-left:10px;padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=52" method="post" style="margin-top:30px;" class="form-horizontal" >

<div class="form-group">
  <label class="control-label col-sm-2">payment's ID :</label>
  <div class="col-sm-5">
      <input type="text" name="txtothersexpId" value="<?php echo isset($exp_id)?$exp_id:" "?>" class="form-control"  readonly=""/>
  <!-- <span class="boxshadow"><input type="submit" value="Go" name="btnSubmit"/></span>-->
   
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
  <label class="control-label col-sm-2"> Amount :</label>
  <div class="col-sm-5">
<input type="text" name="txtPamount" value="<?php echo isset($pamount)?$pamount:" "?>"  class="form-control"/>
   
  </div>
 </div>     
 <div class="form-group">
  <label class="control-label col-sm-2">Date :</label>
  <div class="col-sm-5">
        <div  class='input-group date'>
                <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
             <input type='text' class="form-control" id="Date" name="txtDate"  placeholder="yyyy-mm-dd"  value="<?php echo $date?>" />
                
                </div>
   
   
  </div>
 </div>         
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSave" value="Submit" class="btn btn-primary  " />

  </div>
 </div>          
	
</form>


