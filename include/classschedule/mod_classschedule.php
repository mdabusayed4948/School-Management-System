
 <h2 class='styl boxshadow'><span class='style boxshadow'>Class Shedule List </span></h2>
<?php
if(isset($_POST['btnDelete'])){
$shedule_id = $_POST['txtSheduleId'];	

 $getquery = "select photo from say_classschedule where id='$shedule_id ' ";
 
        $getImg=$db->query($getquery);
    
    while($imgdata = $getImg->fetch_assoc()){
        $delimg=$imgdata['photo'];
        unlink($delimg);
    }

  $db->query("delete  from say_classschedule where id='$shedule_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}
?>
 

<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='4' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href='home.php?item=74'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'><i class='glyphicon glyphicon-plus-sign'></i>  Create Class Shedule</a></span></td></tr>
  <tr><th >ID</th><th>Class Name</th><th>Class Routine</th><th  width='150'>Options</th></tr></thead>
  <?php

  $user_table=$db->query("select s.id,c.class_name,s.photo from say_classschedule as s, sayclass as c where c.id=s.class_id");
 
 while(list($id,$class_name,$photo)=$user_table->fetch_row()):?>
 <tbody>
	<tr>
			  
	<td ><?php echo $id?></td>
	 <td><?php echo $class_name?></td>
	<td>
            <img src="  <?php echo $photo?>" width="50" height="50"/>
          
        </td>
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
                 <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=84' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtSheduleId'/>&nbsp;&nbsp;
                    <span class="boxshadow">
     <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button>      
                    </span>
</form>	
                                                
        </li>
                 </div>
                   <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=83' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $id?>' name='txtSheduleId'/>&nbsp;&nbsp;
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
         
          </tbody>
          <tfoot>
               <tr>
 	<td colspan='4'  style='background-color:#F5F5F5'></td>
 </tr>
          </tfoot>


 </table>

 </div>
