<?php
if(isset($_POST['btnDelete'])){
$fee_id = $_POST['txtexpId'];	
  $db->query("delete  from expences where id='$fee_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  


  
}

?>
<?php
if(isset($_POST["txtSearch"])): ?>
    <?php
	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
	
	 
    $sfee_table=$db->query("select e.id,t.teacher_id,t.teacher_name,so.source_name,e.exp_date,e.amount,e.due_amount,e.status from expences as e,  saytbl_teacher as t, source as so  where t.teacher_id=e.tbl_teacher_teacher_id and so.id=e.source_id and t.teacher_id  like '%".$search_word."%' ");
	
                        
         date_default_timezone_set("Asia/Dhaka");
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><td colspan='8' style='background-color:#F5F5F5; text-align:center;padding:0px'><h4><span class=' boxshadow '> Teacher's Salary</span></h4></td></tr>";
echo "<tr><th>Teacher Id</th><th>Teacher Name</th><th>Source Name</th><th>Date</th><th>Paid Amount</th><th>Due Amount</th><th>Status</th><th>Options</th></tr>";
	
	while(list($pid,$sid,$sname,$soname,$date,$pamount,$damount,$status)=$sfee_table->fetch_row())
                                 
                :?>
                                <?php  $date=date("d M Y",strtotime($date)); 
                           
                                ?> 
                               
	<tr>
	
	<td><?php echo $sid;?></td>
	<td><?php echo $sname;?></td>
	<td><?php echo $soname;?></td>
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
        	
          <form action='home.php?item=49' method='post'>
                <input type='hidden' value='<?php echo $pid?>' name='txtexpId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
		<button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button> 
         
		 </span>
</form>                            
        </li>
            </div>
               <div style="margin-left: 45px; margin-top: 3px">
         <li> 
      <form action='home.php?item=48' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $pid;?>' name='txtexpId'/>&nbsp;&nbsp;
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
	<?php endwhile;?>

    <?php

	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
  $sfee_table=$db->query("select e.id,t.teacher_id,t.teacher_name,so.source_name,e.exp_date,sum(e.amount),sum(e.due_amount) from expences as e,  saytbl_teacher as t, source as so  where t.teacher_id=e.tbl_teacher_teacher_id and so.id=e.source_id and t.teacher_id  like '%".$search_word."%' ");
	
          //   $allincome_table=$db->query("select  p.id,s.id,s.student_name,so.source_name,p.income_date,sum(p.paid_amount),sum(p.due_amount)  from say_payment as p,  source as so,student as s  where so.id=p.source_id and s.id=p.student_id  and  s.id  like '%".$search_word."%'  ");
                   while(list($pid,$sid,$sname,$soname,$date,$pamount,$damount)=$sfee_table->fetch_row()) :?>
     <tfoot>
         <tr >
         <th colspan='4'>Teacher's Salary</th>
         <th> <?php echo $pamount;?> tk</th>
            <th> <?php echo $damount;?> tk</th>
     </tr>
     <tr>
 <td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
 </tfoot> 
  
<?php endwhile?>

</table>
        </div>
<?php endif;
 function validate($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
?>





