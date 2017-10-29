
<h2 class='styl boxshadow'><span class='style boxshadow'> Balance Report</span></h2>
 
    

<?php

  $sfee_table=$db->query("select   p.id,so.source_name,p.income_date,p.paid_amount ,p.status from say_payment as p,  source as so  where so.id=p.source_id limit 5");
 date_default_timezone_set("Asia/Dhaka");	
  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><th colspan='8' style='background-color:#F5F5F5; text-align:center' ><span class=' boxshadow' style='padding:4px' > Income </span></th></tr>";

  echo "<tr><th width='50%'>Source</th><th >Date</th><th>  Amount</th></thead></tr>";
  while(list($pid,$source,$date,$pamount)=$sfee_table->fetch_row()):?>
  <?php     $date=date("d M Y",strtotime($date));?>
 <tbody>
	<tr>
			  
	
	
	
	<td><?php echo $source;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $pamount;?></td>
                     
			
	
	 </tr> 
 <?php endwhile ?>
         <?php 

  $add=$db->query('SELECT SUM(paid_amount)   from say_payment');
while(list($amount)=$add->fetch_row()) :?>
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
 
 </tbody>
 </table>

 </div>



<?php



  $sfee_table=$db->query("select  e.id,so.source_name,e.exp_date,e.amount ,e.status from expences as e,  source as so  where so.id=e.source_id  limit 5");
 date_default_timezone_set("Asia/Dhaka");	
  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><th colspan='8' style='background-color:#F5F5F5; text-align:center'><span class=' boxshadow' style='padding:4px'>  Expenses </span></th></tr>";

  echo "<tr><th width='50%'>Source</th><th >Date</th><th>  Amount</th></thead></tr>";
  while(list($expid,$source,$date,$pamount)=$sfee_table->fetch_row()):?>
    <?php     $date=date("d M Y",strtotime($date));?>
 <tbody>
	<tr>
	
	<td><?php echo $source;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $pamount;?></td>
                     
			
	
	 </tr> 
 <?php endwhile ?>

 <?php 

  $add=$db->query('SELECT SUM(amount)   from expences ');
while(list($exp)=$add->fetch_row()) :?>
         
     <tfoot>
         <tr>
         <th colspan='2'>Total Expenses</th>
         <th> <?php echo $exp;?> tk</th>
     </tr>
     <tr>
 <td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
 </tfoot> 
  
<?php endwhile?>
 

 </tbody>
 </table>

 </div>

<!-------------balance Area----------------->




 <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><th colspan='8' style='background-color:#F5F5F5; text-align: center'><span class=' boxshadow' style='padding:4px'> Balance Report </span></th></tr>

</thead>
  

 <?php 

$product_table=$db->query("SELECT SUM(paid_amount)   from say_payment");
	 while(list($payment)=$product_table->fetch_row()){
		 	 $GLOBALS['p']=$payment;
		
	 }
         $product_table=$db->query("SELECT SUM(amount)   from expences");
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
<script>

 $(function(){
	
	 $("#btnSearch").click(function(){
		var keyword=$("#txtSearch").val();
		$("#output").html("Loading..."); 
		 
		$.ajax({
			url:"search_balancereport.php",
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
     $allincome_table=$db->query("select  p.id,so.source_name,p.income_date,sum(p.paid_amount)  from say_payment as p,  source as so  where so.id=p.source_id  and  year(p.income_date)  like '%".$search_word."%'  ");

  
}

if(isset($_POST["txtSearch"])){
    $search_word = $_POST["txtSearch"];
     $allincome_table=$db->query("select  e.id,so.source_name,e.exp_date,e.amount  from expences as e,  source as so  where so.id=e.source_id  and  year(e.exp_date)  like '%".$search_word."%'   ");

  
}

?>

<div style="margin: 10px" class='boxshadow'><table class='table table-bordered table table-hover'>
    <thead>
        <tr>
            <th colspan='8' style='background-color:#F5F5F5; text-align:center'>
               
                <span style='float:left'><form action='home.php?item=54' method='post'>
                    
                            <span class='boxshadow' >  
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size='10' id='txtSearch'  >
                
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
                           <button type="button" id='btnSearch'   class="btn btn-default">   <img src="images/search-icon.png" width="20"/></button > 
                  
                       </span> 
                     </form>
                </span>
                <span style='float:right'><form action='home.php?item=54' method='post'>
                 
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

					  
					  
<select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="txtMonth"   value="<?php echo isset($sid)?$sid:""?>" data-size="10">
		 	<option>--Select Month--</option>
		  <?php
                        $exam_table = $db->query("select id,name from month");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
      
      </select>	  
					  
  </span>
                    
                      <span class='boxshadow'>
                           <button type="submit" name="btnSearch"   class="btn btn-default">   <img src="images/search-icon.png" width="20"/></button >  </span> 
                   <span class='boxshadow'>   <button onclick="myFunction()" class="btn btn-default"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                       </span> 
                    </form>
                </span>
            </th>
        </tr>
    </thead>
</table></div>

<div id="output"></div>

<!----------------Year And  Month Wise Report----------------------->



<?php
if(isset($_POST["btnSearch"])): ?>
    <?php
	$year=$_POST["txtYear"];
	$month=$_POST["txtMonth"];
	
	
	
 $allincome_table=$db->query("select  p.id,so.source_name,p.income_date,p.paid_amount  from say_payment as p,  source as so  where so.id=p.source_id  and    year(p.income_date)  like '%".$year."%' and month(p.income_date)  like '%".$month."%'  ");
 date_default_timezone_set("Asia/Dhaka");		
                        
       
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><td colspan='5' style='background-color:#F5F5F5; text-align:center;padding:0px'><h4><span class=' boxshadow '>  Income </span></h4></td></tr>";
echo "<tr><th width='50%'>Source Name</th><th width='29%'>Date</th><th >Amount</th></tr>";
	
	while(list($pid,$name,$date,$amount)=$allincome_table->fetch_row())
                           
                :?>
                      <?php      $date=date("d M Y",strtotime($date));    ?>      
                           
                         
                               
	<tr>
	
	<td><?php echo $name;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $amount;?></td>
        
	
</tr>	
	<?php endwhile;?>

    <?php

	$year=$_POST["txtYear"];
	$month=$_POST["txtMonth"];
	
	

               $add=$db->query("select  p.id,so.source_name,p.income_date,sum(p.paid_amount)  from say_payment as p,  source as so  where so.id=p.source_id  and  (year(p.income_date)  like '%".$year."%' and  month(p.income_date)  like '%".$month."%') ");
                  date_default_timezone_set("Asia/Dhaka");	
               while(list($id,$name,$date,$amount)=$add->fetch_row()) :?>
<?php     $date=date("d M Y",strtotime($date));?>
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

 



    <?php
	$year=$_POST["txtYear"];
	$month=$_POST["txtMonth"];
	
	
	
	 $allincome_table=$db->query("select  e.id,so.source_name,e.exp_date,e.amount  from expences as e,  source as so  where so.id=e.source_id  and   (year(e.exp_date)  like '%".$year."%' and    month(e.exp_date)  like '%".$month."%'  ) ");
	 date_default_timezone_set("Asia/Dhaka");	
         
                        
   
	echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
   echo "<tr><th colspan='5' style='background-color:#F5F5F5; text-align:center;'><span class=' boxshadow' style='padding:4px'> expenses </span></th></tr>";
echo "<tr><th width='50%'>Source Name</th><th width='29%'>Date</th><th>Amount</th></tr>";
	
	while(list($exp_id,$name,$date,$amount)=$allincome_table->fetch_row())
                                 
                :?>
                      <?php     $date=date("d M Y",strtotime($date));?>    
                           
                           
                               
	<tr>
	
	<td><?php echo $name;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $amount;?></td>
        
	
</tr>	
	<?php endwhile;?>

    <?php

	$year=$_POST["txtYear"];
	$month=$_POST["txtMonth"];
	
	

               $add=$db->query("select  e.id,so.source_name,e.exp_date,sum(e.amount)  from expences as e,  source as so  where so.id=e.source_id  and   (year(e.exp_date)  like '%".$year."%' and  month(e.exp_date)  like '%".$month."%'  ) ");
                date_default_timezone_set("Asia/Dhaka");	 
               while(list($id,$name,$date,$amount)=$add->fetch_row()) :?>
<?php     $date=date("d M Y",strtotime($date));?>
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

        

 

 <?php 
               $year=$_POST["txtYear"];
	$month=$_POST["txtMonth"];
	

     echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><th colspan='8' style='background-color:#F5F5F5; text-align: center'><span class=' boxshadow' style='padding:4px'> Balance Report </span></th></tr>

</thead> "; 
$product_table=$db->query("SELECT SUM(paid_amount)   from say_payment where   year(income_date)  like '%".$year."%' and month(income_date)  like '%".$month."%'  ");
	 while(list($payment)=$product_table->fetch_row()){
		 	 $GLOBALS['p']=$payment;
		
	 }
         
         $product_table=$db->query("SELECT SUM(amount)   from expences  where    year(exp_date)  like '%".$year."%' and  month(exp_date)  like '%".$month."%' ");
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



















        



















































