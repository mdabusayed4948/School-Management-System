<?php
if(isset($_POST['btnDelete'])){
$student_id =$_POST['txtStudentId'];	
  $db->query("delete  from say_student where id='$student_id'");
  echo "<div class='alert alert-danger' role='alert'><strong>Successfully Deleted</strong></div>";

  
}



?>
<?php
if(isset($_POST["txtSearch"])): ?>
    <?php
	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
	
	//$admission_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name from  student as s,class as c,session as n,c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id and   s.id like '%".$search_word."%' OR s.student_name like '%".$search_word."%'");
	//$admission_table=$db->query(" select id, student_name,email,mobile from  student   where id like '%".$search_word."%' OR student_name like '%".$search_word."%' OR email like '%".$search_word."%'");
$admission_table=$db->query(" select id, student_name,email,mobile from  say_student   where id like '%".$search_word."%' ");

    

	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><td colspan='7' style='background-color:#F5F5F5'><span class=' boxshadow ' style='float:right;'><a href='home.php?item=5'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'>   <i class='glyphicon glyphicon-plus-sign'></i>  Add Student </a></span></td></tr>";
echo "<tr><th>ID</th><th>Name</th><th>E-mail</th><th>Phone</th><th>Options</th></tr>";
    
	while(list($id,$name,$mail,$mobile)=$admission_table->fetch_row()):?>
		<tr>
	<td><?php echo $id;?></td>
	<td><?php echo $name;?></td>
	<td><?php echo $mail;?></td>
	<td><?php echo $mobile;?></td>
	<td>
          
        
    			 
	<div class="btn-group">
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
              <div style="margin-left: 45px; margin-top: 3px">
        <li> 
        	
            <form action='home.php?item=6' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
              <span class="boxshadow">
			  <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button> 
         
        </span>
</form> 
                                                
        </li>
              </div>
                <div style="margin-left: 45px; margin-top: 3px">
         <li> 
     <form action='home.php?item=8' method='post' >
                <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
             <span class="boxshadow"> 
				  <button type="submit" name="btnDelete" class="btn btn-default"><i class='glyphicon glyphicon-trash'></i> </button> 
         
				 </span>
</form>  
                                                
        </li>
              </div>
               <div style="margin-left: 45px; margin-top: 3px">
 
   <li> 
 
       <form action='home.php?item=23' method='post'>
            <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
             <span class="boxshadow">
			  <button type="submit" name="profile" class="btn btn-default"><i class='glyphicon glyphicon-user'></i> </button> 
         
			</span>
</form>                    
   </li>
              </div>
          </ul>
      </div>
        </td>
</tr>	
	<?php endwhile;?>
  

         <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
</table>
        </div>
<?php endif;

?>

        
<?php
if(isset($_POST['btnDelete'])){
$student_id =$_POST['txtStudentId'];	
  $db->query("delete  from say_student where id='$student_id'");
  echo "<div class='alert alert-danger' role='alert'><strong>Successfully Deleted</strong></div>";

  
}



?>
<?php
if(isset($_POST["txtSearc"])): ?>
    <?php
	$search_word=validate($_POST["txtSearc"]);
	
	$db=new mysqli("localhost","root","","sms");
	
	//$admission_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name from  student as s,class as c,session as n,c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id and   s.id like '%".$search_word."%' OR s.student_name like '%".$search_word."%'");
		$admission_table=$db->query(" select s.id, s.student_name,s.roll,c.class_name,s.email,s.mobile from  say_student as s,sayclass as c   where c.id=s.class_id AND ( c.class_name like  '%".$search_word."%'  OR s.roll like '%".$search_word."%'  )");
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><td colspan='7' style='background-color:#F5F5F5'><span class=' boxshadow ' style='float:right;'><a href='home.php?item=5'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'>   <i class='glyphicon glyphicon-plus-sign'></i>  Add Student </a></span></td></tr>";
echo "<tr><th>ID</th><th>Name</th><th>E-mail</th><th>Phone</th><th>Class Roll</th><th>Class Name</th><th>Options</th></tr>";
	
	while(list($id,$name,$roll,$class,$mail,$mobile)=$admission_table->fetch_row()):?>
		<tr>
	<td><?php echo $id;?></td>
	<td><?php echo $name;?></td>
	<td><?php echo $mail;?></td>
	<td><?php echo $mobile;?></td>
                      <td><?php echo $roll;?></td>
                         <td><?php echo $class;?></td>
	<td>
          
        
    			 
	<div class="btn-group">
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
            <div style="margin-left: 45px; margin-top: 3px">
        <li> 
        	
            <form action='home.php?item=6' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
              <span class="boxshadow">
			 <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button> 
         
			</span>
</form> 
                                                
        </li>
              </div>
               <div style="margin-left: 45px; margin-top: 3px">
         <li> 
     <form action='home.php?item=8' method='post' >
                <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
             <span class="boxshadow"> 
				  <button type="submit" name="btnDelete" class="btn btn-default"><i class='glyphicon glyphicon-trash'></i> </button> 
         
				 </span>
</form>  
                                                
        </li>
              </div>
               <div style="margin-left: 45px; margin-top: 3px">
   <li> 
 
       <form action='home.php?item=23' method='post'>
            <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
             <span class="boxshadow">
			 <button type="submit" name="profile" class="btn btn-default"><i class='glyphicon glyphicon-user'></i> </button> 
         
			</span>
</form>                    
   </li>
              </div>
          </ul>
      </div>
        </td>
</tr>	
	<?php endwhile;?>
         <tr>
 	<td colspan='7'  style='background-color:#F5F5F5'></td>
 </tr>
</table>
        </div>
<?php endif;
 
 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
        
?>

    

        


