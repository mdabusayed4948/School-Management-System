
<h2 class='styl boxshadow'><span class='style boxshadow'>EditExam   </span></h2>

<?php
	if(isset($_POST['txtExamId'])){
	    $exam_id = $_POST['txtExamId'];	
	 
                        
                
		$exam_table = $db->query("select id,exam_name, start_date,comment from exam  where id='$exam_id '");
		list($exam_id,$exam_name,$date,$comment)=$exam_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$exam_id            = $_POST['txtExamId'];	
                        $exam_name    = $_POST["txtExam"];
	     $date               = $_POST["txtDate"];
                           $comment      = $_POST["txtComments"];
	
        
	$db->query("update exam set exam_name='$exam_name', start_date='$date',comment='$comment'  where id='$exam_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}  

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=59'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=60" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Exam ID:</label>
  <div class="col-sm-5">
    
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  name="txtExamId" value="<?php echo isset($exam_id)?$exam_id:" "?>"     data-size="10" >

		   <?php
                        $table = $db->query("select id,exam_name from exam");
while(list($id,$name)=$table->fetch_row()){
        if($exam_id==$id){
             echo "<option value='$id' selected>ID=$id || $name</option>";  
        }else{
             echo "<option value='$id'>ID=$id || $name</option>";      
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
  <label class="control-label col-sm-2">Exam Name :</label>
  <div class="col-sm-5">
      <input type="text" name="txtExam" value="<?php echo isset($exam_name)?$exam_name:" "?>"   class="form-control"/>
  </div>
 </div>     
    
      <div class="form-group">
  <label class="control-label col-sm-2">Exam Date  :</label>
  <div class="col-sm-5">
         <div  class='input-group date'>
                     <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date1" name="txtDate"  placeholder="yyyy-mm-dd" value="<?php echo isset($date)?$date:" "?>" />
              
                </div>
 
  </div>
 </div> 

 <div class="form-group">
  <label class="control-label col-sm-2">Comments :</label>
  <div class="col-sm-5">
      <textarea name="txtComments" placeholder="Comments" cols="20" rows="4" class="form-control" required=""><?php echo isset($comment)?$comment:" "?></textarea>
   
  </div>
 </div>  
    
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>

