<h2 class='styl boxshadow'><span class='style boxshadow'>Student Attendence System</span></h2>
<div style="margin: 10px" class='boxshadow'>
    
    <table class='table table-bordered  table-hover'>
    <thead>
        <tr>
            <th colspan='8' style='background-color:#F5F5F5; text-align:center; '>
                <span style='float:left'>
                    <form action='home.php?item=71' method='post'>
                 
                         <span class='boxshadow'> 
                                  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cmbSession"   data-size="10">
                          
                    		<option > Select Session </option>
                        <?php
                        $exam_table = $db->query("select id,session_name from say_session");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                      
                            <span class='boxshadow'> 
                                  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cmbClass"   data-size="10">
                       
                    		<option >Select Class</option>
                        <?php
                        $exam_table = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                          <span class='boxshadow'> 
                         <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cmbSection"   data-size="10">
                  
                    		<option >Select Section</option>
                        <?php
                        $exam_table = $db->query("select id,group_name from say_c_group");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                        <span class='boxshadow'>  <button type="submit" name="btnSearch"  class="btn btn-default" ><img src="images/search-icon.png" width="20"/></button > </span>   
                        
                 
                 </form>
             </span>
            </th>
        </tr>
    </thead>
</table>


<?php
  
 date_default_timezone_set("Asia/Dhaka");	
 $cur_date = date('Y-m-d');
     $cur_date =date("d M Y",strtotime( $cur_date ));
     
     if(isset($_POST['attend'])){
    $attend = $_POST['attend'];

                foreach ($attend as $atn_key => $atn_value){
                 if($atn_value =="present" ){
                     $data_insert = $db->query ("INSERT INTO  attendance(student_id, attend,att_time) values('$atn_key','present',now()+ INTERVAL 11 HOUR);");
                   //  $db->query("insert into student(student_name,photo,father_name, mother_name,address,birth_day, email,gender,class_id,roll,mobile,apply_date,session_id,group_id)values('$sname','$upload_image','$fname','$mname','$address','$dob','$mail ','$gender','$class','$Roll','$mobile','$join','$session','$group');");
                   //  $data_insert = $this->db->insert($stu_query);
             
                 }elseif ($atn_value =="absent") {
                      $data_insert = $db->query ("INSERT INTO  attendance(student_id, attend,att_time) values('$atn_key','absent',now()+ INTERVAL 11 HOUR);");
                  //   $stu_query = "INSERT INTO  attendance(student_id, attend,att_time) values('$atn_key','absent',now())";
                    // $data_insert = $this->db->insert($stu_query);
                  
            }
             }
            
          if(   $data_insert ){
                        $msg = "<div class='alert alert-success'><strong>Success !</strong>Attendence Data Inserted Successfully.</div>";
    echo  $msg;
                }else{
                        $msg = "<div class='alert alert-danger'><strong>Error !</strong>Attendence Data not Inserted .</div>";
         echo  $msg;
                }

    
}




?>
<?php
if(isset($insertattend )){
    echo $insertattend ;
}
?>

        <div class="panel panel-default">
            <div class="panel-heading">
                &nbsp;
            </div>
            
            <div class="panel-body">
                <div class="well text-center" style="font-size: 20px">
                    <strong>Date:</strong><?php echo $cur_date;?>
                </div>
                <form  action="" method="post">
                    <table class="table table-striped">
                        <tr>
                            <th width="25%">Serial</th>
                           <th width="25%">Student Name</th>
                            <th width="25%">Student Roll</th>
                            <th width="25%">Attendence</th>
                        </tr>
                       <?php
if(isset($_POST['btnSearch'])) :?>
                        
                        
                        <?php
                   $session= $_POST["cmbSession"]; 
 
      $class= $_POST["cmbClass"]; 
         $section= $_POST["cmbSection"]; 
        
  
         $get_student=$db->query("select s.id,s.student_name,s.roll,c.class_name,g.group_name,se.session_name from say_student as s, sayclass as c, say_c_group as g, say_session as se where c.id=s.class_id and g.id=s.group_id and se.id=s.session_id and s.session_id like '%".$session."%' and s.class_id like '%".$class."%' and s.group_id like '%".$section."%'");
      //$get_student=$db->query("select a.id,s.student_name,s.roll,s.class_id,s.group_id,s.session_id from student as s,attendence as a where a.id=s.student_id  and s.session_id like '%".$session."%' and s.class_id like '%".$class."%' and s.group_id like '%".$section."%'");
  
                        if($get_student){
                              $i =0;
                               while ($value = $get_student->fetch_assoc()){
                               $GLOBALS['z'] = $value; 
                                    $i++;
                          
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                             <td><?php echo $value['student_name'];?></td>
                            <td><?php echo $value['roll'];?></td>
                             <td>
                                <input type="radio" name="attend[<?php echo $value['id'];?>]" value="present">P
                                <input type="radio" name="attend[<?php echo $value['id'];?>]" value="absent">A
                             </td>
                        </tr>
                        
                    <?php  } }?>
                       
                        
 <?php endif;?>                       
                        <tr>
                            <td colspan="4">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            </td>
                    
                        </tr>
                    </table>
                </form>
            </div>
        </div>



</div>
