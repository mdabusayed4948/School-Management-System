
<h2 class='styl boxshadow'><span class='style boxshadow'> Book List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$book_id = $_POST['txtBookId'];	
  $db->query("delete   from say_book where id='$book_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}
?>


  <div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='5' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href='home.php?item=18'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'> <i class='glyphicon glyphicon-plus-sign'></i> Add Book</a></span></td></tr>

 <tr><th>Book Name</th><th>Author Name</th><th>Publisher</th><th>Description  </th><th  width='150'>Options</th></tr></thead>
<?php

  $book_table=$db->query("select id,name, author, publisher, description  from say_book  order by id"); 
 while(list($book_id,$book_name,$author_name,$publisher,$desc)=$book_table->fetch_row()):?>

 <tbody>
	<tr>
			  
	
	<td><?php echo $book_name;?></td>
	   <td><?php echo $author_name;?> </td>
                       <td><?php echo $publisher;?></td>
	<td><?php echo $desc;?></td>		
	 <td>
			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
            <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='home.php?item=19' method='post'>
                <input type='hidden' value='<?php echo $book_id;?>' name='txtBookId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                        <button type="submit" name="btnEdit" class="btn btn-default"><i class='glyphicon glyphicon-edit'></i> </button>  
                    </span>
</form>	
           
                                                
        </li>
             </div>
               <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=21' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $book_id?>' name='txtBookId'/>&nbsp;&nbsp;
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
 	<td colspan='5'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>





















