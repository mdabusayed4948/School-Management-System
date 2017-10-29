
<h2 class='styl boxshadow'><span class='style boxshadow'> Dormitories List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$dorm_id = $_POST['txtDormId'];	
  $db->query("delete  from say_dormitories where id='$dorm_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Success : </strong>Data Successfully Deleted</div>";

}
?>


  <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='5' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href='home.php?item=85'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'><i class='glyphicon glyphicon-plus-sign'></i>  Add Dormitory</a></span></td></tr>

 <tr><th>Dormitory ID</th><th>Dormitory Name</th><th>Number of Room</th><th>Dormitory Description</th><th  width='150'>Options</th></tr></thead>
 <?php

  $section_table=$db->query("select id,name,number_of_room,dormdesc from say_dormitories order by id");
  while(list($dorm_id,$name,$dnum,$desc)=$section_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $dorm_id;?></td>
	<td><?php echo $name;?></td>
                         <td><?php echo $dnum;?></td>
	<td><?php echo $desc;?></td>
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
               <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=87' method='post'>
                <input type='hidden' value='<?php echo $dorm_id;?>' name='txtDormId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                        <button  type='submit' name='btnEdit'    class="btn btn-default"><i class='glyphicon glyphicon-edit'></i></button>
           </span>
</form>	
           
                                                
        </li>
               </div>
                 <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=86' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $dorm_id?>' name='txtDormId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                        <button  type='submit' name='btnDelete'  class="btn btn-default"><i class='glyphicon glyphicon-trash'></i></button>
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
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>



















