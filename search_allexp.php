<?php
if(isset($_POST['btnDelete'])){
$exp_id = $_POST['txtexpId'];	
  $db->query("delete  from expences where id='$exp_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}

?>
<?php
if(isset($_POST["txtSearch"])): ?>
    <?php
	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
	
	 $allincome_table=$db->query("select  e.id,so.source_name,e.exp_date,e.amount  from expences as e,  source as so  where so.id=e.source_id  and  year(e.exp_date)  like '%".$search_word."%'  ");
	
                        
         date_default_timezone_set("Asia/Dhaka");
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><th colspan='5' style='background-color:#F5F5F5; text-align:center;'><span class=' boxshadow' style='padding:4px'> year wise expenses </span></th></tr>";
echo "<tr><th>Source Name</th><th>Date</th><th>Amount</th><th>Options</th></tr>";
	
	while(list($exp_id,$name,$date,$amount)=$allincome_table->fetch_row())
                                 
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
                     <div style="margin-left: 45px; margin-top: 3px">
        <li> 
        	
          <form action='home.php?item=52' method='post'>
                <input type='hidden' value='<?php echo $exp_id?>' name='txtothersexpId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
		<button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button> 
         
		 </span>
</form>                            
        </li>
            </div>
              <div style="margin-left: 45px; margin-top: 3px">
         <li> 
      <form action='home.php?item=53' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $exp_id;?>' name='txtexpId'/>&nbsp;&nbsp;
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

               $add=$db->query("select  e.id,so.source_name,e.exp_date,sum(e.amount)  from expences as e,  source as so  where so.id=e.source_id  and  year(e.exp_date)  like '%".$search_word."%' ");
                   while(list($id,$name,$date,$amount)=$add->fetch_row()) :?>
     <tfoot>
         <tr >
         <th colspan='2'>Total Expenses</th>
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



