
<h2 class='styl boxshadow'><span class='style boxshadow'>  Delete  User</span></h2>
<?php
error_reporting(0);
   if(isset($_POST["btnDelete"])){
	   $ids=$_POST["chkIds"];
	   
	   foreach($ids as $id){
		   
                            $msg= $db->query("delete from sayuser where id='$id'");
		   
	   }
           if($msg==TRUE){
                 echo "<div class='alert alert-success' role='alert'><strong>Succussfully Deleted!</strong></div>";
           }else{
                 echo "<div class='alert alert-danger' role='alert'><strong>Please select Checkbox !</strong></div>";
           }
	
	   
	}

?>

<?php
  $user_table=$db->query("select u.id,u.username,r.name from sayuser as u,sayrole as r where r.id=u.role_id");
    echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   
   echo "<thead><tr><td colspan='5' style='background-color:#F5F5F5; padding:5px'><form action='home.php?item=3' method='post' onSubmit='return confirm(\"Are you sure?\")'> <span class='boxshadow'>        <button type='submit' name='btnDelete' class='btn btn-default'><i class='glyphicon glyphicon-trash'></i> </button>     </span></td></tr>";
 
   echo "<tr><th>Action</th><th>ID</th><th>Role Name</th><th>User Name</th></tr></thead>"; 
  while(list($id,$username,$role)=$user_table->fetch_row()){
echo "<tbody><tr><td><input type='checkbox' name='chkIds[]' value='$id' /></td>
        <td>$id</td>
      <td>$role</td>
         <td>$username</td>
        </tr>"; 
  }
  echo "  <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>";
  echo "</tbody></table></form></div>";

?>

