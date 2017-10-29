
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Issue Book   </span></h2>

<?php
	if(isset($_POST['txtIssuebookId'])){
	    $ibook_id = $_POST['txtIssuebookId'];	
	$member_table = $db->query("select id,book_id,member_id, issue_date,return_date,remark  from say_issue_book where id='$ibook_id '");
	list($ibook_id,$bname,$mname,$idate,$rdate,$remark)=$member_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$ibook_id            = $_POST['txtIssuebookId'];	
                       $bname     = validate($_POST["cmbMname"]);
                        $mname            = validate($_POST["txtBookId"]);
                        $idate        = validate($_POST["txtIdate"]);
                        $rdate     = validate($_POST["txtRdate"]);
                         $remark    = validate($_POST["txtRemark"]);
                
                
	
        
	$db->query("update say_issue_book set book_id='$bname', member_id='$mname',issue_date='$idate',return_date='$rdate' , remark='$remark' where id='$ibook_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}  

 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow ' ><a href='home.php?item=80'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 5px' ><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=81" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Issue book ID:</label>
  <div class="col-sm-5">
           
                <input type="number"  name="txtIssuebookId"  value="<?php echo isset($ibook_id)?$ibook_id:" "?>"   class="form-control" />  
              
               <span class="boxshadow">
              <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
       
   </span>
                
    
  </div>
 </div>
    
 
      <div class="form-group">
  <label class="control-label col-sm-2">Member Name :</label>
  <div class="col-sm-5">
       <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbMname"   >
                    		
                        <?php
                        $exam_table = $db->query("select id,name,email,phone from say_member");
	while(list($id,$name,$mail,$phone)=$exam_table->fetch_row()){
               if($mname==$id){				
                        echo "<option value='$id' selected>$id || $name || $mail || $phone</option>";
        }else{
               echo "<option value='$id'>$id || $name || $mail || $phone</option>";
        }
        }
	?>
                      </select>
   
  </div>
 </div> 
    
    
     <div class="form-group">
  <label class="control-label col-sm-2">Book Name   :</label>
  <div class="col-sm-5">
             <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtBookId"  >
              
                    		
                        <?php
                        $exam_table = $db->query("select id,name,author,publisher from say_book");
	while(list($id,$name,$author,$publisher)=$exam_table->fetch_row()){
	   if($bname==$id){					
                        echo "<option value='$id' selected>(i)$id ||(b) $name || (a)$author || (p)$publisher </option>";
        }else{
                    echo "<option value='$id' >(i)$id ||(b) $name || (a)$author || (p)$publisher </option>";
        }
        }
	?>
                      </select>
   
  </div>
 </div> 
     <div class="form-group">
  <label class="control-label col-sm-2">Issue Date :</label>
  <div class="col-sm-5">
      <div  class='input-group date'>
           <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtIdate"  placeholder="yyyy-mm-dd"  value="<?php echo isset($idate)?$idate:" "?>"/>
                   
                </div>
  </div>
 </div> 
   <div class="form-group">
  <label class="control-label col-sm-2">Retarn Date :</label>
  <div class="col-sm-5">
      <div  class='input-group date'>
              <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date1" name="txtRdate"  placeholder="yyyy-mm-dd"  value="<?php echo isset($rdate)?$rdate:" "?>"/>
                
                </div>
  </div>
 </div> 
  <div class="form-group">
  <label class="control-label col-sm-2">Remark :</label>
  <div class="col-sm-5">
      <textarea name="txtRemark" placeholder="Remark" cols="20" rows="4" class="form-control"  ><?php echo isset($remark)?$remark:"" ?></textarea>
   
  </div>
 </div> 
    
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-6">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>




