

<?php
if(isset($_POST["txtSearch"])): ?>
    <?php
	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
	
	 $allincome_table=$db->query("select  p.id,so.source_name,p.income_date,p.paid_amount  from say_payment as p,  source as so  where so.id=p.source_id  and  year(p.income_date)  like '%".$search_word."%'   ");
	
                        
         date_default_timezone_set("Asia/Dhaka");
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><td colspan='5' style='background-color:#F5F5F5; text-align:center;padding:0px'><h4><span class=' boxshadow '> Year wise Income </span></h4></td></tr>";
echo "<tr><th width='50%'>Source Name</th><th width='29%'>Date</th><th >Amount</th></tr>";
	
	while(list($pid,$name,$date,$amount)=$allincome_table->fetch_row())
                                 
                :?>
                                <?php  $date=date("d M Y",strtotime($date)); 
                           
                                ?> 
                               
	<tr>
	
	<td><?php echo $name;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $amount;?></td>
        
	
</tr>	
	<?php endwhile;?>

    <?php

	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");

               $add=$db->query("select  p.id,so.source_name,p.income_date,sum(p.paid_amount)  from say_payment as p,  source as so  where so.id=p.source_id  and  year(p.income_date)  like '%".$search_word."%' ");
                   while(list($id,$name,$date,$amount)=$add->fetch_row()) :?>
     <tfoot>
         <tr >
         <th colspan='2' width='50%'>Total Income</th>
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
   echo "<tr><th colspan='5' style='background-color:#F5F5F5; text-align:center;'><span class=' boxshadow' style='padding:4px'> Year wise expenses </span></th></tr>";
echo "<tr><th width='50%'>Source Name</th><th width='29%'>Date</th><th>Amount</th></tr>";
	
	while(list($exp_id,$name,$date,$amount)=$allincome_table->fetch_row())
                                 
                :?>
                                <?php  $date=date("d M Y",strtotime($date)); 
                           
                                ?> 
                               
	<tr>
	
	<td><?php echo $name;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $amount;?></td>
        
	
</tr>	
	<?php endwhile;?>

    <?php

	$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");

               $add=$db->query("select  e.id,so.source_name,e.exp_date,sum(e.amount)  from expences as e,  source as so  where so.id=e.source_id  and  year(e.exp_date)  like '%".$search_word."%'  ");
                   while(list($id,$name,$date,$amount)=$add->fetch_row()) :?>
     <tfoot>
         <tr >
         <th colspan='2' width='50%'>Total Expenses</th>
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

?>

        
<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><th colspan='8' style='background-color:#F5F5F5; text-align: center'><span class=' boxshadow' style='padding:4px'> Year wise Balance Report </span></th></tr>

</thead>
 <?php
if(isset($_POST["txtSearch"])): ?> 

 <?php 
$search_word=validate($_POST["txtSearch"]);
	
	$db=new mysqli("localhost","root","","sms");
        
$product_table=$db->query("SELECT SUM(paid_amount)   from say_payment where year(income_date)  like '%".$search_word."%'  ");
	 while(list($payment)=$product_table->fetch_row()){
		 	 $GLOBALS['p']=$payment;
		
	 }
         
         $product_table=$db->query("SELECT SUM(amount)   from expences  where year(exp_date)  like '%".$search_word."%' ");
	 while(list($exp)=$product_table->fetch_row()){
		   $GLOBALS['e']=$exp;
		 
	 }
         $balance= $p-$e;
       ?>  
     <tfoot>
         <tr>
         <th  width='79%'>Total Balance</th>
         <th> <?php echo $balance;?> tk</th>
     </tr>
     <tr>
 <td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
 </tfoot> 
  

 

 </tbody>
 </table>

 </div>
<hr/>
<?php endif;?>



















        





