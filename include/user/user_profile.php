 
<?php
if(isset($_POST['txtUserId'])){
		$user_id = $_POST['txtUserId'];	
		
		$user_table = $db->query("select u.id,r.name,u.username,u.gender,u.email,u.address,u.mobile,u.join_date,u.password from sayuser as u, sayrole as r where r.id=u.role_id and u.id='$user_id'");
		 date_default_timezone_set("Asia/Dhaka");	
                list($id,$role,$username,$gender,$mail,$address,$mobile,$join,$password)=$user_table->fetch_row();
                   $join=date("d M Y",strtotime($join));
}
?>
<h2 class='styl boxshadow'><span class='style boxshadow'>User's Profile</span></h2>
<div style='margin:10px' class='boxshadow'><table class="table table-bordered table table-hover " >
 <thead style="background-color: #F5F5F6">
              <tr>
                  <td  colspan="2"><span class=' boxshadow ' style='float:right;'><a href='home.php?item=4'  style='font-weight:bold; color:#5A5A5A; text-decoration:none;padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></td>
                               
            </tr>
            </thead>
         <tbody >
           
            <tr>
          <th>Role Name:</th>
           <th><?php echo isset($role)?$role:" "?></th>
         </tr>
                               
      
              <tr>
          <th>User Name:</th>
           <th><?php echo isset($username)?$username:" "?></th>
                             
         </tr>                      
            <tr>
          <th>Gender:</th>
           <th><?php echo isset($gender)?$gender:" "?></th>
                             
         </tr> 
                <tr>
          <th>E-mail:</th>
           <th><?php echo isset($mail)?$mail:" "?></th>
                             
         </tr>          
             <tr>
          <th>Address:</th>
           <th><?php echo isset($address)?$address:" "?></th>
                             
         </tr>                    
                             
             <tr>
          <th>Mobile No:</th>
           <th><?php echo isset($mobile)?$mobile:" "?></th>
                             
         </tr>                             
              <tr>
          <th>Join Date:</th>
           <th><?php echo isset($join)?$join:" "?></th>
                             
         </tr>                       
    
          <tr>
              <td colspan="5" style="background-color:#F5F5F6 "></td>
             </tr>
          </tbody>
     </table>
  </div>

