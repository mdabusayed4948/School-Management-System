 
<?php
if(isset($_POST['txtTeacherId'])){
		$teacher_id = $_POST['txtTeacherId'];	
		
		$user_table = $db->query("select t.teacher_id,t.teacher_name,t.photo,t.email,t.gender,d.group_name,t.teacher_code,t.mobile,t.apply_time from  saytbl_teacher as t,say_c_group as d where d.id=t.c_group_id and t.teacher_id='$teacher_id'");
	 date_default_timezone_set("Asia/Dhaka");	
                list($id,$name,$photo,$mail,$gender,$department,$code,$mobile,$join)=$user_table->fetch_row();
               
                  $join=date("d M Y",strtotime($join));
}

?>
<h2 class='styl boxshadow'><span class='style boxshadow'> Teacher's  Profile</span></h2>
<div style='margin:10px' class='boxshadow'><table class="table table-bordered table table-hover " >
 <thead style="background-color: #F5F5F6">
              <tr>
                  <td  colspan="2"><span class=' boxshadow ' style='float:right;'><a href='home.php?item=12'  style='font-weight:bold; color:#5A5A5A; text-decoration:none;padding:4px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></td>
                               
            </tr>
            </thead>
         <tbody >
             <tr  >
         
                 <th  colspan="2" style="text-align: center" ><img src="<?php echo isset($photo)?$photo:" "?>" width="100" height="100"/></th>
             </tr>
            <tr>
          <th>Teacher Name:</th>
           <th><?php echo isset($name)?$name:" "?></th>
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
          <th>Section:</th>
           <th><?php echo isset($department)?$department:" "?></th>
                             
         </tr>          
             <tr>
          <th>Code  :</th>
           <th><?php echo isset($code)?$code:" "?></th>
                             
         </tr>                    
                             
             <tr>
          <th>Mobile:</th>
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



