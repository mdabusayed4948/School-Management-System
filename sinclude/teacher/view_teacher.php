


<h2 class='styl boxshadow'><span class='style boxshadow'> Teacher's List</span></h2>

<script>

 $(function(){
	
	 $("#btnSearch").click(function(){
		var keyword=$("#txtSearch").val();
		$("#output").html("Loading..."); 
		 
		$.ajax({
			url:"search_teacher.php",
			type:"POST",
			data:{'txtSearch':keyword},
			success: function(result){
			$("#output").html(result)	
			}
			
	    });
	 });
	 
	
  });
</script>







<div id="output"></div>

<?php

if(isset($_POST["txtSearch"])){
	$search_word=validate($_POST["txtSearch"]);
	
	
	
	$teacher_table=$db->query("select teacher_id,teacher_name,email,mobile from  saytbl_teacher where teacher_id like '%".$search_word."%' OR teacher_name like '%".$search_word."%' OR email like '%".$search_word."%'");
	
		
	}//end if
 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}

if(isset($_POST['btnDelete'])){
$teacher_id = $_POST['txtteacherId'];

    $getquery = "select photo from saytbl_teacher where teacher_id='$teacher_id ' ";
 
        $getImg=$db->query($getquery);
    
    while($imgdata = $getImg->fetch_assoc()){
        $delimg=$imgdata['photo'];
        unlink($delimg);
    }
  $db->query("delete  from saytbl_teacher where teacher_id='$teacher_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}

?>




<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='5' style='background-color:#F5F5F5'><span style='float:left' >


</span></td></tr>
  <tr><th>ID</th><th >Name</th><th >E-mail</th><th>Mobile</th></tr></thead>
  <?php
  $teacher_table=$db->query("select t.teacher_id,t.teacher_name,t.photo,t.email,t.gender,d.group_name,t.teacher_code,t.mobile,t.apply_time from  saytbl_teacher as t,say_c_group as d where d.id=t.c_group_id order by teacher_id");
 date_default_timezone_set("Asia/Dhaka");
   
  while(list($id,$name,$photo,$mail,$gender,$department,$code,$mobile,$join)=$teacher_table->fetch_row()):?>
 
 <tbody>
<tr>
			  
	<td ><?php echo $id;?></td>
	 <td><?php echo $name;?></td>
	<td><?php echo $mail;?></td>
	<td><?php echo $mobile;?></td>		
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
</tbody>
 </table>

 </div>










