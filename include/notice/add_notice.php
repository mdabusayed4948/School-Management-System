<h2 class='styl boxshadow'><span class='style boxshadow'>Add Notice  </span></h2>

<?php
if(isset($_POST["btnSubmit"])){
    $title                  = validate($_POST["txttitle"]);
    $noticefor       = validate($_POST["cmbnfor"]);
   
    $ncontent        = validate($_POST["txtNcontent"]);
    $ndate              = validate($_POST["txtNdate"]);
     
    
    $errors=array();
    
      if($title==""){		 
	   array_push($errors,"Title field is empty!");	 
	 }
           if($noticefor==""){		 
	   array_push($errors,"Notice for field is empty!");	 
	 }
           if($ncontent==""){		 
	   array_push($errors,"Content field is empty!");	 
	 }
           if($ndate==""){		 
	   array_push($errors,"Date field is empty!");	 
	 }
        
         
         if(count($errors)==0){
            $db->query ("insert into say_noticeboard(title,newsfor,description,newsdate)values('$title','$noticefor','$ncontent','$ndate');");
            echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";
            
            $title=$noticefor=$ncontent=$ndate="";
            
         }  else {
             echo "<div class='alert alert-danger' role='alert'><strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
         }
         
}

 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=95'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 5px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp; Notice List</a></span></div>
<form action="home.php?item=94" method="post" style="margin-top:30px;" class="form-horizontal" >
  
     <div class="form-group">
  <label class="control-label col-sm-2">Notice Title  :</label>
  <div class="col-sm-9">
    <input type="text" name="txttitle"  value="<?php echo isset($title)?$title:""?>"  placeholder="Notice Title" class="form-control" />
  </div>
 </div>  
      <div class="form-group">
  <label class="control-label col-sm-2">Notice For :</label>
  <div class="col-sm-9">
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbnfor"  value="<?php echo isset($noticefor)?$noticefor:""?>" data-size="10" class="form-control" >
	<option>--Select--</option>
                         <option value="All">All</option>
                         <option value="Teachers">Teachers</option>
                         <option value="Students">Students</option>
                         <option value="Parents">Parents</option>
      
      </select>
  </div>
 </div>  
    <div class="form-group">
  <label class="control-label col-sm-2">Notice Content:</label>
  <div class="col-sm-9">
 
      <textarea class="ckeditor"  name="txtNcontent" class="form-control"  value="<?php echo isset($ncontent)?$ncontent:""?>"></textarea>
  </div>
 </div>   
   
 <div class="form-group">
  <label class="control-label col-sm-2"> Date:</label>
  <div class="col-sm-9">
           <div  class='input-group date'>
                     <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date1" name="txtNdate"  placeholder="yyyy-mm-dd" value="<?php echo isset($ndate)?$ndate:""?>" />
              
                </div>
 
  </div>
 </div>  
   
    
    <div class="form-group">
  <div class="col-sm-offset-2 col-sm-9">
  <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
  <input type="reset" name="" value="Refresh" class="btn btn-success" />
  </div>
 </div>     
    
</form>
