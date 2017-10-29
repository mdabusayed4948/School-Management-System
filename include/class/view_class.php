
<h2 class='styl boxshadow'><span class='style boxshadow'> Class List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$class_id = $_POST['txtClassId'];	
  $db->query("delete  from sayclass where id='$class_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}
?>


  <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='4' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href='home.php?item=26'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'> <i class='glyphicon glyphicon-plus-sign'></i> Add Class</a></span></td></tr>

  <tr><th>Class ID</th><th>Class Name</th><th>Teacher Name</th><th  width='150'>Options</th></tr></thead>
 <?php
   $class_table=$db->query("select c.id,c.class_name,t.teacher_name from sayclass as c,saytbl_teacher as t where t.teacher_id=c.tbl_teacher_teacher_id");

  while(list($class_id,$class,$teacher)=$class_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $class_id;?></td>
	<td><?php echo $class;?></td>
	<td><?php echo $teacher;?></td>
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
              <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=28' method='post'>
                <input type='hidden' value='<?php echo $class_id;?>' name='txtClassId'/>&nbsp;&nbsp;
                    <span class="boxshadow">
              <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button> 
                    </span>
</form>	
           
                                                
        </li>
             </div>
            <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=27' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $class_id?>' name='txtClassId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
             <button type="submit" name="btnDelete" class="btn btn-default"><i class='glyphicon glyphicon-trash'></i> </button> 
                    </span>
</form>	
                                 
 </li>
            </div>
  </ul>
                  
      </div>
			 
	</td>
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='4'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>

















