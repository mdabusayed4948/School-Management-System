
<h2 class='styl boxshadow'><span class='style boxshadow'> Vehicle List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$vehicle_id = $_POST['txtTId'];	
  $db->query("delete  from say_transportation where id='$vehicle_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Success : </strong>Data Successfully Deleted</div>";

}
?>


  <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='7' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href='home.php?item=91'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'><i class='glyphicon glyphicon-plus-sign'></i>  Add Vehicle</a></span></td></tr>

 <tr><th>Vehicle ID</th><th>Vehicle Name</th><th>Driver's Name</th><th>Driver's Phone</th><th>Route Name</th><th>Vehicle Description</th><th  width='150'>Options</th></tr></thead>
 <?php

  $section_table=$db->query("select t.id,t.vehicle_name,d. name,d.phone,t.route_name,t.description from say_transportation as t,  say_driver as d where d.id=t.driver_id ");
  while(list($transport_id,$vname,$dname,$dphone,$rname,$desc)=$section_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $transport_id;?></td>
	<td><?php echo $vname;?></td>
    <td><?php echo $dname;?></td>
	 <td><?php echo $dphone;?></td>
	<td><?php echo $rname;?></td>
	<td><?php echo $desc;?></td>		
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
               <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=93' method='post'>
                <input type='hidden' value='<?php echo $transport_id;?>' name='txtTId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                        <button  type='submit' name='btnEdit'    class="btn btn-default"><i class='glyphicon glyphicon-edit'></i></button>
           </span>
</form>	
           
                                                
        </li>
               </div>
                 <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=92' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $transport_id?>' name='txtTId'/>&nbsp;&nbsp;
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
 	<td colspan='7'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>



















