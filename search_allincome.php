<?php
if(isset($_POST['btnDelete'])){
$teacher_id = $_POST['txtfeeId'];	
  $db->query("delete  from payment where id='$teacher_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}

?>
<?php
if(isset($_POST["txtSearch"])): ?>
    <?php
	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
	
	 $allincome_table=$db->query("select  p.id,so.source_name,p.income_date,p.paid_amount  from say_payment as p,  source as so  where so.id=p.source_id  and  year(p.income_date)  like '%".$search_word."%'  ");
	
                        
         date_default_timezone_set("Asia/Dhaka");
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><td colspan='5' style='background-color:#F5F5F5; text-align:center;padding:0px'><h4><span class=' boxshadow '> year wise Income </span></h4></td></tr>";
echo "<tr><th>Source Name</th><th>Date</th><th>Amount</th><th>Options</th></tr>";
	
	while(list($pid,$name,$date,$amount)=$allincome_table->fetch_row())
                                 
                :?>
                                <?php  $date=date("d M Y",strtotime($date)); 
                           
                                ?> 
                               
	<tr>
	
	<td><?php echo $name;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $amount;?></td>
        
	<td>
          
        
    			 
	<div class="btn-group">
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
                    <div style="margin: 2px">
        <li> 
        	
          <form action='home.php?item=44' method='post'>
                <input type='hidden' value='<?php echo $pid?>' name='txtFeeId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> <i class='glyphicon glyphicon-edit'></i>
         <input type='submit' name='btnEdit' value='&nbsp;&nbsp;&nbsp;Edit '/> </span>
</form>                            
        </li>
            </div>
              <div style="margin: 2px">
         <li> 
      <form action='home.php?item=46' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $pid;?>' name='txtfeeId'/>&nbsp;&nbsp;
               <span class="boxshadow">   <i class='glyphicon glyphicon-trash'></i>
                <input type='submit' name='btnDelete'  value='Delete'/></span>
</form>                              
        </li>
            </div>
       <div style="margin: 2px">
           

       </div>
          </ul>
      </div>
        </td>
</tr>	
	<?php endwhile;?>

    <?php

	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");

               $add=$db->query("select  p.id,so.source_name,p.income_date,sum(p.paid_amount)  from say_payment as p,  source as so  where so.id=p.source_id  and  year(p.income_date)  like '%".$search_word."%' ");
                   while(list($id,$name,$date,$amount)=$add->fetch_row()) :?>
     <tfoot>
         <tr >
         <th colspan='2'>Total Income</th>
         <th> <?php echo $amount;?> tk</th>
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


