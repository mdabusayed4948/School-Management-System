



<div style='margin:10px' class='boxshadow'>

<?php
if(isset($_POST["txtSearch"])): ?>
 <?php 
$search_word=$_POST["txtSearch"];
	
	$db=new mysqli("localhost","root","","sms");
        
   $exam_table=$db->query("select m.id,s.student_name,m.roll,su.subject_name,e.exam_name,se.session_name,c.class_name,g.group_name,m.mark_obtained  from mark as m,student as s,subject as su,class as c,exam as e, session as se,c_group as g where s.id=m.student_id and su.id=m.subject_id and se.id=m.session_id and g.id=m.group_id and c.id=m.class_id and su.id=m. subject_id and e.id=m.exam_id   and (m.student_id like '%".$search_word."%' and m.exam_id like '%".$search_word."%' )");
list($mark_id,$student_name,$roll,$subject,$exam_name,$session,$class,$group,$obtained_mark)=   $exam_table->fetch_row();
 
 
?>
    <table class="table table-bordered table-hover">
        <tr><td colspan='10' style='background-color:#F5F5F5'>&nbsp;</td></tr>
          <tr>
         
              <th colspan="2" style="text-align: center; font-size: 25px">Government High School</th>
    </tr>
    <tr style="font-size: 15px">
           <th>Student Name:</th>
        <th><?php echo $student_name;?></th>
    </tr>
      <tr>
           <th>Class :</th>
        <th><?php echo $class;?></th>
    </tr>
      <tr>
           <th>Session :</th>
        <th><?php echo $session;?></th>
    </tr>
     <tr>
           <th>Class Roll :</th>
        <th><?php echo $roll;?></th>
    </tr>
      <tr>
           <th>Exam :</th>
        <th><?php echo $exam_name;?></th>
    </tr>
     
    </table>
    
 <?php endif;?>
  
    
 </div>
























