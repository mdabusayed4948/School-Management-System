<link href="css/style.css" rel="stylesheet"/>
<h2 class='styl boxshadow'><span class='style boxshadow'>Total  Student  Report</span></h2>

<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
        <thead><tr><td colspan='5' style='background-color:#F5F5F5'><span style="font-size: 20px; ">Year Wise Total Student</span><span class=' boxshadow ' style='float:right;'><a href='home.php?item=5'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'>   <i class='glyphicon glyphicon-plus-sign'></i>  Add Student </a></span></td></tr>
 <tr><th width='50%'>Year</th><th >Total Student</th></tr></thead>
  <?php

$teacher_table = $db->query("select year(apply_date), count(id) from say_student group by year(apply_date);");
	while(list($year,$student)=$teacher_table->fetch_row()) :?>
<tbody>	 
	<tr>
	<td><?php echo $year;?></td>
	<td><?php echo $student;?></td>
	</tr>	
	<?php endwhile;?>
            <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
       <?php

$teacher_table = $db->query("select  count(id) from say_student ");
	while(list($activeStudent)=$teacher_table->fetch_row()) :?>
<tbody>	 
	<tr>
	<th> Total Student</th>
	<th><?php echo $activeStudent;?></th>
	</tr>	
	<?php endwhile;?>
            <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
</tbody>
</table>
</div>

<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
        <thead><tr><td colspan='5' style='background-color:#F5F5F5'><span style="font-size: 20px; "> Total Present Student</span><span class=' boxshadow ' style='float:right;'><a href='home.php?item=5'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'>   <i class='glyphicon glyphicon-plus-sign'></i>  Add Student </a></span></td></tr>
 <tr><th width='50%'>Year</th><th >Total Student</th></tr></thead>
  <?php

$teacher_table = $db->query("select year(apply_date), count(id) from say_student where status='Present' group by year(apply_date) ");
	while(list($year,$student)=$teacher_table->fetch_row()) :?>
<tbody>	 
	<tr>
	<td><?php echo $year;?></td>
	<td><?php echo $student;?></td>
	</tr>	
	<?php endwhile;?>
            <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
       <?php

$teacher_table = $db->query("select  count(id) from say_student where status='Present' ");
	while(list($activeStudent)=$teacher_table->fetch_row()) :?>
<tbody>	 
	<tr>
	<th> Total Present Student</th>
	<th><?php echo $activeStudent;?></th>
	</tr>	
	<?php endwhile;?>
            <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
</tbody>
</table>
</div>


<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
        <thead><tr><td colspan='5' style='background-color:#F5F5F5'><span style="font-size: 20px; "> Total Previous Student</span><span class=' boxshadow ' style='float:right;'><a href='home.php?item=5'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'>   <i class='glyphicon glyphicon-plus-sign'></i>  Add Student </a></span></td></tr>
 <tr><th width='50%'>Year</th><th >Total Student</th></tr></thead>
  <?php

$teacher_table = $db->query("select year(apply_date), count(id) from say_student where status='Previous' group by year(apply_date) ");
	while(list($year,$student)=$teacher_table->fetch_row()) :?>
<tbody>	 
	<tr>
	<td><?php echo $year;?></td>
	<td><?php echo $student;?></td>
	</tr>	
	<?php endwhile;?>
            <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
       <?php

$teacher_table = $db->query("select  count(id) from say_student where status='Previous' ");
	while(list($activeStudent)=$teacher_table->fetch_row()) :?>
<tbody>	 
	<tr>
	<th> Total   Previous Student</th>
	<th><?php echo $activeStudent;?></th>
	</tr>	
	<?php endwhile;?>
            <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
</tbody>
</table>
</div>