
<h2 class='styl boxshadow'><span class='style boxshadow'> Parents List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$p_id = $_POST['txtpId'];	
  $db->query("delete  from parents where id='$p_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}
?>

 <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
<thead><tr><td colspan='7' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none'> <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>

<tr><th>Parents ID</th><th>Parents Name</th><th>Student Name</th><th>E-mail</th><th >Phone</th></tr></thead>
<?php

  $patents_table=$db->query("select p.id,s.id,s.student_name,s.father_name,s.mother_name,p.email,p.phone,p.profession,p.address,p.gender from parents as p, say_student as s where s.id=p.student_id order by p.id");

 while(list($pid,$sid,$sname,$fname,$mname,$email,$phone,$profession,$address,$gender)=$patents_table->fetch_row()):?>
  
 <tbody>
	<tr>
			  
	<td><?php echo $pid;?></td>
	<td>
                         
                         <li > F=<?php echo $fname;?></li>
                        <li> M=<?php echo $mname;?></li>
              
                        </td>
                              <td><?php echo $sid;?> | <?php echo $sname;?></td>
                             <td><?php echo $email;?></td>
	<td><?php echo $phone;?></td>
	
	
			

	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='7'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>
















