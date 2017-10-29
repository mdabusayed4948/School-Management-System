<h2 class='styl boxshadow'><span class='style boxshadow'>Student Attendence System</span></h2>
<div style="margin: 10px" class='boxshadow'>
    <?php
if(isset($_POST['btnDelete'])){
$att_id = $_POST['txtAttId'];	
  $db->query("delete   from attendance where id='$att_id'");
  echo "<div class='alert alert-success' role='alert'><strong>Successfully Deleted</strong></div>";

}
?>
    <table class='table table-bordered  table-hover'>
    <thead>
        <tr>
            <th colspan='8' style='background-color:#F5F5F5; text-align:center; '>
                <span style='float:left'>
                    <form action='home.php?item=72' method='post'>
                 
                         <span class='boxshadow'> 
                             <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cmbSession"   data-size="10">
                               
                    		<option > Select Session </option>
                        <?php
                        $exam_table = $db->query("select id,session_name from say_session");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                      
                            <span class='boxshadow'> 
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cmbClass"   data-size="10">
                   
                    		<option >Select Class</option>
                        <?php
                        $exam_table = $db->query("select id,class_name from sayclass");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                          <span class='boxshadow'> 
                      <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cmbSection"   data-size="10">
                      
                    		<option >Select Section</option>
                        <?php
                        $exam_table = $db->query("select id,group_name from say_c_group");
	while(list($id,$name)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$name</option>";
	}
	?>
                      </select>
                       </span> 
                             <span class='boxshadow'  > 
                            <input type='text'  id="Date" name="txtDate"  placeholder="yyyy-mm-dd" style="width: 175px; height: 34px;"/>
                            
                       </span> 
                           
                        <span class='boxshadow'>  <button type="submit" name="btnSearch"   class="btn btn-default"><img src="images/search-icon.png" width="20"/></button > </span> 
                   <span class='boxshadow'>   <button onclick="myFunction()" class="btn btn-default"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                       </span> 
                 </form>
             </span>
            </th>
        </tr>
    </thead>
</table>
     
                   
    
    
              <?php
if(isset($_POST['btnSearch'])) :?>

 <table class="table table-bordered table-hover">
          <thead>
                   <tr>
                            <th width="10%">#Serial</th>
                           <th width="30%">Student Name</th>
                            <th width="10%">Student Roll</th>
                              <th width="20%">Class Name</th>
                             <th width="15%">Section Name</th>
                            <th width="10%">Attendence</th>
                              <th width="5%">Options</th>
                        </tr>  
          </thead>


    
                         <?php
                   $session= $_POST["cmbSession"]; 
 
  $class= $_POST["cmbClass"]; 
 $section= $_POST["cmbSection"]; 
             $date= $_POST["txtDate"];             
          // $get_student=$db->query("select a.id, a.att_time,s.id,s.student_name,s.roll,c.class_name,g.group_name,se.session_name from student as s, class as c, c_group as g, attendance as a,session as se where c.id=s.class_id and g.id=s.group_id and se.id=s.session_id and s.session_id like '%".$session."%' and s.class_id like '%".$class."%' and s.group_id like '%".$section."%' and a.att_time like '%".$date."%'");
      //$get_student=$db->query("select a.id,s.student_name,s.roll,s.class_id,s.group_id,s.session_id from student as s,attendence as a where a.id=s.student_id  and s.session_id like '%".$session."%' and s.class_id like '%".$class."%' and s.group_id like '%".$section."%'");
        $get_student=$db->query("select a.id,s.student_name,s.roll,c.class_name,se.session_name,g.group_name,a.attend,a.att_time from attendance as a,say_student as s,sayclass as c, say_session as se, say_c_group as g where s.id=a.student_id  and c.id=s.class_id and se.id=s.session_id and g.id=s.group_id and   a.att_time like '%".$date."%' and  s.class_id like '%".$class."%' and  s.session_id like '%".$session."%' and  s.group_id like '%".$section."%'");
                        if($get_student){
                              $i =0;
                               while ($value = $get_student->fetch_assoc()){
                                    $i++;
                          
                        ?>
          <tbody>
                            <tr>
                            <td><?php echo $i;?></td>
                             <td><?php echo $value['student_name'];?></td>
                            <td><?php echo $value['roll'];?></td>
                              <td><?php echo $value['class_name'];?></td>
                                  <td><?php echo $value['group_name'];?></td>
                                  <td>
                                      <?php
                                      if($value['attend']== 'present'){
                                                 echo "<p style='background-color:#254D71; color:white; border-radius:5px;text-align:center'>Present</p>";
                                      }elseif($value['attend']== 'absent'){
                                                 echo "<p style='background-color:#CD1B2A; color:white; border-radius:5px;text-align:center'>Absent</p>";
                                      }
                               
                                       ?>
                                  
                                  </td>
                                  <td>   		 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
            <div style="margin-left: 45px; margin-top: 3px">
        <li> 
          <form action='#' method='post' onSubmit="return confirm('Comming Soon..............');">
                <input type='hidden' value='<?php echo $value['id'];?>' name='txtAttId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                    <button  type='submit' name='btnEdit'    class="btn btn-default"><i class='glyphicon glyphicon-edit'></i></button>
      
                    </span>
</form>	
           
                                                
        </li>
             </div>
             <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=72' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $value['id'];?>' name='txtAttId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
          <button  type='submit' name='btnDelete'    class="btn btn-default"><i class='glyphicon glyphicon-trash'></i></button>
        </span>
</form>	
                                 
 </li>
            </div>
  </ul>
                  
      </div>
			 
	</td>
                            
                        </tr>
                    </tbody>    
                        
                        
          <?php   }}?> 
    
    <?php endif;?>

      </table>


</div>


