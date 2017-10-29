


<h2 class='styl boxshadow'><span class='style boxshadow'> Driver List </span></h2>

<div style='margin:10px' class='boxshadow'>
    
   <?php
   if(isset($_POST['btnSearch'])){?>
    <?php
       $driver_id=$_POST['driver_id'];
       
       $driver_table=$db->query("select id,name,photo,email,phone,gender,join_date from say_driver where id like '%".$driver_id."%'");
       while(list($id,$name,$photo,$mail,$phone,$gender,$join)=$driver_table->fetch_row()){ ?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr><td colspan='8' style='background-color:#F5F5F5'>&nbsp</td></tr>
            <tr>
                <th>Id</th>
              <th>Name</th>
                <th>Photo</th>
               <th>E-Mail</th>
               <th>Phone</th>
                <th>Gender</th>
               <th>Join Date</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $id ;?></td>
                <td><?php echo $name ;?></td>
                <td><img src="<?php echo $photo ;?>" width="40"/></td>
               <td><?php echo $mail ;?></td>
               <td><?php echo $phone ;?></td>
                <td><?php echo $gender ;?></td>
                <td><?php echo $join ;?></td>
        
            </tr>
        </tbody>
        <tfoot>
             <tr>
 	<td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
        </tfoot>
    </table>
     
 
  <?php  }  }?> 
    
</div>








<?php


if(isset($_POST['btnDelete'])){
$driver_id = $_POST['txtDriverId'];

    $getquery = "select photo from say_driver where id='$driver_id ' ";
 
        $getImg=$db->query($getquery);
    
    while($imgdata = $getImg->fetch_assoc()){
        $delimg=$imgdata['photo'];
        unlink($delimg);
    }
  $db->query("delete  from say_driver where id='$driver_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

  
}

?>




<div style='margin:10px' class='boxshadow'><table class='table table-bordered table table-hover'>
 <thead><tr><td colspan='8' style='background-color:#F5F5F5'><span style='float:left' >
 <form action='home.php?item=89' method='post'>

<span class=' boxshadow'>

    <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="driver_id"  data-size="10">
<option>-- Select Driver  Id --</option>
		   <?php
                        $table = $db->query("select id,name,photo,email,phone,gender,join_date from say_driver");
while(list($id,$name,$mail,$mobile)=$table->fetch_row()){
					
                        echo "<option value='$id'>ID=$id || $name || $mail || $mobile</option>";
						
}
						
?>
      
      </select>		
</span>

     <span class='boxshadow'>  <button type="submit" name='btnSearch'  class="btn btn-default" ><img src="images/search-icon.png" width="20"/></button > </span> 
               
</form>

</span>
             
             
  <span class=' boxshadow ' style='float:right; padding: 3px'><a href=''  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin:3px'>   <i class='glyphicon glyphicon-plus-sign'></i> </a></span></td></tr>
     <tr><th   >ID</th><th >Name</th><th >Photo</th><th>E-mail</th><th>Phone</th><th>Gender</th><th>Jion Date</th></tr></thead>
  <?php
  $teacher_table=$db->query("select id,name,photo,email,phone,gender,join_date from say_driver");
 date_default_timezone_set("Asia/Dhaka");
   
  while(list($id,$name,$photo,$mail,$phone,$gender,$join)=$teacher_table->fetch_row()):?>
 
 <tbody>
<tr>
			  
	<td ><?php echo $id;?></td>
	 <td><?php echo $name;?></td>
         <td><img src="<?php echo $photo;?>" width="40"/></td>
	<td><?php echo $mail;?></td>	
                       <td><?php echo $phone;?></td>		
                       <td><?php echo $gender;?></td>
                         <td><?php echo $join;?></td>
	
	 </tr> 
 <?php endwhile ?>
 <tr>
 	<td colspan='8'  style='background-color:#F5F5F5'></td>
 </tr>
</tbody>
 </table>

 </div>










