
<div>
	<h2 style="text-align:center; background:#E3DFE1">Student's View Form</h2><hr/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.2.1.min.js"></script>
<script>

 $(function(){
	
	 $("#btnSearch").click(function(){
		var keyword=$("#txtSearch").val();
		$("#output").html("Loading..."); 
		 
		$.ajax({
			url:"search.php",
			type:"POST",
			data:{'txtSearch':keyword},
			success: function(result){
			$("#output").html(result)	
			}
			
	    });
	 });
	 
	
  });
</script>

<form action="#" method="post">
<input type="text" id="txtSearch"> <input  id="btnSearch" type="button" value="Search" >

</form>
<br>

<div id="output"></div>


<?php
if(isset($_POST["txtSearch"])){
	$search_word=$_POST["txtSearch"];
	
	$db=new mysqli("localhost","root","","sms");
	
	$admission_table=$db->query("select id,student_name,photo,father_name,mother_name,birth_day,email,gender,class_id,roll,mobile,apply_date,session_id,fee_id,group_id from student  where student_name like '%$search_word%' ");
	
	
	while(list($admission_id,$upload_image,$applicant_name,$fname,$Mname,$gender,$birthday,$section,$classname,$session,$applyDate,$address,$mobile,$admission_fee_id)=$admission_table->fetch_row()){
		
		}//end loop
		
	}//end if

?>






<?php
  $admission_table=$db->query("select s.id,s.student_name,s.photo,s.father_name,s.mother_name,s.birth_day,s.email,s.gender,c.class_name,s.roll,s.mobile,s.apply_date,n.session_name,g.group_name from  student as s,class as c,session as n,c_group as g where c.id=s.class_id and n.id=s.session_id and g.id=s.group_id");
   date_default_timezone_set("Asia/Dhaka");
 // echo "<table class='table'>";
 //echo "<table border='1' align='center' style='text-align:center'>";
 
  
 
  while(list($id,$name,$photo,$fname,$mname,$dob,$mail,$gender,$class,$roll,$mobile,$join,$session,$group)=$admission_table->fetch_row()){
	        $join=date("d M Y",strtotime($join));
		    $dob=date("d M Y",strtotime($dob));
	 
	 

	echo "
	<div style=' margin-bottom:10px; background:#EAEAEA; padding:10px; text-align:center'>
	<div style=' margin-left:30px'><img src='$photo' width='150' height='100'/></div>
	<div><span style='font-size:20px;  margin-left:30px '>Student ID:</span><span style='font-size:18px;color:green; font-weight:bold'>$id</span></div>
	 <div><span style='font-size:20px;  margin-left:30px '>Applicant Name:</span><span style='font-size:18px;color:green; font-weight:bold'>$name</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Father's Name:</span><span style='font-size:18px;color:green'>$fname</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Mother's Name:</span><span style='font-size:18px;color:green'>$mname</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Gender :</span><span style='font-size:18px;color:green'>$gender</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Date Of Birth :</span><span style='font-size:18px;color:green'>$dob</span></div>
	  <div><span style='font-size:20px; margin-left:30px'>E-Mail :</span><span style='font-size:18px;color:green'>$mail</span></div>
	
	 <div><span style='font-size:20px; margin-left:30px'>Class:</span><span style='font-size:18px;color:green'>$class</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Session:</span><span style='font-size:18px;color:green'>$session</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Apply Date:</span><span style='font-size:18px;color:green'>$join</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Class Group:</span><span style='font-size:18px;color:green'>$group</span></div>
	 <div><span style='font-size:20px; margin-left:30px'>Mobile No:</span><span style='font-size:18px;color:green'>$mobile</span></div>
	 
	 
	 <div>
		 <span style='font-size:20px; margin-left:30px'>
				 <form action='home.php?item=6' method='post'>
					 <input type='hidden' value='$id' name='txtStudentId'/>
					 <input type='submit' name='btnEdit' value='Edit'/>
				 </form>
		</span>
	</div>
</div>";
  }


?>
</div>