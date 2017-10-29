<?php
if(isset($_POST['btnDelete'])){
$teacher_id = $_POST['txtteacherId'];	
  $db->query("delete  from tbl_teacher where teacher_id='$teacher_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}

?>
<?php
if(isset($_POST["txtSearch"])): ?>
    <?php
	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
	
	$teacher_table=$db->query("select teacher_id,teacher_name,email,mobile from  saytbl_teacher where teacher_id like '%".$search_word."%' OR teacher_name like '%".$search_word."%' OR email like '%".$search_word."%'");
	
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><td colspan='5' style='background-color:#F5F5F5'><span class=' boxshadow ' style='float:right;'><a href='home.php?item=9'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'>   <i class='glyphicon glyphicon-plus-sign'></i>  Add Teacher</a></span></td></tr>";
echo "<tr><th>ID</th><th>Name</th><th>E-mail</th><th>Phone</th><th>Options</th></tr>";
	
	while(list($id,$name,$mail,$mobile)=$teacher_table->fetch_row()):?>
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
        	
          <form action='home.php?item=10' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtteacherId'/>&nbsp;&nbsp;
                    <span class="boxshadow">
		   <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button> 
         
		 </span>
</form>                            
        </li>
            </div>
           <div style="margin-left: 45px; margin-top: 3px">
         <li> 
      <form action='home.php?item=12' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $id;?>' name='txtteacherId'/>&nbsp;&nbsp;
               <span class="boxshadow">  
				  <button type="submit" name="btnDelete" class="btn btn-default"><i class='glyphicon glyphicon-trash'></i> </button> 
         
				</span>
</form>                              
        </li>
            </div>
       <div style="margin-left: 45px; margin-top: 3px">
           
   <li> 
 
       <form action='home.php?item=35' method='post'>
            <input type='hidden' value='<?php echo $id?>' name='txtTeacherId'/>&nbsp;&nbsp;
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

 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
?>


