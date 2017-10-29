
<h2 class='styl boxshadow'><span class='style boxshadow'> Issue Book List</span></h2>
<?php
if(isset($_POST['btnDelete'])){
$ibook_id = $_POST['txtIssuebookId'];	
  $db->query("delete   from say_issue_book where id='$ibook_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}
?>


  <div style='margin:10px' class='boxshadow' ><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='7' style='background-color:#F5F5F5'>&nbsp;<span class=' boxshadow ' style='float:right;'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px' > <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>

 <tr><th>Member's Name</th><th>Member's Phone</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Remark  </th></tr></thead>
<?php
date_default_timezone_set("Asia/Dhaka");	
  $ibook_table=$db->query("select i.id,b.name, m.name,m.phone, i.issue_date, i.return_date,i.remark  from say_issue_book as i,say_book as b,say_member as m where b.id=i.book_id and m.id=i.member_id  order by i.return_date"); 
 while(list($id,$book_name,$member_name,$phone,$idate,$rdate,$remark)=$ibook_table->fetch_row()):?>

    
       <?php
           $idate =date("d M Y",strtotime( $idate ));
            $rdate =date("d M Y",strtotime( $rdate ));
       ?>
 
 <tbody>
	<tr>
	<td><?php echo $member_name;?></td>	
    <td><?php echo $phone;?></td>		
	<td><?php echo $book_name;?></td>
	   <td><?php echo $idate;?> </td>
       <td><?php echo $rdate;?></td>
	<td><?php echo $remark;?></td>		

	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='7'  style='background-color:#F5F5F5'></td>
 </tr>
 </tbody>
 </table>

 </div>






















