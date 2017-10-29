
<h2 class='styl boxshadow'><span class='style boxshadow'> Exam List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$exam_id = $_POST['txtExamId'];	
  $db->query("delete   from exam where id='$exam_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}


  $exam_table=$db->query("select id,exam_name, start_date, comment from exam  order by id");
date_default_timezone_set("Asia/Dhaka");	
  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='5' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'> <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>";

  echo "<tr><th>Exam ID</th><th>Exam Name</th><th>Start Date </th><th>Comments </th></thead></tr>";
  while(list($exam_id,$exam_name,$date,$com)=$exam_table->fetch_row()):?>
   <?php   $date=date("d M Y",strtotime($date)); ?>
 <tbody>
	<tr>
			  
	<td><?php echo $exam_id;?></td>
	<td><?php echo $exam_name;?></td>
	<td><?php echo $date;?></td>
                        <td><?php echo $com;?></td>
			
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>





















