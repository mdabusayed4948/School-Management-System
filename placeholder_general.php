
<?php    
  if(isset($_GET["item"])){
	  
		 $item=$_GET["item"]; 
		  
		 if($item==1){ // Contact Management
			 include("include/user/add_user.php");
		 }else if($item==2){
			 include("include/user/edit_user.php");
		 }else if($item==3){
			 include("include/user/delete_user.php");
		 }else if($item==4){
			 include("include/user/view_user.php");
		 }else if($item==5){//-----Student Admission
			 include("include/student/add_student.php");
		 }else if($item==6){
			 include("include/student/edit_student.php");
		 }else if($item==7){
			 include("include/student/delete_student.php");
		 }else if($item==8){
			 include("sinclude/student/view_student.php");
		 }else if($item==9){
			 include("include/teacher/add_teacher.php");
		 }else if($item==10){
			 include("include/teacher/edit_teacher.php");
		 }else if($item==11){
			 include("include/teacher/delete_teacher.php");
		 }else if($item==12){
			 include("sinclude/teacher/view_teacher.php");
		 }else if($item==13){
			 include("include/stfee/add_fee.php");
		 }else if($item==14){
			 include("include/stfee/edit_fee.php");
		 }else if($item==15){
			 include("include/stfee/delete_fee.php");
		 }else if($item==16){
			 include("include/stfee/view_fee.php");
		 }else if($item==17){
			 include("include/student/count_student.php");
		 }else if($item==18){
			 include("include/book/add_book.php");
		 }else if($item==19){
			 include("include/book/edit_book.php");
		 }else if($item==20){
			 include("include/book/delete_book.php");
		 }else if($item==21){
			 include("sinclude/book/view_book.php");
		 }else if($item==22){
			 include("include/dashboard/dashboard.php");
		 }else if($item==23){
			 include("include/student/student_profile.php");
		 }else if($item==24){
			 include("include/user/user_profile.php");
		 }else if($item==25){
			 include("include/data/datatable.php");
		 }else if($item==26){
			 include("include/class/add_class.php");
		 }else if($item==27){
			 include("sinclude/class/view_class.php");
		 }else if($item==28){
			 include("sinclude/class/edit_class.php");
		 }else if($item==29){
			 include("include/section/add_section.php");
		 }else if($item==30){
			 include("sinclude/section/view_section.php");
		 }else if($item==31){
			 include("include/section/edit_section.php");
		 }else if($item==32){
			 include("include/session/add_session.php");
		 }else if($item==33){
			 include("sinclude/session/view_session.php");
		 }else if($item==34){
			 include("include/session/edit_session.php");
		 }else if($item==35){
			 include("include/teacher/teacher_profile.php");
		 }else if($item==36){
			 include("include/parents/add_parents.php");
		 }else if($item==37){
			 include("sinclude/parents/view_parents.php");
		 }else if($item==38){
			 include("include/parents/edit_parents.php");
		 }else if($item==39){
			 include("include/parents/parents_profile.php");
		 }else if($item==40){
			 include("include/source/add_source.php");
		 }else if($item==41){
			 include("include/source/view_source.php");
		 }else if($item==42){
			 include("include/source/edit_source.php");
		 }else if($item==43){
			 include("include/income/view_income.php");
		 }else if($item==44){
			 include("include/income/edit_income.php");
		 }else if($item==45){
			 include("include/income/add_otherincome.php");
		 }else if($item==46){
			 include("include/income/view_allincome.php");
		 }else if($item==47){
			 include("include/exp/add_teachersalary.php");
		 }else if($item==48){
			 include("include/exp/view_teachersalary.php");
		 }else if($item==49){
			 include("include/exp/edit_teachersalary.php");
		 }else if($item==50){
			 include("include/exp/add_otherexp.php");
		 }else if($item==51){
			 include("include/exp/view_otherexp.php");
		 }else if($item==52){
			 include("include/exp/edit_otherexp.php");
		 }else if($item==53){
			 include("include/exp/view_allotherexp.php");
		 }else if($item==54){
			 include("include/balance/view_balancereport.php");
		 }else if($item==55){
			 include("include/subject/add_subject.php");
		 }else if($item==56){
			 include("sinclude/subject/view_subject.php");
		 }else if($item==57){
			 include("include/subject/edit_subject.php");
		 }else if($item==58){
			 include("include/exam/add_exam.php");
		 }else if($item==59){
			 include("sinclude/exam/view_exam.php");
		 }else if($item==60){
			 include("include/exam/edit_exam.php");
		 }else if($item==61){
			 include("include/mark/add_mark.php");
		 }else if($item==62){
			 include("sinclude/mark/view_mark.php");
		 }else if($item==63){
			 include("include/mark/edit_mark.php");
		 }else if($item==64){
			 include("include/grade/add_grade.php");
		 }else if($item==65){
			 include("sinclude/grade/view_grade.php");
		 }else if($item==66){
			 include("include/grade/edit_grade.php");
		 }else if($item==67){
			 include("include/promotion/add_promotion.php");
		 }else if($item==68){
			 include("sinclude/promotion/view_promotion.php");
		 }else if($item==69){
			 include("include/promotion/edit_promotion.php");
		 }else if($item==70){
			 include("include/result/view_result.php");
		 }else if($item==71){
			 include("include/attendence/create_attendance.php");
		 }else if($item==72){
			 include("include/attendence/view_attendance.php");
		 }else if($item==73){
			 include("include/attendence/edit_attendance.php");
		 }else if($item==74){
			 include("include/classschedule/create_classschedule.php");
		 }else if($item==75){
			 include("include/student/view_activestudent.php");
		 }else if($item==76){
			 include("include/member/add_member.php");
		 }else if($item==77){
			 include("sinclude/member/view_member.php");
		 }else if($item==78){
			 include("include/member/edit_member.php");
		 }else if($item==79){
			 include("include/issuebook/add_issuebook.php");
		 }else if($item==80){
			 include("sinclude/issuebook/view_issuebook.php");
		 }else if($item==81){
			 include("include/issuebook/edit_issuebook.php");
		 }else if($item==82){
			 include("include/classschedule/view_classschedule.php");
		 }else if($item==83){
			 include("include/classschedule/mod_classschedule.php");
		 }else if($item==84){
			 include("include/classschedule/edit_classschedule.php");
		 }else if($item==85){
			 include("include/dormitory/add_dormitory.php");
		 }else if($item==86){
			 include("sinclude/dormitory/view_dormitory.php");
		 }else if($item==87){
			 include("include/dormitory/edit_dormitory.php");
		 }else if($item==88){
			 include("include/driver/add_driver.php");
		 }else if($item==89){
			 include("sinclude/driver/view_driver.php");
		 }else if($item==90){
			 include("include/driver/edit_driver.php");
		 }else if($item==91){
			 include("include/transport/add_transport.php");
		 }else if($item==92){
			 include("sinclude/transport/view_transport.php");
		 }else if($item==93){
			 include("include/transport/edit_transport.php");
		 }
                 
   		 
	  
  } else {?>
 

<form action="home.php?item=22" method="post">
<h2 class='styl boxshadow'><span class='style boxshadow'>Welcome to Dashboard</span></h2>

<div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
		          
        <th  colspan="3" style="background-color: #F5F5F6"> 
      
                <h3 style="text-align: center; padding: 0px; margin: 0px">
                    <img src="images/quicklink.png"  width="50"/>&nbsp; <span class="boxshadow" style="padding: 5px; color: #23527C" > Quick Links</span>
     
                </h3>
         
        </th>
               
        </tr> 
       
        <tr >
            <th style="text-align: center">
                <a  href="home.php?item=82" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px; " >
                            Class Shedule
                        </span>
        
                </h3>
            </a>	     
            </th>
              <th style="text-align: center">
                <a  href="home.php?item=61" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px;" >
             Exammarks Entry
                        </span>
     
                </h3>
            </a>	     
            </th>
            
        </tr> 
        
          <tr >
            <th style="text-align: center">
                <a  href="" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px; " >
                       Transportation
                        </span>
      
                </h3>
            </a>	     
            </th>
              <th style="text-align: center">
                <a  href="home.php?item=62" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px; " >
                    Show Exammarks 
                        </span>
        
                </h3>
            </a>	     
            </th>
            
        </tr> 
         <tr >
            <th style="text-align: center">
                <a  href="" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px; " >
                      News Board
                        </span>
    
                </h3>
            </a>	     
            </th>
              <th style="text-align: center">
                <a  href="home.php?item=70" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px; " >
           Show Result
                        </span>   
  
                </h3>
            </a>	     
            </th>
            
        </tr> 
          <tr >
            <th style="text-align: center">
                <a  href="" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px; " > 
                 Events
               
                        </span>
                </h3>
            </a>	     
            </th>
            
             <th style="text-align: center">
                <a  href="home.php?item=72" style="text-decoration: none"> 
                    <h3 style="text-align: center; padding: 0px; margin: 0px"><span style="background-color: #F5F5F6; padding: 4px; " > 
                         Attendance
               
         </span>
                </h3>
            </a>	     
            </th>
        </tr> 
    
        </thead>
      
        <tfoot>
                <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
        </tfoot>
      
    </table>
		
</div>
</div>



<div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
		          
        <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/user.png" />&nbsp;<span class="boxshadow "  style="padding: 5px">  Total User
        = <?php 
		 $user_table = $db->query("select count(*) from sayuser");
		 while(list($user)=$user_table->fetch_row()){
		
        	echo$user;
		
			
		 }
          ?>
      
         </span>
                </h3>
            </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">User Name</th>
               <th style="text-align: center">E-mail</th>
              <th style="text-align: center">Mobile</th>   
        </tr> 
        </thead>
          <?php 
//$user_table=$db->query("select u.id,r.name,u.username,u.password from user as u, role as r where r.id=u.role_id limit 3");
$user_table = $db->query("select u.id,r.name,u.username,u.gender,u.email,u.address,u.mobile,u.join_date,u.password from sayuser as u, sayrole as r where r.id=u.role_id limit 3");
 while(list($id,$role,$username,$gender,$mail,$address,$mobile,$join,$password)=$user_table->fetch_row()):?>
			
			

          
            
        <tbody>
            
            <tr>
             <td><?php echo $username?></td>
             <td><?php echo $mail?></td>
             <td><?php echo $mobile?></td>
            </tr>
              
        <?php endwhile ?>
           
        </tbody>
        
        <tfoot>
                <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
        </tfoot>
      
    </table>
		
</div>
</div>



<div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
		          
        <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/user.png" />&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Teacher
        = <?php 
		 $user_table = $db->query("select count(*) from saytbl_teacher");
		 while(list($user)=$user_table->fetch_row()){
		
        	echo$user;
		
			
		 }
          ?>
      
         </span>
                </h3>
            </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Teacher Name</th>
               <th style="text-align: center">E-mail</th>
              <th style="text-align: center">Mobile</th>   
        </tr> 
        </thead>
          <?php 
//$user_table=$db->query("select u.id,r.name,u.username,u.password from user as u, role as r where r.id=u.role_id limit 3");
 $teacher_table=$db->query("select t.teacher_id,t.teacher_name,t.photo,t.email,t.gender,d.group_name,t.teacher_code,t.mobile,t.apply_time from  saytbl_teacher as t,say_c_group as d where d.id=t.c_group_id order by teacher_id limit 4");
 date_default_timezone_set("Asia/Dhaka");
   
  while(list($id,$name,$photo,$mail,$gender,$department,$code,$mobile,$join)=$teacher_table->fetch_row()):?>
 
			
			

          
            
        <tbody>
            
            <tr>
             <td><?php echo $name?></td>
             <td><?php echo $mail?></td>
             <td><?php echo $mobile?></td>
            </tr>
              
        <?php endwhile ?>
           
        </tbody>
        
        <tfoot>
                <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
        </tfoot>
      
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/parents-icon.png" width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total parents
        =<?php 
		 $user_table = $db->query("select count(*) from parents");
		 while(list($user)=$user_table->fetch_row()){
		
        	echo$user;
		
			
		 }
          ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center"> Name</th>
               <th style="text-align: center">Email</th>
               <th style="text-align: center">Phone</th>
        </tr> 
        </thead>
        <?php

  $patents_table=$db->query("select p.id,s.id,s.student_name,s.father_name,s.mother_name,p.email,p.phone,p.profession,p.address,p.gender from parents as p, say_student as s where s.id=p.student_id order by p.id");

 while(list($pid,$sid,$sname,$fname,$mname,$email,$phone,$profession,$address,$gender)=$patents_table->fetch_row()):?>
            
        <tbody>
            
            <tr>
                <td><?php echo $fname?></td>
               <td><?php echo $email?></td>
               <td><?php echo $phone?></td>
            </tr>
              
          
      <?php endwhile ?>         
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>


 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/icon.png"  width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Student
        =<?php 
		 $student_table = $db->query("select count(*) from say_student");
		 while(list($student)=$student_table->fetch_row()){
		
        	echo $student;
		
			
		 }
          ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center"> Name</th>
               <th style="text-align: center"> E-mail</th>
                <th style="text-align: center"> Phone</th> 
        </tr> 
        </thead>
     <?php
  $student_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name,s.status from  say_student as s,sayclass as c,say_session as n,say_c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id order by s.id asc limit 4");

 
  while(list($id,$name,$photo,$fname,$mname,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group,$status)=$student_table->fetch_row()):?>
 
            
        <tbody>
            
            
            <tr>
                <td><?php echo $name;?></td>
                <td><?php echo $mail;?></td>
                 <td><?php echo $mobile;?></td>
            </tr>
              
             <?php endwhile ?>
           
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>


 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/icon.png"  width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Present Student
        =<?php 
		 $student_table = $db->query("select count(*) from say_student where status='Present'");
		 while(list($student)=$student_table->fetch_row()){
		
        	echo $student;
		
			
		 }
          ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Name </th>
               <th style="text-align: center">E-mail </th>
                 <th style="text-align: center">Phone </th>
        </tr> 
        </thead>
        <?php
  $student_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name,s.status from  say_student as s,sayclass as c,say_session as n,say_c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id and status='Present' order by s.id asc limit 4");

 
  while(list($id,$name,$photo,$fname,$mname,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group,$status)=$student_table->fetch_row()):?>
 
            
        <tbody>
            
            
            <tr>
                <td><?php echo $name;?></td>
                <td><?php echo $mail;?></td>
                 <td><?php echo $mobile;?></td>
            </tr>
              
             <?php endwhile ?>
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

<div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/icon.png"  width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Previous Student
        =<?php 
		 $student_table = $db->query("select count(*) from say_student where status='Previous'");
		 while(list($student)=$student_table->fetch_row()){
		
        	echo $student;
		
			
		 }
          ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Name </th>
               <th style="text-align: center">E-mail </th>
                 <th style="text-align: center">Phone </th>
        </tr> 
        </thead>
        <?php
  $student_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name,s.status from  say_student as s,sayclass as c,say_session as n,say_c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id and status='Previous' order by s.id asc limit 4");

 
  while(list($id,$name,$photo,$fname,$mname,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group,$status)=$student_table->fetch_row()):?>
 
            
        <tbody>
            
            
            <tr>
                <td><?php echo $name;?></td>
                <td><?php echo $mail;?></td>
                 <td><?php echo $mobile;?></td>
            </tr>
              
             <?php endwhile ?>
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>



 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/class.png" width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Class
        =<?php 
		 $class_table = $db->query("select count(*) from sayclass ");
		 while(list($class)=$class_table->fetch_row()){
		
        	echo $class;
		
			
		 }
          ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Class </th>
               <th style="text-align: center">Class Teacher </th>
               
        </tr> 
        </thead>
           <?php
   $class_table=$db->query("select c.id,c.class_name,t.teacher_name from sayclass as c,saytbl_teacher as t where t.teacher_id=c.tbl_teacher_teacher_id");

  while(list($class_id,$class,$teacher)=$class_table->fetch_row()):?>
 
            
        <tbody>
            
            <tr>
                <td><?php echo $class;?></td>
                <td><?php echo $teacher;?></td>
            </tr>
              
          
         <?php endwhile;?>  
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>
 



 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/book2.png" width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Subject
        =<?php 
		 $subject_table = $db->query("select count(*) from say_subject");
		 while(list($subject)=$subject_table->fetch_row()){
		
        	echo $subject;
                 }
                 ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Subject Id</th>
               <th style="text-align: center">Subject Name</th>
               
        </tr> 
        </thead>
           <?php

  $section_table=$db->query("select id,subject_name from say_subject order by id limit 4");
  while(list($id,$session_name)=$section_table->fetch_row()):?>
            
            
        <tbody>
            
            <tr>
                 <td><?php echo $id?></td>
                   <td><?php echo $session_name?></td>
            </tr>
              
             <?php endwhile;?>
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>
 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/dor.png" width="50"" />&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Dormitories
        =<?php 
		 $section_table = $db->query("select count(*) from say_dormitories");
		 while(list($section)=$section_table->fetch_row()){
		
        	echo $section;
                 }
                 ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Dormitory Name</th>
               <th style="text-align: center">Number of Room</th>
               
        </tr> 
        </thead>
          <?php

  $section_table=$db->query("select id,name,number_of_room from say_dormitories order by id limit 4");
  while(list($id,$d_name,$nor)=$section_table->fetch_row()):?>
            
        <tbody>
            
            <tr>
              
                   <td><?php echo $d_name?></td>
				     <td><?php echo $nor?></td>
            </tr>
              
          
               <?php endwhile ?>       
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/transport.png" width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Vehicles
        =<?php 
		 $section_table = $db->query("select count(*) from say_transportation");
		 while(list($section)=$section_table->fetch_row()){
		
        	echo $section;
                 }
                 ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Vehicle Name</th>
               <th style="text-align: center">Driver Name</th>
              <th style="text-align: center">Route Name</th>
                
        </tr> 
        </thead>
             <?php

  $section_table=$db->query("select t.id,t.vehicle_name,d.name,t.route_name from say_transportation as t,say_driver as d where d.id=t.driver_id order by id limit 4");
  while(list($tid,$vname,$dname,$r_name)=$section_table->fetch_row()):?>
            
        <tbody>
            
            <tr>
                   <td><?php echo $vname?></td>
                   <td><?php echo $dname?></td>
				    <td><?php echo $r_name?></td>
            </tr>
              
          
           <?php endwhile;?>
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/book1.png" width="50"/>&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Book
        =<?php 
		 $subject_table = $db->query("select count(*) from say_book");
		 while(list($subject)=$subject_table->fetch_row()){
		
        	echo $subject;
                 }
                 ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Book  Name</th>
               <th style="text-align: center">Author Name</th>
                   <th style="text-align: center">Publisher</th>
        </tr> 
        </thead>
           <?php

  $section_table=$db->query("select id,name,author,publisher from say_book order by id limit 4");
  while(list($id,$book_name,$author,$publisher)=$section_table->fetch_row()):?>
            
            
        <tbody>
            
            <tr>
                 
                   <td><?php echo $book_name;?></td>
                   <td><?php echo $author;?></td>
                   <td><?php echo $publisher;?></td>
            </tr>
              
             <?php endwhile;?>
           
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>


 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/user.png" width="50" />&nbsp;<span class="boxshadow"  style="padding: 5px">  Total Member
        =<?php 
		 $subject_table = $db->query("select count(*) from say_member");
		 while(list($subject)=$subject_table->fetch_row()){
		
        	echo $subject;
                 }
                 ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
           
               <th style="text-align: center"> Name</th>
               <th style="text-align: center"> E-mail</th>
               <th style="text-align: center"> Phone</th>
        </tr> 
        </thead>
           <?php

  $section_table=$db->query("select id,name,email,phone from say_member order by id limit 4");
  while(list($id,$name,$mail,$phone)=$section_table->fetch_row()):?>
            
            
        <tbody>
            
            <tr>
            
                   <td><?php echo $name?></td>
                   <td><?php echo $mail?></td>
                   <td><?php echo $phone?></td>
            </tr>
              
             <?php endwhile;?>
           
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>


 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
              <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/book1.png" width="50"/>&nbsp;<span class="boxshadow" style="padding: 5px" >  Total Issue Book
        =<?php 
		 $subject_table = $db->query("select count(*) from say_issue_book");
		 while(list($subject)=$subject_table->fetch_row()){
		
        	echo $subject;
                 }
                 ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Book Name</th>
               <th style="text-align: center">Member Name</th>
                <th style="text-align: center">Return Date</th>   
        </tr> 
        </thead>
       <?php
date_default_timezone_set("Asia/Dhaka");	
  $ibook_table=$db->query("select i.id,b.name, m.name, i.issue_date, i.return_date,i.remark  from say_issue_book as i,say_book as b,say_member as m where b.id=i.book_id and m.id=i.member_id  order by i.return_date limit 4"); 
 while(list($id,$book_name,$member_name,$idate,$rdate,$remark)=$ibook_table->fetch_row()):?>

    
       <?php
           $idate =date("d M Y",strtotime( $idate ));
            $rdate =date("d M Y",strtotime( $rdate ));
       ?>
            
            
        <tbody>
            
            <tr>
                 <td><?php echo $book_name?></td>
                   <td><?php echo $member_name?></td>
                  <td><?php echo $rdate?></td>
            </tr>
              
             <?php endwhile;?>
           
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>


	

	  
</form>




     
 <?php }?>

  

	
			
      