
<h2 class='styl boxshadow'><span class='style boxshadow'> Student's  Result Sheet</span></h2>




<div style="margin: 10px" class='boxshadow'><table class='table table-bordered  table-hover'>
    <thead>
        <tr>
            <th colspan='8' style='background-color:#F5F5F5; text-align:center; '>
                <span style='float:left'>
                    <form action='home.php?item=70' method='post'>
                       <span class=' boxshadow'>

  <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name='txtSid'  data-size="10">
<option>--Select Student--</option>
		   <?php
                        $table = $db->query("select id,student_name,email from say_student");
	while(list($id,$name,$mail)=$table->fetch_row()){
					
                        echo "<option value='$id'>ID=$id || $name || $mail</option>";
						
	}
						
	?>
      
      </select>		
</span> 
            
           
                        <span class='boxshadow'> 
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="cmbExam" data-size="10">
<option>--Select Exam--</option>
                        <?php
                        $exam_table = $db->query("select id,exam_name from exam");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                            <span class='boxshadow'> 
                               <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="cmbClass" data-size="10">
                 
                    		<option >--Select Class--</option>
                        <?php
                        $exam_table = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                            <span class='boxshadow'> 
                                     <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="cmbSession" data-size="10">
                 
                    		<option >--Select Session--</option>
                               
                        <?php
                        $exam_table = $db->query("select id,session_name from say_session");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                        <span class='boxshadow'>  <button type="submit" name="btnSearch" class="btn btn-default"  ><img src="images/search-icon.png" width="20"/></button > </span> 
               
                            
                 </form>
             </span>
                <button onclick="myFunction()" class="btn btn-info"><i class="glyphicon glyphicon-print"></i> Print</button>
            </th>
			
        </tr>
    </thead>
</table>


<?php
if(isset($_POST['btnSearch'])) :?>
    
    <?php
  $student_id = $_POST["txtSid"]; 
   $exam= $_POST["cmbExam"]; 
     $class= $_POST["cmbClass"]; 
        $session= $_POST["cmbSession"]; 
        
  $exam_table=$db->query("select m.id,s.student_name,m.roll,su.subject_name,e.exam_name,se.session_name,c.class_name,g.group_name,m.mark_obtained  from mark as m,say_student as s,say_subject as su,sayclass as c,exam as e, say_session as se,say_c_group as g where s.id=m.student_id and su.id=m.subject_id and se.id=m.session_id and g.id=m.group_id and c.id=m.class_id and su.id=m. subject_id and e.id=m.exam_id   and m.student_id like '%".$student_id."%' and m.exam_id like '%".$exam."%' and m.class_id like '%".$class."%'and m.session_id like '%".$session."%' ");

    

  list($mark_id,$student_name,$roll,$subject,$exam_name,$session,$class,$group,$obtained_mark)=   $exam_table->fetch_row();

 ?>
 <table class="" align="center">
     <p>
        <tr><td colspan='10' style='background-color:#F5F5F5;'>&nbsp;</td></tr>
       
         
        <tr> <th colspan="2" style="text-align: center; font-size: 25px">Government High School</th> </tr>
             
   
     <tr> <th colspan="2" style="text-align: center; font-size: 20px">Class: <?php echo $class;?></th></tr>
      <tr><th colspan="2" style="text-align: center; font-size: 20px">Session: <?php echo $session;?></th></tr>
           
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
 </p>
    </table>

<br/>
    <?php
  $student_id = $_POST["txtSid"]; 
   $exam= $_POST["cmbExam"]; 
      $class= $_POST["cmbClass"]; 
        $session= $_POST["cmbSession"]; 
        
  
  $exam_table=$db->query("select m.id,s.student_name,m.roll,su.subject_name,e.exam_name,se.session_name,c.class_name,g.group_name,m.mark_obtained  from mark as m,say_student as s,say_subject as su,sayclass as c,exam as e, say_session as se,say_c_group as g where s.id=m.student_id and su.id=m.subject_id and se.id=m.session_id and g.id=m.group_id and c.id=m.class_id and su.id=m. subject_id and e.id=m.exam_id   and m.student_id like '%".$student_id."%' and m.exam_id like '%".$exam."%' and m.class_id like '%".$class."%'and m.session_id like '%".$session."%'");
  
   echo" <table class='table table-bordered  table-hover'>
 
 <thead><tr><th>Subject Name </th><th>Obtained Mark </th></tr></thead> ";
  
  
 while( list($mark_id,$student_name,$roll,$subject,$exam_name,$session,$class,$group,$obtained_mark)=   $exam_table->fetch_row()):?>
  
<tbody>
    
	<tr>
	
                        <td><?php echo $subject;?></td>
	
                       <td><?php echo $obtained_mark;?></td>
              
	
	 </tr> 
        
 <?php endwhile ?>
         
     
 
 </tbody>
  <?php
 $student_id = $_POST["txtSid"]; 
   $exam= $_POST["cmbExam"]; 
      $class= $_POST["cmbClass"]; 
        $session= $_POST["cmbSession"]; 
	

             $add=$db->query("select m.id,s.student_name,e.exam_name,su.subject_name,sum(m.mark_obtained) ,avg(m.mark_obtained)  from say_student as s, exam as e,mark as m,say_subject as su where s.id=m.student_id and e.id=m.exam_id and su.id=m.subject_id   and m.student_id like '%".$student_id."%' and m.exam_id like '%".$exam."%' and m.class_id like '%".$class."%'and m.session_id like '%".$session."%'");
                   
          
        
              
               while(list($mark_id,$student_name,$exam,$subject_name,$tobtained_mark,$avg)=$add->fetch_row()) :?>

     <tfoot>
          <tr>
              <td colspan="2" style="background-color: #F5F5F5"></td>
         </tr>
         <tr >
         <th >Total Mark</th>
         <th> <?php echo $tobtained_mark;?></th>
        
     </tr>
    <tr >
         <th >Average Mark </th>
         <th> <?php echo $avg;?>  %</th>
        
     </tr>
     <tr >
         <th >Final Result </th>
     <th>
            <?php 
                if($avg>33){
                    echo "<p style='color: green; font-weight:bold'>Passed</p>";
                }elseif($avg<33 && $avg>0){
                   echo "<p style='color: red; font-weight:bold'>Failed</p>";
                  
                }else{
                      echo "<p style='color: green; font-weight:bold'>Result Not Found</p>";
                }
            ?>
         </th>
        
     </tr>
     <tr>
 <td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
 </tfoot> 
  
<?php endwhile?>   
            
      <?php endif;
      ?>
 
 
 
 </table>


</div>
 <script>
       function myFunction() {
       window.print();
           }
  </script>