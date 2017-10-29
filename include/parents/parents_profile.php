 
<?php
if(isset($_POST['txtParentsId'])){
		$p_id = $_POST['txtParentsId'];	
		
		$user_table = $db->query("select p.id,s.father_name,p.email,p.phone,p.profession,p.address,p.gender from parents as p, say_student as s where s.id=p.student_id order by p.id and p.id='$p_id'");
	 date_default_timezone_set("Asia/Dhaka");	
                list($pid,$name,$email,$phone,$profession,$address,$gender)=$user_table->fetch_row();
               
               
}

?>
<h2 class='styl boxshadow'><span class='style boxshadow'>View Parents  Profile</span></h2>
<div style='margin:10px' class='boxshadow'><table class="table table-bordered table table-hover " >
 <thead style="background-color: #F5F5F6">
              <tr>
                  <td  colspan="2"><span class=' boxshadow ' style='float:right;'><a href='home.php?item=37'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Back to list</a></span></td>
                               
            </tr>
            </thead>
         <tbody >
             <tr  >
         
                 <th  colspan="2" style="text-align: center" ><img src="<?php echo isset($photo)?$photo:" "?>" width="100" height="100"/></th>
             </tr>
            <tr>
          <th>Parents Name:</th>
           <td><?php echo isset($name)?$name:" "?></td>
         </tr>
                               
                  
            <tr>
          <th>E-mail:</th>
           <td><?php echo isset($email)?$email:" "?></td>
                             
         </tr> 
                <tr>
          <th>Phone:</th>
           <td><?php echo isset($phone)?$phone:" "?></td>
                             
         </tr>          
             <tr>
          <th>Profession  :</th>
           <td><?php echo isset($profession)?$profession:" "?></td>
                             
         </tr>                    
                             
             <tr>
          <th>Address:</th>
           <td><?php echo isset($address)?$address:" "?></td>
                             
         </tr>                             
              <tr>
          <th>Gender :</th>
           <td><?php echo isset($gender)?$gender:" "?></td>
                             
         </tr>                       
           
          
           
    
      
         
   
          
          <tr>
              <td colspan="5" style="background-color:#F5F5F6 "></td>
             </tr>
          </tbody>
     </table>
  </div>




