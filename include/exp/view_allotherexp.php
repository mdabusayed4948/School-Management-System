
<h2 class='styl boxshadow'><span class='style boxshadow'> All Expense List</span></h2>
<script>

 $(function(){
	
	 $("#btnSearch").click(function(){
		var keyword=$("#txtSearch").val();
		$("#output").html("Loading..."); 
		 
		$.ajax({
			url:"search_allexp.php",
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
    $search_word = $_POST["txtSearch"];
     $allincome_table=$db->query("select  e.id,so.source_name,year(e.exp_date),e.amount  from expences as e,  source as so  where so.id=e.source_id  and  year(e.exp_date)  like '%".$search_word."%'  ");

  
}


if(isset($_POST['btnDelete'])){
$exp_id = $_POST['txtexpId'];	
  $db->query("delete  from expences where id='$exp_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}
?>

  <div style='margin:10px' class='boxshadow'>
      <table class='table table-bordered table table-hover'>
<thead>
    <tr>
        <td colspan='8' style='background-color:#F5F5F5'>
            <span style='float:left'>
                <form action='home.php?item=53' method='post'>
                                     <span class='boxshadow' >  
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size='10' id='txtSearch' >
                
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
                        <!--<input type='button' id='btnSearch' value='Search'/>-->
                        <button type="button"  id='btnSearch'  class="btn btn-default"><img src="images/search-icon.png" width="20"/></button > 
                    </span>
                </form>
            </span>
            <span class=' boxshadow' style='float:right;'>
                <a href='home.php?item=50'  style='font-weight:bold; color:#5A5A5A; text-decoration:none;margin:5px'>
                    <i class='glyphicon glyphicon-plus-sign'></i> Add Others Exp</a>
            </span>
            <span class=' boxshadow ' style='float:right; margin-right:10px'>
                <a href='home.php?item=47'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:5px'>
                    <i class='glyphicon glyphicon-plus-sign'></i> Add  Teache's Salary </a>
            </span>
        </td>
    </tr>

<tr><th>Source</th><th >Date</th><th>  Amount</th><th  width='150'>Options</th></tr></thead>
 <?php

  $sfee_table=$db->query("select  e.id,so.source_name,e.exp_date,e.amount ,e.status from expences as e,  source as so  where so.id=e.source_id ");
 date_default_timezone_set("Asia/Dhaka");
  while(list($expid,$source,$date,$pamount)=$sfee_table->fetch_row()):?>
    <?php  $date=date("d M Y",strtotime($date)); ?> 
 <tbody>
	<tr>
	
	<td><?php echo $source;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $pamount;?></td>
                     
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
             <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=52' method='post'>
                <input type='hidden' value='<?php echo $expid;?>' name='txtothersexpId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
 
	<button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button> 
        	
		</span>
</form>	
           
                                                
        </li>
             </div>
    <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=53' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $expid?>' name='txtexpId'/>&nbsp;&nbsp;
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
















