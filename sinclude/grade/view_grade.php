
<h2 class='styl boxshadow'><span class='style boxshadow'> Gradelevels List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$grade_id = $_POST['txtGradeId'];	
  $db->query("delete   from gradelevels where id='$grade_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}


  $exam_table=$db->query("select id,name, description, gradepoints, gradefrom,gradeto from gradelevels  order by id");

  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='5' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'> <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>";

  echo "<tr><th>Grade Name</th><th>Grade || (From->To )</th><th>Grade Points </th><th>Description  </th></thead></tr>";
  while(list($grade_id,$grade_name,$desc,$gradepoint,$gradefrom,$gradeto)=$exam_table->fetch_row()):?>

 <tbody>
	<tr>
			  
	
	<td><?php echo $grade_name;?></td>
	   <td><?php echo $gradefrom;?> -> <?php echo $gradeto;?></td>
                       <td><?php echo $gradepoint;?></td>
	<td><?php echo $desc;?></td>		

	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>





















