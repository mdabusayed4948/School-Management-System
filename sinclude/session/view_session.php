
<h2 class='styl boxshadow'><span class='style boxshadow'> Session List</span></h2>
<?php
if(isset($_POST['txtSessionId'])){
$session_id = $_POST['txtSessionId'];	
  $db->query("delete  from say_session where id='$session_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}


  $class_table=$db->query("select id,session_name from say_session order by id");

  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='3' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none'><i class='glyphicon glyphicon-plus-sign'></i>  </a></span></td></tr>";

  echo "<tr><th>Session ID</th><th>Session Name</th></thead></tr>";
  while(list($session_id,$session_name)=$class_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $session_id;?></td>
	<td><?php echo $session_name;?></td>
	
			
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='3'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>


















