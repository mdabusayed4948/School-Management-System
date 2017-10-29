
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Promotion </span></h2>

<?php
	if(isset($_POST['txtProId'])){
		$promotion_id = $_POST['txtProId'];	
		
		$student_table = $db->query("select id,student_id ,roll,class_id,session_id,group_id,p_date from s_promotion where id='$promotion_id '");
		list($promotion_id,$student_name,$roll,$class_name,$session,$group,$date)=$student_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$promotion_id   = $_POST['txtProId'];	
	$student_name  = $_POST['cmbSname'];
	$roll                        = $_POST['txtRoll'];
	$class_name       = $_POST['cmbClass'];
                         $session             = $_POST['cmbSession'];      
	$group                 = $_POST['cmbSection'];
	$date                    = $_POST['txtDate'];
	

	
	
	
	$db->query("update s_promotion set student_id='$student_name',roll='$roll',class_id='$class_name',session_id ='$session ', group_id='$group',p_date='$date'where id='$promotion_id'");
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
}

?>
<div   style='margin-left:10px; ' class="btn btn-default  "><span class=' boxshadow '><a href='home.php?item=68'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:5px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=69" method="post" style="margin-top:30px;" class="form-horizontal" enctype="multipart/form-data">
    
 
    <div class="form-group">
  <label class="control-label col-sm-2"> Promotion  ID:</label>
  <div class="col-sm-5">
      <input type="number"  name="txtProId"  value="<?php echo isset($promotion_id)?$promotion_id:" "?>"   class="form-control" />  
      <span class="boxshadow">
       
         <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
      </span>
 
  </div>
 </div>
  <div class="form-group">
  <label class="control-label col-sm-2">Student Id:</label>
  <div class="col-sm-5">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbSname"  value="<?php echo isset($student_name)?$student_name:" "?>"  data-size="10">
     
                        <?php
                        $table = $db->query("select id,student_name from say_student");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($student_name==$id){
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
  <label class="control-label col-sm-2">Roll no:</label>
  <div class="col-sm-5">
      <input type="number" name="txtRoll" value="<?php echo isset($roll)?$roll:" "?>"  class="form-control"/>
 
  </div>
 </div>    
 
      <div class="form-group">
  <label class="control-label col-sm-2">Class:</label>
  <div class="col-sm-5">
<select name="cmbClass" class="form-control">
                  
                        <?php
                        $table = $db->query("select * from sayclass");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($class_name==$id){
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
  <label class="control-label col-sm-2">Session:</label>
  <div class="col-sm-5">
<select name="cmbSession" class="form-control">
                  
                        <?php
                        $table = $db->query("select * from say_session");
	while(list($id,$name)=$table->fetch_row()){
					
                       if($session==$id){
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
  <label class="control-label col-sm-2">Section:</label>
  <div class="col-sm-5">
<select name="cmbSection" class="form-control">
         
             <?php
              $table = $db->query("select id,group_name from say_c_group");
            while(list($id,$name)=$table->fetch_row()){
					
            if($group==$id){
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
  <label class="control-label col-sm-2">Date:</label>
  <div class="col-sm-5">
            <div  class='input-group date'>
                 <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtDate"   placeholder="yyyy-mm-dd" value="<?php echo isset($date)?$date:" "?>"/>
               
                </div>
 
 
 
  </div>
 </div>    
    
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>
