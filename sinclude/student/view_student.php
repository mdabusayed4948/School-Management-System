

<script src="js/jquery-2.2.1.min.js"></script>

<h2 class='styl boxshadow'><span class='style boxshadow'>View Student</span></h2>

<script>

 $(function(){
	
	 $("#btnSearch").click(function(){
		var keyword=$("#txtSearch").val();
		$("#output").html("Loading..."); 
		 
		$.ajax({
			url:"search_student.php",
			type:"POST",
			data:{'txtSearch':keyword},
			success: function(result){
			$("#output").html(result)	
			}
			
	    });
	 });
	 
	
  });
</script>
<script>

 $(function(){
	
	 $("#btnSearc").click(function(){
		var keyword=$("#txtSearc").val();
		$("#output").html("Loading..."); 
		 
		$.ajax({
			url:"search_student.php",
			type:"POST",
			data:{'txtSearc':keyword},
			success: function(result){
			$("#output").html(result)	
			}
			
	    });
	 });
	 
	
  });
</script>







<div id="output"></div>

<?php
error_reporting(0);
if(isset($_POST["btnSearch"])){
	$search_word=validate($_POST["txtSearch"]);
	
	
	
	//$admission_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name from  student as s,class as c,session as n,c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id and  s.id like '%".$search_word."%' OR s.student_name like '%".$search_word."%' "  );
	
	//$admission_table=$db->query(" select id, student_name,email from  student   where id like '%".$search_word."%' OR student_name like '%".$search_word."%' OR email like '%".$search_word."%'");
	 $admission_table=$db->query(" select id, student_name,email from  say_student   where id like '%".$search_word."%'");

      while(list($id,$name,$mail)=$admission_table->fetch_row());

		
        }//end if
if(isset($_POST["btnSearc"])){
	$search_word=validate($_POST["txtSearc"]);
	
	
	
	//$admission_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name from  student as s,class as c,session as n,c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id and  s.id like '%".$search_word."%' OR s.student_name like '%".$search_word."%' "  );
	
	$admission_table=$db->query(" select s.id, s.student_name,s.roll,c.class_name,s.email,s.mobile from  say_student as s,sayclass as c   where c.id=s.class_id AND ( c.class_name like  '%".$search_word."%'  OR s.roll like '%".$search_word."%'  )");
	while(list($id,$name,$roll,$class,$mail,$mobile)=$admission_table->fetch_row());
		
	}


        
if(isset($_POST['btnDelete'])){

    
$student_id =validate ($_POST['txtStudentId']);

    $getquery = "select photo from say_student where id='$student_id ' ";
 
        $getImg=$db->query($getquery);
    
    while($imgdata = $getImg->fetch_assoc()){
        $delimg=$imgdata['photo'];
        unlink($delimg);
    }
    
  $db->query("delete  from say_student where id='$student_id'");

  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}


 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}

?>

 <div style='margin:10px' class='boxshadow'>          
    <?php

              if(isset($_POST["btnSearch"])): ?>
           
               
                 <?php
	$status=$_POST["txtstatus"];
	
	
     $admission_table=$db->query(" select s.id, s.student_name,s.roll,c.class_name,s.email,s.mobile, s.status from  say_student as s,sayclass as c   where c.id=s.class_id AND  s.status like  '%".$status."%'  ");
echo "   <table class='table table-bordered table-hover'>
                 <thead>
                     <tr>
                         <th>Id</th>
                           <th>Name</th>
                        <th>E-mail</th>
                         <th>Mobile</th>
                        <th>Status</th>
                        
                     </tr>
                 </thead>
    ";
	
     while(list($id,$name,$roll,$class,$mail,$mobile,$status)=$admission_table->fetch_row())   :?>
  
  

           <tbody>
                     <tr>
                         <td><?php echo $id;?></td>
                         <td><?php echo $name;?></td>
                        <td><?php echo $mail;?></td>
                        <td><?php echo $mobile;?></td>
                          <td><?php echo $status;?></td>
                         <td>
			 
	<div class="btn-group">
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
                    <div style="margin-left: 45px; margin-top: 3px">
        <li> 
        	
     <form action='home.php?item=6' method='post'>
                <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
     
          <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button>  
                    </span>
</form>
            
                                    
        </li>
        </div>
                    <div style="margin-left: 45px; margin-top: 3px">
         <li> 
        
             
     <form action='home.php?item=8' onSubmit="return confirm('Are you sure Delete this record?');"  method='post' >
                <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
               <span class="boxshadow">   
                <button type="submit" name="btnDelete" class="btn btn-default"><i class='glyphicon glyphicon-trash'></i> </button>  
               </span>
</form>  
                                    
        </li>
               </div>
                  <div style="margin-left: 45px; margin-top: 3px">
   <li> 
 
       <form action='home.php?item=23' method='post'>
            <input type='hidden' value='<?php echo $id?>' name='txtStudentId'/>&nbsp;&nbsp;
                <span class="boxshadow">
         <button type="submit" name="profile" class="btn btn-default"><i class='glyphicon glyphicon-user'></i> </button> 
              
			  </span>
            
</form>                    
   </li>
                        </div>
          </ul>
      </div>
			 
	</td>
                     </tr>
                 </tbody>
   
             
             <?php endwhile;?>
                  </table>
    
  <?php endif ;?>
</div>            
             
             
             

   
 <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='6' style='background-color:#F5F5F5'>
          
             
             &nbsp;
             
            </td>
     </tr>
  <tr><th   >ID</th><th >Name</th><th >E-mail</th><th>Mobile</th><th>Status</th></tr></thead>
  <?php
  $student_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name,s.status from  say_student as s,sayclass as c,say_session as n,say_c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id order by s.id asc");

 
  while(list($id,$name,$photo,$fname,$mname,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group,$status)=$student_table->fetch_row()):?>
 
 <tbody>
<tr>
			  
	<td ><?php echo $id;?></td>
	 <td><?php echo $name;?></td>
	<td><?php echo $mail;?></td>
	<td><?php echo $mobile;?></td>
                     <td><?php echo $status;?></td>

	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='6'  style='background-color:#F5F5F5'></td>
 </tr>
</tbody>
 </table>

 </div>
 <script>
       function myFunction() {
       window.print();
           }
  </script>

