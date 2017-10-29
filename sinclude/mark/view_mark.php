
<h2 class='styl boxshadow'><span class='style boxshadow'> ExamMarks List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$mark_id = $_POST['txtMarkId'];	
  $db->query("delete   from mark where id='$mark_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}


  $exam_table=$db->query("select m.id,s.id,s.student_name,m.roll,su.subject_name,e.exam_name,se.session_name,c.class_name,g.group_name,m.mark_obtained  from mark as m,say_student as s,say_subject as su,sayclass as c,exam as e, say_session as se,say_c_group as g where s.id=m.student_id and su.id=m.subject_id and se.id=m.session_id and g.id=m.group_id and c.id=m.class_id and su.id=m. subject_id and e.id=m.exam_id   order by m.student_id");

  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='10' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'> <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>";

  echo "<tr><th>Number Id</th><th>Student Name</th><th>Class Roll </th><th>Subject </th><th>Exam Name </th><th>Session  </th><th>Class  </th><th>Section  </th><th>Obtained Mark  </th></thead></tr>";
  while(list($mark_id,$sid,$student_name,$roll,$subject,$exam_name,$session,$class,$group,$obtained_mark)=$exam_table->fetch_row()):?>
  
 <tbody>
	<tr>
	<td><?php echo $mark_id;?></td>		  
	
	<td><?php echo $sid;?> || <?php echo $student_name;?></td>
                       <td><?php echo $roll;?></td>
	<td><?php echo $subject;?></td>
                  
                        <td><?php echo $exam_name;?></td>
	<td><?php echo $session;?></td>
                         <td><?php echo $class;?></td>
                       <td><?php echo $group;?></td>
               
                          <td><?php echo $obtained_mark;?></td>
                     
                            

	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='10'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>






















