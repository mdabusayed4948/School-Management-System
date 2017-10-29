
<h2 class='styl boxshadow'><span class='style boxshadow'>Delete Student's Fee  </span></h2>
<?php
error_reporting(0);
   if(isset($_POST["btnDelete"])){
	   $ids=$_POST["chkIds"];
	   
	   foreach($ids as $id){
		  
		
		 $msg=  $db->query("delete  from say_payment where id='$id'");
		
	   }
	    if($msg==TRUE){
                 echo "<div class='alert alert-success' role='alert'><strong>Succussfully Deleted!</strong></div>";
           }else{
                 echo "<div class='alert alert-danger' role='alert'><strong>Please select Checkbox !</strong></div>";
           }
	   
	}

?>


<?php
  $user_table=$db->query("select p.id,s.id,s.student_name,so.source_name,p.income_date,p.paid_amount,due_amount,p.status from say_payment as p,  say_student as s, source as so  where s.id=p.student_id and so.id=p.source_id");
    echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   
   echo "<thead><tr><td colspan='9' style='background-color:#F5F5F5; padding:5px'><form action='home.php?item=15' method='post' onSubmit='return confirm(\"Are you sure?\")'> <span class='boxshadow'>          <button type='submit' name='btnDelete' class='btn btn-default' ><i class='glyphicon glyphicon-trash'></i></button> </span></td></tr>";
  echo "<tr><th>&nbsp;</th><th>Payment ID</th><th>Student ID</th><th>Student Name</th><th>Source</th><th>Date</th><th>Paid Amount</th><th>Due Amount</th><th>Status</th></tr></thead>"; 
 
   while(list($pid,$sid,$name,$source,$date,$pamount,$damount,$status)=$user_table->fetch_row()) :?>
	
 <tr><td><input type='checkbox' name='chkIds[]' value='<?php echo $pid;?>' /></td>
 <td><?php echo $pid;?></td>
  <td><?php echo $sid;?></td>
<td><?php echo $name;?></td>
<td><?php echo $source;?></td>
<td><?php echo $date;?></td>
<td><?php echo $pamount;?></td>
<td><?php echo $damount;?></td>	
<td><?php echo $status;?></td>	
 </tr>
  <?php endwhile?>
  <tr>
 <td colspan='9'  style='background-color:#F5F5F5'></td>
 </tr>
</tbody></table></form></div>




     