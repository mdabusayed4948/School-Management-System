 <h2 class='styl boxshadow'><span class='style boxshadow'>View Student  Profile</span></h2>
<?php
if(isset($_POST['txtStudentId'])){
		$student_id = $_POST['txtStudentId'];	
		
		$user_table = $db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.address,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name,s.status from  say_student as s,sayclass as c,say_session as n,say_c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id and s.id='$student_id'");
	 date_default_timezone_set("Asia/Dhaka");	
                list($student_id,$studentname,$upload_image,$fname,$mname,$address,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group,$status)=$user_table->fetch_row();
                  $dob=date("d M Y",strtotime($dob));
                  $join=date("d M Y",strtotime($join));
}

?>

<div style='margin:10px' class='boxshadow'><table class="table table-bordered table table-hover " >
 <thead style="background-color: #F5F5F6">
              <tr>
                  <td  colspan="2"><span class=' boxshadow ' style='float:right;'><a href='home.php?item=8'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; padding:3px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></td>
                               
            </tr>
            </thead>
         <tbody >
             <tr  >
         
                 <th  colspan="2" style="text-align: center" ><img src="<?php echo isset($upload_image)?$upload_image:" "?>" width="100" height="100"/></th>
             </tr>
            <tr>
          <th>Student Name:</th>
           <th><?php echo isset($studentname)?$studentname:" "?></th>
         </tr>
                               
      
              <tr>
          <th>Father's Name:</th>
           <th><?php echo isset($fname)?$fname:" "?></th>
                             
         </tr>                      
            <tr>
          <th>Mother's Name:</th>
           <th><?php echo isset($mname)?$mname:" "?></th>
                             
         </tr> 
                <tr>
          <th>Address:</th>
           <th><?php echo isset($address)?$address:" "?></th>
                             
         </tr>          
             <tr>
          <th>Dath of Birth:</th>
           <th><?php echo isset($dob)?$dob:" "?></th>
                             
         </tr>                    
                             
             <tr>
          <th>E-mail:</th>
           <th><?php echo isset($mail)?$mail:" "?></th>
                             
         </tr>                             
              <tr>
          <th>Gender:</th>
           <th><?php echo isset($gender)?$gender:" "?></th>
                             
         </tr>                       
              <tr>
          <th>Class:</th>
          <th>
              <?php echo isset($class)?$class:" "?>
           </th>
          </tr> 
            <tr>
          <th>Roll:</th>
          <th>
              <?php echo isset($roll)?$roll:" "?>
           </th>
          </tr> 
           <tr>
          <th>Mobile:</th>
          <th>
              <?php echo isset($mobile)?$mobile:" "?>
           </th>
          </tr>
           <tr>
          <th>Apply Date:</th>
          <th>
              <?php echo isset($join)?$join:" "?>
           </th>
          </tr>
           <tr>
          <th>Session:</th>
          <th>
              <?php echo isset($session)?$session:" "?>
           </th>
          </tr>
           <tr>
          <th>Section:</th>
          <th>
              <?php echo isset($group)?$group:" "?>
           </th>
          </tr>
             <tr>
          <th>Status:</th>
          <th>
              <?php echo isset($status)?$status:" "?>
           </th>
          </tr>
          
          
          <tr>
              <td colspan="5" style="background-color:#F5F5F6 "></td>
             </tr>
          </tbody>
     </table>
  </div>

