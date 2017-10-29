
<h2 class='styl boxshadow'><span class='style boxshadow'> Source List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$source_id = $_POST['txtSourceId'];	
  $db->query("delete  from source where id='$source_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}


  $source_table=$db->query("select id,source_name from source order by id");

  echo "<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>";
 echo "<thead><tr><td colspan='3' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right; padding: 4px'><a href='home.php?item=40'  style='font-weight:bold; color:#5A5A5A; text-decoration:none'> <i class='glyphicon glyphicon-plus-sign'></i> Add Source</a></span></td></tr>";

  echo "<tr><th>Source ID</th><th>Source Name</th><th  width='150'>Options</th></thead></tr>";
  while(list($source_id,$source_name)=$source_table->fetch_row()):?>
 
 <tbody>
	<tr>
			  
	<td><?php echo $source_id;?></td>
	<td><?php echo $source_name;?></td>
	
			
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
                  <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=42' method='post'>
                <input type='hidden' value='<?php echo $source_id;?>' name='txtSourceId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                  <button type="submit" name="btnEdit" class="btn btn-default" ><i class='glyphicon glyphicon-edit'></i></button> 
                    </span>
</form>	
           
                                                
        </li>
            </div>
                    <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=41' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $source_id?>' name='txtSourceId'/>&nbsp;&nbsp;
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
 	<td colspan='3'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>



















