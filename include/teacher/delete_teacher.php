<h2 class='styl boxshadow'><span class='style boxshadow'>Teacher's  Delete Form</span></h2>
<?php
   if(isset($_POST["btnDelete"])){
       error_reporting(0);
	   $ids=$_POST["chkIds"];
	   
	   foreach($ids as $id){
		   $getquery = "select photo from saytbl_teacher where teacher_id='$id ' ";
    $getImg=$db->query($getquery);
    
    while($imgdata = $getImg->fetch_assoc()){
        $delimg=$imgdata['photo'];
        unlink($delimg);
    }	  
		
		  $msg =  $db->query("delete  from saytbl_teacher where teacher_id='$id'");
		
	   }
	  if($msg==TRUE){
                 echo "<div class='alert alert-success' role='alert'><strong>Succussfully Deleted!</strong></div>";
           }else{
                 echo "<div class='alert alert-danger' role='alert'><strong>Please select Checkbox !</strong></div>";
           }
	   
	}

?>



  <form action='home.php?item=11' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
    
  <table class='table table-bordered table-hover'>
      <thead>
           <td colspan='10' style='background-color:#F5F5F5; '>
               <button type="submit" name="btnDelete" class="btn btn-default "><i class='glyphicon glyphicon-trash'></i></button>
         
      </td>
 <tr>
     <th>&nbsp;</th>
     <th>ID</th>
     <th> Name</th>
     <th>Photo</th>
     <th>E-Mail</th>
     <th>Gender</th>
     <th>Department</th>
     <th> Code</th>
     <th>Mobile</th>
     <th>Apply Date</th>
 </tr>
   </thead>
  <?php
     date_default_timezone_set("Asia/Dhaka");
  $user_table=$db->query("select t.teacher_id,t.teacher_name,t.photo,t.email,t.gender,d.group_name,t.teacher_code,t.mobile,t.apply_time from  saytbl_teacher as t,say_c_group as d where d.id=t.c_group_id order by teacher_id");
  while(list($id,$name,$photo,$mail,$gender,$department,$code,$mobile,$join)=$user_table->fetch_row()){
	    $join=date("d M Y",strtotime($join));
	 echo "<tr><td><input type='checkbox' name='chkIds[]' value='$id' /></td>
	 <td>$id</td>
     <td>$name</td>
	 <td><img src='$photo' width='50' /></td>
	 <td>$mail</td>
	 <td>$gender</td>
	 <td>$department</td>
	 <td>$code</td>
	 <td>$mobile</td>
	 <td>$join</td>
	
	 </tr>"; 
  }
  

?>
</table></form>
