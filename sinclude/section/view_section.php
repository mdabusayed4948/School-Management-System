
<h2 class='styl boxshadow'><span class='style boxshadow'> Section List</span></h2>
<?php
if(isset($_POST['txtSectionId'])){
$section_id = $_POST['txtSectionId'];	
  $db->query("delete  from say_c_group where id='$section_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}
?>


  <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='3' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none'><i class='glyphicon glyphicon-plus-sign'></i>  </a></span></td></tr>

 <tr><th>Section ID</th><th>Section Name</th></tr></thead>
 <?php

  $section_table=$db->query("select id,group_name from say_c_group order by id");
  while(list($section_id,$section_name)=$section_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $section_id;?></td>
	<td><?php echo $section_name;?></td>
	
			
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='3'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>



















