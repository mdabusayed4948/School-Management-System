<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Vehicle </span></h2>

<?php 
if(isset($_POST["txtTId"])){
    $tran_id = $_POST["txtTId"];
    
    $tran_table = $db->query("select id,vehicle_name,driver_id,route_name,description from say_transportation where id='$tran_id' ");
    list($tran_id,$vname,$dname,$rname,$desc)=$tran_table->fetch_row();
}

if(isset($_POST["btnSubmit"])){
                       $tran_id    =  validate($_POST["txtTId"]);
	$vehicle   =  validate($_POST["txtVehicle"]);
	$dname   =  validate($_POST["txtDid"]);
	$rname    =   validate($_POST["txtRname"]);
                        $vdesc      =   validate($_POST["txtVdesc"]);
 
$db->query("update  say_transportation set vehicle_name='$vehicle',driver_id='$dname',route_name='$rname', description='$vdesc' where id='$tran_id' " );
 echo "<div class='alert alert-success' role='alert'><strong> Successfully Updated!</strong></div>";

}

 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>


<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=92'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=93" method="post" style="margin-top:30px;" class="form-horizontal" >

  
    <div class="form-group">
  <label class="control-label col-sm-2">Vehicle ID:</label>
  <div class="col-sm-5">
    
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  name="txtTId" value="<?php echo isset($tran_id)?$tran_id:" "?>"     data-size="10" >

		   <?php
                        $table = $db->query("select id,vehicle_name from say_transportation");
while(list($id,$tname)=$table->fetch_row()){
        if($tran_id==$id){
             echo "<option value='$id' selected>ID=$id || $tname</option>";  
        }else{
             echo "<option value='$id'>ID=$id || $tname</option>";      
        }				
                     
						
}
						
?>
      
      </select>
      <span class="boxshadow"> 
            <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i> </button>  
      </span>
 
  </div>
 </div>
    
 <div class="form-group">
  <label class="control-label col-sm-2">Vehicle Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtVehicle" placeholder="Vehicle Name"  value="<?php echo isset($vname)?$vname:" "?>"     class="form-control" />
  </div>
 </div> 
        <div class="form-group">
  <label class="control-label col-sm-2">Driver Name:</label>
  <div class="col-sm-5">
         <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtDid"  value="<?php echo isset($dname)?$dname:" "?>"    data-size="10">
	
             
		   <?php
                        $table = $db->query("select id,name,email,phone from say_driver");
	while(list($id,$name,$mail,$mobile)=$table->fetch_row()){
            if($dname==$id){
             echo "<option value='$id' selected>ID=$id || $name || $mail || $mobile</option>";
            }else{
                     echo "<option value='$id' >ID=$id || $name || $mail || $mobile</option>";   
            }
					
               
						
}
						
?>
 </select>
   </div>
 </div> 
      <div class="form-group">
  <label class="control-label col-sm-2">Route Name:</label>
  <div class="col-sm-5">
      <input type="text" name="txtRname" placeholder="Route Name"  value="<?php echo isset($rname)?$rname:""?>"   class="form-control" />
  </div>
 </div> 
  
    
     <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="txtVdesc" cols="20" rows="3" class="form-control"><?php echo isset($desc)?$desc:""?></textarea>
  </div>
 </div> 

   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Reset" class="btn btn-success" />
  </div>
 </div>     
	
</form>







