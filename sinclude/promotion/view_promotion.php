
<h2 class='styl boxshadow'><span class='style boxshadow'> Student Promotion Record List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$promotion_id = $_POST['txtProId'];	
  $db->query("delete  from s_promotion where id='$promotion_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}


  $class_table=$db->query("select p.id,s.id, s.student_name,p.roll,c.class_name,se.session_name,g.group_name,p.p_date from s_promotion as p, say_student as s,sayclass as c, say_session as se, say_c_group as g where s.id=p.student_id and c.id=p.class_id and se.id=p.session_id and g.id=p.group_id order by p.class_id");
 date_default_timezone_set("Asia/Dhaka");	
  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='7' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:5px'> <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>";

  echo "<tr><th>Student's Name</th><th>Roll No</th><th>Class Name</th><th>Session </th><th>Section Name</th><th>Date </th></thead></tr>";
  while(list($promotion_id,$sid,$student_name,$roll,$class_name,$session,$group,$date)=$class_table->fetch_row()):?>
   <?php  $date=date("d M Y",strtotime($date)); ?>
 <tbody>
	<tr>
			  
	
	<td><?php echo $student_name;?></td>
	<td><?php echo $roll;?></td>
                        <td><?php echo $class_name;?></td>
                         <td><?php echo $session;?></td>
                            <td><?php echo $group;?></td>
                                <td><?php echo $date;?></td>
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='7'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>



















