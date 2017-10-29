
<h2 class='styl boxshadow'><span class='style boxshadow'> Student's Fee List</span></h2>
<script>

 $(function(){
	
	 $("#btnSearch").click(function(){
		var keyword=$("#txtSearch").val();
		$("#output").html("Loading..."); 
		 
		$.ajax({
			url:"search_studentviewfee.php",
			type:"POST",
			data:{'txtSearch':keyword},
			success: function(result){
			$("#output").html(result)	
			}
			
	    });
	 });
	 
	
  });
</script>


<?php
if(isset($_POST["txtSearch"])){
    $search_word = $_POST["txtSearch"];
  $allincome_table=$db->query("select  p.id,s.id,s.student_name,so.source_name,p.income_date,p.paid_amount  from say_payment as p,  source as so,say_student as s  where so.id=p.source_id and s.id=p.student_id  and s.id  like '%".$search_word."%'  ");

  
}

if(isset($_POST['btnDelete'])){
$fee_id = $_POST['txtfeeId'];	
  $db->query("delete  from say_payment where id='$fee_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}
?>

    <table class='table table-bordered  table-hover'>
    <thead>
        <tr>
            <th colspan='8' style='background-color:#F5F5F5; text-align:center; '>
                <span style='float:left'>
                    <form action='home.php?item=16' method='post'>
                
                        <span class='boxshadow' > 
                             <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cmbSession"   data-size="10" style="width: 10px">
                               
                    		<option > -- Session-- </option>
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
                   
                    		<option >-- Class--</option>
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
                      
                    		<option >--Section--</option>
                        <?php
                        $exam_table = $db->query("select id,group_name from say_c_group");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                        <span class='boxshadow' >  
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size='10' name="txtYear"  >
                
	<option>--Year--</option>
	<?php
	 for($y=1970;$y<=date("Y");$y++){
	 if($y<10){
	 $yy="0".$y;
	 }else{
	$yy=$y;
	 }
	?>
	<option value="<?php echo "$yy"?>"><?php echo "$yy"?></option>
	<?php
	  }     
	?>
	</select>
                        </span> 
                         
                       <span class='boxshadow'> 

					  
					  
<select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="txtMonth"    data-size="10" >
		 	<option>-- Month--</option>
		  <?php
                        $exam_table = $db->query("select id,name from month");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
      
      </select>	  
					  
  </span>
                                 <span class='boxshadow'> 
                       
             <select style="width: 105px; height: 30px" name="cmbStatus">        
          <option>--Status--</option>
          <option value="Paid">Paid</option>
          <option value="Unpaid">Unpaid</option>
          <option value="Due">Due</option>
      </select>
                                 </span>              
                       <span class='boxshadow'>
                           <button type="submit" name="btnSearch"   class="btn btn-default">   <img src="images/search-icon.png" width="20"/></button > 
                  
                       </span> 
					  <span class='boxshadow'>   <button onclick="myFunction()" class="btn btn-default"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                       </span>    
                 
                 </form>
             </span>
            </th>
        </tr>
    </thead>
</table>
<div id="output"></div>

<?php
if(isset($_POST["btnSearch"])): ?>
<div style='margin:10px' class='boxshadow'>
    <table class='table table-bordered table table-hover'>
        <thead>
  <tr>
      <td colspan='9' style='background-color:#F5F5F5; text-align:center;padding:0px'>
          <h4><span class=' boxshadow '>  Class Wise Monthly Fee Verify System </span></h4>
		   
      </td>
  </tr>
<tr><th >S_ID</th><th >Student Name</th><th>Class Name</th><th >Session</th><th >Section</th><th >Date</th><th >Paid Amount</th><th >Due Amount</th><th >Status</th></tr>
        </thead>
    <?php
          $session  = $_POST["cmbSession"];
         $class        = $_POST["cmbClass"];
         $section   = $_POST["cmbSection"];
        $year          = $_POST["txtYear"];
        $month     = $_POST["txtMonth"];
        $status     = $_POST["cmbStatus"];
	
	
 //$allincome_table=$db->query("select  p.id,s.id,s.student_name,se.session_name,c.class_name,g.group_name,s.so.source_name,p.income_date,p.paid_amount,p.due_amount,p.status  from say_payment as p,  source as so,student as s,class as c, c_group as g, session as se where so.id=p.source_id  and s.id=p.student_id and c.id=s.class_id and se.id=s.session_id and g.id=s.group_id and s.class_id like  '%".$class."%' and s.session_id like '%".$session."%'  and s.group_id like '%".$section."%' and and p.status like '%".$section."%' and  (year(p.income_date)  like '%".$year."%' and month(p.income_date)  like '%".$month."%' ) ");
$studentfee_table=$db->query("select p.id,s.id,s.student_name,c.class_name,se.session_name,p.income_date,p.paid_amount,p.due_amount,p.status,g.group_name from say_payment as p,say_student as s,sayclass as c, say_session as se , say_c_group as g where s.id=p.student_id and c.id=s.class_id and se.id=s.session_id and g.id=s.group_id and  s.group_id like  '%".$section."%' and  s.session_id like  '%".$session."%' and  p.status like  '%".$status."%' and s.class_id like  '%".$class."%' and  (year(p.income_date)  like '%".$year."%' and month(p.income_date)  like '%".$month."%' ) "); 
date_default_timezone_set("Asia/Dhaka");
while(list($pid,$sid,$sname,$class,$session,$date,$pamount,$damount,$status,$group)=$studentfee_table->fetch_row())
                           
                :?>
                
                        <?php      $date=date("d M Y",strtotime($date));    ?>            
        <tbody>                  
	<tr>
	<td><?php echo $sid;?></td>
	<td><?php echo $sname;?></td>
                     <td><?php echo $class;?></td>
                     <td><?php echo $session;?></td>
                          <td><?php echo $group;?></td>
	<td><?php echo $date;?></td>
                         <td><?php echo $pamount;?></td>
                           <td><?php echo $damount;?></td>
                
	<td><?php echo $status;?></td>
        
	
</tr>
        </tbody>
	<?php endwhile;?>
        <tfoot>
            <tr>
              <td colspan='9'  style='background-color:#F5F5F5'></td>
            </tr>
        </tfoot>
    </table>
</div>

<?php endif; ?>






  <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead>
     <tr>
         <td colspan='8' style='background-color:#F5F5F5'>
             <span style='float:left'>
                 <form action='#' method='post'>
                     <span class='boxshadow'>
                         <select class="selectpicker" data-show-subtext="true" data-live-search="true"  id='txtSearch'  data-size="10" >
<option>-- Select Student Id --</option>
		   <?php
                        $table = $db->query("select id,student_name,email from say_student");
while(list($id,$name,$mail)=$table->fetch_row()){
					
                        echo "<option value='$id'>ID=$id || $name || $mail</option>";
						
}
						
?>
      
      </select>
                         
                    
                     </span> 
                     <span class='boxshadow'>  <button type="button" id='btnSearch'   class="btn btn-default"><img src="images/search-icon.png" width="20"/></button > </span> 
               
                  
                 </form>
             </span>
             <span class=' boxshadow ' style='float:right;'>
                 <a href='home.php?item=13'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'><i class='glyphicon glyphicon-plus-sign'></i> Add Student's Fee</a>
             </span></td>
     </tr>

<tr>
    <th>Student ID</th>
    <th>Student Name</th>
    <th>Source</th>
    <th >Date</th>
    <th> paid Amount</th>
    <th> Due Amount</th>
        <th> Status</th>
    <th  width='150'>Options</th>
    </tr>
 </thead>
  
 <?php

  $sfee_table=$db->query("select p.id,s.id,s.student_name,so.source_name,p.income_date,p.paid_amount,p.due_amount,p.status from say_payment as p,  say_student as s, source as so  where s.id=p.student_id and so.id=p.source_id");
 date_default_timezone_set("Asia/Dhaka");
 while(list($pid,$sid,$name,$source,$date,$pamount,$damount,$status)=$sfee_table->fetch_row()):?>
    <?php  $date=date("d M Y",strtotime($date)); ?> 
 <tbody>
	<tr>
			  
	
	<td><?php echo $sid;?></td>
	<td><?php echo $name;?></td>
	<td><?php echo $source;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $pamount;?></td>
                        <td><?php echo $damount;?></td>
                        <td><?php echo $status;?></td>
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
            <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=14' method='post'>
                <input type='hidden' value='<?php echo $pid;?>' name='txtFeeId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                    <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button>  
                    </span>
</form>	
           
                                                
        </li>
             </div>
  <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=16' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $pid?>' name='txtfeeId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                    <button type="submit" name="btnDelete" class="btn btn-default"><i class='glyphicon glyphicon-trash'></i> </button>  
                    </span>
</form>	
                                 
 </li>
   </div>
  </ul>
                  
      </div>
			 
	</td>
	 </tr> 
 <?php endwhile ?>
         
 <?php 

  $add=$db->query('select p.id,s.id,s.student_name,so.source_name,p.income_date,sum(p.paid_amount),sum(p.due_amount) from say_payment as p,  say_student as s, source as so  where s.id=p.student_id and so.id=p.source_id');
while(list($pid,$sid,$name,$source,$date,$pamount,$damount)=$add->fetch_row()) :?>
     <tfoot>
         <tr >
         <th colspan='4'>Total Student's Fee</th>
         <th> <?php echo $pamount;?> tk</th>
          <th> <?php echo $damount;?> tk</th>
     </tr>
     <tr>
 <td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
 </tfoot> 
  
<?php endwhile?>
 </tbody>
 </table>

 </div>















