
 <h2 class='styl boxshadow'><span class='style boxshadow'>View User </span></h2>
<?php
if(isset($_POST['txtUserId'])){
$user_id = $_POST['txtUserId'];	
  $db->query("delete  from sayuser where id='$user_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}


  $user_table=$db->query("select u.id,r.name,u.username,u.password from sayuser as u, sayrole as r where r.id=u.role_id");

  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='4' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding:4px'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none'><i class='glyphicon glyphicon-plus-sign'></i>  Add User</a></span></td></tr>";
  echo "<tr><th >ID</th><th>Role</th><th>Username</th><th  width='150'>Options</th></tr></thead>";
  while(list($id,$role_name,$username)=$user_table->fetch_row()):?>
 <tbody>
	<tr>
			  
	<td ><?php echo $id?></td>
	 <td><?php echo $role_name?></td>
	<td><?php echo $username?></td>
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
              <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=2' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtUserId' />&nbsp;&nbsp;
                    <span class="boxshadow">
      
       <button type="submit" name="btnEdit" class="btn btn-default" disabled><i class='glyphicon glyphicon-edit'></i> </button>    
                    </span>
</form>	
           
                                                
        </li>
        </div>
                  <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=4' method='post' onSubmit="return confirm('Are you sure Delete this record?');">
                <input type='hidden' value='<?php echo $id?>' name='txtUserId' />&nbsp;&nbsp;
                    <span class="boxshadow"> 
     
         <button type="submit" name="btnDelete" class="btn btn-default" disabled><i class='glyphicon glyphicon-trash'></i> </button>    
                    </span>
</form>	
                                 
 </li>
                  </div>
                  <div style="margin-left: 45px; margin-top: 3px">
   <li> 
           <form action='home.php?item=24' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtUserId' />&nbsp;&nbsp;
                    <span class="boxshadow">
     
           <button type="submit" name="btnProfile" class="btn btn-default" ><i class='glyphicon glyphicon-user'></i> </button>  
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
