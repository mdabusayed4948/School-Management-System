
<h2 class='styl boxshadow'><span class='style boxshadow'> Othres Exp List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$fee_id = $_POST['txtfeeId'];	
  $db->query("delete  from expences where id='$fee_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}


  $sfee_table=$db->query("select  e.id,so.source_name,e.exp_date,e.amount ,e.status from expences as e,  source as so  where so.id=e.source_id  and e.status='othersexp'");
 date_default_timezone_set("Asia/Dhaka");
  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='8' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow' style='float:right;'><a href='home.php?item=50'  style='font-weight:bold; color:#5A5A5A; text-decoration:none;margin-right:5px'><i class='glyphicon glyphicon-plus-sign'></i> Add Others Exp</a></span></td></tr>";

  echo "<tr><th>Source</th><th >Date</th><th>  Amount</th><th  width='150'>Options</th></thead></tr>";
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
                <button type="submit" name="btnEdit" class="btn btn-default" ><i class='glyphicon glyphicon-edit'></i></button>      
                    </span>
</form>	
           
                                                
        </li>
             </div>
  <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=51' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $expid?>' name='txtothersexpId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                    
                             <button type="submit" name="btnDelete" class="btn btn-default" ><i class='glyphicon glyphicon-trash'></i></button>      
                    </span>
</form>	
                                 
 </li>
   </div>
  </ul>
                  
      </div>
			 
	</td>
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>

















