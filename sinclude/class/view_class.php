
<h2 class='styl boxshadow'><span class='style boxshadow'> Class List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$class_id = $_POST['txtClassId'];	
  $db->query("delete  from sayclass where id='$class_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}
?>


  <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='4' style='background-color:#F5F5F5'>&nbsp;</td></tr>

  <tr><th>Class ID</th><th>Class Name</th><th>Teacher Name</th></tr></thead>
 <?php
   $class_table=$db->query("select c.id,c.class_name,t.teacher_name from sayclass as c,saytbl_teacher as t where t.teacher_id=c.tbl_teacher_teacher_id");

  while(list($class_id,$class,$teacher)=$class_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $class_id;?></td>
	<td><?php echo $class;?></td>
	<td><?php echo $teacher;?></td>
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='4'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>

















