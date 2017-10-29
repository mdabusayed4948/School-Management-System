
<h2 class='styl boxshadow'><span class='style boxshadow'> Delete Student</span></h2>
<?php
error_reporting(0);
   if(isset($_POST["btnDelete"])){
	   $ids=$_POST["chkIds"];
	   
	   foreach($ids as $id){
	   $getquery = "select photo from say_student where id='$id ' ";
    $getImg=$db->query($getquery);
    
    while($imgdata = $getImg->fetch_assoc()){
        $delimg=$imgdata['photo'];
        unlink($delimg);
    }	  
		
		   $msg = $db->query("delete  from say_student where id='$id'");
		
	   }
	     if($msg==TRUE){
                 echo "<div class='alert alert-success' role='alert'><strong>Succussfully Deleted!</strong></div>";
           }else{
                 echo "<div class='alert alert-danger' role='alert'><strong>Please select Checkbox !</strong></div>";
           }
	   
	}

?>

<?php
  $user_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name from  say_student as s,sayclass as c,say_session as n,say_c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id");
   echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
  echo "<thead><tr><td colspan='5' style='background-color:#F5F5F5; padding:5px'><form action='home.php?item=7' method='post' onSubmit='return confirm(\"Are you sure?\")'> <span class='boxshadow'>          <button type='submit' name='btnDelete' class='btn btn-default' ><i class='glyphicon glyphicon-trash'></i></button>  </span></td></tr>";
  date_default_timezone_set("Asia/Dhaka");

 
  echo "<tr><th>Action</th><th>ID</th><th>Student Name</th><th>E-Mail</th><th>Mobile</th></tr></thead>"; 
  while(list($id,$name,$photo,$fname,$mname,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group)=$user_table->fetch_row()){
	    $join=date("d M Y",strtotime($join));
	 echo "<tbody><tr><td><input type='checkbox' name='chkIds[]' value='$id' /></td>
	 <td>$id</td>
                     <td>$name</td>
	 <td>$mail</td>
	 <td>$mobile</td>
	 </tr>"; 
  }
echo "  <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>";
  echo "</tbody></table></form></div>";

?>




