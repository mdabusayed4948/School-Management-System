<h2 class='styl boxshadow'><span class='style boxshadow'>Student Attendence System</span></h2>
<div style="margin: 10px" class='boxshadow'>
   


<?php
  
 date_default_timezone_set("Asia/Dhaka");	
 $cur_date = date('Y-m-d');
     $cur_date =date("d M Y",strtotime( $cur_date ));
     
     if(isset($_POST['attend'])){
    $attend = $_POST['attend'];

                foreach ($attend as $atn_key => $atn_value){
                 if($atn_value =="present" ){
                     $data_insert = $db->query ("INSERT INTO  attendance(student_id, attend,att_time) values('$atn_key','present',now());");
                   //  $db->query("insert into student(student_name,photo,father_name, mother_name,address,birth_day, email,gender,class_id,roll,mobile,apply_date,session_id,group_id)values('$sname','$upload_image','$fname','$mname','$address','$dob','$mail ','$gender','$class','$Roll','$mobile','$join','$session','$group');");
                   //  $data_insert = $this->db->insert($stu_query);
             
                 }elseif ($atn_value =="absent") {
                        $data_insert = $db->query ("INSERT INTO  attendance(student_id, attend,att_time) values('$atn_key','absent',now());");
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
                <h2>
                    <a class="btn btn-success" href="add.php">Add Student</a>
                      <a class="btn btn-info pull-right" href="">View All</a>
                </h2>
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
if(isset($_POST['txtAttId'])) :?>
                        
                        <?php
              $att_id = $_POST['txtAttId'];
        
  
       $get_student=$db->query("select a.id,s.student_name,s.roll,a.attend,a.att_time from attendance as a,student as s, where s.id=a.student_id and a.id=' $att_id' ");
                        if($get_student){
                              $i =0;
                               while ($value = $get_student->fetch_assoc()){
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

