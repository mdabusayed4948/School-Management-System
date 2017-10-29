
<h2 class='styl boxshadow'><span class='style boxshadow'> Notice Board</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$n_id = $_POST['txtnId'];	
  $db->query("delete  from say_noticeboard where id='$n_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}
?>

 <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
<thead><tr><td colspan='7' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href='home.php?item=94'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'> <i class='glyphicon glyphicon-plus-sign'></i> Add Notice  </a></span></td></tr>

<tr><th> ID</th><th>Title </th><th>Notice For </th><th>Notice  Content</th><th> Date</th><th  width='150'>Options</th></tr></thead>
<?php

  $patents_table=$db->query("select id,title,newsfor,description,newsdate from say_noticeboard");

 while(list($id,$title,$nfor,$ndesc,$ndate)=$patents_table->fetch_row()):?>
  
 <tbody>
	<tr>
			  
	<td><?php echo $id;?></td>
	<td>    <?php echo $title;?>     </td>
                  
             
                              <td><?php echo $nfor;?></td>
                              <td width="600">
                                     <?php
                                 $ndesc = htmlspecialchars_decode($ndesc);
                                echo $ndesc;?>
                              
                                
                             </td>
	<td  width="100"><?php echo $ndate;?></td>
	
	
			
	 <td  >
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
         <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=96' method='post'>
                <input type='hidden' value='<?php echo $id;?>' name='txtnId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                            <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button>        
                    </span>
</form>	
           
                                                
        </li>
             </div>
   <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=95' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $id?>' name='txtnId'/>&nbsp;&nbsp;
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
 <tr>
 	<td colspan='7'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>
















