
<h2 class='styl boxshadow'><span class='style boxshadow'> Subject List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$subject_id = $_POST['txtSubjectId'];	
  $db->query("delete   from say_subject where id='$subject_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}


  $class_table=$db->query("select id,subject_name  from say_subject  order by id");

  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='4' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href='home.php?item=55'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'> <i class='glyphicon glyphicon-plus-sign'></i> Add Subject</a></span></td></tr>";

  echo "<tr><th>Subject ID</th><th>Subject Name</th><th  width='150'>Options</th></thead></tr>";
  while(list($subject_id,$subject)=$class_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $subject_id;?></td>
	<td><?php echo $subject;?></td>
	
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
          <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=57' method='post'>
                <input type='hidden' value='<?php echo $subject_id;?>' name='txtSubjectId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                      <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button>        
                    </span>
</form>	
           
                                                
        </li>
             </div>
             <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=56' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $subject_id?>' name='txtSubjectId'/>&nbsp;&nbsp;
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



















