
<h2 class='styl boxshadow'><span class='style boxshadow'> Member List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$member_id = $_POST['txtMemberId'];	
  $db->query("delete   from say_member where id='$member_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}
?>


  <div style='margin:10px' class='boxshadow' ><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='5' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px' > <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>

 <tr><th>Member Name</th><th>E-mail</th><th>Phone</th><th>Address  </th></tr></thead>
<?php

  $member_table=$db->query("select id,name, email, phone, address  from say_member  order by id"); 
 while(list($member_id,$member_name,$mail,$phone,$address)=$member_table->fetch_row()):?>

 <tbody>
	<tr>
			  
	
	<td><?php echo $member_name;?></td>
	   <td><?php echo $mail;?> </td>
                       <td><?php echo $phone;?></td>
	<td><?php echo $address;?></td>		
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>





















